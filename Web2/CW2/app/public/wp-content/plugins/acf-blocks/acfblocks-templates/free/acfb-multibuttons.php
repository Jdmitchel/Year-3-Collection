<?php 
echo parse_link(
    array(
        get_field('acfb_multibutton_text_typo')
    )
);


$acfb_multibutton_button_padding = acfb_padding_name('acfb_multibutton_button_padding');
$acfb_multibutton_padding = acfb_padding_name('acfb_multibutton_padding');
$acfb_multibutton_margin = acfb_margin_name('acfb_multibutton_margin');
$acfb_multibutton_text_typo = acfb_ffaimly_name('acfb_multibutton_text_typo');


$uid = $block['id'];

$className = 'acfb_multibuttons_block';
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
    <?php echo get_padding_field($acfb_multibutton_padding); ?>
    <?php echo get_margin_field($acfb_multibutton_margin); ?>
}

.<?php echo $uid; ?> .acfb_multibuttons_wrap {
    justify-content: <?php the_field('acfb_multibutton_alignment'); ?>;
}

.<?php echo $uid; ?> .acfb_multibuttons_wrap .acfb_button{
	<?php echo get_typo_field($acfb_multibutton_text_typo); ?>
	border-radius: <?php the_field('acfb_multibutton_border_radius'); ?>px;
	margin-right: <?php the_field('acfb_multibutton_gutter_space'); ?>px;
	padding-top: <?php echo $acfb_multibutton_button_padding['padding_top']; ?>px;
    padding-bottom: <?php echo $acfb_multibutton_button_padding['padding_bottom']; ?>px;
    padding-left: <?php echo $acfb_multibutton_button_padding['padding_left']; ?>px;
    padding-right: <?php echo $acfb_multibutton_button_padding['padding_right']; ?>px;
}
</style>

<div class="acfb_multibuttons_wrap">
<?php
if( have_rows('acfb_multi_buttons') ):
    while ( have_rows('acfb_multi_buttons') ) : the_row(); ?>

<style type="text/css">
.<?php echo $uid; ?> .acfb_multibuttons_wrap .acfb_order_<?php echo get_row_index(); ?>{
	background-color: <?php the_sub_field('acfb_multibutton_background_color'); ?>;
	color: <?php the_sub_field('acfb_multibutton_text_color'); ?> !important;
}

.<?php echo $uid; ?> .acfb_multibuttons_wrap .acfb_order_<?php echo get_row_index(); ?>:hover{
	background-color: <?php the_sub_field('acfb_multibutton_background_hover_color'); ?>;
	color: <?php the_sub_field('acfb_multibutton_text_hover_color'); ?> !important;
}

</style>

<a href="<?php the_sub_field('acfb_multibutton_url'); ?>" class="acfb_button acfb_order_<?php echo get_row_index(); ?>">
<?php the_sub_field('acfb_multibutton_text'); ?>
</a>

<?php
endwhile;
endif;
?>

</div>
</div><!-- Uid -->