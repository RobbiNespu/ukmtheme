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
<script>
  $(function() {
    $(".rslides").responsiveSlides({
        nav: true,
        prevText: "",
        nextText: ""
    });
  });
</script>
<div class="wrap ut-rslides-wrap">
<ul class="rslides">

<?php while( $slideshow->have_posts() ) : $slideshow->the_post(); ?>
    <li>
        <a href="<?php echo get_post_meta($post->ID,'ut_slideshow_link',true); ?>">
            <?php 
                $saved_data = get_post_meta($post->ID,'ut_slideshow_image',true);
                echo '<img src="'.$saved_data['url'].'">';
            ?>
        </a>
    </li>            
<?php endwhile; ?>
</ul>
</div>