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
 * Widget: Excellent Staff
 */

class ExcellentStaff_Widget extends WP_Widget {

  /**
   * Register widget with WordPress.
   */
  function __construct() {
    parent::__construct(
      'ExcellentStaff_Widget',
      __('#Excellent Staff', 'ukmtheme'),
      array( 'description' => __( 'Excellent Staff Widget', 'ukmtheme' ), )
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
    if ( ! empty( $title ) )
    echo $args['before_title'] . $title . $args['after_title'];
    ?>
      <script type="text/javascript">
      $(window).load(function() {
        $('#excellent').flexslider({
          animation: "slide",
          controlNav: false,
          directionNav: false
        });
      });
      </script>
      <div id="excellent" class="flexslider">
      <ul class="slides">
      <?php
      $excellentStaff = array( 
                          'post_type'       => 'staff',
                          'posts_per_page'  => -1,
                          'position'        => 'excellent',
                        );
      $excellentStaff_loop = new WP_Query( $excellentStaff );
      while ( $excellentStaff_loop->have_posts() ) : $excellentStaff_loop->the_post();
      ?>
        <li>
          <img src="<?php global $post; echo get_post_meta($post->ID,'ut_staff_photo',true); ?>" alt="">
          <p class="flex-caption"><?php global $post; the_title(); ?><br/>
          <?php global $post; echo get_the_term_list( $post->ID, 'position', '', ', ', '' ); ?><br/>
          <?php global $post; echo get_the_term_list( $post->ID, 'department', '', ', ', '' ); ?>
          </p>
        </li>   
      <?php endwhile; ?>
      </ul>
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
    if ( isset( $instance[ 'title' ] ) ) {
      $title = $instance[ 'title' ];
    }
    else {
      $title = __( 'New title', 'ukmtheme' );
    }
    ?>
    <p>
    <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
    </p>
    <p><?php _e( 'Create one position named "excellent" and assign staff to that category.', 'ukmtheme' ); ?></p>
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

    return $instance;
  }

}

add_action( 'widgets_init', 'register_ExcellentStaff_Widget' );

  function register_ExcellentStaff_Widget() {
    register_widget( 'ExcellentStaff_Widget' );
  }


?>