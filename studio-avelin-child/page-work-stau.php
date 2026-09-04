<?php
/**
 * Template Name: Studio Avelin – Projekt: StAU
 * Projektnotiz: /work/stau/
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$sa_project = array(
	'title'        => 'StAU',
	'subtitle'     => 'Studio Avelin Travel Planner',
	'summary'      => 'Eine ruhige App für Reiseplanung und Reisetagebuch – Ideen, Routen und Erinnerungen an einem Ort.',
	'status'       => 'Live',
	'role'         => 'Konzept, Design, Frontend',
	'stack'        => 'React, Supabase, Vercel',
	'state'        => 'Live und in kleinen Schritten erweitert',
	'link'         => 'https://stau.studio-avelin.com/',
	'link_display' => 'stau.studio-avelin.com',
	'link_label'   => 'StAU öffnen',
	'description'  => array(
		'StAU sammelt Ideen vor der Reise, plant unterwegs lose Routen und behält danach die guten Teile: Ziele, Strecken, Fotos und Notizen an einem Ort.',
		'Der Kern ist der Wechsel zwischen den drei Modi. Planen will Listen und Karten, Reisen will sehr wenig, Erinnern will Fotos und Text – die Oberfläche passt sich dem an.',
		'StAU ist ein eigenständiges Produkt und wird unabhängig von dieser Website entwickelt. Diese Projektnotiz gibt einen Einblick in Idee und Umsetzung.',
	),
	'hero'    => '',
	'gallery' => array(),
);

set_query_var( 'sa_project', $sa_project );
get_template_part( 'parts/sa-project-note' );
