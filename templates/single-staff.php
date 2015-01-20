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
<article class="wrap">
  <div class="pure-g pure-g-r content">
    <h2 class="pure-u-1 content-title"><?php the_title(); ?></h2>
      <div class="pure-u-1-4">
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
  		<div class="pure-u-3-4">
        <div class="staff-detail">
          <?php echo '<span class="staff-position">'; echo get_the_term_list( $post->ID, 'position', '', ', ', '' ); echo '</span>'; ?>
          <?php echo '<span class="staff-department">'; echo get_the_term_list( $post->ID, 'department', '', ', ', '' ); echo '</span>'; ?>
          <?php echo '<span class="staff-phone">'; echo get_post_meta($post->ID, 'ut_staff_phone', true); echo '</span>'; ?>
          <?php echo '<span class="staff-email">'; echo get_post_meta($post->ID, 'ut_staff_email', true); echo '</span>'; ?><br/>
          <?php
           $scope               = get_post_meta($post->ID, 'ut_staff_work_scope', true);
           $scope_desc          = get_post_meta($post->ID, 'ut_staff_work_scope_desc', true);
           $scope_title         = get_post_meta($post->ID, 'ut_staff_work_scope_title', true);
           $scope_title_custom  = get_post_meta($post->ID, 'ut_staff_work_scope_title_custom', true);

            if($scope == on) { 
              if($scope_title == on) { ?>
                <h4><?php echo $scope_title_custom; ?></h4>            
              <?php }          
              else { ?>
                <h4><?php _e( 'Scope of Work','ukmtheme' ); ?></h4>
              <?php } ?>
            <?php echo '<span class="staff-scope">'; echo get_post_meta($post->ID, 'ut_staff_work_scope_desc', true); echo '</span>'; ?>        
            <?php }  
            else {
              echo '';
            } ?>
        </div>
      </div>
  </div>
</article>
<?php get_footer(); ?>