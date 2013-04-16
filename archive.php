<?php get_header(); ?>



<div id="page">

	<div class="container">

		<div id="page-inner">

		

			<div class="main fix <?php echo wpb_option('general-sidebar','sidebar-right'); ?>">

				<div class="content-part">

					

					<?php if ( !wpb_option('disable-archive-heading') ): ?>

					<div id="page-title" class="pad">

						<h2><?php echo wpb_archive_heading(); ?></h2>

						<?php if (category_description() == '') : ?>

						<?php else : ?>

							<div class="category-description">

							<?php echo category_description(); ?>

							</div>

						<?php endif; ?>

					</div><!--/page-title-->

					<?php endif; ?>

					

					<?php

						if ( wpb_option('post-structure-archive') ) {

							get_template_part('_loop-alt');

						} else {

							get_template_part('_loop');

						}

					?>

				</div><!--/content-part-->

				

				<div class="sidebar">	

					<?php get_sidebar(); ?>

				</div><!--/sidebar-->

			

			</div><!--/main-->

			

		</div><!--/page-inner-->

	</div><!--/container-->

</div><!--/page-->



<?php get_footer(); ?>