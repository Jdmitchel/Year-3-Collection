jQuery(document).ready(function($) {
  // Counter Number Jquery

  $(".acfb_counter_number").each(function() {
    $(this)
      .prop("Counter", 0)
      .animate(
        {
          Counter: $(this).text()
        },
        {
          duration: 4000,
          easing: "swing",
          step: function(now) {
            $(this).text(Math.ceil(now));
          }
        }
      );
  });

});
