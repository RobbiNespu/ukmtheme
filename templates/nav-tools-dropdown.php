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
<script>
jQuery(document).ready(function(){
  $(".click").click(function(){
    
    var target = $(this).parent().children(".expand");
    $(target).slideToggle();
  });
});
</script>
<div class="tools-wrap">
  <div class="uk-button-dropdown uk-navbar-flip ut-tools-dropdown" data-uk-dropdown="">
  <div><i class="uk-icon-cog"></i>&nbsp;W3C</div>
    <div class="uk-dropdown uk-dropdown-flip ut-dropdown-tweak">
      <ul class="uk-nav uk-nav-dropdown ut-dropdown-tweak-list">
        <li class="uk-nav-header"><?php _e( 'Theme', 'ukmtheme' ) ?></li>
        <li><a href="#" class="reset_btn"><i class="uk-icon-circle tools-color-1st">&nbsp;Default</i></a></li>
        <li><a href="#" class="snd_btn"><i class="uk-icon-circle tools-color-2nd">&nbsp;Blue</i></a></li>
        <li><a href="#" class="trd_btn"><i class="uk-icon-circle tools-color-3rd">&nbsp;Black</i></a></li>
        <li class="uk-nav-divider"></li>
        <li class="uk-nav-header"><?php _e( 'Font Size', 'ukmtheme' ) ?></li>
        <li><i class="uk-icon-zoom-in">&nbsp;Large</i></li>
        <li><i class="uk-icon-font"></i>&nbsp;Reset</li>
        <li><i class="uk-icon-zoom-out">&nbsp;Small</i></li>
      </ul>
    </div>
  </div>
  <!-- LANGUAGES -->
  <div class="uk-button-dropdown uk-navbar-flip ut-tools-dropdown" data-uk-dropdown="">
  <div><i class="uk-icon-flag"></i>&nbsp;LANG</div>
    <div class="uk-dropdown uk-dropdown-flip ut-dropdown-tweak">
      <ul class="uk-nav uk-nav-dropdown">
        <li class="uk-nav-header"><?php _e( 'Language', 'ukmtheme' ) ?></li>
        <li><?php //echo do_shortcode( '[bogo]' ); ?>
          <ul><?php pll_the_languages();?></ul>
        </li>
      </ul>
    </div>
  </div>
</div>