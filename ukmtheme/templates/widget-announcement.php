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
echo '<div class="col-2-3">';
    echo '<div class="uk-panel uk-panel-box uk-panel-box-primary widgets-wrap">';
        $args = array( 'post_type' => 'announcement', 'posts_per_page' => 3 );
        $loop = new WP_Query( $args );
        while ( $loop->have_posts() ) : $loop->the_post();
            echo '<h3>';
            the_title();
            echo '</h3>';
            echo '<div class="ukmtheme-news clearfix">';
            the_excerpt();
            echo '<a href="'; echo get_permalink(); echo '"><button class="uk-button uk-button-mini uk-button-primary">'; echo __('Read More', 'ukmtheme'); echo '</button></a>';
            echo '</div>';
        endwhile;
    echo '</div>'; // .uk-panel
echo '</div>'; // .col-2-3
?>
<div class="col-1-3">
    <?php if (dynamic_sidebar( 'sidebar-1' )) : else : ?><?php endif; ?>
</div>