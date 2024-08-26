<?php
// Register Blocks
add_action('acf/init', 'acfb_blocks_free');
function acfb_blocks_free() {

    // check function exists.
    if( function_exists('acf_register_block_type') ) {

        // register a testimonial block.
        acf_register_block_type(array(
            'name'              => 'acfb-testimonial',
            'mode'				=> 'preview',
            'title'             => __('Testimonial'),
            'description'       => __('Let others know what your clients or customers say about you.'),
            'render_callback'   => 'acf_blocks_template',
            'category'          => 'acfb-blocks',
            'icon'              => '<svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"></defs><title/><g data-name="22-chat" id="_22-chat"><polygon class="acfb_svg_icon" points="31 3 1 3 1 23 8 23 14 29 14 23 31 23 31 3"/><line class="acfb_svg_icon" x1="7" x2="25" y1="9" y2="9"/><line class="acfb_svg_icon" x1="7" x2="25" y1="13" y2="13"/><line class="acfb_svg_icon" x1="7" x2="25" y1="17" y2="17"/></g></svg>',
            'enqueue_assets' => function(){
			  wp_enqueue_style( 'acfb-blocks-css', plugin_dir_url( __FILE__ ) . 'css/acfblocks.css' );
			},
        ));

        // register a team block.
        acf_register_block_type(array(
            'name'              => 'acfb-team',
            'mode'				=> 'preview',
            'title'             => __('Team'),
            'description'       => __('Introduce your team to your site visitors in style.'),
            'render_callback'   => 'acf_blocks_template',
            'category'          => 'acfb-blocks',
            'icon'				=> '<svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><title/><g data-name="79-users" id="_79-users"><circle class="acfb_svg_icon" cx="16" cy="13" r="5"/><path class="acfb_svg_icon" d="M23,28A7,7,0,0,0,9,28Z"/><path class="acfb_svg_icon" d="M24,14a5,5,0,1,0-4-8"/><path class="acfb_svg_icon" d="M25,24h6a7,7,0,0,0-7-7"/><path class="acfb_svg_icon" d="M12,6a5,5,0,1,0-4,8"/><path class="acfb_svg_icon" d="M8,17a7,7,0,0,0-7,7H7"/></g></svg>',
            'enqueue_assets' => function(){
			  wp_enqueue_style( 'acfb-blocks-css', plugin_dir_url( __FILE__ ) . 'css/acfblocks.css' );
			},
        ));

        // register a multi buttons block.
        acf_register_block_type(array(
            'name'              => 'acfb-multibuttons',
            'mode'				=> 'preview',
            'title'             => __('Multi Buttons'),
            'description'       => __('Display multiple buttons inline with ease.'),
            'render_callback'   => 'acf_blocks_template',
            'category'          => 'acfb-blocks',
            'icon'              => '<svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title/><g data-name="36.option-memu" id="_36.option-memu"><rect class="acfb_svg_icon" height="4" width="4" x="1" y="10"/><rect class="acfb_svg_icon" height="4" width="4" x="10" y="10"/><rect class="acfb_svg_icon" height="4" width="4" x="19" y="10"/></g></svg>',
            'enqueue_assets' => function(){
			  wp_enqueue_style( 'acfb-blocks-css', plugin_dir_url( __FILE__ ) . 'css/acfblocks.css' );
			},
        ));

        // register a pricing box block.
        acf_register_block_type(array(
            'name'              => 'acfb-pricingbox',
            'mode'				=> 'preview',
            'title'             => __('Pricing Box'),
            'description'       => __('Display your plans and offers in style.'),
            'render_callback'   => 'acf_blocks_template',
            'category'          => 'acfb-blocks',
            'icon'              => '<svg height="512pt" viewBox="0 -47 512 512" width="512pt" xmlns="http://www.w3.org/2000/svg"><path d="m85.332031 145.859375v-43.800781c9.648438 2.433594 16.574219 10.882812 17.066407 20.820312 0 4.714844 3.820312 8.535156 8.535156 8.535156 4.710937 0 8.53125-3.820312 8.53125-8.535156-.652344-19.355468-14.988282-35.507812-34.132813-38.460937v-7.617188c0-4.714843-3.820312-8.535156-8.53125-8.535156-4.714843 0-8.535156 3.820313-8.535156 8.535156v7.617188c-19.140625 2.949219-33.476563 19.105469-34.132813 38.460937.65625 19.359375 14.992188 35.511719 34.132813 38.460938v43.804687c-9.648437-2.433593-16.574219-10.886719-17.066406-20.824219 0-4.714843-3.820313-8.535156-8.53125-8.535156-4.714844 0-8.535157 3.820313-8.535157 8.535156.65625 19.359376 14.992188 35.511719 34.132813 38.460938v7.617188c0 4.714843 3.820313 8.535156 8.535156 8.535156 4.710938 0 8.53125-3.820313 8.53125-8.535156v-7.617188c19.144531-2.949219 33.480469-19.101562 34.132813-38.460938-.652344-19.359374-14.988282-35.511718-34.132813-38.460937zm-34.132812-22.980469c.496093-9.9375 7.421875-18.386718 17.066406-20.820312v41.644531c-9.644531-2.4375-16.570313-10.886719-17.066406-20.824219zm34.132812 82.265625v-41.644531c9.925781 1.988281 17.066407 10.703125 17.066407 20.824219 0 10.121093-7.140626 18.835937-17.066407 20.824219zm0 0"/><path d="m298.667969 109.226562c0 4.714844 3.820312 8.535157 8.53125 8.535157 4.714843 0 8.535156-3.820313 8.535156-8.535157 0-26.597656-22.304687-48.613281-51.199219-52.300781v-14.257812c0-4.714844-3.824218-8.535157-8.535156-8.535157s-8.535156 3.820313-8.535156 8.535157v14.257812c-28.894532 3.6875-51.199219 25.703125-51.199219 52.300781 0 26.597657 22.304687 48.617188 51.199219 52.308594v71.554688c-18.386719-1.878906-32.773438-16.683594-34.132813-35.117188 0-4.710937-3.820312-8.53125-8.53125-8.53125-4.714843 0-8.535156 3.820313-8.535156 8.53125 0 26.597656 22.304687 48.613282 51.199219 52.300782v14.261718c0 4.710938 3.824218 8.53125 8.535156 8.53125s8.535156-3.820312 8.535156-8.53125v-14.257812c28.894532-3.691406 51.199219-25.703125 51.199219-52.300782 0-26.601562-22.304687-48.617187-51.199219-52.304687v-71.558594c18.386719 1.875 32.773438 16.679688 34.132813 35.113281zm-85.335938 0c1.359375-18.433593 15.746094-33.234374 34.132813-35.113281v70.230469c-18.386719-1.878906-32.773438-16.683594-34.132813-35.117188zm85.335938 88.746094c-1.359375 18.433594-15.746094 33.234375-34.132813 35.113282v-70.230469c18.386719 1.882812 32.773438 16.683593 34.132813 35.117187zm0 0"/><path d="m426.667969 161.339844v43.804687c-9.648438-2.433593-16.574219-10.882812-17.066407-20.820312 0-4.710938-3.820312-8.535157-8.535156-8.535157-4.710937 0-8.53125 3.824219-8.53125 8.535157.652344 19.359375 14.988282 35.511719 34.132813 38.460937v7.613282c0 4.714843 3.820312 8.535156 8.53125 8.535156 4.714843 0 8.535156-3.820313 8.535156-8.535156v-7.617188c19.140625-2.949219 33.476563-19.101562 34.132813-38.460938-.65625-19.359374-14.992188-35.511718-34.132813-38.460937v-43.800781c9.648437 2.433594 16.574219 10.882812 17.066406 20.820312 0 4.714844 3.820313 8.535156 8.53125 8.535156 4.714844 0 8.535157-3.820312 8.535157-8.535156-.65625-19.355468-14.992188-35.507812-34.132813-38.460937v-7.617188c0-4.714843-3.820313-8.535156-8.535156-8.535156-4.710938 0-8.53125 3.820313-8.53125 8.535156v7.617188c-19.144531 2.949219-33.480469 19.105469-34.132813 38.460937.652344 19.359375 14.988282 35.511719 34.132813 38.460938zm34.132812 22.980468c-.492187 9.9375-7.417969 18.386719-17.066406 20.820313v-41.640625c9.648437 2.433594 16.574219 10.882812 17.066406 20.820312zm-34.132812-82.261718v41.644531c-9.648438-2.4375-16.574219-10.886719-17.066407-20.824219.492188-9.9375 7.417969-18.386718 17.066407-20.820312zm0 0"/><path d="m494.933594 25.601562h-128v-8.535156c-.011719-9.421875-7.644532-17.0546872-17.066406-17.066406h-187.734376c-9.421874.0117188-17.054687 7.644531-17.066406 17.066406v8.535156h-128c-9.421875.007813-17.0546872 7.644532-17.066406 17.066407v221.867187c.0117188 9.417969 7.644531 17.054688 17.066406 17.066406h128v8.53125c.011719 9.421876 7.644532 17.054688 17.066406 17.066407h187.734376c9.421874-.011719 17.054687-7.644531 17.066406-17.066407v-8.53125h128c9.421875-.011718 17.054687-7.648437 17.066406-17.066406v-221.867187c-.011719-9.421875-7.644531-17.058594-17.066406-17.066407zm-477.867188 238.933594v-221.867187h128v221.867187zm145.066406 25.597656v-273.066406h187.734376v17.066406l.007812 238.894532-.007812.039062.007812.039063v17.027343zm332.800782-25.597656h-128v-221.867187h128zm0 0"/><path d="m222.382812 362.15625c-5-4.992188-13.097656-4.992188-18.097656 0l-34.132812 34.128906c-3.660156 3.660156-4.757813 9.164063-2.777344 13.945313 1.984375 4.78125 6.648438 7.902343 11.824219 7.902343h68.265625c5.175781-.003906 9.839844-3.121093 11.820312-7.902343 1.980469-4.777344.886719-10.28125-2.769531-13.941407zm-32.882812 38.910156 23.832031-23.832031 23.835938 23.832031zm0 0"/><path d="m341.332031 358.398438h-68.265625c-5.175781.003906-9.835937 3.121093-11.816406 7.902343s-.890625 10.285157 2.765625 13.945313l34.136719 34.132812c5 4.988282 13.097656 4.988282 18.097656 0l34.132812-34.128906c3.660157-3.660156 4.753907-9.164062 2.773438-13.949219-1.980469-4.78125-6.648438-7.898437-11.824219-7.902343zm-34.132812 40.902343-23.832031-23.835937h47.667968zm0 0"/><path d="m119.464844 298.667969h-85.332032c-4.710937 0-8.53125 3.820312-8.53125 8.53125 0 4.714843 3.820313 8.535156 8.53125 8.535156h85.332032c4.714844 0 8.535156-3.820313 8.535156-8.535156 0-4.710938-3.820312-8.53125-8.535156-8.53125zm0 0"/><path d="m315.734375 341.332031c4.710937 0 8.53125-3.820312 8.53125-8.53125 0-4.714843-3.820313-8.535156-8.53125-8.535156h-119.46875c-4.710937 0-8.53125 3.820313-8.53125 8.535156 0 4.710938 3.820313 8.53125 8.53125 8.53125zm0 0"/><path d="m477.867188 298.667969h-85.332032c-4.714844 0-8.535156 3.820312-8.535156 8.53125 0 4.714843 3.820312 8.535156 8.535156 8.535156h85.332032c4.710937 0 8.53125-3.820313 8.53125-8.535156 0-4.710938-3.820313-8.53125-8.53125-8.53125zm0 0"/></svg>',
            'enqueue_assets' => function(){
			  wp_enqueue_style( 'acfb-blocks-css', plugin_dir_url( __FILE__ ) . 'css/acfblocks.css' );
			},
        ));

        // register a Star Rating block.
        acf_register_block_type(array(
            'name'              => 'acfb-starrating',
            'mode'				=> 'preview',
            'title'             => __('Star Rating'),
            'description'       => __('Add start ratings anywhere easily.'),
            'render_callback'   => 'acf_blocks_template',
            'category'          => 'acfb-blocks',
            'icon'				=> '<svg id="Outlined" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><title/><g id="Fill"><path d="M28.61,11.67H20l-2.66-8.2a1.39,1.39,0,0,0-2.64,0L12,11.67H3.39a1.39,1.39,0,0,0-.82,2.51l7,5.07L6.89,27.46a1.39,1.39,0,0,0,1.32,1.82A1.43,1.43,0,0,0,9,29l7-5.07L23,29a1.43,1.43,0,0,0,.81.27,1.39,1.39,0,0,0,1.32-1.82l-2.66-8.21,7-5.07A1.39,1.39,0,0,0,28.61,11.67Zm-7.34,6-1.17.86.44,1.38,2.09,6.41-5.45-4L16,21.46l-1.18.86-5.45,4,2.09-6.41.44-1.38-1.17-.86-5.45-4h8.19l.45-1.38L16,5.89l2.08,6.4.45,1.38h8.19Z"/></g></svg>',
            'enqueue_assets' => function(){
			  wp_enqueue_style( 'acfb-blocks-css', plugin_dir_url( __FILE__ ) . 'css/acfblocks.css' );
			},
        ));

        // register a Progress Bar block.
        acf_register_block_type(array(
            'name'              => 'acfb-progressbar',
            'mode'				=> 'preview',
            'title'             => __('Progress Bar'),
            'description'       => __('Show your progress using percentage defined progress bars.'),
            'render_callback'   => 'acf_blocks_template',
            'category'          => 'acfb-blocks',
            'icon'				=> '<svg width="455.14px" height="455.14px" enable-background="new 0 0 455.138 455.139" version="1.1" viewBox="0 0 455.138 455.139" xml:space="preserve" xmlns="http://www.w3.org/2000/svg">
    <path d="m0 141.65v171.83h455.14v-171.83h-455.14zm432.72 149.42h-410.31v-127h410.31v127h-5e-3zm-328.43-19.606h-59.766v-89.652h59.767v89.652zm89.653 0h-59.765v-89.652h59.765v89.652zm93.387 0h-59.768v-89.652h59.768v89.652z"/>
    </svg>',
            'enqueue_assets' => function(){
			  wp_enqueue_style( 'acfb-blocks-css', plugin_dir_url( __FILE__ ) . 'css/acfblocks.css' );
			},
        ));

		// register a Counter Number block.
        acf_register_block_type(array(
            'name'              => 'acfb-counternumber',
            'mode'				=> 'preview',
            'title'             => __('Counter Number'),
            'description'       => __('Display stats with animated counter numbers.'),
            'render_callback'   => 'acf_blocks_template',
            'category'          => 'acfb-blocks',
            'icon'				=> '<svg id="Outlined" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><title/><g id="Fill"><path d="M16.71,22.29l-1.42,1.42L17.59,26H16A10,10,0,0,1,8.93,8.93L7.51,7.51A12,12,0,0,0,16,28h1.59l-2.3,2.29,1.42,1.42L20,28.41a2,2,0,0,0,0-2.82Z"/><path d="M16,4H14.41l2.3-2.29L15.29.29,12,3.59a2,2,0,0,0,0,2.82l3.29,3.3,1.42-1.42L14.41,6H16a10,10,0,0,1,7.07,17.07l1.42,1.42A12,12,0,0,0,16,4Z"/></g></svg>',
            'enqueue_assets' => function(){
			  wp_enqueue_style( 'acfb-blocks-css', plugin_dir_url( __FILE__ ) . 'css/acfblocks.css' );
			  wp_enqueue_script( 'acfb-blocks-js', plugin_dir_url( __FILE__ ) . 'js/frontend.js', array('jquery'), '', false );
			},
        ));

		// register a Price List block.
        acf_register_block_type(array(
            'name'              => 'acfb-pricelist',
            'mode'				=> 'preview',
            'title'             => __('Price List'),
            'description'       => __('Display price list for any product easily.'),
            'render_callback'   => 'acf_blocks_template',
            'category'          => 'acfb-blocks',
            'icon'				=> '<svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title/><g data-name="6.list-menu" id="_6.list-menu"><line class="acfb_svg_icon" x1="1" x2="4" y1="6" y2="6"/><line class="acfb_svg_icon" x1="1" x2="4" y1="12" y2="12"/><line class="acfb_svg_icon" x1="1" x2="4" y1="18" y2="18"/><line class="acfb_svg_icon" x1="8" x2="23" y1="6" y2="6"/><line class="acfb_svg_icon" x1="8" x2="23" y1="12" y2="12"/><line class="acfb_svg_icon" x1="8" x2="23" y1="18" y2="18"/></g></svg>',
            'enqueue_assets' => function(){
			  wp_enqueue_style( 'acfb-blocks-css', plugin_dir_url( __FILE__ ) . 'css/acfblocks.css' );
			},
        ));

        // register a Click To Tweet block.
        acf_register_block_type(array(
            'name'              => 'acfb-clicktotweet',
            'mode'				=> 'preview',
            'title'             => __('Click To Tweet'),
            'description'       => __('Add a tweet-able quote to let your reader tweet with 1-click.'),
            'render_callback'   => 'acf_blocks_template',
            'category'          => 'acfb-blocks',
            'icon'				=> '<svg enable-background="new 0 0 511.271 511.271" version="1.1" viewBox="0 0 511.271 511.271" xml:space="preserve" xmlns="http://www.w3.org/2000/svg">
        <path d="m508.34 94.243c-2.603-2.603-6.942-3.471-10.414-2.603l-17.356 6.075c10.414-12.149 17.356-25.166 21.695-37.315 1.736-4.339 0.868-7.81-1.736-10.414-2.603-2.603-6.942-3.471-10.414-1.736-24.298 10.414-45.125 19.092-62.481 24.298 0 0.868-0.868 0-1.736 0-13.885-7.81-47.729-25.166-72.027-25.166-61.614 0.868-111.08 52.936-111.08 116.28v3.471c-90.251-17.356-139.72-43.39-193.52-99.797l-8.676-8.678-5.207 10.414c-29.505 56.407-8.678 107.61 25.166 142.32-15.62-2.603-26.034-7.81-35.58-15.62-3.471-2.603-7.81-3.471-12.149-0.868-3.471 1.736-5.207 6.942-4.339 11.281 12.149 40.786 42.522 73.763 75.498 93.722-15.62 0-28.637-1.736-41.654-10.414-3.471-1.736-8.678-1.736-12.149 0.868s-5.207 6.942-3.471 11.281c15.62 44.258 45.993 67.688 94.59 73.763-25.166 14.753-58.142 26.902-109.34 27.77-5.207 0-9.546 3.471-11.281 7.81-1.736 5.207 0 9.546 3.471 13.017 31.241 25.166 100.66 39.919 186.58 39.919 152.73 0 277.7-136.24 277.7-303.73v-2.603c19.092-9.546 34.712-27.77 42.522-52.936 0.867-3.472-1e-3 -7.811-2.604-10.414zm-52.068 49.464l-5.207 1.736v14.753c0 157.94-117.15 286.37-260.34 286.37-78.97 0-131.9-13.017-160.54-26.902 59.878-4.339 94.59-23.431 121.49-44.258l21.695-15.62h-26.034c-49.464 0-79.837-13.885-97.193-46.861 15.62 5.207 32.108 5.207 50.332 4.339 6.942-0.868 13.885-0.868 20.827-0.868l2.603-17.356c-32.976-9.546-72.027-39.051-91.119-78.969 17.356 7.81 36.447 9.546 53.803 9.546h26.902l-21.694-15.621c-18.224-13.017-72.027-59.01-45.993-124.96 55.539 54.671 108.48 79.837 203.93 97.193l10.414 1.736v-24.298c0-53.803 41.654-98.061 93.722-98.929 19.959-0.868 52.936 17.356 62.481 22.563 5.207 2.603 10.414 3.471 15.62 1.736 13.017-4.339 28.637-10.414 45.993-17.356-7.81 13.017-18.224 25.166-32.108 36.448-3.471 2.603-4.339 7.81-2.603 12.149s6.942 6.075 11.281 4.339l33.844-11.281c-6.075 11.28-15.621 24.297-32.109 30.371z"/>
            </svg>',
            'enqueue_assets' => function(){
			  wp_enqueue_style( 'acfb-blocks-css', plugin_dir_url( __FILE__ ) . 'css/acfblocks.css' );
			},
        ));


        // register a Post block.
        acf_register_block_type(array(
            'name'              => 'acfb-posts',
            'mode'              => 'preview',
            'title'             => __('Posts'),
            'description'       => __('Display a grid or list of your blog posts.'),
            'render_callback'   => 'acf_blocks_template',
            'category'          => 'acfb-blocks',
            'icon'              => '<svg enable-background="new 0 0 512 512" version="1.1" viewBox="0 0 512 512" xml:space="preserve" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0,30v452h512V30H0z M482,452H30V120h452V452z M482,90H30V60h452V90z"/>
                    <path d="M271,160v252h181V160H271z M422,382H301V190h121V382z"/>
                    <rect x="60" y="160" width="181" height="30"/>
                    <rect x="60" y="220" width="121" height="30"/>
                    <rect x="60" y="300" width="181" height="30"/>
                    <rect x="60" y="360" width="121" height="30"/>
            </svg>',
            'enqueue_assets' => function(){
              wp_enqueue_style( 'acfb-blocks-css', plugin_dir_url( __FILE__ ) . 'css/acfblocks.css' );
            },
        ));

        // register a Photo Collage block.
        acf_register_block(array(
          'name'              => 'acfb-photocollage',
          'mode'              => 'preview',
          'title'             => __('Photo Collage'),
          'description'       => __('Display beautiful photo collage using pre-made templates.'),
          'render_callback'   => 'acf_blocks_template',
          'category'          => 'acfb-blocks',
          'icon'              => '<svg enable-background="new 0 0 140.637 140.637" version="1.1" viewBox="0 0 140.64 140.64" xml:space="preserve" xmlns="http://www.w3.org/2000/svg">
          <path d="m138.14 140.61h-135.64c-1.381 0-2.5-1.119-2.5-2.5v-135.59c0-1.381 1.119-2.5 2.5-2.5h135.64c1.381 0 2.5 1.119 2.5 2.5v135.59c0 1.381-1.119 2.5-2.5 2.5zm-50.637-5h48.091v-17.599h-48.091v17.599zm-53.138 0h48.138v-17.599h-48.138v17.599zm-29.362 0h24.362v-17.599h-24.362v17.599zm106.27-22.599h24.317v-17.598h-24.317v17.598zm-26.273 0h21.273v-17.598h-48.136v17.599h26.863zm-53.138 0h21.274v-17.598h-48.136v17.599h26.862zm76.911-22.598h26.817v-17.599h-48.09v17.598h21.273zm-53.136 0h26.863v-17.599h-48.138v17.598h21.275zm-50.637 0h24.362v-17.599h-24.362v17.599zm106.27-22.599h24.317v-17.598h-24.317v17.598zm-26.273 0h21.273v-17.598h-48.136v17.599h26.863zm-53.138 0h21.274v-17.598h-48.136v17.599h26.862zm76.911-22.598h26.817v-17.599h-48.09v17.599h21.273zm-53.136 0h26.863v-17.599h-48.138v17.599h21.275zm-50.637 0h24.362v-17.599h-24.362v17.599zm106.27-22.599h24.317v-17.598h-24.317v17.598zm-26.273 0h21.273v-17.598h-48.136v17.598h26.863zm-53.138 0h21.274v-17.598h-48.136v17.598h26.862z"/>
          </svg>',
          'enqueue_assets' => function(){
            wp_enqueue_style( 'acfb-blocks-css', plugin_dir_url( __FILE__ ) . 'css/acfblocks.css' );
          },
        ));
        
        // register a Social Sharing Block.
        acf_register_block(array(
          'name'              => 'acfb-socialsharing',
          'mode'              => 'preview',
          'title'             => __('Social Sharing'),
          'description'       => __('Super fast and customizable Social Media Sharing Buttons for WordPress. No JavaScript. No tracking.'),
          'render_callback'   => 'acf_blocks_template',
          'category'          => 'acfb-blocks',
          'icon'              => '<svg enable-background="new 0 0 481.6 481.6" version="1.1" viewBox="0 0 481.6 481.6" xml:space="preserve" xmlns="http://www.w3.org/2000/svg">
          <path d="m381.6 309.4c-27.7 0-52.4 13.2-68.2 33.6l-132.3-73.9c3.1-8.9 4.8-18.5 4.8-28.4 0-10-1.7-19.5-4.9-28.5l132.2-73.8c15.7 20.5 40.5 33.8 68.3 33.8 47.4 0 86.1-38.6 86.1-86.1s-38.6-86.1-86.1-86.1-86.1 38.6-86.1 86.1c0 10 1.7 19.6 4.9 28.5l-132.1 73.8c-15.7-20.6-40.5-33.8-68.3-33.8-47.4 0-86.1 38.6-86.1 86.1s38.7 86.1 86.2 86.1c27.8 0 52.6-13.3 68.4-33.9l132.2 73.9c-3.2 9-5 18.7-5 28.7 0 47.4 38.6 86.1 86.1 86.1s86.1-38.6 86.1-86.1-38.7-86.1-86.2-86.1zm0-282.3c32.6 0 59.1 26.5 59.1 59.1s-26.5 59.1-59.1 59.1-59.1-26.5-59.1-59.1 26.6-59.1 59.1-59.1zm-281.6 272.7c-32.6 0-59.1-26.5-59.1-59.1s26.5-59.1 59.1-59.1 59.1 26.5 59.1 59.1-26.6 59.1-59.1 59.1zm281.6 154.7c-32.6 0-59.1-26.5-59.1-59.1s26.5-59.1 59.1-59.1 59.1 26.5 59.1 59.1-26.5 59.1-59.1 59.1z"/>
      </svg>',
          'enqueue_assets' => function(){
            wp_enqueue_style( 'acfb-blocks-css', plugin_dir_url( __FILE__ ) . 'css/acfblocks.css' );
          },
      ));

        //Register a Image Slider Block    
        acf_register_block(array(
          'name'              => 'acfb-image-slider',
          'mode'              => 'preview',
          'title'             => __('Image Slider'),
          'description'       => __('Display your images as a slider or carousel.'),
          'render_callback'   => 'acf_blocks_template',
          'category'          => 'acfb-blocks',
          'icon'              => '<svg width="682pt" height="682pt" viewBox="-21 -91 682.66669 682" xmlns="http://www.w3.org/2000/svg">
            <path d="m639.98 7.5312c-0.33594-6.6172-5.7969-11.863-12.484-11.863h-615c-6.6875 0-12.148 5.2461-12.484 11.863-0.015625 0.21484-0.015625 0.42578-0.015625 0.64062v474.99c0 6.9062 5.6016 12.508 12.5 12.508h615c6.8984 0 12.5-5.6016 12.5-12.508v-474.99c0-0.21484 0-0.42578-0.015625-0.64062zm-24.984 463.12h-590v-367.46h590zm0-392.46h-590v-57.668h590z"/>
            <path d="m213.75 62.723h-100c-6.9062 0-12.5-5.5977-12.5-12.5 0-6.9102 5.5938-12.504 12.5-12.504h100c6.9062 0 12.5 5.5938 12.5 12.504 0 6.9023-5.5938 12.5-12.5 12.5z"/>
            <path d="m63.773 62.723c-6.9023 0-12.504-5.5977-12.504-12.5 0-6.9102 5.5898-12.504 12.496-12.504h0.007813c6.9062 0 12.5 5.5938 12.5 12.504 0 6.9023-5.5938 12.5-12.5 12.5z"/>
            <path d="m558.75 176.72h-50v-11.258c0-13.789-11.211-25.004-25-25.004h-327.5c-13.789 0-25 11.215-25 25.004v11.258h-50c-13.789 0-25 11.215-25 25.004v127.54c0 13.793 11.211 25.008 25 25.008h50v11.258c0 13.789 11.211 25.004 25 25.004h327.5c13.789 0 25-11.215 25-25.004v-11.258h50c13.789 0 25-11.215 25-25.008v-127.54c0-13.789-11.211-25.004-25-25.004zm-427.5 152.54h-50v-127.54h50l0.015625 127.54s0 0-0.015625 0zm352.52 36.266s0 0-0.015625 0h-327.5v-200.07h327.5v36.266l0.015625 127.89zm74.984-36.266h-50v-127.54h50l0.015625 127.54s0 0-0.015625 0z"/>
            <path d="m230.8 314.23c-3.125 0-6.2539-1.168-8.6836-3.5117l-37.5-36.227c-2.4375-2.3555-3.8164-5.6055-3.8164-8.9922 0-3.3945 1.3789-6.6406 3.8164-9l37.5-36.227c4.9727-4.793 12.879-4.6562 17.68 0.30859 4.793 4.9727 4.6562 12.887-0.30859 17.68l-28.195 27.238 28.195 27.23c4.9648 4.8008 5.1016 12.715 0.30859 17.68-2.457 2.5391-5.7266 3.8203-8.9961 3.8203z"/>
            <path d="m410.45 314.23c-3.2695 0-6.5391-1.2812-8.9961-3.8203-4.793-4.9648-4.6562-12.883 0.30859-17.68l28.195-27.234-28.195-27.234c-4.9648-4.793-5.1016-12.715-0.30859-17.68 4.8008-4.9648 12.711-5.1016 17.68-0.30859l37.5 36.227c2.4375 2.3594 3.8164 5.6055 3.8164 8.9961 0 3.3906-1.3789 6.6406-3.8164 8.9961l-37.5 36.227c-2.4297 2.3438-5.5586 3.5117-8.6836 3.5117z"/>
            <path d="m320.02 435.65c-6.9023 0-12.504-5.5977-12.504-12.5 0-6.9062 5.5898-12.508 12.496-12.508h0.007813c6.9062 0 12.5 5.6016 12.5 12.508 0 6.9023-5.5938 12.5-12.5 12.5z"/>
            <path d="m370.02 435.65c-6.9023 0-12.504-5.5977-12.504-12.5 0-6.9062 5.5898-12.508 12.496-12.508h0.007813c6.9062 0 12.5 5.6016 12.5 12.508 0 6.9023-5.5938 12.5-12.5 12.5z"/>
            <path d="m270.02 435.65c-6.9023 0-12.504-5.5977-12.504-12.5 0-6.9062 5.5898-12.508 12.496-12.508h0.007813c6.9062 0 12.5 5.6016 12.5 12.508 0 6.9023-5.5938 12.5-12.5 12.5z"/>
            </svg>',
          'enqueue_assets' => function(){
            wp_enqueue_style( 'acfb-image-slider-css', plugin_dir_url( __FILE__ ) . 'css/swiper.min.css' );
            wp_enqueue_script('jQuery');
            wp_enqueue_script( 'acfb-image-slider-swiper-js' ,plugin_dir_url( __FILE__ ) . 'js/swiper.min.js', array('jquery'), '', true );

            wp_enqueue_style( 'acfb-blocks-css', plugin_dir_url( __FILE__ ) . 'css/acfblocks.css' );
  
            wp_enqueue_script( 'acfb-image-slider-custom' ,plugin_dir_url( __FILE__ ) . 'js/image-slider.js', array('jquery'), '', true );
          },
        ));


        // register a Tabs Block.
        acf_register_block(array(
          'name'              => 'acfb-tabs',
          'mode'              => 'preview',
          'title'             => __('Tabs'),
          'description'       => __('Add tabbed content in your posts/pages.'),
          'render_callback'   => 'acf_blocks_template',
          'category'          => 'acfb-blocks',
          'icon'              => '<svg viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M861.29152 933.87264H162.70848c-40.08448 0-72.58112-32.49664-72.58112-72.58624V162.70848c0-40.08448 32.49664-72.58112 72.58112-72.58112h203.10016V222.72h568.06912v638.58176c-0.00512 40.07936-32.49664 72.57088-72.58624 72.57088z m5.74976-644.3264H156.95872v524.05248c0 34.12992 27.66336 61.7984 61.7984 61.7984h586.48064c34.12992 0 61.7984-27.66848 61.7984-61.7984V289.54624z m-200.49408-199.41888h194.74432c40.0896 0 72.58624 32.49664 72.58624 72.58112v34.944h-267.33056V90.12736z m-275.67616 0h250.61888v107.52512H390.87104V90.12736z"/></svg>',
          'enqueue_assets' => function(){
            wp_enqueue_style( 'acfb-blocks-css', plugin_dir_url( __FILE__ ) . 'css/acfblocks.css' );
            wp_enqueue_script( 'acfb-tabs-js', plugin_dir_url( __FILE__ ) . 'js/tabs.js', array('jquery'), '', true );
          },
      ));

        // register a Toggle Block.
        acf_register_block(array(
          'name'              => 'acfb-toggle',
          'mode'              => 'preview',
          'title'             => __('Toggle'),
          'description'       => __('Add toggleable content in your pages/posts.'),
          'render_callback'   => 'acf_blocks_template',
          'category'          => 'acfb-blocks',
          'icon'              => '<svg viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M0 0l0 1024 1024 0 0-1024-1024 0zM963.764706 60.235294l0 542.117647-903.529412 0 0-542.117647 903.529412 0zM963.764706 662.588235l0 120.470588-903.529412 0 0-120.470588 903.529412 0zM60.235294 963.764706l0-120.470588 903.529412 0 0 120.470588-903.529412 0z" /></svg>',
          'enqueue_assets' => function(){
            wp_enqueue_style( 'acfb-blocks-css', plugin_dir_url( __FILE__ ) . 'css/acfblocks.css' );
              wp_enqueue_script( 'acfb-toggle-js', plugin_dir_url( __FILE__ ) . 'js/toggle.js', array('jquery'), '', true );
          },
      ));

        // register a Accordion Block.
        acf_register_block(array(
          'name'              => 'acfb-accordion',
          'mode'              => 'preview',
          'title'             => __('Accordion'),
          'description'       => __('Add accordion content in your pages/posts.'),
          'render_callback'   => 'acf_blocks_template',
          'category'          => 'acfb-blocks',
          'icon'              => '<svg viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M0 0v180.705882h1024V0H0z m963.764706 120.470588H60.235294V60.235294h903.529412v60.235294zM0 783.058824h1024V240.941176H0v542.117648z m60.235294-481.882353h903.529412v421.647058H60.235294V301.176471zM0 1024h1024v-180.705882H0v180.705882z m60.235294-120.470588h903.529412v60.235294H60.235294v-60.235294z" /></svg>',
          'enqueue_assets' => function(){
            wp_enqueue_style( 'acfb-blocks-css', plugin_dir_url( __FILE__ ) . 'css/acfblocks.css' );
              wp_enqueue_script( 'acfb-accordion-js', plugin_dir_url( __FILE__ ) . 'js/accordion.js', array('jquery'), '', true );
          },
      ));

      // register a Scrollable Image Block.
        acf_register_block(array(
          'name'              => 'acfb-scrollable-image',
          'mode'              => 'preview',
          'title'             => __('Scrollable Image'),
          'description'       => __('Add Scrollable Image in your pages/posts.'),
          'render_callback'   => 'acf_blocks_template',
          'category'          => 'acfb-blocks',
          'icon'              => '<svg height="512pt" viewBox="-90 0 512 512" width="512pt" xmlns="http://www.w3.org/2000/svg"><path d="m166.238281 430.144531-89.769531-94.898437 29.058594-27.488282 60.632812 64.097657 60.273438-64.058594 29.132812 27.410156zm165.761719-38.144531v-272c0-66.167969-53.832031-120-120-120h-92c-66.167969 0-120 53.832031-120 120v272c0 66.167969 53.832031 120 120 120h92c66.167969 0 120-53.832031 120-120zm-120-352c44.113281 0 80 35.886719 80 80v272c0 44.113281-35.886719 80-80 80h-92c-44.113281 0-80-35.886719-80-80v-272c0-44.113281 35.886719-80 80-80zm-46 41c-11.046875 0-20 8.953125-20 20s8.953125 20 20 20 20-8.953125 20-20-8.953125-20-20-20zm0 80c-11.046875 0-20 8.953125-20 20s8.953125 20 20 20 20-8.953125 20-20-8.953125-20-20-20zm0 80c-11.046875 0-20 8.953125-20 20s8.953125 20 20 20 20-8.953125 20-20-8.953125-20-20-20zm0 0"/></svg>',
          'enqueue_assets' => function(){
            wp_enqueue_style( 'acfb-blocks-css', plugin_dir_url( __FILE__ ) . 'css/acfblocks.css' );
          },
      ));


    // register a Business Hours Block.
       acf_register_block(array(
          'name'              => 'acfb-business-hours',
          'mode'              => 'preview',
          'title'             => __('Business Hours'),
          'description'       => __('Add Business Hours in your pages/posts.'),
          'render_callback'   => 'acf_blocks_template',
          'category'          => 'acfb-blocks',
          'icon'              => '<svg enable-background="new 0 0 512 512" version="1.1" viewBox="0 0 512 512" xml:space="preserve" xmlns="http://www.w3.org/2000/svg">
            <circle cx="386" cy="210" r="20"/>
            <path d="m432 40h-26v-20c0-11.046-8.954-20-20-20s-20 8.954-20 20v20h-91v-20c0-11.046-8.954-20-20-20s-20 8.954-20 20v20h-90v-20c0-11.046-8.954-20-20-20s-20 8.954-20 20v20h-25c-44.112 0-80 35.888-80 80v312c0 44.112 35.888 80 80 80h153c11.046 0 20-8.954 20-20s-8.954-20-20-20h-153c-22.056 0-40-17.944-40-40v-312c0-22.056 17.944-40 40-40h25v20c0 11.046 8.954 20 20 20s20-8.954 20-20v-20h90v20c0 11.046 8.954 20 20 20s20-8.954 20-20v-20h91v20c0 11.046 8.954 20 20 20s20-8.954 20-20v-20h26c22.056 0 40 17.944 40 40v114c0 11.046 8.954 20 20 20s20-8.954 20-20v-114c0-44.112-35.888-80-80-80z"/>
            <path d="m391 270c-66.72 0-121 54.28-121 121s54.28 121 121 121 121-54.28 121-121-54.28-121-121-121zm0 202c-44.663 0-81-36.336-81-81s36.337-81 81-81 81 36.336 81 81-36.337 81-81 81z"/>
            <path d="m420 371h-9v-21c0-11.046-8.954-20-20-20s-20 8.954-20 20v41c0 11.046 8.954 20 20 20h29c11.046 0 20-8.954 20-20s-8.954-20-20-20z"/>
            <circle cx="299" cy="210" r="20"/>
            <circle cx="212" cy="297" r="20"/>
            <circle cx="125" cy="210" r="20"/>
            <circle cx="125" cy="297" r="20"/>
            <circle cx="125" cy="384" r="20"/>
            <circle cx="212" cy="384" r="20"/>
            <circle cx="212" cy="210" r="20"/>
        </svg>',
          'enqueue_assets' => function(){
            wp_enqueue_style( 'acfb-blocks-css', plugin_dir_url( __FILE__ ) . 'css/acfblocks.css' );
          },
      ));


        // register a Facebook Page Block.
       acf_register_block(array(
          'name'              => 'acfb-facebook-page',
          'mode'              => 'preview',
          'title'             => __('Facebook Page'),
          'description'       => __('Add Facebook Page in your pages/posts.'),
          'render_callback'   => 'acf_blocks_template',
          'category'          => 'acfb-blocks',
          'icon'              => '<svg width="100" height="100" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
            <g clip-path="url(#clip0)">
            <rect width="100" height="100" fill="url(#pattern0)"/>
            <rect x="61" y="-5" width="42" height="43.5273" rx="21" fill="white"/>
            <rect x="61.7635" y="-3.47278" width="41.2364" height="41.2364" fill="url(#pattern1)"/>
            </g>
            <defs>
            <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1">
            <use xlink:href="#image0" transform="scale(0.01)"/>
            </pattern>
            <pattern id="pattern1" patternContentUnits="objectBoundingBox" width="1" height="1">
            <use xlink:href="#image1" transform="scale(0.01)"/>
            </pattern>
            <clipPath id="clip0">
            <rect width="100" height="100" fill="white"/>
            </clipPath>
            <image id="image0" width="100" height="100" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGQAAABkCAYAAABw4pVUAAAABmJLR0QA/wD/AP+gvaeTAAAEMElEQVR4nO2du2sVQRSHvxijjZoHEgu1Ed+iplELxUKj4KNQIZ1CfCCIXUT/CRNbUXyW4hOxVUvxVRgVsTWxSES88dHcoLGYK96YvXvX3Zk9527OB9MsnDNn5sfuzM6Z2QXDMAzDMAzDP02B/HYAa4HOQP6lGQUGgS/SgdRjOXAbGAcmCl7GgVvAMi89F4CdwFfkOyrvMgZ0e+g/ryxneopRLcrSzL3okTvId4p0uZm5F/EzqHcAI8BMD74amXFgARkH+hkeAlmPiQHQAqzL6sSHIB0efBSF+Vkd+BDEh4+ikLkvrDOVYYIowwRRhgmiDBNEGSaIMkwQZZggypBe8hgCLgPvgZ/CsTQDK4BjwCLhWDLRQ7rV0VdAq0C89WjDZQPTtKkna+WSj6w+XB5BGyXglFTlkoI8F6y7Hs+kKpYURPNzerFUxZKCnBasux5npCqWFKQXuAqswc1wpGnGxXIdOCQVhPS0t7dSjAr2YqgME0QZJogyTBBlmCDKMEGUYYIowwRRhgmiDBNEGSaIMkwQZUgvLv7JqQ8DG4AjuG39cYxXbJ4CPzzGYjl1pubUtwDlGJsysDloa4Rz6j5IK8j2Gv4uxNicD9WIf9gRE0NhNznUyqnH5bNfhAjkP2MIisacelw+O69nu+XUK7QBR2NsjgPtYcKZhFhO3Qdpx5AJ/ubU5+E+PPA6gc0g7qD+HM/tqM6pp21PQw/qRSwNPagbEZggyjBBlGGCKMMEUYb04iLAW9ziYhfu4y1JGAFe4n9xcSWw2qNPEdJOe8eAXVV+ZgH9CezOUn9FOAu7Sf/tr4Z+DzkR4asJeBxj85Bw34ms5mRMDIV9D7kXcW2ixvVqm4kw4Uzidg51RKJxUI+7A/K4O0DweISkIAcirjUB+2Js9pGPKPtzqCMYaceQr8CeKj+zgXMJ7AZwE4BQ7AW+pWxT5jFEcto7F3gAvMPl1rtI9uHlPuAgbtr73WM8zcCqShFDw3tImk7oZPKUuTBoHNSnNSaIMkwQZZggyjBBlCEtyBXcxoJW3Oa01wlsqjc5NHksMyuxXPPRMEnSvhheivDVCnyIsRkmn21AV2NiKOzi4kDEtTHcXVOLi+TzV5v+HOqIRFKQjzWuD6Ww8c1wTvVMQVKQjTWub4qx2RAikAhqxdYQpB1DBnFbR6vZSvz/q8q4IwshaSfZDsrCLS6uBd7gBvch3J1xuE5MLcAj3KD7hDA59WPAQo9+c8e2khZklmVEYIIowwRRhgmiDBNEGSaIMkwQZZggyvAhyC8PPopC5r7wIchnDz6KwqesDnxsy2wDRgl7RKARUPNz4hJw34OfRucu+STPErEMl+2TXtyTKiVgSeZe9Ew301OUErDNQ/8FYSlwk/hvXhWllIEbeL4zQp21aMcloJIe4mw0RnAZz5J0IIZhGIZhGEYSfgOAPc5a5UN6DQAAAABJRU5ErkJggg=="/>
            <image id="image1" width="100" height="100" xlink:href="data:image/png;base64,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"/>
            </defs>
            </svg>',
          'enqueue_assets' => function(){
            wp_enqueue_style( 'acfb-blocks-css', plugin_dir_url( __FILE__ ) . 'css/acfblocks.css' );
          },
      ));

       // register a Acf Meta Display Block.
       acf_register_block(array(
          'name'              => 'acfb-meta-display',
          'mode'              => 'preview',
          'title'             => __('Acf Meta Display'),
          'description'       => __('Add Acf Meta Display in your pages/posts.'),
          'render_callback'   => 'acf_blocks_template',
          'category'          => 'acfb-blocks',
          'icon'              => '<svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 512 512"><title>Location</title><path d="M360,153a8,8,0,0,0-8-8H161a8,8,0,0,0-8,8V290a8,8,0,0,0,8,8H352a8,8,0,0,0,8-8Zm-17,8v71.566l-44.125-31.419a7.842,7.842,0,0,0-10.118.823l-36.029,35.466-41.684-20.33a7.527,7.527,0,0,0-7.277.271L169,237.681V161ZM169,256.178l39.122-22.822L240.793,249.2,208.19,281H169ZM231.016,281l64.07-63.062L343,252.173V281Z"/><path d="M245.8,220.424a22.96,22.96,0,1,0-22.96-22.96A22.986,22.986,0,0,0,245.8,220.424Zm0-29.92a6.96,6.96,0,1,1-6.96,6.96A6.968,6.968,0,0,1,245.8,190.5Z"/><path d="M256,9.677c-116.861,0-211.935,91.049-211.935,202.964,0,35.921,11.076,73.539,32.917,111.811,17.261,30.246,41.272,61,71.365,91.4,51.023,51.547,101.231,83.863,103.344,85.213a8,8,0,0,0,8.618,0c2.113-1.35,52.321-33.666,103.344-85.213,30.093-30.4,54.1-61.152,71.365-91.4,21.841-38.272,32.917-75.89,32.917-111.811C467.935,100.726,372.861,9.677,256,9.677Zm165.2,306.7c-16.532,29-39.646,58.609-68.7,87.994A677.751,677.751,0,0,1,256,484.72a677.751,677.751,0,0,1-96.5-80.347c-29.056-29.385-52.17-58.991-68.7-87.994C70.405,280.6,60.065,245.7,60.065,212.641c0-103.092,87.9-186.964,195.935-186.964s195.935,83.872,195.935,186.964C451.935,245.7,441.6,280.6,421.2,316.379Z"/><path d="M256,61.121c-86.511,0-156.893,70.382-156.893,156.893S169.489,374.907,256,374.907s156.893-70.382,156.893-156.893S342.511,61.121,256,61.121Zm0,297.786c-77.688,0-140.893-63.2-140.893-140.893S178.312,77.121,256,77.121s140.893,63.205,140.893,140.893S333.688,358.907,256,358.907Z"/></svg>',
          'enqueue_assets' => function(){
            wp_enqueue_style( 'acfb-blocks-css', plugin_dir_url( __FILE__ ) . 'css/acfblocks.css' );
          },
      ));

      add_action('acf/input/admin_enqueue_scripts', function () {
      wp_enqueue_script('acfb-data-js', plugin_dir_url(__FILE__) . 'js/acfdata.js', uniqid(), false);
      });


      // register a Fb Like Button.
       acf_register_block(array(
          'name'              => 'acfb-fb-like-button',
          'mode'              => 'preview',
          'title'             => __('Fb Like Button'),
          'description'       => __('Add Fb Like Button in your pages/posts.'),
          'render_callback'   => 'acf_blocks_template',
          'category'          => 'acfb-blocks',
          'icon'              => '<svg enable-background="new 0 0 512 512" version="1.1" viewBox="0 0 512 512" xml:space="preserve" xmlns="http://www.w3.org/2000/svg">
            <path d="m512 304c0-12.821-5.099-24.768-13.888-33.579 9.963-10.901 15.04-25.515 13.653-40.725-2.496-27.115-26.923-48.363-55.637-48.363h-131.78c6.528-19.819 16.981-56.149 16.981-85.333 0-46.272-39.317-85.333-64-85.333-22.144 0-37.995 12.48-38.656 12.992-2.539 2.027-4.011 5.099-4.011 8.341v72.341l-61.461 133.1-2.539 1.301v-4.075c0-5.888-4.779-10.667-10.667-10.667h-106.67c-29.418 1e-3 -53.333 23.916-53.333 53.334v170.67c0 29.419 23.915 53.333 53.333 53.333h64c23.061 0 42.773-14.72 50.197-35.264 17.75 9.131 41.643 13.931 56.47 13.931h195.82c23.232 0 43.563-15.659 48.341-37.248 2.453-11.136 1.024-22.336-3.84-32.064 15.744-7.915 26.347-24.192 26.347-42.688 0-7.552-1.728-14.784-4.992-21.312 15.744-7.936 26.325-24.192 26.325-42.688zm-44.992 26.325c-4.117 0.491-7.595 3.285-8.917 7.232-1.301 3.947-0.213 8.277 2.816 11.136 5.419 5.099 8.427 11.968 8.427 19.307 0 13.461-10.176 24.768-23.637 26.325-4.117 0.491-7.595 3.285-8.917 7.232-1.301 3.947-0.213 8.277 2.816 11.136 7.019 6.613 9.835 15.893 7.723 25.451-2.624 11.904-14.187 20.523-27.499 20.523h-195.82c-17.323 0-46.379-8.128-56.448-18.219-3.051-3.029-7.659-3.925-11.627-2.304-3.989 1.643-6.592 5.547-6.592 9.856 0 17.643-14.357 32-32 32h-64c-17.643 0-32-14.357-32-32v-170.67c0-17.643 14.357-32 32-32h96v10.667c0 3.691 1.92 7.125 5.077 9.088 3.115 1.877 7.04 2.069 10.368 0.448l21.333-10.667c2.155-1.067 3.883-2.859 4.907-5.056l64-138.67c0.64-1.408 0.981-2.944 0.981-4.48v-68.885c4.438-2.453 12.14-5.781 21.334-5.781 11.691 0 42.667 29.056 42.667 64 0 37.547-20.437 91.669-20.629 92.203-1.237 3.264-0.811 6.955 1.173 9.856 2.005 2.88 5.291 4.608 8.789 4.608h146.8c17.792 0 32.896 12.736 34.389 28.992 1.131 12.16-4.715 23.723-15.189 30.187-3.264 2.005-5.205 5.632-5.056 9.493s2.368 7.317 5.781 9.088c9.024 4.587 14.613 13.632 14.613 23.573 1e-3 13.461-10.175 24.768-23.658 26.325z"/><path d="m160 245.33c-5.888 0-10.667 4.779-10.667 10.667v192c0 5.888 4.779 10.667 10.667 10.667s10.667-4.779 10.667-10.667v-192c0-5.888-4.779-10.667-10.667-10.667z"/></svg>',
          'enqueue_assets' => function(){
            wp_enqueue_style( 'acfb-blocks-css', plugin_dir_url( __FILE__ ) . 'css/acfblocks.css' );
          },
      ));

      // register a Divider
       acf_register_block(array(
          'name'              => 'acfb-divider',
          'mode'              => 'preview',
          'title'             => __('Divider'),
          'description'       => __('Add Divider in your pages/posts.'),
          'render_callback'   => 'acf_blocks_template',
          'category'          => 'acfb-blocks',
          'icon'              => '<svg version="1.0" xmlns="http://www.w3.org/2000/svg"
             width="100.000000pt" height="100.000000pt" viewBox="0 0 100.000000 100.000000"
             preserveAspectRatio="xMidYMid meet">
            <metadata>
            Created by potrace 1.16, written by Peter Selinger 2001-2019
            </metadata>
            <g transform="translate(0.000000,100.000000) scale(0.100000,-0.100000)"
            fill="#000000" stroke="none">
            <path d="M190 675 l0 -235 305 0 305 0 0 235 0 235 -305 0 -305 0 0 -235z
            m580 55 c0 -82 -2 -150 -5 -150 -3 0 -26 20 -51 45 -53 53 -77 56 -119 15 -28
            -27 -33 -29 -45 -15 -24 29 -54 17 -120 -50 -53 -52 -71 -64 -97 -65 -22 0
            -33 -5 -33 -15 0 -12 36 -15 238 -18 l237 -2 -280 -1 c-154 0 -263 1 -242 3
            50 6 52 33 2 33 l-35 0 0 185 0 185 275 0 275 0 0 -150z m-11 -186 c7 4 11 -1
            11 -13 0 -20 -5 -21 -127 -21 l-126 0 64 65 63 65 52 -51 c29 -28 57 -48 63
            -45z"/>
            <path d="M346 853 c-3 -3 -6 -18 -7 -32 0 -26 0 -26 -9 -3 -11 27 -40 29 -40
            2 0 -12 -5 -17 -14 -14 -19 7 -30 -14 -17 -30 9 -10 8 -15 -4 -20 -24 -9 -18
            -26 9 -26 15 0 26 7 29 18 4 13 5 12 6 -4 1 -15 -6 -24 -24 -28 -14 -4 -25
            -13 -25 -21 0 -18 36 -20 47 -2 6 10 15 10 43 0 19 -6 27 -12 18 -12 -23 -1
            -25 -51 -3 -51 8 0 15 8 15 17 0 13 3 14 12 5 18 -18 28 -15 28 8 0 14 7 20
            21 20 14 0 19 5 17 18 -2 10 -12 17 -25 16 -12 0 -20 3 -17 8 3 4 16 8 30 8
            15 0 24 6 24 15 0 8 -8 15 -17 15 -15 0 -15 2 -4 9 18 12 6 45 -14 37 -10 -4
            -15 1 -15 14 0 23 -10 26 -28 8 -9 -9 -12 -8 -12 4 0 19 -14 31 -24 21z"/>
            <path d="M0 260 l0 -70 500 0 500 0 0 70 0 70 -500 0 -500 0 0 -70z m960 0 l0
            -30 -460 0 -460 0 0 30 0 30 460 0 460 0 0 -30z"/>
            </g>
            </svg>',
          'enqueue_assets' => function(){
            wp_enqueue_style( 'acfb-blocks-css', plugin_dir_url( __FILE__ ) . 'css/acfblocks.css' );
          },
      ));

       // register a Random Image
       acf_register_block(array(
          'name'              => 'acfb-random-image',
          'mode'              => 'preview',
          'title'             => __('Random Image'),
          'description'       => __('Add Random Image in your pages/posts.'),
          'render_callback'   => 'acf_blocks_template',
          'category'          => 'acfb-blocks',
          'icon'              => '<svg viewBox="0 -21 511.98744 511" xmlns="http://www.w3.org/2000/svg"><path d="m377.652344 469.828125c-4.03125 0-8.148438-.511719-12.226563-1.578125l-329.898437-88.34375c-25.449219-7.019531-40.617188-33.34375-33.960938-58.773438l36.265625-139.070312c2.21875-8.535156 10.945313-13.71875 19.519531-11.433594 8.535157 2.21875 13.675782 10.964844 11.4375 19.519532l-36.269531 139.09375c-2.238281 8.574218 2.859375 17.425781 11.394531 19.773437l329.707032 88.300781c8.46875 2.238282 17.214844-2.796875 19.433594-11.222656l11.261718-45.441406c2.136719-8.574219 10.796875-13.78125 19.371094-11.6875 8.578125 2.132812 13.804688 10.792968 11.691406 19.367187l-11.304687 45.65625c-5.699219 21.609375-25.152344 35.839844-46.421875 35.839844zm0 0"/><path d="m463.988281 341.828125h-330.667969c-26.472656 0-48-21.527344-48-48v-245.335937c0-26.472657 21.527344-48 48-48h330.667969c26.472657 0 48 21.527343 48 48v245.335937c0 26.472656-21.527343 48-48 48zm-330.667969-309.335937c-8.832031 0-16 7.167968-16 16v245.335937c0 8.832031 7.167969 16 16 16h330.667969c8.832031 0 16-7.167969 16-16v-245.335937c0-8.832032-7.167969-16-16-16zm0 0"/><path d="m191.988281 149.828125c-23.53125 0-42.667969-19.136719-42.667969-42.667969s19.136719-42.667968 42.667969-42.667968 42.664063 19.136718 42.664063 42.667968-19.132813 42.667969-42.664063 42.667969zm0-53.335937c-5.890625 0-10.667969 4.78125-10.667969 10.667968 0 5.886719 4.777344 10.667969 10.667969 10.667969 5.886719 0 10.664063-4.78125 10.664063-10.667969 0-5.886718-4.777344-10.667968-10.664063-10.667968zm0 0"/><path d="m101.746094 320.066406c-4.09375 0-8.191406-1.558594-11.304688-4.691406-6.25-6.25-6.25-16.386719 0-22.636719l96.425782-96.425781c14.59375-14.59375 38.335937-14.59375 52.90625 0l25.792968 25.792969 79.230469-95.105469c7.082031-8.492188 17.472656-13.398438 28.503906-13.460938 11.859375-.660156 21.460938 4.734376 28.605469 13.121094l106.199219 123.902344c5.757812 6.699219 4.96875 16.8125-1.730469 22.570312-6.71875 5.761719-16.808594 4.972657-22.570312-1.726562l-106.238282-123.945312c-1.410156-1.6875-3.136718-1.601563-4.097656-1.902344-.914062 0-2.6875.277344-4.09375 1.941406l-90.453125 108.589844c-2.882813 3.453125-7.082031 5.546875-11.5625 5.738281-4.566406.253906-8.875-1.496094-12.035156-4.671875l-38.183594-38.1875c-2.710937-2.710938-4.949219-2.710938-7.660156 0l-96.425781 96.40625c-3.117188 3.132812-7.210938 4.691406-11.308594 4.691406zm0 0"/></svg>',
          'enqueue_assets' => function(){
            wp_enqueue_style( 'acfb-blocks-css', plugin_dir_url( __FILE__ ) . 'css/acfblocks.css' );
             wp_enqueue_script( 'acfb-random-image-js', plugin_dir_url( __FILE__ ) . 'js/random-image.js', array('jquery'), '', true );
          },
      ));

    }
    
}