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
      <h1 class="content-title"><?php the_title(); ?></h1>
      <div class="content-article">
        <p><?php _e( 'Date:&nbsp;'); ?><?php echo get_post_meta($post->ID, 'ut_gallery_date', true); ?>&nbsp;|&nbsp;
        <?php _e( 'Photo by:&nbsp;'); ?><?php echo get_post_meta($post->ID, 'ut_gallery_photographer', true); ?>&nbsp;|&nbsp;
        <a href="<?php echo get_post_type_archive_link( 'gallery' ); ?>"><?php _e('Back to Main'); ?></a></p>
        <?php the_content(); ?>
      </div>   
    <?php endwhile; else: ?>
      <p><?php _e( 'Sorry, no post matched your criteria.', 'ukmtheme' ); ?></p>
    <?php endif; ?>
    <?php get_template_part('templates/content','edit' ); ?>
  </section>
  <aside class="col-1-4">
    <?php get_sidebar(); ?>
  </aside>
</div><!-- content-wrap -->
</article>
<?php get_footer(); ?>