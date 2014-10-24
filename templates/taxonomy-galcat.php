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
  <div class="content clearfix">
    <section class="col-3-4 article">
    <h2><?php _e( 'Gallery', 'ukmtheme' ) ; ?>&nbsp;:&nbsp;<?php single_cat_title(); ?></h2>

      <div class="uk-panel widgets-annc">

      <?php while ( have_posts() ) : the_post(); ?>

        <div class="ut-news-list clearfix">
            <div class="col-1-5 ut-news-thumb">
            <?php
                  $saved_data = get_post_meta($post->ID,'ut_gallery_cover',true);
                  echo '<img src="'.$saved_data.'">'
            ?>
            </div>
            <div class="col-4-5 ut-news-content">
                <a href="<?php echo get_permalink(); ?>"><h3 class="ut-news-title"><?php the_title(); ?></h3></a>
                <div class="ut-news-detail">
                <p><?php _e('Date:&nbsp;','ukmtheme'); ?><?php echo get_post_meta($post->ID, 'ut_gallery_date', true); ?><br/>
                <?php _e('Photo by:&nbsp;','ukmtheme'); ?><?php echo get_post_meta($post->ID, 'ut_gallery_photographer', true); ?></p>
                </div>
            </div><!--col-4-5-->
        </div><!--.ut-news .clearfix-->

          <?php endwhile ?>

      </div><!--.widgets-annc-->
      <p><?php get_template_part( 'templates/content', 'paginate' ); ?></p>
    </section><!--.col-1-1-->
    <aside class="col-1-4">
        <?php get_template_part( 'sidebar', 'page' ); ?>
    </aside>
  </div>
</article>
<?php get_footer(); ?>