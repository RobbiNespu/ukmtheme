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
  <div class="pure-g pure-g-r content">
    <section class="pure-u-3-4 article">
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <h2 class="content-title"><?php the_title(); ?></h2>
        <div class="content-article">
          <?php the_content(); ?>
        </div>   
      <?php endwhile; else: ?>
        <p><?php _e( 'Sorry, no post matched your criteria.', 'ukmtheme' ); ?></p>
      <?php endif; ?>
    </section>
    <aside class="pure-u-1-4">
    	<?php if (dynamic_sidebar( 'sidebar-2' )) : else : ?><?php endif; ?>
    </aside>
  </div><!-- content-wrap -->
</article>
<?php get_footer(); ?>