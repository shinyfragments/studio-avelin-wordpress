<?php
/** Journal cover partial. */
if ( ! defined( 'ABSPATH' ) ) { exit; }
sa_journal_post_cover( get_the_ID(), isset( $args['size'] ) ? $args['size'] : 'large' );
