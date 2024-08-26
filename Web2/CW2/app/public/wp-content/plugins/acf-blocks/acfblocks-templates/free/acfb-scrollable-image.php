<?php 
$acfb_scrollable_image_padding = acfb_padding_name('acfb_scrollable_image_padding');
$acfb_scrollable_image_margin = acfb_margin_name('acfb_scrollable_image_margin');

$uid = $block['id'];

$className = 'acfb_scrollable_image_block';
if( !empty($block['className']) ) {
   $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
   $className .= ' align' . $block['align'];
}

?>
<div class="<?php echo $uid; ?> <?php echo esc_attr($className); ?>">
<style type="text/css">
.<?php echo $uid; ?>{
  <?php echo get_padding_field($acfb_scrollable_image_padding); ?>
  <?php echo get_margin_field($acfb_scrollable_image_margin); ?>
}

.<?php echo $uid; ?> .acfb_scrollable_image{
	min-height: <?php the_field('acfb_scrollable_image_height'); ?>px;
}

.<?php echo $uid; ?> .acfb_scrollable_image:hover{
	 transition: background-position <?php the_field('acfb_scrollable_image_hover_scroll_speed'); ?>s linear 0s;
}
</style>

<?php
$acfb_image = '';
if(!get_field('acfb_scrollable_image')){
	$acfb_image = plugins_url() . '/acf-blocks/img/placeholder-vertical.jpg';
} else{
	$acfb_image = get_field('acfb_scrollable_image');
}
?>

	<div class="acfb_scrollable_image" style="background-image: url('<?php echo $acfb_image; ?>')"></div>

</div><!-- Uid -->