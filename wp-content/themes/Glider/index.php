<?php if (is_archive()) $post_number = get_option('glider_archivenum_posts');
if (is_search()) $post_number = get_option('glider_searchnum_posts');
if (is_tag()) $post_number = get_option('glider_tagnum_posts');
if (is_category()) $post_number = get_option('glider_catnum_posts'); 
$blogStyle = ( get_option('glider_blog_style') == 'on' ) ? true : false; ?>
<?php include(TEMPLATEPATH . '/header.php'); ?>
	<!-- This is a test  -->
	<div id="main-rightarea">
		<div class="topbg"></div>
		
		<div class="block">
			<h2 class="gallery-title"><?php _e('From The Blog','Glider'); ?></h2>
			
			<?php $i=0; ?>
			<?php global $query_string; 
			if (is_category()) query_posts($query_string . "&showposts=$post_number&paged=$paged&cat=$cat");
			else query_posts($query_string . "&showposts=$post_number&paged=$paged"); ?>
				<?php if (have_posts()) : while(have_posts()) : the_post(); ?>
					<?php $i++; ?>
					<div class="content-area<?php if (!$blogStyle) echo ' small'; else echo ' blogstyle' ?> clearfix<?php if ($i % 2 == 0) echo(' last'); ?>">
						<?php 
							$thumb = '';
							$width = 103;
							$height = 103;
							if ($blogStyle) {
								$width = 173;
								$height = 173;
							}
							$classtext = '';
							$titletext = get_the_title();	
							$thumbnail = get_thumbnail($width,$height,$classtext,$titletext,$titletext);
							
							$thumb = $thumbnail['thumb']; ?>
						
						<?php if ($thumb <> '' && $blogStyle && get_option('glider_thumbnails_index') == 'on') { ?>
							<div class="thumb">
								<?php print_thumbnail($thumb, $thumbnail['use_timthumb'], $titletext, $width, $height); ?>
								<span class="overlay"></span>
							</div> <!-- .thumb -->
						<?php } ?>
						
						<h2 class="<?php if (!$blogStyle) echo 'blog'; ?>title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						<?php if ($blogStyle) include(TEMPLATEPATH . '/includes/postinfo.php'); 
						else { ?>
							<p class="postinfo"><?php _e('Posted by','Glider'); ?> <?php the_author_posts_link(); ?> <?php _e('on','Glider'); ?> <?php the_time(get_option('glider_date_format')); ?></p>
						<?php } ?>
						
						<?php if ($thumb <> '' && !$blogStyle && get_option('glider_thumbnails_index') == 'on') { ?>
							<div class="blogthumb">
								<a href="<?php the_permalink(); ?>">
									<?php print_thumbnail($thumb, $thumbnail['use_timthumb'], $titletext, $width, $height, ''); ?>
									<span class="overlay"></span>
								</a>
							</div> <!-- end .blogthumb -->
						<?php } ?>
						
						<?php if ($blogStyle) the_content();
						else { ?>
							<p><?php truncate_post(115); ?></p>
						<?php } ?>
						
						<a href="<?php the_permalink(); ?>" class="readmore"><span><?php _e('read more','Glider'); ?></span></a>
						
						<div class="shadow"></div>
					</div> <!-- .content-area -->	
				<?php endwhile; ?>
					<?php if (function_exists('wp_pagenavi')) { wp_pagenavi(); }
					else { ?>
						<?php include(TEMPLATEPATH . '/includes/navigation.php'); ?>
					<?php } ?>
				<?php else : ?>
					<?php include(TEMPLATEPATH . '/includes/no-results.php'); ?>
				<?php endif; wp_reset_query(); ?>
		</div> <!-- .block -->
		
	</div> <!-- #main-rightarea -->

<?php get_footer(); ?>