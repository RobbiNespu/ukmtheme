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
    <section class="pure-u-3-4 article">
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <h2 class="content-title"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h2>
        <div class="content-article">
          <?php the_excerpt(); ?>
        </div>   
      <?php endwhile; else: ?>
        <h2 class="content-title"><?php _e( 'Not Found', 'ukmtheme' ); ?></h2>
        <p><?php _e( 'Sorry, no page matched your criteria.', 'ukmtheme' ); ?></p>
      <?php endif; ?>
      <?php get_search_form(); ?>
    </section>
    <aside class="pure-u-1-4">
      <?php if (dynamic_sidebar( 'sidebar-2' )) : else : ?><?php endif; ?>
    </aside>
  </div><!-- content-wrap -->
</article>
<?php get_footer(); ?>