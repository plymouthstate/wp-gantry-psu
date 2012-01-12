<?php
/**
 * @version   1.17 August 15, 2011
 * @author    RocketTheme http://www.rockettheme.com
 * @copyright Copyright (C) 2007 - 2011 RocketTheme, LLC
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 */
// no direct access
?>

<?php global $post, $posts, $query_string, $s, $wp_query; ?>

	<?php /** Begin Aside **/ if ($gantry->countModules('aside')) : ?>
	<div class="rt-aside">
		<div class="rt-aside-bg">
		<?php echo $gantry->displayModules('aside','aside','standard'); ?>
		</div>
	</div>
	<?php /** End Aside **/ endif; ?>
	<div class="rt-wordpress">
		<div class="rt-search">
			
			<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			
			$query = $wp_query->query;
            if (!is_array($query)) parse_str($query, $query); 
			query_posts(array_merge($query, array('posts_per_page' => $gantry->get('search-count'), 'paged' => $paged))); ?>
	
			<?php if(have_posts()) : ?>
			
			<?php if($gantry->get('search-page-title')) : ?>
			    																										
				<h1 class="rt-pagetitle">
					<?php _re('Search Results for'); ?>&nbsp;&#8216;<?php the_search_query(); ?>&#8217;
				</h1>
			
			<?php endif; ?>
															
			<?php while (have_posts()) : the_post(); ?>
			
			<?php
							    																							
			//$title 	= strip_tags(get_the_title());
			$content 	= strip_tags(strip_shortcodes(get_the_content(false)));
			$excerpt 	= strip_tags(strip_shortcodes(get_the_excerpt()));
			$keys 		= explode(" ",$s);
			//$title	= preg_replace('/('.implode('|', $keys) .')/iu', '<span class="search-excerpt">\0</span>', $title);
			$content 	= preg_replace('/('.implode('|', $keys) .')/iu', '<span class="search-excerpt">\0</span>', $content);
			$excerpt 	= preg_replace('/('.implode('|', $keys) .')/iu', '<span class="search-excerpt">\0</span>', $excerpt);
																				
			?>
		
			<!-- Begin Post -->
			
			<div class="rt-article">				
				<div class="rt-article-bg">
					<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
						
						<?php if($gantry->get('search-title')) : ?>
		
						<!-- Begin Title -->
					
						<div class="rt-headline">
							
							<?php if($gantry->get('search-link-title')) : ?>
							
							<h1 class="rt-article-title">
								<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
							</h1>
								
							<?php else : ?>
								
							<h1 class="rt-article-title">
								<?php the_title(); ?>
							</h1>
								
							<?php endif; ?>
								
						</div>
							
						<!-- End Title -->
							
						<?php endif; ?>
						
						<div class="rt-article-content">
						
							<?php if($gantry->get('search-meta-comments') || $gantry->get('search-meta-date') || $gantry->get('search-meta-modified') || $gantry->get('search-meta-author')) : ?>
									
							<!-- Begin Meta -->
							
							<div class="rt-articleinfo">
							
								<?php if($gantry->get('search-meta-date')) : ?>
								
								<!-- Begin Date & Time -->
			
								<span class="rt-date-posted"><!--<?php _re('Posted on'); ?> --><span><?php the_time('l, d F, Y H:i'); ?></span></span>
								
								<!-- End Date & Time -->
								
								<?php endif; ?>
								
								<?php if($gantry->get('search-meta-modified')) : ?>
								
								<!-- Begin Modified Date -->
			
								<span class="rt-date-modified"><?php _re('Last Updated on'); ?> <?php the_modified_date('l, d F, Y H:i', '<span>', '</span>'); ?></span>
								
								<!-- End Modified Date -->
								
								<?php endif; ?>
									
								<?php if($gantry->get('search-meta-author')) : ?>
							
								<!-- Begin Author -->
							
								<span class="rt-author"><?php _re('Written by'); ?> <span><?php the_author(); ?></span></span>
								
								<!-- End Author -->
								
								<?php endif; ?>
								
								<?php if($gantry->get('search-meta-comments')) : ?>
									
									<!-- Begin Comments -->
									
									<?php if($gantry->get('search-meta-link-comments')) : ?>
									
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
						
							<?php if($gantry->get('search-content') == 'content') : ?>
							
							<p><?php echo $content; ?></p>
												
							<?php else : ?>
												
							<p><?php echo $excerpt; ?></p>
													
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
																													
			<h1 class="rt-pagetitle">
				<?php _re("No posts found. Try a different search?"); ?>
			</h1>
															
			<?php endif; ?>
															
			<?php wp_reset_query(); ?>
	
		</div>
	</div>
