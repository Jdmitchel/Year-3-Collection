<?php 
echo parse_link(
  array(
    get_field('acfb_team_name_typo'),
    get_field('acfb_team_position_typo'),
    get_field('acfb_team_description_typo')
  )
);

$acfb_team_inner_padding = acfb_padding_name('acfb_team_inner_padding');
$acfb_team_padding = acfb_padding_name('acfb_team_padding');
$acfb_team_margin = acfb_margin_name('acfb_team_margin');
$acfb_team_name_typo = acfb_ffaimly_name('acfb_team_name_typo');
$acfb_team_position_typo = acfb_ffaimly_name('acfb_team_position_typo');
$acfb_team_description_typo = acfb_ffaimly_name('acfb_team_description_typo');


$uid = $block['id'];

$className = 'acfb_team_block';
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
  <?php echo get_padding_field($acfb_team_padding); ?>
  <?php echo get_margin_field($acfb_team_margin); ?>
}

.<?php echo $uid; ?> .acfb_team_wrap{
  background: <?php the_field('acfb_team_background_color'); ?>;
  padding-top: <?php echo $acfb_team_inner_padding['padding_top']; ?>px;
  padding-bottom: <?php echo $acfb_team_inner_padding['padding_bottom']; ?>px;
  padding-left: <?php echo $acfb_team_inner_padding['padding_left']; ?>px;
  padding-right: <?php echo $acfb_team_inner_padding['padding_right']; ?>px;
}

.<?php echo $uid; ?> .acfb_team_wrap.acfb_team_top{
  <?php if(get_field('acfb_team_ha') == 'flex-start'): ?>
  	text-align: left;
  	justify-items: flex-start;
  <?php endif; ?>

  <?php if(get_field('acfb_team_ha') == 'center'): ?>
  	text-align: center;
  	justify-items: center;
  <?php endif; ?>

  <?php if(get_field('acfb_team_ha') == 'flex-end'): ?>
  	text-align: right;
  	justify-items: flex-end;					
  <?php endif; ?>

}

<?php if(get_field('acfb_team_image_position') == 'left' ): ?>
.<?php echo $uid; ?> .acfb_team_wrap.acfb_team_left{
  align-items: <?php the_field('acfb_team_image_v_alignment'); ?>;
}
<?php endif; ?>


.<?php echo $uid; ?> .acfb_team_wrap .acfb_team_avatar{
	width: <?php the_field('acfb_team_image_size'); ?>px;
  height: <?php the_field('acfb_team_image_size'); ?>px;
}

.<?php echo $uid; ?> .acfb_team_wrap .acfb_team_avatar img{
	border-radius: <?php the_field('acfb_team_image_radius'); ?>%;
}

.<?php echo $uid; ?> .acfb_team_wrap .acfb_team_info .acfb_team_name{
	color: <?php the_field('acfb_team_name_color'); ?>;
  <?php echo get_typo_field($acfb_team_name_typo); ?>
}

.<?php echo $uid; ?> .acfb_team_wrap .acfb_team_info .acfb_team_position{
	color: <?php the_field('acfb_team_position_color'); ?>;
	<?php echo get_typo_field($acfb_team_position_typo); ?>
}

.<?php echo $uid; ?> .acfb_team_wrap .acfb_team_info .acfb_team_description{
	color: <?php the_field('acfb_team_description_color'); ?>;
	<?php echo get_typo_field($acfb_team_description_typo); ?>
}

</style>

	
<?php
$acfb_image = '';
if(!get_field('acfb_team_image')){
	$acfb_image = plugins_url() . '/acf-blocks/img/placeholder-image.jpg';
} else{
	$acfb_image = get_field('acfb_team_image');
}
?>

<div class="acfb_team_wrap acfb_team_<?php the_field('acfb_team_image_position') ?>">
<div class="acfb_team_avatar">
	<img src="<?php echo $acfb_image; ?>" alt="<?php the_field('acfb_team_image_alt'); ?>">
</div>
<div class="acfb_team_info">

	<?php if(get_field('acfb_team_name')): ?>
       <h4 class="acfb_team_name"><?php the_field('acfb_team_name'); ?></h4>
    <?php endif; ?>

    <?php if(get_field('acfb_team_position')): ?>
       <span class="acfb_team_position"><?php the_field('acfb_team_position'); ?></span>
    <?php endif; ?>

    <?php if(get_field('acfb_team_description')): ?>
       <p class="acfb_team_description">
		<?php the_field('acfb_team_description'); ?>
	   </p>
    <?php endif; ?>
  	      
</div>
</div>


</div><!-- Uid -->