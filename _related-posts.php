<?php $related = air_related_posts::get_posts(); ?>



<?php if ( $related->have_posts() ): ?>

<ul class="entry-related fix">

	<h4 class="miniheading pad">

		<span><?php echo air_related_posts::get_option('title',__('Related Posts','newsroom')); ?></span>

	</h4>



	<?php while ( $related->have_posts() ) : $related->the_post(); ?>

	<li class="related">

		<article <?php post_class(); ?>>

			<a href="<?php the_permalink(); ?>">

				<?php if ( !air_related_posts::get_option('hide-thumbnail') ): ?>

				<span class="entry-thumbnail">

					<?php if ( has_post_thumbnail() ): ?>

						<?php the_post_thumbnail('size-thumbnail'); ?>

					<?php else: ?>

						<img src="<?php echo get_template_directory_uri(); ?>/img/placeholder-small.png" alt="<?php the_title() ;?>" />

					<?php endif; ?>

					<i class="glass"></i>

				</span>

				<?php endif; // end hide-thumbnail check ?>



				<span class="rel-entry-title"><?php the_title(); ?></span>



				<?php if ( !air_related_posts::get_option('hide-date') ): ?>

					<span class="rel-entry-date"><?php the_time('F j, Y'); ?></span>

				<?php endif; ?>

			</a>

		</article>

	</li>

	<?php endwhile; ?>



</ul><!--/entry-related-->

<?php endif; ?>



<?php wp_reset_query(); ?>

