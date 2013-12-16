<?php
/**
 * @link http://www.ukm.my/template
 *
 * @package WordPress
 * @subpackage ukmtheme
 * @since 4.0
 *
 * @author Jamaludin Rajalu
 *
 * Front Page
 */
get_header(); ?>

<div class="clearfix slideshow">
    <?php //get_template_part( 'templates/slideshow', 'carouFredSel' ); ?>
    <?php //get_template_part( 'templates/slideshow', 'bxslider' ); ?>
    <?php get_template_part( 'templates/slideshow', 'nivoSlider' ); ?>
</div>
<div class="wrap clearfix">
    <?php get_template_part( 'templates/widget', 'announcement' ); ?>
</div>
<div class="wrap clearfix">
    <div class="col-1-1">
    <?php if (dynamic_sidebar( 'sidebar-4' )) : else : ?><?php endif; ?>
    </div>
</div>

<?php get_footer(); ?>