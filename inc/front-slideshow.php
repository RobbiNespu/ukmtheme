<?php
/**
 * @package WordPress
 * @subpackage UKM_Theme
 * @since UKM Theme 1.0
 *
 * Post Type: Slideshow
 */
?>
<?php
$q = new WP_Query('post_type=slides');
	if( $q->have_posts() ) :
        echo '<div id="slideshow">';
        while( $q->have_posts() ) : $q->the_post();
?>
<div class="slide">
<?php
if(has_post_thumbnail()) {
	the_post_thumbnail();
}
?>
<div class="desc"><?php the_content(); ?></div>
</div>
<?php
	endwhile;
        echo '</div>';
endif;
?>