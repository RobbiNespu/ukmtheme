<?php
/**
 *
 * @link http://www.ukm.my/template
 * @package ukmtheme
 * @version 6.x.x
 * @author Jamaludin Rajalu
 *
 */
get_header(); ?>
<article class="wrap">
<div class="pure-g pre-g-r content">
<section class="pure-u-3-4 article">
<h2><?php _e( 'Expertise', 'ukmtheme' ) ; ?></h2>

<?php
  $expert = new WP_Query( array( 
    'post_type'       => 'expertise', 
    'posts_per_page'  => -1, 
    'orderby'         => 'menu_order', 
    'order'           => 'ASC' 
  ));
?>
<?php if ( $expert->have_posts() ) : while ( $expert->have_posts() ) : $expert->the_post(); ?>
<div class="pure-g staff-wrap">
  <div class="pure-u-1-5">
      <div class="staff-photo">
      <a href="<?php echo get_permalink(); ?>">
        <?php
          $expertPhoto = get_post_meta($post->ID,'ut_expertise_photo',true);
          if ( $expertPhoto ) {
            echo '<img src="'.$expertPhoto.'">';
          }
          else {
            echo '<img src="'. get_template_directory_uri() .'/img/staff-photo.png">';
          }
        ?>
      </a>
      </div>
  </div>

  <div class="pure-u-4-5">
    <div class="staff-detail">
    <a href="<?php echo get_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
      <?php
        echo '<span class="staff-position">'. get_post_meta($post->ID, 'ut_expertise_position', true) .'</span>';
        echo '<span class="staff-phone">'. get_post_meta($post->ID, 'ut_expertise_contact', true) .'</span>';
        echo '<span class="staff-email">'. get_post_meta($post->ID, 'ut_expertise_email', true) .'</span>';
      ?>
      <p><strong><?php _e( 'Specialisation', 'ukmtheme' ) ?></strong><br/><?php echo get_post_meta($post->ID, 'ut_expertise_specialisation', true); ?></p>
    </div>
  </div>
</div><!--staff-wrap-->
<hr>
<?php endwhile; else: ?>

<p><?php _e( 'Sorry, no posts matched your criteria.', 'ukmtheme' ); ?></p>
    
<?php endif; ?>
<p><?php get_template_part( 'templates/content', 'paginate' ); ?></p>
</section>
<aside class="pure-u-1-4">
  <?php if (dynamic_sidebar( 'sidebar-2' )) : else : ?><?php endif; ?>
</aside>
</div><!--.content-->
</article>
<?php get_footer(); ?>