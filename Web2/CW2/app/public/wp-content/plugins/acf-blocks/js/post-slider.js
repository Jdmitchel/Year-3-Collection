(function($){
     
    var initializeBlock = function( $block ) {

        function Bool(v) {
            return v === 1 ? true : false;
        }


        var acfb_loop = $($block).find(".swiper-container").data('loop');
        var acfb_psdelay = $($block).find(".swiper-container").data('psdelay') * 1000;
        var acfb_pseffect = $($block).find(".swiper-container").data('pseffect');
        var acfb_pscenterslide = $($block).find(".swiper-container").data('pscenterslide');
        var acfb_psgutter = $($block).find(".swiper-container").data('psgutter');
        var acfb_psautoplay = $($block).find(".swiper-container").data('psautoplay');
        var acfb_psautoheight = $($block).find(".swiper-container").data('psautoheight');
        var acfb_psslidesperview = $($block).find(".swiper-container").data('psslidesperview');


         if(acfb_psslidesperview > 1 && acfb_pseffect === 'fade'){
            acfb_pseffect = 'slide';
        } else if(acfb_psslidesperview > 1 && acfb_pseffect === 'cube'){
            acfb_pseffect = 'slide';
        } else if(acfb_psslidesperview > 1 && acfb_pseffect === 'flip'){
            acfb_pseffect = 'slide';
        }


        var acfbCrossFade = '';
         if(acfb_pseffect === 'fade'){
            acfbCrossFade = 'true';
        }


        $acfb_post_slider_script = $block.find('.swiper-container');

        var postSliderObj = {

            direction: 'horizontal',
            centeredSlides: Bool(acfb_pscenterslide),
            slidesPerView: acfb_psslidesperview,
            autoHeight: Bool(acfb_psautoheight),
            spaceBetween: acfb_psgutter,
            effect: acfb_pseffect,
            simulateTouch: true,
            loop: true,
            autoplay: {
            delay: acfb_psdelay,
            disableOnInteraction: false,
            },
            fadeEffect: {
             crossFade: acfbCrossFade
            },


           // Responsive breakpoints
            breakpoints: {
             767: {
              slidesPerView: 1,
             }
            },

            // If we need pagination
            pagination: {
              el: '.swiper-pagination',
              clickable: true,
            },

           // Navigation arrows
            navigation: {
                nextEl: '.acfb_button_next',
                prevEl: '.acfb_button_prev',
            },


        }

        if ( postSliderObj.slidesPerView === 1 ) {
            delete postSliderObj.spaceBetween
        }


        if (!Bool(acfb_psautoplay)) {
            delete postSliderObj.autoplay;
        }

        if (!Bool(acfb_psautoheight)) {
            delete postSliderObj.autoHeight;
        }


        var postSlider = new Swiper($acfb_post_slider_script, postSliderObj);  
        postSlider.update();
    }

    // Initialize each block on page load (front end).
    $(document).ready(function(){

        $('.acfb_posts_slider_block').each(function(){
            initializeBlock( $(this) );
        });

        const $container = $(this).find(".swiper-container")

        // console.log($container.data());
    });

    // Initialize dynamic block preview (editor).
    if( window.acf ) {
        window.acf.addAction( 'render_block_preview/type=acfb-post-slider', initializeBlock );
    }

})(jQuery);