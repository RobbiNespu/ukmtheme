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
<section class="pure-u-3-4 article">
<h2 class="content-title"><?php single_cat_title(); ?></h2>
<?php
  $staff = new WP_Query( array( 
    'post_type'       => 'staff',
    'position'        => get_the_term_list( $post->ID, 'position' ),
    'posts_per_page'  => -1, 
    'orderby'         => 'menu_order', 
    'order'           => 'ASC' 
  ));
?>
<?php if ( $staff->have_posts() ) : while ( $staff->have_posts() ) : $staff->the_post(); ?>
<div class="pure-g staff-wrap">
  <div class="pure-u-1-5">
      <div class="staff-photo">
        <?php
          $staff_photo = get_post_meta($post->ID,'ut_staff_photo',true);
          if ( $staff_photo ) { ?>
          <img src="<?php echo get_post_meta($post->ID,'ut_staff_photo',true); ?>" alt="">
          <?php }

          else { ?>
          <img src="<?php echo get_template_directory_uri(); ?>/img/placeholder_staff.png">
          <?php }
        ?>
      </div>
  </div>

  <div class="pure-u-4-5">
    <div class="staff-detail">
      <h3><?php the_title(); ?></h3>
      <?php echo '<span class="staff-position">'; echo get_the_term_list( $post->ID, 'position', '', ', ', '' ); echo '</span>'; ?>
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
        <?php get_template_part('templates/content','edit' ); ?>
    </div>
  </div>
</div><!--staff-wrap-->
<hr>

<?php endwhile; else: ?>

<p><?php _e( 'Sorry, no posts matched your criteria.', 'ukmtheme' ); ?></p>
    
<?php endif; ?>
</section>
<aside class="pure-u-1-4">
  <?php if (dynamic_sidebar( 'sidebar-2' )) : else : ?><?php endif; ?>
</aside>
</div><!--.content-->
</article>
<?php get_footer(); ?>