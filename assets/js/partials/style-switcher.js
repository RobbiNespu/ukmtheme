/*!
 * @link http://www.ukm.my/template
 *
 * @package WordPress
 * @subpackage ukmtheme
 * @since 4.0
 *
 * @author Jamaludin Rajalu
 *
 * Style Switcher
 *
 */

$(document).ready(function(){
  $( ".reset_btn" ).click(function() {
    $( ".ut_color, .ut_nav" ).removeClass( "snd_color trd_color");
    return false;
  });
  
  $( ".snd_btn" ).click(function() {
    $( ".ut_color" ).addClass("snd_color");
    return false;
  });
  
  $( ".trd_btn" ).click(function() {
    $( ".ut_color" ).addClass("trd_color");
    return false;
  });

});