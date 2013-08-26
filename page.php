<?php
/**
 * The template for displaying posts in the Aside post format
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
get_header();
?>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
<article class="container">
	<h2><?php the_title(); ?></h2>
	<?php the_content(); ?>
</article>
<?php endwhile; ?>
	<?php get_footer(); ?>