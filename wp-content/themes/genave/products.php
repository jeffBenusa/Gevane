<?php

/**
 * Template Name: Products Page
 *
 *
 *
 *
 */

$context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;

$context['pagination'] = Timber::get_pagination();

$args = 'post_type=product&numberposts=100&orderby=menu_order';
$context['products'] = Timber::get_posts($args);

$context['categories'] = Timber::get_terms('category', array('parent' => 0));

Timber::render('products.twig', $context);

?>
