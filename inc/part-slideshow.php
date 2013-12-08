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
?> 
<script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider({
            directionNav: true, 
            controlNav: true
        });
    });
</script>

<div class="wrap slider-wrapper theme-default"> 
    <div class="ribbon">
<?php
    $slideshow = new WP_Query('post_type=ukmtheme_slideshow');
    if( $slideshow->have_posts() ) :
    echo '<div id="slider" class="nivoSlider">';
    while( $slideshow->have_posts() ) : $slideshow->the_post();
?>
<?php if(has_post_thumbnail()) { the_post_thumbnail(); } ?>
<?php
	endwhile;
        echo '</div>';
endif;
?>
    </div>
</div><!-- end .slider-wrapper -->