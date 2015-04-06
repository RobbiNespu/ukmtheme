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
<?php
  $appreciation = new WP_Query( array( 
    'post_type'       => 'appreciation', 
    'posts_per_page'  => 10,
  ));
?>
<article class="wrap">
  <div class="pure-g pure-g-r content">
    <section class="pure-u-3-4 article">
    <h2><?php echo __( 'Appreciation', 'ukmtheme' ) ?></h2>
    <div class="content-article">
      <?php if ( $appreciation->have_posts() ) : while ( $appreciation->have_posts() ) : $appreciation->the_post(); ?>
        <div class="pure-u-1-1 appreciation-block">
          <blockquote><?php global $post; echo get_post_meta($post->ID, 'ut_appreciation_greeting', true); ?></blockquote>
          <span style="float:right;text-align:right;">
            <i class="uk-icon-gift"></i>&nbsp;<?php global $post; echo get_post_meta($post->ID, 'ut_appreciation_ptj', true); ?><br/>
            <?php global $post; echo get_post_meta($post->ID, 'ut_appreciation_date', true); ?>
          </span>
        </div>
        <?php endwhile; else: ?>
            <p><?php _e( 'Sorry, no page matched your criteria.', 'ukmtheme' ); ?></p>
      <?php endif; ?>
      <p><?php get_template_part( 'templates/content', 'paginate' ); ?></p>
      </div>
    </section>
    <aside class="pure-u-1-4">
      <?php if (dynamic_sidebar( 'sidebar-2' )) : else : ?><?php endif; ?>
    </aside>
  </div><!-- content-wrap -->
</article>
<?php get_footer(); ?>