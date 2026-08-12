<?php
/**
 * Template Name: Studio Avelin – Work: StAU
 * Project note: /work/stau/
 */
if (!defined('ABSPATH')) {
    exit;
}

$sa_project = array(
    'title'        => 'StAU — Studio Avelin Travel Planner',
    'summary'      => 'A small travel planning and trip journal concept for organizing ideas, routes and memories.',
    'status'       => 'Concept / future project',
    'role'         => 'Concept, design',
    'stack'        => 'Undecided, likely a small web app',
    'state'        => 'Concept, collected notes and sketches',
    'link'         => '',
    'link_display' => '',
    'link_label'   => '',
    'description'  => array(
        'StAU is a travel planning concept: collect ideas before a trip, plan loose routes during it, and keep the good parts afterwards.',
        'The interesting part is the shift between the three modes. Planning wants lists and maps, travelling wants very little, remembering wants photos and text.',
        'Nothing is built yet. This page keeps the idea visible while it waits its turn.',
    ),
);

set_query_var('sa_project', $sa_project);
get_template_part('parts/sa-project-note');
