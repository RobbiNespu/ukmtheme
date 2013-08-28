<?php
/**
 * @package WordPress
 * @subpackage UKM_Theme
 * @since UKM Theme 1.0
 *
 * Tetapan menu atas dan tambahan pautan sosial (Fecebook, Twitter dan RSS).
 */
?>
<div class="col-1-2">
<?php wp_nav_menu( array( 
	// Menu bahagian kiri. Cth: UKM, E-Warga, Peta Laman dsb.
	'theme_location' => 'primary',
	'menu' => 'Primary Menu',
	'container' => 'div',
	'container_class' => 'primary',
	) ); 
?>
</div>
<div class="col-1-2">
<div class="qtrans_wrap">
	<?php echo qtrans_generateLanguageSelectCode('image'); ?>
</div>
<?php wp_nav_menu( array( 
	// Menu pautan sosial.
	'theme_location' => 'social',
	'menu' => 'Social Menu',
	'container' => 'div',
	'container_class' => 'social-icon-link',
	) ); 
?>
</div>
