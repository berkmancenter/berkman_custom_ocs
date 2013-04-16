<?php

/*

Template Name: Sitemap

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

							<div class="sitemap fix">

								<div class="grid one-third">

									<h4 class="heading"><?php _e('Pages','newsroom'); ?></h4>

									<ul><?php wp_list_pages("title_li=" ); ?></ul>								

								</div>

								<div class="grid one-third">

									<h4 class="heading"><?php _e('All Articles:','newsroom'); ?></h4>

									<ul><?php $archive_query = new WP_Query('posts_per_page=1000'); while ( $archive_query->have_posts() ) : $archive_query->the_post(); ?>

										<li>

											<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a>

											(<?php comments_number('0', '1', '%'); ?>)

										</li>

										<?php endwhile; ?>

									</ul>

								</div>

								<div class="grid one-third last">

									<h4 class="heading"><?php _e('Feeds','newsroom'); ?></h4>

									<ul>

										<li><a title="Full content" href="feed:<?php bloginfo('rss2_url'); ?>"><?php _e('Main RSS','newsroom'); ?></a></li>

										<li><a title="Comment Feed" href="feed:<?php bloginfo('comments_rss2_url'); ?>"><?php _e('Comment Feed','newsroom'); ?></a></li>

									</ul>

									<h4 class="heading"><?php _e('Categories','newsroom'); ?></h4>

									<ul><?php wp_list_categories('sort_column=name&optioncount=1&hierarchical=0&feed=RSS&title_li='); ?></ul>

									<h4 class="heading"><?php _e('Archives','newsroom'); ?></h4>

									<ul><?php wp_get_archives('type=monthly&show_post_count=true'); ?></ul>

								</div>

							</div><!--/sitemap-->

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

