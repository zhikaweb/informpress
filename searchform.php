<form name="searchform" onsubmit="return checkForm(this)" action="<?php echo home_url( '/' ); ?>" method="get" id="searchform">
		<input type="text" value="<?php echo get_search_query(); ?>" name="s" id="search" placeholder="<?php echo __('Поиск по сайту', 'informpress'); ?>" autocomplete="off" required> 
		<button type="submit" name="submit" value="search" id="srcbtn"><?php echo __('', 'informpress'); ?></button>
</form>