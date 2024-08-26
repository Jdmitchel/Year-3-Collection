(function($){
    var initializeBlock = function( $block ) {
    	$block.find('.acfb_toggle_title').click(function () {
		  $block.find('.acfb_toggle_content').slideToggle('fast');
		});
    }

    $(document).ready(function(){
        $('.acfb_toggle_block').each(function(){
            initializeBlock( $(this) );
        });
    });

    if( window.acf ) {
        window.acf.addAction( 'render_block_preview/type=acfb-toggle', initializeBlock );
    }
})(jQuery);