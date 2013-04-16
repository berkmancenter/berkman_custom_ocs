	<?php if ( wpb_breadcrumbs_enabled() ): ?>

	<div id="breadcrumb">

		<div class="container">

			<div id="breadcrumb-inner" class="fix">

				<div class="pad fix">

					<?php echo wpb_breadcrumbs(); ?>

				</div>

			</div>

		</div>

	</div><!--/breacrumb-->

	<?php endif; ?>

	

	<?php if ( wpb_option('footer-widget-ads') ): ?>

	<div class="ads-footer fix">

		<div class="container">

			<div class="grid one-full">

				<ul><?php dynamic_sidebar('widget-ads-footer'); ?></ul>

			</div>

		</div>

	</div><!--/ads-footer-->

	<?php endif; ?>



	<?php if ( wpb_option('footer-widgets') ): ?>

	<div id="subfooter">

		<div class="container">

			<div id="subfooter-inner" class="fix">

				<div class="pad fix">

					<div class="grid one-third">

						<ul><?php dynamic_sidebar('widget-footer-1'); ?></ul>

					</div>

					<div class="grid one-third">

						<ul><?php dynamic_sidebar('widget-footer-2'); ?></ul>

					</div>

					<div class="grid one-third last">

						<ul><?php dynamic_sidebar('widget-footer-3'); ?></ul>

					</div>

				</div>

			</div><!--/subfooter-inner-->

		</div>

	</div><!--/subfooter-->

	<?php endif; ?>	

	

	<div class="clear"></div>

	<footer id="footer">

		<div class="container">

			<div id="footer-inner" class="fix">

				

				<?php wp_nav_menu(array('container'=>'nav','container_id'=>'nav-footer','theme_location'=>'wpb-nav-footer','menu_id'=>'nav-alt','menu_class'=>'pad fix', 'fallback_cb'=>FALSE)); ?>

				

				<div id="footer-bottom">

					<div class="pad fix">

						<div class="grid">

							<?php if ( wpb_option('footer-logo') ): ?>

								<img id="footer-logo" src="<?php echo wpb_option('footer-logo'); ?>" alt="<?php get_bloginfo('name'); ?>">

							<?php endif; ?>

							

							<?php echo wpb_social_media_links(array('id'=>'footer-social')); ?>

						</div>

						<div class="grid">

							<p id="copy"><?php echo wpb_footer_text(); ?></p>

						</div>

					</div>

					<div class="clear"></div>

					<a id="to-top" href="#"><i class="icon-top"></i></a>

				</div>

			</div><!--/footer-inner-->

		</div>

	</footer><!--/footer-->

	

</div><!--/wrap-->

<?php wp_footer(); ?>

<!--[if lt IE 9]><script src="<?php echo get_template_directory_uri(); ?>/js/ie/respond.min.js"></script> <![endif]-->

</body>

</html>