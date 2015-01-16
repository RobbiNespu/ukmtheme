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
get_header();

  $faq = new WP_Query( array( 
    'post_type'       => 'faq', 
    'posts_per_page'  => -1, 
    'orderby'         => 'menu_order', 
    'order'           => 'ASC' 
  ));
  
?>
<article class="wrap">
  <div class="pure-g pure-g-r content">
    <section class="pure-u-3-4 article">
    <h2><?php echo __( 'Frequently Asked Questions', 'ukmtheme' ) ?></h2>
    <ol class="ut-faq">
      <?php if ( $faq->have_posts() ) : while ( $faq->have_posts() ) : $faq->the_post(); ?>
        <li class="ut-faq-list">
          <a href="#" class="ut-faq-q"><?php the_title(); ?></a>
          <div class="ut-faq-a">
            <?php the_content(); ?>
          </div>
        </li>
        <?php endwhile; else: ?>
            <p><?php _e( 'Sorry, no page matched your criteria.', 'ukmtheme' ); ?></p>
      <?php endif; ?>
    </ol>
    </section>
    <aside class="pure-u-1-4">
      <?php if (dynamic_sidebar( 'sidebar-2' )) : else : ?><?php endif; ?>
    </aside>
  </div><!-- content-wrap -->
</article>
<?php get_footer(); ?>