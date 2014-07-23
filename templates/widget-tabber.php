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
$(document).ready(function() {
  $('#utTabs').carouFredSel({
    circular: false,
    items: 1,
    width: '100%',
    height: 'auto',
    auto: false,
    pagination: {
      container: '#utTabsPager',
      anchorBuilder: function( nr ) {
        return '<a href="#">' + $(this).find('h3').text() + '</a>';
      }
    }
  });
});
</script>

<div id="utTab_wrapper">
<div id="utTabsPager"></div>
  <div id="utTabs">
  <?php while ( $tabber->have_posts() ) : $tabber->the_post(); ?>
    <div id="<?php echo get_the_ID(); ?>">
    <h3><?php the_title(); ?></h3>
    <p><?php the_content(); ?></p>
  </div>
  <?php endwhile; ?>
  </div>
</div>