// Main color

jQuery(document).ready(function($) {
  $('#colorpicker').hide();
  $('#colorpicker').farbtastic('#color');

  $('#color').click(function() {
    $('#colorpicker').fadeIn();
  });

  $(document).mousedown(function() {
    $('#colorpicker').each(function() {
      var display = $(this).css('display');
      if ( display == 'block' )
        $(this).fadeOut();
    });
  });
});

jQuery(document).ready(function($) {
  $('#colorpickerMainComb').hide();
  $('#colorpickerMainComb').farbtastic('#colorMainComb');

  $('#colorMainComb').click(function() {
    $('#colorpickerMainComb').fadeIn();
  });

  $(document).mousedown(function() {
    $('#colorpickerMainComb').each(function() {
      var display = $(this).css('display');
      if ( display == 'block' )
        $(this).fadeOut();
    });
  });
});

// Second color

jQuery(document).ready(function($) {
  $('#colorpickerSnd').hide();
  $('#colorpickerSnd').farbtastic('#colorSnd');

  $('#colorSnd').click(function() {
    $('#colorpickerSnd').fadeIn();
  });

  $(document).mousedown(function() {
    $('#colorpickerSnd').each(function() {
      var display = $(this).css('display');
      if ( display == 'block' )
        $(this).fadeOut();
    });
  });
});

jQuery(document).ready(function($) {
  $('#colorpickerSndComb').hide();
  $('#colorpickerSndComb').farbtastic('#colorSndComb');

  $('#colorSndComb').click(function() {
    $('#colorpickerSndComb').fadeIn();
  });

  $(document).mousedown(function() {
    $('#colorpickerSndComb').each(function() {
      var display = $(this).css('display');
      if ( display == 'block' )
        $(this).fadeOut();
    });
  });
});

// Third color

jQuery(document).ready(function($) {
  $('#colorpickerTrd').hide();
  $('#colorpickerTrd').farbtastic('#colorTrd');

  $('#colorTrd').click(function() {
    $('#colorpickerTrd').fadeIn();
  });

  $(document).mousedown(function() {
    $('#colorpickerTrd').each(function() {
      var display = $(this).css('display');
      if ( display == 'block' )
        $(this).fadeOut();
    });
  });
});

jQuery(document).ready(function($) {
  $('#colorpickerTrdComb').hide();
  $('#colorpickerTrdComb').farbtastic('#colorTrdComb');

  $('#colorTrdComb').click(function() {
    $('#colorpickerTrdComb').fadeIn();
  });

  $(document).mousedown(function() {
    $('#colorpickerTrdComb').each(function() {
      var display = $(this).css('display');
      if ( display == 'block' )
        $(this).fadeOut();
    });
  });
});