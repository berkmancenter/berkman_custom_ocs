<?php get_header(); ?>



<div id="page">

	<div class="container">

		<div id="page-inner">

		

			<div class="main fix <?php echo wpb_option('general-sidebar','sidebar-right'); ?>">

				<div class="content-part">

					

					<div id="page-title" class="pad">

						<h1><?php _e('Error 404. <span>Oops!</span>','newsroom'); ?></h1>

					</div><!--/page-title-->

					

					<article class="entry">

						<div class="pad">

							<div class="text">

								<h1 class="entry-title"><?php _e('Something went wrong.','newsroom'); ?></h1>

								<p><?php _e('The page you are looking for could not be found.','newsroom'); ?></p>

								<div class="clear"></div>

							</div>

						</div>

					</article>

				</div><!--/content-part-->

				

				<div class="sidebar">	

					<?php get_sidebar(); ?>

				</div><!--/sidebar-->

			

			</div><!--/main-->

			

		</div><!--/page-inner-->

	</div><!--/container-->

</div><!--/page-->



<?php get_footer(); ?>

