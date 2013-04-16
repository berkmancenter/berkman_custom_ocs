<header class="content">

	<div class="pad fix">

		<?php if ( !wpb_option('post-hide-comments-single') ): ?>

			<p class="entry-comments">

				<a href="<?php comments_link(); ?>">

					<span><?php comments_number( '0', '1', '%' ); ?><i class="pike"></i></span>

				</a>

			</p>

		<?php endif; ?>

		

		<?php if ( !wpb_option('post-hide-categories-single') ): ?>

			<p class="entry-category"><?php the_category(' &middot; '); ?></p>

		<?php endif; ?>

		

		<div class="clear"></div>

		<h1 class="entry-title"><?php the_title(); ?></h1>

		<ul class="entry-meta fix">

			<?php if ( !wpb_option('post-hide-author-single') ): ?>

				<li class="entry-author"><?php _e('by','newsroom'); ?> <?php the_author_posts_link(); ?></li>

			<?php endif; ?>

			

			<?php if ( !wpb_option('post-hide-date-single') ): ?>

				<li class="entry-date">

					<?php the_time('F j, Y'); ?>

					<?php if ( !wpb_option('post-hide-detailed-date') ): ?>

						<?php _e('at','newsroom'); ?> <?php the_time('g:i a'); ?>

					<?php endif; ?>

				</li>

			<?php endif; ?>

		</ul>

	</div><!--/pad-->

</header>