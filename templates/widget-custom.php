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
<div class="pure-g pure-g-r uk-panel uk-panel-box uk-panel-box-secondary widgets-wrap">
  <div class="pure-g pure-g-r">
    <div class="pure-u-2-3">
      <div class="uk-panel widgets-annc">
        <?php if (dynamic_sidebar( 'sidebar-5' )) : else : ?><?php endif; ?>
      </div>
    </div>
    <div class="pure-u-1-3">
      <?php if (dynamic_sidebar( 'sidebar-1' )) : else : ?><?php endif; ?>
    </div>
  </div>
</div>