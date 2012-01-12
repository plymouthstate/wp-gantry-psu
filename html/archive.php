<?php
/**
 * @version   1.17 August 15, 2011
 * @author    RocketTheme http://www.rockettheme.com
 * @copyright Copyright (C) 2007 - 2011 RocketTheme, LLC
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 */
// no direct access
?>

<?php global $post, $posts, $query_string, $wp_query; ?>

	<?php /** Begin Aside **/ if ($gantry->countModules('aside')) : ?>
	<div class="rt-aside">
		<div class="rt-aside-bg">
		<?php echo $gantry->displayModules('aside','aside','standard'); ?>
		</div>
	</div>
	<?php /** End Aside **/ endif; ?>
	<div class="rt-wordpress">
		<div class="rt-archive">
			
			<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			
			if (is_category()) {
				$post_count = $gantry->get('category-count');
				$page_title = $gantry->get('category-page-title');
				$custom_page_title = $gantry->get('category-custom-page-title');
				$title = $gantry->get('category-title');
				$title_link = $gantry->get('category-link-title');
				$author = $gantry->get('category-meta-author');
				$date = $gantry->get('category-meta-date');
				$comments = $gantry->get('category-meta-comments');
				$comments_link = $gantry->get('category-meta-link-comments');
				$modified = $gantry->get('category-meta-modified');
				$content = $gantry->get('category-content');
				$readmore = $gantry->get('category-readmore');
			}
			
			if (is_day() || is_month() || is_year() || is_author()) {
				$post_count = $gantry->get('archive-count');
				$page_title = $gantry->get('archive-page-title');
				$custom_page_title = $gantry->get('archive-custom-page-title');
				$title = $gantry->get('archive-title');
				$title_link = $gantry->get('archive-link-title');
				$author = $gantry->get('archive-meta-author');
				$date = $gantry->get('archive-meta-date');
				$comments = $gantry->get('archive-meta-comments');
				$comments_link = $gantry->get('archive-meta-link-comments');
				$modified = $gantry->get('archive-meta-modified');
				$content = $gantry->get('archive-content');
				$readmore = $gantry->get('archive-readmore');
			}
			
			if (is_tag()) {
				$post_count = $gantry->get('tags-count');
				$page_title = $gantry->get('tags-page-title');
				$custom_page_title = $gantry->get('tags-custom-page-title');
				$title = $gantry->get('tags-title');
				$title_link = $gantry->get('tags-link-title');
				$author = $gantry->get('tags-meta-author');
				$date = $gantry->get('tags-meta-date');
				$comments = $gantry->get('tags-meta-comments');
				$comments_link = $gantry->get('tags-meta-link-comments');
				$modified = $gantry->get('tags-meta-modified');
				$content = $gantry->get('tags-content');
				$readmore = $gantry->get('tags-readmore');
			}
			
            $query = $wp_query->query;
            if (!is_array($query)) parse_str($query, $query); 
			query_posts(array_merge($query, array('posts_per_page' => $post_count, 'paged' => $paged))); ?>
	
			<?php if(have_posts()) : ?>
			
			<?php if($page_title) : ?>
			
				<?php if($custom_page_title != '') : ?>
				
					<h2 class="rt-pagetitle"><?php echo strip_tags($custom_page_title); ?></h2>
				
				<?php else : ?>
		    																										
					<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
					<?php /* If this is a category archive */ if (is_category()) { ?>
						<h2 class="rt-pagetitle"><?php _re('Category:'); ?> <?php single_cat_title(); ?></h2>
					<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
						<h2 class="rt-pagetitle"><?php _re('Posts Tagged'); ?> &#8216;<?php single_tag_title(); ?>&#8217;</h2>
					<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
						<h2 class="rt-pagetitle"><?php _re('Archive for'); ?> <?php the_time('F jS, Y'); ?></h2>
							<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
						<h2 class="rt-pagetitle"><?php _re('Archive for'); ?> <?php the_time('F, Y'); ?></h2>
					<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
						<h2 class="rt-pagetitle"><?php _re('Archive for'); ?> <?php the_time('Y'); ?></h2>
					<?php /* If this is an author archive */ } elseif (is_author()) { ?>
						<h2 class="rt-pagetitle"><?php _re('Author Archive'); ?></h2>
					<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
						<h2 class="rt-pagetitle"><?php _re('Blog Archives'); ?></h2>
					<?php } ?>

				<?php endif; ?>
			
			<?php endif; ?>
															
			<?php while (have_posts()) : the_post(); ?>
		
			<!-- Begin Post -->
			
			<div class="rt-article">
				<div class="rt-article-bg">
					<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
						
						<?php if($title) : ?>
		
						<!-- Begin Title -->
					
						<div class="rt-headline">

							<?php if($date) : ?>
							
							<!-- Begin Date & Time -->
		
							<span class="rt-date-posted"><!--<?php _re('Posted on'); ?> --><span class="date"><?php the_time('M j \'y'); ?></span><span class="time"><?php the_time('g:i a'); ?></span></span>
							
							<!-- End Date & Time -->
							
							<?php endif; ?>
							
							<?php if($title_link) : ?>
							
							<h2 class="rt-article-title">
								<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
							</h2>
								
							<?php else : ?>
								
							<h2 class="rt-article-title">
								<?php the_title(); ?>
							</h2>
								
							<?php endif; ?>
								
						</div>
							
						<!-- End Title -->
							
						<?php endif; ?>
						
						<div class="rt-article-content">
						
							<?php if($comments || $date || $modified || $author) : ?>
									
							<!-- Begin Meta -->
							
							<div class="rt-articleinfo">
							
								<?php if($modified) : ?>
								
								<!-- Begin Modified Date -->
			
								<span class="rt-date-modified"><?php _re('Last Updated on'); ?> <?php the_modified_date('l, d F, Y H:i', '<span>', '</span>'); ?></span>
								
								<!-- End Modified Date -->
								
								<?php endif; ?>
									
								<?php if($author) : ?>
							
								<!-- Begin Author -->
							
								<span class="rt-author"><?php _re('Written by'); ?> <span><?php the_author(); ?></span></span>
								
								<!-- End Author -->
								
								<?php endif; ?>
								
								<?php if($comments) : ?>
									
									<!-- Begin Comments -->
									
									<?php if($comments_link) : ?>
									
									<div class="rt-comment-block">
										<a href="<?php the_permalink(); ?>#comments">
											<span class="rt-comment-text"><?php comments_number(_r('0 Comments'), _r('1 Comment'), _r('% Comments')); ?></span>
										</a>
									</div>
	
									<?php else : ?>
				
									<div class="rt-comment-block">
										<span class="rt-comment-text"><?php comments_number(_r('0 Comments'), _r('1 Comment'), _r('% Comments')); ?></span>
									</div>
									
									<?php endif; ?>
									
									<!-- End Comments -->
								
								<?php endif; ?>
								
							</div>
							
							<!-- End Meta -->
							
							<?php endif; ?>
	
							<!-- Begin Post Content -->
						
							<?php if($content == 'content') : ?>
							
							<?php the_content(false); ?>
												
							<?php else : ?>
												
							<?php the_excerpt(); ?>
													
							<?php endif; ?>
							
							<?php if(preg_match('/<!--more(.*?)?-->/', $post->post_content)) : ?>
							
							<p class="rt-readon-surround">
								<a href="<?php the_permalink(); ?>" class="readon"><span><?php _re('Learn more ...'); ?></span></a>
							</p>
							
							<?php endif; ?>
							
							<!-- End Post Content -->
						
						</div>			
					</div>
				</div>
			</div>
			
			<!-- End Post -->
			
			<?php endwhile;?>
			
			<!-- Begin Navigation -->
											
			<?php global $wp_query; $total_pages = $wp_query->max_num_pages; if($total_pages > 1) : ?>
					
			<div class="rt-pagination nav">
				<div class="alignleft">
					<?php next_posts_link('&laquo; '._r('Older Entries')); ?>
				</div>
				<div class="alignright">
					<?php previous_posts_link(_r('Newer Entries').' &raquo;') ?>
				</div>
			</div><br />
						
			<?php endif; ?>
	
			<!-- End Navigation -->
			
			<?php else : ?>
																																	
			<h2 class="rt-pagetitle">
				<?php _re("Sorry, but there aren't any posts matching your query."); ?>
			</h2>
															
			<?php endif; ?>
															
			<?php wp_reset_query(); ?>
	
		</div>
	</div>
