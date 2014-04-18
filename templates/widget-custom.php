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

$args = array( 'post_type' => 'news', 'posts_per_page' => 4 );
$loop = new WP_Query( $args );

?>
<div class="uk-panel uk-panel-box uk-panel-box-secondary widgets-wrap">
  <div class="col-2-3">
    <div class="uk-panel widgets-annc">
      <?php if (dynamic_sidebar( 'sidebar-5' )) : else : ?><?php endif; ?>
    </div><!--.widgets-annc-->
  </div><!--.col-2-3-->
  <div class="col-1-3">
    <?php //get_template_part( 'templates/widget','event-vertical' ); ?>
    <?php if (dynamic_sidebar( 'sidebar-1' )) : else : ?><?php endif; ?>
  </div><!--.col-1-3-->
</div><!--.widgets-wrap-->