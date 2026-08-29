<?php
/** Journal-specific navigation. */
if ( ! defined( 'ABSPATH' ) ) { exit; }
$archive_url   = get_post_type_archive_link( 'sa_journal' );
$journal_terms  = get_terms( array( 'taxonomy' => 'sa_journal_category', 'hide_empty' => true, 'number' => 1 ) );
$categories_url = $journal_terms && ! is_wp_error( $journal_terms ) ? get_term_link( $journal_terms[0] ) : $archive_url;
$is_taxonomy   = is_tax( array( 'sa_journal_category', 'sa_journal_tag' ) );
?>
<header class="sa-journal-header">
	<div class="sa-journal-header__inner">
		<a class="sa-journal-brand" href="<?php echo esc_url( $archive_url ); ?>" aria-label="<?php echo esc_attr( sa_child_text( 'Startseite des Studio Avelin Journals', 'Studio Avelin Journal home' ) ); ?>">
			<span class="sa-journal-brand__mark" aria-hidden="true">A<span>/</span></span>
			<span class="sa-journal-brand__studio">Studio Avelin</span>
			<span class="sa-journal-brand__section">Journal</span>
		</a>
		<nav class="sa-journal-nav" aria-label="<?php echo esc_attr( sa_child_text( 'Journal-Navigation', 'Journal navigation' ) ); ?>">
			<a class="<?php echo ! $is_taxonomy ? 'is-active' : ''; ?>" href="<?php echo esc_url( $archive_url ); ?>"><?php esc_html_e( 'Journal', 'studio-avelin-child' ); ?></a>
			<a class="<?php echo $is_taxonomy ? 'is-active' : ''; ?>" href="<?php echo esc_url( $categories_url ); ?>"><?php echo esc_html( sa_child_text( 'Kategorien', 'Categories' ) ); ?></a>
			<a href="<?php echo esc_url( function_exists( 'pll_home_url' ) ? pll_home_url( sa_child_language() ) : home_url( '/' ) ); ?>"><?php esc_html_e( 'Studio', 'studio-avelin-child' ); ?></a>
			<?php if ( SA_CHILD_BILINGUAL_ENABLED ) : ?>
			<span class="sa-journal-language" aria-label="<?php echo esc_attr( sa_child_text( 'Sprache wählen', 'Choose language' ) ); ?>">
				<a class="<?php echo 'de' === sa_child_language() ? 'is-current' : ''; ?>" href="<?php echo esc_url( sa_child_language_url( 'de' ) ); ?>" hreflang="de">DE</a>
				<span aria-hidden="true">/</span>
				<a class="<?php echo 'en' === sa_child_language() ? 'is-current' : ''; ?>" href="<?php echo esc_url( sa_child_language_url( 'en' ) ); ?>" hreflang="en">EN</a>
			</span>
			<?php endif; ?>
		</nav>
	</div>
</header>
