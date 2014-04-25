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
    <div id="fb-root"></div>
    <script>
      (function(d, s, id){
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1";
          fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));

      // Wrap all Boxes and resize
      $(window).bind("load resize", function()
      {
          $('.fb-like-box').each(function()
          {
              // Change 'data-width' attribute
              $(this).attr('data-width', $(this).parent().width());

              FB.XFBML.parse();
          });
      });
    </script>

    <div class="fb-like-box" data-href="<?php echo get_option('ukmtheme_facebook'); ?>" data-colorscheme="light" data-show-faces="true" data-header="false" data-stream="false" data-show-border="false"></div>

  </div>
</div>