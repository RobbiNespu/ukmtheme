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
get_header(); ?>
<script type="text/javascript">
$(document).ready(function(){
  $('.ut-faq .ut-faq-q').click(function(e){
    e.preventDefault();
    $(this).closest('li').find('.ut-faq-a').not(':animated').slideToggle();
  });
});
</script>
<?php
  $faq = new WP_Query( array( 
    'post_type'       => 'faq', 
    'posts_per_page'  => -1, 
    'orderby'         => 'menu_order', 
    'order'           => 'ASC' 
  ));
?>
<article class="wrap">
  <div class="content clearfix">
    <section class="col-3-4 article">
    <h2><?php echo __( 'Frequently Asked Questions', 'ukmtheme' ) ?></h2>
    <h3 class="content-title"><?php single_cat_title(); ?></h3>
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
    <aside class="col-1-4">
      <?php get_template_part( 'sidebar', 'page' ); ?>
    </aside>
  </div><!-- content-wrap -->
</article>
<?php get_footer(); ?>