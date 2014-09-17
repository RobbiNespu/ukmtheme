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
wp_footer(); ?>
</div><!--.page-wrap-->
<footer class="site-footer">

<div class="wrap pure-g pure-g-r">
  <div class="pure-u-1-2 footer-left-content">   
    <?php if (dynamic_sidebar( 'sidebar-6' )) : else : endif; ?>
  </div>
  <div class="pure-u-1-2 footer-right-content">
    <?php get_template_part( 'templates/footer', 'social-link' ); ?>
    <p class="visitor-counter"><?php get_template_part( 'templates/visitor', 'counter' ); ?></p>
    <p><?php _e( 'Copyright &copy;', 'ukmtheme' ); ?><?php echo date( 'Y' ); ?>&nbsp;<?php _e( 'The National University of Malaysia', 'ukmtheme' ); ?></p>
    <p><?php _e( 'Best view with any modern web browser (Desktop &amp; Mobile)', 'ukmtheme' ); ?></p>
    <div class="ut_phone_access_wrapper">
      <i class="uk-icon-mobile-phone ut_phone_access"></i>
      <span class="ut_phone_access_text"><?php _e( 'This website can be access using mobile phone', 'ukmtheme' ); ?></span>
    </div>
    <p><?php _e('Powered by','ukmtheme'); ?>&nbsp;<a href="http://www.ukm.my/template/" title="<?php echo $ukmtheme->get( 'Name' ) . " v" . $ukmtheme->get( 'Version' ); ?>" target="_blank">UKMTheme</a></p>
  </div>
</div>
<div class="wrap">
  <?php 
    wp_nav_menu(
      array(
      'theme_location'    => 'footer',
      'menu'              => 'Footer Navigation',
      'menu_class'        => 'footer-menu',
    )); 
  ?>
</div>
</footer>
<?php
  $google_analytics   = get_option('ukmtheme_google_analytics');
  get_template_part( 'templates/google', $google_analytics );
?>

</body>
</html>