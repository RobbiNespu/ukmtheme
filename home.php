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
<div class="home-content-wrap">
  <div class="wrap home-content">
  <?php
    if ( is_home() ) {
      $ut_layout = get_option('ukmtheme_layout');
      get_template_part( 'templates/layout', $ut_layout );
    } else {
      get_template_part( 'templates/layout', 'default' );
    }
  ?>
  </div>
</div>
<?php get_footer(); ?>