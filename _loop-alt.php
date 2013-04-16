<?php $content = wpb_content_format(); // Set content format ?>



<?php if ( have_posts() ) : $post = $posts[0]; $c=0; ?>

<?php while ( have_posts() ): the_post(); ?>



<?php

if ( $wp_query->post_count > 1 ) {

	$c++; 

	if( !$paged && $c == 1) echo '<div class="bigspot pad fix"><div class="grid one-half">'; 

	if( !$paged && $c == 2) echo '<div class="grid one-half last">';

	if( !$paged && $c == 3) printf('<h4 class="miniheading pad">%s</h4>',wpb_option('blog-subheading',__('More', 'newsroom')));

}

?>



<article id="entry-<?php the_ID(); ?>" <?php post_class('entry fix'); ?>>

	<div class="pad fix <?php if((wpb_option('blog-format') == '1')) echo 'post-format'; ?>">	

	

		<?php if((wpb_option('blog-format') == '2') && has_post_thumbnail()): ?>

		<div class="entry-main fix">

			<div class="entry-thumbnail">

				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">

					<?php if ( !$paged && $c == 1 || $c == 2 ): ?>

						<?php the_post_thumbnail('size-featured'); ?>

					<?php else :?>

						<?php the_post_thumbnail('size-thumbnail'); ?>

					<?php endif; ?>

					

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

			<?php if ( !$paged && $c == 1 || $c == 2 ): ?>

				<?php the_excerpt(); ?>				

				<div class="clear"></div>

				

				<?php if ( wpb_option('excerpt-more-link-enable') ): ?>

					<p>

						<a class="more-link" href="<?php the_permalink(); ?>">

							<?php echo wpb_option('read-more', __('(more...)','newsroom')); ?>

						</a>

					</p>

				<?php endif; ?>

				

			<?php else :?>

			

				<?php if ( 'content' === $content ) { the_content(); } ?>

				<?php if ( 'excerpt' === $content ) { the_excerpt(); } ?>			

				<div class="clear"></div>

				

				<?php if ( ('excerpt' === $content) && wpb_option('excerpt-more-link-enable') ): ?>

					<p>

						<a class="more-link" href="<?php the_permalink(); ?>">

							<?php echo wpb_option('read-more', __('(more...)','newsroom')); ?>

						</a>

					</p>

				<?php endif; ?>

				

			<?php endif; ?>

			</div>	

		

		<?php if ( (wpb_option('blog-format') == '2') && has_post_thumbnail() ): ?>

			</div><!--/entry-part-->

		</div><!--/entry-main-->

		<?php endif; ?>

		

	</div><!--/pad-->

</article>



<?php 

	if( !$paged && $c == 1 ) echo '</div>'; 

	if( !$paged && $c == 2 ) echo '</div></div>';

?>



<?php endwhile;?>

<?php endif; ?>



<?php get_template_part('_nav-posts'); ?>

