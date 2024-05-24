<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package sgc_theme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="https://gmpg.org/xfn/11">

		<style>
		:root {
			--base-font-color: #191919;
			--bg-color: #fff;
			--main-width: 114.5rem;
			--primary-color: #2FC996;
		}
		</style>

		<link rel="stylesheet" href="https://use.typekit.net/qwu0myt.css">

		<link rel="icon" type="image/svg+xml" href="<?php echo get_template_directory_uri() ?>/favicon.svg">

		<?php wp_head(); ?>
	</head>

	<?php
		if ( is_home() && is_front_page() ) {
			$custom_body_class = 'home';
		} else {
			$custom_body_class = 'lower';
		}
	?>

	<body <?php body_class($custom_body_class); ?>>

		<?php wp_body_open(); ?>

		<header id="site-header" class="m-header">

			<h1 class="m-header__title">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
					<img src="<?php echo get_template_directory_uri() ?>/images/img_logo.png" alt="Smart Generative Chat">
				</a>
			</h1>

			<div class="m-header__navi--wrap">
				<div class="m-header__tel">
					<div class="m-header__tel--inner">
						<a href="tel:03-3342-9620" class="m-header__tel--num">TEL 03-3342-9620</a>
						<span class="m-header__tel--reception">受付時間 10:00~18:00【土日祝定休日】</span>
					</div>
				</div>
				<nav class="m-header__navi">
					<figure class="tab_only m-header__navi--logo">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
							<img src="<?php echo get_template_directory_uri() ?>/images/img_logo_sp.png" alt="Smart Generative Chat">
						</a>
					</figure>
					<ul>
						<li><a href="<?php echo esc_url( home_url( '' ) ); ?>#reason">選ばれる理由</a></li>
						<li><a href="<?php echo esc_url( home_url( '' ) ); ?>#function">サービス紹介</a></li>
						<li><a href="<?php echo esc_url( home_url( '' ) ); ?>#flow">導入までの流れ</a></li>
						<li><a href="<?php echo esc_url( home_url( '' ) ); ?>#plan">料金プラン</a></li>
						<li><a href="<?php echo esc_url( home_url( '' ) ); ?>#faq">よくあるご質問</a></li>
					</ul>
					<div class="m-header__navi--request">
						<div class="m-header__navi--tel text-center">
							<span>
								<a href="tel:03-3342-9620" class="m-header__navi--num">03-3342-9620</a>
								<br>
								<small class="m-header__navi--reception">受付時間  10:00~18:00【土日祝定休日】</small>
							</span>
						</div>
						<div class="m-request__btngroup">
							<a href="<?php echo esc_url( home_url( '/form' ) ); ?>" class="l-btn__01 green"><span><small>1分でカンタン入力！</small>サービス資料請求</span></a>
							<a href="<?php echo esc_url( home_url( '/form' ) ); ?>" class="l-btn__01 orange"><span><small>初めてでも安心！</small>"1週間無料"トライアル</span></a>
						</div>
					</div>
				</nav>
			</div>

			<!-- ハンバーガーアイコン -->
			<div id="hamburger-menu" class="m-hamburger">
				<div id="nav-toggle">
					<div>
						<span></span>
						<span></span>
						<span></span>
					</div>
				</div>
			</div>
			
		</header>

		<?php if ( is_home() || is_front_page() ) : ?>
			<div id="hero-visual" class="m-hero">
				<div class="m-hero__inner">
					<div class="m-hero__contents">
						<h1 class="m-hero__catch animFadeUp">
							<span class="m-hero__catch--title">企業向け<br class="tab_only">AIアシスタントの新基準</span>
							<span class="m-hero__catch--lead">Azure OpenAI ServiceやAmazon Bedrockを利用して、情報の安全性を確保しつつ、最新のAIテクノロジーを誰でも簡単に利用できる豊富な機能を提供。あらゆるシーンで、あなたの業務を強力にサポートします。</span>
						</h1>
						<ul class="m-hero__point">
							<li><img src="<?php echo get_template_directory_uri() ?>/images/home/hero_point01.svg" alt="スモールスタートが可能"></li>
							<li><img src="<?php echo get_template_directory_uri() ?>/images/home/hero_point02.svg" alt="マルチAIモデル対応"></li>
							<li><img src="<?php echo get_template_directory_uri() ?>/images/home/hero_point03.svg" alt="自社専用環境の構築"></li>
						</ul>
						<div class="m-hero__btngroup">
							<a href="<?php echo esc_url( home_url( '/form' ) ); ?>" class="l-btn__01 green"><span><small>1分でカンタン入力！</small>サービス資料請求</span></a>
							<a href="<?php echo esc_url( home_url( '/form' ) ); ?>" class="l-btn__01 orange"><span><small>初めてでも安心！</small>"1週間無料"トライアル</span></a>
						</div>
					</div>
				</div>
			</div>
		<?php endif; ?>

		<main class="site-container">
