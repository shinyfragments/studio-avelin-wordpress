<?php
/**
 * Template Name: Studio Avelin – Work: STAN
 * Project note: /work/stan/
 */
if (!defined('ABSPATH')) {
    exit;
}

$sa_project = array(
    'title'        => 'STAN — Studio Avelin Notes',
    'summary'      => sa_child_text( 'Eine fokussierte Notiz- und Denk-App zum Sammeln von Ideen, Bereichen, Notizen und Tags.', 'A focused notes and thinking app for collecting ideas, spaces, notes and tags.' ),
    'status'       => sa_child_text( 'Live-MVP', 'Live MVP' ),
    'role'         => sa_child_text( 'Konzept, Design, Frontend, Datenmodell', 'Concept, design, frontend, data model' ),
    'stack'        => 'React, Supabase, Vercel',
    'state'        => sa_child_text( 'Live-MVP, täglich genutzt und in kleinen Schritten erweitert', 'Live MVP, used daily and extended in small steps' ),
    'link'         => 'https://stan.studio-avelin.com/',
    'link_display' => 'stan.studio-avelin.com',
    'link_label'   => sa_child_text( 'STAN öffnen', 'Open STAN' ),
    'description'  => array(
        sa_child_text( 'STAN ist ein kleines Denkwerkzeug. Es hält Ideen, Notizen, Bereiche und Tags an einem ruhigen Ort zusammen, statt sie über ein halbes Dutzend Apps zu verteilen.', 'STAN is a small thinking tool. It keeps ideas, notes, spaces and tags in one calm place instead of scattering them across half a dozen apps.' ),
        sa_child_text( 'Die Oberfläche bleibt bewusst ruhig: zuerst schnell festhalten, dann strukturieren. Bereiche bündeln zusammengehörige Arbeit, Tags verbinden sie übergreifend und die Suche erledigt den Rest.', 'The interface stays intentionally quiet: fast capture first, structure second. Spaces group related work, tags cut across them, and search does the rest.' ),
        sa_child_text( 'STAN läuft als eigenständiges Produkt außerhalb dieser Website. Es ist nicht in WordPress eingebettet; diese Seite dokumentiert das Projekt lediglich.', 'It runs as a separate product outside this site. Nothing about STAN is embedded into WordPress; this page is only a note about it.' ),
    ),
);

set_query_var('sa_project', $sa_project);
get_template_part('parts/sa-project-note');
