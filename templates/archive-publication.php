<?php
/**
 *
 * @link http://www.ukm.my/template
 * @package ukmtheme
 * @version 6.x.x
 * @author Jamaludin Rajalu
 *
 */
get_header();

  $publication = new WP_Query( array( 
    'post_type'       => 'publication',
    'posts_per_page'  => 10,
  ));

?>
<article class="wrap">
  <div class="pure-g pure-g-r content">
    <section class="pure-u-3-4 article">
    <h2 class="content-title"><?php _e( 'Publication', 'ukmtheme' ); ?></h2>
      <?php if ( $publication->have_posts() ) : while ( $publication->have_posts() ) : $publication->the_post(); ?>
        <div class="pure-g ut-publication-archive-wrap">
          <div class="pure-u-3-10 article ut-publication">
            <?php
              $pub_cover = get_post_meta($post->ID,'ut_publication_cover',true);
              if ( $pub_cover ) { ?>
              <img src="<?php echo $pub_cover; ?>" alt="">
              <?php }

              else { ?>
              <img src="<?php echo get_template_directory_uri(); ?>/img/placeholder_publication.png">
              <?php }
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
              </div><!--.ut-publication-detail-->
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
  </div><!-- content-wrap -->
</article>
<?php get_footer(); ?>