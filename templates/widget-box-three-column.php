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
 *
 * Widgets: Three Column
 */
?>
<div class="uk-panel uk-panel-box uk-panel-box-secondary widgets-wrap">
  <div class="pure-g pure-g-r">
    <?php if (dynamic_sidebar( 'sidebar-3' )) : else : ?><?php endif; ?>
  </div>
</div>