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
 */
  $args = array(
    'post_type'       => 'news',
    'posts_per_page'  => 5
    );
  $loop = new WP_Query( $args );
?>

<div class="wrap">
  <div class="uk-panel uk-panel-box widgets-wrap">
    <ul id="news-scroller">
    <?php if ( $loop->have_posts() ) : while ( $loop->have_posts() ) : $loop->the_post(); ?>
      <li><?php the_content(); ?></li>
    <?php endwhile; else: ?>
      <li><?php _e( 'Hello, welcome to Universiti Kebangsaan Malaysia!', 'ukmtheme' ); ?></li>
    <?php endif; ?>
    </ul>
  </div>
</div>