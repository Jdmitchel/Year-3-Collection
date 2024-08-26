<?php 
$uid = $block['id'];

$className = 'acfb_fb_like_button_block';
if( !empty($block['className']) ) {
   $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
   $className .= ' align' . $block['align'];
}

$acfb_flb_margin = acfb_margin_name('acfb_flb_margin');
$acfb_flb_padding = acfb_padding_name('acfb_flb_padding');
?>
<div class="<?php echo $uid; ?> <?php echo esc_attr($className); ?>">
<style type="text/css">
.<?php echo $uid; ?> {
    <?php echo get_margin_field($acfb_flb_margin); ?>
    <?php echo get_padding_field($acfb_flb_padding); ?>
}
</style>


<div class="acfb_fb_button_container">
	<iframe src="https://www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2F<?php the_field("acfb_flb_link"); ?>&layout=<?php the_field("acfb_flb_layout"); ?>&action=<?php the_field("acfb_flb_type"); ?>&size=<?php the_field("acfb_flb_size"); ?>&share=<?php the_field("acfb_flb_share_button"); ?>&appId" width="100%" height="<?php the_field("acfb_flb_height"); ?>" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
</div>

</div><!-- Uid -->