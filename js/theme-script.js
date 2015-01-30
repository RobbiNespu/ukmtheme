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

  $('.flexslider').flexslider( {

    animation: "fade",
    smoothHeight: true

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

  // News Scroller

  $("#news-scroller").liScroll();

  // Fancy Box

  $(".fancybox").fancybox();

  $("a[href$='.jpg'], a[href$='.png'], a[href$='.jpeg'], a[href$='.gif']").fancybox();


  $(".gallery a[href$='.jpg'], .gallery a[href$='.png'], .gallery a[href$='.jpeg'], .gallery a[href$='.gif']").attr('rel','gallery').fancybox();


  $(".video").fancybox({
    maxWidth        : 800,
    maxHeight       : 600,
    fitToView       : false,
    width           : '70%',
    height          : '70%',
    autoSize        : false,
    closeClick      : false,
    openEffect      : 'none',
    closeEffect     : 'none'
  });

  // Auto height div

  var currentTallest = 0,
     currentRowStart = 0,
     rowDivs = new Array(),
     $el,
     topPosition = 0;

  $('.news-portal-block-wrapper > li').each(function() {

   $el = $(this);
   topPostion = $el.position().top;
   
   if (currentRowStart != topPostion) {

     // we just came to a new row.  Set all the heights on the completed row
     for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
       rowDivs[currentDiv].height(currentTallest);
     }

     // set the variables for the new row
     rowDivs.length = 0; // empty the array
     currentRowStart = topPostion;
     currentTallest = $el.height();
     rowDivs.push($el);

   } else {

     // another div on the current row.  Add it to the list and check if it's taller
     rowDivs.push($el);
     currentTallest = (currentTallest < $el.height()) ? ($el.height()) : (currentTallest);

  }
   
  // do the last row
   for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
     rowDivs[currentDiv].height(currentTallest);
   }
   
  });​

  // jcarouseel: Event Slider

  var jcarousel = $('.jcarousel');

  jcarousel
  .on('jcarousel:reload jcarousel:create', function () {
    var width = jcarousel.innerWidth();

    if (width >= 600) {
      width = width / 3;
    } else if (width >= 350) {
      width = width / 2;
    }

    jcarousel.jcarousel('items').css('width', width + 'px');
  })
  
  .jcarousel({
    wrap: 'circular'
  });

  $('.jcarousel-control-prev')
  .jcarouselControl({
    target: '-=1'
  });

  $('.jcarousel-control-next')
  .jcarouselControl({
    target: '+=1'
  });

  $('.jcarousel-pagination')
  .on('jcarouselpagination:active', 'a', function() {
    $(this).addClass('active');
  })
  .on('jcarouselpagination:inactive', 'a', function() {
    $(this).removeClass('active');
  })
  .on('click', function(e) {
    e.preventDefault();
  })
  .jcarouselPagination({
    perPage: 1,
    item: function(page) {
      return '<a href="#' + page + '">' + page + '</a>';
    }
  });

  // Frequently asked questions

  $('.ut-faq .ut-faq-q').click(function(e){
    e.preventDefault();
    $(this).closest('li').find('.ut-faq-a').not(':animated').slideToggle();
  });

});