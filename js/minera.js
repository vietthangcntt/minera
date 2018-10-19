(function ($) {
    $(document).ready(function() {
        jQuery('.quantity').each(function() {
            var spinner = jQuery(this),
            input = spinner.find('input[type="numbe"]'),
            btnUp = spinner.find('#inc-button'),
            btnDown = spinner.find('#dec-button'),
            min = input.attr('min'),
            max = input.attr('max');
            btnUp.click(function(e) {
                e.preventDefault();
                var oldValue = parseFloat(input.val());
                if (oldValue > max) {
                    var newVal = oldValue;
                } else {
                    var newVal = oldValue + 1;
                }
                var newVal = oldValue + 1;

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
    });

    $(document).ready(function() {
         jQuery('.slider-for').slick({
          slidesToShow: 1,
          slidesToScroll: 1,
          arrows: false,
          fade: true,
          asNavFor: '.slider-nav'
        });
         console.log($('.slider-for'));
        $('.slider-nav').slick({
          slidesToShow: 3,
          slidesToScroll: 1,
          asNavFor: '.slider-for',
          dots: true,
          centerMode: true,
          focusOnSelect: true
        });
    });
})(jQuery);