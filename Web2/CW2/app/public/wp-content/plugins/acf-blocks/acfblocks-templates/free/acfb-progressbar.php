<?php 
echo parse_link(
    array(
        get_field('acfb_progressbar_text_typo'),
        get_field('acfb_progressbar_title_typo')
    )
);


$acfb_progressbar_padding = acfb_padding_name('acfb_progressbar_padding');
$acfb_progressbar_margin = acfb_margin_name('acfb_progressbar_margin');
$acfb_progressbar_text_typo = acfb_ffaimly_name('acfb_progressbar_text_typo');
$acfb_progressbar_title_typo = acfb_ffaimly_name('acfb_progressbar_title_typo');


$uid = $block['id']; 

$className = 'acfb_progress_bar_block';
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
   <?php echo get_padding_field($acfb_progressbar_padding); ?>
   <?php echo get_margin_field($acfb_progressbar_margin); ?>
}

.<?php echo $uid; ?> .acfb_progress_wrapper .acfb_inner_wrap{
    background-color: <?php the_field('acfb_progressbar_unactive_bg_color'); ?>;
    color: <?php the_field('acfb_progressbar_text_color'); ?>;
}

.<?php echo $uid; ?> .acfb_progress_wrapper .acfb_progress_bar_title{
	color: <?php the_field('acfb_progressbar_title_color'); ?>;
	 <?php echo get_typo_field($acfb_progressbar_title_typo); ?>
}

.<?php echo $uid; ?> .acfb_progress_wrapper .acfb_progress_bar{
	background-color: <?php the_field('acfb_progressbar_bg_color'); ?>;
     <?php echo get_typo_field($acfb_progressbar_text_typo); ?>
}
</style>

<div class="acfb_progress_wrapper">
	<span class="acfb_progress_bar_title"><?php the_field('acfb_progressbar_title'); ?></span>
	<div class="acfb_inner_wrap">
	<div class="acfb_progress_bar" style="width: <?php the_field('acfb_progressbar_percentage'); ?>%;">
		<span class="acfb_progress_text"><?php the_field('acfb_progressbar_inner_text'); ?></span>
		<?php if( '1' == get_field('acfb_progressbar_display_percentage') ): ?>
			<span class="acfb_progress_percentage"><?php the_field('acfb_progressbar_percentage'); ?>%</span>
		<?php endif; ?>
	</div>
	</div>
</div>

</div><!-- Uid -->