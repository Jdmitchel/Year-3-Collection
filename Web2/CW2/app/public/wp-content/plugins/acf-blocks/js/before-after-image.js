(function($){

    var initializeBlock = function( $block ) {

     function Bool(v) {
        return v;
    }

	var acfb_ba_offset = $($block).find(".twentytwenty-container").data('offset');
    var acfb_ba_orientation = $($block).find(".twentytwenty-container").data('orientation');
    var acfb_ba_before_label = $($block).find(".twentytwenty-container").data('before-label');
    var acfb_ba_after_label = $($block).find(".twentytwenty-container").data('after-label');
    var acfb_ba_overlay = $($block).find(".twentytwenty-container").data('overlay');
    var acfb_ba_move_on_hover = $($block).find(".twentytwenty-container").data('move-on-hover');
    var acfb_ba_move_on_click = $($block).find(".twentytwenty-container").data('move-on-click');


	  $block.find(".twentytwenty-container").twentytwenty({
        default_offset_pct: acfb_ba_offset, // How much of the before image is visible when the page loads
        orientation: acfb_ba_orientation, // Orientation of the before and after images ('horizontal' or 'vertical')
        before_label: acfb_ba_before_label, // Set a custom before label
        after_label: acfb_ba_after_label, // Set a custom after label
        no_overlay: acfb_ba_overlay, //Do not show the overlay with before and after
        move_slider_on_hover: acfb_ba_move_on_hover, // Move slider on mouse hover?
        move_with_handle_only: false, // Allow a user to swipe anywhere on the image to control slider movement. 
        click_to_move: acfb_ba_move_on_click // Allow a user to click (or tap) anywhere on the image to move the slider to that location.
	  });

    }

    $(document).ready(function(){
        $('.acfb_before_after_block').each(function(){
            initializeBlock( $(this) );
        });

    });

    if( window.acf ) {
        window.acf.addAction( 'render_block_preview/type=acfb-before-after-image', initializeBlock );
    }

})(jQuery);

















// jQuery(function(){

//   jQuery(".twentytwenty-container").twentytwenty({
//     default_offset_pct: jQuery(".twentytwenty-container").data("offset"), // How much of the before image is visible when the page loads
//     orientation: jQuery(".twentytwenty-container").data("orientation"), // Orientation of the before and after images ('horizontal' or 'vertical')
//     before_label: jQuery(".twentytwenty-container").data("before-label"), // Set a custom before label
//     after_label: jQuery(".twentytwenty-container").data("after-label"), // Set a custom after label
//     no_overlay: jQuery(".twentytwenty-container").data("overlay"), //Do not show the overlay with before and after
//     move_slider_on_hover: jQuery(".twentytwenty-container").data("move-on-hover"), // Move slider on mouse hover?
//     move_with_handle_only: true, // Allow a user to swipe anywhere on the image to control slider movement. 
//     click_to_move: jQuery(".twentytwenty-container").data("move-on-click") // Allow a user to click (or tap) anywhere on the image to move the slider to that location.
//   });

// });


