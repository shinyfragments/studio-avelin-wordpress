<?php
/**
 * Template Name: Studio Avelin – Projekt: StAT
 * Projektnotiz: /work/stat/
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$sa_project = array(
	'title'        => 'StAT — Studio Avelin Training',
	'summary'      => 'Ein privates Trainingstagebuch für Laufen, Krafttraining, Ziele, Strecken und Fortschritte.',
	'status'       => 'Lokales MVP / in Arbeit',
	'role'         => 'Konzept, Design, Frontend',
	'stack'        => 'React, lokale Daten, läuft vorerst lokal',
	'state'        => 'Lokales MVP, in Arbeit und nicht veröffentlicht',
	'link'         => '',
	'link_display' => '',
	'link_label'   => '',
	'description'  => array(
		'StAT ist ein persönliches Trainingstagebuch. Läufe, Krafteinheiten, Ziele, Strecken und Fortschritte an einem Ort – geschrieben für einen Nutzer: mich.',
		'Der Punkt ist Ehrlichkeit statt Gamification. Kein Streak-Druck, keine Badges, sondern lesbare Historie und ein paar Auswertungen, die zeigen, ob sich etwas bewegt.',
		'StAT läuft aktuell lokal, während sich das Datenmodell setzt. Hier steht es als Projektnotiz, nicht als Produkt.',
	),
);

set_query_var( 'sa_project', $sa_project );
get_template_part( 'parts/sa-project-note' );
