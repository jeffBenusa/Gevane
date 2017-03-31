<?php

/**
 * Template Name: Home Page
 *
 *
 *
 *
 */

$context = Timber::get_context();
$context['post'] = new TimberPost();
$context['pagination'] = Timber::get_pagination();

$args = 'post_type=slide&numberposts=100&orderby=menu_order&order=ASC';
$context['slides'] = Timber::get_posts($args);

echo '<script>window.slideData= ' . json_encode( $context['slides'] ) . ';</script>';

Timber::render('home.twig', $context);

?>
