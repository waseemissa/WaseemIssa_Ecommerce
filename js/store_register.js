(function ($) {

    // bottom to top (used)
    $('#top').click(function () {
      $('html, body').animate({
        scrollTop: 0
      }, 'slow');
      return false;
    });
    // bottom to top
  
    $('#name').hover(function(){
      $(this).attr("placeholder", "At least 5 characters");
    });
  
    $('#email').hover(function(){
      $(this).attr("placeholder", "name@example.com");
    });

  
    $('#phone_number').hover(function(){
      $(this).attr("placeholder", "+961XXXXXXXX");
    });
  
    $("#address").hover(function(){
      $(this).attr("placeholder", "your full address");
    });
  
    $("#password_reg").hover(function(){
      $(this).attr("placeholder", "at least 8 characters");
    });
   
    $("#confirm_password_reg").hover(function(){
      $(this).attr("placeholder", "Should match password");
    });
  
    //hints
  
    //show errors
    
  
    $('.alert').alert();
  
    $("#btn-submit").click(function(){
      $('.alert').alert('close')
    });
  
  })(jQuery);