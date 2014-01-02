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
$(window).load(function() {
    $('#slider').nivoSlider();
});
</script>
<div class="wrap">
  <div class="slider-wrapper theme-default">
  <div class="ribbon"></div><!--.ribbon-->
    <div id="slider" class="nivoSlider">
      <?php if( $slideshow->have_posts() ) : while( $slideshow->have_posts() ) : $slideshow->the_post(); ?>
        <a href="<?php echo get_post_meta($post->ID,'ut_slideshow_link',true); ?>">
          <?php 
            $saved_data = get_post_meta($post->ID,'ut_slideshow_image',true);
            echo '<img src="'.$saved_data['url'].'">';
          ?>
        </a>         
      <?php endwhile; else: ?>
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/public/slide-sample-1.jpg?ver=6.1.1" alt="">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/public/slide-sample-2.jpg?ver=6.1.1" alt="">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/public/slide-sample-3.jpg?ver=6.1.1" alt="">
      <?php endif; ?>
    </div><!--#slider.nivoSlider-->
  </div><!--.slider-wrapper .theme-default-->
</div>