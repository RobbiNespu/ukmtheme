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
<div class="content clearfix">
<section class="col-3-4 article">
<h2 class="content-title"><?php single_cat_title(); ?></h2>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<div class="uk-panel uk-panel-box uk-panel-box-secondary staff-wrap">
  <div class="col-1-7">
      <div class="staff-photo">
        <?php 
          $saved_data = get_post_meta($post->ID,'ut_staff_photo',true);
          echo '<img src="'.$saved_data.'">';
        ?>
      </div>
  </div>

  <div class="col-6-7">
    <div class="staff-detail">
      <h2><?php the_title(); ?></h2>
      <?php echo '<span class="staff-position">'; echo get_the_term_list( $post->ID, 'position', '', ', ', '' ); echo '</span>'; ?>
      <?php echo '<span class="staff-phone">'; echo get_post_meta($post->ID, 'ut_staff_phone', true); echo '</span>'; ?>
      <?php echo '<span class="staff-email">'; echo get_post_meta($post->ID, 'ut_staff_email', true); echo '</span>'; ?>
    </div>
  </div>
</div><!--staff-wrap-->

<?php endwhile; else: ?>

<p><?php _e( 'Sorry, no posts matched your criteria.', 'ukmtheme' ); ?></p>
    
<?php endif; ?>
<p><?php get_template_part( 'templates/content', 'paginate' ); ?></p>
</section>
<aside class="col-1-4">
    <?php get_template_part( 'sidebar', 'page'); ?>
</aside>
</div><!--.content-->
</article>
<?php get_footer(); ?>