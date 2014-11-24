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
 * Widget: Youtube Video
 */

class Youtube_Widget extends WP_Widget {

  /**
   * Register widget with WordPress.
   */
  function __construct() {
    parent::__construct(
      'youtube_widget', // Base ID
      __('&bull; Youtube Video', 'ukmtheme'), // Name
      array( 'description' => __( 'Youtube video for sidebar', 'ukmtheme' ), ) // Args
    );
  }

  /**
   * Front-end display of widget.
   *
   * @see WP_Widget::widget()
   *
   * @param array $args     Widget arguments.
   * @param array $instance Saved values from database.
   */
  public function widget( $args, $instance ) {

    $title = apply_filters( 'widget_title', $instance['title'] );

    echo $args['before_widget'];
    if ( ! empty( $title ) ) {
      echo $args['before_title'] . $title . $args['after_title'];
    }

    if ( isset( $instance[ 'videoid' ] ) ) {
      $videoid = $instance['videoid'];
    }

    ?>
    <div id="youtubeWidget" style="margin-top:10px;margin-bottom-10px;">
      <iframe src="//www.youtube.com/embed/<?php echo $instance['videoid']; ?>?rel=0" frameborder="0" allowfullscreen></iframe>
    </div>

    <?php

    echo $args['after_widget'];

    }

  /**
   * Back-end widget form.
   *
   * @see WP_Widget::form()
   *
   * @param array $instance Previously saved values from database.
   */
  public function form( $instance ) {
    if ( isset( $instance['title'] ) ) {
      $title = $instance['title'];
    }
    else {
      $title = __( 'Youtube Video', 'ukmtheme' );
    }

    if ( isset( $instance['videoid'] ) ) {
      $videoid = $instance['videoid'];
    }
    else {
      $videoid = 'fHDHJE15NKk';
    }
    ?>
    <p>
    <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
    </p>
    <p>
    <label for="<?php echo $this->get_field_id( 'videoid' ); ?>"><?php _e( 'Youtube video id:' ); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id( 'videoid' ); ?>" name="<?php echo $this->get_field_name( 'videoid' ); ?>" type="text" value="<?php echo esc_attr( $videoid ); ?>">
    </p>
    <?php 
  }

  /**
   * Sanitize widget form values as they are saved.
   *
   * @see WP_Widget::update()
   *
   * @param array $new_instance Values just sent to be saved.
   * @param array $old_instance Previously saved values from database.
   *
   * @return array Updated safe values to be saved.
   */
  public function update( $new_instance, $old_instance ) {
    $instance = array();
    $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
    $instance['videoid'] = ( ! empty( $new_instance['videoid'] ) ) ? strip_tags( $new_instance['videoid'] ) : '';
    return $instance;
  }

} // class youtube_widget

// register youtube_widget widget
function register_youtube_widget() {
    register_widget( 'youtube_widget' );
}
add_action( 'widgets_init', 'register_youtube_widget' );
?>