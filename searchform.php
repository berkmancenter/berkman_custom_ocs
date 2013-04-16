<form method="get" id="searchform" action="<?php echo home_url('/'); ?>">

	<div>

		<input type="text" id="s" name="s" onblur="if(this.value=='')this.value='<?php _e('Enter your search...','newsroom'); ?>';" onfocus="if(this.value=='<?php _e('Enter your search...','newsroom'); ?>')this.value='';" value="<?php _e('Enter your search...','newsroom'); ?>" />

	</div>

</form>