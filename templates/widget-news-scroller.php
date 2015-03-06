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
    'post_type'       => 'news_scroller',
    'posts_per_page'  => 10
    );
  $loop = new WP_Query( $args );
?>

<div class="wrap">
  <div class="uk-panel uk-panel-box widgets-wrap">
    <ul id="news-scroller">
    <?php if ( $loop->have_posts() ) : while ( $loop->have_posts() ) : $loop->the_post(); ?>
      <li><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></li>
    <?php endwhile; else: ?>
      <li><?php _e( 'Hello, welcome to Universiti Kebangsaan Malaysia!', 'ukmtheme' ); ?></li>
    <?php endif; ?>
    </ul>
  </div>
</div>