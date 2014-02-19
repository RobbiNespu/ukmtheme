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
// Can also be used with $(document).ready()
$(window).load(function() {
  $('.flexslider').flexslider({
    animation: "slide",
    nextText: "",
    prevText: ""
  });
});
</script>
<div class="wrap">
  <div class="flexslider">
    <ul class="slides">
      <?php if( $slideshow->have_posts() ) : while( $slideshow->have_posts() ) : $slideshow->the_post(); ?>
        <li>
        <a href="<?php echo get_post_meta($post->ID,'ut_slideshow_link',true); ?>">
          <img src="<?php echo get_post_meta($post->ID,'ut_slideshow_image',true); ?>" alt="">
        </a>
        </li>            
      <?php endwhile; else: ?>
        <li><img src="<?php echo get_template_directory_uri(); ?>/assets/images/public/slide-sample-1.jpg?ver=6.1" alt=""></li>
        <li><img src="<?php echo get_template_directory_uri(); ?>/assets/images/public/slide-sample-2.jpg?ver=6.1" alt=""></li>
        <li><img src="<?php echo get_template_directory_uri(); ?>/assets/images/public/slide-sample-3.jpg?ver=6.1" alt=""></li>
      <?php endif; ?>
    </ul>
  </div>
</div>