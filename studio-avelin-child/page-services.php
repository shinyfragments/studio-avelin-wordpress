<?php
/**
 * Studio Avelin — Services page template.
 *
 * @package studio-avelin-child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$sa_home = trailingslashit( home_url( '/' ) );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<?php wp_head(); ?>
</head>

<body <?php body_class( array( 'home', 'sa-front', 'sa-page', 'sa-page--services' ) ); ?>>
<?php wp_body_open(); ?>

<a class="sa-skip" href="#sa-main">Skip to content</a>

<?php get_template_part( 'parts/sa-header' ); ?>

<main class="sa-main" id="sa-main">
	<div class="sa-about-container">

		<section class="sa-services-page-hero">
			<div>
				<span class="sa-about-eyebrow">SERVICES</span>
				<h1 class="sa-about-hero-headline">
					websites, shaped with <span class="sa-lime-text">care</span>.
				</h1>
				<div class="sa-services-page-hero__intro">
					<p>
						Studio Avelin designs and builds focused websites for independent professionals, small businesses and people with a clear idea.
					</p>
					<p>
						Structure, visual direction and development stay in one direct process &mdash; from the first conversation to launch.
					</p>
				</div>
			</div>

			<aside class="sa-services-page-note">
				<span class="sa-services-page-note__line" aria-hidden="true"></span>
				<p>A small, independent practice.</p>
				<p>Direct collaboration.</p>
				<p>Design and development in one place.</p>
			</aside>
		</section>

		<section class="sa-services-page-offers" aria-labelledby="sa-services-page-offers-title">
			<div class="sa-services-page-section-head">
				<span class="sa-about-eyebrow">WHAT I CAN HELP WITH</span>
				<h2 id="sa-services-page-offers-title">A clear website, built around what matters.</h2>
			</div>

			<div class="sa-services-page-list">
				<article class="sa-services-page-service">
					<span class="sa-services-page-service__number">01</span>
					<div class="sa-services-page-service__main">
						<h3>Custom Websites</h3>
						<p>A complete website shaped around your work, audience and goals, with a structure and visual direction developed specifically for the project.</p>
					</div>
					<ul class="sa-services-page-service__details">
						<li>Structure and content direction</li>
						<li>Visual design and responsive layouts</li>
						<li>Frontend development and launch</li>
					</ul>
				</article>

				<article class="sa-services-page-service">
					<span class="sa-services-page-service__number">02</span>
					<div class="sa-services-page-service__main">
						<h3>Landing Pages &amp; Portfolios</h3>
						<p>A focused digital presence for a person, service, product or launch &mdash; clear enough to understand and distinct enough to remember.</p>
					</div>
					<ul class="sa-services-page-service__details">
						<li>Clear page flow and messaging</li>
						<li>Individual visual direction</li>
						<li>Focused contact or conversion path</li>
					</ul>
				</article>

				<article class="sa-services-page-service">
					<span class="sa-services-page-service__number">03</span>
					<div class="sa-services-page-service__main">
						<h3>WordPress &amp; Editorial Systems</h3>
						<p>Custom publishing systems for websites, journals and evolving content that remain straightforward to use after launch.</p>
					</div>
					<ul class="sa-services-page-service__details">
						<li>Custom WordPress implementation</li>
						<li>Useful content structures</li>
						<li>Simple editing and handover</li>
					</ul>
				</article>

				<article class="sa-services-page-service">
					<span class="sa-services-page-service__number">04</span>
					<div class="sa-services-page-service__main">
						<h3>Website Refinement &amp; Ongoing Care</h3>
						<p>Targeted improvements for an existing website when the foundation is useful but the design, experience or performance needs attention.</p>
					</div>
					<ul class="sa-services-page-service__details">
						<li>Design and spacing refinement</li>
						<li>Usability and performance improvements</li>
						<li>Small, deliberate iterations</li>
					</ul>
				</article>
			</div>
		</section>

		<section class="sa-services-process" aria-labelledby="sa-services-process-title">
			<div class="sa-services-process__intro">
				<span class="sa-about-eyebrow">THE PROCESS</span>
				<h2 id="sa-services-process-title">One direct process.</h2>
				<p>You work directly with me throughout. We define what the website needs, make the important decisions together and refine it as one coherent piece of work.</p>
			</div>

			<ol class="sa-services-process__steps">
				<li><span>01</span><strong>Understand</strong><p>Your work, audience, goals and the real scope of the project.</p></li>
				<li><span>02</span><strong>Structure</strong><p>Content, hierarchy and a clear path through the website.</p></li>
				<li><span>03</span><strong>Design &amp; Build</strong><p>Visual direction and development shaped together from the start.</p></li>
				<li><span>04</span><strong>Refine &amp; Launch</strong><p>Details, responsive behaviour, performance and a careful handover.</p></li>
			</ol>
		</section>

		<section class="sa-services-fit" aria-labelledby="sa-services-fit-title">
			<div>
				<span class="sa-about-eyebrow">A GOOD FIT</span>
				<h2 id="sa-services-fit-title">Small enough to stay personal. Structured enough to do it properly.</h2>
			</div>
			<div class="sa-services-fit__body">
				<p>This way of working is a good fit when you value clear communication, thoughtful design and direct access to the person doing the work.</p>
				<ul>
					<li>You need a new website with a clear purpose.</li>
					<li>You want design and development to feel connected.</li>
					<li>You prefer a close, practical collaboration.</li>
					<li>You care about details without making the process complicated.</li>
				</ul>
			</div>
		</section>

		<section class="sa-services-contact">
			<span class="sa-about-eyebrow">START A PROJECT</span>
			<h2>Have something in mind?</h2>
			<p>Tell me what you are working on, what the website should do and where you are right now.</p>
			<a href="mailto:hello@studio-avelin.com">HELLO@STUDIO-AVELIN.COM <span aria-hidden="true">&rarr;</span></a>
		</section>

	</div>
</main>

<?php get_template_part( 'parts/sa-footer' ); ?>

<?php wp_footer(); ?>
</body>
</html>
