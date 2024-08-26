 (function($){
    var initializeBlock = function( $block ) {

        const content_wrapper = $block.find(".acfb_ct_content_wrap");

        $block.find("#switch-id").change(function () {
            if ($(this).is(":checked")) {

                content_wrapper.addClass('two');
                content_wrapper.removeClass('one');

                // $(".acfb_ct_content_two").show();
                // $(".acfb_ct_content_one").hide();
            } else {

                content_wrapper.addClass('one');
                content_wrapper.removeClass('two');


                // $(".acfb_ct_content_two").hide();
                // $(".acfb_ct_content_one").show();
            }
        });
    }

    $(document).ready(function(){
        $('.acfb_content_toggle_block').each(function(){
            initializeBlock( $(this) );
        });
    });

    if( window.acf ) {
        window.acf.addAction( 'render_block_preview/type=acfb-content-toggle', initializeBlock );
    }
})(jQuery);








 // jQuery(document).ready(function($){


 // $(function () {
 //        $("#switch-id").change(function () {
 //            if ($(this).is(":checked")) {
 //                $(".acfb_ct_content_two").show();
 //                $(".acfb_ct_content_one").hide();
 //            } else {
 //                $(".acfb_ct_content_two").hide();
 //                $(".acfb_ct_content_one").show();
 //            }
 //        });
 //    });

 // });