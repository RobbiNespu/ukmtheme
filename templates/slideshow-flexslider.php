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

<div class="wrap flexslider">
  <ul class="slides">
    <?php if( $slideshow->have_posts() ) : while( $slideshow->have_posts() ) : $slideshow->the_post(); ?>
      <li>
      <a href="<?php echo get_post_meta($post->ID,'ut_slideshow_link',true); ?>">
        <img src="<?php echo get_post_meta($post->ID,'ut_slideshow_image',true); ?>" alt="<?php the_title(); ?>" width="960" height="350" />
      </a>
      </li>            
    <?php endwhile; else: ?>
      <li><img src="<?php echo get_template_directory_uri(); ?>/img/sample-slide-1.min.jpg" alt="Slide-1" width="960" height="350" /></li>
      <li><img src="<?php echo get_template_directory_uri(); ?>/img/sample-slide-2.min.jpg" alt="Slide-2" width="960" height="350"/></li>
      <li><img src="<?php echo get_template_directory_uri(); ?>/img/sample-slide-3.min.jpg" alt="Slide-3" width="960" height="350"/></li>
    <?php endif; ?>
  </ul>
</div>