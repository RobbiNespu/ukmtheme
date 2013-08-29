<?php
/**
 * @package WordPress
 * @subpackage UKM_Theme
 * @since UKM Theme 1.0
 *
 * Tetapan menu atas dan tambahan pautan sosial (Fecebook, Twitter dan RSS).
 */
?>
<div class="col-1-2 primary-navigation-in">
<?php wp_nav_menu( array( 
	// Menu bahagian kiri. Cth: UKM, E-Warga, Peta Laman dsb.
	'theme_location' => 'primary',
	'menu' => 'Primary Menu',
	'container' => 'div',
	'container_class' => 'primary',
	) ); 
?>
</div>
<div class="col-1-2 primary-navigation-in">
	<div class="float-right">
	<div class="qtrans_wrap">
		<?php echo qtrans_generateLanguageSelectCode('image'); ?>
		<ul class="text-resizer">
			<li><a class="fontSizePlus" href="#"><icon class="icon-plus-sign"></i></a></li>
			<li><a class="fontReset" href="#"><icon class="icon-font"></i></a></li>
			<li><a class="fontSizeMinus" href="#"><icon class="icon-minus-sign"></i></a></li>
		</ul>
		<ul class="style-switcher">
			<li><a class="style-primary" href="javascript:chooseStyle('none', 60)" checked="checked"><icon class="icon-stop"></i></a></li>
			<li><a class="style-secondary" href="javascript:chooseStyle('secondary', 60)"><icon class="icon-stop"></i></a></li>
			<li><a class="style-tertiary" href="javascript:chooseStyle('tertiary', 60)"><icon class="icon-stop"></i></a></li>
		</ul>
	</div>
	<?php wp_nav_menu( array( 
		// Menu pautan sosial.
		'theme_location' => 'social',
		'menu' => 'Social Menu',
		'container' => 'div',
		'container_class' => 'social-icon-link',
		) ); 
	?>
	<?php get_search_form(); ?>
	</div>
</div>
