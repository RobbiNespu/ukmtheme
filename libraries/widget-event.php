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

class Event_Widget extends WP_Widget {

  function __construct() {
    parent::__construct(
      'foo_widget', // Base ID
      __('Upcoming Events', 'ukmtheme'),
      array( 'description' => __( 'Upcoming Event Lists', 'ukmtheme' ), )
    );
  }

  public function widget( $args, $instance ) {
    $title = apply_filters( 'widget_title', $instance['title'] );

    echo $args['before_widget'];
    if ( ! empty( $title ) )
      echo $args['before_title'] . $title . $args['after_title'];

    if ( ! isset( $instance['total'] ) )
      $instance['total'] = '4';

    if ( ! $total = absint( $instance['total'] ) )
      $total= 4;
    ?>
      <?php
      /**
       * Events Widget Output
       * @link http://codex.wordpress.org/Widgets_API
       */
        $args = array( 'post_type' => 'event', 'posts_per_page' => $total, );
        $loop = new WP_Query( $args );
      ?>

      <div class="widgets-wrap">
        <div class="ut-event-list-vertical">
          <div class="col-1-1">
          <ul class="ut-event-list-widget-wrap">
          <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
            <li class="ut-event-list-widget">
              <h4><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h4>
              <ul class="ut-event-list">
                <li class="ut-event-list-content ut-event-date"><?php global $post; echo get_post_meta($post->ID, 'ut_event_date', true); ?></li>
                <li class="ut-event-list-content ut-event-time"><?php global $post; echo get_post_meta($post->ID, 'ut_event_start_time', true); ?>&nbsp;-&nbsp;<?php echo get_post_meta($post->ID, 'ut_event_end_time', true); ?></li>
                <li class="ut-event-list-content ut-event-venue"><?php global $post; echo get_post_meta($post->ID, 'ut_event_venue', true); ?></li>
              </ul>
            </li>
          <?php endwhile; ?>
          </ul>
          <a href="<?php echo get_post_type_archive_link( 'event' ); ?>"><button class="uk-button uk-button-mini uk-button-primary">More Event</button></a>
          </div>
        </div>
      </div>

    <?php
    echo $args['after_widget'];
  }

  public function form( $instance ) {
    if ( isset( $instance[ 'title'] ) ) {
      $title = $instance[ 'title' ];
    }
    else {
      $title = __( 'New title', 'ukmtheme' );
    }

    if ( isset( $instance[ 'total'] ) ) {
      $total = $instance[ 'total' ];
    }
    else {
      $total = 4;
    }
    
    ?>
    <p>
    <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
    <label for="<?php echo $this->get_field_id( 'total' ); ?>"><?php _e( 'Number Event to Show:' ); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id( 'total' ); ?>" name="<?php echo $this->get_field_name( 'total' ); ?>" type="text" value="<?php echo esc_attr( $total ); ?>" />
    </p>
    <?php 
  }

  public function update( $new_instance, $old_instance ) {
    $instance = array();
    $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

    return $instance;
  }

}

function register_event_widget() {
    register_widget( 'Event_Widget' );
}
add_action( 'widgets_init', 'register_event_widget' );