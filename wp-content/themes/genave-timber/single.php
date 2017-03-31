<?php

  $context = Timber::get_context();
  $post = new TimberPost();
  $context['post'] = $post;

  echo '<script>window.productData= ' . json_encode($context) . ';</script>';

  Timber::render('single.twig', $context );

?>
