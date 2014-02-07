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
    //get_template_part( 'templates/slideshow', 'bxslider' );
  get_template_part( 'templates/slideshow', 'flexslider' );
  ?>
</div>

<?php
  if ( is_home() ) {
    $ut_layout = get_option('ukmtheme_layout');
    get_template_part( 'templates/layout', $ut_layout );
  } else {
    get_template_part( 'templates/layout', 'default' );
  }
?>

<?php get_footer(); ?>