<?php
/**
 * Template Name: Studio Avelin – Work: MONROE Toyparty Landingpage
 * Project note: /work/monroe-toyparty-landingpage/
 * The landing page itself stays a standalone static site under /maaike-fiebus/.
 */
if (!defined('ABSPATH')) {
    exit;
}

$sa_project = array(
    'title'        => 'Portfolio Page — MONROE Toyparty Landingpage',
    'summary'      => sa_child_text( 'Eine warme, diskrete Portfolio- und Landingpage für eine selbstständige MONROE-Beraterin.', 'A warm, discreet portfolio and landing page for an independent MONROE consultant.' ),
    'status'       => sa_child_text( 'Statische Landingpage, live', 'Live static landing page' ),
    'role'         => sa_child_text( 'Design, Entwicklung, Textunterstützung', 'Design, build, copy support' ),
    'stack'        => sa_child_text( 'Statisches HTML, CSS und JavaScript, kein CMS', 'Static HTML, CSS and JavaScript, no CMS' ),
    'state'        => sa_child_text( 'Live und als eigenständige statische Seite gepflegt', 'Live and maintained as a standalone static page' ),
    'link'         => '/maaike-fiebus/',
    'link_display' => sa_child_text( 'Live-Landingpage öffnen', 'Open live landing page' ),
    'link_label'   => sa_child_text( 'Landingpage öffnen', 'Open the landing page' ),
    'description'  => array(
        sa_child_text( 'Die Landingpage erklärt, wie ein MONROE Toyparty-Abend abläuft, stellt die Gastgeberin vor und macht die Kontaktaufnahme unkompliziert.', 'The landing page explains what happens at a MONROE Toyparty, introduces the host and makes it easy to get in touch.' ),
        sa_child_text( 'Die größte Aufgabe war die richtige Tonalität: stilvoll und diskret, aber trotzdem offen und einladend. Das Layout gibt den Bildern Raum und führt ohne Umwege zum Kontaktformular.', 'The main challenge was finding the right tone: stylish and discreet, yet open and inviting. The layout gives the imagery room and leads naturally to the contact form.' ),
        sa_child_text( 'Die Landingpage ist statisch umgesetzt und hat eine eigene visuelle Identität – unabhängig vom Designsystem von Studio Avelin und ohne WordPress.', 'The landing page is built as a static site with its own visual identity, independent of the Studio Avelin design system and without WordPress.' ),
    ),
);

set_query_var('sa_project', $sa_project);
get_template_part('parts/sa-project-note');
