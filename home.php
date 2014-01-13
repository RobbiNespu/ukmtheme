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
 * Tetapan muka hadapan laman
 */
get_header(); ?>

<div class="clearfix slideshow ut_color">
  <?php
    get_template_part( 'templates/slideshow', 'bxslider' );
  ?>
</div>
<div class="wrap clearfix">
  <?php //get_template_part( 'templates/widget', 'news-scroller' ); ?>
</div>
<div class="wrap clearfix">
  <?php //get_template_part( 'templates/widget', 'event' ); ?>
</div>
<div class="wrap clearfix">
  <?php get_template_part( 'templates/widget', 'news' ); ?>
</div>
<div class="wrap clearfix">
  <?php //get_template_part( 'templates/widget', 'three-column' ); ?>
</div>
<div class="wrap clearfix">
  <?php //get_template_part( 'templates/widget', 'four-column' ); ?>
</div>

<?php get_footer(); ?>