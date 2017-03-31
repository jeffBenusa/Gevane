<?php /* start WPide restore code */
                                    if ($_POST["restorewpnonce"] === "223a2c962c1600962c6e8b4329a153de5bd76fee8e"){
                                        if ( file_put_contents ( "/usr/share/nginx/html/genave.com/wp-content/themes/genave-timber/products.php" ,  preg_replace("#<\?php /\* start WPide(.*)end WPide restore code \*/ \?>#s", "", file_get_contents("/usr/share/nginx/html/genave.com/wp-content/plugins/wpide/backups/themes/genave-timber/products_2017-02-20-16.php") )  ) ){
                                            echo "Your file has been restored, overwritting the recently edited file! \n\n The active editor still contains the broken or unwanted code. If you no longer need that content then close the tab and start fresh with the restored file.";
                                        }
                                    }else{
                                        echo "-1";
                                    }
                                    die();
                            /* end WPide restore code */ ?><?php

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

$args = 'post_type=product&numberposts=100&orderby=title';
$context['products'] = Timber::get_posts($args);

$context['categories'] = Timber::get_terms('category', array('parent' => 0));

Timber::render('products.twig', $context);

?>
