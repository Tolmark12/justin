<?php

/* sets predefined Post Thumbnail dimensions */
if ( function_exists( 'add_theme_support' ) ) {
   add_theme_support( 'post-thumbnails' );
      
   add_image_size( 'thumb1', 103, 103, true );
   
   add_image_size( 'thumb2', 133, 133, true );
   
   add_image_size( 'thumb3', 173, 173, true );
	     
};
/* --------------------------------------------- */

?>