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
$ukmtheme = wp_get_theme();
?>
</div><!--.page-wrap-->
<footer class="site-footer">
<div class="wrap pure-g pure-r">
  <div class="pure-u-2-3">
    <?php 
      wp_nav_menu(
        array(
        'theme_location'    => 'footer',
        'menu'              => 'Footer Navigation',
        'menu_class'        => 'footer-menu',
      )); 
    ?>
  </div>
  <div class="pure-u-1-3">
    <?php get_template_part( 'templates/footer', 'social-link' ); ?>
  </div>
</div>
<div class="wrap pure-g pure-g-r">
  <div class="pure-u-1-2 footer-left-content">   
    <?php if (dynamic_sidebar( 'sidebar-6' )) : else : endif; ?>
  </div>
  <div class="pure-u-1-2 footer-right-content">
    &nbsp;
  </div>
</div>
<div class="wrap">
  <p class="ut_copyright_statement"><?php _e( 'Copyright &copy;&nbsp;', 'ukmtheme' ); ?><?php echo date( 'Y' ); ?>&nbsp;<?php _e( 'The National University of Malaysia', 'ukmtheme' ); ?></p>
  <p class="ut_bestview_statement"><?php _e( 'This website can be access using mobile phone web browser and best view with any modern desktop web browser with minimum resolution 1024x768.', 'ukmtheme' ); ?><br/><?php get_template_part( 'templates/visitor', 'counter' ); ?></p>
  <p class="tukm-theme-version"><a href="http://www.ukm.my/template/" title="" target="_blank"><?php echo "v" . $ukmtheme->get( 'Version' ); ?></a></p>
</div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
