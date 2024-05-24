<?php

// ====================================================
//	JSファイルを読み込む
// ====================================================
function add_script() {
	// GSAP
	wp_enqueue_script( 'gsap', 'https://cdn.jsdelivr.net/npm/gsap@3.7.0/dist/gsap.min.js', array(), '3.7.0', false );
	wp_enqueue_script( 'ScrollTrigger', 'https://cdn.jsdelivr.net/npm/gsap@3.7.0/dist/ScrollTrigger.min.js', array( 'gsap' ), '3.7.0', false );

	// WordPress本体のjquery.jsを読み込まない
	wp_deregister_script('jquery');
	// jQuery
	wp_enqueue_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js', array(), '3.5.1', false );
	
	// 共通JS
	wp_enqueue_script( 'common-js', get_theme_file_uri( '/assets/js/common.js' ), array( 'jquery' ), '1.0.0', false );

	if ( is_singular('download') ) {
		wp_enqueue_script( 'swiper', 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js', array(), '8.4.7', false );
	}
}
add_action('wp_enqueue_scripts', 'add_script');


// ====================================================
//	CSSファイルを読み込む
// ====================================================
function add_style() {
	wp_enqueue_style( 'ress', get_theme_file_uri( '/assets/css/ress.min.css' ), array(), NULL );
	wp_enqueue_style( 'main', get_theme_file_uri( '/assets/css/style.css' ), array(), filemtime( get_template_directory() . '/assets/css/style.css' ) );

	if ( is_singular('download') ) {
		wp_enqueue_style( 'swiper', 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css', array(), '8.4.7' );
	}
}
add_action('wp_enqueue_scripts', 'add_style');

// エディタ用CSS
// add_editor_style('editor-style.css'); //エディタ専用


// ====================================================
//　ショートコード
// ====================================================
function shortcode_theme_url() {	// テーマURL
	return get_template_directory_uri();
}
add_shortcode('theme_url', 'shortcode_theme_url');

function shortcode_site_url() {	// サイトURL
	return get_bloginfo('url');
}
add_shortcode('site_url', 'shortcode_site_url');

// ショートコード SRCSET対応
function my_wp_kses_allowed_html( $tags, $context ) {
	$tags['img']['srcset'] = true;
	return $tags;
}
add_filter( 'wp_kses_allowed_html', 'my_wp_kses_allowed_html', 10, 2 );


// ====================================================
//	リダイレクト
// ====================================================
add_action( 'template_redirect', 'wp_redirect_page' );
function wp_redirect_page() {
  if( is_404() || is_author() ){
    wp_safe_redirect( home_url( '/' ), 301 );
    exit();
  }
}


// ====================================================
//	画像サイズ追加
// ====================================================
// add_image_size('largeImage', 1000, 0, false);
// add_image_size('menuThumb', 236, 132, false);

//	アイキャッチ画像に自動付与されるsrcset属性を削除
add_filter('wp_calculate_image_srcset_meta', '__return_null');


// ====================================================
//	ログイン画面 カスタマイズ
// ====================================================
function my_login_style() { ?>
 <style type="text/css">
	body.login {
		background: #efefef;
	}
	body.login h1 {
		margin-bottom: 30px;
	}
	body.login h1 a {
		width: 200px;
    height: 30px;
		margin: 0 auto;
		background-image: url(<?php echo get_template_directory_uri(); ?>/images/logo.svg);
		background-size: contain;
	}
	body.login form {
		background-color: #000;
		border: 1px solid rgba(255, 255, 255, 0.45);
	}
	body.login label {
		margin-bottom: 6px;
		font-size: 12px;
		color: #FFF;
	}
	body.login form .input,
	body.login form input[type=checkbox],
	body.login form input[type=checkbox]:focus,
	body.login input[type=text],
	body.login input[type=text]:focus {
		border-color: rgba(255, 255, 255, 0.45);
	}
	body.login .button.wp-hide-pw {
		color: #111;
	}
	body.login .button-primary {
		background: #1ca2f1;
		border: none;
		box-shadow: none;
		text-shadow: none;
		color: #FFF;
		-webkit-transition: background 0.5s ease-out;
    -o-transition: background 0.5s ease-out;
    transition: background 0.5s ease-out;
	}
	body.login .button-primary:hover,
	body.login .button-primary:active,
	body.login .button-primary:focus {
		background: #0070c7;
		box-shadow: none;
		color: #FFF;
	}
	body.login #backtoblog a,
	body.login #nav a {
		font-size: 12px;
		color: #999;
		-webkit-transition: color 0.5s ease-out;
    -o-transition: color 0.5s ease-out;
    transition: color 0.5s ease-out;
	}
	body.login #backtoblog a:hover,
	body.login #nav a:hover {
		color: #999;
	}
	body.login #login_error,
	body.login .message,
	body.login .success {
		border-left-color: rgba(255, 255, 255, 0.45);
	}
	body.login form .forgetmenot {
		margin-top: 8px;
	}
	body.login .language-switcher label .dashicons {
		color: #000;
	}
 </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_style' );
//ロゴのリンク先を指定
function my_login_logo_url() {
 return get_bloginfo( 'url' );
}
add_filter( 'login_headerurl', 'my_login_logo_url' );
// ロゴのtitleテキストを指定
function my_login_logo_tit() {
 return get_option( 'blogname' );
}
add_filter( 'login_headertext', 'my_login_logo_tit' );


// 投稿ページのパーマリンクをカスタマイズ
// function add_article_post_permalink( $permalink ) {
//     $permalink = '/works' . $permalink;
//     return $permalink;
// }
// add_filter( 'pre_post_link', 'add_article_post_permalink' );
 
// function add_article_post_rewrite_rules( $post_rewrite ) {
//     $return_rule = array();
//     foreach ( $post_rewrite as $regex => $rewrite ) {
//         $return_rule['works/' . $regex] = $rewrite;
//     }
//     return $return_rule;
// }
// add_filter( 'post_rewrite_rules', 'add_article_post_rewrite_rules' );


// ====================================================
//　管理画面のカスタム投稿タイプ一覧画面にカスタムタクソノミーの絞り込みを追加
// ====================================================
add_action(
  'restrict_manage_posts',
  function ( $post_type ) {
    // カスタム投稿タイプ「manual」に絞り込み条件を追加する.
    if ( 'faqs' === $post_type ) {
      // 「manual_category」で絞り込むためのドロップダウンを追加する.
      $taxonomy = 'faq_type';
      wp_dropdown_categories(
        [
          'show_option_all' => 'すべての質問タイプ',
          'orderby'         => 'name',
          'selected'        => get_query_var( $taxonomy ),
          'hide_empty'      => 0,
          'name'            => $taxonomy,
          'taxonomy'        => $taxonomy,
          'value_field'     => 'slug',
          'hierarchical'    => 1, // 親・子関係がある場合は1がおすすめ.
        ]
      );
    }
  }
);


// ====================================================
//　親カテゴリに自動でチェックを入れる
// ====================================================
function cat_parent_check() {
?>
<script>
jQuery(function($) {
  $('#areachecklist .children input').change(function() {
    function parentNodes(checked, nodes) {
      parents = nodes.parent().parent().parent().prev().children('input');
      if (parents.length != 0) {
        parents[0].checked = checked;
        parentNodes(checked, parents);
      }
    }
    var checked = $(this).is(':checked');
    $(this).parent().parent().siblings().children('label').children('input').each(function() {
      checked = checked || $(this).is(':checked');
    })
      parentNodes(checked, $(this));
  });
});
</script>
<?php
}
add_action('admin_head-post-new.php', 'cat_parent_check');
add_action('admin_head-post.php', 'cat_parent_check');


// ====================================================
// 資料請求フォームの自動返信メール設定
// ====================================================
function my_mail( $Mail, $values, $Data ) {
	// $Data->get( 'hoge' ) で送信されたデータが取得できます。
	$postId = $Data->get('post_id');
	$file = get_field( 'document', $postId );
	$fileUrl = $file['url'];
	$Mail->body .= "\r\r【資料ダウンロードURL】\r" . $fileUrl . "\r";
	return $Mail;
}
add_filter( 'mwform_auto_mail_mw-wp-form-502', 'my_mail', 10, 3 );