<?php /* start WPide restore code */
                                    if ($_POST["restorewpnonce"] === "223a2c962c1600962c6e8b4329a153de5bd76fee8e"){
                                        if ( file_put_contents ( "/usr/share/nginx/html/genave.com/wp-content/themes/genave-timber/home.php" ,  preg_replace("#<\?php /\* start WPide(.*)end WPide restore code \*/ \?>#s", "", file_get_contents("/usr/share/nginx/html/genave.com/wp-content/plugins/wpide/backups/themes/genave-timber/home_2017-02-20-16.php") )  ) ){
                                            echo "Your file has been restored, overwritting the recently edited file! \n\n The active editor still contains the broken or unwanted code. If you no longer need that content then close the tab and start fresh with the restored file.";
                                        }
                                    }else{
                                        echo "-1";
                                    }
                                    die();
                            /* end WPide restore code */ ?><?php

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

$args = 'post_type=slide&numberposts=100&orderby=title';
$context['slides'] = Timber::get_posts($args);

echo '<script>window.slideData= ' . json_encode( $context['slides'] ) . ';</script>';

Timber::render('home.twig', $context);

?>
