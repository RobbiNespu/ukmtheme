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
  <section class="col-1-1">
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <h1 class="content-title"><?php single_cat_title(); ?></h1>
        <div class="content-article">
          <div class="col-3-10">
          <?php 
            $saved_data = get_post_meta($post->ID,'ut_publication_cover',true);
            echo '<img src="'.$saved_data['url'].'">';
          ?>
          </div>
          <div class="col-7-10">
            <h2><?php the_title(); ?></h2>
            <table>
              <tr><td><?php _e('Author:','ukmtheme'); ?></td><td><?php echo get_post_meta($post->ID, 'ut_publication_author', true); ?></td></tr>
              <tr><td><?php _e('Publisher:','ukmtheme'); ?></td><td><?php echo get_post_meta($post->ID, 'ut_publication_publisher', true); ?></td></tr>
              <tr><td><?php _e('Year:','ukmtheme'); ?></td><td><?php echo get_post_meta($post->ID, 'ut_publication_year', true); ?></td></tr>
              <tr><td><?php _e('Number of Pages:','ukmtheme'); ?></td><td><?php echo get_post_meta($post->ID, 'ut_publication_pages', true); ?></td></tr>
              <tr><td><?php _e('Reference/Download:','ukmtheme'); ?></td><td><?php echo get_post_meta($post->ID, 'ut_publication_reference', true); ?></td></tr>
            </table>
          </div>
        </div>   
      <?php endwhile; else: ?>
        <p><?php _e( 'Sorry, no post matched your criteria.', 'ukmtheme' ); ?></p>
      <?php endif; ?>
  </section>
</div><!-- content-wrap -->
</article>
<?php get_footer(); ?>