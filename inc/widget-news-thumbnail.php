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
 * Widget: Latest News with Thumbnail
 */

class Latest_News_Widget_Thumbnail extends WP_Widget {

  function __construct() {
    parent::__construct(
      'latest_news_widget_thumbnail', // Base ID
      __('#Latest News with Thumbnail', 'ukmtheme'),
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
        $ut_news = array( 'post_type' => 'news', 'posts_per_page' => $totalNews, );
        $loop = new WP_Query( $ut_news );
      ?>
        <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
          <div class="ut-news-list clearfix">
            <div class="col-1-5 ut-news-thumb">
              <?php
              if ( has_post_thumbnail() ) {
                the_post_thumbnail();
              }
              else {
                echo '<img src="' . get_template_directory_uri() . '/assets/images/public/thumbnail.png?ver=6.3" height="auto" width="auto"/>';
              }
              ?>
            </div><!--post-thumbnail-->
            <div class="col-4-5 ut-news-content-widget">
                <a href="<?php echo get_permalink(); ?>"><h4 class="ut-news-title"><?php the_title(); ?></h4></a>
                <div class="ut-news-detail">
                    <?php the_excerpt(); ?>
                </div><!--.ut-news-detail-->
            </div><!--col-4-5-->
          </div><!--.ut-news .clearfix-->
        <?php endwhile ?>
        <div class="col-1-1 uk-panel ut-news-show-all">
          <a href="<?php echo get_post_type_archive_link('news'); ?>"><button class="uk-button uk-button-mini uk-button-primary"><?php _e('News Archive','ukmtheme'); ?></button></a>
        </div><!--.ut-news-show-all-->
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

function register_Latest_News_Widget_Thumbnail() {
    register_widget( 'Latest_News_Widget_Thumbnail' );
}
add_action( 'widgets_init', 'register_Latest_News_Widget_Thumbnail' );
?>