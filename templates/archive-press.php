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

  $press = new WP_Query( array( 
    'post_type'       => 'press', 
    'posts_per_page'  => 10,
  ));
  
?>
<article class="wrap">
  <div class="pure-g pure-g-r content">
    <section class="pure-u-3-4 article">
    <h2><?php echo __( 'Press Release', 'ukmtheme' ) ?></h2>
    <ol>
      <?php if ( $press->have_posts() ) : while ( $press->have_posts() ) : $press->the_post(); ?>
        <li class="press-list">
          <?php echo get_post_meta($post->ID,'ut_press_date',true); ?><br/>
          <a href="<?php echo get_post_meta($post->ID,'ut_press_file',true); ?>"><?php the_title(); ?></a>
        </li>
        <?php endwhile; else: ?>
            <p><?php _e( 'Sorry, no page matched your criteria.', 'ukmtheme' ); ?></p>
      <?php endif; ?>
      <p><?php get_template_part( 'templates/content', 'paginate' ); ?></p>
    </ol>
    </section>
    <aside class="pure-u-1-4">
      <?php if (dynamic_sidebar( 'sidebar-2' )) : else : ?><?php endif; ?>
    </aside>
  </div><!-- content-wrap -->
</article>
<?php get_footer(); ?>