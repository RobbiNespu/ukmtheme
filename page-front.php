<?
/**
 * Template Name: Frontpage
 *
 * @package WordPress
 * @subpackage UKM_Theme
 * @since UKM Theme 1.0
 */
get_header();
?>
<div class="slider-wrap">
	<div class="container">
		<?php if ( function_exists( "easingsliderlite" ) ) { easingsliderlite(); } ?>
	</div>
</div>
<div class="container article col-1-1">
	<?php the_content(); ?>
</div>
<? get_footer(); ?>