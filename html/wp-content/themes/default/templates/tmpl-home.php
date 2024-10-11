<?php
/*
Template Name: Home Page
*/
defined('ABSPATH') || exit;
get_header();

if (have_rows('sections')) {
    while (have_rows('sections')) {
        the_row();
        get_template_part('template-parts/partials/home/partial', get_row_layout());
    }
}

get_footer();
