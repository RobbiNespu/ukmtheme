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
  <div class="pure-g content clearfix">
    <section class="pure-u-1 article">
      <h2 class="content-title"><?php _e( 'Not Found', 'ukmtheme' ); ?></h2>
      <p><?php _e( 'Sorry, no page matched your criteria.', 'ukmtheme' ); ?></p>
      <?php get_search_form(); ?>
    </section>
  </div><!-- content-wrap -->
</article>
<?php get_footer(); ?>