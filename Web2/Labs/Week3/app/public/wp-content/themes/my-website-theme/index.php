<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thematic</title>
</head>
<body>
    <?php get_header(); ?>
    
    <?php echo "<h1> Theme Index </h1>";

        while(have_posts()){
            the_post();?>
                <h2><a href='
            <?php the_permalink(); ?>
                '>
            <?php the_title(); ?>
                </a></h2>
            <?php
            the_content();
        }

    ?>
    

    <?php get_footer(); 
        wp_footer();
    ?>
</body>
</html>