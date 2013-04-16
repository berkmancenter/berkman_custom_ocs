<?php get_header(); ?>



<div id="page">

	<div class="container">

		<div id="page-inner">



			<div class="main fix <?php echo wpb_option('general-sidebar','sidebar-right'); ?>">

			

				<div class="content-part">

					<?php if ( wpb_option('featured-slider-enable') ) { get_template_part('_featured'); } ?>

					

					<!--home widgets top-->

					<?php if ( is_home() && !is_paged() ): ?>

						<?php if ( wpb_option('home-widgets-top') ): ?>

						<?php if ( wpb_option('home-widgets-top-title') ): ?><h4 class="miniheading pad"><?php echo wpb_option('home-widgets-top-title'); ?></h4><?php endif; ?>

						<div id="spot-top" class="home-widgets pad fix">

							<ul class="grid one-half"><?php dynamic_sidebar('widget-home-top-1'); ?></ul>

							<ul class="grid one-half last"><?php dynamic_sidebar('widget-home-top-2'); ?></ul>

						</div>

						<?php endif; ?>

						

						<h4 class="miniheading pad"><?php echo wpb_option('blog-heading', __('Most Recent', 'newsroom')); ?></h4>

					<?php endif; ?>

					

					<?php

						if ( wpb_option('post-structure-home') ) {

							get_template_part('_loop-alt');

						} else {

							get_template_part('_loop');

						}

					?>

					

					<!--home widgets bottom-->

					<?php if ( is_home() && !is_paged() ): ?>

						<?php if ( wpb_option('home-widgets-bottom') ): ?>

						<?php if ( wpb_option('home-widgets-bottom-title') ): ?><h4 class="miniheading pad"><?php echo wpb_option('home-widgets-bottom-title'); ?></h4><?php endif; ?>

						<div id="spot-bottom" class="home-widgets pad fix">

							<ul class="grid one-half"><?php dynamic_sidebar('widget-home-bottom-1'); ?></ul>

							<ul class="grid one-half last"><?php dynamic_sidebar('widget-home-bottom-2'); ?></ul>

						</div>

						<?php endif; ?>

					<?php endif; ?>

					

				</div><!--/content-part-->

				

				<div class="sidebar">	

					<?php get_sidebar(); ?>

				</div><!--/sidebar-->

			

			</div><!--/main-->

			

		</div><!--/page-inner-->

	</div><!--/container-->

</div><!--/page-->



<?php get_footer(); ?>