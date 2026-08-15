<?php
/**
 * Studio Avelin — standalone homepage template.
 *
 * This template deliberately does NOT call get_header() or get_footer():
 * the Twenty Twenty-Four block header/footer must not appear on the homepage.
 * The custom flat Studio Avelin header and footer live directly below.
 *
 * @package studio-avelin-child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$sa_home        = trailingslashit( home_url( '/' ) );
$sa_nav         = sa_child_nav_items( 'header' );
$sa_footer_nav  = sa_child_nav_items( 'footer' );
$sa_portrait_path = get_stylesheet_directory() . '/assets/img/portrait.jpg';
$sa_has_portrait  = file_exists( $sa_portrait_path );
$sa_portrait      = add_query_arg(
	'ver',
	$sa_has_portrait ? filemtime( $sa_portrait_path ) : SA_CHILD_VERSION,
	get_stylesheet_directory_uri() . '/assets/img/portrait.jpg'
);

$sa_projects = array(
	array(
		'name'     => 'STAN',
		'full'     => 'Studio Avelin Notes',
		'status'   => 'Live',
		'text'     => 'A focused notes and thinking app for collecting ideas, spaces, notes and tags.',
		'url'      => 'https://stan.studio-avelin.com/',
		'external' => true,
		'visual'   => 'notes',
	),
	array(
		'name'     => 'Portfolio Page',
		'full'     => 'MONROE Toyparty Landingpage',
		'status'   => 'Live',
		'text'     => 'A warm, discreet portfolio and landing page with a clear visual direction and a direct path from first impression to contact.',
		'url'      => $sa_home . 'work/monroe-toyparty-landingpage/',
		'external' => false,
		'visual'   => 'maaike',
	),
	array(
		'name'     => 'StAT',
		'full'     => 'Studio Avelin Training',
		'status'   => 'In Development',
		'text'     => 'A private training log for running, strength, goals, routes and progress.',
		'url'      => '',
		'external' => false,
		'visual'   => 'training',
	),
);

$sa_journal_posts = new WP_Query(
	array(
		'post_type'           => 'sa_journal',
		'post_status'         => 'publish',
		'posts_per_page'      => 3,
		'orderby'             => 'date',
		'order'               => 'DESC',
		'no_found_rows'       => true,
		'ignore_sticky_posts' => true,
	)
);
$sa_journal_marks = array( 'process', 'webwork', 'notes' );

/**
 * Inline SVG previews for the Work cards. Kept in the template so the theme
 * needs no image assets and no build step.
 *
 * @param string $kind Visual key.
 */
function sa_project_visual( $kind ) {
	switch ( $kind ) {
	case 'maaike':
			?>
			<svg class="sa-visual" viewBox="0 0 480 300" role="img" aria-label="Editorial portfolio website preview" preserveAspectRatio="xMidYMid slice">
				<rect width="480" height="300" fill="#f7f1ef" />
				<rect width="480" height="28" fill="#fffaf7" />
				<circle cx="16" cy="14" r="3.5" fill="#d9cfcc" />
				<circle cx="28" cy="14" r="3.5" fill="#c9b4b1" />
				<circle cx="40" cy="14" r="3.5" fill="#8e6668" />
				<rect x="60" y="10" width="54" height="7" rx="3.5" fill="#2b2728" opacity="0.82" />
				<g fill="#6f6263" opacity="0.7">
					<rect x="338" y="11" width="28" height="5" rx="2.5" />
					<rect x="378" y="11" width="28" height="5" rx="2.5" />
					<rect x="418" y="11" width="38" height="5" rx="2.5" />
				</g>
				<rect y="28" width="480" height="184" fill="#fffaf7" />
				<rect x="28" y="54" width="52" height="5" rx="2.5" fill="#a77b7c" />
				<rect x="28" y="76" width="186" height="15" rx="2" fill="#2b2728" />
				<rect x="28" y="99" width="154" height="15" rx="2" fill="#2b2728" />
				<rect x="28" y="128" width="172" height="6" rx="3" fill="#cfc2bf" />
				<rect x="28" y="142" width="150" height="6" rx="3" fill="#ded3d0" />
				<rect x="28" y="165" width="72" height="24" rx="12" fill="#8e6668" />
				<rect x="112" y="174" width="58" height="6" rx="3" fill="#6f6263" opacity="0.52" />
				<rect x="244" y="48" width="208" height="146" rx="2" fill="#ead6d2" />
				<path d="M244 48 H368 C338 80 322 121 326 194 H244 Z" fill="#d5aaa5" />
				<path d="M452 48 V194 H326 C360 162 382 113 390 48 Z" fill="#8e6668" />
				<circle cx="388" cy="112" r="40" fill="#f3e7e2" opacity="0.88" />
				<circle cx="388" cy="112" r="24" fill="#c58e8d" opacity="0.82" />
				<path d="M356 180 C372 154 397 145 432 148" fill="none" stroke="#fffaf7" stroke-width="2" opacity="0.75" />
				<rect y="212" width="480" height="88" fill="#f0e6e2" />
				<rect x="28" y="232" width="92" height="8" rx="4" fill="#2b2728" opacity="0.78" />
				<rect x="28" y="250" width="154" height="5" rx="2.5" fill="#c9bbb8" />
				<rect x="28" y="262" width="126" height="5" rx="2.5" fill="#d8ccc8" />
				<rect x="224" y="228" width="66" height="50" rx="2" fill="#c99996" />
				<rect x="302" y="228" width="66" height="50" rx="2" fill="#8e6668" />
				<rect x="380" y="228" width="72" height="50" rx="2" fill="#2b2728" />
			</svg>
			<?php
			break;

		case 'notes':
			?>
			<svg class="sa-visual" viewBox="0 0 480 300" role="img" aria-label="Notes app interface preview" preserveAspectRatio="xMidYMid slice">
				<rect width="480" height="300" fill="#f8f8f8" />
				<rect x="0" y="0" width="480" height="26" fill="#eeeeec" />
				<circle cx="16" cy="13" r="3.5" fill="#c9c9c6" />
				<circle cx="28" cy="13" r="3.5" fill="#c9c9c6" />
				<circle cx="40" cy="13" r="3.5" fill="#c7f000" />
				<rect x="60" y="8" width="120" height="10" rx="5" fill="#e2e2df" />
				<rect x="0" y="26" width="124" height="274" fill="#f1f1ef" />
				<rect x="16" y="46" width="70" height="8" rx="4" fill="#d3d3d0" />
				<rect x="16" y="70" width="92" height="8" rx="4" fill="#151922" opacity="0.75" />
				<rect x="16" y="90" width="78" height="8" rx="4" fill="#d3d3d0" />
				<rect x="16" y="110" width="86" height="8" rx="4" fill="#d3d3d0" />
				<rect x="16" y="130" width="64" height="8" rx="4" fill="#d3d3d0" />
				<rect x="10" y="64" width="3" height="20" fill="#c7f000" />
				<rect x="150" y="52" width="212" height="16" rx="3" fill="#151922" opacity="0.85" />
				<rect x="150" y="90" width="290" height="7" rx="3.5" fill="#dededb" />
				<rect x="150" y="106" width="256" height="7" rx="3.5" fill="#dededb" />
				<rect x="150" y="122" width="278" height="7" rx="3.5" fill="#dededb" />
				<rect x="150" y="138" width="180" height="7" rx="3.5" fill="#dededb" />
				<rect x="150" y="170" width="60" height="20" rx="10" fill="#c7f000" />
				<rect x="220" y="170" width="52" height="20" rx="10" fill="#e6e6e3" />
				<rect x="282" y="170" width="44" height="20" rx="10" fill="#e6e6e3" />
				<rect x="150" y="212" width="290" height="7" rx="3.5" fill="#e6e6e3" />
				<rect x="150" y="228" width="230" height="7" rx="3.5" fill="#e6e6e3" />
				<rect x="150" y="244" width="264" height="7" rx="3.5" fill="#e6e6e3" />
			</svg>
			<?php
			break;

		case 'training':
			?>
			<svg class="sa-visual" viewBox="0 0 480 300" role="img" aria-label="Training log dashboard preview" preserveAspectRatio="xMidYMid slice">
				<rect width="480" height="300" fill="#f8f8f8" />
				<rect x="0" y="0" width="480" height="26" fill="#eeeeec" />
				<rect x="16" y="9" width="96" height="9" rx="4.5" fill="#d5d5d2" />
				<rect x="24" y="46" width="132" height="12" rx="6" fill="#151922" opacity="0.8" />
				<rect x="24" y="76" width="200" height="120" fill="#ffffff" stroke="#e2e2df" />
				<polyline points="36,168 66,150 96,158 126,120 156,132 186,96 210,104"
					fill="none" stroke="#151922" stroke-width="2" opacity="0.7" />
				<polyline points="36,182 66,176 96,180 126,164 156,170 186,150 210,156"
					fill="none" stroke="#c7f000" stroke-width="2.5" />
				<circle cx="186" cy="96" r="4" fill="#c7f000" stroke="#151922" stroke-width="1.5" />
				<rect x="36" y="90" width="60" height="7" rx="3.5" fill="#e4e4e1" />
				<rect x="248" y="76" width="208" height="56" fill="#ffffff" stroke="#e2e2df" />
				<rect x="262" y="90" width="70" height="8" rx="4" fill="#151922" opacity="0.7" />
				<rect x="262" y="108" width="120" height="7" rx="3.5" fill="#e4e4e1" />
				<rect x="248" y="140" width="208" height="56" fill="#ffffff" stroke="#e2e2df" />
				<rect x="262" y="154" width="54" height="8" rx="4" fill="#151922" opacity="0.7" />
				<rect x="262" y="172" width="150" height="7" rx="3.5" fill="#e4e4e1" />
				<rect x="440" y="154" width="4" height="26" fill="#c7f000" />
				<g fill="#e9e9e6">
					<rect x="24" y="216" width="42" height="42" />
					<rect x="76" y="216" width="42" height="42" />
					<rect x="128" y="216" width="42" height="42" />
					<rect x="180" y="216" width="42" height="42" />
					<rect x="232" y="216" width="42" height="42" />
					<rect x="284" y="216" width="42" height="42" />
					<rect x="336" y="216" width="42" height="42" />
				</g>
				<rect x="128" y="216" width="42" height="42" fill="#151922" opacity="0.14" />
				<rect x="284" y="216" width="42" height="42" fill="#c7f000" opacity="0.85" />
			</svg>
			<?php
			break;

		default:
			?>
			<svg class="sa-visual" viewBox="0 0 480 300" role="img" aria-label="Travel planner and trip journal preview" preserveAspectRatio="xMidYMid slice">
				<rect width="480" height="300" fill="#f8f8f8" />
				<rect x="0" y="0" width="480" height="26" fill="#eeeeec" />
				<rect x="16" y="9" width="110" height="9" rx="4.5" fill="#d5d5d2" />
				<rect x="24" y="46" width="268" height="150" fill="#f1f1ef" stroke="#e2e2df" />
				<g stroke="#dcdcda" stroke-width="1">
					<path d="M24 96 H292" />
					<path d="M24 146 H292" />
					<path d="M108 46 V196" />
					<path d="M200 46 V196" />
				</g>
				<path d="M46 176 C 92 150, 78 108, 128 96 S 208 108, 232 68"
					fill="none" stroke="#151922" stroke-width="2" stroke-linecap="round"
					stroke-dasharray="7 6" opacity="0.75" />
				<circle cx="46" cy="176" r="5" fill="#151922" />
				<circle cx="128" cy="96" r="5" fill="#151922" />
				<circle cx="232" cy="68" r="7" fill="#c7f000" stroke="#151922" stroke-width="1.5" />
				<rect x="56" y="164" width="44" height="7" rx="3.5" fill="#dcdcda" />
				<rect x="138" y="84" width="52" height="7" rx="3.5" fill="#dcdcda" />
				<rect x="240" y="56" width="40" height="7" rx="3.5" fill="#151922" opacity="0.6" />
				<rect x="308" y="46" width="148" height="150" fill="#ffffff" stroke="#e2e2df" />
				<rect x="322" y="60" width="66" height="8" rx="4" fill="#151922" opacity="0.7" />
				<rect x="322" y="82" width="120" height="6" rx="3" fill="#e6e6e3" />
				<rect x="322" y="96" width="100" height="6" rx="3" fill="#e6e6e3" />
				<rect x="322" y="116" width="120" height="6" rx="3" fill="#e6e6e3" />
				<rect x="322" y="130" width="84" height="6" rx="3" fill="#e6e6e3" />
				<rect x="322" y="152" width="56" height="18" rx="9" fill="#c7f000" />
				<g>
					<rect x="24" y="214" width="138" height="62" fill="#ffffff" stroke="#e2e2df" />
					<rect x="34" y="224" width="42" height="42" fill="#ececea" />
					<rect x="86" y="228" width="60" height="6" rx="3" fill="#dcdcda" />
					<rect x="86" y="242" width="46" height="6" rx="3" fill="#e8e8e5" />
					<rect x="86" y="254" width="54" height="6" rx="3" fill="#e8e8e5" />
					<rect x="172" y="214" width="138" height="62" fill="#ffffff" stroke="#e2e2df" />
					<rect x="182" y="224" width="42" height="42" fill="#ececea" />
					<rect x="234" y="228" width="60" height="6" rx="3" fill="#dcdcda" />
					<rect x="234" y="242" width="46" height="6" rx="3" fill="#e8e8e5" />
					<rect x="234" y="254" width="54" height="6" rx="3" fill="#e8e8e5" />
					<rect x="320" y="214" width="136" height="62" fill="#ffffff" stroke="#e2e2df" />
					<rect x="330" y="224" width="42" height="42" fill="#ececea" />
					<rect x="382" y="228" width="60" height="6" rx="3" fill="#dcdcda" />
					<rect x="382" y="242" width="46" height="6" rx="3" fill="#e8e8e5" />
					<rect x="382" y="254" width="54" height="6" rx="3" fill="#e8e8e5" />
				</g>
			</svg>
			<?php
			break;
	}
}

/**
 * Inline SVG marks for experiment tiles and journal covers.
 *
 * @param string $kind Mark key.
 */
function sa_mark( $kind ) {
	switch ( $kind ) {
		case 'matrix':
			?>
			<svg class="sa-mark" viewBox="0 0 120 120" aria-hidden="true">
				<g font-family="monospace" font-size="11" fill="#151922" opacity="0.55">
					<text x="14" y="24">0 1 1 0</text>
					<text x="14" y="46">1 0 1 1</text>
					<text x="14" y="68">0 1 0 0</text>
					<text x="14" y="90">1 1 0 1</text>
				</g>
				<rect x="70" y="36" width="12" height="12" fill="#c7f000" />
				<path d="M14 104 H106" stroke="#151922" stroke-width="1" opacity="0.35" />
			</svg>
			<?php
			break;

		case 'grid':
			?>
			<svg class="sa-mark" viewBox="0 0 120 120" aria-hidden="true">
				<g stroke="#151922" stroke-width="1" opacity="0.35">
					<path d="M20 20 H100 M20 44 H100 M20 68 H100 M20 92 H100" />
					<path d="M20 20 V92 M44 20 V92 M68 20 V92 M92 20 V92" />
				</g>
				<circle cx="44" cy="44" r="5" fill="#151922" />
				<circle cx="68" cy="68" r="8" fill="#c7f000" />
				<circle cx="92" cy="20" r="4" fill="#151922" opacity="0.6" />
			</svg>
			<?php
			break;

		case 'poster':
			?>
			<svg class="sa-mark" viewBox="0 0 120 120" aria-hidden="true">
				<rect x="26" y="16" width="68" height="88" fill="none" stroke="#151922" opacity="0.45" />
				<rect x="36" y="28" width="48" height="26" fill="#c7f000" />
				<rect x="36" y="64" width="48" height="5" fill="#151922" opacity="0.5" />
				<rect x="36" y="76" width="34" height="5" fill="#151922" opacity="0.3" />
				<rect x="36" y="88" width="42" height="5" fill="#151922" opacity="0.3" />
			</svg>
			<?php
			break;

		case 'future':
			?>
			<svg class="sa-mark" viewBox="0 0 120 120" aria-hidden="true">
				<circle cx="60" cy="60" r="34" fill="none" stroke="#151922" stroke-width="1"
					stroke-dasharray="5 7" opacity="0.45" />
				<path d="M60 40 V60 L74 70" stroke="#151922" stroke-width="1.5" fill="none" opacity="0.6" />
				<circle cx="60" cy="60" r="3" fill="#c7f000" />
			</svg>
			<?php
			break;

		case 'process':
			?>
			<svg class="sa-mark" viewBox="0 0 120 120" aria-hidden="true">
				<path d="M20 84 C 44 84, 44 36, 68 36 S 92 60, 100 52"
					fill="none" stroke="#151922" stroke-width="1.5" opacity="0.6" />
				<circle cx="20" cy="84" r="4" fill="#151922" />
				<circle cx="68" cy="36" r="6" fill="#c7f000" />
				<path d="M20 100 H100" stroke="#151922" opacity="0.25" />
			</svg>
			<?php
			break;

		case 'webwork':
			?>
			<svg class="sa-mark" viewBox="0 0 120 120" aria-hidden="true">
				<rect x="18" y="26" width="84" height="60" fill="none" stroke="#151922" opacity="0.45" />
				<path d="M18 40 H102" stroke="#151922" opacity="0.35" />
				<rect x="26" y="50" width="30" height="26" fill="#e6e6e3" />
				<rect x="62" y="50" width="32" height="5" fill="#151922" opacity="0.4" />
				<rect x="62" y="62" width="24" height="5" fill="#151922" opacity="0.25" />
				<rect x="62" y="74" width="28" height="5" fill="#c7f000" />
			</svg>
			<?php
			break;

		default:
			?>
			<svg class="sa-mark" viewBox="0 0 120 120" aria-hidden="true">
				<rect x="24" y="24" width="72" height="72" fill="none" stroke="#151922" opacity="0.4" />
				<path d="M24 60 H96 M60 24 V96" stroke="#151922" opacity="0.25" />
				<circle cx="60" cy="60" r="18" fill="none" stroke="#151922" opacity="0.5" />
				<circle cx="78" cy="42" r="6" fill="#c7f000" />
			</svg>
			<?php
			break;
	}
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="profile" href="https://gmpg.org/xfn/11" />
	<?php wp_head(); ?>
</head>

<body <?php body_class( 'sa-front' ); ?>>
<?php wp_body_open(); ?>

<a class="sa-skip" href="#work">Skip to content</a>

<?php get_template_part( 'parts/sa-header' ); ?>

<main class="sa-main" id="sa-main">

	<!-- ============================ HERO ============================ -->
	<section class="sa-hero" id="top" aria-label="Introduction">
		<div class="sa-hero__canvas-wrap" aria-hidden="true">
			<canvas class="sa-hero__canvas" id="sa-hero-canvas"></canvas>
		</div>
		<span class="sa-hero__glow sa-hero__glow--a" aria-hidden="true"></span>
		<span class="sa-hero__glow sa-hero__glow--b" aria-hidden="true"></span>

		<div class="sa-hero__inner sa-shell">
			<div class="sa-hero__content sa-stagger">
				<div class="sa-eyebrow-row sa-reveal">
					<span class="sa-rule" aria-hidden="true"></span>
					<span class="sa-eyebrow">Independent Web Design &amp; Development</span>
				</div>

				<p class="sa-claim sa-reveal">DESIGN. <span>CODE.</span> CREATE.</p>

				<h1 class="sa-hero__title sa-reveal">
					Thoughtful websites.<br />
					Designed and built with care.
				</h1>

				<div class="sa-hero__foot sa-reveal">
					<p class="sa-hero__lead">
						Studio Avelin creates custom websites for independent professionals,
						small businesses and focused digital products.
					</p>

					<div class="sa-hero__actions">
						<a class="sa-hero__cta" href="#work">
							<span>View Work</span>
							<span class="sa-btn__arrow" aria-hidden="true">&rarr;</span>
						</a>
						<a class="sa-link-lime sa-hero__project-link" href="#contact">
							Start a Project <span class="sa-btn__arrow" aria-hidden="true">&rarr;</span>
						</a>
					</div>
				</div>
			</div>
		</div>

	</section>

	<!-- ============================ WORK ============================ -->
	<section class="sa-section" id="work" aria-labelledby="sa-work-title">
		<div class="sa-shell">
			<div class="sa-section__head sa-stagger">
				<p class="sa-eyebrow sa-eyebrow--dot sa-reveal">Projects &middot; 01&ndash;03</p>
				<h2 class="sa-section__title sa-reveal" id="sa-work-title">Selected Work</h2>
				<p class="sa-section__intro sa-reveal">
					Selected client work and independent products &mdash; clear in purpose,
					designed and built with care.
				</p>
			</div>

			<ul class="sa-work sa-stagger">
				<?php foreach ( $sa_projects as $index => $project ) : ?>
					<li class="sa-work__item sa-reveal<?php echo ( 1 === $index % 2 ) ? ' sa-work__item--reverse' : ''; ?>">
						<?php
						$sa_tag        = $project['url'] ? 'a' : 'div';
						$sa_attributes = '';
						if ( $project['url'] ) {
							$sa_attributes = ' href="' . esc_url( $project['url'] ) . '"';
							if ( $project['external'] ) {
								$sa_attributes .= ' target="_blank" rel="noopener noreferrer"';
							}
						}
						?>
						<<?php echo esc_html( $sa_tag ) . $sa_attributes; // phpcs:ignore WordPress.Security.EscapeOutput ?> class="sa-work__link">
							<div class="sa-work__visual">
								<span class="sa-bracket sa-bracket--tl" aria-hidden="true"></span>
								<span class="sa-bracket sa-bracket--br" aria-hidden="true"></span>
								<div class="sa-work__frame">
									<?php sa_project_visual( $project['visual'] ); ?>
								</div>
							</div>

							<div class="sa-work__body">
								<span class="sa-work__index"><?php echo esc_html( str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?></span>
								<div class="sa-work__text">
									<h3 class="sa-work__name"><?php echo esc_html( $project['name'] ); ?></h3>
									<p class="sa-work__full"><?php echo esc_html( $project['full'] ); ?></p>
									<span class="sa-pill sa-pill--<?php echo esc_attr( sanitize_title( $project['status'] ) ); ?>">
										<span class="sa-pill__dot" aria-hidden="true"></span>
										<?php echo esc_html( $project['status'] ); ?>
									</span>
									<p class="sa-work__desc"><?php echo esc_html( $project['text'] ); ?></p>
									<?php if ( $project['url'] ) : ?>
										<span class="sa-inline-cta">
											Visit project <span class="sa-btn__arrow" aria-hidden="true">&rarr;</span>
										</span>
									<?php else : ?>
										<span class="sa-inline-cta sa-inline-cta--muted">In progress</span>
									<?php endif; ?>
								</div>
							</div>
						</<?php echo esc_html( $sa_tag ); ?>>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
	</section>

	<!-- ========================== SERVICES ========================== -->
	<section class="sa-section" id="services" aria-labelledby="sa-services-title">
		<div class="sa-shell">
			<div class="sa-section__head sa-stagger">
				<p class="sa-eyebrow sa-eyebrow--dot sa-reveal">Services</p>
				<h2 class="sa-section__title sa-reveal" id="sa-services-title">Design and development, kept focused.</h2>
				<p class="sa-section__intro sa-reveal">
					Direct collaboration from the first idea to a carefully built, responsive website.
				</p>
			</div>

			<ul class="sa-services sa-stagger">
				<li class="sa-services__item sa-reveal">
					<span class="sa-services__index">01</span>
					<h3 class="sa-services__title">Custom Websites</h3>
					<p class="sa-services__text">Distinctive, responsive websites designed and built around a clear purpose.</p>
				</li>
				<li class="sa-services__item sa-reveal">
					<span class="sa-services__index">02</span>
					<h3 class="sa-services__title">Landing Pages &amp; Portfolios</h3>
					<p class="sa-services__text">Focused pages for independent professionals, services, products and launches.</p>
				</li>
				<li class="sa-services__item sa-reveal">
					<span class="sa-services__index">03</span>
					<h3 class="sa-services__title">WordPress &amp; Editorial Systems</h3>
					<p class="sa-services__text">Flexible publishing setups that remain easy to maintain after launch.</p>
				</li>
				<li class="sa-services__item sa-reveal">
					<span class="sa-services__index">04</span>
					<h3 class="sa-services__title">Website Refinement &amp; Ongoing Care</h3>
					<p class="sa-services__text">Thoughtful improvements to design, structure, performance and usability &mdash; without rebuilding what already works.</p>
				</li>
			</ul>

			<div class="sa-section__foot sa-reveal">
				<a class="sa-link-lime" href="<?php echo esc_url( $sa_home . 'services/' ); ?>">
					Explore services <span class="sa-btn__arrow" aria-hidden="true">&rarr;</span>
				</a>
			</div>
		</div>
	</section>

	<!-- ============================ ABOUT ============================ -->
	<section class="sa-section" id="about" aria-labelledby="sa-about-title">
		<div class="sa-shell">
			<div class="sa-about sa-stagger">
				<div class="sa-about__media sa-reveal">
					<div class="sa-about__frame">
						<?php if ( $sa_has_portrait ) : ?>
							<img class="sa-about__img" src="<?php echo esc_url( $sa_portrait ); ?>"
								alt="Portrait of the person behind Studio Avelin" loading="lazy"
								width="800" height="800" />
						<?php else : ?>
							<div class="sa-about__graphic">
								<svg viewBox="0 0 320 320" aria-hidden="true">
									<rect width="320" height="320" fill="#f8f8f8" />
									<g stroke="#151922" opacity="0.12">
										<path d="M0 80 H320 M0 160 H320 M0 240 H320" />
										<path d="M80 0 V320 M160 0 V320 M240 0 V320" />
									</g>
									<circle cx="160" cy="160" r="80" fill="none" stroke="#151922" opacity="0.45" />
									<circle cx="216" cy="120" r="14" fill="#c7f000" />
								</svg>
							</div>
						<?php endif; ?>
					</div>
					<div class="sa-about__mark" aria-hidden="true">
						<span class="sa-about__mark-logo">A<span>/</span></span>
						<span class="sa-about__mark-name">Studio Avelin</span>
					</div>
				</div>

				<div class="sa-about__body sa-reveal">
					<p class="sa-eyebrow sa-eyebrow--dot">About</p>
					<h2 class="sa-about__title" id="sa-about-title">
						Studio Avelin is the independent design and development practice of Michael Fiebus &mdash; focused on thoughtful websites, useful digital products and direct collaboration.
					</h2>
					<a class="sa-link-lime" href="<?php echo esc_url( $sa_home . 'about-me/' ); ?>">
						More About Me <span class="sa-btn__arrow" aria-hidden="true">&rarr;</span>
					</a>
				</div>
			</div>
		</div>
	</section>

	<!-- =========================== JOURNAL =========================== -->
	<section class="sa-section" id="journal" aria-labelledby="sa-journal-title">
		<div class="sa-shell">
			<div class="sa-section__head-row">
				<div class="sa-section__head sa-stagger">
					<p class="sa-eyebrow sa-eyebrow--dot sa-reveal">Notes &amp; Writing</p>
					<h2 class="sa-section__title sa-reveal" id="sa-journal-title">Journal</h2>
					<p class="sa-section__intro sa-reveal">
						Notes on design, code, webwork, process and small creative ideas.
					</p>
				</div>
				<a class="sa-link-lime sa-reveal" href="<?php echo esc_url( $sa_home . 'journal/' ); ?>">
					All notes <span class="sa-btn__arrow" aria-hidden="true">&rarr;</span>
				</a>
			</div>

			<?php if ( $sa_journal_posts->have_posts() ) : ?>
			<ul class="sa-journal sa-stagger">
				<?php $sa_journal_index = 0; ?>
				<?php while ( $sa_journal_posts->have_posts() ) : ?>
					<?php
					$sa_journal_posts->the_post();
					$sa_journal_terms   = get_the_terms( get_the_ID(), 'sa_journal_category' );
					$sa_journal_category = ( $sa_journal_terms && ! is_wp_error( $sa_journal_terms ) ) ? $sa_journal_terms[0]->name : 'Journal';
					$sa_journal_excerpt  = get_the_excerpt();
					$sa_journal_mark     = $sa_journal_marks[ $sa_journal_index % count( $sa_journal_marks ) ];
					$sa_journal_index++;
					?>
					<li class="sa-journal__item sa-reveal">
						<a class="sa-journal__link" href="<?php the_permalink(); ?>">
							<div class="sa-journal__cover<?php echo has_post_thumbnail() ? ' sa-journal__cover--image' : ''; ?>">
								<span class="sa-grid-bg" aria-hidden="true"></span>
								<?php if ( has_post_thumbnail() ) : ?>
									<?php the_post_thumbnail( 'large', array( 'class' => 'sa-journal__image', 'loading' => 'lazy' ) ); ?>
								<?php else : ?>
									<?php sa_mark( $sa_journal_mark ); ?>
								<?php endif; ?>
								<span class="sa-journal__cat">
									<span class="sa-journal__cat-dot" aria-hidden="true"></span>
									<?php echo esc_html( $sa_journal_category ); ?>
								</span>
								<span class="sa-journal__read"><?php echo esc_html( sa_journal_reading_time() ); ?> min read</span>
								<span class="sa-journal__sweep" aria-hidden="true"></span>
							</div>
							<h3 class="sa-journal__title"><span><?php the_title(); ?></span></h3>
							<?php if ( $sa_journal_excerpt ) : ?>
								<p class="sa-journal__excerpt"><?php echo esc_html( $sa_journal_excerpt ); ?></p>
							<?php endif; ?>
							<span class="sa-journal__date"><?php echo esc_html( get_the_date() ); ?></span>
						</a>
					</li>
				<?php endwhile; ?>
			</ul>
			<?php wp_reset_postdata(); ?>
			<?php endif; ?>
		</div>
	</section>

	<!-- ========================== SAY HELLO ========================== -->
	<section class="sa-section sa-contact" id="contact" aria-labelledby="sa-contact-title">
		<span class="sa-contact__glow" aria-hidden="true"></span>
		<div class="sa-shell">
			<div class="sa-stagger sa-contact__inner">
				<p class="sa-eyebrow sa-eyebrow--dot sa-reveal">Say Hello</p>
				<h2 class="sa-contact__title sa-reveal" id="sa-contact-title">
					For ideas, feedback, collaborations<br class="sa-br-md" /> or just a quick hello.
				</h2>

				<a class="sa-contact__mail sa-reveal" href="mailto:hello@studio-avelin.com">
					<span class="sa-contact__mail-text">hello@studio-avelin.com</span>
					<span class="sa-btn__arrow" aria-hidden="true">&rarr;</span>
				</a>

				<div class="sa-contact__social sa-reveal">
					<a class="sa-link-lime" href="https://instagram.com/" target="_blank" rel="noopener noreferrer">
						Instagram
					</a>
					<a class="sa-link-lime" href="https://github.com/studio-avelin" target="_blank" rel="noopener noreferrer">
						GitHub
					</a>
				</div>
			</div>
		</div>
	</section>

</main>

<?php get_template_part( 'parts/sa-footer' ); ?>

<?php wp_footer(); ?>
</body>
</html>
