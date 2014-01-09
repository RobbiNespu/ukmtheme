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
 *
 * Template Name: Page: Left Sidebar
 */
get_header(); ?>
<article class="wrap">
  <div class="content clearfix">
    <aside class="col-1-4">
      <?php get_template_part( 'sidebar', 'page' ); ?>
    </aside>
    <section class="col-3-4 article">
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <h1 class="content-title"><?php the_title(); ?></h1>
        <div class="content-article">
          <?php the_content(); ?>
        </div>   
      <?php endwhile; else: ?>
        <h1 class="content-title"><?php _e( 'Not Found', 'ukmtheme' ); ?></h1>
        <p><?php _e( 'Sorry, no page matched your criteria.', 'ukmtheme' ); ?></p>
      <?php endif; ?>
    </section>
  </div><!-- content-wrap -->
</article>
<?php get_footer(); ?>