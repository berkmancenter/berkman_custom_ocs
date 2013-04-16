<?php

// Query featured entries

$featured = new WP_Query(

	array(

		'no_found_rows'				=> TRUE,

		'update_post_meta_cache'	=> FALSE,

		'update_post_term_cache'	=> FALSE,

		'ignore_sticky_posts'		=> 1,

		'posts_per_page'			=> wpb_option('featured-slider-number'),

		'cat'						=> wpb_option('featured-slider-category')

	)

);

?>



<?php if ( is_home() && !is_paged() ): ?>



	<?php if ( wpb_option('featured-slider-heading') ): ?>

		<h4 class="miniheading pad"><?php echo wpb_option('featured-slider-heading'); ?></h4>

	<?php endif; ?>



	<script type="text/javascript">

		jQuery(window).load(function(){

			jQuery('.flex-megaspot').flexslider({

				animation: "slide",

				slideshow: false,

				directionNav: true,

				controlNav: true,

				pauseOnHover: true,

				slideshowSpeed: 7000,

				animationDuration: 600,

				smoothHeight: true,

				touch: false

			});

			jQuery('.slides').addClass('loaded');

		}); 

	</script>



	<div class="megaspot pad fix">

		<div class="flexslider flex-megaspot">

			<ul class="slides">

				

				<?php while ( $featured->have_posts() ): $featured->the_post(); ?>

				<li <?php post_class('entry'); ?>>

					<div class="entry-thumbnail">

						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">

							<?php if ( has_post_thumbnail() ): ?>

							<?php the_post_thumbnail('size-featured'); ?>

								<?php if ( has_post_format('video') || has_post_format('audio') ) echo '<span class="icon-thumb"></span>'; ?>

							<?php else: ?>

								<img src="<?php echo get_template_directory_uri(); ?>/img/placeholder.png" alt="<?php the_title_attribute(); ?>" />

							<?php endif; ?>

							<span class="glass"></span>

						</a>

						<?php if ( wpb_option('featured-slider-title') ): ?>

						<h2 class="entry-title alt">

							<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">

								<?php the_title(); ?>

							</a>

						</h2>

						<?php endif; ?>

					</div>

					

					<header class="fix">

						<?php if ( !wpb_option('post-hide-categories') ): ?>

							<p class="entry-category"><?php the_category(' &middot; '); ?></p>

						<?php endif; ?>

						

						<?php if ( !wpb_option('post-hide-comments') ): ?>

							<p class="entry-comments">

								<a href="<?php comments_link(); ?>">

									<span><?php comments_number( '0', '1', '%' ); ?><i class="pike"></i></span>

								</a></p>

						<?php endif; ?>

						

						<div class="clear"></div>

						

						<?php if ( !wpb_option('featured-slider-title') ): ?>

						<h2 class="entry-title">

							<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">

								<?php the_title(); ?>

							</a>

						</h2>

						<?php endif; ?>



						<?php if ( !wpb_option('post-hide-date') ): ?>

							<ul class="entry-meta fix">

								<li class="entry-date">

									<?php the_time('F j, Y'); ?>

									<?php if ( !wpb_option('post-hide-detailed-date') ): ?>

										<?php _e('at','newsroom'); ?> <?php the_time('g:i a'); ?>

									<?php endif; ?>

								</li>

							</ul>

						<?php endif; ?>

					</header>



					<div class="text">

						<?php the_excerpt(); ?>

						<?php if ( wpb_option('excerpt-more-link-enable') ): ?>

							<p><a class="more-link" href="<?php the_permalink(); ?>"><?php echo wpb_option('read-more', __('(more...)','newsroom')); ?></a></p>

						<?php endif; ?>

						<div class="clear"></div>

					</div>	

				</li>

				<?php endwhile; ?>

				

			</ul>

		</div>

	</div>

	<!--/featured slider-->



<?php endif; ?>

