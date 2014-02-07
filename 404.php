<?php
/**
 * @link http://www.ukm.my/template
 * @link http://codex.wordpress.org/The_Loop
 *
 * @package WordPress
 * @subpackage ukmtheme
 * @since 4.0
 *
 * @author Jamaludin Rajalu
 */
get_header(); ?>
<article class="wrap">
  <div class="content clearfix">
    <section class="col-1-1 article">
      <h1 class="content-title"><?php _e( 'Not Found', 'ukmtheme' ); ?></h1>
      <p><?php _e( 'Sorry, no page matched your criteria.', 'ukmtheme' ); ?></p>
      <?php get_search_form(); ?>
    </section>
  </div><!-- content-wrap -->
</article>
<?php get_footer(); ?>