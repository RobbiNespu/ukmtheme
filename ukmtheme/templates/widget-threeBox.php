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
$args = array( 'post_type' => 'ukmtheme_threeBox', 'posts_per_page' => 3 );
$loop = new WP_Query( $args );
while ( $loop->have_posts() ) : $loop->the_post();
	echo '<div class="col-1-3">';
	    echo '<div class="uk-panel uk-panel-box uk-panel-box-primary widgets-wrap">';
	        echo '<h3>'; the_title(); echo '</h3>';
	        echo '<div class="widgets">';
	        the_content();
	        echo '</div>'; // .widgets the_content()
	    echo '</div>'; // .widgets-wrap
	echo '</div>'; // .col-1-3
endwhile;
?>