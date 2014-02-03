<?php
/**
 * @link http://www.ukm.my/template
 * @link http://codex.wordpress.org/The_Loop
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
    <section class="col-3-4">
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <div class="col-1-1">
            <div class="col-3-10 article">
            <?php 
              $saved_data = get_post_meta($post->ID,'ut_expertise_photo',true);
              echo '<img src="'.$saved_data.'">';
            ?>
            </div>
            <div class="col-7-10">
              <h2><?php the_title(); ?></h2>
              <table>
                <tr><td><?php _e('Email','ukmtheme'); ?></td><td>:&nbsp;<?php echo get_post_meta($post->ID, 'ut_expertise_email', true); ?></td></tr>
                <tr><td><?php _e('Phone','ukmtheme'); ?></td><td>:&nbsp;<?php echo get_post_meta($post->ID, 'ut_expertise_contact', true); ?></td></tr>
                <tr><td><?php _e('Biography','ukmtheme'); ?></td><td>:&nbsp;<?php echo get_post_meta($post->ID, 'ut_expertise_biography', true); ?></td></tr>
              </table>
              <section>
              <h4><?php _e('Summary','ukmtheme') ?></h4>
                <?php the_content(); ?>
              </section>
            </div>
        </div>
      <?php endwhile; else: ?>
          <p><?php _e( 'Sorry, no post matched your criteria.', 'ukmtheme' ); ?></p>
      <?php endif; ?>
    </section>
    <aside class="col-1-4">
      <?php get_template_part( 'sidebar', 'single' ); ?>
    </aside>
  </div><!-- content-wrap -->
</article>
<?php get_footer(); ?>