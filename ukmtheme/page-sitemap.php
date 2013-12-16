<?php
/**
 *
 * Template Name: Sitemap
 *
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
<article class="wrap">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <h1 class="content-title"><?php the_title(); ?></h1>
        <div class="content">
            <?php echo do_shortcode('[ukmtheme-sitemap]'); ?>
        </div>   
        <?php endwhile; else: ?>
            <p><?php _e( 'Sorry, no page matched your criteria.', 'ukmtheme' ); ?></p>
    <?php endif; ?>
</article>
<?php get_footer(); ?>