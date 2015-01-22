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
 ?>
<div class="footer-social-link-wrap">
  <ul class="footer-social-icon">
    <li><a class="uk-icon-rss-square" href="<?php bloginfo('rss_url'); ?>" title="RSS"></a></li>
    <li><a class="uk-icon-facebook-square" href="<?php echo get_option('ukmtheme_facebook'); ?>" title="Facebook"></a></li>
    <li><a class="uk-icon-twitter-square" href="<?php echo get_option('ukmtheme_twitter'); ?>" title="Twitter"></a></li>
    <li><a class="uk-icon-youtube-square" href="<?php echo get_option('ukmtheme_youtube'); ?>" title="Youtube"></a></li>
    <li><a class="uk-icon-instagram" href="<?php echo get_option('ukmtheme_instagram'); ?>" title="Intsagram"></a></li>
  </ul>
</div>