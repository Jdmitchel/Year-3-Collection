<?php 
echo parse_link(
    array(
        get_field('acfb_price_list_title_typo'),
        get_field('acfb_price_list_description_typo')
    )
);


$acfb_price_list_padding = acfb_padding_name('acfb_price_list_padding');
$acfb_price_list_margin = acfb_margin_name('acfb_price_list_margin');
$acfb_price_list_title_typo = acfb_ffaimly_name('acfb_price_list_title_typo');
$acfb_price_list_description_typo = acfb_ffaimly_name('acfb_price_list_description_typo');

$uid = $block['id'];

$className = 'acfb_price_list_block';
if( !empty($block['className']) ) {
   $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
   $className .= ' align' . $block['align'];
}

?>
<div class="<?php echo $uid; ?> <?php echo esc_attr($className); ?>">
<style type="text/css">
.<?php echo $uid; ?> {
  <?php echo get_padding_field($acfb_price_list_padding); ?>
  <?php echo get_margin_field($acfb_price_list_margin); ?>
}

<?php if(get_field('acfb_price_list_image_position') == 'acfb_price_list_image_top'): ?>
  .<?php echo $uid; ?> .acfb_price_list_wrap .acfb_price_list_item{
  grid-template-areas: 'acfbPli' 'acfbPlt';
}

.<?php echo $uid; ?> .acfb_price_list_wrap .acfb_price_list_item .acfb_price_list_text{
	margin-top: 10px;
}

.<?php echo $uid; ?> .acfb_price_list_wrap .acfb_price_list_item .acfb_price_list_text .acfb_price_list_header{
	grid-template-areas: 'acfbPlTitle acfbPlSep acfbPlPrice'; 
}

<?php elseif(get_field('acfb_price_list_image_position') == 'acfb_price_list_image_left'): ?>
  .<?php echo $uid; ?> .acfb_price_list_wrap .acfb_price_list_item{
  grid-template-columns: 20% auto;
  grid-template-areas: 'acfbPli acfbPlt';
}

.<?php echo $uid; ?> .acfb_price_list_wrap .acfb_price_list_item .acfb_price_list_text .acfb_price_list_header{
	grid-template-areas: 'acfbPlTitle acfbPlSep acfbPlPrice'; 
}

<?php elseif(get_field('acfb_price_list_image_position') == 'acfb_price_list_image_right'): ?>
  .<?php echo $uid; ?> .acfb_price_list_wrap .acfb_price_list_item{
  grid-template-columns: auto 20%;
  grid-template-areas: 'acfbPlt acfbPli';
 }

 .<?php echo $uid; ?> .acfb_price_list_wrap .acfb_price_list_item .acfb_price_list_text .acfb_price_list_header{
 	grid-template-areas: 'acfbPlPrice acfbPlSep acfbPlTitle'; 
 }

  .<?php echo $uid; ?> .acfb_price_list_wrap .acfb_price_list_item .acfb_price_list_text{
 	text-align: right;
 }
<?php endif; ?>	

.<?php echo $uid; ?> .acfb_price_list_wrap .acfb_price_list_item .acfb_price_list_text .acfb_price_list_header{
    color: <?php the_field('acfb_price_list_title_&_price_color'); ?>;
   <?php echo get_typo_field($acfb_price_list_title_typo); ?>
}

.<?php echo $uid; ?> .acfb_price_list_wrap .acfb_price_list_item .acfb_price_list_text .acfb_price_list_header .acfb_price_list_separator {
    border-bottom-style: <?php the_field('acfb_price_list_separator_styles'); ?>;
    border-bottom-width: <?php the_field('acfb_price_list_separator_size'); ?>px;
    border-bottom-color: <?php the_field('acfb_price_list_separator_color'); ?>;

}

.<?php echo $uid; ?> .acfb_price_list_wrap .acfb_price_list_item .acfb_price_list_text p.acfb_price_list_description {
    color: <?php the_field('acfb_price_list_description_color'); ?>;
   <?php echo get_typo_field($acfb_price_list_description_typo); ?>
}

</style>


<?php
$acfb_image = '';
if(!get_field('acfb_price_list_image')){
	$acfb_image = plugins_url() . '/acf-blocks/img/placeholder-image.jpg';
} else{
	$acfb_image = get_field('acfb_price_list_image');
}
?>

<div class="acfb_price_list_wrap">
<a href="<?php the_field('acfb_price_list_link'); ?>" class="acfb_price_list_item">	
	<div class="acfb_price_list_image">
	<img src="<?php echo $acfb_image; ?>" alt="<?php the_field('acfb_price_list_image_alt'); ?>">
	</div>
	<div class="acfb_price_list_text">
		<div class="acfb_price_list_header">
			<span class="acfb_price_list_title"><?php the_field('acfb_price_list_title'); ?></span>
			<span class="acfb_price_list_separator"></span>
			<span class="acfb_price_list_price"><?php the_field('acfb_price_list_price_prefix'); ?><?php the_field('acfb_price_list_price'); ?></span>
		</div>
		<p class="acfb_price_list_description"><?php the_field('acfb_price_list_description'); ?></p>
	</div>
</a>
</div>

</div><!-- Uid -->