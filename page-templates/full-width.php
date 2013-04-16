<?php

/*

Template Name: Full-width

*/

?>

<?php get_header(); ?>



<?php while ( have_posts() ): the_post(); ?>

<div id="page">

	<div class="container">

		<div id="page-inner" class="fix">

		

			<div class="main fix">

		

				<div class="content">

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

				</div><!--/content-->

				

			</div><!--/main-->

		

		</div><!--/page-inner-->

	</div><!--/container-->

</div><!--/page-->

<?php endwhile;?>



<?php get_footer(); ?>