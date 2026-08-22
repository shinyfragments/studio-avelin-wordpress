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
    'summary'      => sa_child_text( 'Eine ruhige Notiz- und Denk-App, die Ideen, Bereiche, Notizen und Tags an einem Ort zusammenhält.', 'A calm notes and thinking app that keeps ideas, spaces, notes and tags together in one place.' ),
    'status'       => sa_child_text( 'Live-MVP', 'Live MVP' ),
    'role'         => sa_child_text( 'Konzept, Design, Frontend, Datenmodell', 'Concept, design, frontend, data model' ),
    'stack'        => 'React, Supabase, Vercel',
    'state'        => sa_child_text( 'Live-MVP, täglich genutzt und in kleinen Schritten erweitert', 'Live MVP, used daily and extended in small steps' ),
    'link'         => 'https://stan.studio-avelin.com/',
    'link_display' => 'stan.studio-avelin.com',
    'link_label'   => sa_child_text( 'STAN öffnen', 'Open STAN' ),
    'description'  => array(
        sa_child_text( 'STAN ist ein kleines Werkzeug für Notizen und Ideen. Es hält Bereiche, Texte und Tags an einem Ort zusammen, statt sie auf mehrere Apps zu verteilen.', 'STAN is a small tool for notes and ideas. It keeps spaces, notes and tags together instead of scattering them across several apps.' ),
        sa_child_text( 'Die Oberfläche ist auf einen einfachen Ablauf ausgelegt: Gedanken schnell festhalten und später ordnen. Bereiche bündeln zusammengehörige Arbeit, Tags schaffen Verbindungen und die Suche findet den Rest.', 'The interface supports a simple flow: capture thoughts quickly, then organise them later. Spaces group related work, tags create connections and search finds the rest.' ),
        sa_child_text( 'STAN ist ein eigenständiges Produkt und wird unabhängig von dieser Website entwickelt. Diese Projektnotiz gibt einen Einblick in Idee und Umsetzung.', 'STAN is developed as a standalone product, independently of this website. This project note offers a brief look at the idea and its implementation.' ),
    ),
);

set_query_var('sa_project', $sa_project);
get_template_part('parts/sa-project-note');
