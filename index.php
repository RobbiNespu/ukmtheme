<?php
/**
 * The template for displaying posts in the Aside post format
 *
 * @package WordPress
 * @subpackage UKM_Theme
 * @since UKM Theme 1.0
 */
get_header(); ?>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
<article class="col-1-1 article">

	<h2><?php the_title(); ?></h2>
	<?php the_content(); ?>
</article>
<?php endwhile; ?>
	<?php get_footer(); ?>