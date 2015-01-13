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

<div class="wrap uk-slidenav-position" data-uk-slideshow="{animation:'slice-up-down', autoplay:true}">
  <ul class="uk-slideshow">
    <?php if( $slideshow->have_posts() ) : while( $slideshow->have_posts() ) : $slideshow->the_post(); ?>
      <li>
      <a href="<?php echo get_post_meta($post->ID,'ut_slideshow_link',true); ?>">
        <img src="<?php echo get_post_meta($post->ID,'ut_slideshow_image',true); ?>" width="960" height="350" alt="<?php the_title(); ?>">
      </a>
      </li>            
    <?php endwhile; else: ?>
      <li><img src="<?php echo get_template_directory_uri(); ?>/img/sample-slide-1.min.jpg" width="960" height="350" alt="Slide-1"></li>
      <li><img src="<?php echo get_template_directory_uri(); ?>/img/sample-slide-2.min.jpg" width="960" height="350" alt="Slide-2"></li>
      <li><img src="<?php echo get_template_directory_uri(); ?>/img/sample-slide-3.min.jpg" width="960" height="350" alt="Slide-3"></li>
    <?php endif; ?>
  </ul>
  <a href="#" class="uk-slidenav uk-slidenav-previous" data-uk-slideshow-item="previous" style="color: rgba(255,255,255,0.4)"></a>
  <a href="#" class="uk-slidenav uk-slidenav-next" data-uk-slideshow-item="next" style="color: rgba(255,255,255,0.4)"></a>
</div>