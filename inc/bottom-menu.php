<?php
/**
 * @package WordPress
 * @subpackage UKM_Theme
 * @since UKM Theme 1.0
 *
 * Tetapan menu bawah.
 */
?>
<div class="bottom-menu cf">
	<?php wp_nav_menu( array( 
	'theme_location' => 'bottom',
	'menu' => 'Bottom Menu',
	'container' => 'div',
	'container_class' => 'col-1-2 bottom-menu',
	) ); 
	?>
</div>