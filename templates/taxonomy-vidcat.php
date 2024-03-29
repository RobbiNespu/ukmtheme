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
    <section class="article-video">
    <h2 class="content-title"><?php _e( 'Video', 'ukmtheme' ); ?>:&nbsp;<?php single_cat_title(); ?></h2>

      <div class="uk-panel video-archive-wrap">

      <?php while ( have_posts() ) : the_post(); ?>

        <div class="pure-u-1-3 video-archive">
          <?php echo apply_filters( 'the_content', get_post_meta( get_the_ID(), $prefix . 'ut_video_url', true ) ); ?>
           <a class="video-archive-title" href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a>
        </div>
        <?php endwhile ?>
      </div>
      <p><?php get_template_part( 'templates/content', 'paginate' ); ?></p>
    </section><!--.pure-u-1-1-->
  </div>
</article>
<?php get_footer(); ?>