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
    $( ".ut_color" ).toggleClass("snd_color").removeClass("trd_color");
    return false;
  });
  
  $( ".trd_btn" ).click(function() {
    $( ".ut_color" ).toggleClass("trd_color").removeClass("snd_color");
    return false;
  });

});