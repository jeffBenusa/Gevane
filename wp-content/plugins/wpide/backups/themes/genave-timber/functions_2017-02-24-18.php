<?php /* start WPide restore code */
                                    if ($_POST["restorewpnonce"] === "223a2c962c1600962c6e8b4329a153dea6679c1f6e"){
                                        if ( file_put_contents ( "/usr/share/nginx/html/genave.com/wp-content/themes/genave-timber/functions.php" ,  preg_replace("#<\?php /\* start WPide(.*)end WPide restore code \*/ \?>#s", "", file_get_contents("/usr/share/nginx/html/genave.com/wp-content/plugins/wpide/backups/themes/genave-timber/functions_2017-02-24-18.php") )  ) ){
                                            echo "Your file has been restored, overwritting the recently edited file! \n\n The active editor still contains the broken or unwanted code. If you no longer need that content then close the tab and start fresh with the restored file.";
                                        }
                                    }else{
                                        echo "-1";
                                    }
                                    die();
                            /* end WPide restore code */ ?><?php


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
    
    $mime_types['mp3'] = 'audio/mpeg'; //Adding svg extension
    $mime_types['wav'] = 'audio/wav'; //Adding svg extension
    return $mime_types;
}
add_filter('upload_mimes', 'my_myme_types', 1, 1);

define('WP_DEBUG', true);

if(function_exists('yoast_breadcrumb')) {
    function breadcrumbs($before = '', $after = '') { return yoast_breadcrumb($before, $after, false); };
    TimberHelper::function_wrapper('breadcrumbs');
}


?>
