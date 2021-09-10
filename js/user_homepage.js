(function ($) {
    // bottom to top
    $('#top').click(function () {
        $('html, body').animate({
          scrollTop: 0
        }, 'slow');
        return false;
      });

      //add to cart

      $(".add_to_cart").on('click', function(){
        var product_id = $(this).val();
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function() {
        document.getElementById("#total_in_cart").innerHTML = this.responseText;
        } 
        xhttp.open("GET", "php/add_to_cart.php?pid="+product_id);
        xhttp.send();

      });

      //like product
      $(".like").on('click', function(){
        var product_id = $(this).val();
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function() {
        document.getElementById("#total_likes").innerHTML = this.responseText;
        } 
        xhttp.open("GET", "php/like_product.php?pid="+product_id);
        xhttp.send();

      });
        
    })(jQuery);