<?php global $data; ?>
<div id="top-menus">
	<?php 
	if(has_nav_menu('top-nav')) {
		wp_nav_menu( array( 'theme_location' => 'top-nav', 'container' => '' ) ); 
	}
	else{
		echo '<ul><li><a href="#">No menu assigned!</a></li></ul>';
	}
	?>
</div>    
