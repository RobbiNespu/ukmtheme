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
<div class="container">
	<?php if (dynamic_sidebar( 'sidebar-2' )) : else : ?><?php endif; ?>
	<?php get_template_part( 'inc/recent', 'post' ); ?>
</div>
<? get_footer(); ?>