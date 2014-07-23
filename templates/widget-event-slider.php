<?php
/**
 * @link http://www.ukm.my/template
 *
 * @package WordPress
 * @subpackage ukmtheme
 * @since 4.0
 *
 * @author Jamaludin Rajalu
 */
  $args = array( 'post_type' => 'event', 'posts_per_page' => 4 );
  $eveSlider = new WP_Query( $args );
?>
<script>
  $(function() {

  $('#carousel').carouFredSel({
    width: 897,
    items: 3,
    scroll: 1,
    auto: {
      play: false
      //duration: 1250,
      //timeoutDuration: 2500
    },
    prev: '#prev',
    next: '#next',
    pagination: '#pager'
  });

});
</script>

<div class="wrap">

<div id="event_slider">
  <div id="carousel">
  <?php while ( $eveSlider->have_posts() ) : $eveSlider->the_post(); ?>
    <div>
      <h3 class="new_event_heading"><?php echo get_post_meta($post->ID, 'ut_event_date', true); ?></h3>
      <span class="new_event_content"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></span>
    </div>
    <?php endwhile; ?>
  </div>
  <a id="prev" href="#"></a>
  <a id="next" href="#"></a>
</div>

</div>