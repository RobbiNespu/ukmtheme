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
  $ut_slideshow = get_option('ukmtheme_front_slideshow');

get_header(); ?>

<div class="clearfix slideshow ut_color">
  <?php if ( is_home() ) {
    get_template_part( 'templates/slideshow', $ut_slideshow );
  }
  else {
    get_template_part( 'templates/slideshow', 'rslides' );
  } ?>
</div>
<div class="wrap clearfix">
  <?php get_template_part( 'templates/widget', 'news-scroller' ); ?>
</div>
<div class="wrap clearfix">
  <?php get_template_part( 'templates/widget', 'event' ); ?>
</div>
<div class="wrap clearfix">
  <?php get_template_part( 'templates/widget', 'news' ); ?>
</div>
<div class="wrap clearfix">
  <?php get_template_part( 'templates/widget', 'three-column' ); ?>
</div>
<div class="wrap clearfix">
  <?php get_template_part( 'templates/widget', 'four-column' ); ?>
</div>

<?php get_footer(); ?>