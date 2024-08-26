<?php 
$uid = $block['id'];

$className = 'acfb_divider_block';
if( !empty($block['className']) ) {
   $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
   $className .= ' align' . $block['align'];
}

echo parse_link(
  array(
    get_field('acfb_divider_text_typo')
  )
);

$acfb_divider_padding = acfb_padding_name('acfb_divider_padding');
$acfb_divider_margin = acfb_margin_name('acfb_divider_margin');
$acfb_divider_text_typo = acfb_ffaimly_name('acfb_divider_text_typo');




$acfb_divider_color = get_field('acfb_divider_color');
$acfb_dc = str_replace('#' , "" , get_field('acfb_divider_color'));

$acfb_divider_fancy_styles = get_field('acfb_divider_fancy_styles');
$acfb_fancy_divider = '';
if($acfb_divider_fancy_styles === 'curly'){
	$acfb_fancy_divider = "data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' preserveAspectRatio='none' overflow='visible' height='100%25' viewBox='0 0 24 24' stroke='%23$acfb_dc' stroke-width='1' fill='none' stroke-linecap='square' stroke-miterlimit='10'%3E%3Cpath d='M0,21c3.3,0,8.3-0.9,15.7-7.1c6.6-5.4,4.4-9.3,2.4-10.3c-3.4-1.8-7.7,1.3-7.3,8.8C11.2,20,17.1,21,24,21'/%3E%3C/svg%3E";
} elseif($acfb_divider_fancy_styles === 'curved'){
	$acfb_fancy_divider = "data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' preserveAspectRatio='none' overflow='visible' height='100%25' viewBox='0 0 24 24' stroke='%23$acfb_dc' stroke-width='1' fill='none' stroke-linecap='square' stroke-miterlimit='10'%3E%3Cpath d='M0,6c6,0,6,13,12,13S18,6,24,6'/%3E%3C/svg%3E";

} elseif($acfb_divider_fancy_styles === 'slashes'){
	$acfb_fancy_divider = "data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' preserveAspectRatio='none' overflow='visible' height='100%25' viewBox='0 0 20 16' stroke='%23$acfb_dc' stroke-width='1' fill='none' stroke-linecap='square' stroke-miterlimit='10'%3E%3Cg transform='translate(-12.000000, 0)'%3E%3Cpath d='M28,0L10,18'/%3E%3Cpath d='M18,0L0,18'/%3E%3Cpath d='M48,0L30,18'/%3E%3Cpath d='M38,0L20,18'/%3E%3C/g%3E%3C/svg%3E";
} elseif($acfb_divider_fancy_styles === 'squared'){
	$acfb_fancy_divider = "data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' preserveAspectRatio='none' overflow='visible' height='100%25' viewBox='0 0 24 24' stroke='%23$acfb_dc' stroke-width='1' fill='none' stroke-linecap='square' stroke-miterlimit='10'%3E%3Cpolyline points='0,6 6,6 6,18 18,18 18,6 24,6 '/%3E%3C/svg%3E";
} elseif($acfb_divider_fancy_styles === 'wavy'){
	$acfb_fancy_divider = "data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' preserveAspectRatio='none' overflow='visible' height='100%25' viewBox='0 0 24 24' stroke='%23$acfb_dc' stroke-width='1' fill='none' stroke-linecap='square' stroke-miterlimit='10'%3E%3Cpath d='M0,6c6,0,0.9,11.1,6.9,11.1S18,6,24,6'/%3E%3C/svg%3E";
} elseif($acfb_divider_fancy_styles === 'tree'){
	$acfb_fancy_divider = "data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' preserveAspectRatio='xMidYMid meet' overflow='visible' height='100%25' viewBox='0 0 126 26' fill='%23$acfb_dc' stroke='none'%3E%3Cpath d='M111.9,18.3v3.4H109v-3.4H111.9z M90.8,18.3v3.4H88v-3.4H90.8z M69.8,18.3v3.4h-2.9v-3.4H69.8z M48.8,18.3v3.4h-2.9v-3.4H48.8z M27.7,18.3v3.4h-2.9v-3.4H27.7z M6.7,18.3v3.4H3.8v-3.4H6.7z M46.4,4l4.3,4.8l-1.8,0l3.5,4.4l-2.2-0.1l3,3.3l-11,0.4l3.6-3.8l-2.9-0.1l3.1-4.2l-1.9,0L46.4,4z M111.4,4l2.4,4.8l-1.8,0l3.5,4.4l-2.5-0.1l3.3,3.3h-11l3.1-3.4l-2.5-0.1l3.1-4.2l-1.9,0L111.4,4z M89.9,4l2.9,4.8l-1.9,0l3.2,4.2l-2.5,0l3.5,3.5l-11-0.4l3-3.1l-2.4,0L88,8.8l-1.9,0L89.9,4z M68.6,4l3,4.4l-1.9,0.1l3.4,4.1l-2.7,0.1l3.8,3.7H63.8l2.9-3.6l-2.9,0.1L67,8.7l-2,0.1L68.6,4z M26.5,4l3,4.4l-1.9,0.1l3.7,4.7l-2.5-0.1l3.3,3.3H21l3.1-3.4l-2.5-0.1l3.2-4.3l-2,0.1L26.5,4z M4.9,4l3.7,4.8l-1.5,0l3.1,4.2L7.6,13l3.4,3.4H0l3-3.3l-2.3,0.1l3.5-4.4l-2.3,0L4.9,4z'/%3E%3C/svg%3E";
} elseif($acfb_divider_fancy_styles === 'zigzag'){
	$acfb_fancy_divider = "data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' preserveAspectRatio='none' overflow='visible' height='100%25' viewBox='0 0 24 24' stroke='%23$acfb_dc' stroke-width='1' fill='none' stroke-linecap='square' stroke-miterlimit='10'%3E%3Cpolyline points='0,18 12,6 24,18 '/%3E%3C/svg%3E";
} elseif($acfb_divider_fancy_styles === 'rhombus'){
	$acfb_fancy_divider = "data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' preserveAspectRatio='none' overflow='visible' height='100%25' viewBox='0 0 24 24' fill='%23$acfb_dc' stroke='none'%3E%3Cpath d='M12.7,2.3c-0.4-0.4-1.1-0.4-1.5,0l-8,9.1c-0.3,0.4-0.3,0.9,0,1.2l8,9.1c0.4,0.4,1.1,0.4,1.5,0l8-9.1c0.3-0.4,0.3-0.9,0-1.2L12.7,2.3z'/%3E%3C/svg%3E";
} elseif($acfb_divider_fancy_styles === 'parallelogram'){
	$acfb_fancy_divider = "data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' preserveAspectRatio='none' overflow='visible' height='100%25' viewBox='0 0 24 24' fill='%23$acfb_dc' stroke='none'%3E%3Cpolygon points='9.4,2 24,2 14.6,21.6 0,21.6'/%3E%3C/svg%3E";
} elseif($acfb_divider_fancy_styles === 'x'){
	$acfb_fancy_divider = "data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' preserveAspectRatio='xMidYMid meet' overflow='visible' height='100%25' viewBox='0 0 126 26' fill='%23$acfb_dc' stroke='none'%3E%3Cpath d='M10.7,6l2.5,2.6l-4,4.3l4,5.4l-2.5,1.9l-4.5-5.2l-3.9,4.2L0.7,17L4,13.1L0,8.6l2.3-1.3l3.9,3.9L10.7,6z M23.9,6.6l4.2,4.5L32,7.2l2.3,1.3l-4,4.5l3.2,3.9L32,19.1l-3.9-3.3l-4.5,4.3l-2.5-1.9l4.4-5.1l-4.2-3.9L23.9,6.6zM73.5,6L76,8.6l-4,4.3l4,5.4l-2.5,1.9l-4.5-5.2l-3.9,4.2L63.5,17l4.1-4.7L63.5,8l2.3-1.3l4.1,3.6L73.5,6z M94,6l2.5,2.6l-4,4.3l4,5.4L94,20.1l-3.9-5l-3.9,4.2L84,17l3.2-3.9L84,8.6l2.3-1.3l3.2,3.9L94,6z M106.9,6l4.5,5.1l3.9-3.9l2.3,1.3l-4,4.5l3.2,3.9l-1.6,2.1l-3.9-4.2l-4.5,5.2l-2.5-1.9l4-5.4l-4-4.3L106.9,6z M53.1,6l2.5,2.6l-4,4.3l4,4.6l-2.5,1.9l-4.5-4.5l-3.5,4.5L43.1,17l3.2-3.9l-4-4.5l2.3-1.3l3.9,3.9L53.1,6z'/%3E%3C/svg%3E";
} else{
	$acfb_fancy_divider = "data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' preserveAspectRatio='xMidYMid meet' overflow='visible' height='100%25' viewBox='0 0 120 26' fill='%23$acfb_dc' stroke='none'%3E%3Cpolygon points='0,14.4 0,21 11.5,12.4 21.3,20 30.4,11.1 40.3,20 51,12.4 60.6,20 69.6,11.1 79.3,20 90.1,12.4 99.6,20 109.7,11.1 120,21 120,14.4 109.7,5 99.6,13 90.1,5 79.3,14.5 71,5.7 60.6,12.4 51,5 40.3,14.5 31.1,5 21.3,13 11.5,5 '/%3E%3C/svg%3E";
}


$acfb_divider_image = null;
if(get_field('acfb_divider_image')){
  $acfb_divider_image = get_field('acfb_divider_image');
} else{
  $acfb_divider_image = plugins_url() . '/acf-blocks/img/placeholder-image.jpg';
}

?>
<div class="<?php echo $uid; ?> <?php echo esc_attr($className); ?>">
<style type="text/css">
.<?php echo $uid; ?>{
  <?php echo get_padding_field($acfb_divider_padding); ?>
  <?php echo get_margin_field($acfb_divider_margin); ?>
}

.<?php echo $uid; ?> .acfb_divider{
	  display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    direction: ltr;
    align-items: center;
}

.<?php echo $uid; ?> .acfb_divider::before{
	<?php if(get_field('acfb_divider_image_sf') === 'simple'): ?>
	   border-top-style: <?php the_field('acfb_divider_simple_styles'); ?>;
     border-top-color: <?php echo $acfb_divider_color; ?>;
     border-top-width: <?php the_field('acfb_simple_divider_bw') ?>px;
  <?php else: ?>
   	 background: url("<?php echo $acfb_fancy_divider ?>");
   	 height: <?php the_field('acfb_fancy_divider_height') ?>px;
  <?php if(get_field("acfb_divider_fancy_styles") !== "tree" && get_field("acfb_divider_fancy_styles") !== "x"): ?>
      background-size: 20px 100%;
  <?php endif; ?>
	<?php endif; ?>
    <?php if(get_field('acfb_divider_alignment') !== 'left'): ?>
   	 content: "";
	<?php endif; ?>
     display: block;
     -webkit-box-flex: 1;
     -webkit-flex-grow: 1;
     -ms-flex-positive: 1;
     flex-grow: 1;
}

.<?php echo $uid; ?> .acfb_divider .acfb_divider_element{
    width: <?php the_field('acfb_divider_element_width'); ?>%;
    margin-left: <?php the_field('acfb_divider_element_spacing'); ?>px;
    margin-right: <?php the_field('acfb_divider_element_spacing'); ?>px;
    text-align: center;
    <?php 
    if(get_field('acfb_select_divider_style') === 'text'){
      echo get_typo_field($acfb_divider_text_typo); 
      echo "color:" . get_field('acfb_divider_text_color');
    }
    ?>
}

<?php if(get_field('acfb_select_divider_style') === 'image'): ?>
  .acfb_divider .acfb_divider_element img{
    width: <?php the_field('acfb_divider_image_width'); ?>%;
  }
<?php endif; ?>

.<?php echo $uid; ?> .acfb_divider::after{
	<?php if(get_field('acfb_divider_image_sf') === 'simple'): ?>
	   border-top-style: <?php the_field('acfb_divider_simple_styles'); ?>;
     border-top-color: <?php echo $acfb_divider_color; ?>;
     border-top-width: <?php the_field('acfb_simple_divider_bw') ?>px;
  <?php else: ?>
   	 background: url("<?php echo $acfb_fancy_divider ?>");
   	 height: <?php the_field('acfb_fancy_divider_height') ?>px;
  <?php if(get_field("acfb_divider_fancy_styles") !== "tree" && get_field("acfb_divider_fancy_styles") !== "x"): ?>
      background-size: 20px 100%;
  <?php endif; ?>
	<?php endif; ?>
    <?php if(get_field('acfb_divider_alignment') !== 'right'): ?>
   	 content: "";
	<?php endif; ?>
     display: block;
     -webkit-box-flex: 1;
     -webkit-flex-grow: 1;
     -ms-flex-positive: 1;
     flex-grow: 1;
}
</style>

<div class="acfb_divider">
	<div class="acfb_divider_element">
		<?php
			if(get_field('acfb_select_divider_style') === 'text'){
				the_field('acfb_divider_text');
			} else{
				echo "<img src='". $acfb_divider_image ."'>";
			}
		?>
	</div>
</div>

</div><!-- Uid -->