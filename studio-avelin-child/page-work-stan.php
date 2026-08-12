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
    'summary'      => 'A focused notes and thinking app for collecting ideas, spaces, notes and tags.',
    'status'       => 'Live MVP',
    'role'         => 'Concept, design, frontend, data model',
    'stack'        => 'React, Supabase, Vercel',
    'state'        => 'Live MVP, used daily and extended in small steps',
    'link'         => 'https://stan.studio-avelin.com/',
    'link_display' => 'stan.studio-avelin.com',
    'link_label'   => 'Open STAN',
    'description'  => array(
        'STAN is a small thinking tool. It keeps ideas, notes, spaces and tags in one calm place instead of scattering them across half a dozen apps.',
        'The interface stays intentionally quiet: fast capture first, structure second. Spaces group related work, tags cut across them, and search does the rest.',
        'It runs as a separate product outside this site. Nothing about STAN is embedded into WordPress; this page is only a note about it.',
    ),
);

set_query_var('sa_project', $sa_project);
get_template_part('parts/sa-project-note');
