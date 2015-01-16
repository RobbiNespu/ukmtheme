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
    'posts_per_page'  => 10,
    'year'            => $current_year,
    'monthnum'        => $current_month,
    'post_status'     => array( 'publish', 'future' ),
    );
    
  $eveSlider = new WP_Query( $eveData );
?>

<div class="wrap event_jcarousel-outer">
  <div class="jcarousel-wrapper">
  <div class="jcarousel">
    <ul>
    <?php while ( $eveSlider->have_posts() ) : $eveSlider->the_post(); ?>
      <li>
        <span class="new_event_heading"><?php echo get_post_meta($post->ID, 'ut_event_date', true); ?>&nbsp;:&nbsp;<?php echo get_post_meta($post->ID, 'ut_event_time_start', true); ?></span>
        <span class="new_event_content"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></span>
      </li>
      <?php endwhile; ?>
    </ul>
  </div>
  <a href="#" class="jcarousel-control-prev"><span class="entypo-prev"></span></a>
  <a href="#" class="jcarousel-control-next"><span class="entypo-next"></span></a>
  </div>
</div>