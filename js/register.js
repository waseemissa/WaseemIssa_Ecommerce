(function ($) {

  // bottom to top (used)
  $('#top').click(function () {
    $('html, body').animate({
      scrollTop: 0
    }, 'slow');
    return false;
  });
  // bottom to top

  $('#first_name').hover(function(){
    $(this).attr("placeholder", "At least 3 characters");
  });

  $('#last_name').hover(function(){
    $(this).attr("placeholder", "At least 3 characters");
  });

  $('#email').hover(function(){
    $(this).attr("placeholder", "name@example.com");
  });

  $('#date_of_birth').hover(function(){
    $(this).attr("placeholder", "d-m-Y");
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