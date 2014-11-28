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
 *
 * @link http://codex.wordpress.org/Function_Reference/paginate_links
 */
get_header();

  $paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;

  $news = new WP_Query( array( 
    'post_type'       => 'news',
    'posts_per_page'  => 7,
    'paged'           => $paged,
  ));
  
?>
<article class="wrap">
  <div class="content clearfix">
    <section class="col-3-4 article">
    <h2><?php _e('Latest News','ukmtheme'); ?></h2>

      <div class="uk-panel widgets-annc">

      <?php while ( $news->have_posts() ) : $news->the_post(); ?>

        <div class="ut-news-list clearfix">
            <div class="col-1-5 ut-news-thumb">
            <?php
              if ( has_post_thumbnail() ) {
                the_post_thumbnail();
              }
              else {
                echo '<img src="' . get_template_directory_uri() . '/assets/images/public/thumbnail.png?ver=6.3" />';
              }
            ?>
            </div>
            <div class="col-4-5 ut-news-content">
              <a href="<?php echo get_permalink(); ?>"><h4 class="ut-news-title"><?php the_title(); ?></h4></a>
              <div class="ut-news-detail">
                <?php the_excerpt(); ?>
              </div>
            </div>
        </div>

          <?php endwhile ?>

      </div>
    <p><?php get_template_part( 'templates/content', 'paginate' ); ?></p>
    </section><!--.col-1-1-->
    <aside class="col-1-4">
      <?php if (dynamic_sidebar( 'sidebar-2' )) : else : ?><?php endif; ?>
    </aside>
  </div>
</article>
<?php get_footer(); ?>