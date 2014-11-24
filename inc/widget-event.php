<?php
/**
 * @link http://www.ukm.my/template
 * @link http://codex.wordpress.org/Widgets_API
 *
 * @package WordPress
 * @subpackage ukmtheme
 * @since 4.0
 *
 * @author Jamaludin Rajalu
 *
 * Widget: Events
 */

class Event_Widget extends WP_Widget {

  function __construct() {
    parent::__construct(
      'event_widget',
      __('&bull; Upcoming Events', 'ukmtheme'),
      array( 'description' => __( 'Event list or upcoming events', 'ukmtheme' ), )
    );
  }

  public function widget( $args, $instance ) {
    $title = apply_filters( 'widget_title', $instance['title'] );

    echo $args['before_widget'];
    if ( ! empty( $title ) ) {
      echo $args['before_title'] . $title . $args['after_title'];
    }

    if ( ! isset( $instance['total'] ) ) {
      $total = $instance['total'];
    }

      /**
       * Events Widget Output
       * @link http://codex.wordpress.org/Widgets_API
       */
        $ut_event = array(
          'post_type'       => 'event',
          'posts_per_page'  => $instance['total'],
          'orderby'         => 'menu_order',
          'order'           => 'DESC'
        );
        $loop = new WP_Query( $ut_event );
      ?>

      <div class="event-widgets-wrap">
        <div class="ut-event-list-vertical">
          <div class="col-1-1">
          <ul class="ut-event-list-widget-wrap">
          <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
            <li class="ut-event-list-widget">
              <a href="<?php echo get_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
              <ul class="ut-event-list">
                <li class="ut-event-list-content ut-event-date"><?php global $post; echo get_post_meta($post->ID, 'ut_event_date', true); ?></li>
                <li class="ut-event-list-content ut-event-time"><?php global $post; echo get_post_meta($post->ID, 'ut_event_time_start', true); ?>&nbsp;-&nbsp;<?php echo get_post_meta($post->ID, 'ut_event_time_end', true); ?></li>
                <li class="ut-event-list-content ut-event-venue"><?php global $post; echo get_post_meta($post->ID, 'ut_event_venue', true); ?></li>
              </ul>
            </li>
          <?php endwhile; ?>
          </ul>
          <a href="<?php echo get_post_type_archive_link( 'event' ); ?>"><button class="uk-button uk-button-mini uk-button-primary"><?php _e('More Event','ukmtheme'); ?></button></a>
          </div>
        </div>
      </div>

    <?php

    echo $args['after_widget'];
  }

  public function form( $instance ) {
    if ( isset( $instance['title'] ) ) {
      $title = $instance['title'];
    }
    else {
      $title = __( 'Upcoming Events', 'ukmtheme' );
    }

    if ( isset( $instance['total'] ) ) {
      $total = $instance['total'];
    }
    else {
      $total = '4';
    }

    ?>
    <p>
    <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
    </p>
    <p>
    <label for="<?php echo $this->get_field_id( 'total' ); ?>"><?php _e( 'Number of events to show:','ukmtheme' ); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id( 'total' ); ?>" name="<?php echo $this->get_field_name( 'total' ); ?>" type="text" value="<?php echo esc_attr( $total ); ?>" />
    </p>
    
    <?php

  }

  public function update( $new_instance, $old_instance ) {
    $instance = array();
    $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
    $instance['total'] = ( ! empty( $new_instance['total'] ) ) ? strip_tags( $new_instance['total'] ) : '';

    return $instance;
  }

}

add_action( 'widgets_init', 'register_Event_Widget' );
  function register_event_widget() {
    register_widget( 'Event_Widget' );
  }
?>