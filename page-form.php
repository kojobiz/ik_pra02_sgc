<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package sgc_theme
 * 
 * Template Name:お申し込みフォーム
 */

get_header();
?>

	<div class="m-lower__headline">
		<h2 class="l-headline__02 text-center"><?php the_title(); ?></h2>
	</div>

	<!-- パンくず -->
	<ul class="m-breadcrumb">
		<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">TOP</a></li>
		<li>申し込み</li>
	</ul>

	<article class="l-main__block m-form">
		<section class="l-main__container l-width w-md">
			<div class="m-form__lead">
				<?php if ( is_page('form') ) : ?>
					<p class="text-center">資料請求、無料トライアルは以下の電話番号<br>または、メールフォームより<br class="tab_only">お気軽にお申し込みください。</p>
				<?php endif; ?>

				<?php if ( is_page('confirm') ) : ?>
					<p class="text-center">送信内容に誤りがないか、ご確認ください。</p>
				<?php endif; ?>

				<?php if ( is_page('thanks') ) : ?>
					<p class="text-center">この度はお申し込み頂き誠にありがとうございます。</p>
					<p class="text-center">ご入力いただきましたメールアドレス宛に<br>確認メールを送付しております。</p>
				<?php endif; ?>
			</div>

			<?php if ( is_page('form') ) : ?>
			<dl class="m-form__tel">
				<dt class="m-form__tel--title">電話でのお申し込み</dt>
				<dd>
					<a href="tel:03-3342-9620" class="m-form__tel--num">03-3342-9620</a><span class="m-form__tel--reception">受付時間  10:00~18:00【土日祝定休日】</span>
				</dd>
			</dl>
			<?php endif; ?>

			<?php if ( is_page('thanks') ) : ?>
				<p class="m-form__message text-center">
					※ご指定いただいたメールアドレスへ<br class="tab_only">届いていない場合は<br>
					お手数をおかけいたしますが、<br>
					再度、お申し込みフォームにて<br class="tab_only">必要な情報をご入力ください。<br>
				</p>

				<div class="text-center">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="l-btn__submit w-sm">TOPに戻る</a>
				</div>
			<?php endif; ?>
		</section>
	</article>

	<article class="l-main__block m-form">
		<section class="l-main__container l-width w-md">
			<?php
			while ( have_posts() ) :
				the_post();

				the_content();

			endwhile; // End of the loop.
			?>
		</section>
	</article>

<?php
get_footer();
