<?php

//--------------------------------------------------------------
//	wp-head 削除項目
//--------------------------------------------------------------
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'wp_shortlink_wp_head');
remove_action('wp_head', 'rel_canonical');
// 絵文字関係削除
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('wp_print_styles', 'print_emoji_styles' );
remove_action('admin_print_styles', 'print_emoji_styles');
// Embed関係削除
remove_action('wp_head','rest_output_link_wp_head');
remove_action('wp_head','wp_oembed_add_discovery_links');
remove_action('wp_head','wp_oembed_add_host_js');
// headへの//s.w.orgのDNDプリフェッチ挿入停止
add_filter( 'emoji_svg_url', '__return_false' );


//--------------------------------------------------------------
//	標準のアドミンバーを非表示
//--------------------------------------------------------------
function remove_admin_bar_menus( $wp_admin_bar ) {
  $wp_admin_bar->remove_menu( 'wp-logo' ); // WordPressロゴ.
  $wp_admin_bar->remove_menu( 'about' ); // WordPressロゴ / WordPressについて.
  $wp_admin_bar->remove_menu( 'wporg' ); // WordPressロゴ / WordPress.org.
  $wp_admin_bar->remove_menu( 'documentation' ); // WordPressロゴ / ドキュメンテーション.
  $wp_admin_bar->remove_menu( 'support-forums' ); // WordPressロゴ / サポート.
  $wp_admin_bar->remove_menu( 'feedback' ); // WordPressロゴ / フィードバック.

  $wp_admin_bar->remove_menu( 'comments' ); // コメント.

  $wp_admin_bar->remove_menu( 'new-content' ); // 新規投稿.
  $wp_admin_bar->remove_menu( 'new-post' ); // 新規投稿 / 投稿.
  $wp_admin_bar->remove_menu( 'new-media' ); // 新規投稿 / メディア.
  $wp_admin_bar->remove_menu( 'new-page' ); // 新規投稿 / 固定.
  $wp_admin_bar->remove_menu( 'new-user' ); // 新規投稿 / ユーザー.
}
add_action( 'admin_bar_menu', 'remove_admin_bar_menus', 999 );


/** 
 * 不要なダッシュボードブロックを消す
 * @link https://baigie.me/officialblog/2022/04/19/wordpress-tips-1/
 */
function remove_dashboard_widget() {
  // remove_meta_box( 'dashboard_site_health', 'dashboard', 'normal' ); // サイトヘルスステータス
  // remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' ); // 概要
  remove_meta_box( 'dashboard_activity', 'dashboard', 'normal' ); // アクティビティ
  remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' ); // クイックドラフト
  remove_meta_box( 'dashboard_primary', 'dashboard', 'side' ); // WordPress イベントとニュース
  remove_action( 'welcome_panel', 'wp_welcome_panel' ); // ウェルカムパネル
}
add_action( 'wp_dashboard_setup', 'remove_dashboard_widget' );


//--------------------------------------------------------------
//	数字ページャー
//--------------------------------------------------------------
function the_paginate(){
	global $wp_query, $paged;

	$p_base = get_pagenum_link(1);
	$p_format = 'page/%#%';

	//?の有無確認、有る場合は場所を特定
	if($word = strpos($p_base, '?')){
	//?がある場合（検索結果）
		$p_base = get_option('home').(substr(get_option('home'), -1 ,1) === '/' ? '' : '/')
			.'%_%'.substr($p_base, $word);
	} else{
	//?が無い場合（カテゴリ、タグ等）
		$p_base .= (substr($p_base, -1 ,1) === '/' ? '' : '/') .'%_%';
	}

 	echo paginate_links(array(
		'base' => $p_base,
		'format' => $p_format,
		'total' => $wp_query->max_num_pages,
		'mid_size' => 1,
		'current' => ($paged ? $paged : 1),
		'prev_text' => '前へ',
		'next_text' => '次へ',
	)); 
}


//--------------------------------------------------------------
//	投稿画面にタグ一覧を表示しチェックボックス選択式にする
//--------------------------------------------------------------
// function re_register_post_tag_taxonomy() {
//   $tag_slug_args = get_taxonomy('post_tag');
//   $tag_slug_args->hierarchical = true;
//   $tag_slug_args->meta_box_cb = 'post_categories_meta_box';
//   register_taxonomy('post_tag', 'post', (array) $tag_slug_args);
// }
// add_action( 'init', 're_register_post_tag_taxonomy', 1 );


// ====================================================
// 自動整形を無効にする
// ====================================================
/**
 * 自動整形を無効にするカスタムフィールドを作成
 */
add_action(
	'add_meta_boxes', 
	function(){
		$screens = array('page');
		foreach($screens as $scrn){
			add_meta_box(
				'peralab-custombox-dont-autoformatting',
				'自動整形を無効化',
				'PeralabDontAutoFormatting_CustomBoxCreate',
				$scrn,
				'side',
				'default',
				null);
		}
	}
);

function PeralabDontAutoFormatting_CustomBoxCreate($post){
	$data_str = get_post_meta($post->ID, "dont_autoformat_radio", true);
	if($data_str != 'dont'){
		$data_str = 'format';
	}
	wp_nonce_field('action-noncekey-dontautoformat', 'noncename-dontautoformat');
	?>
	<div>
	<p><label><input name="name-metabox_autoformat_radio" type="radio" value="format" <?php echo (($data_str == 'format') ? 'checked' : '') ?>>整形する（初期値）</label></p>
	<p><label><input name="name-metabox_autoformat_radio" type="radio" value="dont" <?php echo (($data_str == 'dont') ? 'checked' : '') ?>>整形しない</label></p>
	<p><label>ビジュアルエディタの整形無効の切り替えは[下書き保存] [更新]などで記事の保存後から反映されます。</label></p>
	</div>
	<?php
}

/**
 * カスタムボックス内のフィールド値更新処理
 */
add_action(
	'save_post', 
	function($post_id){
		if(isset($_POST['noncename-dontautoformat']) == false || wp_verify_nonce($_POST['noncename-dontautoformat'], 'action-noncekey-dontautoformat') == false) {
			return;
		}
		
		if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE){
			return;
		}
		
		if(isset($_POST['post_type'])){
			if($_POST['post_type'] == 'page'){
				if(!current_user_can('edit_page', $post_id)){
					return;	//固定ページを編集する権限がない
				}
			}
			else{
				if(!current_user_can('edit_post', $post_id)){
					return;	//記事を編集する権限がない
				}
			}
		}
		
		if(isset($_POST['name-metabox_autoformat_radio'])){
			update_post_meta($post_id, "dont_autoformat_radio", $_POST['name-metabox_autoformat_radio']);
		}
	}
);

/**
 * 自動整形無効の実処理
 */
// 記事表示時の整形無効
add_action(
	'wp_head',
	function(){
		if(get_post_meta(get_the_ID(), 'dont_autoformat_radio', true) == 'dont'){
			remove_filter('the_content', 'wpautop');
			remove_filter('the_excerpt', 'wpautop');
		}
	}
);

// ビジュアルエディタ(TinyMCE)の整形無効
add_filter(
	'tiny_mce_before_init',
	function($init_array){
		if(get_post_meta(get_the_ID(), 'dont_autoformat_radio', true) == 'dont'){
			global $allowedposttags;
			$init_array['valid_elements']          = '*[*]';
			$init_array['extended_valid_elements'] = '*[*]';
			$init_array['valid_children']          = '+a[' . implode( '|', array_keys( $allowedposttags ) ) . ']';
			$init_array['indent']                  = true;
			$init_array['wpautop']                 = false;
			$init_array['force_p_newlines']        = false;
		}
		return $init_array;
	}
);

function custom_editor_settings( $initArray ){
	$initArray['body_id'] = 'primary';
	$initArray['body_class'] = 'post';
	// styleや、divの中のdiv,span、spanの中のspanを消させない
	$initArray['valid_children'] = '+body[style],+div[div|span|figcaption],+span[span]';
	// 空タグや、属性なしのタグとか消そうとしたりするのを停止。余計なことすんな！
	$initArray['verify_html'] = false;
	return $initArray;
}
add_filter( 'tiny_mce_before_init', 'custom_editor_settings' );


//--------------------------------------------------------------
//　特定の固定ページのエディタを非表示
//--------------------------------------------------------------
// add_filter('use_block_editor_for_post',function($use_block_editor,$post){
// 	if($post->post_type==='page'){
// 		if(in_array($post->post_name,['faq'])){
// 			remove_post_type_support('page','editor');
// 			return false;
// 		}
// 	}
// 	return $use_block_editor;
// },10,2);


// ====================================================
// ビジュアルエディタを無効
// ====================================================
function visual_editor_off(){ 
	global $typenow; 
	if( in_array( $typenow, array( 'mw-wp-form' ) ) ){ 
		add_filter('user_can_richedit', 'off_visual_editor'); 
	} 
} 
function off_visual_editor(){ 
	return false; 
} 
add_action( 'load-post.php', 'visual_editor_off' ); 
add_action( 'load-post-new.php', 'visual_editor_off' );