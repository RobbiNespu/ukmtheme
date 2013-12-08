<?php
/**
 * @link http://www.ukm.my/template
 *
 * @package WordPress
 * @subpackage ukmtheme
 * @since 4.0
 *
 * @author Jamaludin Rajalu
 */
get_header(); ?>

<div class="clearfix slideshow">
    <?php get_template_part( 'inc/part', 'carouFredSel' ); ?>
</div>
<div class="wrap clearfix">
    <?php get_template_part( 'inc/widget', 'news' ); ?>
</div>
<div class="wrap clearfix">
    <?php get_template_part( 'inc/part', 'threeBox' ); ?>
</div>

<?php get_footer(); ?>