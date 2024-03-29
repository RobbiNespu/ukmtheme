<?php
/**
 * @link http://www.ukm.my/template
 * @link http://codex.wordpress.org/Post_Types
 *
 * @package WordPress
 * @subpackage ukmtheme
 * @since 4.0
 *
 * @author Jamaludin Rajalu
 */
 ?>
<div class="off-canvas-tools-wrap"><a href="#ut-tools" data-uk-offcanvas class="off-canvas-icon"><?php _e( 'Tools &amp; Languages', 'ukmtheme' ); ?></a></div>
<div id="ut-tools" class="uk-offcanvas">
  <div class="uk-offcanvas-bar uk-offcanvas-bar-flip ut-off-canvas">
  <p><?php _e( 'Press esc key to close', 'ukmtheme' ); ?></p>
    <h4><?php _e( 'Theme', 'ukmtheme' ); ?></h4>
    <ul class="btn_theme_list">
      <li class="btn_theme"><a href="#" style="background:<?php echo get_option('ukmtheme_mn_color'); ?>;" class="reset_btn"></a></li>
      <li class="btn_theme"><a href="#" style="background:<?php echo get_option('ukmtheme_snd_color'); ?>;" class="snd_btn"></a></li>
      <li class="btn_theme"><a href="#" style="background:<?php echo get_option('ukmtheme_trd_color'); ?>;" class="trd_btn"></a></li>
    </ul>
    <h4><?php _e( 'Font Size', 'ukmtheme' ); ?></h4>
    <ul id="text-resizer-controls" class="textresizer">
      <li><a href="#"><i class="uk-icon-minus-square"></i><?php _e('&nbsp;Small','ukmtheme'); ?></a></li>
      <li><a href="#"><i class="uk-icon-font"></i><?php _e('&nbsp;Reset','ukmtheme'); ?></a></li>
      <li><a href="#"><i class="uk-icon-plus-square"></i><?php _e('&nbsp;Large','ukmtheme'); ?></a></li>
    </ul>
    <?php
      $widget_google_translate = get_option( 'ukmtheme_google_trans' );
      $widget_polylang = get_option( 'ukmtheme_languages' );
      get_template_part( 'templates/widget', $widget_polylang );
      get_template_part( 'templates/widget', $widget_google_translate );
    ?>
  </div>
</div>