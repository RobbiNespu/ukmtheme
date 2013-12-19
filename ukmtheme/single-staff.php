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
get_header(); ?>
<article class="wrap clearfix">
    <div class="col-1-1 staff-wrap">
        <h1><?php the_title(); ?></h1>
        <div class="col-1-10">
        <?php 
        	$saved_data = get_post_meta($post->ID,'ut_staff_photo',true);
			echo '<img src="'.$saved_data['url'].'">';
		?>
		</div>
		<div class="col-9-10">
		<h2><?php the_title(); ?></h2>
        <?php echo get_post_meta($post->ID, 'ut_staff_position', true); ?><br/>
        <?php echo get_post_meta($post->ID, 'ut_staff_department', true); ?><br/>
        <?php echo get_post_meta($post->ID, 'ut_staff_phone', true); ?><br/>
        <?php echo get_post_meta($post->ID, 'ut_staff_email', true); ?>
        </div>
    </div>
</article>
<?php get_footer(); ?>