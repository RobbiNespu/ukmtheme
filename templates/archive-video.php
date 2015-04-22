<?php
/**
 *
 * @link http://www.ukm.my/template
 * @package ukmtheme
 * @version 6.x.x
 * @author Jamaludin Rajalu
 *
 * @link http://codex.wordpress.org/Function_Reference/get_post_type_archive_link
 * @link http://codex.wordpress.org/Function_Reference/post_type_archive_title
 *
 */
 get_header();
?>
<article class="wrap">
  <div class="pure-g pure-g-r content">
    <section class="pure-u-1 article-video">
    <h2 class="content-title"><?php _e( 'Video', 'ukmtheme' ) ; ?></h2>

      <div class="uk-panel video-archive-wrap">

      <?php while ( have_posts() ) : the_post(); ?>

        <div class="pure-u-1-3 video-archive">
          <?php echo apply_filters( 'the_content', get_post_meta( get_the_ID(), $prefix . 'ut_video_url', true ) ); ?>
           <a class="video-archive-title" href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a>
        </div>
        <?php endwhile ?>
      </div>
      <p><?php get_template_part( 'templates/content', 'paginate' ); ?></p>
    </section>
  </div>
</article>
<?php get_footer(); ?>