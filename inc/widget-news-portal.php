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
 * Widget: Latest News
 */

class News_Portal_Widget extends WP_Widget {

  function __construct() {
    parent::__construct(
      'news_portal_widget', // Base ID
      __('#News Portal', 'ukmtheme'),
      array( 'description' => __( 'Latest news widget for page sidebar', 'ukmtheme' ), )
    );
  }

  public function widget( $args, $instance ) {
    $title = apply_filters( 'widget_title', $instance['title'] );

    echo $args['before_widget'];
    if ( ! empty( $title ) )
      echo $args['before_title'] . $title . $args['after_title'];

    if ( ! isset( $instance['totalNews'] ) )
      $instance['totalNews'] = '4';

    if ( ! $totalNews = absint( $instance['totalNews'] ) )
      $totalNews= 4;
    ?>
      <?php
      /**
       * Events Widget Output
       * @link http://codex.wordpress.org/Widgets_API
       */
        $ut_news = array( 'post_type' => 'news_portal', 'posts_per_page' => $totalNews, );
        $loop = new WP_Query( $ut_news );
      ?>
        <ul>
        <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
          <li><a href="<?php global $post; echo get_post_meta($post->ID, 'ut_news_portal_url', true); ?>"><?php the_title(); ?></a></li>
        <?php endwhile ?>
        </ul>
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

    if ( isset( $instance[ 'totalNews'] ) ) {
      $totalNews = $instance[ 'totalNews' ];
    }
    else {
      $totalNews = 4;
    }
    
    ?>
    <p>
    <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
    </p>
    <p>
    <label for="<?php echo $this->get_field_id( 'totalNews' ); ?>"><?php _e( 'Number News to Show:','ukmtheme' ); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id( 'totalNews' ); ?>" name="<?php echo $this->get_field_name( 'totalNews' ); ?>" type="text" value="<?php echo esc_attr( $totalNews ); ?>" />
    </p>
    <?php 
  }

  public function update( $new_instance, $old_instance ) {
    $instance = array();
    $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
    $instance['totalNews'] = ( ! empty( $new_instance['totalNews'] ) ) ? strip_tags( $new_instance['totalNews'] ) : '';

    return $instance;
  }

}

function register_news_portal_widget() {
    register_widget( 'news_portal_widget' );
}
add_action( 'widgets_init', 'register_news_portal_widget' );
?>