<?php
/**
 * @version   1.17 August 15, 2011
 * @author    RocketTheme http://www.rockettheme.com
 * @copyright Copyright (C) 2007 - 2011 RocketTheme, LLC
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 */

// no direct access
?>

<?php global $post, $posts, $query_string; ?>
	<?php /** Begin Breadcrumbs **/ if ($gantry->countModules('breadcrumb')) : ?>
	<div id="rt-breadcrumbs">
		<div class="rt-breadcrumbs-bg">
			<?php echo $gantry->displayModules('breadcrumb','raw','standard'); ?>
		</div>
	</div>
	<?php /** End Breadcrumbs **/ endif; ?>

	<?php if ($gantry->get('blog-page-title') != '') : ?>
	
	<h1 class="rt-pagetitle">
		<?php echo $gantry->get('blog-page-title'); ?>
	</h1>
	
	<?php endif; ?>
			
	<?php /** Begin Aside **/ if ($gantry->countModules('aside')) : ?>
	<div class="rt-aside">
		<div class="rt-aside-bg">
		<?php echo $gantry->displayModules('aside','aside','standard'); ?>
		</div>
	</div>
	<?php /** End Aside **/ endif; ?>

	<div class="rt-wordpress">
		<div class="rt-blog">
	
			<div class="rt-leading-articles">
			
				<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				
				if($gantry->get('blog-query') != '') : query_posts('paged='.$paged.'&'.$gantry->get('blog-query'));
				
				else: query_posts('paged='.$paged.'&orderby='.$gantry->get('blog-order').'&cat='.$gantry->get('blog-cat').'&post_type='.$gantry->get('blog-type'));
				
				endif; 
				
				?>
		
				<?php while (have_posts()) : the_post(); ?>
			
				<!-- Begin Post -->
			
				<div class="rt-article">					
					<div class="rt-article-bg">
						<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
							
							<?php if($gantry->get('blog-title')) : ?>
			
							<!-- Begin Title -->
						
							<div class="rt-headline">
								<?php if($gantry->get('post-meta-date')) : ?>
								
								<!-- Begin Date & Time -->
			
								<span class="rt-date-posted"><!--<?php _re('Posted on'); ?> --><span class="date"><?php the_time('M j \'y'); ?></span><span class="time"><?php the_time('g:i a'); ?></span></span>
								
								<!-- End Date & Time -->
								
								<?php endif; ?>
								
								<?php if($gantry->get('blog-link-title')) : ?>
								
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
							
								<?php if($gantry->get('blog-meta-comments') || $gantry->get('blog-meta-date') || $gantry->get('blog-meta-modified') || $gantry->get('blog-meta-author')) : ?>
									
								<!-- Begin Meta -->
								
								<div class="rt-articleinfo">
								
									<?php if($gantry->get('blog-meta-modified')) : ?>
									
									<!-- Begin Modified Date -->
				
									<span class="rt-date-modified"><?php _re('Last Updated on'); ?> <?php the_modified_date('l, d F, Y H:i', '<span>', '</span>'); ?></span>
									
									<!-- End Modified Date -->
									
									<?php endif; ?>
										
									<?php if($gantry->get('blog-meta-author')) : ?>
								
									<!-- Begin Author -->
								
									<span class="rt-author"><?php _re('Written by'); ?> <span><?php the_author(); ?></span></span>
									
									<!-- End Author -->
									
									<?php endif; ?>
									
									<?php if($gantry->get('blog-meta-comments')) : ?>
										
										<!-- Begin Comments -->
										
										<?php if($gantry->get('blog-meta-link-comments')) : ?>
										
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
							
								<div class="the-content">
									<?php if($gantry->get('blog-content') == 'content') : ?>
									
									<?php the_content(false); ?>
														
									<?php else : ?>
														
									<?php the_excerpt(); ?>
															
									<?php endif; ?>
									
									<?php if(preg_match('/<!--more(.*?)?-->/', $post->post_content)) : ?>
									
									<p class="rt-readon-surround">																			
										<a href="<?php the_permalink(); ?>" class="readon"><span><?php _re('Read more ...'); ?></span></a>
									</p>
									
									<?php endif; ?>
									
								</div>
								
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
	
			</div>
		</div>
	</div>
