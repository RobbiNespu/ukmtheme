<?php
/**
 * @link http://www.ukm.my/template
 * @link http://codex.wordpress.org/Function_Reference/get_post_type_archive_link
 * @link http://codex.wordpress.org/Function_Reference/post_type_archive_title
 *
 * @package WordPress
 * @subpackage ukmtheme
 * @since 4.0
 *
 * @author Jamaludin Rajalu
 */
 get_header();
?>
<article class="wrap">
  <div class="pure-g pure-g-r content">
    <section class="pure-u-3-4 article">
    <h2><?php _e( 'Gallery', 'ukmtheme' ) ; ?>&nbsp;:&nbsp;<?php single_cat_title(); ?></h2>

      <div class="uk-panel widgets-annc">

      <?php while ( have_posts() ) : the_post(); ?>

        <div class="ut-news-list clearfix">
            <div class="pure-u-1-5 ut-news-thumb">
            <?php
              $gal_cover = get_post_meta($post->ID,'ut_gallery_cover',true);
              if ( $gal_cover ) { ?>
              <img src="<?php echo $gal_cover; ?>" alt="">
              <?php }

              else { ?>
              <img src="<?php echo get_template_directory_uri(); ?>/img/placeholder_gallery.png">
              <?php }
            ?>
            </div>
            <div class="pure-u-4-5 ut-news-content">
                <a href="<?php echo get_permalink(); ?>"><h3 class="ut-news-title"><?php the_title(); ?></h3></a>
                <div class="ut-news-detail">
                <p><?php _e('Date:&nbsp;','ukmtheme'); ?><?php echo get_post_meta($post->ID, 'ut_gallery_date', true); ?><br/>
                <?php _e('Photo by:&nbsp;','ukmtheme'); ?><?php echo get_post_meta($post->ID, 'ut_gallery_photographer', true); ?></p>
                </div>
            </div>
        </div>

          <?php endwhile ?>

      </div>
      <p><?php get_template_part( 'templates/content', 'paginate' ); ?></p>
    </section>
    <aside class="pure-u-1-4">
       <?php if (dynamic_sidebar( 'sidebar-2' )) : else : ?><?php endif; ?>
    </aside>
  </div>
</article>
<?php get_footer(); ?>