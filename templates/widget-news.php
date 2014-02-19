<?php
/**
 * @link http://www.ukm.my/template
 * @link http://codex.wordpress.org/Function_Reference/get_term_link
 *
 * @package WordPress
 * @subpackage ukmtheme
 * @since 4.0
 *
 * @author Jamaludin Rajalu
 */

$args = array( 'post_type' => 'news', 'posts_per_page' => 4 );
$loop = new WP_Query( $args );

?>
<div class="uk-panel uk-panel-box uk-panel-box-secondary widgets-wrap">
  <div class="col-2-3">
    <div class="uk-panel widgets-annc">
    <h3><?php _e('Latest News','ukmtheme') ?></h3>
    <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
      <div class="ut-news-list clearfix">
        <div class="col-1-5 ut-news-thumb">
          <?php
          if ( has_post_thumbnail() ) {
            the_post_thumbnail();
          }
          else {
            echo '<img src="' . get_template_directory_uri() . '/assets/images/public/thumbnail.jpg?ver=6.1" height="auto" width="auto"/>';
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
    </div><!--.widgets-annc-->
  </div><!--.col-2-3-->
  <div class="col-1-3">
    <?php //get_template_part( 'templates/widget','event-vertical' ); ?>
    <?php if (dynamic_sidebar( 'sidebar-1' )) : else : ?><?php endif; ?>
  </div><!--.col-1-3-->
</div><!--.widgets-wrap-->