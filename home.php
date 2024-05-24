<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package sgc_theme
 */

get_header();
?>
			<!-- サービス資料請求 -->
			<a href="<?php echo esc_url( home_url( '/form' ) ); ?>" class="l-btn__side btn-reques">
				<picture>
					<source srcset="<?php echo get_template_directory_uri() ?>/images/home/btn_request_side_sp.png" media="(max-width: 750px)">
					<img src="<?php echo get_template_directory_uri() ?>/images/home/btn_request_side.png" alt="サービス資料請求">
				</picture>
			</a>

			<!-- 1週間無料トライアル -->
			<a href="<?php echo esc_url( home_url( '/form' ) ); ?>" class="l-btn__side btn-trial">
				<picture>
					<source srcset="<?php echo get_template_directory_uri() ?>/images/home//btn_trial_side_sp.png" media="(max-width: 750px)">
					<img src="<?php echo get_template_directory_uri() ?>/images/home/btn_trial_side.png" alt="1週間無料トライアル">
				</picture>
			</a>


			<!-- 時間のかかる業務作業AIにおまかせしませんか？ -->
			<article id="lead" class="l-main__block m-lead">
				<section class="l-main__container l-width">

					<h2 class="l-headline__01 text-center animFadeUp">時間のかかる業務作業<span class="green f-lg">AIにおまかせしませんか？</span></h2>
					<p class="text-center">
						Smart Generative Chatなら<br class="tab_only">社内ナレッジもWeb上の最新情報も取得可能！<br>
						用途に合わせて柔軟にデータソースを選択いただけます
					</p>
					<picture>
						<source srcset="<?php echo get_template_directory_uri() ?>/images/home/lead_img01_sp.jpg" media="(max-width: 750px)">
						<img src="<?php echo get_template_directory_uri() ?>/images/home/lead_img01.jpg">
					</picture>

				</section>
			</article>

			<!-- Smart Generative Chatが選ばれる3つの理由 -->
			<article id="reason" class="l-main__block bg-pattern01 m-reason">
				<section class="l-main__container l-width w-md">

					<h2 class="l-headline__02 text-center animFadeUp">Smart Generative Chat が<br>選ばれる3つの理由</h2>
					<ul class="m-reason__list">
						<li>
							<h3 class="m-reason__list--title">複数のAIモデルで業務をサポート</h3>
							<p class="m-reason__list--text">Azure OpenAI ServiceでGPTシリーズ、Amazon BedrockでClaude3といった大規模言語モデルをひとつの画面から利用できます。AzureやAWSを利用することによって、データがAIに学習されることなく、安心して機密データを取り扱うことが可能です。</p>
						</li>
						<li>
							<h3 class="m-reason__list--title">自社ナレッジも簡単に取り込み</h3>
							<p class="m-reason__list--text">社内ドキュメントを画面から登録し、AIの回答生成に利用する、Embedding Chatbotを標準搭載。<br>自社独自のカスタマイズも簡単に実現できます。</p>
						</li>
						<li>
							<h3 class="m-reason__list--title">初心者でもできる！プロンプトの入力不要</h3>
							<p class="m-reason__list--text">標準搭載されているシナリオ機能では、管理者が作成した個社個別のシナリオを登録することができます。<br>ユーザーはシナリオを選択し、設定されたいくつかの項目を入力するだけでAIからの回答を得ることができます。</p>
						</li>
					</ul>

				</section>
			</article>

			<!-- 資料請求・電話受付 -->
			<article class="l-main__block m-request bg-c01">
				<section class="l-main__container l-width">

					<div class="m-request__btngroup">
						<a href="<?php echo esc_url( home_url( '/form' ) ); ?>" class="l-btn__01 green"><span><small>1分でカンタン入力！</small>サービス資料請求</span></a>
						<a href="<?php echo esc_url( home_url( '/form' ) ); ?>" class="l-btn__01 orange"><span><small>初めてでも安心！</small>"1週間無料"トライアル</span></a>
					</div>
					<div class="m-request__tel text-center">
						<span>
							電話相談受付中！<a href="tel:03-3342-9620" class="m-request__tel--num">03-3342-9620</a>
							<br>
							<small class="m-request__tel--reception">受付時間  10:00~18:00【土日祝定休日】</small>
						</span>
					</div>

				</section>
			</article>
			
			<!-- 5つの機能 -->
			<article id="function" class="l-main__block m-function">
				<section class="l-main__container l-width">

					<h2 class="l-headline__03 text-center animFadeUp">
						<span>Smart Generative Chat の</span>
						<span class="orange"><strong>5</strong><small>つの</small>機能</span>
					</h2>

					<ul class="m-function__point">
						<!-- POINT 1 -->
						<li class="m-function__column">
							<dl class="m-function__text">
								<dt class="m-function__text--title">管理機能</dt>
								<dd>
									<p class="m-function__text--lead">こまめな権限設定とコストの見える化でガバナンスを強化</p>
									<ul class="m-function__text--list dot pc_only">
										<li>Microsoft Entra ID（Azure AD）のシングルサインオン</li>
										<li>機能権限管理</li>
										<li>使用したトークン数、コストの可視化</li>
										<li>プロンプトテンプレート</li>
										<li>ユーザー管理、コスト管理</li>
									</ul>
								</dd>
							</dl>
							<div class="m-function__img">
								<picture>
									<source srcset="<?php echo get_template_directory_uri() ?>/images/home/img_function1_01_sp.png" media="(max-width: 750px)">
									<img src="<?php echo get_template_directory_uri() ?>/images/home/img_function1_01.png">
								</picture>
								<ul class="m-function__text--list dot tab_only">
									<li>Microsoft Entra ID（Azure AD）のシングルサインオン</li>
									<li>機能権限管理</li>
									<li>使用したトークン数、コストの可視化</li>
									<li>プロンプトテンプレート</li>
									<li>ユーザー管理、コスト管理</li>
								</ul>
							</div>							
						</li>
						<!-- POINT 2 -->
						<li class="m-function__column row-reverce">
							<dl class="m-function__text">
								<dt class="m-function__text--title">シナリオ機能</dt>
								<dd>
									<p class="m-function__text--lead">通常のチャットのほかに、プロンプト入力をせずともAIとの対話を始めることができる機能を標準搭載</p>
									<ul class="m-function__text--list dot pc_only">
										<li>ユーザーはAIモデルやテンプレートの選択が不要</li>
										<li>社内情報の取得元を自動で選定</li>
									</ul>
								</dd>
							</dl>
							<div class="m-function__img">
								<figure>
									<img src="<?php echo get_template_directory_uri() ?>/images/home/img_function2_01.png" >
									<div class="m-function__movie">
										<div class="m-function__movie--inner">
											<video src="<?php echo get_template_directory_uri() ?>/images/video/scenario.mp4" controls muted autoplay playsinline loop>
											</video>
										</div>
									</div>
								</figure>
								<ul class="m-function__text--list dot tab_only">
									<li>ユーザーはAIモデルやテンプレートの選択が不要</li>
									<li>社内情報の取得元を自動で選定</li>
								</ul>
							</div>
						</li>
						<!-- POINT 3 -->
						<li class="m-function__column">
							<dl class="m-function__text">
								<dt class="m-function__text--title">マルチクラウド<br>マルチAIモデル対応</dt>
								<dd>
									<p class="m-function__text--lead">複数のパブリッククラウドに対応することで、各クラウドで提供されるAIモデルを自由に選択・利用可能</p>
									<ul class="m-function__text--list dot pc_only">
										<li>Azure OpenAI Service</li>
										<li>Amazon Bedrock</li>
									</ul>
								</dd>
							</dl>
							<div class="m-function__img">
								<picture>
									<source srcset="<?php echo get_template_directory_uri() ?>/images/home/img_function3_01_sp.png" media="(max-width: 750px)">
									<img src="<?php echo get_template_directory_uri() ?>/images/home/img_function3_01.png">
								</picture>
								<ul class="m-function__text--list dot tab_only">
									<li>Azure OpenAI Service</li>
									<li>Amazon Bedrock</li>
								</ul>
							</div>
						</li>
						<!-- POINT 4 -->
						<li class="m-function__column row-reverce">
							<dl class="m-function__text">
								<dt class="m-function__text--title">Embedding Chat<br><span class="sm">社内データのVector Search</span></dt>
								<dd>
									<p class="m-function__text--lead">自社の情報をデータベースに登録し、AIの回答生成に利用します。</p>
									<ul class="m-function__text--list dot pc_only">
										<li>プレーンテキストおよびPDFのVector DB化</li>
										<li>社内データ等の情報読み込み</li>
										<li>Word、Excel、PowerPoint、PDFなど<br>多くのドキュメント形式のアップロード可能</li>
									</ul>
								</dd>
							</dl>
							<div class="m-function__img">
								<picture>
									<source srcset="<?php echo get_template_directory_uri() ?>/images/home/img_function4_01_sp.png" media="(max-width: 750px)">
									<img src="<?php echo get_template_directory_uri() ?>/images/home/img_function4_01.png">
								</picture>
								<ul class="m-function__text--list dot tab_only">
									<li>プレーンテキストおよびPDFのVector DB化</li>
									<li>社内データ等の情報読み込み</li>
									<li>Word、Excel、PowerPoint、PDFなど<br>多くのドキュメント形式のアップロード可能</li>
								</ul>
							</div>
						</li>
						<!-- POINT 5 -->
						<li class="m-function__column">
							<dl class="m-function__text">
								<dt class="m-function__text--title">アシスタントAPIで<br>データ分析も<br>ドキュメントの生成も</dt>
								<dd>
									<p class="m-function__text--lead">AIが自動でコードを実行することができるアシスタントAPI機能も搭載。一歩先のAI活用を支援</p>
									<ul class="m-function__text--list dot pc_only">
										<li>Code Interpreter</li>
									</ul>
								</dd>
							</dl>
							<div class="m-function__img">
								<figure>
									<img src="<?php echo get_template_directory_uri() ?>/images/home/img_function2_01.png" >
									<div class="m-function__movie">
										<div class="m-function__movie--inner">
											<video src="<?php echo get_template_directory_uri() ?>/images/video/assistant_api.mp4" controls muted autoplay playsinline loop></video>
										</div>
									</div>
								</figure>
								<ul class="m-function__text--list dot tab_only">
									<li>Code Interpreter</li>
								</ul>
							</div>
						</li>
					</ul>

				</section>
			</article>

			<!-- 導入実績 -->
			<?php
				$args = Array(
					'post_type' => 'record_banner',
					'posts_per_page' => -1,
				);
				$the_query = new WP_Query($args);
				if($the_query -> have_posts()):
			?>
				<article id="results" class="l-main__block m-results">
					<section class="l-main__container l-width w-md">
						<h2 class="l-headline__02 c-green text-center animFadeUp">導入実績</h2>

						<ul class="m-results__list">
							<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
								<?php if ( get_field( 'record_img' ) ): ?>	
									<li>
										<?php if ( get_field( 'record_link' ) ): ?>
											<a href="<?php echo get_field( 'record_link' ) ;?>" target="_blank">
										<?php endif; ?>
												<img src="<?php echo get_field( 'record_img' ) ;?>" alt="<?php the_title(); ?>">
										<?php if ( get_field( 'record_link' ) ): ?>
											</a>
										<?php endif; ?>
									</li>
								<?php endif; ?>
							<?php endwhile; ?>
						</ul>

					</section>
				</article>
			<?php  endif; wp_reset_postdata(); ?>

			<!-- 資料請求・電話受付 -->
			<article class="l-main__block m-request bg-c01">
				<section class="l-main__container l-width">

					<div class="m-request__btngroup">
						<a href="<?php echo esc_url( home_url( '/form' ) ); ?>" class="l-btn__01 green"><span><small>1分でカンタン入力！</small>サービス資料請求</span></a>
						<a href="<?php echo esc_url( home_url( '/form' ) ); ?>" class="l-btn__01 orange"><span><small>初めてでも安心！</small>"1週間無料"トライアル</span></a>
					</div>
					<div class="m-request__tel text-center">
						<span>
							電話相談受付中！<a href="tel:03-3342-9620" class="m-request__tel--num">03-3342-9620</a>
							<br>
							<small class="m-request__tel--reception">受付時間  10:00~18:00【土日祝定休日】</small>
						</span>
					</div>

				</section>
			</article>

			<!-- 導入までの流れ -->
			<article id="flow" class="l-main__block m-flow">
				<section class="l-main__container l-width">
					<h2 class="l-headline__02 c-green text-center animFadeUp">導入までの流れ</h2>
					<p class="m-flow__lead text-center">
						ご成約からおおよそ1.5ヶ月で納品となります<br>
						個別開発がある場合は開発要件に応じて<br class="tab_only">スケジュール調節をさせて頂きます
					</p>
					<picture class="m-flow__img">
						<source srcset="<?php echo get_template_directory_uri() ?>/images/home/flow_img01_sp.png" media="(max-width: 750px)">
						<img src="<?php echo get_template_directory_uri() ?>/images/home/flow_img01
						.png">
					</picture>
				</section>
			</article>

			<!-- 料金プラン -->
			<article id="plan" class="l-main__block m-plan">
				<section class="l-main__container l-width w-md">
					<h2 class="l-headline__02 c-green text-center animFadeUp">料金プラン</h2>
					<p class="m-plan__lead text-center">ご要望に応じて、どちらかのプランを選べます</p>

					<ul class="m-plan__list">
						<li class="m-plan__list--block blue">
							<h3 class="m-plan__list--title blue">月  額  プ  ラ  ン</h3>
							<p class="m-plan__list--text">毎月のランニングコストを抑えたい方にオススメ</p>
							<div class="m-plan__list--cost blue">
								<p class="m-plan__list--price">70,000</p>
								<p class="m-plan__list--unit"><span>円/月</span><span class="m-plan__list--tax">（税別）</span></p>
							</div>
						</li>
						<li class="m-plan__list--block">
							<h3 class="m-plan__list--title">初期費用プラン</h3>
							<p class="m-plan__list--text">長期のご利用をご希望の方にオススメ</p>
							<div class="m-plan__list--cost">
								<p class="m-plan__list--price">1,500,000</p>
								<p class="m-plan__list--unit"><span>円～</span><span class="m-plan__list--tax">（税別）</span></p>
							</div>
						</li>
					</ul>

					<ul class="m-plan__note">
						<li>Azure OpenAI Service利用にあたっての申請はお客さまにて実施いただけるものといたします。</li>
						<li>保守費用、クラウド利用料は含まれません。</li>
						<li>月額プランは2か月以上のご契約を前提とします。</li>
						<li>月額プランの場合、Azureご利用の場合は「STS Azure CSPサービス申し込み」AWSご利用の場合は「クラウド工房決済代行サービス利用申し込み」が必要となります。</li>
					</ul>
				</section>
			</article>

			<!-- 1週間の無料トライアルをご用意！導入後も安心のサポート -->
			<article class="l-main__block m-support">
				<section class="l-main__container l-width w-md">
					<h2 class="l-headline__04 text-center animFadeUp"><span>1週間の無料<br class="tab_only">トライアルをご用意！<br>導入後も安心のサポート</span></h2>

					<div class="m-support__column">
						<dl class="m-support__block orange">
							<dt class="m-support__block--title">1週間<br class="tab_only">無料お試し</dt>
							<dd class="m-support__block--text">
								いきなりの導入が不安な方にオススメ！<br>
								トライアル環境で実際に操作していただけます
							</dd>
						</dl>
						<dl class="m-support__block green">
							<dt class="m-support__block--title">初級から<br class="tab_only">中級までサポート</dt>
							<dd class="m-support__block--text">
								ご利用のすべてのお客さまへ、プロンプトの作成など、基本を1から学ぶことができる動画をご提供！
							</dd>
						</dl>
						<figure class="m-support__img">
							<picture class="m-flow__img">
								<source srcset="<?php echo get_template_directory_uri() ?>/images/home/img_support_sp.png" media="(max-width: 750px)">
								<img src="<?php echo get_template_directory_uri() ?>/images/home/img_support_pc.png" alt="">
							</picture>
						</figure>
					</div>

				</section>
			</article>

			<!-- よくあるご質問 -->
			<article id="faq" class="l-main__block m-faq bg-pattern02">
				<section class="l-main__container l-width">
					<h2 class="l-headline__02 c-black text-center animFadeUp">よくあるご質問</h2>

					<div class="m-faq__list">
						<dl class="m-faq__list--block">
							<dt class="m-faq__list--q"><span>利用者が入力した機密情報は、</span><span>AIに学習されることはありますか?</span></dt>
							<dd class="m-faq__list--a">
								<p>いいえ、当社のサービスでは、Azure OpenAI Service または Amazon Bedrock を活用しており、これらのAPIを通じた AI との対話内容は学習に使用されません。安心してご利用いただけます。</p>
							</dd>
						</dl>

						<dl class="m-faq__list--block">
							<dt class="m-faq__list--q"><span>初期費用プランを選択した場合、</span><span>ランニングコストは発生しますか?</span></dt>
							<dd class="m-faq__list--a">
								<p>はい、ランニングコストが発生します。初期費用プランまたは月額プランのどちらをお選びいただいても、お客様ごとに Azure または AWS 上に環境を構築するため、その分のランニングコストがかかります。契約時に、概算のランニングコストをお見積もりさせていただきます。</p>
							</dd>
						</dl>

						<dl class="m-faq__list--block">
							<dt class="m-faq__list--q"><span>最低利用人数に制限はありますか?</span></dt>
							<dd class="m-faq__list--a">
								<p>いいえ、最低利用人数の制限はありません。初期費用プラン、月額プランいずれも、1名からご利用いただけます。利用者数が増えても追加料金は発生しませんが、AI の利用量が増えるとパブリッククラウドのランニングコストが高くなる可能性があります。</p>
							</dd>
						</dl>
					</div>
				</section>
			</article>

			<!-- 資料請求・電話受付 -->
			<article class="l-main__block m-request bg-c01">
				<section class="l-main__container l-width">

					<div class="m-request__btngroup">
						<a href="<?php echo esc_url( home_url( '/form' ) ); ?>" class="l-btn__01 green"><span><small>1分でカンタン入力！</small>サービス資料請求</span></a>
						<a href="<?php echo esc_url( home_url( '/form' ) ); ?>" class="l-btn__01 orange"><span><small>初めてでも安心！</small>"1週間無料"トライアル</span></a>
					</div>
					<div class="m-request__tel text-center">
						<span>
							電話相談受付中！<a href="tel:03-3342-9620" class="m-request__tel--num">03-3342-9620</a>
							<br>
							<small class="m-request__tel--reception">受付時間  10:00~18:00【土日祝定休日】</small>
						</span>
					</div>

				</section>
			</article>

<?php
get_footer();
?>

<script>
	$(function(){
	var objH = $('#hero-visual').outerHeight();
	var objTop = $('#hero-visual').offset().top;
	var objBottom = objTop + objH;
	$(window).scroll(function () {
    if ($(this).scrollTop() >= objBottom) {
			$('.l-btn__side').fadeIn();
    } else {
      $('.l-btn__side').fadeOut();
    }
  });
});
</script>
