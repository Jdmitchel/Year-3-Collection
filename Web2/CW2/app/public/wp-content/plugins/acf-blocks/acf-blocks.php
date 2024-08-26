<?php

/**
 * Plugin Name: ACF Blocks Suite
 * Plugin URI:  https://acfblocks.com/
 * Description: Supercharge your Gutenberg editor with high quality beautiful WordPress blocks. Ready-to-use ACF Blocks!
 * Version:     2.6.10
 * Author:      Delicious Brains
 * Author URI:  https://deliciousbrains.com
 * License:     GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: acfb
 * Domain Path: /languages
 */
if ( !defined( 'ABSPATH' ) ) {
    exit;
}

if ( function_exists( 'acfb_fs' ) ) {
    acfb_fs()->set_basename( false, __FILE__ );
} else {
    
    if ( !function_exists( 'acfb_fs' ) ) {
        function acfb_fs()
        {
            global  $acfb_fs ;
            
            if ( !isset( $acfb_fs ) ) {
                // Include Freemius SDK.
                require_once dirname( __FILE__ ) . '/freemius/start.php';
                $acfb_fs = fs_dynamic_init( array(
                    'id'             => '3703',
                    'slug'           => 'acf-blocks',
                    'premium_slug'   => 'acf-blocks-pro',
                    'type'           => 'plugin',
                    'public_key'     => 'pk_5e62b729dd843294873241dcc6402',
                    'is_premium'     => false,
                    'premium_suffix' => 'pro',
                    'has_addons'     => false,
                    'has_paid_plans' => true,
                    'menu'           => array(
                    'slug'    => 'acf-blocks',
                    'support' => false,
                ),
                    'is_live'        => true,
                ) );
            }
            
            return $acfb_fs;
        }
        
        // Init Freemius.
        acfb_fs();
        // Signal that SDK was initiated.
        do_action( 'acfb_fs_loaded' );
    }
    
    
    if ( !function_exists( 'acfb_fs' ) ) {
        // Create a helper function for easy SDK access.
        function acfb_fs()
        {
            global  $acfb_fs ;
            
            if ( !isset( $acfb_fs ) ) {
                // Include Freemius SDK.
                require_once dirname( __FILE__ ) . '/freemius/start.php';
                $acfb_fs = fs_dynamic_init( array(
                    'id'             => '3703',
                    'slug'           => 'acf-blocks',
                    'premium_slug'   => 'acf-blocks-pro',
                    'type'           => 'plugin',
                    'public_key'     => 'pk_5e62b729dd843294873241dcc6402',
                    'is_premium'     => false,
                    'premium_suffix' => 'pro',
                    'has_addons'     => false,
                    'has_paid_plans' => true,
                    'menu'           => array(
                    'slug' => 'acf-blocks',
                ),
                    'is_live'        => true,
                ) );
            }
            
            return $acfb_fs;
        }
        
        // Init Freemius.
        acfb_fs();
        // Signal that SDK was initiated.
        do_action( 'acfb_fs_loaded' );
    }
    
    $free_blocks_init = plugin_dir_path( __FILE__ ) . 'free-acf-blocks.php';
    $pro_blocks_init = plugin_dir_path( __FILE__ ) . 'pro-acf-blocks.php';
    if ( file_exists( $free_blocks_init ) ) {
        require_once $free_blocks_init;
    }
    if ( file_exists( $pro_blocks_init ) ) {
        require_once $pro_blocks_init;
    }
    // Add Custom Blocks Panel in Gutenberg
    function acfb_block_categories( $categories, $post )
    {
        return array_merge( $categories, array( array(
            'slug'  => 'acfb-blocks',
            'title' => __( 'ACF Blocks', 'acfblocks-master' ),
        ) ) );
    }
    
    // "block_categories" filter is deprecated for WP version above 5.8
    
    if ( version_compare( get_bloginfo( 'version' ), '5.8', '>=' ) ) {
        add_filter(
            'block_categories_all',
            'acfb_block_categories',
            10,
            2
        );
    } else {
        add_filter(
            'block_categories',
            'acfb_block_categories',
            10,
            2
        );
    }
    
    // Save Acf
    add_filter( 'acf/settings/save_json', 'acfb_json_save_point' );
    function acfb_json_save_point( $acfb_path )
    {
        // update path
        $acfb_path = plugin_dir_path( __FILE__ ) . '/acf-json';
        // return
        return $acfb_path;
    }
    
    // Load Acf
    add_filter( 'acf/settings/load_json', 'acfb_json_load_point' );
    function acfb_json_load_point( $acfb_path )
    {
        // remove original path (optional)
        unset( $acfb_path[0] );
        // append path
        $acfb_path[] = plugin_dir_path( __FILE__ ) . '/acf-json';
        // return
        return $acfb_path;
    }
    
    // Excerpt Limit
    function acfb_excerpt( $acfb_excerpt_limit )
    {
        $acfb_excerpt = explode( ' ', get_the_excerpt(), $acfb_excerpt_limit );
        
        if ( count( $acfb_excerpt ) >= $acfb_excerpt_limit ) {
            array_pop( $acfb_excerpt );
            $acfb_excerpt = implode( " ", $acfb_excerpt ) . '...';
        } else {
            $acfb_excerpt = implode( " ", $acfb_excerpt );
        }
        
        $acfb_excerpt = preg_replace( '`[[^]]*]`', '', $acfb_excerpt );
        return $acfb_excerpt;
    }
    
    // Default Value in post List Elements
    add_filter(
        'acf/load_value/name=acfb_post_list_elements',
        'acfb_post_list_elements_defaults',
        10,
        3
    );
    function acfb_post_list_elements_defaults( $value, $post_id, $field )
    {
        if ( $value !== NULL ) {
            // $value will only be NULL on a new post
            return $value;
        }
        // add default layouts
        $value = array(
            array(
            'acf_fc_layout' => 'post_list_title',
        ),
            array(
            'acf_fc_layout' => 'post_list_meta_data',
        ),
            array(
            'acf_fc_layout' => 'post_list_content',
        ),
            array(
            'acf_fc_layout' => 'post_list_read_more_button',
        )
        );
        return $value;
    }
    
    // Default Value in post Grid Elements
    add_filter(
        'acf/load_value/name=acfb_post_grid_elements',
        'acfb_post_grid_elements_defaults',
        10,
        3
    );
    function acfb_post_grid_elements_defaults( $value, $post_id, $field )
    {
        if ( $value !== NULL ) {
            // $value will only be NULL on a new post
            return $value;
        }
        // add default layouts
        $value = array(
            array(
            'acf_fc_layout' => 'post_grid_image',
        ),
            array(
            'acf_fc_layout' => 'post_grid_title',
        ),
            array(
            'acf_fc_layout' => 'post_grid_meta_data',
        ),
            array(
            'acf_fc_layout' => 'post_grid_content',
        ),
            array(
            'acf_fc_layout' => 'post_grid_read_more_button',
        )
        );
        return $value;
    }
    
    add_filter( 'acf/load_field/name=2_grid_layouts', 'acfb_two_grid_icons' );
    function acfb_two_grid_icons( $field )
    {
        $field['choices'] = array(
            'one' => '<img src="' . plugins_url( 'img/gtwo-one.png', __FILE__ ) . '" />',
            'two' => '<img src="' . plugins_url( 'img/gtwo-two.png', __FILE__ ) . '" />',
        );
        return $field;
    }
    
    add_filter( 'acf/load_field/name=3_grid_layouts', 'acfb_three_grid_icons' );
    function acfb_three_grid_icons( $field )
    {
        $field['choices'] = array(
            'one'   => '<img src="' . plugins_url( 'img/gthree-one.png', __FILE__ ) . '" />',
            'two'   => '<img src="' . plugins_url( 'img/gthree-two.png', __FILE__ ) . '" />',
            'three' => '<img src="' . plugins_url( 'img/gthree-three.png', __FILE__ ) . '" />',
            'four'  => '<img src="' . plugins_url( 'img/gthree-four.png', __FILE__ ) . '" />',
            'five'  => '<img src="' . plugins_url( 'img/gthree-five.png', __FILE__ ) . '" />',
            'six'   => '<img src="' . plugins_url( 'img/gthree-six.png', __FILE__ ) . '" />',
        );
        return $field;
    }
    
    add_filter( 'acf/load_field/name=4_grid_layouts', 'acfb_four_grid_icons' );
    function acfb_four_grid_icons( $field )
    {
        $field['choices'] = array(
            'one'      => '<img src="' . plugins_url( 'img/gfour-one.png', __FILE__ ) . '" />',
            'two'      => '<img src="' . plugins_url( 'img/gfour-two.png', __FILE__ ) . '" />',
            'three'    => '<img src="' . plugins_url( 'img/gfour-three.png', __FILE__ ) . '" />',
            'four'     => '<img src="' . plugins_url( 'img/gfour-four.png', __FILE__ ) . '" />',
            'five'     => '<img src="' . plugins_url( 'img/gfour-five.png', __FILE__ ) . '" />',
            'six'      => '<img src="' . plugins_url( 'img/gfour-six.png', __FILE__ ) . '" />',
            'seven'    => '<img src="' . plugins_url( 'img/gfour-seven.png', __FILE__ ) . '" />',
            'eight'    => '<img src="' . plugins_url( 'img/gfour-eight.png', __FILE__ ) . '" />',
            'nine'     => '<img src="' . plugins_url( 'img/gfour-nine.png', __FILE__ ) . '" />',
            'ten'      => '<img src="' . plugins_url( 'img/gfour-ten.png', __FILE__ ) . '" />',
            'eleven'   => '<img src="' . plugins_url( 'img/gfour-eleven.png', __FILE__ ) . '" />',
            'twelve'   => '<img src="' . plugins_url( 'img/gfour-twelve.png', __FILE__ ) . '" />',
            'thirteen' => '<img src="' . plugins_url( 'img/gfour-thirteen.png', __FILE__ ) . '" />',
            'fourteen' => '<img src="' . plugins_url( 'img/gfour-fourteen.png', __FILE__ ) . '" />',
            'fifteen'  => '<img src="' . plugins_url( 'img/gfour-fifteen.png', __FILE__ ) . '" />',
        );
        return $field;
    }
    
    add_filter( 'acf/load_field/name=social_network', 'Social_icons' );
    function Social_icons( $field )
    {
        $field['choices'] = array(
            '1'  => '<svg class="acfb_social_icons acfb_social_facebook_main" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M18.77 7.46H14.5v-1.9c0-.9.6-1.1 1-1.1h3V.5h-4.33C10.24.5 9.5 3.44 9.5 5.32v2.15h-3v4h3v12h5v-12h3.85l.42-4z" stroke="none" fill="#666666" stroke-width="2px"/></svg>',
            '2'  => '<svg class="acfb_social_icons acfb_social_twitter_main" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M23.44 4.83c-.8.37-1.5.38-2.22.02.93-.56.98-.96 1.32-2.02-.88.52-1.86.9-2.9 1.1-.82-.88-2-1.43-3.3-1.43-2.5 0-4.55 2.04-4.55 4.54 0 .36.03.7.1 1.04-3.77-.2-7.12-2-9.36-4.75-.4.67-.6 1.45-.6 2.3 0 1.56.8 2.95 2 3.77-.74-.03-1.44-.23-2.05-.57v.06c0 2.2 1.56 4.03 3.64 4.44-.67.2-1.37.2-2.06.08.58 1.8 2.26 3.12 4.25 3.16C5.78 18.1 3.37 18.74 1 18.46c2 1.3 4.4 2.04 6.97 2.04 8.35 0 12.92-6.92 12.92-12.93 0-.2 0-.4-.02-.6.9-.63 1.96-1.22 2.56-2.14z" stroke="none" fill="#666666" stroke-width="2px"/></svg>',
            '3'  => '<svg class="acfb_social_icons acfb_social_email_main" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M22 4H2C.9 4 0 4.9 0 6v12c0 1.1.9 2 2 2h20c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zM7.25 14.43l-3.5 2c-.08.05-.17.07-.25.07-.17 0-.34-.1-.43-.25-.14-.24-.06-.55.18-.68l3.5-2c.24-.14.55-.06.68.18.14.24.06.55-.18.68zm4.75.07c-.1 0-.2-.03-.27-.08l-8.5-5.5c-.23-.15-.3-.46-.15-.7.15-.22.46-.3.7-.14L12 13.4l8.23-5.32c.23-.15.54-.08.7.15.14.23.07.54-.16.7l-8.5 5.5c-.08.04-.17.07-.27.07zm8.93 1.75c-.1.16-.26.25-.43.25-.08 0-.17-.02-.25-.07l-3.5-2c-.24-.13-.32-.44-.18-.68s.44-.32.68-.18l3.5 2c.24.13.32.44.18.68z" stroke="none" fill="#666666" stroke-width="2px"/></svg>',
            '4'  => '<svg class="acfb_social_icons acfb_social_pinterest_main" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12.14.5C5.86.5 2.7 5 2.7 8.75c0 2.27.86 4.3 2.7 5.05.3.12.57 0 .66-.33l.27-1.06c.1-.32.06-.44-.2-.73-.52-.62-.86-1.44-.86-2.6 0-3.33 2.5-6.32 6.5-6.32 3.55 0 5.5 2.17 5.5 5.07 0 3.8-1.7 7.02-4.2 7.02-1.37 0-2.4-1.14-2.07-2.54.4-1.68 1.16-3.48 1.16-4.7 0-1.07-.58-1.98-1.78-1.98-1.4 0-2.55 1.47-2.55 3.42 0 1.25.43 2.1.43 2.1l-1.7 7.2c-.5 2.13-.08 4.75-.04 5 .02.17.22.2.3.1.14-.18 1.82-2.26 2.4-4.33.16-.58.93-3.63.93-3.63.45.88 1.8 1.65 3.22 1.65 4.25 0 7.13-3.87 7.13-9.05C20.5 4.15 17.18.5 12.14.5z" stroke="none" fill="#666666" stroke-width="2px"/></svg>',
            '5'  => '<svg class="acfb_social_icons acfb_social_linkedin_main" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M6.5 21.5h-5v-13h5v13zM4 6.5C2.5 6.5 1.5 5.3 1.5 4s1-2.4 2.5-2.4c1.6 0 2.5 1 2.6 2.5 0 1.4-1 2.5-2.6 2.5zm11.5 6c-1 0-2 1-2 2v7h-5v-13h5V10s1.6-1.5 4-1.5c3 0 5 2.2 5 6.3v6.7h-5v-7c0-1-1-2-2-2z" stroke="none" fill="#666666" stroke-width="2px"/></svg>',
            '6'  => '<svg class="acfb_social_icons acfb_social_reddit_main" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M24 11.5c0-1.65-1.35-3-3-3-.96 0-1.86.48-2.42 1.24-1.64-1-3.75-1.64-6.07-1.72.08-1.1.4-3.05 1.52-3.7.72-.4 1.73-.24 3 .5C17.2 6.3 18.46 7.5 20 7.5c1.65 0 3-1.35 3-3s-1.35-3-3-3c-1.38 0-2.54.94-2.88 2.22-1.43-.72-2.64-.8-3.6-.25-1.64.94-1.95 3.47-2 4.55-2.33.08-4.45.7-6.1 1.72C4.86 8.98 3.96 8.5 3 8.5c-1.65 0-3 1.35-3 3 0 1.32.84 2.44 2.05 2.84-.03.22-.05.44-.05.66 0 3.86 4.5 7 10 7s10-3.14 10-7c0-.22-.02-.44-.05-.66 1.2-.4 2.05-1.54 2.05-2.84zM2.3 13.37C1.5 13.07 1 12.35 1 11.5c0-1.1.9-2 2-2 .64 0 1.22.32 1.6.82-1.1.85-1.92 1.9-2.3 3.05zm3.7.13c0-1.1.9-2 2-2s2 .9 2 2-.9 2-2 2-2-.9-2-2zm9.8 4.8c-1.08.63-2.42.96-3.8.96-1.4 0-2.74-.34-3.8-.95-.24-.13-.32-.44-.2-.68.15-.24.46-.32.7-.18 1.83 1.06 4.76 1.06 6.6 0 .23-.13.53-.05.67.2.14.23.06.54-.18.67zm.2-2.8c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2zm5.7-2.13c-.38-1.16-1.2-2.2-2.3-3.05.38-.5.97-.82 1.6-.82 1.1 0 2 .9 2 2 0 .84-.53 1.57-1.3 1.87z" stroke="none" fill="#666666" stroke-width="2px"/></svg>',
            '7'  => '<svg class="acfb_social_icons acfb_social_xing_main" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M10.2 9.7l-3-5.4C7.2 4 7 4 6.8 4h-5c-.3 0-.4 0-.5.2v.5L4 10 .4 16v.5c0 .2.2.3.4.3h5c.3 0 .4 0 .5-.2l4-6.6v-.5zM24 .2l-.5-.2H18s-.2 0-.3.3l-8 14v.4l5.2 9c0 .2 0 .3.3.3h5.4s.3 0 .4-.2c.2-.2.2-.4 0-.5l-5-8.8L24 .7V.2z" stroke="none" fill="#666666" stroke-width="2px"/></svg>',
            '8'  => '<svg class="acfb_social_icons acfb_social_whatsapp_main" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M20.1 3.9C17.9 1.7 15 .5 12 .5 5.8.5.7 5.6.7 11.9c0 2 .5 3.9 1.5 5.6L.6 23.4l6-1.6c1.6.9 3.5 1.3 5.4 1.3 6.3 0 11.4-5.1 11.4-11.4-.1-2.8-1.2-5.7-3.3-7.8zM12 21.4c-1.7 0-3.3-.5-4.8-1.3l-.4-.2-3.5 1 1-3.4L4 17c-1-1.5-1.4-3.2-1.4-5.1 0-5.2 4.2-9.4 9.4-9.4 2.5 0 4.9 1 6.7 2.8 1.8 1.8 2.8 4.2 2.8 6.7-.1 5.2-4.3 9.4-9.5 9.4zm5.1-7.1c-.3-.1-1.7-.9-1.9-1-.3-.1-.5-.1-.7.1-.2.3-.8 1-.9 1.1-.2.2-.3.2-.6.1s-1.2-.5-2.3-1.4c-.9-.8-1.4-1.7-1.6-2-.2-.3 0-.5.1-.6s.3-.3.4-.5c.2-.1.3-.3.4-.5.1-.2 0-.4 0-.5C10 9 9.3 7.6 9 7c-.1-.4-.4-.3-.5-.3h-.6s-.4.1-.7.3c-.3.3-1 1-1 2.4s1 2.8 1.1 3c.1.2 2 3.1 4.9 4.3.7.3 1.2.5 1.6.6.7.2 1.3.2 1.8.1.6-.1 1.7-.7 1.9-1.3.2-.7.2-1.2.2-1.3-.1-.3-.3-.4-.6-.5z" stroke="none" fill="#666666" stroke-width="2px"/></svg>',
            '9'  => '<svg class="acfb_social_icons acfb_social_hackernews_main" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 140 140"><path fill-rule="evenodd" d="M60.94 82.314L17 0h20.08l25.85 52.093c.397.927.86 1.888 1.39 2.883.53.994.995 2.02 1.393 3.08.265.4.463.764.596 1.095.13.334.262.63.395.898.662 1.325 1.26 2.618 1.79 3.877.53 1.26.993 2.42 1.39 3.48 1.06-2.254 2.22-4.673 3.48-7.258 1.26-2.585 2.552-5.27 3.877-8.052L103.49 0h18.69L77.84 83.308v53.087h-16.9v-54.08z" stroke="none" fill="#666666" stroke-width="2px"/></svg>',
            '10' => '<svg class="acfb_social_icons acfb_social_vk_main" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M21.547 7h-3.29a.743.743 0 0 0-.655.392s-1.312 2.416-1.734 3.23C14.734 12.813 14 12.126 14 11.11V7.603A1.104 1.104 0 0 0 12.896 6.5h-2.474a1.982 1.982 0 0 0-1.75.813s1.255-.204 1.255 1.49c0 .42.022 1.626.04 2.64a.73.73 0 0 1-1.272.503 21.54 21.54 0 0 1-2.498-4.543.693.693 0 0 0-.63-.403h-2.99a.508.508 0 0 0-.48.685C3.005 10.175 6.918 18 11.38 18h1.878a.742.742 0 0 0 .742-.742v-1.135a.73.73 0 0 1 1.23-.53l2.247 2.112a1.09 1.09 0 0 0 .746.295h2.953c1.424 0 1.424-.988.647-1.753-.546-.538-2.518-2.617-2.518-2.617a1.02 1.02 0 0 1-.078-1.323c.637-.84 1.68-2.212 2.122-2.8.603-.804 1.697-2.507.197-2.507z" stroke="none" fill="#666666" stroke-width="2px"/></svg>',
            '11' => '<svg class="acfb_social_icons acfb_social_telegram_main"xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M.707 8.475C.275 8.64 0 9.508 0 9.508s.284.867.718 1.03l5.09 1.897 1.986 6.38a1.102 1.102 0 0 0 1.75.527l2.96-2.41a.405.405 0 0 1 .494-.013l5.34 3.87a1.1 1.1 0 0 0 1.046.135 1.1 1.1 0 0 0 .682-.803l3.91-18.795A1.102 1.102 0 0 0 22.5.075L.706 8.475z" stroke="none" fill="#666666" stroke-width="2px"/></svg>',
        );
        return $field;
    }
    
    add_filter( 'acf/load_field/name=acfb_post_tiled_collage_three_grid_layouts', 'acfb_post_tiled_three_grid_icons' );
    function acfb_post_tiled_three_grid_icons( $field )
    {
        $field['choices'] = array(
            'one' => '<img src="' . plugins_url( 'img/gthree-three.png', __FILE__ ) . '" />',
        );
        return $field;
    }
    
    add_filter( 'acf/load_field/name=acfb_post_tiled_collage_four_grid_layouts', 'acfb_post_tiled_four_grid_icons' );
    function acfb_post_tiled_four_grid_icons( $field )
    {
        $field['choices'] = array(
            'one' => '<img src="' . plugins_url( 'img/c-gfour-1.png', __FILE__ ) . '" />',
            'two' => '<img src="' . plugins_url( 'img/c-gfour-2.png', __FILE__ ) . '" />',
        );
        return $field;
    }
    
    add_filter( 'acf/load_field/name=acfb_post_tiled_collage_five_grid_layouts', 'acfb_post_tiled_five_grid_icons' );
    function acfb_post_tiled_five_grid_icons( $field )
    {
        $field['choices'] = array(
            'one'   => '<img src="' . plugins_url( 'img/c-gfive-1.png', __FILE__ ) . '" />',
            'two'   => '<img src="' . plugins_url( 'img/c-gfive-2.png', __FILE__ ) . '" />',
            'three' => '<img src="' . plugins_url( 'img/c-gfive-3.png', __FILE__ ) . '" />',
        );
        return $field;
    }
    
    // Hexa Color Convert To Rgb or Rgba
    function hex2rgba( $color, $opacity = false )
    {
        $default = 'rgb(0,0,0)';
        //Return default if no color provided
        if ( empty($color) ) {
            return $default;
        }
        //Sanitize $color if "#" is provided
        if ( $color[0] == '#' ) {
            $color = substr( $color, 1 );
        }
        //Check if color has 6 or 3 characters and get values
        
        if ( strlen( $color ) == 6 ) {
            $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
        } elseif ( strlen( $color ) == 3 ) {
            $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
        } else {
            return $default;
        }
        
        //Convert hexadec to rgb
        $rgb = array_map( 'hexdec', $hex );
        //Check if opacity is set(rgba or rgb)
        
        if ( $opacity ) {
            if ( abs( $opacity ) > 1 ) {
                $opacity = 1.0;
            }
            $output = 'rgba(' . implode( ",", $rgb ) . ',' . $opacity . ')';
        } else {
            $output = 'rgb(' . implode( ",", $rgb ) . ')';
        }
        
        //Return rgb(a) color string
        return $output;
    }
    
    // Post type Select Box Filter
    function acfb_get_post_type( $field )
    {
        $args = array(
            'public' => true,
        );
        $posttype = get_post_types( $args );
        if ( in_array( "attachment", $posttype ) ) {
            unset( $posttype['attachment'] );
        }
        $posttype_items = array();
        foreach ( $posttype as $posttypeitem ) {
            $posttype_items[$posttypeitem] = $posttypeitem;
        }
        $field['choices'] = $posttype_items;
        return $field;
    }
    
    add_filter( 'acf/load_field/name=acfb_post_type', 'acfb_get_post_type' );
    // Taxonomy Select Box Filter
    // function acfb_get_post_taxanomy( $field ) {
    //     $taxonomies = get_object_taxonomies( 'post' );
    //     $tax_items = array();
    //     foreach($taxonomies as $taxonomy) {
    //      $tax_items[] = $taxonomy;
    //     }
    //     $field['choices'] = $tax_items;
    //     return $field;
    // }
    // add_filter('acf/load_field/name=acfb_taxonomy', 'acfb_get_post_taxanomy');
    // Terms Select Box Filter
    // function acfb_get_post_terms( $field ) {
    //     $terms = get_terms([
    //         'taxonomy' => 'category',
    //         'hide_empty' => false,
    //     ]);
    //     $items = array();
    //     foreach($terms as $term) {
    //      $items[] = $term->name;
    //     }
    //     $field['choices'] = $items;
    //     return $field;
    // }
    // add_filter('acf/load_field/name=acfb_taxonomy_terms', 'acfb_get_post_terms');
    // Template Overide
    function acf_blocks_template( $block )
    {
        $acfb_temp = str_replace( "acf/", "", $block['name'] );
        // Look for a file in theme
        
        if ( $theme_template = locate_template( 'acfblocks-templates/' . $acfb_temp . '.php' ) ) {
            require $theme_template;
        } else {
            // Nothing found, let's look in our plugin
            $free_template = plugin_dir_path( __FILE__ ) . 'acfblocks-templates/free/' . $acfb_temp . '.php';
            $pro_template = plugin_dir_path( __FILE__ ) . 'acfblocks-templates/pro/' . $acfb_temp . '.php';
            if ( file_exists( $free_template ) ) {
                require $free_template;
            }
            if ( file_exists( $pro_template ) ) {
                require $pro_template;
            }
        }
    
    }
    
    // Admin Page
    if ( file_exists( plugin_dir_path( __FILE__ ) . '/admin/class-acf-admin-page.php' ) ) {
        require_once plugin_dir_path( __FILE__ ) . '/admin/class-acf-admin-page.php';
    }
    add_action( 'admin_enqueue_scripts', 'acfb_admin_styles' );
    function acfb_admin_styles()
    {
        wp_enqueue_style(
            'admin_css_foo',
            plugin_dir_url( __FILE__ ) . '/admin/admin-styles.css',
            false,
            '1.0.0'
        );
        wp_enqueue_script(
            'acfb_admin_scirpt',
            plugin_dir_url( __FILE__ ) . '/admin/admin-script.js',
            false,
            ''
        );
    }
    
    function acfb_enqueue_scripts()
    {
        wp_enqueue_style( 'dashicons' );
    }
    
    add_action( 'wp_enqueue_scripts', 'acfb_enqueue_scripts', 999 );
    // Acf Custom field
    // check if class already exists
    
    if ( !class_exists( 'acfb_acf_plugin_typography' ) ) {
        class acfb_acf_plugin_typography
        {
            // vars
            var  $settings ;
            function __construct()
            {
                // settings
                // - these will be passed into the field class.
                $this->settings = array(
                    'version' => '2.0.0',
                    'url'     => plugin_dir_url( __FILE__ ),
                    'path'    => plugin_dir_path( __FILE__ ),
                );
                // include field
                add_action( 'acf/include_field_types', array( $this, 'include_field' ) );
                // v5
                add_action( 'acf/register_fields', array( $this, 'include_field' ) );
                // v4
            }
            
            function include_field( $version = false )
            {
                // include
                include_once 'fields/class-acfb-acf-field-typography-v' . $version . '.php';
                include_once 'fields/class-acfb-acf-field-padding-v' . $version . '.php';
                include_once 'fields/class-acfb-acf-field-margin-v' . $version . '.php';
            }
        
        }
        // initialize
        new acfb_acf_plugin_typography();
        // class_exists check
    }
    
    function get_value( $field_id, $fields )
    {
        $value = get_field( $field_id );
        
        if ( is_null( $value ) ) {
            $defaults = get_field_object( $field_id );
            $v = array();
            foreach ( $fields as $field ) {
                $v[$field] = $defaults[$field] ?? "";
            }
            return $v;
        } else {
            return $value;
        }
    
    }
    
    function build_css( $selectors )
    {
        foreach ( $selectors as $key => $css ) {
            if ( $css !== 'default' and $css !== '' ) {
                echo  $key . ':' . $css . ';' ;
            }
        }
    }
    
    function get_typo_field( $typo_name )
    {
        ?>
    font-size: <?php 
        echo  $typo_name['font_size'] ;
        ?>px;
    <?php 
        echo  build_css( array(
            'font-family'     => get_family( $typo_name['font_family'] ),
            'font-weight'     => $typo_name['font_weight'],
            'text-transform'  => $typo_name['font_transform'],
            'font-style'      => $typo_name['font_style'],
            'text-decoration' => $typo_name['font_decoration'],
        ) ) ;
        ?>
    <?php 
        
        if ( $typo_name['font_line_height'] > 0.1 ) {
            ?>
    line-height: <?php 
            echo  $typo_name['font_line_height'] ;
            ?>;
    <?php 
        }
        
        ?>
    <?php 
        
        if ( $typo_name['font_letter_spacing'] ) {
            ?>
    letter-spacing: <?php 
            echo  $typo_name['font_letter_spacing'] ;
            ?>px;
     <?php 
        }
    
    }
    
    function get_padding_field( $padding_name )
    {
        ?>
     <?php 
        
        if ( $padding_name['padding_top'] ) {
            ?>
        padding-top: <?php 
            echo  $padding_name['padding_top'] ;
            ?>px;
     <?php 
        }
        
        ?>
     <?php 
        
        if ( $padding_name['padding_bottom'] ) {
            ?>
        padding-bottom: <?php 
            echo  $padding_name['padding_bottom'] ;
            ?>px;
     <?php 
        }
        
        ?>
     <?php 
        
        if ( $padding_name['padding_left'] ) {
            ?>
        padding-left: <?php 
            echo  $padding_name['padding_left'] ;
            ?>px;
     <?php 
        }
        
        ?>
     <?php 
        
        if ( $padding_name['padding_right'] ) {
            ?>
        padding-right: <?php 
            echo  $padding_name['padding_right'] ;
            ?>px;
     <?php 
        }
        
        ?>
    <?php 
    }
    
    function get_margin_field( $margin_name )
    {
        ?>
    <?php 
        
        if ( $margin_name['margin_top'] ) {
            ?>
        margin-top: <?php 
            echo  $margin_name['margin_top'] ;
            ?>px;
     <?php 
        }
        
        ?>
     <?php 
        
        if ( $margin_name['margin_bottom'] ) {
            ?>
        margin-bottom: <?php 
            echo  $margin_name['margin_bottom'] ;
            ?>px;
     <?php 
        }
        
        ?>
     <?php 
        
        if ( $margin_name['margin_left'] ) {
            ?>
        margin-left: <?php 
            echo  $margin_name['margin_left'] ;
            ?>px;
     <?php 
        }
        
        ?>
     <?php 
        
        if ( $margin_name['margin_right'] ) {
            ?>
        margin-right: <?php 
            echo  $margin_name['margin_right'] ;
            ?>px;
     <?php 
        }
        
        ?>
    <?php 
    }
    
    function acfb_padding_name( $acfb_pname )
    {
        return get_value( $acfb_pname, array(
            'padding_top',
            'padding_right',
            'padding_bottom',
            'padding_left'
        ) );
    }
    
    function acfb_margin_name( $acfb_mname )
    {
        return get_value( $acfb_mname, array(
            'margin_top',
            'margin_right',
            'margin_bottom',
            'margin_left'
        ) );
    }
    
    function acfb_ffaimly_name( $acfb_fname )
    {
        return get_value( $acfb_fname, array(
            'font_family',
            'font_size',
            'font_weight',
            'font_transform',
            'font_style',
            'font_decoration',
            'font_line_height',
            'font_letter_spacing'
        ) );
    }
    
    // Acf meta Field Default Value
    function acfb_meta_select_field( $field )
    {
        $value = get_field( 'acfb_meta_select_field' );
        $key = $field['key'];
        ?>
        <script>
            window.<?php 
        echo  $key ;
        ?> = `<?php 
        echo  $value ;
        ?>`;
        </script>

    <?php 
    }
    
    // Apply to all fields.
    add_action( 'acf/render_field/name=acfb_meta_select_field', 'acfb_meta_select_field' );
    add_filter(
        'upload_mimes',
        'acfb_custom_mimes_types',
        1,
        1
    );
    function acfb_custom_mimes_types( $acfb_mime_types )
    {
        $acfb_mime_types['json'] = 'text/plain';
        // Adding .json extension
        return $acfb_mime_types;
    }
    
    // Functions Code
    function parse_link( $fields )
    {
        $acfb_families = array();
        foreach ( $fields as $key => $field ) {
            
            if ( is_array( $field ) and array_key_exists( 'font_family', $field ) ) {
                $acfb_font_family = $field['font_family'];
                if ( $acfb_font_family !== "" and $acfb_font_family !== NULL and $acfb_font_family !== 'default' ) {
                    $acfb_families[] = $acfb_font_family;
                }
            }
        
        }
        
        if ( !empty($acfb_families) ) {
            $family_merges = join( '&family=', $acfb_families );
            return "<link href='https://fonts.googleapis.com/css2?family={$family_merges}' rel='stylesheet'>";
        } else {
            return "";
        }
    
    }
    
    function get_family( $family )
    {
        return str_replace( '+', " ", $family );
    }
    
    function getCustomField( $field_name, $post_id )
    {
        $selected_field = get_field( $field_name );
        $selected_field_data = json_decode( $selected_field, true );
        return [
            'type'  => $selected_field_data['type'],
            'value' => get_field( $selected_field_data['name'], $post_id ),
        ];
    }
    
    // retrieves the attachment ID from the file URL for acf meta gallery
    function acfb_meta_gallery_get_image_id( $acfb_meta_gallery_image_url )
    {
        global  $wpdb ;
        $attachment = $wpdb->get_col( $wpdb->prepare( "SELECT ID FROM {$wpdb->posts} WHERE guid='%s';", $acfb_meta_gallery_image_url ) );
        return $attachment[0];
    }

}

// freemius end