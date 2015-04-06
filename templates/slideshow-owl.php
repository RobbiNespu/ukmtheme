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

$args = array(
    'post_type'       => 'slideshow',
    'post_per_page'   => 10,
    'order'           => 'ASC'
  );

$slideshow = new WP_Query( $args );

global $post; ?>

<div class="carousel-wrap">
<div id="owl-main-slider" class="wrap owl-carousel owl-theme">
    <?php if( $slideshow->have_posts() ) : while( $slideshow->have_posts() ) : $slideshow->the_post(); ?>
      <div class="item">
      <a href="<?php echo get_post_meta($post->ID,'ut_slideshow_link',true); ?>">
        <img src="<?php echo get_post_meta($post->ID,'ut_slideshow_image',true); ?>" width="960" height="350" alt="<?php the_title(); ?>">
      </a>
      </div>
    <?php endwhile; else: ?>
      <div class="item"><img src="<?php echo get_template_directory_uri(); ?>/img/placeholder_owl_slider_a.jpg" width="960" height="350" alt="Slide-1"></div>
      <div class="item"><img src="<?php echo get_template_directory_uri(); ?>/img/placeholder_owl_slider_b.jpg" width="960" height="350" alt="Slide-2"></div>
      <div class="item"><img src="<?php echo get_template_directory_uri(); ?>/img/placeholder_owl_slider_c.jpg" width="960" height="350" alt="Slide-3"></div>
    <?php endif; ?>
</div>
</div>