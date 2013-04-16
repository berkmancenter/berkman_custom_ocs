<?php get_header(); ?>



<?php while ( have_posts() ): the_post(); ?>

<div id="page">

	<div class="container">

		<div id="page-inner">

		

			<div class="main fix <?php echo wpb_option('general-sidebar','sidebar-right'); ?>">

			

				<div class="content-part">

					<div class="pad">

						<article id="entry-<?php the_ID(); ?>" <?php post_class('entry fix'); ?>>

							<?php get_template_part('_page-image'); ?>

							<div id="page-title">

								<h1><?php echo wpb_page_title(); ?></h1>

							</div><!--/page-title-->

							<div class="text">

								<?php the_content(); ?>

								<div class="clear"></div>

							</div>			

						</article>

						<?php comments_template(); ?>

					</div><!--/pad-->

				</div><!--/content-part-->

				

				<div class="sidebar">	

					<?php get_sidebar() ;?>

				</div><!--/sidebar-->

			

			</div><!--/main-->

			

		</div><!--/page-inner-->

	</div><!--/container-->

</div><!--/page-->

<?php endwhile; ?>



<?php get_footer(); ?>