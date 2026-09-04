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
	'summary'      => 'Ein Konzept für Reiseplanung und Reisetagebuch, das Ideen, Routen und Erinnerungen sammelt.',
	'status'       => 'Konzept / künftiges Projekt',
	'role'         => 'Konzept, Design',
	'stack'        => 'Noch offen, vermutlich eine kleine Web-App',
	'state'        => 'Konzept, gesammelte Notizen und Skizzen',
	'link'         => '',
	'link_display' => '',
	'link_label'   => '',
	'description'  => array(
		'StAU ist ein Reiseplanungs-Konzept: Ideen vor der Reise sammeln, unterwegs lose Routen planen und danach die guten Teile behalten.',
		'Das Spannende ist der Wechsel zwischen den drei Modi. Planen will Listen und Karten, Reisen will sehr wenig, Erinnern will Fotos und Text.',
		'Es ist noch nichts gebaut. Diese Seite hält die Idee sichtbar, bis sie an der Reihe ist.',
	),
	'hero'    => '',
	'gallery' => array(),
);

set_query_var( 'sa_project', $sa_project );
get_template_part( 'parts/sa-project-note' );
