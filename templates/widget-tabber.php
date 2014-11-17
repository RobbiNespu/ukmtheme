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
  'post_type'       => 'tab',
  'posts_per_page'  => 6,
  'orderby'         => 'menu_order', 
  'order'           => 'ASC' 
);
$tabber = new WP_Query( $args );
?>

<script type="text/javascript">
$(document).ready(function () {
  $('#responsive-tabs').responsiveTabs();
});
</script>

<div id="responsive-tabs">
  <ul>
    <?php while ( $tabber->have_posts() ) : $tabber->the_post(); ?>
      <li><a href="#tab-<?php echo get_the_ID(); ?>"><?php the_title(); ?></a></li>
    <?php endwhile; ?>
  </ul>

  <?php while ( $tabber->have_posts() ) : $tabber->the_post(); ?>
  <div id="tab-<?php echo get_the_ID(); ?>">
    <h3><?php the_title(); ?></h3>
    <p><?php the_content(); ?></p>
  </div>
  <?php endwhile; ?>

</div>