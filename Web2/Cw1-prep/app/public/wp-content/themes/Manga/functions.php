<?php
    function university_files(){
        wp_enqueue_style('university_main_styles', get_stylesheet_uri());
        wp_enqueue_style('font-awesome','https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
        wp_enqueue_style('custom-google-font','https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
    }
    add_action('wp_enqueue_scripts', 'university_files');
