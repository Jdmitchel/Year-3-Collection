(function($){

    var initializeBlock = function( $block ) {

		$block.find(".acfb_accordion_content").first().css('display', 'block');
		var link = $block.find("a");

		// On clicking of the links do something.
		$block.find(link).on('click', function(e) {

		    e.preventDefault();

		    var a = $block.find(this).attr("href");

		    $block.find(a).slideDown('fast');

		    //$(a).slideToggle('fast');
		    $block.find(".acfb_accordion_content").not(a).slideUp('fast');
		    
		});



    	$block.find('.acfb_toggle_btn').click(function () {
		  $block.find('.acfb_toggle_content').toggle()
		});
    }

    $(document).ready(function(){
        $('.acfb_accordion').each(function(){
            initializeBlock( $(this) );
        });
    });

    if( window.acf ) {
        window.acf.addAction( 'render_block_preview/type=acfb-accordion', initializeBlock );
    }

})(jQuery);