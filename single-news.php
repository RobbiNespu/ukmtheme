<?php
/**
 * @link http://www.ukm.my/template
 * @link http://codex.wordpress.org/Post_Types
 *
 * @package WordPress
 * @subpackage ukmtheme
 * @since 4.0
 *
 * @author Jamaludin Rajalu
 */
get_header(); ?>
<div id="content" class="wrap site-content" role="main">

<?php while ( have_posts() ) : the_post(); ?>
    
    <h1><?php the_title(); ?></h1>
    <article>
        <?php the_content(); ?>
    </article>
    
<?php endwhile; ?>

</div>
<?php get_footer(); ?>