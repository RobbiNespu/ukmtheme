<?php
/**
 * @link http://www.ukm.my/template
 *
 * @package WordPress
 * @subpackage ukmtheme
 * @since 4.0
 *
 * @author Jamaludin Rajalu
 */
wp_footer(); ?>
</div><!--.page-wrap-->
<footer class="site-footer">
  <div class="wrap">
    <?php get_template_part( 'templates/footer', 'social-link' ); ?>
  </div>
  <div class="wrap copyright">
    <?php _e( 'Copyright &copy;', 'ukmtheme' ); ?>
    <?php echo date( 'Y' ); ?>
    <?php _e( 'The National University of Malaysia', 'ukmtheme' ); ?>        
  </div>
  <div class="wrap">
    <div class="copyright-detail-link-wrap">
    <?php 
      wp_nav_menu(array(
        'theme_location'    => 'footer',
        'menu'              => 'Footer Navigation',
        'menu_class'        => 'copyright-detail-link',
      )); 
    ?>
    </div>
  </div>
  <div class="wrap copyright best-view">
    <?php _e( 'Best view: Viewable with any modern web browser (Desktop &amp; Mobile)', 'ukmtheme' ); ?>
  </div>
  <div class="wrap visitor-counter">
    <?php get_template_part( 'templates/visitor', 'counter' ); ?>
  </div>
  <div class="wrap">
    <p style="text-align:center;"><?php _e('Powered by','ukmtheme'); ?>&nbsp;<a href="http://www.ukm.my/template/" target="_blank">UKMTheme</a></p>
  </div>
</footer>
  <script type="text/javascript">
    WebFontConfig = {
      google: { families: [ 'Open+Sans:300italic,600italic,300,600:latin' ] }
    };
    (function() {
      var wf = document.createElement('script');
      wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
        '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
      wf.type = 'text/javascript';
      wf.async = 'true';
      var s = document.getElementsByTagName('script')[0];
      s.parentNode.insertBefore(wf, s);
    })();
  </script>
</body>
</html>