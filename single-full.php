<?php

/*

Post Template: Full-width

*/

?>

<?php get_header(); ?>



<div id="page">

	<div class="container">

		<div id="page-inner">

			

			<?php while ( have_posts() ): the_post(); ?>

			

			<?php get_template_part('_single-header'); ?>

			

			<?php if ( get_post_format() ): ?>

				<div class="content">

					<?php get_template_part('_post-formats-full'); ?>

				</div>

			<?php endif; ?>



			<div class="main fix">



				<div class="content">

					<article id="entry-<?php the_ID(); ?>" <?php post_class('entry fix'); ?>>	

						<div class="pad fix">	

						

							<div class="text">

								<?php the_content(); ?>

								<?php wp_link_pages(array('before'=>'<div class="entry-page-links">'.__('Pages:','newsroom'),'after'=>'</div>')); ?>

								<div class="clear"></div>

							</div>

							

							<?php if ( !wpb_option('post-hide-tags-single') ): // Post Tags ?>

								<?php the_tags('<p class="entry-tags"><span>'.__('Tags:','newsroom').'</span> ','','</p>'); ?>

							<?php endif; ?>



							<?php if ( wpb_option('post-enable-author-block') ): // Post Author Block ?>

								<div class="entry-author-block fix">

									<div class="entry-author-avatar"><?php echo get_avatar(get_the_author_meta('user_email'),'80'); ?></div>

									<p class="entry-author-name">&mdash; <?php the_author_meta('display_name'); ?></p>

									<p class="entry-author-description"><?php the_author_meta('description'); ?></p>

								</div>

							<?php endif; ?>

							

						</div><!--/entry content-->

					</article>

					

					<?php if ( wpb_option('single-postnav') == '1' ): ?>

					<ul class="entry-browse fix">

						<li class="previous"><?php previous_post_link('%link', '<strong>'.__('Previous story', 'newsroom').'</strong> <span>%title</span>'); ?></li>

						<li class="next"><?php next_post_link('%link', '<strong>'.__('Next story', 'newsroom').'</strong> <span>%title</span>'); ?></li>

					</ul>

					<?php endif; ?>



					<?php if ( air_related_posts::get_option('enable') ) { get_template_part('_related-posts'); } ?>



					<?php comments_template(); ?>



				</div><!--/content-part-->

				

			</div><!--/main-->

			<?php endwhile;?>



		</div><!--/page-inner-->

	</div><!--/container-->

</div><!--/page-->



<?php get_footer(); ?>