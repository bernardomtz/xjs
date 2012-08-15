<form id="searchform" method="get" action="<?php bloginfo('url'); ?>">
	<div>
		<!--input name="s" type="text" id="s" maxlength="99" value="" /-->
		<input value="<?php _e('Need to find something?', 'framework'); ?>" onfocus="if(this.value=='Need to find something?'){this.value='';}" onblur="if(this.value==''){this.value='Need to find something?';}" name="s" type="text" id="s" maxlength="99" />
		<!--input type="submit" id="search" value="Search" /-->
	</div>
</form>