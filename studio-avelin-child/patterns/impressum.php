<?php
/**
 * Title: Impressum
 * Slug: studio-avelin-child/impressum
 * Categories: text, featured
 * Description: Impressum von Studio Avelin im Studio-Avelin-Design (§ 5 DDG)
 */
?>

<div class="sa-legal-hero">
	<span class="sa-legal-hero__eyebrow">Legal Notice</span>
	<h1 class="sa-legal-hero__title"><?php echo esc_html( sa_child_text( 'Impressum', 'Legal Notice' ) ); ?></h1>
	<span class="sa-legal-hero__meta"><?php echo wp_kses_post( sa_child_text( 'Angaben gem&auml;&szlig; &sect; 5 DDG', 'Information pursuant to Section 5 DDG' ) ); ?></span>
</div>

<div class="sa-legal-content">
	<?php if ( 'en' === sa_child_language() ) : ?>
		<section class="sa-legal-card sa-legal-card--language-note">
			<div class="sa-legal-card__num">EN</div>
			<h2>About this legal notice</h2>
			<p>The complete German legal notice is reproduced unchanged below. The German text is the authoritative legal version.</p>
		</section>
	<?php endif; ?>

	<!-- 01. ANGABEN GEMÄSS § 5 DDG -->
	<section class="sa-legal-card">
		<div class="sa-legal-card__num">01</div>
		<h2>Angaben gem&auml;&szlig; &sect; 5 DDG</h2>

		<div style="background: rgba(21, 25, 34, 0.02); border: 1px solid var(--sa-line, rgba(21, 25, 34, 0.12)); padding: 1.5rem 1.75rem; margin: 1.25rem 0; border-radius: 4px;">
			<p style="margin: 0; font-weight: 600; font-size: 1.15rem; color: var(--sa-ink);">Studio Avelin</p>
			<p style="margin: 0.25rem 0 0 0; color: var(--sa-ink); font-size: 1.05rem;">Michael Fiebus</p>
			<p style="margin: 0.25rem 0 0 0; color: var(--sa-muted); font-size: 1rem;">Wolfstr. 34</p>
			<p style="margin: 0.1rem 0 0 0; color: var(--sa-muted); font-size: 1rem;">52134 Herzogenrath &bull; Deutschland</p>
		</div>
	</section>

	<!-- 02. KONTAKT -->
	<section class="sa-legal-card">
		<div class="sa-legal-card__num">02</div>
		<h2>Kontakt</h2>

		<p><strong>E-Mail:</strong> <a href="mailto:hello@studio-avelin.com">hello@studio-avelin.com</a></p>
		<p><strong>Website:</strong> <a href="https://studio-avelin.com/">https://studio-avelin.com</a></p>
	</section>

	<!-- 03. UMSATZSTEUER-ID -->
	<section class="sa-legal-card">
		<div class="sa-legal-card__num">03</div>
		<h2>Umsatzsteuer-ID</h2>

		<p>Umsatzsteuer-Identifikationsnummer gem&auml;&szlig; &sect; 27a Umsatzsteuergesetz:</p>
		<p><strong>Folgt</strong></p>
	</section>

	<!-- 04. VERBRAUCHERSTREITBEILEGUNG -->
	<section class="sa-legal-card">
		<div class="sa-legal-card__num">04</div>
		<h2>Verbraucherstreitbeilegung</h2>

		<p>Wir sind nicht bereit oder verpflichtet, an Streitbeilegungsverfahren vor einer Verbraucherschlichtungsstelle teilzunehmen.</p>
	</section>

</div>
