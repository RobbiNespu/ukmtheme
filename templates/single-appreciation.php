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
      <div class="content-article">
      <p><?php echo get_post_meta($post->ID, 'ut_appreciation_date', true); ?></p>
        <blockquote>
          <?php echo get_post_meta($post->ID, 'ut_appreciation_greeting', true); ?>
        </blockquote>
        <p><?php _e('By:&nbsp;','ukmtheme'); ?><?php echo get_post_meta($post->ID, 'ut_appreciation_by', true); ?>,&nbsp;<?php echo get_post_meta($post->ID, 'ut_appreciation_ptj', true); ?></p>
      </div>   
    <?php endwhile; else: ?>
      <p><?php _e( 'Sorry, no post matched your criteria.', 'ukmtheme' ); ?></p>
    <?php endif; ?>
    <?php get_template_part('templates/content','edit' ); ?>
  </section>
  <aside class="pure-u-1-4">
    <?php if (dynamic_sidebar( 'sidebar-2' )) : else : ?><?php endif; ?>
  </aside>
</div><!-- content-wrap -->
</article>
<?php get_footer(); ?>