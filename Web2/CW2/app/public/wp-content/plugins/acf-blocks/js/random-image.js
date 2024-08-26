(function($){

    var initializeBlock = function( $block ) {

 		var randomImage = $($block).find('.acfb_ri').data('random-image');
		var description = typeof randomImage !== 'undefined' ? randomImage.split(",") : [];

        var size = description.length;
        $($block).find('.acfb_random_image img').each(function() {
          var x = Math.floor(size * Math.random()); //move random inside loop
          if ($(this).hasClass("acfb_ri")) { //replace "img" with "this"
            $(this).attr("src", description[x]);
          }
        });

		// var size = description.length
		// var x = Math.floor(size*Math.random())
		// document.getElementById('random_image').src=description[x];

    }

    $(document).ready(function(){
        $('.acfb_random_image_block').each(function(){
            initializeBlock( $(this) );
        });
    });

    if( window.acf ) {
        window.acf.addAction( 'render_block_preview/type=acfb-random-image', initializeBlock );
    }

})(jQuery);