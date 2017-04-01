<?php


add_theme_support('post-thumbnails');
add_filter('timber_context', 'add_to_context');

function add_to_context($data){

  $data['menu'] = new TimberMenu();
  $data['productsMenu'] = new TimberMenu('productsMenu');
  $data['supportMenu'] = new TimberMenu('supportMenu');
  $data['categories'] = Timber::get_terms('category', 'show_count=0&title_li=&hide_empty=0&exclude=1');

  $args = 'post_type=product&numberposts=100&orderby=title';
  $data['products'] = Timber::get_posts($args);
  
  $args = 'post_type=page&numberposts=100&orderby=title';
  $data['pages'] = Timber::get_posts($args);

  echo '<script>window.siteData= ' . json_encode($data) . ';</script>';

  return $data;
}

function my_myme_types($mime_types){
    $mime_types['svg'] = 'image/svg+xml'; //Adding svg extension
    
    $mime_types['mp3'] = 'audio/mpeg'; 
    $mime_types['wav'] = 'audio/wav';
    
    $mime_types['mp4'] = 'video/mp4';

    
    return $mime_types;
}
add_filter('upload_mimes', 'my_myme_types');

define('WP_DEBUG', true);

if(function_exists('yoast_breadcrumb')) {
    function breadcrumbs($before = '', $after = '') { return yoast_breadcrumb($before, $after, false); };
    TimberHelper::function_wrapper('breadcrumbs');
}

define('ALLOW_UNFILTERED_UPLOADS', true);

?>
