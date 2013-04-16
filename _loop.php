<?php $content = wpb_content_format(); // Set content format ?>



<?php while ( have_posts() ): the_post(); ?>



<article id="entry-<?php the_ID(); ?>" <?php post_class('entry fix'); ?>>

	<div class="pad fix <?php if((wpb_option('blog-format') == '1')) echo 'post-format'; ?>">	

	

		<?php if ( (wpb_option('blog-format') == '2' ) && has_post_thumbnail() ): ?>

		<div class="entry-main fix">

			<div class="entry-thumbnail">

				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">

					<?php the_post_thumbnail('size-thumbnail'); ?>

					<?php if ( has_post_format('video') || has_post_format('audio') ) echo'<span class="icon-thumb"></span>'; ?>

					<span class="glass"></span>

				</a>

			</div><!--/entry-thumbnail-->

		

			<div class="entry-part">

		<?php endif; ?>	

		

			<header class="fix">

				<?php if ( !wpb_option('post-hide-categories') ): ?>

					<p class="entry-category"><?php the_category(' &middot; '); ?></p>

				<?php endif; ?>

				

				<?php if ( !wpb_option('post-hide-comments') ): ?>

					<p class="entry-comments">

						<a href="<?php comments_link(); ?>">

							<span><?php comments_number( '0', '1', '%' ); ?><i class="pike"></i></span>

						</a>

					</p>

				<?php endif; ?>

				

				<div class="clear"></div>

				<h2 class="entry-title">

					<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a>

				</h2>

				

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

			

			<?php if ( (wpb_option('blog-format') == '1') && get_post_format() ) { get_template_part('_post-formats'); } ?>

			

			<div class="text">

				<?php if ( 'content' === $content ) { the_content(); } ?>

				<?php if ( 'excerpt' === $content ) { the_excerpt(); } ?>

				<div class="clear"></div>

				

				<?php if ( ('excerpt'===$content) && wpb_option('excerpt-more-link-enable') ): ?>

					<p>

						<a class="more-link" href="<?php the_permalink(); ?>">

							<?php echo wpb_option('read-more', __('(more...)','newsroom')); ?>

						</a>

					</p>

				<?php endif; ?>

			</div>	

		

		<?php if ( (wpb_option('blog-format') == '2') && has_post_thumbnail() ): ?>

			</div><!--/entry-part-->

		</div><!--/entry-main-->

		<?php endif; ?>

		

	</div><!--/pad-->

</article>



<?php endwhile;?>



<?php get_template_part('_nav-posts'); ?>

