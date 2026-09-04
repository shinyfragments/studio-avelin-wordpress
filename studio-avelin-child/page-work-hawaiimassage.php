<?php
/**
 * Template Name: Studio Avelin – Projekt: Hawaiimassage zu Hause
 * Projektnotiz: /work/hawaiimassage/
 *
 * Die Website selbst liegt als eigenständige statische Seite unter /hawaiimassage/.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$sa_project = array(
	'title'        => 'Hawaiimassage zu Hause',
	'subtitle'     => 'Mobile Wellnessmassage · Kelkheim',
	'summary'      => 'Eine ruhige, warme Website für mobile Wellnessmassagen zu Hause – Lomi Lomi, Schwangerschafts-, Hot-Stone-, Aromaöl- und Babymassage.',
	'status'       => 'Statische Website, live',
	'role'         => 'Design, Entwicklung, Textunterstützung',
	'stack'        => 'Statische Seite, Cormorant Garamond & DM Sans',
	'state'        => 'Live und als eigenständige statische Seite gepflegt',
	'link'         => '/hawaiimassage/',
	'link_display' => 'studio-avelin.com/hawaiimassage/',
	'link_label'   => 'Website öffnen',
	'description'  => array(
		'Ausgangslage: Eine mobile Masseurin bietet Wellnessmassagen bei Kundinnen zu Hause an und brauchte einen Auftritt, der genauso entspannt wirkt wie die Behandlung selbst.',
		'Ansatz: Eine klare Angebotsübersicht mit viel Raum für Bild und Text, warme Typografie und eine ruhige Farbwelt. Die Seite führt von der ersten Neugier bis zur Terminanfrage, ohne zu drängen.',
		'Ergebnis: Eine live gestellte, statisch umgesetzte Website mit eigener visueller Identität – unabhängig vom Designsystem von Studio Avelin und ohne WordPress.',
	),
	'hero'    => get_stylesheet_directory_uri() . '/assets/img/work/hawaiimassage/hero.jpg',
	'gallery' => array( get_stylesheet_directory_uri() . '/assets/img/work/hawaiimassage/lomi.jpg', get_stylesheet_directory_uri() . '/assets/img/work/hawaiimassage/aromaoel.jpg', get_stylesheet_directory_uri() . '/assets/img/work/hawaiimassage/hotstone.jpg' ),
);

set_query_var( 'sa_project', $sa_project );
get_template_part( 'parts/sa-project-note' );
