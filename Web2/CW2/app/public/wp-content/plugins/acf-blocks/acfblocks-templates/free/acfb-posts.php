<?php 
echo parse_link(
    array(
        get_field('acfb_post_title_typo'),
        get_field('acfb_post_meta_typo'),
        get_field('acfb_post_excerpt_typo'),
        get_field('acfb_post_button_typo')
    )
);

$acfb_post_button_padding = acfb_padding_name('acfb_post_button_padding');
$acfb_post_padding = acfb_padding_name('acfb_post_padding');
$acfb_post_margin = acfb_margin_name('acfb_post_margin');
$acfb_post_title_typo = acfb_ffaimly_name('acfb_post_title_typo');
$acfb_post_meta_typo = acfb_ffaimly_name('acfb_post_meta_typo');
$acfb_post_excerpt_typo = acfb_ffaimly_name('acfb_post_excerpt_typo');
$acfb_post_button_typo = acfb_ffaimly_name('acfb_post_button_typo');


$uid = $block['id'];

$className = 'acfb_posts_block';
if( !empty($block['className']) ) {
   $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
   $className .= ' align' . $block['align'];
}

?>

<div class="<?php echo $uid; ?> <?php echo esc_attr($className); ?>">

<?php 
$acfb_posts_layout = get_field('acfb_posts_layout');
$acfb_number_of_posts = get_field('acfb_number_of_posts');
$acfb_posts_columns = get_field('acfb_posts_columns');
$acfb_post_excerpt_length = get_field('acfb_post_excerpt_length');
$acfb_post_title_html_tag = get_field('acfb_post_title_html_tag');
?>
<style type="text/css">
.<?php echo $uid; ?> {
  <?php echo get_padding_field($acfb_post_padding); ?>
  <?php echo get_margin_field($acfb_post_margin); ?>
}

.<?php echo $uid; ?> .acfb_post {
	background: <?php the_field('acfb_post_background_color'); ?>;
}

<?php if( get_field('acfb_post_title_custom_typography') == '1' ): ?>
.<?php echo $uid; ?> .acfb_post .acfb_post_title a{
	<?php echo get_typo_field($acfb_post_title_typo); ?>
}
<?php endif; ?>

<?php if( get_field('acfb_post_title_custom_color') == '1' ): ?>
.<?php echo $uid; ?> .acfb_post .acfb_post_title a{
	color: <?php the_field('acfb_post_title_color'); ?> !important;
}

.<?php echo $uid; ?> .acfb_post .acfb_post_title a:hover{
	color: <?php the_field('acfb_post_title_hover_color'); ?> !important;
}
<?php endif; ?>


<?php if( get_field('acfb_post_meta_custom_typography') == '1' ): ?>
.<?php echo $uid; ?> .acfb_post .acfb_post_meta{
	<?php echo get_typo_field($acfb_post_meta_typo); ?>
}
<?php endif; ?>

<?php if( get_field('acfb_post_meta_custom_color') == '1' ): ?>
.<?php echo $uid; ?> .acfb_post .acfb_post_meta{
	color: <?php the_field('acfb_post_meta_color'); ?>;
}
<?php endif; ?>

<?php if( get_field('acfb_post_excerpt_custom_typography') == '1' ): ?>
.<?php echo $uid; ?> .acfb_post .acfb_post_excerpt{
	<?php echo get_typo_field($acfb_post_excerpt_typo); ?>
}
<?php endif; ?>

<?php if( get_field('acfb_post_excerpt_custom_color') == '1' ): ?>
.<?php echo $uid; ?> .acfb_post .acfb_post_excerpt{
	color: <?php the_field('acfb_post_excerpt_color'); ?>;
}
<?php endif; ?>


<?php if( get_field('acfb_post_button_custom_typography') == '1' ): ?>
.<?php echo $uid; ?> .acfb_post .acfb_post_button a{
	<?php echo get_typo_field($acfb_post_button_typo); ?>
}
<?php endif; ?>

<?php if( get_field('acfb_post_button_custom_color') == '1' ): ?>
.<?php echo $uid; ?> .acfb_post .acfb_post_button a{
	background-color: <?php the_field('acfb_post_button_background_color'); ?>;
	color: <?php the_field('acfb_post_button_text_color'); ?> !important;
	padding-top: <?php echo $acfb_post_button_padding['padding_top']; ?>px;
    padding-bottom: <?php echo $acfb_post_button_padding['padding_bottom']; ?>px;
    padding-left: <?php echo $acfb_post_button_padding['padding_left']; ?>px;
    padding-right: <?php echo $acfb_post_button_padding['padding_right']; ?>px;
}

.<?php echo $uid; ?> .acfb_post .acfb_post_button a:hover{
	background-color: <?php the_field('acfb_post_button_background_hover_color'); ?>;
	color: <?php the_field('acfb_post_button_text_hover_color'); ?> !important;
}
<?php endif; ?>
</style>


<?php

$acfb_grid_col = '';
if($acfb_posts_layout == 'grid'){
	$acfb_grid_col = "acfb_post_" . $acfb_posts_columns; 
}

$acfb_cat = get_field( 'acfb_category_filters' );

$acfb_cat_names = array();  
if(is_array($acfb_cat)){
foreach($acfb_cat as $catskey => $catsval){
	 $acfb_cat_names[] = $catsval;
}
}

$args = array(
	'post_type' => 'post',
	'post_status' => 'publish',
	'posts_per_page' => $acfb_number_of_posts, 
	'cat' => $acfb_cat_names,
);


// the query
$the_query = new WP_Query( $args ); ?>

<?php if ( $the_query->have_posts() ) : ?>

<div class="acfb_post_<?php echo $acfb_posts_layout; ?> <?php echo $acfb_grid_col; ?>">

	<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

 	<?php 
 	$acfb_thumb = '';
 	if ( has_post_thumbnail() ){
 		$acfb_thumb = 'thumb';
 	} else {
		$acfb_thumb = 'no_thumb';
 	}
 	?>

		<div class="acfb_post <?php echo $acfb_thumb; ?>">

			<?php
			if($acfb_posts_layout == 'list'){ ?>

				<!-- List -->
				<div class="acfb_post_list_thumbnail">	
					<?php the_post_thumbnail(); ?>
				</div>
				<div class="acfb_post_list_content">
				<?php
				if( have_rows('acfb_post_list_elements') ):

				while ( have_rows('acfb_post_list_elements') ) : the_row(); ?>

				    <?php if( get_row_layout() == 'post_list_title' ): ?>
				    	<div class="acfb_post_title">	
				       		 <<?php echo $acfb_post_title_html_tag; ?>><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></<?php echo $acfb_post_title_html_tag; ?>>
				   		</div>
				    <?php endif; ?>

				    <?php if( get_row_layout() == 'post_list_meta_data' ): ?>
				    	<div class="acfb_post_meta">
				    		<span class="acfb_post_author"><?php the_author(); ?></span> -
							<span class="acfb_post_date"><?php the_time('F jS, Y') ?></span>
						</div>
				    <?php endif; ?>
				      
				    <?php if( get_row_layout() == 'post_list_content' ): ?>
				    	<div class="acfb_post_excerpt">
				        	<?php echo acfb_excerpt($acfb_post_excerpt_length); ?>
				    	</div>
				    <?php endif; ?>

					<?php if( get_row_layout() == 'post_list_read_more_button' ): ?>
						<div class="acfb_post_button">
							<a href="<?php the_permalink(); ?>" class="acfb_post_btn">Read More</a>
						</div>
				    <?php endif; ?>
				    

				<?php
				endwhile;
				endif;
				?>
				</div>

			<?php } elseif ($acfb_posts_layout == 'grid') { ?>

				<!-- Grid -->
				<?php
				if( have_rows('acfb_post_grid_elements') ):

				while ( have_rows('acfb_post_grid_elements') ) : the_row(); ?>

				    <?php if( get_row_layout() == 'post_grid_image' ): ?>
				        <div class="acfb_post_thumbnail">	
				        	<?php the_post_thumbnail(); ?>
				        </div>
				    <?php endif; ?>

				    <?php if( get_row_layout() == 'post_grid_title' ): ?>
				    	<div class="acfb_post_title">	
				       		 <<?php echo $acfb_post_title_html_tag; ?>><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></<?php echo $acfb_post_title_html_tag; ?>>
				   		</div>
				    <?php endif; ?>

				    <?php if( get_row_layout() == 'post_grid_meta_data' ): ?>
				    	<div class="acfb_post_meta">
				    		<span class="acfb_post_author"><?php the_author(); ?></span> -
							<span class="acfb_post_date"><?php the_time('F jS, Y') ?></span>
						</div>
				    <?php endif; ?>
				      
				    <?php if( get_row_layout() == 'post_grid_content' ): ?>
				    	<div class="acfb_post_excerpt">
				        	<?php echo acfb_excerpt($acfb_post_excerpt_length); ?>
				    	</div>
				    <?php endif; ?>

					<?php if( get_row_layout() == 'post_grid_read_more_button' ): ?>
						<div class="acfb_post_button">
							<a href="<?php the_permalink(); ?>" class="acfb_post_btn">Read More</a>
						</div>
				    <?php endif; ?>
				    

				<?php
				endwhile;
				endif;
				?>

			<?php }	?>

		</div>
	<?php endwhile; ?>

</div>

<?php wp_reset_postdata(); ?>

<?php else : ?>
	<p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>

</div><!-- Uid -->