<?php 
echo parse_link(
    array(
        get_field('acfb_bh_text_typo')
    )
);


$acfb_bh_inner_padding = acfb_padding_name('acfb_bh_inner_padding');
$acfb_bh_padding = acfb_padding_name('acfb_bh_padding');
$acfb_bh_margin = acfb_margin_name('acfb_bh_margin');
$acfb_bh_text_typo = acfb_ffaimly_name('acfb_bh_text_typo');


$uid = $block['id'];

$className = 'acfb_business_hours';
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
	<?php echo get_padding_field($acfb_bh_padding); ?>
 	<?php echo get_margin_field($acfb_bh_margin); ?>
}


.<?php echo $uid; ?> .acfb_bh_wrapper{
	background: <?php the_field('acfb_bh_background_color'); ?>;
	padding-top: <?php echo $acfb_bh_inner_padding['padding_top']; ?>px;
    padding-bottom: <?php echo $acfb_bh_inner_padding['padding_bottom']; ?>px;
    padding-left: <?php echo $acfb_bh_inner_padding['padding_left']; ?>px;
    padding-right: <?php echo $acfb_bh_inner_padding['padding_right']; ?>px;
}

.<?php echo $uid; ?> .acfb_bh_wrapper .acfb_bh_op_time .acfb_bh_day,
.<?php echo $uid; ?> .acfb_bh_wrapper .acfb_bh_op_time .acfb_bh_time_wrapper .acfb_bh_open_time,
.<?php echo $uid; ?> .acfb_bh_wrapper .acfb_bh_op_time .acfb_bh_time_wrapper .acfb_bh_seprator,
.<?php echo $uid; ?> .acfb_bh_wrapper .acfb_bh_op_time .acfb_bh_time_wrapper .acfb_bh_close_time{
	color: <?php the_field('acfb_bh_oh_color'); ?>;
}


.<?php echo $uid; ?> .acfb_bh_wrapper .acfb_bh_cl_time .acfb_bh_day,
.<?php echo $uid; ?> .acfb_bh_wrapper .acfb_bh_cl_time .acfb_bh_close_wrapper{
	color: <?php the_field('acfb_bh_ch_color'); ?>;
}


.<?php echo $uid; ?> .acfb_bh_wrapper .acfb_bh_item{
	border-bottom: 1px solid <?php the_field('acfb_bh_border_color'); ?>;
	<?php echo get_typo_field($acfb_bh_text_typo); ?>
}

</style>

<?php

$acfb_bh_mon_oc = '';
if(get_field("acfb_bh_monday") == 'true'){
$acfb_bh_mon_oc = "acfb_bh_op_time";
} else{
$acfb_bh_mon_oc = "acfb_bh_cl_time";
}

if(get_field("acfb_bh_tuesday") == 'true'){
$acfb_bh_tue_oc = "acfb_bh_op_time";
} else{
$acfb_bh_tue_oc = "acfb_bh_cl_time";
}

if(get_field("acfb_bh_wednesday") == 'true'){
$acfb_bh_wed_oc = "acfb_bh_op_time";
} else{
$acfb_bh_wed_oc = "acfb_bh_cl_time";
}

if(get_field("acfb_bh_thursday") == 'true'){
$acfb_bh_thu_oc = "acfb_bh_op_time";
} else{
$acfb_bh_thu_oc = "acfb_bh_cl_time";
}

if(get_field("acfb_bh_friday") == 'true'){
$acfb_bh_fri_oc = "acfb_bh_op_time";
} else{
$acfb_bh_fri_oc = "acfb_bh_cl_time";
}

if(get_field("acfb_bh_saturday") == 'true'){
$acfb_bh_sat_oc = "acfb_bh_op_time";
} else{
$acfb_bh_sat_oc = "acfb_bh_cl_time";
}

if(get_field("acfb_bh_sunday") == 'true'){
$acfb_bh_sun_oc = "acfb_bh_op_time";
} else{
$acfb_bh_sun_oc = "acfb_bh_cl_time";
}
?>

<div class="acfb_bh_wrapper">
<ul>

	<li class="acfb_bh_item <?php echo $acfb_bh_mon_oc; ?>">
	<span class="acfb_bh_day">Monday</span>
	<?php if( get_field('acfb_bh_monday') == 'ture' ): ?>
	<span class="acfb_bh_time_wrapper">
     	<span class="acfb_bh_open_time"><?php the_field('acfb_bh_monday_oh'); ?></span>
		<span class="acfb_bh_seprator">  -  </span> 
		<span class="acfb_bh_close_time"><?php the_field('acfb_bh_monday_ch'); ?></span> 
	</span>
	<?php else: ?>
	<span class="acfb_bh_close_wrapper">Closed</span>
	<?php endif; ?>	
	</li>

	<li class="acfb_bh_item <?php echo $acfb_bh_tue_oc; ?>">
	<span class="acfb_bh_day">Tuesday</span>
	<?php if( get_field('acfb_bh_tuesday') == 'ture' ): ?>
	<span class="acfb_bh_time_wrapper">
     	<span class="acfb_bh_open_time"><?php the_field('acfb_bh_tuesday_oh'); ?></span>
		<span class="acfb_bh_seprator">  -  </span> 
		<span class="acfb_bh_close_time"><?php the_field('acfb_bh_tuesday_ch'); ?></span> 
	</span>
	<?php else: ?>
	<span class="acfb_bh_close_wrapper">Closed</span>
	<?php endif; ?>	
	</li>

	<li class="acfb_bh_item <?php echo $acfb_bh_wed_oc; ?>">
	<span class="acfb_bh_day">Wednesday</span>
	<?php if( get_field('acfb_bh_wednesday') == 'ture' ): ?>
	<span class="acfb_bh_time_wrapper">
     	<span class="acfb_bh_open_time"><?php the_field('acfb_bh_wednesday_oh'); ?></span>
		<span class="acfb_bh_seprator">  -  </span> 
		<span class="acfb_bh_close_time"><?php the_field('acfb_bh_wednesday_ch'); ?></span> 
	</span>
	<?php else: ?>
	<span class="acfb_bh_close_wrapper">Closed</span>
	<?php endif; ?>	
	</li>

	<li class="acfb_bh_item <?php echo $acfb_bh_thu_oc; ?>">
	<span class="acfb_bh_day">Thursday</span>
	<?php if( get_field('acfb_bh_thursday') == 'ture' ): ?>
	<span class="acfb_bh_time_wrapper">
     	<span class="acfb_bh_open_time"><?php the_field('acfb_bh_thursday_oh'); ?></span>
		<span class="acfb_bh_seprator">  -  </span> 
		<span class="acfb_bh_close_time"><?php the_field('acfb_bh_thursday_ch'); ?></span> 
	</span>
	<?php else: ?>
	<span class="acfb_bh_close_wrapper">Closed</span>
	<?php endif; ?>	
	</li>

	<li class="acfb_bh_item <?php echo $acfb_bh_fri_oc; ?>">
	<span class="acfb_bh_day">Friday</span>
	<?php if( get_field('acfb_bh_friday') == 'ture' ): ?>
	<span class="acfb_bh_time_wrapper">
     	<span class="acfb_bh_open_time"><?php the_field('acfb_bh_friday_oh'); ?></span>
		<span class="acfb_bh_seprator">  -  </span> 
		<span class="acfb_bh_close_time"><?php the_field('acfb_bh_friday_ch'); ?></span> 
	</span>
	<?php else: ?>
	<span class="acfb_bh_close_wrapper">Closed</span>
	<?php endif; ?>	
	</li>

	<li class="acfb_bh_item <?php echo $acfb_bh_sat_oc; ?>">
	<span class="acfb_bh_day">Saturday</span>
	<?php if( get_field('acfb_bh_saturday') == 'ture' ): ?>
	<span class="acfb_bh_time_wrapper">
     	<span class="acfb_bh_open_time"><?php the_field('acfb_bh_saturday_oh'); ?></span>
		<span class="acfb_bh_seprator">  -  </span> 
		<span class="acfb_bh_close_time"><?php the_field('acfb_bh_saturday_ch'); ?></span> 
	</span>
	<?php else: ?>
	<span class="acfb_bh_close_wrapper">Closed</span>
	<?php endif; ?>	
	</li>

	<li class="acfb_bh_item <?php echo $acfb_bh_sun_oc; ?>">
	<span class="acfb_bh_day">Sunday</span>
	<?php if( get_field('acfb_bh_sunday') == 'ture' ): ?>
	<span class="acfb_bh_time_wrapper">
     	<span class="acfb_bh_open_time"><?php the_field('acfb_bh_sunday_oh'); ?></span>
		<span class="acfb_bh_seprator">  -  </span> 
		<span class="acfb_bh_close_time"><?php the_field('acfb_bh_sunday_ch'); ?></span> 
	</span>
	<?php else: ?>
	<span class="acfb_bh_close_wrapper">Closed</span>
	<?php endif; ?>	
	</li>
	
</ul>
</div>

</div><!-- Uid -->