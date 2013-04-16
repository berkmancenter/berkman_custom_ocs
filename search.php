<?php get_header(); ?>



<div id="page">

	<div class="container">

		<div id="page-inner">

		

			<div class="main fix <?php echo wpb_option('general-sidebar','sidebar-right'); ?>">

				

				<div class="content-part">

					<div id="page-title" class="pad">

						<h2><?php $search_count = 0; $search = new WP_Query("s=$s & showposts=-1"); if($search->have_posts()) : while($search->have_posts()) : $search->the_post(); $search_count++; endwhile; endif; echo $search_count;?> <?php _e('Search results for','newsroom'); ?> <span>"<?php echo get_search_query(); ?>"</span></h2>

					</div><!--/page-title-->

	

					<?php if ( !have_posts() ): ?>

					<article class="entry">

						<div class="pad">

							<div class="text">

								<h1><?php _e('No search results','newsroom'); ?></h1>

								<p><?php _e('The good news is you can try again.','newsroom'); ?></p>

								<form role="search" method="get" action="<?php echo home_url('/'); ?>">

									<div class="fix">

										<input type="text" value="" name="s" id="s" />

										<input type="submit" id="searchsubmit" value="<?php _e('Search','newsroom'); ?>" />

									</div>

								</form>

								<div class="clear"></div>

							</div>

						</div>

					</article>

					<?php endif; ?>

					

					<?php get_template_part('_loop'); ?>

				</div><!--/content-part-->

	

				<div class="sidebar">	

					<?php get_sidebar(); ?>

				</div><!--/sidebar-->

			

			</div><!--/main-->

			

		</div><!--/page-inner-->

	</div><!--/container-->

</div><!--/page-->



<?php get_footer(); ?>