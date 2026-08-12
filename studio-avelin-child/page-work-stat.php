<?php
/**
 * Template Name: Studio Avelin – Work: StAT
 * Project note: /work/stat/
 */
if (!defined('ABSPATH')) {
    exit;
}

$sa_project = array(
    'title'        => 'StAT — Studio Avelin Training',
    'summary'      => 'A private training log for running, strength, goals, routes and progress.',
    'status'       => 'Local MVP / in progress',
    'role'         => 'Concept, design, frontend',
    'stack'        => 'React, local data, running locally for now',
    'state'        => 'Local MVP, in progress and not published',
    'link'         => '',
    'link_display' => '',
    'link_label'   => '',
    'description'  => array(
        'StAT is a personal training log. Runs, strength sessions, goals, routes and progress in one place, written for one user: me.',
        'The point is honesty over gamification. No streak pressure, no badges, just readable history and a few charts that show whether things are moving.',
        'It currently runs locally while the data model settles. It is presented here as a project note, not as a product.',
    ),
);

set_query_var('sa_project', $sa_project);
get_template_part('parts/sa-project-note');
