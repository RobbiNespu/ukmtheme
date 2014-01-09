/*!
 * @link http://www.ukm.my/template
 *
 * @package WordPress
 * @subpackage ukmtheme
 * @since 4.0
 *
 * @author Jamaludin Rajalu
 *
 * Font Resizer
 *
 */
$(document).ready(function(){
  $( ".reset_btn" ).click(function() {
    $( ".ut_text" ).removeClass( "ut_text_plus ut_text_minus");
    return false;
  });
  
  $( ".ut_text_plus" ).click(function() {
    $( ".ut_text" ).toggleClass( "snd_color" );
    return false;
  });
  
  $( ".ut_text_minus" ).click(function() {
    $( ".ut_text" ).toggleClass( "trd_color" );
    return false;
  });

});