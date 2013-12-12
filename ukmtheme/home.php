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
    <?php get_template_part( 'templates/slideshow', 'carouFredSel' ); ?>
</div>
<div class="wrap clearfix">
    <?php get_template_part( 'templates/widget', 'news' ); ?>
</div>
<div class="wrap clearfix">
    <?php get_template_part( 'templates/widget', 'threeBox' ); ?>
</div>

<?php get_footer(); ?>