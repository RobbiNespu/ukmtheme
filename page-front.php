<?php
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
		<?php get_template_part( 'inc/front', 'slideshow' ); ?>
	</div>
</div>
<div class="container cf">
	<?php get_sidebar(); ?>
	<?php if (dynamic_sidebar( 'sidebar-1' )) : else : ?><?php endif; ?>
	<?php get_template_part( 'inc/recent', 'post' ); ?>
</div>
<? get_footer(); ?>