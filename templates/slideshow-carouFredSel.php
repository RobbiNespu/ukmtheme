<?php
/**
 * @link http://www.ukm.my/template
 * @link http://dev7studios.com/plugins/caroufredsel
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
$(function() {
	$('#carousel').carouFredSel({
		width: '100%',
		items: {
			visible: 3,
			start: -1
		},
		scroll: {
			items: 1,
			duration: 1000,
			timeoutDuration: 6000
		},
		prev: '#prev',
		next: '#next',
		pagination: {
			container: '#pager',
			deviation: 1
		}
	});
});
</script>
<div id="carousel-wrapper">
  <div id="carousel">
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
      <img src="<?php echo get_template_directory_uri(); ?>/assets/images/public/slide-sample-1.jpg?ver=6.1.1" alt="">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/images/public/slide-sample-2.jpg?ver=6.1.1" alt="">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/images/public/slide-sample-3.jpg?ver=6.1.1" alt="">
    <?php endif; ?>
  </div><!--#carousel-->
	<a href="#" id="prev" title="Show previous"> </a>
	<a href="#" id="next" title="Show next"> </a>
	<div id="pager"></div>
</div><!--#wrapper-->