<?php if( (wpb_option('newsflash-enable-home') && is_home()) || (wpb_option('newsflash-enable-single') && is_single()) ) : ?>



<div id="subheader">

	<div class="container">

		<div id="subheader-inner" class="fix">

			

			<script type="text/javascript">

				jQuery(window).load(function() {

					jQuery('.flex-newsflash').flexslider({

						animation: "fade",

						slideshow: true,

						directionNav: true,

						controlNav: false,

						pauseOnHover: true,

						slideshowSpeed: 25000,

						animationDuration: 600,

						smoothHeight: true

					});

					jQuery('.slides').addClass('loaded');

				}); 

			</script>

					

			<div class="newsflash fix">

				<div class="flexslider flex-newsflash" id="slider-<?php the_ID(); ?>">

					<ul class="slides">		



						<?php if ( wpb_option('newsflash-most-discussed') ): ?>

						

						<?php

							add_filter('posts_where', 'wpbandit_filter_popular_posts');

							$popular = new WP_Query(

								array(

									'no_found_rows'				=> TRUE,

									'update_post_meta_cache'	=> FALSE,

									'update_post_term_cache'	=> FALSE,

									'ignore_sticky_posts'		=> TRUE,

									'posts_per_page'			=> '2',

									'orderby'					=> 'comment_count'

								)

							);

							remove_filter('posts_where', 'wpbandit_filter_popular_posts');

						?>



						<?php if ( $popular->have_posts() ): ?>

						<li class="most-popular">

							<ul>

								<li class="grid first">

									<div class="pad">

										<h3><?php _e('Most Popular','newsroom'); ?></h3>

										<p>

											<?php if ( wpb_option('newsflash-most-popular') == '0' ) _e('All time','newsroom'); ?>

											<?php if ( wpb_option('newsflash-most-popular') == 'month' ) _e('This month','newsroom'); ?>

											<?php if ( wpb_option('newsflash-most-popular') == 'week' ) _e('This week','newsroom'); ?>

											<?php if ( wpb_option('newsflash-most-popular') == 'day' ) _e('Last 24 hours','newsroom'); ?>

										</p>

									</div>

								</li>



								<?php while ( $popular->have_posts() ): $popular->the_post(); ?>

								<li class="article grid">

									<div class="pad">

										<div class="overflow">

											<h3 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

											<p class="sub"><?php comments_number(); ?></p>

											<span class="fade"></span>

										</div>

									</div>

								</li>

								<?php endwhile; ?>

							</ul>

						</li><!--/most-popular-->

						<?php endif; // end have popular posts ?>

						<?php endif; // end most discussed enabled ?>

						

						<!--recent posts-->

						<?php if ( wpb_option('newsflash-most-recent') ): ?>

						<li class="most-recent">

							<ul>

								<li class="grid first">

									<div class="pad">

										<h3><?php _e('Latest Stories','newsroom'); ?></h3>

										<p><?php _e('What is new?','newsroom'); ?></p>

									</div>

								</li>

								

								<?php

									$recent = new WP_Query(

										array(

											'no_found_rows'				=> TRUE,

											'update_post_meta_cache'	=> FALSE,

											'update_post_term_cache'	=> FALSE,

											'ignore_sticky_posts'		=> TRUE,

											'posts_per_page'			=> '2'

										)

									);

								?>



								<?php while ( $recent->have_posts() ): $recent->the_post(); ?>

								<li class="article grid overflow">

									<div class="pad">

										<div class="overflow">

											<h3 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

											<p class="sub"><?php the_time('F j, Y'); ?></p>

											<span class="fade"></span>

										</div>

									</div>

								</li>

								<?php endwhile; ?>

							</ul>

						</li><!--/most-recent-->

						<?php endif; ?>

						

						<!--recent comments-->

						<?php if ( wpb_option('newsflash-recent-comments') ): ?>

						<li class="recent-comments">

							<ul>

								<li class="grid first">

									<div class="pad">

										<h3><?php _e('Comments','newsroom'); ?></h3>

										<p><?php _e('Most Recent','newsroom'); ?></p>

									</div>

								</li>

								

								<?php $comments = get_comments(array('number'=>2,'status'=>'approve','post_status'=>'publish')); ?>

								

								<?php foreach ( $comments as $comment ): ?>

								<li class="article grid overflow">

									<div class="pad">

										<div class="overflow">

											<p class="av"><?php echo get_avatar($comment->comment_author_email,$size='34'); ?></p>

											<p class="sub"><?php echo $comment->comment_author; ?> on: </p>

											<h3 class="title">

												<a href="<?php echo esc_url(get_comment_link($comment->comment_ID)); ?>">

													<?php echo get_the_title($comment->comment_post_ID); ?>

												</a>

											</h3>

											<span class="fade"></span>

										</div>

									</div>

								</li>

								<?php endforeach; ?>

							</ul>

						</li><!--/recent-comments-->

						<?php endif; ?>

						

					</ul>

				</div><!--/flexslider-->

			</div><!--/newsflash-->

			

		</div><!--/subfooter-inner-->

	</div><!--/container-->

</div><!--/subheader-->

<?php endif; ?>