<?php
/**
 * Studio Avelin — About Me page template.
 *
 * Mirrors the React reference implementation (src/routes/about-me.tsx):
 * a two-column layout with a compact, portrait-oriented 4:5 image on the
 * left (approx. 5/12 of the content width) and the About text on the right.
 *
 * Like front-page.php this template supplies the flat Studio Avelin header
 * and footer instead of the Twenty Twenty-Four block chrome.
 *
 * @package studio-avelin-child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$sa_home         = trailingslashit( home_url( '/' ) );
$sa_nav          = sa_child_nav_items( 'header' );
$sa_footer_nav   = sa_child_nav_items( 'footer' );
$sa_portrait     = get_stylesheet_directory_uri() . '/assets/img/portrait.jpg';
$sa_has_portrait = file_exists( get_stylesheet_directory() . '/assets/img/portrait.jpg' );

$sa_interests = array(
	array( 'Calm interfaces', 'Tools that respect attention.' ),
	array( 'Typography', 'Type as the bones of design.' ),
	array( 'Small apps', 'Single-purpose, well-made.' ),
	array( 'Webwork', 'HTML, CSS and the open web.' ),
	array( 'Writing', 'Thinking through making.' ),
	array( 'Quiet motion', 'Animation that supports, not shouts.' ),
);
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<?php wp_head(); ?>
</head>

<body <?php body_class( 'sa-front sa-page' ); ?>>
<?php wp_body_open(); ?>

<a class="sa-skip" href="#sa-main">Skip to content</a>

<header class="sa-front-header" id="sa-header">
	<div class="sa-front-header__inner">
		<a class="sa-brand" href="<?php echo esc_url( $sa_home ); ?>">
			Studio Avelin
			<span class="sa-brand__dot" aria-hidden="true"></span>
		</a>

		<button class="sa-nav-toggle" type="button" aria-expanded="false" aria-controls="sa-nav" data-sa-nav-toggle>
			<span class="sa-nav-toggle__bars" aria-hidden="true"></span>
			<span class="sa-nav-toggle__label">Menu</span>
		</button>

		<nav class="sa-nav" id="sa-nav" aria-label="Primary">
			<ul class="sa-nav__list">
				<?php foreach ( $sa_nav as $item ) : ?>
					<li class="sa-nav__item">
						<a class="sa-nav__link" href="<?php echo esc_url( $item['url'] ); ?>"><?php echo esc_html( $item['label'] ); ?></a>
					</li>
				<?php endforeach; ?>
			</ul>
		</nav>
	</div>
</header>

<main class="sa-main" id="sa-main">

	<section class="sa-page-hero" aria-labelledby="sa-about-title">
		<div class="sa-shell sa-page-hero__inner">
			<div class="sa-about-grid">

				<div class="sa-about-grid__media">
					<div class="sa-about-portrait">
						<span class="sa-about-portrait__offset" aria-hidden="true"></span>
						<div class="sa-about-portrait__frame">
							<?php if ( $sa_has_portrait ) : ?>
								<img
									class="sa-about-portrait__img"
									src="<?php echo esc_url( $sa_portrait ); ?>"
									width="896"
									height="1120"
									alt="Portrait of Michael, the person behind Studio Avelin"
									loading="lazy"
									decoding="async"
								/>
							<?php else : ?>
								<span class="sa-about-portrait__placeholder" aria-hidden="true"></span>
							<?php endif; ?>
							<span class="sa-about-portrait__caption" aria-hidden="true">
								<span class="sa-about-portrait__dot"></span>
								Studio Avelin
							</span>
						</div>
					</div>
				</div>

				<div class="sa-about-grid__body">
					<p class="sa-eyebrow sa-eyebrow--dot">About</p>

					<h1 class="sa-about-title" id="sa-about-title">
						Hi, I&rsquo;m Michael &mdash;<br />
						the person behind Studio Avelin.
					</h1>

					<p class="sa-about-lead">
						Studio Avelin is my personal corner of the web. A place to design small apps,
						sketch visual ideas and write down what I notice along the way.
					</p>

					<p class="sa-about-lead">
						I gravitate toward calm interfaces, careful typography and tools that stay out
						of the way. Most of what I make starts as a small idea &mdash; and stays small
						on purpose.
					</p>

					<p class="sa-about-note">
						Currently somewhere in Germany, mostly between a keyboard and a sketchbook.
					</p>

					<div class="sa-about-actions">
						<a class="sa-btn sa-btn--dark" href="mailto:hello@studio-avelin.com">
							<span class="sa-btn__text">Say hello</span>
							<span class="sa-btn__arrow" aria-hidden="true">&rarr;</span>
						</a>
						<a class="sa-link-lime" href="<?php echo esc_url( $sa_home . 'journal/' ); ?>">Read the journal</a>
					</div>
				</div>

			</div>
		</div>
	</section>

	<section class="sa-page-section" aria-label="Interests">
		<div class="sa-shell">
			<div class="sa-about-interests">
				<div class="sa-about-interests__intro">
					<p class="sa-eyebrow sa-eyebrow--dot">What I&rsquo;m into</p>
					<h2 class="sa-about-interests__title">A short list, honestly kept.</h2>
				</div>
				<ul class="sa-about-interests__list">
					<?php foreach ( $sa_interests as $sa_item ) : ?>
						<li>
							<p class="sa-about-interests__key"><?php echo esc_html( $sa_item[0] ); ?></p>
							<p class="sa-about-interests__val"><?php echo esc_html( $sa_item[1] ); ?></p>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>
		</div>
	</section>

</main>

<footer class="sa-front-footer" id="sa-footer">
	<div class="sa-shell">
		<div class="sa-front-footer__top">
			<div class="sa-front-footer__brand">
				<a class="sa-brand sa-brand--footer" href="<?php echo esc_url( $sa_home ); ?>">
					Studio Avelin
					<span class="sa-brand__dot" aria-hidden="true"></span>
				</a>
				<p class="sa-front-footer__tag">Design. Code. Create.</p>
			</div>

			<div class="sa-front-footer__cols">
				<div class="sa-front-footer__col">
					<h2 class="sa-front-footer__heading">Explore</h2>
					<ul>
						<?php foreach ( $sa_footer_nav as $item ) : ?>
							<li><a href="<?php echo esc_url( $item['url'] ); ?>"><?php echo esc_html( $item['label'] ); ?></a></li>
						<?php endforeach; ?>
					</ul>
				</div>

				<div class="sa-front-footer__col">
					<h2 class="sa-front-footer__heading">Legal</h2>
					<ul>
						<li><a href="<?php echo esc_url( $sa_home . 'datenschutzerklaerung/' ); ?>">Datenschutzerkl&auml;rung</a></li>
						<li><a href="<?php echo esc_url( $sa_home . 'impressum/' ); ?>">Impressum</a></li>
					</ul>
				</div>

				<div class="sa-front-footer__col">
					<h2 class="sa-front-footer__heading">Social</h2>
					<ul>
						<li><a href="https://instagram.com/" target="_blank" rel="noopener noreferrer">Instagram</a></li>
						<li><a href="https://github.com/" target="_blank" rel="noopener noreferrer">GitHub</a></li>
					</ul>
				</div>
			</div>
		</div>

		<div class="sa-front-footer__bottom">
			<p>&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> Studio Avelin</p>
			<p><a href="mailto:hello@studio-avelin.com">hello@studio-avelin.com</a></p>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
