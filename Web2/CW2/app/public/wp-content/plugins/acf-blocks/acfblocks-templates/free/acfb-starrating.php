<?php
echo parse_link(
  array(
    get_field('acfb_rating_before_text_typo')
  )
);

$acfb_rating_padding = acfb_padding_name('acfb_rating_padding');
$acfb_rating_margin = acfb_margin_name('acfb_rating_margin');
$acfb_rating_before_text_typo = acfb_ffaimly_name('acfb_rating_before_text_typo');


$uid = $block['id'];

$className = 'acfb_star_rating_block';
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
  <?php echo get_padding_field($acfb_rating_padding); ?>
  <?php echo get_margin_field($acfb_rating_margin); ?>
}

.<?php echo $uid; ?> .acfb_star_rating{
	justify-content: <?php the_field('acfb_rating_alignment'); ?>;
}

.<?php echo $uid; ?> .acfb_star_rating .acfb_before{
	<?php echo get_typo_field($acfb_rating_before_text_typo); ?>
	color: <?php the_field('acfb_rating_before_text_color'); ?>;
	margin-right: <?php the_field('acfb_rating_before_text_gap'); ?>px;
}

.<?php echo $uid; ?> .acfb_star_rating .acfb_star:nth-child(-n+<?php the_field('acfb_rating'); ?>) {
	color: <?php the_field('acfb_marked_star_color'); ?>;
}

.<?php echo $uid; ?> .acfb_star_rating .acfb_star{
    font-size: <?php the_field('acfb_star_icon_size'); ?>px;
    color: <?php the_field('acfb_unmarked_star_color'); ?>;
} 
</style>

<div class="acfb_star_rating">
	<div class="acfb_before">
		<?php the_field('acfb_rating_before_text'); ?>
	</div>
	<div class="acfb_stars">
    <span class="acfb_star"></span>
    <span class="acfb_star"></span>
    <span class="acfb_star"></span>
    <span class="acfb_star"></span>
    <span class="acfb_star"></span>
	</div>
</div>

</div><!-- Uid -->