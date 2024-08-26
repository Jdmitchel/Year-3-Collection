<?php 
echo parse_link(
    array(
        get_field('acfb_toggle_title_typo'),
        get_field('acfb_toggle_content_typo')
    )
);


$acfb_toggle_padding = acfb_padding_name('acfb_toggle_padding');
$acfb_toggle_margin = acfb_margin_name('acfb_toggle_margin');
$acfb_toggle_title_typo = acfb_ffaimly_name('acfb_toggle_title_typo');
$acfb_toggle_content_typo = acfb_ffaimly_name('acfb_toggle_content_typo');


$uid = $block['id'];

$className = 'acfb_toggle_block';
if( !empty($block['className']) ) {
   $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
   $className .= ' align' . $block['align'];
}

?>

<div class="<?php echo $uid; ?> <?php echo esc_attr($className); ?>">
<style>
.<?php echo $uid; ?> {
    <?php echo get_padding_field($acfb_toggle_padding); ?>
    <?php echo get_margin_field($acfb_toggle_margin); ?>
}
.<?php echo $uid; ?> .acfb_toggle_title{
    background: <?php the_field('acfb_toggle_title_background'); ?>;
    color: <?php the_field('acfb_toggle_title_color'); ?>;
    <?php echo get_typo_field($acfb_toggle_title_typo); ?>
    text-align: <?php the_field('acfb_toogle_title_alignment'); ?>;
 }   

.<?php echo $uid; ?> .acfb_toggle_title:hover{
    background: <?php the_field('acfb_toggle_title_hover_background'); ?>;
    color: <?php the_field('acfb_toggle_title_hover_color'); ?>;
 }   

 .<?php echo $uid; ?> .acfb_toggle_content {
    background: <?php the_field('acfb_toggle_content_background'); ?>;
    color: <?php the_field('acfb_toggle_content_color'); ?>;
    <?php echo get_typo_field($acfb_toggle_content_typo); ?>
}
</style>

<button class="acfb_toggle_title"><?php the_field('acfb_toggle_title'); ?></button>
<div class="acfb_toggle_content"><?php the_field('acfb_toggle_content'); ?></div>


</div><!-- Uid -->