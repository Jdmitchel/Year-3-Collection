<?php
echo parse_link(
    array(
        get_field('acfb_click_to_tweet_text_typo'),
        get_field('acfb_click_to_tweet_button_typo')
    )
);


$acfb_click_to_inner_padding = acfb_padding_name('acfb_click_to_inner_padding');
$acfb_click_to_tweet_padding = acfb_padding_name('acfb_click_to_tweet_padding');
$acfb_click_to_tweet_margin = acfb_margin_name('acfb_click_to_tweet_margin');
$acfb_click_to_tweet_text_typo = acfb_ffaimly_name('acfb_click_to_tweet_text_typo');
$acfb_click_to_tweet_button_typo = acfb_ffaimly_name('acfb_click_to_tweet_button_typo');

$uid = $block['id'];

$className = 'acfb_click_to_tweet_block';
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
  <?php echo get_padding_field($acfb_click_to_tweet_padding); ?>
  <?php echo get_margin_field($acfb_click_to_tweet_margin); ?>
}

.<?php echo $uid; ?> .acfb_click_to_tweet {
  background-color: <?php the_field('acfb_click_to_tweet_bg_color'); ?>;
  padding-top: <?php echo $acfb_click_to_inner_padding['padding_top']; ?>px;
  padding-bottom: <?php echo $acfb_click_to_inner_padding['padding_bottom']; ?>px;
  padding-left: <?php echo $acfb_click_to_inner_padding['padding_left']; ?>px;
  padding-right: <?php echo $acfb_click_to_inner_padding['padding_right']; ?>px;
}

.<?php echo $uid; ?> .acfb_click_to_tweet a {
  color: <?php the_field('acfb_click_to_tweet_text_color'); ?> !important;
  <?php echo get_typo_field($acfb_click_to_tweet_text_typo); ?>
}

.<?php echo $uid; ?> .acfb_click_to_tweet a:hover, .<?php echo $uid; ?> .acfb_click_to_tweet:hover a:after{
  color: <?php the_field('acfb_click_to_tweet_button_hover_color'); ?>;
}

.<?php echo $uid; ?> .acfb_click_to_tweet a:after {
  content: '<?php the_field('acfb_click_to_tweet_button_text'); ?>';
  color: <?php the_field('acfb_click_to_tweet_button_color'); ?>;
  <?php echo get_typo_field($acfb_click_to_tweet_button_typo); ?>
}

</style>

<?php
$acfb_by_line = '';
if(get_field('acfb_click_to_tweet_handler')){
$acfb_by_line = 'by: @' . get_field('acfb_click_to_tweet_handler');
}
?>


<div class="acfb_click_to_tweet">
  <a onclick="window.open(&quot;https://twitter.com/share?url=&quot; +
  document.querySelector(&quot;link[rel='canonical']&quot;).href + &quot;&amp;text=&quot; + encodeURIComponent(this.innerText) + &quot; - <?php echo $acfb_by_line; ?> &quot;, &quot;sharer&quot;, &quot;; toolbar=0, status=0, width=626, height=436&quot;); return false;" rel="nofollow" title="Share to Twitter">
    <?php the_field('acfb_click_to_tweet_content'); ?>
  </a>
</div>

</div><!-- Uid -->