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

    if ( ! isset( $instance['newscat'] ) )
      $instance['newscat'] = '';

    if ( ! $newscat = absint( $instance['newscat'] ) )
      $newscat = '';

    if ( ! isset( $instance['newscount'] ) )
      $instance['newscount'] = '4';

    if ( ! $newscount = absint( $instance['newscount'] ) )
      $newscount = '4';
    ?>

    <?php
    /**
     * Events Widget Output
     * @link http://codex.wordpress.org/Widgets_API
     */


    $news_args = array(
      'post_type'       => 'news',
      'posts_per_page'  => $instance['newscount'],
      'newscat'         => $instance['newscat'],
      );

    $news_query = new WP_Query( $news_args );

    if ( $news_query->have_posts() ) : while ( $news_query->have_posts() ) : $news_query->the_post(); ?>

      <div class="ut-news-list clearfix">
        <div class="col-1-5 ut-news-thumb">
          <?php 
            if ( has_post_thumbnail() ) { the_post_thumbnail(); }
            else { echo '<img src="' . get_template_directory_uri() . '/assets/images/public/thumbnail.png" height="auto" width="auto"/>'; }
          ?>
        </div>
          <div class="col-4-5 ut-news-content-widget">
              <a href="<?php echo get_permalink(); ?>"><h4 class="ut-news-title"><?php the_title(); ?></h4></a>
              <div class="ut-news-detail">
                  <?php the_excerpt(); ?>
              </div>
          </div>
      </div>

    <?php endwhile; endif; ?>

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
      $title = __( 'New title', 'ukmtheme' );
    }

    if ( isset( $instance['newscat'] ) ) {
      $newscat = $instance['newscat'];
    }

    if ( isset( $instance[ 'newscount'] ) ) {
      $newscount = $instance[ 'newscount' ];
    }
    
    ?>
    <p class="tukm-widget-text">
      <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
      <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" />
    </p>
    <p class="tukm-widget-text">
      <label for="<?php echo $this->get_field_id( 'newscat' ); ?>"><?php _e( 'News category slug:' ); ?></label> 
      <input class="widefat" id="<?php echo $this->get_field_id( 'newscat' ); ?>" name="<?php echo $this->get_field_name( 'newscat' ); ?>" type="text" value="<?php echo $newscat; ?>" />
    </p>
    <p class="tukm-widget-text">
      <label for="<?php echo $this->get_field_id( 'newscount' ); ?>"><?php _e( 'Number of news to show:','ukmtheme' ); ?></label> 
      <input class="widefat" id="<?php echo $this->get_field_id( 'newscount' ); ?>" name="<?php echo $this->get_field_name( 'newscount' ); ?>" type="text" value="<?php echo $newscount; ?>" />
    </p>
    <?php 
  }

  public function update( $new_instance, $old_instance ) {
    $instance = array();
    $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
    $instance['newscat'] = ( ! empty( $new_instance['newscat'] ) ) ? strip_tags( $new_instance['newscat'] ) : '';
    $instance['newscount'] = ( ! empty( $new_instance['newscount'] ) ) ? strip_tags( $new_instance['newscount'] ) : '';

    return $instance;
  }

}

function register_Latest_News_Widget_Thumbnail() {
  register_widget( 'Latest_News_Widget_Thumbnail' );
}

add_action( 'widgets_init', 'register_Latest_News_Widget_Thumbnail' );

?>