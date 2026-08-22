<?php
/**
 * Studio Avelin — bilingual project enquiry form.
 *
 * @package studio-avelin-child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$sa_status = isset( $_GET['contact'] ) ? sanitize_key( wp_unslash( $_GET['contact'] ) ) : '';
$sa_home   = function_exists( 'pll_home_url' ) ? trailingslashit( pll_home_url( sa_child_language() ) ) : trailingslashit( home_url( '/' ) );
$sa_whatsapp_text = sa_child_text( 'Hallo Michael, ich habe eine Projektanfrage für Studio Avelin.', 'Hi Michael, I have a project enquiry for Studio Avelin.' );
$sa_whatsapp_url  = 'https://wa.me/4915140077004?text=' . rawurlencode( $sa_whatsapp_text );
$sa_notice = array(
	'sent'    => sa_child_text( 'Danke – deine Anfrage wurde versendet. Ich melde mich so bald wie möglich.', 'Thank you — your enquiry has been sent. I’ll get back to you as soon as possible.' ),
	'missing' => sa_child_text( 'Bitte fülle alle Pflichtfelder aus und prüfe deine E-Mail-Adresse.', 'Please complete all required fields and check your email address.' ),
	'invalid' => sa_child_text( 'Die Anfrage konnte nicht geprüft werden. Bitte lade die Seite neu und versuche es noch einmal.', 'The enquiry could not be verified. Please reload the page and try again.' ),
	'later'   => sa_child_text( 'Bitte warte kurz, bevor du eine weitere Anfrage sendest.', 'Please wait a moment before sending another enquiry.' ),
	'failed'  => sa_child_text( 'Die Nachricht konnte leider nicht gesendet werden. Schreib mir bitte direkt an hello@studio-avelin.com.', 'The message could not be sent. Please email me directly at hello@studio-avelin.com.' ),
);
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<?php wp_head(); ?>
</head>
<body <?php body_class( array( 'home', 'sa-front', 'sa-page', 'sa-page--contact' ) ); ?>>
<?php wp_body_open(); ?>

<a class="sa-skip" href="#sa-main"><?php echo esc_html( sa_child_text( 'Zum Inhalt springen', 'Skip to content' ) ); ?></a>
<?php get_template_part( 'parts/sa-header' ); ?>

<main class="sa-main" id="sa-main">
	<div class="sa-contact-page">
		<header class="sa-contact-page__intro">
			<span class="sa-about-eyebrow"><?php echo esc_html( sa_child_text( 'PROJEKT ANFRAGEN', 'PROJECT ENQUIRY' ) ); ?></span>
			<h1><?php echo wp_kses_post( sa_child_text( 'Erzähl mir von <span class="sa-lime-text">deinem Projekt.</span>', 'Tell me about <span class="sa-lime-text">your project.</span>' ) ); ?></h1>
			<p><?php echo esc_html( sa_child_text( 'Eine grobe Idee reicht für den Anfang. Ich lese jede Anfrage selbst und melde mich persönlich bei dir.', 'A rough idea is enough to start. I read every enquiry myself and will reply personally.' ) ); ?></p>
		</header>

		<?php if ( isset( $sa_notice[ $sa_status ] ) ) : ?>
			<div class="sa-contact-notice sa-contact-notice--<?php echo esc_attr( $sa_status ); ?>" role="<?php echo 'sent' === $sa_status ? 'status' : 'alert'; ?>">
				<?php echo esc_html( $sa_notice[ $sa_status ] ); ?>
			</div>
		<?php endif; ?>

		<div class="sa-contact-page__layout">
			<form class="sa-contact-form" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="post">
				<input type="hidden" name="action" value="sa_contact_submit" />
				<input type="hidden" name="sa_language" value="<?php echo esc_attr( sa_child_language() ); ?>" />
				<?php wp_nonce_field( 'sa_contact_submit', 'sa_contact_nonce' ); ?>

				<div class="sa-contact-form__trap" aria-hidden="true">
					<label for="sa-company">Company</label>
					<input id="sa-company" name="sa_company" type="text" tabindex="-1" autocomplete="off" />
				</div>

				<div class="sa-contact-form__row">
					<label for="sa-name"><?php echo esc_html( sa_child_text( 'Name', 'Name' ) ); ?> <span>*</span></label>
					<input id="sa-name" name="sa_name" type="text" autocomplete="name" required maxlength="120" />
				</div>

				<div class="sa-contact-form__row">
					<label for="sa-email"><?php echo esc_html( sa_child_text( 'E-Mail', 'Email' ) ); ?> <span>*</span></label>
					<input id="sa-email" name="sa_email" type="email" autocomplete="email" required maxlength="190" />
				</div>

				<div class="sa-contact-form__row">
					<label for="sa-project"><?php echo esc_html( sa_child_text( 'Worum geht es?', 'What is it about?' ) ); ?> <span>*</span></label>
					<select id="sa-project" name="sa_project" required>
						<option value=""><?php echo esc_html( sa_child_text( 'Bitte auswählen', 'Please select' ) ); ?></option>
						<option value="website"><?php echo esc_html( sa_child_text( 'Individuelle Website', 'Custom website' ) ); ?></option>
						<option value="landing"><?php echo esc_html( sa_child_text( 'Landingpage oder Portfolio', 'Landing page or portfolio' ) ); ?></option>
						<option value="wordpress">WordPress</option>
						<option value="optimize"><?php echo esc_html( sa_child_text( 'Bestehende Website optimieren', 'Improve an existing website' ) ); ?></option>
						<option value="other"><?php echo esc_html( sa_child_text( 'Etwas anderes', 'Something else' ) ); ?></option>
					</select>
				</div>

				<div class="sa-contact-form__row">
					<label for="sa-timeline"><?php echo esc_html( sa_child_text( 'Gewünschter Zeitraum', 'Preferred timing' ) ); ?> <small><?php echo esc_html( sa_child_text( 'optional', 'optional' ) ); ?></small></label>
					<input id="sa-timeline" name="sa_timeline" type="text" maxlength="120" placeholder="<?php echo esc_attr( sa_child_text( 'z. B. Herbst 2026', 'e.g. autumn 2026' ) ); ?>" />
				</div>

				<div class="sa-contact-form__row">
					<label for="sa-message"><?php echo esc_html( sa_child_text( 'Erzähl mir kurz von deinem Projekt', 'Tell me briefly about your project' ) ); ?> <span>*</span></label>
					<textarea id="sa-message" name="sa_message" rows="7" required maxlength="5000"></textarea>
				</div>

				<label class="sa-contact-form__consent">
					<input name="sa_consent" type="checkbox" value="1" required />
					<span><?php echo wp_kses_post( sa_child_text( 'Ich stimme zu, dass meine Angaben zur Bearbeitung meiner Anfrage verwendet werden. Weitere Informationen stehen in der <a href="' . esc_url( $sa_home . 'datenschutzerklaerung/' ) . '">Datenschutzerklärung</a>.', 'I agree that my details may be used to process my enquiry. More information is available in the <a href="' . esc_url( $sa_home . 'datenschutzerklaerung/' ) . '">privacy policy</a>.' ) ); ?></span>
				</label>

				<button class="sa-contact-form__submit" type="submit">
					<?php echo esc_html( sa_child_text( 'Anfrage senden', 'Send enquiry' ) ); ?> <span aria-hidden="true">&rarr;</span>
				</button>
			</form>

			<aside class="sa-contact-page__aside">
				<span class="sa-about-eyebrow"><?php echo esc_html( sa_child_text( 'LIEBER DIREKT?', 'PREFER EMAIL?' ) ); ?></span>
				<p><?php echo esc_html( sa_child_text( 'Du kannst mir auch direkt schreiben.', 'You can also contact me directly.' ) ); ?></p>
				<div class="sa-contact-page__channels">
					<a href="mailto:hello@studio-avelin.com">hello@studio-avelin.com</a>
					<a href="<?php echo esc_url( $sa_whatsapp_url ); ?>" target="_blank" rel="noopener noreferrer">
						WhatsApp <span aria-hidden="true">&rarr;</span>
					</a>
				</div>
				<p class="sa-contact-page__response"><?php echo esc_html( sa_child_text( 'In der Regel antworte ich innerhalb von zwei Werktagen.', 'I usually reply within two working days.' ) ); ?></p>
			</aside>
		</div>
	</div>
</main>

<?php get_template_part( 'parts/sa-footer' ); ?>
<?php wp_footer(); ?>
</body>
</html>
