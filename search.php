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
  <div class="pure-g pure-g-r content">
  <div class="pure-u-1 uk-panel uk-panel-box uk-panel-box-primary">
    <?php get_search_form(); ?>
  </div>
  <hr>
    <section class="pure-u-1 uk-panel uk-panel-box uk-panel-box-primary">
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <h3><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h3>
        <div class="content-article">
          <?php the_excerpt(); ?>
        </div>   
      <?php endwhile; else: ?>
        <h2 class="content-title"><?php _e( 'Not Found', 'ukmtheme' ); ?></h2>
        <p><?php _e( 'Sorry, no page matched your criteria.', 'ukmtheme' ); ?></p>
      <?php endif; ?>
    </section>
  </div>
</article>
<?php get_footer(); ?>