<?php
$acfb_fb_page_margin = acfb_margin_name('acfb_fb_page_margin');
$acfb_fb_page_padding = acfb_padding_name('acfb_fb_page_padding');
$acfb_fb_timeline_tab = '';
$acfb_fb_events_tab = '';
$acfb_fb_messages_tab = '';


if(get_field('acfb_fb_timeline_tab') == 'true'){
  $acfb_fb_timeline_tab = 'timeline';
}

if(get_field('acfb_fb_events_tab') == 'true'){
  $acfb_fb_events_tab = 'events';
}

if(get_field('acfb_fb_messages_tab') == 'true'){
  $acfb_fb_messages_tab = 'messages';
}


$uid = $block['id'];

$className = 'acfb_facebook_page_block';
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
    <?php echo get_margin_field($acfb_fb_page_margin); ?>
    <?php echo get_padding_field($acfb_fb_page_padding); ?>
}
</style>


<div class="acfb_fb_page_wrap" style="width: 100%;">
	<iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2F<?php the_field('acfb_fb_page_id'); ?>%2F&tabs=<?php echo $acfb_fb_timeline_tab; ?>,<?php echo $acfb_fb_events_tab; ?>,<?php echo $acfb_fb_messages_tab; ?>&width=<?php the_field('acfb_fb_page_width'); ?>&height=<?php the_field('acfb_fb_page_height'); ?>&small_header=<?php the_field('acfb_fb_small_header'); ?>&adapt_container_width=true&hide_cover=<?php the_field('acfb_fb_cover_photo'); ?>&hide_cta=<?php the_field('acfb_fb_cta_button'); ?>&show_facepile=<?php the_field('acfb_fb_profile_photos'); ?>&appId" width="<?php the_field('acfb_fb_page_width'); ?>" height="<?php the_field('acfb_fb_page_height'); ?>" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
</div>

</div><!-- Uid -->