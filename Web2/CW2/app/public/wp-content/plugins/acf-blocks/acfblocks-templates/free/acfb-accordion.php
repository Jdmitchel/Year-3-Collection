<?php 
echo parse_link(
    array(
        get_field('acfb_accordion_title_typo'),
        get_field('acfb_accordion_content_content')
    )
);

$acfb_accordion_padding = acfb_padding_name('acfb_accordion_padding');
$acfb_accordion_margin = acfb_margin_name('acfb_accordion_margin');
$acfb_accordion_title_typo = acfb_ffaimly_name('acfb_accordion_title_typo');
$acfb_accordion_content_content = acfb_ffaimly_name('acfb_accordion_content_content');


$uid = $block['id'];
$uid_accordion = str_replace("block","accordion",$uid);

$className = 'acfb_accordion_block';
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
    <?php echo get_padding_field($acfb_accordion_padding); ?>
    <?php echo get_margin_field($acfb_accordion_margin); ?>
}

.<?php echo $uid; ?> .acfb_accordion .acfb_accordion_title {
    background: <?php the_field('acfb_accordion_title_background'); ?>;
    color: <?php the_field('acfb_accordion_title_color'); ?>;
    <?php echo get_typo_field($acfb_accordion_title_typo); ?>
    text-align: <?php the_field('acfb_accordion_title_alignment'); ?>;
}

.<?php echo $uid; ?> .acfb_accordion .acfb_accordion_title:hover{
    background: <?php the_field('acfb_accordion_title_hover_background'); ?>;
    color: <?php the_field('acfb_accordion_title_hover_color'); ?>;
}

.<?php echo $uid; ?> .acfb_accordion .acfb_accordion_content {
    background: <?php the_field('acfb_accordion_content_background'); ?>;
    color: <?php the_field('acfb_accordion_content_color'); ?>;
    <?php echo get_typo_field($acfb_accordion_content_content); ?>
}
</style>


<?php if( have_rows('acfb_add_accordion') ): ?>

    <div class="acfb_accordion">

    <?php while( have_rows('acfb_add_accordion') ): the_row(); ?>
        <a href="#<?php echo $uid_accordion; ?>-<?php echo get_row_index(); ?>" class="first acfb_accordion_title"> <?php the_sub_field('acfb_accordion_title'); ?></a>  
        <div id="<?php echo $uid_accordion; ?>-<?php echo get_row_index(); ?>" class="acfb_accordion_content">
            <div class="acfb_accordion_content_inner">
                <?php the_sub_field('acfb_accordion_content'); ?>
            </div>
        </div>
    <?php endwhile; ?>

    </div>

<?php endif; ?>


</div><!-- Uid -->