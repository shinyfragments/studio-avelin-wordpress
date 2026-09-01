<?php
/**
 * Template Name: Studio Avelin – Projekt: STAN
 * Projektnotiz: /work/stan/
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$sa_project = array(
	'title'        => 'STAN — Studio Avelin Notes',
	'summary'      => 'Eine ruhige Notiz- und Denk-App, die Ideen, Bereiche, Notizen und Tags an einem Ort zusammenhält.',
	'status'       => 'Live-MVP',
	'role'         => 'Konzept, Design, Frontend, Datenmodell',
	'stack'        => 'React, Supabase, Vercel',
	'state'        => 'Live-MVP, täglich genutzt und in kleinen Schritten erweitert',
	'link'         => 'https://stan.studio-avelin.com/',
	'link_display' => 'stan.studio-avelin.com',
	'link_label'   => 'STAN öffnen',
	'description'  => array(
		'STAN ist ein kleines Werkzeug für Notizen und Ideen. Es hält Bereiche, Texte und Tags an einem Ort zusammen, statt sie auf mehrere Apps zu verteilen.',
		'Die Oberfläche ist auf einen einfachen Ablauf ausgelegt: Gedanken schnell festhalten und später ordnen. Bereiche bündeln zusammengehörige Arbeit, Tags schaffen Verbindungen und die Suche findet den Rest.',
		'STAN ist ein eigenständiges Produkt und wird unabhängig von dieser Website entwickelt. Diese Projektnotiz gibt einen Einblick in Idee und Umsetzung – ein Design-Beispiel, kein Verkaufsangebot.',
	),
);

set_query_var( 'sa_project', $sa_project );
get_template_part( 'parts/sa-project-note' );
