<?php
/**
 * sgc_theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package sgc_theme
 */

// テーマバージョン
if ( ! defined( '_S_VERSION' ) ) {
	define( '_S_VERSION', '1.0.0' );
}

function sgc_theme_setup() {

	load_theme_textdomain( 'sgc_theme', get_template_directory() . '/languages' );

	add_theme_support( 'automatic-feed-links' );	// RSSフィードURLを出力
	add_theme_support( 'title-tag' );	// titleタグの出力
	add_theme_support( 'post-thumbnails' );	// アイキャッチ画像の有効化

	// カスタムメニューの有効化
	register_nav_menus(
		array(
			'global-nav' => esc_html__( 'グローバルナビゲーション', 'sgc_theme' ),
			'footer-nav' => esc_html__( 'フッターナビゲーション', 'sgc_theme' ),
		)
	);

	// HTML5による出力をサポート
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// カスタム背景の有効化
	add_theme_support(
		'custom-background',
		apply_filters(
			'sgc_theme_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// ウィジェットの変更をページ遷移なしで更新
	add_theme_support( 'customize-selective-refresh-widgets' );

	// カスタムロゴの有効化
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'sgc_theme_setup' );

// コンテンツ幅の設定
function sgc_theme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'sgc_theme_content_width', 640 );
}
add_action( 'after_setup_theme', 'sgc_theme_content_width', 0 );

/**
 * サイドバー（ウィジェットエリア）を定義
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function sgc_theme_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'sgc_theme' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'sgc_theme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'sgc_theme_widgets_init' );

/**
 * デフォルトのCSSとJSを読み込み
 */
function sgc_theme_scripts() {
	wp_enqueue_style( 'sgc_theme-style', get_stylesheet_uri(), array(), _S_VERSION );
	// wp_style_add_data( 'sgc_theme-style', 'rtl', 'replace' );

	wp_enqueue_script( 'sgc_theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'sgc_theme_scripts' );

require get_template_directory() . '/inc/custom-header.php';	// カスタムヘッダー設定を読み込み
require get_template_directory() . '/inc/template-tags.php';	// カスタムテンプレートタグ設定を読み込み
require get_template_directory() . '/inc/template-functions.php';	// Functions which enhance the theme by hooking into WordPress.
require get_template_directory() . '/inc/customizer.php';	// カスタマイザーを読み込み

/**
 * ジェットパック互換性ファイルをロード
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


// ====================================================
// 独自のfunctionを読み込む
// ====================================================
$function_files = [
  '/functions/init.php',
  '/functions/setting.php',
  // '/functions/admin.php',
];

foreach ($function_files as $file) {
  if ((file_exists(__DIR__ . $file))) {
    locate_template($file, true, true);
  } else {
    trigger_error("`$file`ファイルが見つかりません", E_USER_ERROR);
  }
}



// ====================================================
// bodyタグにスラッグ追加
// ====================================================
function my_body_class($classes)
{
    if (is_page()) {
        $page = get_post();
        $classes[] = $page->post_name;
    }
    return $classes;
}
add_filter('body_class', 'my_body_class');