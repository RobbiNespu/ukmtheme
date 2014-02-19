<div class="off-canvas-tools-wrap"><a href="#ut-tools" data-uk-offcanvas class="off-canvas-icon"><i class="uk-icon-flag"></i>&nbsp;<i class="uk-icon-cogs"></i></a></div>
<div id="ut-tools" class="uk-offcanvas">
  <div class="uk-offcanvas-bar uk-offcanvas-bar-flip ut-off-canvas">
  <p><?php _e( 'Press esc key to close', 'ukmtheme' ); ?></p>
    <h4><?php _e( 'Theme', 'ukmtheme' ); ?></h4>
    <ul>
      <li><a href="#" class="reset_btn"><i class="uk-icon-circle" style="color:<?php echo get_option('ukmtheme_mn_color'); ?>;">&nbsp;</i><?php _e('Theme One','ukmtheme'); ?></a></li>
      <li><a href="#" class="snd_btn"><i class="uk-icon-circle" style="color:<?php echo get_option('ukmtheme_snd_color'); ?>;">&nbsp;</i><?php _e('Theme Two','ukmtheme'); ?></a></li>
      <li><a href="#" class="trd_btn"><i class="uk-icon-circle" style="color:<?php echo get_option('ukmtheme_trd_color'); ?>;">&nbsp;</i><?php _e('Theme Three','ukmtheme'); ?></a></li>
    </ul>
    <h4><?php _e( 'Font Size', 'ukmtheme' ); ?></h4>
    <script>
      $(document).ready(function () {
        $("#text-resizer-controls li a").textresizer({
          target: "body"
        });
      });
    </script>
    <ul id="text-resizer-controls" class="textresizer">
      <li><a href="#"><i class="uk-icon-minus-square"></i><?php _e('&nbsp;Small','ukmtheme'); ?></a></li>
      <li><a href="#"><i class="uk-icon-font"></i><?php _e('&nbsp;Reset','ukmtheme'); ?></a></li>
      <li><a href="#"><i class="uk-icon-plus-square"></i><?php _e('&nbsp;Large','ukmtheme'); ?></a></li>
    </ul>
  </div>
</div>