<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package sgc_theme
 */

?>

		</main><!-- .site-container END -->

		<footer class="m-footer bg-c01">
			<?php if ( is_home() || is_front_page() ) : ?>
				<div class="m-footer__inner l-width">
					<dl class="m-footer__company">
						<dt class="m-footer__company--name">株式会社システムサポート</dt>
						<dd class="m-footer__company--detail">
							<p>
								上場証券取引所	：	東京証券取引所 プライム市場<br>
								創業	　　　　：	1980年1月<br>
								資本金	　　　　：	7億23百万円<br>
								本社所在地	：	〒920-0853 石川県金沢市本町1-5-2 リファーレ9F
							</p>
						</dd>
					</dl>
				</div>
			<?php endif; ?>
			<p class="m-footer__copyright">&copy; System Support Inc.</p>
			<!-- <a href="#" id="pageTop"></a> -->
		</footer>

		<?php wp_footer(); ?>

	</body>
</html>
