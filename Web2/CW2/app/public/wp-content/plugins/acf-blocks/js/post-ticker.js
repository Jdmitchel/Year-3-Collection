(function($){
     
    var initializeBlock = function( $block ) {

        var acfb_tickerdelay = $($block).find(".swiper-container").data('tickerdelay') * 1000;

        $acfb_post_ticker_slider_script = $block.find('.swiper-container');

          var postTickerSliderObj = {
            
            direction: 'horizontal',
            slidesPerView: 1,
            autoHeight: true,
            loop: true,
            autoplay: {
            delay: acfb_tickerdelay,
            },
          

            navigation: {
                nextEl: '.acfb-ticker-button-next',
                prevEl: '.acfb-ticker-button-prev',
            },

        }



        let mySwiper = new Swiper($acfb_post_ticker_slider_script, postTickerSliderObj);  

        mySwiper.update()

    }


    // Initialize each block on page load (front end).
    $(document).ready(function(){

        $('.acfb_post_ticker_block').each(function(){
            initializeBlock( $(this) );
        });
    });

    // Initialize dynamic block preview (editor).
    if( window.acf ) {
        window.acf.addAction( 'render_block_preview/type=acfb-post-ticker', initializeBlock );
    }

})(jQuery);