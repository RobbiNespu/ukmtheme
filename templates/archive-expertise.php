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

<?php
  $expert = new WP_Query( array( 
    'post_type'       => 'expertise', 
    'posts_per_page'  => -1, 
    'orderby'         => 'menu_order', 
    'order'           => 'ASC' 
  ));
?>
<?php if ( $expert->have_posts() ) : while ( $expert->have_posts() ) : $expert->the_post(); ?>
<div class="uk-panel uk-panel-box uk-panel-box-secondary staff-wrap">
  <div class="col-1-7">
      <div class="staff-photo">
      <a href="<?php echo get_permalink(); ?>">
        <?php 
          $saved_data = get_post_meta($post->ID,'ut_expertise_photo',true);
          echo '<img src="'.$saved_data.'">';
        ?>
      </a>
      </div>
  </div>

  <div class="col-6-7">
    <div class="staff-detail">
      <a href="<?php echo get_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
      <?php echo '<span class="staff-position">'; echo get_post_meta($post->ID, 'ut_expertise_position', true); echo '</span>'; ?>
      <?php echo '<span class="staff-phone">'; echo get_post_meta($post->ID, 'ut_expertise_contact', true); echo '</span>'; ?>
      <?php echo '<span class="staff-email">'; echo get_post_meta($post->ID, 'ut_expertise_email', true); echo '</span>'; ?>
      <p><strong><?php _e( 'Specialisation', 'ukmtheme' ) ?></strong><br/><?php echo get_post_meta($post->ID, 'ut_expertise_specialisation', true); ?></p>
    </div>
  </div>
</div><!--staff-wrap-->

<?php endwhile; else: ?>

<p><?php _e( 'Sorry, no posts matched your criteria.', 'ukmtheme' ); ?></p>
    
<?php endif; ?>
<p><?php get_template_part( 'templates/content', 'paginate' ); ?></p>
</section>
<aside class="col-1-4">
  <?php if (dynamic_sidebar( 'sidebar-2' )) : else : ?><?php endif; ?>
</aside>
</div><!--.content-->
</article>
<?php get_footer(); ?>