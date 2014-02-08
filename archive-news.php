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
    <h1><?php echo get_option('ukmtheme_annc_head'); ?></h1>

      <div class="uk-panel widgets-annc">

      <?php while ( have_posts() ) : the_post(); ?>

        <div class="ut-news-list clearfix">
            <div class="col-1-5 ut-news-thumb">
            <?php
                if ( has_post_thumbnail() ) {
                  the_post_thumbnail();
                }
                else {
                  echo '<img src="' . get_template_directory_uri() . '/assets/images/public/thumbnail.svg?ver:6.1.1" />';
                }
            ?>
            </div>
            <div class="col-4-5 ut-news-content">
                <h4 class="ut-news-title"><?php the_title(); ?></h4>
                <div class="ut-news-detail">
                    <?php the_excerpt(); ?>
                </div><!--.ut-news-detail-->
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