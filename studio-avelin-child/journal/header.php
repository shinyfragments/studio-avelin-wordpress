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
		<a class="sa-journal-brand" href="<?php echo esc_url( $archive_url ); ?>" aria-label="<?php esc_attr_e( 'Studio Avelin Journal home', 'studio-avelin-child' ); ?>">
			<span class="sa-journal-brand__mark" aria-hidden="true">A<span>/</span></span>
			<span class="sa-journal-brand__studio">Studio Avelin</span>
			<span class="sa-journal-brand__section">Journal</span>
		</a>
		<nav class="sa-journal-nav" aria-label="<?php esc_attr_e( 'Journal navigation', 'studio-avelin-child' ); ?>">
			<a class="<?php echo ! $is_taxonomy ? 'is-active' : ''; ?>" href="<?php echo esc_url( $archive_url ); ?>"><?php esc_html_e( 'Journal', 'studio-avelin-child' ); ?></a>
			<a class="<?php echo $is_taxonomy ? 'is-active' : ''; ?>" href="<?php echo esc_url( $categories_url ); ?>"><?php esc_html_e( 'Categories', 'studio-avelin-child' ); ?></a>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Studio', 'studio-avelin-child' ); ?> <span aria-hidden="true">↗</span></a>
		</nav>
	</div>
</header>
