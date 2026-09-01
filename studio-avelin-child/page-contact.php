<?php
/**
 * Studio Avelin — Projektanfrage.
 *
 * @package studio-avelin-child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$sa_status        = isset( $_GET['contact'] ) ? sanitize_key( wp_unslash( $_GET['contact'] ) ) : '';
$sa_home          = trailingslashit( home_url( '/' ) );
$sa_whatsapp_text = 'Hallo Michael, ich habe eine Projektanfrage für Studio Avelin.';
$sa_whatsapp_url  = 'https://wa.me/4915140077004?text=' . rawurlencode( $sa_whatsapp_text );
$sa_notice        = array(
	'sent'    => 'Danke – deine Anfrage wurde versendet. Ich melde mich so bald wie möglich.',
	'missing' => 'Bitte fülle alle Pflichtfelder aus und prüfe deine E-Mail-Adresse.',
	'invalid' => 'Die Anfrage konnte nicht geprüft werden. Bitte lade die Seite neu und versuche es noch einmal.',
	'later'   => 'Bitte warte kurz, bevor du eine weitere Anfrage sendest.',
	'failed'  => 'Die Nachricht konnte leider nicht gesendet werden. Schreib mir bitte direkt an hello@studio-avelin.com.',
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

<a class="sa-skip" href="#sa-main">Zum Inhalt springen</a>
<?php get_template_part( 'parts/sa-header' ); ?>

<main class="sa-main" id="sa-main">
	<div class="sa-contact-page">
		<header class="sa-contact-page__intro">
			<span class="sa-about-eyebrow">PROJEKT BESPRECHEN</span>
			<h1><?php echo wp_kses_post( 'Erzähl mir von <span class="sa-lime-text">deinem Projekt.</span>' ); ?></h1>
			<p>Eine grobe Idee reicht für den Anfang. Ich lese jede Anfrage selbst und melde mich persönlich bei dir.</p>
		</header>

		<?php if ( isset( $sa_notice[ $sa_status ] ) ) : ?>
			<div class="sa-contact-notice sa-contact-notice--<?php echo esc_attr( $sa_status ); ?>" role="<?php echo 'sent' === $sa_status ? 'status' : 'alert'; ?>">
				<?php echo esc_html( $sa_notice[ $sa_status ] ); ?>
			</div>
		<?php endif; ?>

		<div class="sa-contact-page__layout">
			<form class="sa-contact-form" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="post">
				<input type="hidden" name="action" value="sa_contact_submit" />
				<?php wp_nonce_field( 'sa_contact_submit', 'sa_contact_nonce' ); ?>

				<div class="sa-contact-form__trap" aria-hidden="true">
					<label for="sa-company">Company</label>
					<input id="sa-company" name="sa_company" type="text" tabindex="-1" autocomplete="off" />
				</div>

				<div class="sa-contact-form__row">
					<label for="sa-name">Name <span>*</span></label>
					<input id="sa-name" name="sa_name" type="text" autocomplete="name" required maxlength="120" />
				</div>

				<div class="sa-contact-form__row">
					<label for="sa-email">E-Mail <span>*</span></label>
					<input id="sa-email" name="sa_email" type="email" autocomplete="email" required maxlength="190" />
				</div>

				<div class="sa-contact-form__row">
					<label for="sa-project">Worum geht es? <span>*</span></label>
					<select id="sa-project" name="sa_project" required>
						<option value="">Bitte auswählen</option>
						<option value="website">Website-Projekt</option>
						<option value="branding">Branding-Projekt</option>
						<option value="support">Langfristige Begleitung</option>
						<option value="other">Etwas anderes</option>
					</select>
				</div>

				<div class="sa-contact-form__row">
					<label for="sa-timeline">Gewünschter Zeitraum <small>optional</small></label>
					<input id="sa-timeline" name="sa_timeline" type="text" maxlength="120" placeholder="z. B. Herbst 2026" />
				</div>

				<div class="sa-contact-form__row">
					<label for="sa-message">Erzähl mir kurz von deinem Projekt <span>*</span></label>
					<textarea id="sa-message" name="sa_message" rows="7" required maxlength="5000"></textarea>
				</div>

				<label class="sa-contact-form__consent">
					<input name="sa_consent" type="checkbox" value="1" required />
					<span><?php echo wp_kses_post( 'Ich stimme zu, dass meine Angaben zur Bearbeitung meiner Anfrage verwendet werden. Weitere Informationen stehen in der <a href="' . esc_url( $sa_home . 'datenschutzerklaerung/' ) . '">Datenschutzerklärung</a>.' ); ?></span>
				</label>

				<button class="sa-contact-form__submit" type="submit">
					Anfrage senden <span aria-hidden="true">&rarr;</span>
				</button>
			</form>

			<aside class="sa-contact-page__aside">
				<span class="sa-about-eyebrow">LIEBER DIREKT?</span>
				<p>Du kannst mir auch direkt schreiben.</p>
				<div class="sa-contact-page__channels">
					<a href="mailto:hello@studio-avelin.com">hello@studio-avelin.com</a>
					<a href="<?php echo esc_url( $sa_whatsapp_url ); ?>" target="_blank" rel="noopener noreferrer">
						WhatsApp <span aria-hidden="true">&rarr;</span>
					</a>
				</div>
				<p class="sa-contact-page__response">In der Regel antworte ich innerhalb von zwei Werktagen.</p>
			</aside>
		</div>
	</div>
</main>

<?php get_template_part( 'parts/sa-footer' ); ?>
<?php wp_footer(); ?>
</body>
</html>
