<!--This is a behind the scenes file that will be called by WordPress-->
<?php 
    function university_files(){
        wp_enqueue_style('university_main_styles',get_stylesheet_uri());
        //nickname for stylesheet, 
        wp_enqueue_style('font-awesome','https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
        wp_enqueue_style('custom-google-font','https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
        
    }

    function university_features(){
        add_theme_support('title-tag');
        register_nav_menu('headerMenuLocation', 'Header Menu Location');
    }
    add_action('wp_enqueue_scripts', 'university_files');  
    // type of instruction for WordPress to run, function name to run
    add_action('after_setup_theme', 'university_features');

?>