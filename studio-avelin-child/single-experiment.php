<?php
/**
 * Studio Avelin — Single Experiment Template.
 *
 * Dedicated interactive page for individual experiments (Matrix, Signal Grid, Poster Generator).
 *
 * @package studio-avelin-child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$sa_home        = trailingslashit( home_url( '/' ) );
$sa_nav         = sa_child_nav_items( 'header' );
$sa_footer_nav = sa_child_nav_items( 'footer' );

$request_uri = trim( parse_url( $_SERVER['REQUEST_URI'], PHP_URL_PATH ), '/' );
$exp_slug    = str_replace( 'experiments/', '', $request_uri );

$exp_details = array(
	'matrix' => array(
		'title' => 'Matrix',
		'eyebrow' => 'Generative Type Grid',
		'meta' => 'CODE · TYPOGRAPHY · MOTION',
		'desc' => 'A shifting field of characters, noise and movement. A small browser experiment exploring rhythm, density and controlled randomness.',
	),
	'avelin-signal-grid' => array(
		'title' => 'Avelin Signal Grid',
		'eyebrow' => 'Canvas Study',
		'meta' => 'CODE · CANVAS · INTERACTION',
		'desc' => 'Signals travelling across a fine digital grid. A study in small rules, interaction and quiet interference patterns.',
	),
	'poster-generator' => array(
		'title' => 'Poster Generator',
		'eyebrow' => 'Design Tool',
		'meta' => 'DESIGN · TYPOGRAPHY · TOOL',
		'desc' => 'A small tool for generating editorial posters using typography, spacing and a single accent colour.',
	),
);

$current_exp = isset( $exp_details[ $exp_slug ] ) ? $exp_details[ $exp_slug ] : array(
	'title' => ucfirst( str_replace( '-', ' ', $exp_slug ) ),
	'eyebrow' => 'Creative Experiment',
	'meta' => 'CODE · DESIGN · LAB',
	'desc' => 'An interactive digital experiment from Studio Avelin.',
);
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<?php wp_head(); ?>
</head>

<body <?php body_class( array( 'home', 'sa-front', 'sa-page', 'sa-page--experiment-single' ) ); ?>>
<?php wp_body_open(); ?>

<a class="sa-skip" href="#sa-main">Skip to content</a>

<?php get_template_part( 'parts/sa-header' ); ?>

<!-- ========================= MAIN EXPERIMENT CANVAS ========================= -->
<main class="sa-main sa-exp-single" id="sa-main">
	<div class="sa-about-container">

		<!-- TOP NAVIGATION LINK -->
		<div class="sa-exp-single__back">
			<a href="<?php echo esc_url( $sa_home . 'experiments/' ); ?>" class="sa-exp-back-link">
				&larr; Back to Experiments
			</a>
		</div>

		<!-- EXPERIMENT HERO HEAD -->
		<div class="sa-exp-single__head">
			<span class="sa-exp-single__eyebrow"><?php echo esc_html( $current_exp['eyebrow'] ); ?></span>
			<h1 class="sa-exp-single__title"><?php echo esc_html( $current_exp['title'] ); ?></h1>
			<p class="sa-exp-single__desc"><?php echo esc_html( $current_exp['desc'] ); ?></p>
			<span class="sa-exp-single__meta"><?php echo esc_html( $current_exp['meta'] ); ?></span>
		</div>

		<!-- INTERACTIVE CANVAS DISPLAY CONTAINER -->
		<div class="sa-exp-stage">
			<canvas id="sa-exp-single-canvas" class="sa-exp-single__canvas"></canvas>
		</div>

	</div>
</main>

<?php get_template_part( 'parts/sa-footer' ); ?>

<script>
document.addEventListener('DOMContentLoaded', function() {
	const canvas = document.getElementById('sa-exp-single-canvas');
	if (!canvas) return;
	const ctx = canvas.getContext('2d');
	const expType = '<?php echo esc_js( $exp_slug ); ?>';

	function resize() {
		canvas.width = canvas.parentElement.clientWidth * window.devicePixelRatio;
		canvas.height = canvas.parentElement.clientHeight * window.devicePixelRatio;
		ctx.scale(window.devicePixelRatio, window.devicePixelRatio);
	}
	resize();
	window.addEventListener('resize', resize);

	let mouseX = 0, mouseY = 0;
	canvas.parentElement.addEventListener('mousemove', function(e) {
		const rect = canvas.getBoundingClientRect();
		mouseX = e.clientX - rect.left;
		mouseY = e.clientY - rect.top;
	});

	let frame = 0;

	function render() {
		frame++;
		const w = canvas.parentElement.clientWidth;
		const h = canvas.parentElement.clientHeight;

		if (expType === 'matrix') {
			ctx.fillStyle = 'rgba(10, 10, 11, 0.2)';
			ctx.fillRect(0, 0, w, h);
			ctx.font = '14px monospace';

			const chars = 'STUDIOAVELIN0123456789+-_/[]{}<>';
			const cols = Math.floor(w / 20);
			const rows = Math.floor(h / 24);

			for (let i = 0; i < cols; i++) {
				for (let j = 0; j < rows; j++) {
					if ((i * 7 + j * 13 + Math.floor(frame / 6)) % 11 === 0) {
						const char = chars[Math.floor(Math.sin(i + j + frame * 0.05) * 100) % chars.length];
						const isLime = (i + j + Math.floor(frame / 10)) % 17 === 0;
						ctx.fillStyle = isLime ? '#C7F000' : 'rgba(255, 255, 255, 0.4)';
						ctx.fillText(char || 'A', i * 20 + 10, j * 24 + 18);
					}
				}
			}
		} else if (expType === 'avelin-signal-grid') {
			ctx.fillStyle = '#0A0A0B';
			ctx.fillRect(0, 0, w, h);

			const step = 40;
			ctx.strokeStyle = 'rgba(255, 255, 255, 0.06)';
			ctx.lineWidth = 1;

			for (let x = 0; x < w; x += step) {
				ctx.beginPath();
				ctx.moveTo(x, 0);
				ctx.lineTo(x, h);
				ctx.stroke();
			}
			for (let y = 0; y < h; y += step) {
				ctx.beginPath();
				ctx.moveTo(0, y);
				ctx.lineTo(w, y);
				ctx.stroke();
			}

			// Moving signals
			for (let i = 0; i < 6; i++) {
				const x = ((frame * (2 + i) + i * 150) % (w + 100)) - 50;
				const y = (i * step * 2 + 60) % h;
				const grad = ctx.createLinearGradient(x - 60, y, x, y);
				grad.addColorStop(0, 'rgba(199, 240, 0, 0)');
				grad.addColorStop(1, '#C7F000');
				ctx.strokeStyle = grad;
				ctx.lineWidth = 2;
				ctx.beginPath();
				ctx.moveTo(x - 60, y);
				ctx.lineTo(x, y);
				ctx.stroke();

				// Signal node
				ctx.fillStyle = '#C7F000';
				ctx.beginPath();
				ctx.arc(x, y, 3, 0, Math.PI * 2);
				ctx.fill();
			}
		} else {
			// Poster generator
			ctx.fillStyle = '#F2F2F2';
			ctx.fillRect(0, 0, w, h);

			// Poster layout elements
			ctx.fillStyle = '#0A0A0B';
			ctx.font = 'bold 36px sans-serif';
			ctx.fillText('AVELIN POSTER #0' + (Math.floor(frame / 120) % 5 + 1), 40, 80);

			ctx.fillStyle = '#C7F000';
			ctx.fillRect(40, 110, 120, 4);

			ctx.fillStyle = '#151922';
			ctx.font = '16px monospace';
			ctx.fillText('CREATIVE CODING & TYPOGRAPHY SYSTEM', 40, 150);

			ctx.strokeStyle = '#151922';
			ctx.lineWidth = 1;
			ctx.strokeRect(40, 180, w - 80, h - 220);

			const boxSize = (frame * 2) % (w - 120);
			ctx.fillStyle = 'rgba(199, 240, 0, 0.3)';
			ctx.fillRect(60, 200, boxSize, 80);
		}

		requestAnimationFrame(render);
	}
	render();
});
</script>

<?php wp_footer(); ?>
</body>
</html>
