<?php

/**
 * Template Name: Products Page
 *
 *
 *
 *
 */

$context = Timber::get_context();

$context['pagination'] = Timber::get_pagination();

$args = 'category_name=' . get_query_var( 'category_name' ) . '&post_type=product&numberposts=100&orderby=menu_order&order=ASC';
$context['products'] = Timber::get_posts($args);


$context['categories'] = Timber::get_terms('category', array('parent' => 0));

Timber::render('categories.twig', $context);

?>
