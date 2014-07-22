<?php
/**
 * @link http://www.ukm.my/template
 * @link http://codex.wordpress.org/Function_Reference/get_term_link
 *
 * @package WordPress
 * @subpackage ukmtheme
 * @since 4.0
 *
 * @author Jamaludin Rajalu
 */

$args = array( 
  'post_type' => 'tab',
  'posts_per_page' => 4 
);
$tab = new WP_Query( $args );

?>
<div class="tabber">
<?php while ( $tab->have_posts() ) : $tab->the_post(); ?>
  <div class="tabbertab">
    <h3><?php the_title(); ?></h3>
    <p><?php the_content(); ?></p>
  </div>
<?php endwhile; ?>
</div>