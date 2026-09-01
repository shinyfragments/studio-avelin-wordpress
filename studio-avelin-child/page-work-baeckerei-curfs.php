<?php
/**
 * Template Name: Studio Avelin – Projekt: Bäckerei Curfs
 * Projektnotiz: /work/baeckerei-curfs/
 *
 * Live-Link ergänzen, sobald die URL feststeht.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$sa_project = array(
	'title'        => 'Bäckerei Curfs',
	'summary'      => 'Ein stilvoller digitaler Auftritt für eine kleine, handwerkliche Bäckerei.',
	'status'       => 'Live',
	'role'         => 'Design, Entwicklung',
	'stack'        => 'Statische Seite',
	'state'        => 'Live und in Betreuung',
	'link'         => '',
	'link_display' => '',
	'link_label'   => '',
	'description'  => array(
		'Ausgangslage: Eine kleine Bäckerei mit klarem handwerklichem Anspruch wollte einen Auftritt, der die Qualität der Produkte auch digital spürbar macht.',
		'Ansatz: Eine reduzierte, ästhetikgetriebene Gestaltung, die Bild und Text Raum gibt und die wichtigsten Informationen – Angebot, Öffnungszeiten, Standort – ohne Umwege zeigt.',
		'Ergebnis: Eine live gestellte Website, die zur Marke passt und einfach zu pflegen bleibt.',
	),
);

set_query_var( 'sa_project', $sa_project );
get_template_part( 'parts/sa-project-note' );
