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
    <section class="col-3-4">
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <h1 class="content-title"><?php the_title(); ?></h1>
        <div class="content-article">
          <?php the_content(); ?>
        </div>   
      <?php endwhile; else: ?>
          <p><?php _e( 'Sorry, no post matched your criteria.', 'ukmtheme' ); ?></p>
      <?php endif; ?>
    </section>
    <aside class="col-1-4">
    	<?php get_template_part( 'sidebar', 'single' ); ?>
    </aside>
  </div><!-- content-wrap -->
</article>
<?php get_footer(); ?>