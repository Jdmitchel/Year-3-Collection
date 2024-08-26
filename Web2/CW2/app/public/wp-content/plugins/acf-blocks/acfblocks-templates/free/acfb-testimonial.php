<?php
echo parse_link(
	array(
		get_field('acfb_testimonial_text_typo'),
		get_field('acfb_testimonial_name_typo'),
		get_field('acfb_testimonial_position_typo')
	)
);

$uid = $block['id'];

$acfb_testimonial_inner_padding = acfb_padding_name('acfb_testimonial_inner_padding');
$acfb_testimonial_padding = acfb_padding_name('acfb_testimonial_padding');
$acfb_testimonial_margin = acfb_margin_name('acfb_testimonial_margin');
$acfb_testimonial_text_typo = acfb_ffaimly_name('acfb_testimonial_text_typo');
$acfb_testimonial_name_typo = acfb_ffaimly_name('acfb_testimonial_name_typo');
$acfb_testimonial_position_typo = acfb_ffaimly_name('acfb_testimonial_position_typo');



$className = 'acfb_testimonial_block';
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
	<?php echo get_padding_field($acfb_testimonial_padding); ?>
	<?php echo get_margin_field($acfb_testimonial_margin); ?>
}	

.<?php echo $uid; ?> .acfb_testimonial_wrap{
	background-color: <?php the_field('acfb_testimonial_background_color'); ?>;
	padding-top: <?php echo $acfb_testimonial_inner_padding['padding_top']; ?>px;
	padding-bottom: <?php echo $acfb_testimonial_inner_padding['padding_bottom']; ?>px;
	padding-left: <?php echo $acfb_testimonial_inner_padding['padding_left']; ?>px;
	padding-right: <?php echo $acfb_testimonial_inner_padding['padding_right']; ?>px;
}

.<?php echo $uid; ?> .acfb_testimonial_wrap .acfb_testimonial_text{
	color: <?php the_field('acfb_testimonial_text_color'); ?>;
	<?php echo get_typo_field($acfb_testimonial_text_typo); ?>
}

.<?php echo $uid; ?> .acfb_testimonial_wrap .acfb_testimonial_bio .acfb_testimonial_avatar_wrap{
	height: <?php the_field('acfb_testimonial_image_size'); ?>px;
	width: <?php the_field('acfb_testimonial_image_size'); ?>px;
}

.<?php echo $uid; ?> .acfb_testimonial_wrap .acfb_testimonial_bio .acfb_testimonial_name{
	color: <?php the_field('acfb_testimonial_name_color'); ?>;
	<?php echo get_typo_field($acfb_testimonial_name_typo); ?>
}

.<?php echo $uid; ?> .acfb_testimonial_wrap .acfb_testimonial_bio .acfb_testimonial_position{
	color: <?php the_field('acfb_testimonial_position_color'); ?>;
	<?php echo get_typo_field($acfb_testimonial_position_typo); ?>
}

.<?php echo $uid; ?> .acfb_testimonial_wrap .acfb_testimonial_bio .acfb_testimonial_avatar_wrap .acfb_testimonial_avatar{
	  border: solid 2px <?php the_field('acfb_testimonial_image_border_color'); ?>;
}

.<?php echo $uid; ?> .acfb_testimonial_wrap{
	<?php if(get_field('acfb_testimonial_alignment') === 'left'): ?>
	text-align: left;
	align-items: flex-start;
	<?php elseif (get_field('acfb_testimonial_alignment') === 'center'): ?>
	text-align: center;
	align-items: center;
	<?php elseif (get_field('acfb_testimonial_alignment') === 'right'): ?>
	text-align: right;
	align-items: flex-end;
	<?php endif; ?>
}

<?php if(get_field('acfb_testimonial_image_position') == 'acfb_testimonial_image_top'): ?>

.<?php echo $uid; ?> .acfb_testimonial_wrap .acfb_testimonial_bio{
	flex-direction: column;
	align-items: inherit;
}

.<?php echo $uid; ?> .acfb_testimonial_wrap .acfb_testimonial_bio .acfb_testimonial_avatar_wrap{
	margin-right: 0;
	margin-bottom: 10px;
}

<?php else: ?>
.<?php echo $uid; ?> .acfb_testimonial_wrap .acfb_testimonial_bio{

	<?php if(get_field('acfb_testimonial_alignment') === 'left'): ?>
	justify-content: flex-start;
	text-align: left;
	<?php elseif (get_field('acfb_testimonial_alignment') === 'center'): ?>
	justify-content: center;
	text-align: left;
	<?php elseif (get_field('acfb_testimonial_alignment') === 'right'): ?>
	justify-content: flex-end;
	text-align: left;
	<?php endif; ?>
}

<?php endif; ?>


</style>

<?php
$acfb_image = '';
if(!get_field('acfb_testimonial_image')){
	$acfb_image = plugins_url() . '/acf-blocks/img/placeholder-image.jpg';
} else{
	$acfb_image = get_field('acfb_testimonial_image');
}
?>


<div class="acfb_testimonial_wrap">
	<div class="acfb_testimonial_text">
		<?php the_field('acfb_testimonial_text'); ?>
	</div>
	<div class="acfb_testimonial_bio">
		<div class="acfb_testimonial_avatar_wrap">
			<img class="acfb_testimonial_avatar" src="<?php echo $acfb_image; ?>" alt="<?php the_field('acfb_testimonial_image_alt'); ?>">
		</div>
		<div class="acfb_testimonial_info_wrap">
			<h2 class="acfb_testimonial_name"><?php the_field('acfb_testimonial_name'); ?></h2>
			<small class="acfb_testimonial_position"><?php the_field('acfb_testimonial_position'); ?></small>
		</div>
	</div>
</div>


</div><!-- Uid -->