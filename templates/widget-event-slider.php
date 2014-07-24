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
  $current_year = date('Y');
  $current_month = date('m');
  $eveData = array(
    'post_type'       => 'event',
    'posts_per_page'  => 6,
    'year'            => $current_year,
    'monthnum'        => $current_month,
    'post_status'     => array( 'publish', 'future' ),
    );
    
  $eveSlider = new WP_Query( $eveData );
?>
<script type="text/javascript">
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
  });

});
</script>

<div class="wrap">
  <div id="event_slider">
    <div id="carousel">
    <?php while ( $eveSlider->have_posts() ) : $eveSlider->the_post(); ?>
      <div id="carousel_content">
        <span class="new_event_heading"><?php echo get_post_meta($post->ID, 'ut_event_date', true); ?>&nbsp;:&nbsp;<?php echo get_post_meta($post->ID, 'ut_event_time_start', true); ?></span>
        <span class="new_event_content"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></span>
      </div>
      <?php endwhile; ?>
    </div>
    <a id="prev" href="#"></a>
    <a id="next" href="#"></a>
  </div>
</div>