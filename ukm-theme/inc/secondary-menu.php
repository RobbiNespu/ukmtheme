<?php
/**
 * @package WordPress
 * @subpackage UKM_Theme
 * @since UKM Theme 1.0
 *
 * Tetapan menu utama.
 */
?>
<?php wp_nav_menu(array(
	'theme_location' => 'secondary',
	'menu' => 'Secondary Menu',
	'container_id' => 'cssmenu',
	'walker' => new CSS_Menu_Maker_Walker()
	)); 
?>