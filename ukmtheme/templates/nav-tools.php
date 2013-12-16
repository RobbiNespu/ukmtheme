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
<div class="click"><i class="uk-icon-cog tools-toggle"></i></div>
    <div class="expand">
        <ul class="tools-item">
            <li><?php echo __( 'Size:', 'ukmtheme' ); ?></li>
            <li><i class="uk-icon-zoom-in tools-color-3rd"></i></li>
            <li><i class="uk-icon-font tools-color-3rd"></i></li>
            <li><i class="uk-icon-zoom-out tools-color-3rd"></i></li>
            <li><?php echo __( 'Theme:', 'ukmtheme' ); ?></li>
            <li><i class="uk-icon-circle tools-color-1st"></i></li>
            <li><i class="uk-icon-circle tools-color-2nd"></i></li>
            <li><i class="uk-icon-circle tools-color-3rd"></i></li>
        </ul>
    </div>
</div>