<?php

    function publisher_files(){
        //wp_enqueue_style('publisher_main_styles', get_stylesheet_uri('/css/style.css'));
        wp_enqueue_style('publisher-css', get_theme_file_uri('/css'));
       /*  wp_enqueue_style('publisher-css', get_theme_file_uri('/css/bootstrap.min.css'));
        wp_enqueue_style('publisher-css', get_theme_file_uri('/css/style.css'));
        wp_enqueue_style('publisher-css', get_theme_file_uri('/css/responsive.css')); */
        wp_enqueue_style('publisher-fonts', get_theme_file_uri('/fonts'));
        wp_enqueue_style('publisher-imgs', get_theme_file_uri('/img'));
        wp_enqueue_style('publisher-js', get_theme_file_uri('/js'));
    }

    function publisher_features(){
        add_theme_support('title-tag');
    }

    add_action('wp_enqueue_scripts', 'publisher_files');
