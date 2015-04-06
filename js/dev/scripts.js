( function( $ ) {

$(document).ready(function(){

  // FitVids Plugin
  
  $('aside, .content-article, .video-archive').fitVids();

  // Tabber

  $('#responsive-tabs').responsiveTabs({
    startCollapsed: 'accordion'
  });

  // News Ticker: Appreciations

  $('#newsList').newsTicker({

    interval: "60000",
    effect: "fadeIn"

  });

  // owl slider

  $('#owl-main-slider').owlCarousel({

    autoPlay: 10000,
    navigation : true,
    navigationText: ['<i class="uk-icon-angle-left"></i>','<i class="uk-icon-angle-right"></i>'],
    slideSpeed : 300,
    paginationSpeed : 400,
    pagination: false,
    singleItem:true

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


  // Frequently asked questions

  $('.ut-faq .ut-faq-q').click(function(e){
    e.preventDefault();
    $(this).closest('li').find('.ut-faq-a').not(':animated').slideToggle();
  });


  // Magnific Popup

  $('.gallery').magnificPopup({
    delegate: 'a',
    type: 'image',
    tLoading: 'Loading image #%curr%...',
    mainClass: 'mfp-img-mobile',
    gallery: {
      enabled: true,
      navigateByImgClick: true,
      preload: [0,1] // Will preload 0 - before current, and 1 after the current image
    },
    image: {
      tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
      titleSrc: function(item) {
        return item.el.attr('title');
      }
    }
  });

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


});

} )( jQuery );