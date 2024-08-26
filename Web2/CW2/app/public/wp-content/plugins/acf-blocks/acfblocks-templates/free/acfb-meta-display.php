<?php 
$acfb_meta_display_post_id = (int)get_field('post_id'); # hidden field in order to obtain post id
$acfb_meta_field = getCustomField('acfb_meta_select_field', $acfb_meta_display_post_id);

echo parse_link(
  array(
    get_field('acfb_field_content_typography')
  )
);

$acfb_data_field_inner_padding = acfb_padding_name('acfb_data_field_inner_padding');
$acfb_data_field_button_padding = acfb_padding_name('acfb_data_field_button_padding');
$acfb_data_field_padding = acfb_padding_name('acfb_data_field_padding');
$acfb_data_field_margin = acfb_margin_name('acfb_data_field_margin');
$acfb_field_content_typography = acfb_ffaimly_name('acfb_field_content_typography');
$acfb_field_before_text_typography = acfb_ffaimly_name('acfb_field_before_text_typography');
$acfb_field_after_text_typography = acfb_ffaimly_name('acfb_field_after_text_typography');


$acfb_meta_tag = get_field('acfb_field_content_html_tag');
$acfb_meta_value = $acfb_meta_field['value'];
$acfb_meta_type = get_field('acfb_meta_select_field_type');


$uid = $block['id'];

$className = 'acfb_meta_display_block';
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
  <?php echo get_padding_field($acfb_data_field_padding); ?>
  <?php echo get_margin_field($acfb_data_field_margin); ?>
}

.<?php echo $uid; ?> .acfb_meta_display{
  <?php if($acfb_meta_type !== 'image' || $acfb_meta_type !== 'oembed'): ?>
  background: <?php the_field('acfb_field_bg_color'); ?>;
  color: <?php the_field('acfb_field_content_color'); ?>;
<?php endif; ?>
  <?php echo get_padding_field($acfb_data_field_inner_padding); ?>
  <?php if(get_field('acfb_meta_field_content_align') === 'horizontal'): ?>
   display: flex;
   gap: 10px;
   justify-content: <?php the_field('acfb_select_field_type_horizontal_alignment') ?>;
   <?php elseif(get_field('acfb_meta_field_content_align') === 'vertical'): ?>
  display: flex;
  flex-direction: column;
  gap: 10px;
   align-items: <?php the_field('acfb_select_field_type_vertical_alignment') ?>;
  <?php endif; ?>
  
}

<?php if($acfb_meta_type !== 'image' or $acfb_meta_type !== 'oembed' or $acfb_meta_type !== 'gallery'): ?>
.<?php echo $uid; ?> .acfb_meta_display <?php the_field('acfb_field_content_html_tag'); ?>{
  <?php echo get_typo_field($acfb_field_content_typography); ?>
  margin: 0;
}
<?php endif; ?>


.<?php echo $uid; ?> .acfb_meta_display .acfb_meta_display_before_text{
  color: <?php the_field('acfb_field_before_text_color'); ?>;
  <?php echo get_typo_field($acfb_field_before_text_typography); ?>
}


.<?php echo $uid; ?> .acfb_meta_display .acfb_meta_display_after_text{
  color: <?php the_field('acfb_field_after_text_color'); ?>;
  <?php echo get_typo_field($acfb_field_after_text_typography); ?>
}

.<?php echo $uid; ?> .acfb_meta_display .acfb_url_to_button{
  background: <?php the_field('acfb_field_url_button_bg_color'); ?>;
  color: <?php the_field('acfb_field_url_button_color'); ?>;
  <?php echo get_padding_field($acfb_data_field_button_padding); ?>
}

.<?php echo $uid; ?> .acfb_meta_display .acfb_url_to_button:hover{
  background: <?php the_field('acfb_field_url_button_bg_hover_color'); ?>;
  color: <?php the_field('acfb_field_url_button_hover_color'); ?>;
}

.<?php echo $uid; ?> .acfb_field_type_img{
  width: <?php the_field('acfb_field_image_width'); ?>%;
}
</style>


<div class="acfb_meta_display">

<?php 
if(get_field('acfb_meta_field_before_text')){ ?>
  <div class="acfb_meta_display_before_text">
    <?php the_field('acfb_meta_field_before_text'); ?>
  </div>  
<?php } ?> 


<?php if(
  $acfb_meta_type === 'text' or 
  $acfb_meta_type === 'visual' or 
  $acfb_meta_type === 'textarea' or 
  $acfb_meta_type === 'date' or 
  $acfb_meta_type === 'number' or 
  $acfb_meta_type === 'url' or 
  $acfb_meta_type === 'select' or 
  $acfb_meta_type === 'radio' or 
  $acfb_meta_type === 'image' or 
  $acfb_meta_type === 'oembed' or 
  $acfb_meta_type === 'gallery'
): 


if($acfb_meta_type === 'url'){

  if(get_field('acfb_url_field_type_to_button') === true){
    echo "<a href='". $acfb_meta_value ."' class='acfb_url_to_button'>". get_field('acfb_url_field_type_to_button_text') ."</a>";
  } else{
    echo $acfb_meta_value;
  } 

} elseif($acfb_meta_type === 'image'){

  $acfb_meta_image = $acfb_meta_value;
  $acfb_meta_image_size = get_field('acfb_url_field_type_gallery_img_size');
  $acfb_meta_image_id = acfb_meta_gallery_get_image_id($acfb_meta_image);
  // retrieve the thumbnail size of our image
  $acfb_meta_image_thumb = wp_get_attachment_image_src($acfb_meta_image_id, $acfb_meta_image_size);


  echo "<img src=". $acfb_meta_image_thumb['0'] ." alt='". get_field('acfb_image_field_alt_text') ."'  class='acfb_field_type_img'>";

} elseif($acfb_meta_type === 'oembed'){

  echo $acfb_meta_value;

} elseif($acfb_meta_type === 'visual'){

  echo $acfb_meta_value;

} elseif($acfb_meta_type === 'gallery'){

  $acfb_meta_gallery_images = $acfb_meta_value;
  $acfb_meta_gallery_images_size = get_field('acfb_url_field_type_gallery_img_size'); // (thumbnail, medium, large, full or custom size)
  if( $acfb_meta_gallery_images ): ?>
      <div class="acfb_meta_display_gallery acfb_meta_display_gallery_<?php the_field('acfb_url_field_type_gallery_columns'); ?>">
          <?php foreach( $acfb_meta_gallery_images as $acfb_meta_gallery_images ): ?>
              <div class="gallery_item">
                <?php
                  // store the image ID in a var
                  $acfb_meta_gallery_images_id = acfb_meta_gallery_get_image_id($acfb_meta_gallery_images);
                   
                  // retrieve the thumbnail size of our image
                  $acfb_meta_gallery_image_thumb = wp_get_attachment_image_src($acfb_meta_gallery_images_id, $acfb_meta_gallery_images_size);
                ?>

                <img src="<?php echo $acfb_meta_gallery_image_thumb[0] ?>">
              </div>
          <?php endforeach; ?>
      </div>
  <?php endif; 

} else{

  echo "<" . $acfb_meta_tag . ">";
     echo $acfb_meta_value;
  echo "</" . $acfb_meta_tag . ">";

}

endif;
?>


<?php 
if(get_field('acfb_meta_field_after_text')){ ?>
  <div class="acfb_meta_display_after_text">
    <?php the_field('acfb_meta_field_after_text'); ?>
  </div>  
<?php } ?> 


</div>
</div><!-- Uid -->