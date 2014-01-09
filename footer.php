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
$copyrightID = get_option('ukmtheme_copyright_id');
$contactID = get_option('ukmtheme_contact_id');
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
      <ul class="copyright-detail-link">
        <li><a href="<?php echo get_permalink($copyrightID); ?>"><?php _e( 'Copyright', 'ukmtheme' ); ?></a></li>
        <li><a href="<?php echo get_permalink($copyrightID); ?>"><?php _e( 'Disclaimer', 'ukmtheme' ); ?></a></li>
        <li><a href="<?php echo get_permalink($copyrightID); ?>"><?php _e( 'Privacy Policy', 'ukmtheme' ); ?></a></li>
        <li><a href="<?php echo get_permalink($copyrightID); ?>"><?php _e( 'Security Policy', 'ukmtheme' ); ?></a></li>
        <li><a href="<?php echo get_permalink($contactID); ?>"><?php _e( 'Contact Us', 'ukmtheme' ); ?></a></li>
        <li><?php _e( 'Last Update:&nbsp;', 'ukmtheme' ); ?><?php echo date( 'd/m/Y', strtotime("-3 days") ); ?></li>
      </ul>
    </div>
  </div>
  <div class="wrap copyright">
    <?php _e( 'Best view: Viewable with any modern web browser (Desktop &amp; Mobile)', 'ukmtheme' ); ?>
  </div>
  <div class="wrap visitor-counter">
    <?php get_template_part( 'templates/visitor', 'counter' ); ?>
  </div>
</footer>
</body>
</html>