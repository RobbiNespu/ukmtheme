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
 *
 * Taxonomy: Publication Category
 */
get_header(); ?>
<article class="wrap">
  <div class="pure-g pure-g-r content">
    <section class="pure-u-3-4 article">
    <h2 class="content-title"><?php single_cat_title(); ?></h2>
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <div class="pure-u-1-1 ut-publication-archive-wrap">
          <div class="pure-u-3-10 article ut-publication">
          <?php 
            $saved_data = get_post_meta($post->ID,'ut_publication_cover',true);
            echo '<img src="'.$saved_data.'">';
          ?>
          </div>
          <div class="pure-u-7-10 ut-publication-detail-wrap">
            <div class="ut-publication-detail">
              <h3><?php the_title(); ?></h3>
              <h4><?php _e('Detail','ukmtheme') ?></h4>
              <table class="ut-publication-detail-table">
                <tr><td><?php _e('Author','ukmtheme'); ?></td><td>:&nbsp;<?php echo get_post_meta($post->ID, 'ut_publication_author', true); ?></td></tr>
                <tr><td><?php _e('Publisher','ukmtheme'); ?></td><td>:&nbsp;<?php echo get_post_meta($post->ID, 'ut_publication_publisher', true); ?></td></tr>
                <tr><td><?php _e('Year','ukmtheme'); ?></td><td>:&nbsp;<?php echo get_post_meta($post->ID, 'ut_publication_year', true); ?></td></tr>
                <tr><td><?php _e('Number of Pages','ukmtheme'); ?></td><td>:&nbsp;<?php echo get_post_meta($post->ID, 'ut_publication_pages', true); ?></td></tr>
                <tr><td><?php _e('Reference/Download','ukmtheme'); ?></td><td>:&nbsp;<a href="<?php echo get_post_meta($post->ID, 'ut_publication_reference', true); ?>"><?php _e('Click here','ukmtheme') ?></a></td></tr>
              </table>
              <a href="<?php echo get_permalink(); ?>"><button class="uk-button uk-button-small uk-button-primary"><?php _e('Read More','ukmtheme'); ?></button></a>
              </div>
          </div>
        </div>
      <?php endwhile; else: ?>
        <p><?php _e( 'Sorry, no post matched your criteria.', 'ukmtheme' ); ?></p>
      <?php endif; ?>
      <p><?php get_template_part( 'templates/content', 'paginate' ); ?></p>
    </section>
    <aside class="pure-u-1-4">
      <?php if (dynamic_sidebar( 'sidebar-2' )) : else : ?><?php endif; ?>
    </aside>
  </div>
</article>
<?php get_footer(); ?>