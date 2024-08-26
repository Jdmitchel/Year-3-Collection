<?php
$uid = $block['id'];

$className = 'acfb_random_image_block';
if( !empty($block['className']) ) {
   $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
   $className .= ' align' . $block['align'];
}

$placeholders = [
	'https://p111.p2.n0.cdn.getcloudapp.com/items/RBuWl6Bk/Image%202020-10-16%20at%205.07.13%20PM.jpg',
	'https://p111.p2.n0.cdn.getcloudapp.com/items/2Nujq1bx/Image%202020-10-16%20at%205.07.37%20PM.jpg',
	'https://p111.p2.n0.cdn.getcloudapp.com/items/JrugDAyd/Image%202020-10-16%20at%205.07.31%20PM.jpg',
	'https://p111.p2.n0.cdn.getcloudapp.com/items/ApuLz6eb/Image%202020-10-16%20at%205.07.23%20PM.jpgg',
];

$acfb_random_image_margin = acfb_padding_name('acfb_random_image_margin');
$acfb_random_image_padding = acfb_margin_name('acfb_random_image_padding');
$acfb_random_image_gallery = get_field('acfb_random_images');

$final_random_image_gallery = is_array($acfb_random_image_gallery) ? $acfb_random_image_gallery : $placeholders;



?>
<div class="<?php echo $uid; ?> <?php echo esc_attr($className); ?>">
<style type="text/css">
.<?php echo $uid; ?>{
  <?php echo get_padding_field($acfb_random_image_padding); ?>
  <?php echo get_margin_field($acfb_random_image_margin); ?>
}

.<?php echo $uid; ?> .acfb_random_image{
	display: flex;
	justify-content: <?php the_field('acfb_random_image_alignment'); ?>;
}

.<?php echo $uid; ?> .acfb_random_image img{
	width: <?php the_field("acfb_random_image_width"); ?>%;
}

</style>

<div class="acfb_random_image">
	<img src="" class="acfb_ri" data-random-image="<?php echo implode(',', $final_random_image_gallery); ?>"  />
</div>

</div><!-- Uid -->