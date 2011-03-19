<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php elegant_titles(); ?></title>
<?php elegant_description(); ?>
<?php elegant_keywords(); ?>
<?php elegant_canonical(); ?>

<script type="text/javascript" src="http://use.typekit.com/voz3nft.js"></script>
<script type="text/javascript">try{Typekit.load();}catch(e){}</script>


<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/jquery.fancybox-1.2.6.css" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
   
   <!--[if lt IE 7]>
      <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/ie6style.css" />
      <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/DD_belatedPNG_0.0.8a-min.js"></script>
      <script type="text/javascript">DD_belatedPNG.fix('#main-leftarea #glow, #main-rightarea, #main-leftarea #right-border , #tagline, span.overlay, span.magnify, .gallery-area .thumb, span#active-arrow');</script>
   <![endif]-->
   <!--[if IE 7]>
      <link rel="stylesheet" type="text/css" href="css/ie7style.css" />
   <![endif]-->

   
<script type="text/javascript">
   document.documentElement.className = 'js';
</script>

<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
<?php wp_head(); ?>
</head>

<body class="clearfix">
   
   <div id="main-leftarea">
      <!-- <div class="topbg"></div> -->
      
      <a href="<?php bloginfo('url'); ?>"><?php $logo = (get_option('glider_logo') <> '') ? get_option('glider_logo') : get_bloginfo('template_directory').'/images/logo.png'; ?>
				<img src="<?php echo $logo; ?>" alt="Logo" id="logo"/></a>
      
      <!-- <div id="glow"></div> -->
      <div id="the-knot"></div>
      <?php $home = is_home(); ?>
      
      <div id="menu">
         <ul id="main-menu">
            <li><a href="<?php bloginfo('url'); ?>/#home" class="active<?php if (!$home) echo(' external'); ?>"><?php _e('Home','Glider') ?></a></li>
            
            <?php 
            $pagesContent = array();
            $i=0;
            
            $home_pages_num = count(get_option('glider_home_pages'));
                                 
            $arr = array( 'post_type' => 'page',
                     'orderby' => 'menu_order',
                     'order' => 'ASC',
                     'post__in' => get_option('glider_home_pages'),
                     'showposts' => $home_pages_num );
         
            query_posts($arr); ?>
            <?php if (have_posts()) : while(have_posts()) : the_post(); ?>
               <?php $hash = get_the_title();
               $hash = strtolower(preg_replace('/ /','_', $hash)); ?>
               <?php $hash = preg_replace('/[^a-z0-9]/','', $hash); ?>
               
               <?php if ($i!=0) { ?> 
                  <li><a href="<?php bloginfo('url'); ?>/#<?php echo $hash; ?>"<?php if (!$home) echo(' class="external"'); ?>><?php the_title(); ?></a></li>
               <?php } ?>
               
               <?php $pagesContent[$i]['hash'] = $hash;
               global $more; $more=1;
               $pagesContent[$i]['content'] = get_the_content();
               $pagesContent[$i]['content'] = apply_filters('the_content', $pagesContent[$i]['content']);;
               $pagesContent[$i]['title'] = get_the_title();
               
               $thumb = '';
               $width = 173;
               $height = 173;
               $classtext = '';
               $titletext = get_the_title();
                                    
               $thumbnail = get_thumbnail($width,$height,$classtext,$titletext,$titletext);
               
               $pagesContent[$i]['thumbnail'] = $thumbnail["thumb"];
               
               $pagesContent[$i]['use_timthumb'] = $thumbnail["use_timthumb"];
                              
               $pagesContent[$i]['portfolio_categories'] = get_post_meta($post->ID,'et_portfolio_categories',true) ? get_post_meta($post->ID,'et_portfolio_categories',true) : '';
                              
               $pagesContent[$i]['portfolio'] = ( (bool) get_post_meta($post->ID,'et_portfolio_page',true) ) ? true : false;
               
               $i++; ?>
            <?php endwhile; endif; wp_reset_query(); ?>
            
            <li><a href="<?php echo get_category_link(get_cat_ID(get_option('glider_blog_cat'))); ?>" class="external"><?php _e('Blog','Glider'); ?></a></li>
            
         </ul>
      </div> <!-- #main-menu -->
            
      <span id="active-arrow"></span>   
      
      <div id="right-border"></div>
   </div> <!-- #main-leftarea -->