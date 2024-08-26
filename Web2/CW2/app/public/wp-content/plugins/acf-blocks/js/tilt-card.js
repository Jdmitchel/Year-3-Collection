(function($){
    var initializeBlock = function( $block ) {

      var acfb_tilt_max = $($block).find(".acfb_tilt_card").data('max');
      var acfb_tilt_perspective = $($block).find(".acfb_tilt_card").data('perspective');
      var acfb_tilt_speed = $($block).find(".acfb_tilt_card").data('speed');
      var acfb_tilt_scale = $($block).find(".acfb_tilt_card").data('scale');
      var acfb_tilt_glare_switch = $($block).find(".acfb_tilt_card").data('glare') === 1 ? true : false;


        $block.find(".acfb_tilt_card").tilt({

          maxTilt:        acfb_tilt_max,
          perspective:    acfb_tilt_perspective,   // Transform perspective, the lower the more extreme the tilt gets.
          easing:         "cubic-bezier(.03,.98,.52,.99)",    // Easing on enter/exit.
          scale:          acfb_tilt_scale,      // 2 = 200%, 1.5 = 150%, etc..
          speed:          acfb_tilt_speed,    // Speed of the enter/exit transition.
          transition:     true,   // Set a transition on enter/exit.
          disableAxis:    null,   // What axis should be disabled. Can be X or Y.
          reset:          true,   // If the tilt effect has to be reset on exit.
          glare:          acfb_tilt_glare_switch,  // Enables glare effect
          maxGlare:       1       // From 0 - 1.

        });

     }

    $(document).ready(function(){
        $('.acfb_tilt_card_block').each(function(){
            initializeBlock( $(this) );

        });
    });

    if( window.acf ) {
        window.acf.addAction( 'render_block_preview/type=acfb-tilt-card', initializeBlock );
    }
})(jQuery);