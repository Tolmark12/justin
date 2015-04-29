<?php 

require_once(TEMPLATEPATH . '/epanel/custom_functions.php'); 

require_once(TEMPLATEPATH . '/includes/functions/comments.php'); 

require_once(TEMPLATEPATH . '/includes/functions/sidebars.php'); 

load_theme_textdomain('Glider',get_template_directory().'/lang');

require_once(TEMPLATEPATH . '/epanel/options_glider.php');

require_once(TEMPLATEPATH . '/epanel/core_functions.php'); 

require_once(TEMPLATEPATH . '/epanel/post_thumbnails_glider.php');

require_once(TEMPLATEPATH . '/includes/additional_functions.php');

$wp_ver = substr($GLOBALS['wp_version'],0,3);
if ($wp_ver >= 2.8) include(TEMPLATEPATH . '/includes/widgets.php'); 

add_filter('upload_mimes','restrict_mime');
function restrict_mime($mimes) {
$mimes = array(
  'jpg|jpeg|jpe' => 'image/jpeg',
  'gif' => 'image/gif',
  'mp3' => 'audio/mpeg'
);
return $mimes;
}

?>