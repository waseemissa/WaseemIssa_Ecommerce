(function ($) {

    // bottom to top 
    $('#top').click(function () {
      $('html, body').animate({
        scrollTop: 0
      }, 'slow');
      return false;
    });
    // bottom to top
  
  
    $('#email').hover(function(){
      $(this).attr("placeholder", "name@example.com");
    });
    
    $("#password").hover(function(){
      $(this).attr("placeholder", "at least 8 characters");
    });

    //hints
  
    //show errors
    
  
    $('.alert').alert();
  
    $("#btn-submit").click(function(){
      $('.alert').alert('close')
    });
  
  })(jQuery);