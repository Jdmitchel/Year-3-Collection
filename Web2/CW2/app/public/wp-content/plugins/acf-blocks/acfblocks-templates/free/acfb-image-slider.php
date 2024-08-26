<?php 
echo parse_link(
    array(
        get_field('acfb_slider_caption_typo')
    )
);


$acfb_slider_padding = acfb_padding_name('acfb_slider_padding');
$acfb_slider_margin = acfb_margin_name('acfb_slider_margin');
$acfb_slider_caption_typo = acfb_ffaimly_name('acfb_slider_caption_typo');


$uid = $block['id'];
$acfb_slider_images = get_field('acfb_slider_images');
$acfb_slide_placeholder = plugins_url() . '/acf-blocks/img/placeholder-image.jpg';

$className = 'acfb_slider_block';
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
	<?php echo get_padding_field($acfb_slider_padding); ?>
    <?php echo get_margin_field($acfb_slider_margin); ?>
}


	.<?php echo $uid; ?> .swiper-container .swiper-wrapper .swiper-slide{
		<?php if(get_field('acfb_slider_caption') == 'true'): ?>
		display: flex;
		justify-content: <?php the_field("acfb_slider_caption_horizontal_position"); ?>;
		<?php endif; ?>
		height: <?php the_field('acfb_slider_height'); ?>px !important;
	}

	.<?php echo $uid; ?> .swiper-container .swiper-wrapper .swiper-slide .acfb_caption{
		background-color: <?php the_field("acfb_slider_caption_background"); ?>;
		<?php echo get_typo_field($acfb_slider_caption_typo); ?>
		color: <?php the_field("acfb_slider_caption_color"); ?>;
		align-self: <?php the_field("acfb_slider_caption_vertical_position"); ?>;
	}

	.<?php echo $uid; ?> .swiper-container .swiper-wrapper .swiper-slide img{
		<?php if(get_field("acfb_slider_height")): ?>
		-ms-flex: 1;
		flex: 1;
		width: 100%;
	    height: 100%;
	    -o-object-fit: cover;
	    object-fit: cover;
		<?php endif; ?>
	}
</style>

	<div class="swiper-container" data-slidesperview="<?php the_field("acfb_slides_per_view"); ?>" data-delay="<?php the_field("acfb_slider_delay"); ?>" data-effect="<?php the_field("acfb_slider_transition_effect"); ?>" data-centerslide="<?php the_field("acfb_slider_center_slide"); ?>" data-gutter="<?php the_field("acfb_slider_gutter_space"); ?>" data-autoplay="<?php the_field("acfb_slider_autoplay"); ?>" data-autoheight="<?php the_field("acfb_slider_auto_height"); ?>"> 
		    <div class="swiper-wrapper">

		    	<?php if($acfb_slider_images): ?>

		    	<?php foreach( $acfb_slider_images as $acfb_slide_image ): ?>
					<div class="swiper-slide">
						<img src="<?php echo $acfb_slide_image['url']; ?>"/>
						<?php if(get_field('acfb_slider_caption') == 'true' && $acfb_slide_image['caption']): ?>
						<span class="acfb_caption"><?php echo $acfb_slide_image['caption']; ?></span>
					<?php endif; ?>
					</div>
		    	 <?php endforeach; ?>

		    	<?php else: ?>

		    		<?php for ($acfb_slide_count = 0 ; $acfb_slide_count < 6; $acfb_slide_count++): ?>
		    		<div class="swiper-slide">
						<img src="<?php echo $acfb_slide_placeholder; ?>"/>
						<?php if(get_field('acfb_slider_caption') == 'true'): ?>
						<span class="acfb_caption">Caption</span>
						<?php endif; ?>
					</div>
					<?php endfor; ?>

		    	<?php endif; ?>	

		    </div>
		    <?php if(get_field("acfb_slider_dot_control") == 'true'): ?><div class="swiper-pagination"></div><?php endif; ?>
		    <?php if(get_field("acfb_slider_arrow_control") == 'true'): ?>
		    <div class="acfb-button-prev"><svg enable-background="new 0 0 477.175 477.175" version="1.1" viewBox="0 0 477.18 477.18" xml:space="preserve" xmlns="http://www.w3.org/2000/svg">
				<path d="m145.19 238.58 215.5-215.5c5.3-5.3 5.3-13.8 0-19.1s-13.8-5.3-19.1 0l-225.1 225.1c-5.3 5.3-5.3 13.8 0 19.1l225.1 225c2.6 2.6 6.1 4 9.5 4s6.9-1.3 9.5-4c5.3-5.3 5.3-13.8 0-19.1l-215.4-215.5z"/>
			</svg>
			</div>
   			<div class="acfb-button-next">
   				<svg enable-background="new 0 0 477.175 477.175" version="1.1" viewBox="0 0 477.18 477.18" xml:space="preserve" xmlns="http://www.w3.org/2000/svg">
					<path d="m360.73 229.08-225.1-225.1c-5.3-5.3-13.8-5.3-19.1 0s-5.3 13.8 0 19.1l215.5 215.5-215.5 215.5c-5.3 5.3-5.3 13.8 0 19.1 2.6 2.6 6.1 4 9.5 4s6.9-1.3 9.5-4l225.1-225.1c5.3-5.2 5.3-13.8 0.1-19z"/>
				</svg>
   			</div>
   			<?php endif; ?>
	</div>

</div><!-- Uid -->