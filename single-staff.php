<?php
/**
 * @link http://www.ukm.my/template
 *
 * @package WordPress
 * @subpackage ukmtheme
 * @since 4.0
 *
 * @author Jamaludin Rajalu
 */
get_header(); ?>
<h1><?php the_title(); ?></h1>
<p><?php the_post_thumbnail( ); ?></p>
<p><?php echo get_the_term_list( $post->ID, 'department', 'Department: ', ', ', '' ); ?></p>
<?php the_content(); ?>
<?php get_footer(); ?>