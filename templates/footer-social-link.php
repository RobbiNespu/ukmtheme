<?php
/**
 *
 * @link http://www.ukm.my/template
 * @package ukmtheme
 * @version 6.x.x
 * @author Jamaludin Rajalu
 *
 */

  $hide_facebook    = get_option('ukmtheme_facebook_hide');
  $hide_twitter     = get_option('ukmtheme_twitter_hide');
  $hide_youtube     = get_option('ukmtheme_youtube_hide');
  $hide_instagram   = get_option('ukmtheme_instagram_hide');
  $hide_rss         = get_option('ukmtheme_rss_hide');?>

<div class="footer-social-link-wrap">
  <ul class="footer-social-icon">
    <li class="<?php echo $hide_rss; ?>"><a class="uk-icon-rss-square" href="<?php bloginfo('rss_url'); ?>" title="RSS"></a></li>
    <li class="<?php echo $hide_facebook; ?>"><a class="uk-icon-facebook-square" href="<?php echo get_option('ukmtheme_facebook'); ?>" title="Facebook"></a></li>
    <li class="<?php echo $hide_twitter; ?>"><a class="uk-icon-twitter-square" href="<?php echo get_option('ukmtheme_twitter'); ?>" title="Twitter"></a></li>
    <li class="<?php echo $hide_youtube; ?>"><a class="uk-icon-youtube-square" href="<?php echo get_option('ukmtheme_youtube'); ?>" title="Youtube"></a></li>
    <li class="<?php echo $hide_instagram; ?>"><a class="uk-icon-instagram" href="<?php echo get_option('ukmtheme_instagram'); ?>" title="Intsagram"></a></li>
  </ul>
</div>