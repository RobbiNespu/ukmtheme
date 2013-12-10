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
$args = array( 'post_type' => 'ukmtheme_fourBox', 'posts_per_page' => 4 );
$loop = new WP_Query( $args );
while ( $loop->have_posts() ) : $loop->the_post();
	echo '<div class="col-1-4">';
	echo '<h3>';
	the_title();
	echo '</h3>';
	echo '<div class="widgets">';
	the_content();
	echo '</div>';
	echo '</div>';
endwhile;
?>