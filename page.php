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
    <section class="col-3-4 article">
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <h2 class="content-title"><?php the_title(); ?></h2>
        <div class="content-article">
          <?php the_content(); ?>
        </div>   
      <?php endwhile; else: ?>
        <h2 class="content-title"><?php _e( 'Not Found', 'ukmtheme' ); ?></h2>
        <p><?php _e( 'Sorry, no page matched your criteria.', 'ukmtheme' ); ?></p>
      <?php endif; ?>
      <?php get_template_part('templates/content','edit' ); ?>
    </section>
    <aside class="col-1-4">
    	<?php get_template_part( 'sidebar', 'page' ); ?>
    </aside>
  </div><!-- content-wrap -->
</article>
<?php get_footer(); ?>