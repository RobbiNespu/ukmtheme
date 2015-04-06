<?php
/**
 *
 * @link http://www.ukm.my/template
 * @package ukmtheme
 * @version 6.x.x
 * @author Jamaludin Rajalu
 *
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