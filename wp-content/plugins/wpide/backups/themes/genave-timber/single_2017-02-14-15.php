<?php /* start WPide restore code */
                                    if ($_POST["restorewpnonce"] === "223a2c962c1600962c6e8b4329a153de416fa0521d"){
                                        if ( file_put_contents ( "/usr/share/nginx/html/genave.com/wp-content/themes/genave-timber/single.php" ,  preg_replace("#<\?php /\* start WPide(.*)end WPide restore code \*/ \?>#s", "", file_get_contents("/usr/share/nginx/html/genave.com/wp-content/plugins/wpide/backups/themes/genave-timber/single_2017-02-14-15.php") )  ) ){
                                            echo "Your file has been restored, overwritting the recently edited file! \n\n The active editor still contains the broken or unwanted code. If you no longer need that content then close the tab and start fresh with the restored file.";
                                        }
                                    }else{
                                        echo "-1";
                                    }
                                    die();
                            /* end WPide restore code */ ?><?php

  $context = Timber::get_context();
  $post = new TimberPost();
  $context['post'] = $post;

  echo '<script>window.contextData= ' . json_encode($context) . ';</script>';

  Timber::render('single.twig', $context );

?>
