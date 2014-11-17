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

global $post;
?> 
<script type="text/javascript">
$(document).ready(function() {
  $('#slideshow').flexslider({
    animation: "slide",
    nextText: "",
    prevText: "",
  });
});
</script>
<div class="wrap">
  <div id="slideshow" class="flexslider">
    <ul class="slides">
      <?php if( $slideshow->have_posts() ) : while( $slideshow->have_posts() ) : $slideshow->the_post(); ?>
        <li>
        <a href="<?php echo get_post_meta($post->ID,'ut_slideshow_link',true); ?>">
          <img src="<?php echo get_post_meta($post->ID,'ut_slideshow_image',true); ?>" alt="">
        </a>
        </li>            
      <?php endwhile; else: ?>
        <li><img src="<?php echo get_template_directory_uri(); ?>/assets/images/public/sample-slide-1.min.jpg" alt=""></li>
        <li><img src="<?php echo get_template_directory_uri(); ?>/assets/images/public/sample-slide-2.min.jpg" alt=""></li>
        <li><img src="<?php echo get_template_directory_uri(); ?>/assets/images/public/sample-slide-3.min.jpg" alt=""></li>
      <?php endif; ?>
    </ul>
  </div>
</div>