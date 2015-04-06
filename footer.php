<?php
/**
 *
 * @link http://www.ukm.my/template
 * @package ukmtheme
 * @version 6.x.x
 * @author Jamaludin Rajalu
 *
 */

$counter = get_option( 'ukmtheme_visitor_counter' );

?>
</div><!--.page-wrap-->
<footer class="site-footer">
<div class="wrap pure-g pure-r">
  <div class="pure-u-2-3">
    <?php 
      wp_nav_menu(
        array(
        'theme_location'  => 'footer',
        'menu'            => 'Footer Navigation',
        'menu_class'      => 'footer-menu',
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
  <p class="ut_bestview_statement"><?php _e( 'This site can be accessed using smart devices. Best viewed using the latest versions of web browsers on a minimum resolution of 1024x768.<br/>For further explanation can be read <a href="http://browsehappy.com/" target="_blank">here</a>.', 'ukmtheme' ); ?></p>
  <p class="tukm-visitor-counter"><?php get_template_part( 'templates/visitor', $counter ); ?></p>
  <p class="tukm-theme-version"><a href="http://www.ukm.my/template/" title="" target="_blank"><?php echo "v" . wp_get_theme()->get( 'Version' ); ?></a></p>
</div>
</footer>
<?php wp_footer(); ?>
</body>
</html>