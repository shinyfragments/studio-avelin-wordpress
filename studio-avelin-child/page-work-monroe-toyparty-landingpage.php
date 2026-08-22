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
        sa_child_text( 'Eine einzelne, warme Landingpage für MONROE Toypartys: wie ein Abend abläuft, wer ihn veranstaltet und wie eine unkomplizierte Kontaktaufnahme möglich ist.', 'A single, warm landing page for MONROE Toypartys: what an evening looks like, who hosts it, and how to get in touch without any awkwardness.' ),
        sa_child_text( 'Die Tonalität war die größte Herausforderung. Die Seite sollte stilvoll und diskret statt laut wirken. Deshalb bleibt das Layout ruhig, die Bilder tragen die Atmosphäre und der Kontakt ist nur ein kurzes Formular entfernt.', 'The tone was the hardest part. It had to feel stylish and discreet rather than loud, so the layout stays calm, the imagery does the work and the contact step is one short form away.' ),
        sa_child_text( 'Sie läuft als eigenständige statische Seite mit eigener visueller Richtung – bewusst getrennt vom Studio-Avelin-Designsystem und von WordPress.', 'It runs as its own static page with its own visual direction, deliberately separate from the Studio Avelin design system and from WordPress.' ),
    ),
);

set_query_var('sa_project', $sa_project);
get_template_part('parts/sa-project-note');
