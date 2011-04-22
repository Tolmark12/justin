<?php global $shortname; ?>
	
	<!-- <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/cufon-yui.js"></script> -->
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/colaborate_thin.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.fancybox-1.2.6.pack.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.scrollTo-min.js"></script>
	
	<script type="text/javascript">
	//<![CDATA[
		// ***** FIX TO GET MUSIC PLAYER TO WORK *********** jQuery.noConflict();
		// 
		// <?php if (get_option('glider_cufon') == 'on') { ?>
		// 	Cufon.replace('h1, h2, h3, h4, h5, h6,.comment-author')('h2.gallery-title,.wp-pagenavi,h3#comments',{textShadow:'1px 1px 0px #fff'})('#main-leftarea a',{textShadow:'2px 2px 3px rgba(0, 0, 0, 0.4)', hover: { color: '#ded28e' }});
		// <?php } ?>
		// 
		jQuery("a[class^='fancybox']").fancybox({
			'overlayOpacity'	:	0.7,
			'overlayColor'		:	'#000000',
			'zoomSpeedIn'		:	500,
			'zoomSpeedOut'		:	500
		});	
		
		var $rightArea = jQuery('#main-rightarea'),
			rightAreaHeight = $rightArea.height(),
			leftAreaParts = '#main-leftarea, #main-leftarea #right-border',
			$galleryThumb = jQuery('.gallery-area .thumb'),
			$menuLink = jQuery('ul#main-menu li a'),
			menuTopPos = jQuery('#main-leftarea #menu').position().top;
		
		jQuery('span.magnify').css('opacity','0');
		
		if ( rightAreaHeight > 1024 ) jQuery(leftAreaParts).css('height',rightAreaHeight);
	
		$galleryThumb.hover(function(){
			jQuery(this).stop(true, true).animate({top: 6, paddingBottom: 0}, 400).find('span.magnify').stop(true, true).animate({opacity: 1}, 400).end().find('img').stop(true, true).animate({opacity: 0.7}, 400);
		}, function(){
			jQuery(this).stop(true, true).animate({top: 0, paddingBottom: 13}, 400).find('span.magnify').stop(true, true).animate({opacity: 0}, 400).end().find('img').stop(true, true).animate({opacity: 1}, 400);
		});
		
		var windowHash = window.location.hash;
		
		if (windowHash) {
			var activeLink = windowHash.substring(1),
				$targetLink = $menuLink.parent().find('a[href$=#'+activeLink+']');
			
			$menuLink.removeClass('active');
			
			$targetLink.addClass('active');
			
			jQuery('span#active-arrow').css('top',($targetLink.position().top+menuTopPos-3));
		}
		
		var isHome = <?php if (is_home()) echo('true'); else echo('false'); ?>;
		
		if (!isHome) {
			$targetLink = $menuLink.parent().find('a').filter(':last');
			$menuLink.removeClass('active');
			$targetLink.addClass('active');
			jQuery('span#active-arrow').css('top',($targetLink.position().top+menuTopPos-6));
		}
		
		$menuLink.click(function(event){
			if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
				if (jQuery(this).hasClass('external')) return;
				event.preventDefault();
				if (jQuery(this).hasClass('active')) return false;
				if (jQuery("html:animated").length) return false;
				
				$menuLink.parent().find('a').removeClass('active');
				jQuery(this).addClass('active');
				
				var activePos = jQuery(this).parent().position().top,
					linkId = this.hash.substring(1);
				
				jQuery('span#active-arrow').animate({top: (activePos + menuTopPos)},500);
				
				jQuery.scrollTo( '#'+linkId, { duration:500, onAfter:function(){
						window.location.hash = '#'+linkId;
					}
				}); 
			}
		}).hover(function(){
			jQuery(this).stop().animate({left: '-10px'},200);
		}, function(){
			jQuery(this).stop().animate({left: '0px'},200)
		});
		
		// window.setInterval( function() {Cufon.refresh('#main-leftarea a');}, 100 );
		
		// <?php if (get_option('glider_cufon') == 'on') { ?>
		// 	Cufon.now();
		// <?php } ?>
	//]]>	
	</script>