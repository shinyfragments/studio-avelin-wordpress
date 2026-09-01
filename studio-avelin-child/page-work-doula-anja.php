<?php
/**
 * Template Name: Studio Avelin – Projekt: Doula Anja
 * Projektnotiz: /work/doula-anja/
 *
 * TODO: Live-Link und Freigabe von Michael. Detailtext ggf. mit der Kundin abstimmen.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$sa_project = array(
	'title'        => 'Doula Anja',
	'summary'      => 'Eine persönliche Website für eine Doula – Geburtsvorbereitung, Begleitung und Unterstützung nach einer Fehlgeburt.',
	'status'       => 'Live',
	'role'         => 'Design, Entwicklung, Textunterstützung',
	'stack'        => 'Statische Seite mit mehreren Unterseiten',
	'state'        => 'Live und in Betreuung',
	'link'         => '',
	'link_display' => '',
	'link_label'   => '',
	'description'  => array(
		'Ausgangslage: Eine selbstständige Doula begleitet Familien vor, während und nach der Geburt und wollte einen Auftritt, der Nähe und Vertrauen vermittelt.',
		'Ansatz: Eine klare Struktur entlang der Angebote – Geburtsvorbereitung, Doula-Begleitung, Begleitung nach einer Fehlgeburt – mit ruhiger Gestaltung und einem einfachen Weg zur Kontaktaufnahme.',
		'Ergebnis: Eine live gestellte Website, die die einzelnen Angebote verständlich erklärt und persönlich wirkt. Weitere Details folgen.',
	),
);

set_query_var( 'sa_project', $sa_project );
get_template_part( 'parts/sa-project-note' );
