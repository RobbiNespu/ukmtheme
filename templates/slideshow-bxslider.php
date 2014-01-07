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
$slideshow = new WP_Query('post_type=slideshow');
?> 
<script type="text/javascript">
$(document).ready(function(){
  $('.bxslider').bxSlider({
    auto: true
  });
});
</script>

<div class="wrap">
  <ul class="bxslider">
    <?php if( $slideshow->have_posts() ) : while( $slideshow->have_posts() ) : $slideshow->the_post(); ?>
      <li>
      <a href="<?php echo get_post_meta($post->ID,'ut_slideshow_link',true); ?>">
        <?php 
          $saved_data = get_post_meta($post->ID,'ut_slideshow_image',true);
          echo '<img src="'.$saved_data['url'].'">';
        ?>
      </a>
      </li>            
    <?php endwhile; else: ?>
      <li><img src="<?php echo get_template_directory_uri(); ?>/assets/images/public/slide-sample-1.jpg?ver=6.1.1" alt=""></li>
      <li><img src="<?php echo get_template_directory_uri(); ?>/assets/images/public/slide-sample-2.jpg?ver=6.1.1" alt=""></li>
      <li><img src="<?php echo get_template_directory_uri(); ?>/assets/images/public/slide-sample-3.jpg?ver=6.1.1" alt=""></li>
    <?php endif; ?>
  </ul>
</div>