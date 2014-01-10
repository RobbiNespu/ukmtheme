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
        <?php echo '<span class="staff-position">'; echo get_the_term_list( $post->ID, 'position', '', ', ', '' ); echo '</span>'; ?>
        <?php echo '<span class="staff-position">'; echo get_the_term_list( $post->ID, 'department', '', ', ', '' ); echo '</span>'; ?>
        <?php echo '<span class="staff-phone">'; echo get_post_meta($post->ID, 'ut_staff_phone', true); echo '</span>'; ?>
        <?php echo '<span class="staff-email">'; echo get_post_meta($post->ID, 'ut_staff_email', true); echo '</span>'; ?>
      </div>
  </div>
</article>
<?php get_footer(); ?>