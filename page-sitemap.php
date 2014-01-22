<?php
/**
 *
 * @link http://www.ukm.my/template
 * @link http://codex.wordpress.org/The_Loop
 *
 * @package WordPress
 * @subpackage ukmtheme
 * @since 4.0
 *
 * @author Jamaludin Rajalu
 *
 * Template Name: Page: Sitemap
 */
get_header(); ?>
<article class="wrap">
<div class="content clearfix">
	<section class="col-3-4">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <h1 class="content-title"><?php the_title(); ?></h1>
        <div class="content">
          <?php echo do_shortcode('[ukmtheme-sitemap]'); ?>
        </div>   
      <?php endwhile; else: ?>
        <p><?php _e( 'Sorry, no page matched your criteria.', 'ukmtheme' ); ?></p>
    <?php endif; ?>
  </section>
  <aside class="col-1-4">
    <?php get_template_part( 'sidebar', 'page' ); ?>
  </aside>
</div>
</article>
<?php get_footer(); ?>