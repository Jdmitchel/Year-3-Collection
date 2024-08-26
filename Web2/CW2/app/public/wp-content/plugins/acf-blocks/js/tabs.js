(function($){
    var initializeBlock = function( $block ) {

        $block.find('.acfb_tab_content').hide();
        $block.find('.acfb_tab_content:first').show();
        $block.find('ul li:first').addClass('active');

        $block.find('ul li a').click(function(){
        $block.find('ul li').removeClass('active');
        $block.find(this).parent().addClass('active');
        var currentTab = $block.find(this).attr('href');
        $block.find('.acfb_tab_content').hide();            
        $block.find(currentTab).show();
        return false;
        });     
    }

    $(document).ready(function(){
        $('.acfb_tabs_block').each(function(){
            initializeBlock( $(this) );
        });
    });

    if( window.acf ) {
        window.acf.addAction( 'render_block_preview/type=acfb-tabs', initializeBlock );
    }
})(jQuery);