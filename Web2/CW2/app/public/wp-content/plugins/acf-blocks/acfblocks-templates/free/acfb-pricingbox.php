<?php 
echo parse_link(
    array(
        get_field('acfb_pricingbox_title_typo'),
        get_field('acfb_pricingbox_prefix_typo'),
        get_field('acfb_pricingbox_price_typo'),
        get_field('acfb_pricingbox_suffix_typo'),
        get_field('acfb_pricingbox_subtext_typo'),
        get_field('acfb_pricingbox_button_typo'),
        get_field('acfb_pricingbox_description_typo')
    )
);


$acfb_pricingbox_inner_padding = acfb_padding_name('acfb_pricingbox_inner_padding');
$acfb_pricingbox_inner_button_padding = acfb_padding_name('acfb_pricingbox_inner_button_padding');
$acfb_pricingbox_padding = acfb_padding_name('acfb_pricingbox_padding');
$acfb_pricingbox_margin = acfb_margin_name('acfb_pricingbox_margin');
$acfb_pricingbox_title_typo = acfb_ffaimly_name('acfb_pricingbox_title_typo');
$acfb_pricingbox_prefix_typo = acfb_ffaimly_name('acfb_pricingbox_prefix_typo');
$acfb_pricingbox_price_typo = acfb_ffaimly_name('acfb_pricingbox_price_typo');
$acfb_pricingbox_suffix_typo = acfb_ffaimly_name('acfb_pricingbox_suffix_typo');
$acfb_pricingbox_subtext_typo = acfb_ffaimly_name('acfb_pricingbox_subtext_typo');
$acfb_pricingbox_button_typo = acfb_ffaimly_name('acfb_pricingbox_button_typo');
$acfb_pricingbox_description_typo = acfb_ffaimly_name('acfb_pricingbox_description_typo');


$uid = $block['id'];

$className = 'acfb_pricing_table_block';
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
  <?php echo get_padding_field($acfb_pricingbox_padding); ?>
  <?php echo get_margin_field($acfb_pricingbox_margin); ?>
}

.<?php echo $uid; ?> .acfb_pricing_table_wrap{
	background-color: <?php the_field('acfb_pricingbox_background_color'); ?>;
  padding-top: <?php echo $acfb_pricingbox_inner_padding['padding_top']; ?>px;
  padding-bottom: <?php echo $acfb_pricingbox_inner_padding['padding_bottom']; ?>px;
  padding-left: <?php echo $acfb_pricingbox_inner_padding['padding_left']; ?>px;
  padding-right: <?php echo $acfb_pricingbox_inner_padding['padding_right']; ?>px;
}

.<?php echo $uid; ?> .acfb_pricing_table_wrap img{
	width: <?php the_field('acfb_pricingbox_image_size'); ?>%;
}

.<?php echo $uid; ?> h3.acfb_pricing_box_title{
	color: <?php the_field('acfb_pricingbox_title_color'); ?>;
	<?php echo get_typo_field($acfb_pricingbox_title_typo); ?>
}

.<?php echo $uid; ?> .acfb_pricing_box_price_line .acfb_pricing_box_price_prefix{
    color: <?php the_field('acfb_pricingbox_prefix_color'); ?>;
    <?php echo get_typo_field($acfb_pricingbox_prefix_typo); ?>
}

.<?php echo $uid; ?> .acfb_pricing_box_price_line .acfb_pricing_box_price{
    color: <?php the_field('acfb_pricingbox_price_color'); ?>;
    <?php echo get_typo_field($acfb_pricingbox_price_typo); ?>
}

.<?php echo $uid; ?> .acfb_pricing_box_price_line .acfb_pricing_box_price_suffix{
    color: <?php the_field('acfb_pricingbox_suffix_color'); ?>;
    <?php echo get_typo_field($acfb_pricingbox_suffix_typo); ?>
}

.<?php echo $uid; ?> .acfb_pricing_box_subprice{
    color: <?php the_field('acfb_pricingbox_subtext_color'); ?>;
    <?php echo get_typo_field($acfb_pricingbox_subtext_typo); ?>
}

.<?php echo $uid; ?> .acfb_pricing_box_button a{
    background-color: <?php the_field('acfb_pricingbox_button_background_color'); ?>;
    color: <?php the_field('acfb_pricingbox_button_text_color'); ?> !important;
    <?php echo get_typo_field($acfb_pricingbox_button_typo); ?>
    padding-top: <?php echo $acfb_pricingbox_inner_button_padding['padding_top']; ?>px;
    padding-bottom: <?php echo $acfb_pricingbox_inner_button_padding['padding_bottom']; ?>px;
    padding-left: <?php echo $acfb_pricingbox_inner_button_padding['padding_left']; ?>px;
    padding-right: <?php echo $acfb_pricingbox_inner_button_padding['padding_right']; ?>px;
}

.<?php echo $uid; ?> .acfb_pricing_box_button a:hover{
   background-color: <?php the_field('acfb_pricingbox_button_background_hover_color'); ?>;
   color: <?php the_field('acfb_pricingbox_button_text_hover_color'); ?> !important;
}

.<?php echo $uid; ?> .acfb_pricing_table_wrap .acfb_pricing_box_description{
    color: <?php the_field('acfb_pricingbox_description_color'); ?>;
    <?php echo get_typo_field($acfb_pricingbox_description_typo); ?>  
}
</style>

<div class="acfb_pricing_table_wrap">

  <?php if(get_field('acfb_pricingbox_image')): ?>
  <img src="<?php the_field('acfb_pricingbox_image'); ?>" alt="<?php the_field('acfb_pricingbox_image_alt'); ?>" class="acfb_pricing_table_imgicon">
  <?php endif; ?>

  <?php if(get_field('acfb_pricingbox_title')): ?>
  <h3 class="acfb_pricing_box_title"><?php the_field('acfb_pricingbox_title'); ?></h3>
  <?php endif; ?>

<?php if(get_field('acfb_pricingbox_price_prefix') || get_field('acfb_pricingbox_price') || get_field('acfb_pricingbox_price_suffix') || get_field('acfb_pricingbox_sub_text') ): ?>
  <div class="acfb_pricing_box_price_wrapper">

<?php if(get_field('acfb_pricingbox_price_prefix') || get_field('acfb_pricingbox_price') || get_field('acfb_pricingbox_price_suffix')): ?>
  <div class="acfb_pricing_box_price_line">
    <?php if(get_field('acfb_pricingbox_price_prefix')): ?>
  	 <span class="acfb_pricing_box_price_prefix"><?php the_field('acfb_pricingbox_price_prefix'); ?></span>
    <?php endif; ?>

    <?php if(get_field('acfb_pricingbox_price')): ?>
     <span class="acfb_pricing_box_price"><?php the_field('acfb_pricingbox_price'); ?></span>
    <?php endif; ?>

    <?php if(get_field('acfb_pricingbox_price_suffix')): ?>
     <span class="acfb_pricing_box_price_suffix"><?php the_field('acfb_pricingbox_price_suffix'); ?></span>
    <?php endif; ?>
  </div>
<?php endif; ?>  

  <?php if(get_field('acfb_pricingbox_sub_text')): ?>
    <span class="acfb_pricing_box_subprice"><?php the_field('acfb_pricingbox_sub_text'); ?></span>
  <?php endif; ?>
  </div>

<?php endif; ?>

  <?php if(get_field('acfb_pricingbox_description')): ?>
  <p class="acfb_pricing_box_description"><?php the_field('acfb_pricingbox_description'); ?></p>
  <?php endif; ?>

  <?php if(get_field('acfb_pricingbox_button_text')): ?>
  <div class="acfb_pricing_box_button">
  <a href="<?php the_field('acfb_pricingbox_button_url'); ?>"><?php the_field('acfb_pricingbox_button_text'); ?></a>
  </div>
  <?php endif; ?>

</div>

</div><!-- Uid -->