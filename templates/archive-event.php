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
get_header();

  $event = new WP_Query( array( 
    'post_type'       => 'event',
    'posts_per_page'  => 10,
    'orderby'         => 'menu_order',
    'order'           => 'DESC',
  ));

?>
<article class="wrap">
<div class="content clearfix">
<section class="col-3-4 article">
<h2><?php echo __( 'Events List', 'ukmtheme' ); ?></h2>
  <?php if ( $event->have_posts() ) : while ( $event->have_posts() ) : $event->the_post(); ?>
    <div class="content-article ut-event-page-archive clearfix">
      <div class="col-1-4">
        <ul class="ut-event-list">
          <li class="ut-event-list-content ut-event-date"><?php echo get_post_meta($post->ID, 'ut_event_date', true); ?></li>
          <li class="ut-event-list-content ut-event-time"><?php echo get_post_meta($post->ID, 'ut_event_time_start', true); ?>&nbsp;-&nbsp;<?php echo get_post_meta($post->ID, 'ut_event_time_end', true); ?></li>
          <li class="ut-event-list-content ut-event-venue"><?php echo get_post_meta($post->ID, 'ut_event_venue', true); ?></li>
        </ul>
      </div>
      <div class="col-3-4">
        <a href="<?php echo get_permalink(); ?>"><h3 class="content-title"><?php the_title(); ?></h3></a>
        <p><?php echo get_post_meta($post->ID, 'ut_event_summary', true); ?></p>
      </div>
    </div>   
    <?php endwhile; else: ?>
      <p><?php _e( 'Sorry, no post matched your criteria.', 'ukmtheme' ); ?></p>
  <?php endif; ?>
  <p><?php get_template_part( 'templates/content', 'paginate' ); ?></p>
</section>
<aside class="col-1-4">
  <?php if (dynamic_sidebar( 'sidebar-2' )) : else : ?><?php endif; ?>
</aside>
</div><!-- content-wrap -->
</article>
<?php get_footer(); ?>