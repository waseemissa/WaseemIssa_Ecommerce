(function ($) {
  'use strict';

  //  Count Up
  function counter() {
    var oTop;
    if ($('.counter').length !== 0) {
      oTop = $('.counter').offset().top - window.innerHeight;
    }
    if ($(window).scrollTop() > oTop) {
      $('.counter').each(function () {
        var $this = $(this),
          countTo = $this.attr('data-count');
        $({
          countNum: $this.text()
        }).animate({
          countNum: countTo
        }, {
          duration: 1000,
          easing: 'swing',
          step: function () {
            $this.text(Math.floor(this.countNum));
          },
          complete: function () {
            $this.text(this.countNum);
          }
        });
      });
    }
  }
  $(window).on('scroll', function () {
    counter();
  });

  // bottom to top (used)
  $('#top').click(function () {
    $('html, body').animate({
      scrollTop: 0
    }, 'slow');
    return false;
  });
  // bottom to top




  $(document).on('ready', function () {

    // Nice Select
    $('select').niceSelect();



    // -----------------------------
    // Button Active Toggle
    // -----------------------------
    $('.btn-group > .btn').click(function () {
      $(this).find('i').toggleClass('btn-active');
    });
    /***ON-LOAD***/
    jQuery(window).on('load', function () {

    });

  });

  // niceSelect

  $('select:not(.ignore)').niceSelect();







  // tooltip
  $(function () {
    $('[data-toggle="tooltip"]').tooltip();
  });





})(jQuery);