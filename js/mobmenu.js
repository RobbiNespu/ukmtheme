/**
 *  Mobile Menu
 *  Version: 1.0
 *  http://cssmenumaker.com/menu/jquery-accordion-menu
 */

//$('#mobmenu ul ul li:odd').addClass('odd');
//$('#mobmenu ul ul li:even').addClass('even');
$('#mobmenu > ul > li > a').click(function() {
  $('#mobmenu li').removeClass('active');
  $(this).closest('li').addClass('active');	
  var checkElement = $(this).next();
  if((checkElement.is('ul')) && (checkElement.is(':visible'))) {
    $(this).closest('li').removeClass('active');
    checkElement.slideUp('normal');
  }
  if((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
    $('#mobmenu ul ul:visible').slideUp('normal');
    checkElement.slideDown('normal');
  }
  if($(this).closest('li').find('ul').children().length == 0) {
    return true;
  } else {
    return false;	
  }		
});