<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11"> 
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title>Acoustic and Classical Guitarist and Performer Justin Cash</title>
<meta name="country" content="USA"/>
<meta name="state" content="Texas"/>
<meta name="city" content="Denton, Dallas, Fortworth" />
<meta name="zipcode" content="76208"/>
<meta name="geo.region" content="US-TX" />
<meta name="geo.placename" content="Dallas" />
<meta name="description" content="Acoustic and classical musician and artist Justin Cash is the top rated performer for the Dallas, North Texas region.  Book your guitar wedding or event today." />
<meta name="keywords" content="Acoustic, Classical, Guitar, Wedding, Dallas Performer, Singer, Song writer, Musician" />

<!-- <title><?php elegant_titles(); ?></title> -->
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
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/player-style.css" type="text/css" media="screen" title="no title" charset="utf-8">

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


	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.jplayer.min.js"></script>
	<script type="text/javascript">
	//<![CDATA[

	$(document).ready(function(){
		var Playlist = function(instance, playlist, options) {
			var self = this;

			this.instance = instance; // String: To associate specific HTML with this playlist
			this.playlist = playlist; // Array of Objects: The playlist
			this.options = options; // Object: The jPlayer constructor options for this playlist

			this.current = 0;

			this.cssId = {
				jPlayer: "jquery_jplayer_",
				interface: "jp_interface_",
				playlist: "jp_playlist_"
			};
			this.cssSelector = {};

			$.each(this.cssId, function(entity, id) {
				self.cssSelector[entity] = "#" + id + self.instance;
			});

			if(!this.options.cssSelectorAncestor) {
				this.options.cssSelectorAncestor = this.cssSelector.interface;
			}

			$(this.cssSelector.jPlayer).jPlayer(this.options);

			$(this.cssSelector.interface + " .jp-previous").click(function() {
				self.playlistPrev();
				$(this).blur();
				return false;
			});

			$(this.cssSelector.interface + " .jp-next").click(function() {
				self.playlistNext();
				$(this).blur();
				return false;
			});
		};

		Playlist.prototype = {
			displayPlaylist: function() {
				var self = this;
				$(this.cssSelector.playlist + " ul").empty();

				for (i=0; i < this.playlist.length; i++) {

					var listItem = (i === this.playlist.length-1) ? "<li class='jp-playlist-last'>" : "<li>";
					listItem += "<a href='#' id='" + this.cssId.playlist + this.instance + "_item_" + i +"' tabindex='1'>"+ this.playlist[i].name +"</a>";

					// Create links to free media
					if(this.playlist[i].free) {
						var first = true;
						listItem += "<div class='jp-free-media'>(";
						$.each(this.playlist[i], function(property,value) {
							if($.jPlayer.prototype.format[property]) { // Check property is a media format.
								if(first) {
									first = false;
								} else {
									listItem += " | ";
								}
								listItem += "<a id='" + self.cssId.playlist + self.instance + "_item_" + i + "_" + property + "' href='" + value + "' tabindex='1'>" + property + "</a>";
							}
						});
						listItem += ")</span>";
					}

					listItem += "</li>";

					// Associate playlist items with their media
					$(this.cssSelector.playlist + " ul").append(listItem);
					$(this.cssSelector.playlist + "_item_" + i).data("index", i).click(function() {
						var index = $(this).data("index");
						if(self.current !== index) {
							self.playlistChange(index);
						} else {
							$(self.cssSelector.jPlayer).jPlayer("play");
						}
						$(this).blur();
						return false;
					});

					// Disable free media links to force access via right click
					if(this.playlist[i].free) {
						$.each(this.playlist[i], function(property,value) {
							if($.jPlayer.prototype.format[property]) { // Check property is a media format.
								$(self.cssSelector.playlist + "_item_" + i + "_" + property).data("index", i).click(function() {
									var index = $(this).data("index");
									$(self.cssSelector.playlist + "_item_" + index).click();
									$(this).blur();
									return false;
								});
							}
						});
					}
				}
			},
			playlistInit: function(autoplay) {
				if(autoplay) {
					this.playlistChange(this.current);
				} else {
					this.playlistConfig(this.current);
				}
			},
			playlistConfig: function(index) {
				$(this.cssSelector.playlist + "_item_" + this.current).removeClass("jp-playlist-current").parent().removeClass("jp-playlist-current");
				$(this.cssSelector.playlist + "_item_" + index).addClass("jp-playlist-current").parent().addClass("jp-playlist-current");
				this.current = index;
				$(this.cssSelector.jPlayer).jPlayer("setMedia", this.playlist[this.current]);
			},
			playlistChange: function(index) {
				this.playlistConfig(index);
				$(this.cssSelector.jPlayer).jPlayer("play");
			},
			playlistNext: function() {
				var index = (this.current + 1 < this.playlist.length) ? this.current + 1 : 0;
				this.playlistChange(index);
			},
			playlistPrev: function() {
				var index = (this.current - 1 >= 0) ? this.current - 1 : this.playlist.length - 1;
				this.playlistChange(index);
			}
		};

		var mediaPlaylist = new Playlist("1", [
			// {
			// 	name:"Big Buck Bunny Trailer",
			// 	m4v:"http://www.jplayer.org/video/m4v/Big_Buck_Bunny_Trailer_480x270_h264aac.m4v",
			//
			// 	poster:"http://www.jplayer.org/video/poster/Big_Buck_Bunny_Trailer_480x270.png"
			// },
			{
				name:"Classical Guitar",
				mp3:"/wp-content/uploads/2011/04/Classical-Guitar-Mp3.mp3",
				poster: "/wp-content/themes/Glider/images/tolmar/music/a.jpg"
			},
			{
				name:"Vocals",
				mp3: "/wp-content/uploads/2011/05/vocalB.mp3",
        poster: "/wp-content/themes/Glider/images/tolmar/music/b.jpg"
			},
			{
				name:"Party Band",
				mp3:"/wp-content/uploads/2011/04/C-Party-Band-Demo.mp3",
        poster: "/wp-content/themes/Glider/images/tolmar/music/party.jpg"
			},
			{
				name:"Spanish Guitar",
				mp3:"/wp-content/uploads/2011/04/D-Spanish-Guitar-Demo.mp3",
        poster: "/wp-content/themes/Glider/images/tolmar/music/c.jpg"
			},
			{
				name:"Solo Guitar",
				mp3: "/wp-content/uploads/2011/05/soloE.mp3",
        poster: "/wp-content/themes/Glider/images/tolmar/music/d.jpg"
			},
			{
				name:"Jazz Trio",
				mp3: "/wp-content/uploads/2011/04/F-Jazz-Trio-Demo.mp3",
				poster: "/wp-content/uploads/2011/04/F-Jazz-Trio-Demo-Image1.jpg"
			},
			{
				name:"Gypsy Jazz",
				mp3:"/wp-content/uploads/2011/04/G-Gypsy-Jazz-Group-Demo.mp3",
				poster: "/wp-content/uploads/2011/04/G-Gypsy-Jazz-Trio-Demo-Image.jpg"
			},
			{
				name:"World Music",
				mp3: "/wp-content/uploads/2011/04/Ethnic-Demo.mp3",
				poster: "/wp-content/uploads/2011/04/H-World_Ethnic-Demo-Image.jpg"
			},
			{
				name:"Accoustic Duo",
				mp3:"/wp-content/uploads/2011/04/I-Acoustic-Guitar-Duo-Demo.mp3",
				poster: "/wp-content/uploads/2011/04/I-Acoustic-Guitar-Duo-Demo-Image.jpg"
			},
      {
        name:"Holiday Jazz Trio",
        mp3: "/wp-content/uploads/2015/11/jazz-holiday.mp3",
        poster: "/wp-content/uploads/2015/11/e.jpg"
      }
		], {
			ready: function() {
				mediaPlaylist.displayPlaylist();
				mediaPlaylist.playlistInit(false); // Parameter is a boolean for autoplay.
			},
			ended: function() {
				mediaPlaylist.playlistNext();
			},
			swfPath: "/wp-content/themes/Glider/js",
			solution: "html,flash",
			supplied: "mp3"
		});

	});
	//]]>

	</script>

<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
<?php wp_head(); ?>
<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-32593521-2']);
  _gaq.push(['_trackPageview']);
  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
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
