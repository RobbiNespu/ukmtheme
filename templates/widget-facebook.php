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
 * Widgets: Facebook Like Box
 */
?>

<div class="uk-panel uk-panel-box uk-panel-box-secondary widgets-wrap">
  <div class="col-1-1">
    <iframe src="//www.facebook.com/plugins/likebox.php?href=<?php echo get_option('ukmtheme_facebook'); ?>&amp;width=900&amp;height=258&amp;colorscheme=light&amp;show_faces=true&amp;header=false&amp;stream=false&amp;show_border=false" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:100%; height:258px;" allowTransparency="true"></iframe>
  </div>
</div>