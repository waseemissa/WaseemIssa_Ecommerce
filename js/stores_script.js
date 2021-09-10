(function ($) {

    // bottom to top
    $('#top').click(function () {
      $('html, body').animate({
        scrollTop: 0
      }, 'slow');
      return false;
    });
      
  })(jQuery);