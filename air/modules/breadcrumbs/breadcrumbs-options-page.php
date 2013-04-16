<form method="post" action="options.php">

	

	<div id="air-main-inner" class="air-text">

	

		<?php settings_fields('air-breadcrumbs-settings'); ?>

		<?php do_settings_sections('air-breadcrumbs'); ?>

		<input type="hidden" name="air-breadcrumbs[module]" value="breadcrumbs">

	

		<div class="air-clear"></div>

	</div><!--/air-main-inner-->



	<div id="air-footer">

		<p class="submit air-submit">

			<input type="submit" class="button-primary" value="Save Changes" />

		</p>

	</div><!--/air-footer-->



</form>