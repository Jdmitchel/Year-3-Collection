//  jQuery(".acfb_image_accordion_item").hover(function () {
//     jQuery(this).addClass("acfb_image_accordion_active");
//     jQuery(this).css("flex", "3 1 0%"); 
//  }, function() { 
//     jQuery(this).css("flex", "1 1 0%"); 
//     jQuery(this).removeClass("acfb_image_accordion_active");
// });


(function($){

    var initializeBlock = function( $block ) {

    	$block.find('.acfb_image_accordion_item').hover(function () {
		  $(this).addClass("acfb_image_accordion_active");
		  $(this).css("flex", "3 1 0%");
		}, function() { 
     	  $(this).css("flex", "1 1 0%"); 
   		  $(this).removeClass("acfb_image_accordion_active");
		});
    }

    $(document).ready(function(){
        $('.acfb_image_accordion').each(function(){
            initializeBlock( $(this) );
        });
    });

    if( window.acf ) {
        window.acf.addAction( 'render_block_preview/type=acfb-image-accordion', initializeBlock );
    }

})(jQuery);