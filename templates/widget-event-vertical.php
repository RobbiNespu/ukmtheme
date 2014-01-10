<?php
/**
 * @link http://www.ukm.my/template
 *
 * @package WordPress
 * @subpackage ukmtheme
 * @since 4.0
 *
 * @author Jamaludin Rajalu
 */
  $args = array( 'post_type' => 'event', 'posts_per_page' => 4 );
  $loop = new WP_Query( $args );
?>

<div class="widgets-wrap">
  <div class="ut-event-list-vertical">
    <h3><?php _e('Upcoming Event', 'ukmtheme') ?></h3>
    <div class="col-1-1">
    <ul class="ut-event-list-wrap">
    <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
      <li>
        <h4><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h4>
        <ul class="ut-event-list">
          <li class="ut-event-list-content ut-event-date"><?php echo get_post_meta($post->ID, 'ut_event_date', true); ?></li>
          <li class="ut-event-list-content ut-event-time"><?php echo get_post_meta($post->ID, 'ut_event_start_time', true); ?>&nbsp;-&nbsp;<?php echo get_post_meta($post->ID, 'ut_event_end_time', true); ?></li>
          <li class="ut-event-list-content ut-event-venue"><?php echo get_post_meta($post->ID, 'ut_event_venue', true); ?></li>
        </ul>
      </li>
    <?php endwhile; ?>
    </ul>
    <a href="<?php echo get_post_type_archive_link( 'event' ); ?>"><button class="uk-button uk-button-mini uk-button-primary">More Event</button></a>
    </div>
  </div>
</div>
