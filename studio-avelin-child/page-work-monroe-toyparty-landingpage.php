<?php
/**
 * Template Name: Studio Avelin – Projekt: MONROE Toyparty Landingpage
 * Projektnotiz: /work/monroe-toyparty-landingpage/
 * Die Landingpage selbst bleibt eine eigenständige statische Seite unter /maaike-fiebus/.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$sa_project = array(
	'title'        => 'Portfolio Page — MONROE Toyparty Landingpage',
	'summary'      => 'Eine warme, diskrete Portfolio- und Landingpage für eine selbstständige MONROE-Beraterin.',
	'status'       => 'Statische Landingpage, live',
	'role'         => 'Design, Entwicklung, Textunterstützung',
	'stack'        => 'Statisches HTML, CSS und JavaScript, kein CMS',
	'state'        => 'Live und als eigenständige statische Seite gepflegt',
	'link'         => '/maaike-fiebus/',
	'link_display' => 'studio-avelin.com/maaike-fiebus/',
	'link_label'   => 'Landingpage öffnen',
	'description'  => array(
		'Ausgangslage: Eine selbstständige MONROE-Beraterin brauchte einen eigenen Auftritt, der stilvoll und diskret ist und trotzdem einladend wirkt.',
		'Ansatz: Die Landingpage erklärt, wie ein Toyparty-Abend abläuft, stellt die Gastgeberin vor und macht die Kontaktaufnahme unkompliziert. Das Layout gibt den Bildern Raum und führt ohne Umwege zum Kontaktformular.',
		'Ergebnis: Eine live gestellte, statisch umgesetzte Landingpage mit eigener visueller Identität – unabhängig vom Designsystem von Studio Avelin und ohne WordPress.',
	),
);

set_query_var( 'sa_project', $sa_project );
get_template_part( 'parts/sa-project-note' );
