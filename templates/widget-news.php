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
<div class="pure-g pure-g-r">
  <div class="pure-u-2-3">
    <div class="uk-panel widgets-annc">
    <h3><?php _e('Latest News','ukmtheme') ?></h3>
    <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
      <div class="pure-g pure-g-r ut-news-list clearfix">
        <div class="pure-u-1-5 ut-news-thumb">
          <?php
          if ( has_post_thumbnail() ) {
            the_post_thumbnail();
          }
          else {
            echo '<img src="' . get_template_directory_uri() . '/img/thumbnail.png?ver=6.3" height="auto" width="auto"/>';
          }
          ?>
        </div>
        <div class="pure-u-4-5 ut-news-content-widget">
            <a href="<?php echo get_permalink(); ?>"><h4 class="ut-news-title"><?php the_title(); ?></h4></a>
            <div class="ut-news-detail">
                <?php the_excerpt(); ?>
            </div>
        </div>
      </div>
    <?php endwhile ?>
    <div class="pure-u-1 uk-panel ut-news-show-all">
      <a href="<?php echo get_post_type_archive_link('news'); ?>"><button class="uk-button uk-button-mini uk-button-primary"><?php _e('News Archive','ukmtheme'); ?></button></a>
    </div>
    </div>
  </div>
  <div class="pure-u-1-3">
    <?php if (dynamic_sidebar( 'sidebar-1' )) : else : ?><?php endif; ?>
  </div>
</div>
</div>