<?php
/**
 * Template Name: Studio Avelin – Projekt: Hawaiimassage zu Hause
 * Projektnotiz: /work/hawaiimassage/
 *
 * TODO: Live-Link ergänzen, sobald die Seite öffentlich ist. Bild-/Detailmaterial
 * folgt von Michael.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$sa_project = array(
	'title'        => 'Hawaiimassage zu Hause',
	'summary'      => 'Eine ruhige, warme Website für mobile Wellnessmassagen zu Hause – Lomi Lomi, Schwangerschafts-, Hot-Stone-, Aromaöl- und Babymassage.',
	'status'       => 'In Vorbereitung',
	'role'         => 'Design, Entwicklung, Textunterstützung',
	'stack'        => 'Statische Seite, Cormorant Garamond & DM Sans',
	'state'        => 'Fertig gestaltet, Veröffentlichung steht noch aus',
	'link'         => '',
	'link_display' => '',
	'link_label'   => '',
	'description'  => array(
		'Ausgangslage: Eine mobile Masseurin bietet Wellnessmassagen bei Kundinnen zu Hause an und brauchte einen Auftritt, der genauso entspannt wirkt wie die Behandlung selbst.',
		'Ansatz: Eine klare Angebotsübersicht mit viel Raum für Bild und Text, warme Typografie und eine ruhige Farbwelt. Die Seite führt von der ersten Neugier bis zur Terminanfrage, ohne zu drängen.',
		'Ergebnis: Eine fertig gestaltete Website, die vor dem Launch steht. Details und Bilder folgen hier, sobald die Seite öffentlich ist.',
	),
);

set_query_var( 'sa_project', $sa_project );
get_template_part( 'parts/sa-project-note' );
