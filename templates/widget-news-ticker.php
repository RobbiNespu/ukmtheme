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
  $args = array( 'post_type' => 'news_scroller', 'posts_per_page' => 5 );
  $loop = new WP_Query( $args );
?>
<script>
$(function () {
  $('#newsList').newsTicker({
    interval: "6000"
  });
});
</script>

<div class="wrap">
  <div class="uk-panel uk-panel-box widgets-wrap">
    <div id="newsData" class="row newsCss"></div>
    <ul id="newsList">
    <?php if ( $loop->have_posts() ) : while ( $loop->have_posts() ) : $loop->the_post(); ?>
      <li><?php the_title(); ?>&nbsp;<a href="<?php echo get_permalink(); ?>"><div class="uk-badge"><?php _e( 'Read More', 'ukmtheme' ); ?></div></a></li>
    <?php endwhile; else: ?>
      <li><?php _e( 'Hello, welcome to Universiti Kebangsaan Malaysia!', 'ukmtheme' ); ?></li>
    <?php endif; ?>
    </ul>
  </div><!--widgets-wrap-->
</div>