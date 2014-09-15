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
    <h2 class="content-title"><?php the_title(); ?></h2>
      <div class="col-1-10">
        <?php
          $staff_photo = get_post_meta($post->ID,'ut_staff_photo',true);
          if ( $staff_photo ) { ?>
          <img src="<?php echo get_post_meta($post->ID,'ut_staff_photo',true); ?>" alt="">
          <?php }

          else { ?>
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/public/staff-photo.png">
          <?php }
        ?>
		  </div>
  		<div class="col-9-10">
        <div class="staff-detail">
          <?php echo '<span class="staff-position">'; echo get_the_term_list( $post->ID, 'position', '', ', ', '' ); echo '</span>'; ?>
          <?php echo '<span class="staff-department">'; echo get_the_term_list( $post->ID, 'department', '', ', ', '' ); echo '</span>'; ?>
          <?php echo '<span class="staff-phone">'; echo get_post_meta($post->ID, 'ut_staff_phone', true); echo '</span>'; ?>
          <?php echo '<span class="staff-email">'; echo get_post_meta($post->ID, 'ut_staff_email', true); echo '</span>'; ?><br/>
          <?php
            $scope = get_post_meta($post->ID, 'ut_staff_work_scope', true);
            $scope_desc = get_post_meta($post->ID, 'ut_staff_work_scope_desc', true);

            if($scope == on) { ?>
              <strong><?php _e( 'Scope of Work','ukmtheme' ); ?></strong><br/>
              <?php echo '<span class="staff-scope">'; echo get_post_meta($post->ID, 'ut_staff_work_scope_desc', true); echo '</span>'; ?>
            
            <?php }
            
            else {
              echo '';
            }
          ?>
        </div>
      </div>
  </div>
</article>
<?php get_footer(); ?>