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

<div class="wrap">
    <div class="uk-panel uk-panel-box widgets-wrap">
        <div class="col-1-8">
        <h4>Upcoming</h4><h2>Events</h2>
            <a href="<?php echo get_post_type_archive_link( 'event' ); ?>"><button class="uk-button uk-button-mini uk-button-primary">More Event</button></a>
        </div>
        <div class="col-7-8">
        <ul class="col-1-1 ut-event-list-wrap">
        <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
            <li class="col-1-4">
                <h4><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h4>
                <ul class="ut-event-list">
                    <li class="ut-event-list-content ut-event-date"><?php echo get_post_meta($post->ID, 'ut_event_date', true); ?></li>
                    <li class="ut-event-list-content ut-event-time"><?php echo get_post_meta($post->ID, 'ut_event_start_time', true); ?>&nbsp;-&nbsp;<?php echo get_post_meta($post->ID, 'ut_event_end_time', true); ?></li>
                    <li class="ut-event-list-content ut-event-venue"><?php echo get_post_meta($post->ID, 'ut_event_venue', true); ?></li>
                </ul>
            </li>
        <?php endwhile; ?>
        </ul>
        </div><!--col-9-10-->
    </div><!--2-->
</div>
