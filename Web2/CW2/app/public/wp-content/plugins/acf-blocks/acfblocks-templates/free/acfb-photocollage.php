<?php
$acfb_photo_collage_padding = acfb_padding_name('acfb_photo_collage_padding');
$acfb_photo_collage_margin = acfb_margin_name('acfb_photo_collage_margin');

$uid = $block['id'];

$className = 'acfb_photo_collage_block';
if( !empty($block['className']) ) {
   $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
   $className .= ' align' . $block['align'];
}

$images_field = get_field('acfb_photo_collage_images');
$images0 = null;
$images1 = null;
$images2 = null;
$images3 = null;


if($images_field){
	$images0 = $images_field['0']['url'];
} else{
	$images0 = plugins_url() . '/acf-blocks/img/placeholder-image.jpg';
}

if ( $images_field && count($images_field) > 1 ) {
	$images1 = $images_field['1']['url'];
} else{
	$images1 = plugins_url() . '/acf-blocks/img/placeholder-image.jpg';
} 

if ( $images_field && count($images_field) > 2 ) {
	$images2 = $images_field['2']['url'];
} else{
	$images2 = plugins_url() . '/acf-blocks/img/placeholder-image.jpg';
}

if ( $images_field && count($images_field) > 3 ) {
	$images3 = $images_field['3']['url'];
} else{
	$images3 = plugins_url() . '/acf-blocks/img/placeholder-image.jpg';
}

?>


<div class="<?php echo $uid; ?> <?php echo esc_attr($className); ?>">
<style type="text/css">
.<?php echo $uid; ?>{
  <?php echo get_padding_field($acfb_photo_collage_padding); ?>
  <?php echo get_margin_field($acfb_photo_collage_margin); ?>
}


.<?php echo $uid; ?> .acfb_photo_collage{
  width: <?php the_field('acfb_photo_collage_layout_width'); ?>%;
  height: <?php the_field('acfb_photo_collage_layout_height'); ?>px;
  grid-gap: <?php the_field('acfb_photo_collage_layout_gutter_space'); ?>px;
}
</style>


<?php if(get_field('select_grid') == '2'): ?>

<div class="acfb_two-grid-style-<?php the_field('2_grid_layouts');?> acfb_collage_<?php the_field('select_grid');?> acfb_photo_collage">
  <div class="acfb_one" style="background-image: url('<?php echo $images0; ?>');"></div>
  <div class="acfb_two" style="background-image: url('<?php echo $images1; ?>');"></div>
</div>

<?php elseif( get_field('select_grid') == '3' ): ?>

<div class="acfb_three-grid-style-<?php the_field('3_grid_layouts');?> acfb_collage_<?php the_field('select_grid');?> acfb_photo_collage">
  <div class="acfb_one" style="background-image: url('<?php echo $images0; ?>');"></div>
  <div class="acfb_two" style="background-image: url('<?php echo $images1; ?>');"></div>
  <div class="acfb_three" style="background-image: url('<?php echo $images2; ?>');"></div>
</div>

<?php elseif( get_field('select_grid') == '4' ): ?>

<div class="acfb_four-grid-style-<?php the_field('4_grid_layouts');?> acfb_collage_<?php the_field('select_grid');?> acfb_photo_collage">
  <div class="acfb_one" style="background-image: url('<?php echo $images0; ?>');"></div>
  <div class="acfb_two" style="background-image: url('<?php echo $images1; ?>');"></div>
  <div class="acfb_three" style="background-image: url('<?php echo $images2; ?>');"></div>
  <div class="acfb_four" style="background-image: url('<?php echo $images3; ?>');"></div>
</div>

<?php endif; ?>

</div><!-- Uid -->