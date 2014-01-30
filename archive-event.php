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
<h1><?php echo __( 'Events List', 'ukmtheme' ); ?></h1>
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <div class="content-article ut-event-page-archive clearfix">
      <div class="col-1-4">
        <ul class="ut-event-list">
          <li class="ut-event-list-content ut-event-date"><?php echo get_post_meta($post->ID, 'ut_event_date', true); ?></li>
          <li class="ut-event-list-content ut-event-time"><?php echo get_post_meta($post->ID, 'ut_event_start_time', true); ?>&nbsp;-&nbsp;<?php echo get_post_meta($post->ID, 'ut_event_end_time', true); ?></li>
          <li class="ut-event-list-content ut-event-venue"><?php echo get_post_meta($post->ID, 'ut_event_venue', true); ?></li>
        </ul>
      </div>
      <div class="col-3-4">
        <h3 class="content-title"><?php the_title(); ?></h3>
        <p><?php echo get_post_meta($post->ID, 'ut_event_summary', true); ?></p>
        <a href="<?php echo get_permalink(); ?>"><button class="uk-button uk-button-mini uk-button-primary"><?php _e('Read More','ukmtheme'); ?></button></a>
      </div>
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