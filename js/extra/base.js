$(document).ready(function(){

  // FitVids Plugin
  
  $("aside, .content-article, .video-archive").fitVids();

  // Tabber

  $('#responsive-tabs').responsiveTabs();

  // News Ticker: Appreciations

  $('#newsList').newsTicker({

    interval: "60000",
    effect: "fadeIn"

  });

  // owl-carousel

  $("#owl-main-slider").owlCarousel({

    slideSpeed : 300,
    paginationSpeed : 400,
    singleItem: true,
    autoPlay: 7000,
    pagination: false

  });

  // Fles Slider 2

  $('.flexslider').flexslider( {

    animation: "fade"

  });

  // CSS Menu

  $('#cssmenu').prepend('<div id="menu-button">Menu</div>');
  $('#cssmenu #menu-button').on('click', function(){
    var menu = $(this).next('ul');
    if (menu.hasClass('open')) {
      menu.removeClass('open');
    }
    else {
      menu.addClass('open');
    }
  });

  // Style Switcher Control

  $( ".reset_btn" ).click(function() {
    $( ".ut_color" ).removeClass( "snd_color trd_color");
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