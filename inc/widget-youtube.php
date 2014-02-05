<?php
/**
 * @link http://www.ukm.my/template
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
      __('Youtube Video', 'ukmtheme'), // Name
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

    if ( ! empty( $title ) )
      echo $args['before_title'] . $title . $args['after_title'];

    $youtubeVidID = $instance[ 'youtubeVidID' ];
    ?>
    <script>
      $(document).ready(function(){
        // Target your .container, .wrapper, .post, etc.
        $("#youtubeWidget").fitVids();
      });
    </script>
    <div id="youtubeWidget" style="margin-top:10px;margin-bottom-10px;">
      <iframe width="266" height="auto" src="//www.youtube.com/embed/<?php echo $youtubeVidID ?>?rel=0" frameborder="0" allowfullscreen></iframe>
    </div>
    <?php
  }

  /**
   * Back-end widget form.
   *
   * @see WP_Widget::form()
   *
   * @param array $instance Previously saved values from database.
   */
  public function form( $instance ) {
    if ( isset( $instance[ 'title' ] ) ) {
      $title = $instance[ 'title' ];
    }
    else {
      $title = __( 'New title', 'ukmtheme' );
    }

    if ( isset( $instance[ 'youtubeVidID' ] ) ) {
      $youtubeVidID = $instance[ 'youtubeVidID' ];
    }
    else {
      $youtubeVidID = 'd8KTJ-VRBf0';
    }
    ?>
    <p>
    <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
    </p>
    <p>
    <label for="<?php echo $this->get_field_id( 'youtubeVidID' ); ?>"><?php _e( 'Youtube Video ID:' ); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id( 'youtubeVidID' ); ?>" name="<?php echo $this->get_field_name( 'youtubeVidID' ); ?>" type="text" value="<?php echo esc_attr( $youtubeVidID ); ?>">
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
    $instance['youtubeVidID'] = ( ! empty( $new_instance['youtubeVidID'] ) ) ? strip_tags( $new_instance['youtubeVidID'] ) : '';
    return $instance;
  }

} // class youtube_widget

// register youtube_widget widget
function register_youtube_widget() {
    register_widget( 'youtube_widget' );
}
add_action( 'widgets_init', 'register_youtube_widget' );
?>