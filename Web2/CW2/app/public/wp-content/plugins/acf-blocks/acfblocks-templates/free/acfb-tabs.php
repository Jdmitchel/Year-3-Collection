<?php
echo parse_link(
  array(
    get_field('acfb_tab_title_typo'),
    get_field('acfb_tab_content_typo')
  )
);

$acfb_tab_content_padding = acfb_padding_name('acfb_tab_content_padding');
$acfb_tab_padding = acfb_padding_name('acfb_tab_padding');
$acfb_tab_margin = acfb_margin_name('acfb_tab_margin');
$acfb_tab_title_typo = acfb_ffaimly_name('acfb_tab_title_typo');
$acfb_tab_content_typo = acfb_ffaimly_name('acfb_tab_content_typo');


$uid = $block['id'];
$uid_tab = str_replace("block","tab",$uid);

$className = 'acfb_tabs_block';
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
  <?php echo get_padding_field($acfb_tab_padding); ?>
  <?php echo get_margin_field($acfb_tab_margin); ?>
}

.<?php echo $uid; ?> ul li{ 
    background: <?php the_field('acfb_tab_title_background'); ?>; 
}

.<?php echo $uid; ?> ul li a {
    <?php echo get_typo_field($acfb_tab_title_typo); ?>
    color: <?php the_field('acfb_tab_title_color'); ?>; 
}

.<?php echo $uid; ?> ul li.active {
    background: <?php the_field('acfb_tab_title_active_background'); ?>;
}

.<?php echo $uid; ?> ul li.active a { 
    color: <?php the_field('acfb_tab_title_active_color'); ?>;
}

.<?php echo $uid; ?> .acfb_tab_content{ 
    background: <?php the_field('acfb_tab_content_background'); ?>; 
    color: <?php the_field('acfb_tab_content_color'); ?>; 
    <?php echo get_typo_field($acfb_tab_content_typo); ?>
    padding-top: <?php echo $acfb_tab_content_padding['padding_top']; ?>px;
    padding-bottom: <?php echo $acfb_tab_content_padding['padding_bottom']; ?>px;
    padding-left: <?php echo $acfb_tab_content_padding['padding_left']; ?>px;
    padding-right: <?php echo $acfb_tab_content_padding['padding_right']; ?>px;
}
</style>

<?php if( have_rows('acfb_add_tab') ): ?>
    <ul>
    <?php while( have_rows('acfb_add_tab') ): the_row(); ?>
        <li>
            <a href="#<?php echo $uid_tab; ?>-<?php echo get_row_index(); ?>" class=" acfb_tab_title"><?php the_sub_field('acfb_tab_title'); ?></a>     
        </li>
    <?php endwhile; ?>
    </ul>

    <?php while( have_rows('acfb_add_tab') ): the_row(); ?>
    <div id="<?php echo $uid_tab; ?>-<?php echo get_row_index(); ?>" class="acfb_tab_content">        
      <?php the_sub_field('acfb_tab_content'); ?>
    </div>
    <?php endwhile; ?>
<?php endif; ?>

</div><!-- Uid -->