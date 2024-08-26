<?php 
echo parse_link(
    array(
        get_field('acfb_counter_number_typo'),
        get_field('acfb_counter_title_typo')
    )
);


$acfb_counter_number_padding = acfb_padding_name('acfb_counter_number_padding');
$acfb_counter_number_margin = acfb_margin_name('acfb_counter_number_margin');
$acfb_counter_number_typo = acfb_ffaimly_name('acfb_counter_number_typo');
$acfb_counter_title_typo = acfb_ffaimly_name('acfb_counter_title_typo');


$uid = $block['id'];

$className = 'acfb_counter_number_block';
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
    <?php echo get_padding_field($acfb_counter_number_padding); ?>
    <?php echo get_margin_field($acfb_counter_number_margin); ?>
}

.<?php echo $uid; ?> .acfb_counter_number_wrapper{
    color: <?php the_field('acfb_counter_number_color'); ?>;
    <?php echo get_typo_field($acfb_counter_number_typo); ?>
}

.<?php echo $uid; ?> .acfb_counter .acfb_counter_title{
	color: <?php the_field('acfb_counter_number_title_color'); ?>;
    <?php echo get_typo_field($acfb_counter_title_typo); ?>
}
</style>

<div class="acfb_counter">
<div class="acfb_counter_number_wrapper">
	<span class="acfb_counter_number_prefix"><?php the_field('acfb_counter_number_prefix'); ?></span>
	<span class="acfb_counter_number"><?php the_field('acfb_counter_number'); ?></span>
	<span class="acfb_counter_number_suffix"><?php the_field('acfb_counter_number_suffix'); ?></span>
</div>
<div class="acfb_counter_title"><?php the_field('acfb_counter_number_title'); ?></div>
</div>

</div><!-- Uid -->