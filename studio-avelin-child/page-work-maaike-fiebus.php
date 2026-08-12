<?php
/**
 * Template Name: Studio Avelin – Work: Maaike Fiebus
 * Project note: /work/maaike-fiebus/
 * The landing page itself stays a standalone static site under /maaike-fiebus/.
 */
if (!defined('ABSPATH')) {
    exit;
}

$sa_project = array(
    'title'        => 'Maaike Fiebus — MONROE Toyparty Landingpage',
    'summary'      => 'A stylish, discreet landing page for MONROE Toypartys with Maaike Fiebus.',
    'status'       => 'Live static landing page',
    'role'         => 'Design, build, copy support',
    'stack'        => 'Static HTML, CSS and JavaScript, no CMS',
    'state'        => 'Live and maintained as a standalone static page',
    'link'         => '/maaike-fiebus/',
    'link_display' => 'studio-avelin.com/maaike-fiebus/',
    'link_label'   => 'Open the landing page',
    'description'  => array(
        'A single, warm landing page for MONROE Toypartys: what an evening looks like, who hosts it, and how to get in touch without any awkwardness.',
        'The tone was the hardest part. It had to feel stylish and discreet rather than loud, so the layout stays calm, the imagery does the work and the contact step is one short form away.',
        'It runs as its own static page with its own visual direction, deliberately separate from the Studio Avelin design system and from WordPress.',
    ),
);

set_query_var('sa_project', $sa_project);
get_template_part('parts/sa-project-note');
