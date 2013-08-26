<?php
/**
 * @package WordPress
 * @subpackage UKM_Theme
 * @since UKM Theme 1.0
 *
 * Recent Post with Thumbnail.
 */
?>
<div class="col-2-3">
<h3><?php __('Recent Post', 'ukmtheme'); ?></h3> 
<div class="text-widget"> 
	<div class="fimage-post"> 
	<ul> 
	<?php $the_query = new WP_Query('showposts=5&orderby=post_date&order=DESC'); ?>
	<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
		<li>
		<?php if ( function_exists("has_post_thumbnail") && has_post_thumbnail() ) { the_post_thumbnail(array(50,50), array("class" => "")); } ?>
		<a href="<?php the_permalink(); ?>"><h4><?php echo substr(strip_tags(get_the_title()),0,26); ?></h4></a>
		<?php echo substr(strip_tags(get_the_content()),0,62); ?>
		</li>
	<?php endwhile;?>
	</ul>
	</div>
</div>
</div>