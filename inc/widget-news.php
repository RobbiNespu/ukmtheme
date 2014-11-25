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
 * Widget: Latest News with Thumbnail and Category
 */

class Latest_News_Widget extends WP_Widget {
  function __construct() {

    parent::__construct(

      'latest_news_widget', // Base ID

      __('&bull; News', 'ukmtheme'),

      array( 'description' => __( 'News list with category.', 'ukmtheme' ), )

    );
  }

  public function widget( $args, $instance ) {

    $title = apply_filters( 'widget_title', $instance['title'] );

    echo $args['before_widget'];

    if ( ! empty( $title ) ) {
      echo $args['before_title'] . $title . $args['after_title'];
    }

    if ( ! isset( $instance['newscat'] ) ) {
      $newscat = $instance['newscat'];
    }

    if ( ! isset( $instance['newscount'] ) ) {
      $newscount = $instance['newscount'];
    }

    /**
     * Events Widget with Post Type
     * @link http://codex.wordpress.org/Widgets_API
     * @link http://codex.wordpress.org/Class_Reference/WP_Query
     */

    $news_args = array(
      'post_type'       => 'news',
      'posts_per_page'  => $instance['newscount'],
      'newscat'         => $instance['newscat'],
      );

    $news_query = new WP_Query( $news_args );
    echo '<ul>';
    if ( $news_query->have_posts() ) : while ( $news_query->have_posts() ) : $news_query->the_post(); ?>
      <li><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></li>
    <?php endwhile; endif;
    echo '</ul>';
    ?>
    <div class="col-1-1 uk-panel ut-news-show-all">
      <a href="<?php echo get_post_type_archive_link('news'); ?>"><button class="uk-button uk-button-mini uk-button-primary"><?php _e('News Archive','ukmtheme'); ?></button></a>
    </div>

<?php

    echo $args['after_widget'];

}

  public function form( $instance ) {

    if ( isset( $instance['title'] ) ) {
      $title = $instance['title'];
    }
    else {
      $title = __( 'Latest Awesome News', 'ukmtheme' );
    }

    if ( isset( $instance['newscat'] ) ) {
      $newscat = $instance['newscat'];
    }

    if ( isset( $instance[ 'newscount'] ) ) {
      $newscount = $instance['newscount'];
    }
    else {
      $newscount = '4';
    }
    
    echo '<p class="tukm-widget-text">';
    echo '<label for="'. $this->get_field_id('title') .'">' . __( 'Title:', 'ukmtheme' ) . '</label>';
    echo '<input class="widefat" id="' . $this->get_field_id('title') . '" name="' . $this->get_field_name('title') .'" type="text" value="'. $title .'" />';
    echo '</p>';

    echo '<p class="tukm-widget-text">';
    echo '<label for="'. $this->get_field_id('newscat') .'">'. __( 'News category slug:', 'ukmtheme' ) .'</label>';
    echo '<input class="widefat" id="'. $this->get_field_id('newscat') .'" placeholder="e.g. awesome" name="'. $this->get_field_name('newscat') .'" type="text" value="'. $newscat .'" />';
    echo '</p>';

    echo '<p class="tukm-widget-text">';
    echo '<label for="'. $this->get_field_id('newscount') .'">'. __( 'Number of news to show:', 'ukmtheme' ) .'</label>';
    echo '<input class="widefat" id="'. $this->get_field_id('newscount') .'" name="'. $this->get_field_name('newscount') .'" type="text" value="'. $newscount .'" />';
    echo '</p>';


  }

  public function update( $new_instance, $old_instance ) {
    
    $instance = array();
    $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
    $instance['newscat'] = ( ! empty( $new_instance['newscat'] ) ) ? strip_tags( $new_instance['newscat'] ) : '';
    $instance['newscount'] = ( ! empty( $new_instance['newscount'] ) ) ? strip_tags( $new_instance['newscount'] ) : '';

    return $instance;
  }

}

function register_Latest_News_Widget() {
  register_widget( 'Latest_News_Widget' );
}

add_action( 'widgets_init', 'register_Latest_News_Widget' );

?>