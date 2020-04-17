$(document).ready(function(){
    
  $("a").on('click', function(event) {


    if (this.hash !== "") {
        
        event.preventDefault();

      // Store hash
        var hash = this.hash;
        
        $('html, body').animate({
        scrollTop: $(hash).offset().top
        }, 800, function(){
   

        window.location.hash = hash;
      });
    } // End if
  });
});



$(document).on("scroll", function(){
    if($(window).width() > 1024){
        if(window.scrollY > 140){
            $("#navigation").css("top", "0px");
        }else{
            $("#navigation").css("top", (155 - window.scrollY));
        }
    }
});

jQuery('<div class="quantity-nav"><div class="quantity-button quantity-up">+</div><div class="quantity-button quantity-down">-</div></div>').insertAfter('.quantity input');
    jQuery('.quantity').each(function() {
      var spinner = jQuery(this),
        input = spinner.find('input[type="number"]'),
        btnUp = spinner.find('.quantity-up'),
        btnDown = spinner.find('.quantity-down'),
        min = input.attr('min'),
        max = input.attr('max');

      btnUp.click(function() {
        var oldValue = parseFloat(input.val());
        if (oldValue >= max) {
          var newVal = oldValue;
        } else {
          var newVal = oldValue + 1;
        }
        spinner.find("input").val(newVal);
        spinner.find("input").trigger("change");
      });

      btnDown.click(function() {
        var oldValue = parseFloat(input.val());
        if (oldValue <= min) {
          var newVal = oldValue;
        } else {
          var newVal = oldValue - 1;
        }
        spinner.find("input").val(newVal);
        spinner.find("input").trigger("change");
      });

    });