<?php

/***** MH Posts Large *****/

class mh_newsdesk_lite_posts_large extends WP_Widget {
    function __construct() {
		parent::__construct(
			'mh_newsdesk_lite_posts_large', esc_html_x('MH Posts Large [lite]', 'widget name', 'mh-newsdesk-lite'),
			array(
				'classname' => 'mh_newsdesk_lite_posts_large',
				'description' => esc_html__('Display post with large image on front page for use in "Home 1" or "Home 4" widget areas.', 'mh-newsdesk-lite'),
				'customize_selective_refresh' => true
			)
		);
	}
    function widget($args, $instance) {
        extract($args);
        $title = apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title'], $instance, $this->id_base);
        $category = isset($instance['category']) ? $instance['category'] : '';
        $offset = empty($instance['offset']) ? '' : $instance['offset'];
        $sticky = isset($instance['sticky']) ? $instance['sticky'] : 1;

		if ($category) {
        	$cat_url = get_category_link($category);
	        $before_title = $before_title . '<a href="' . esc_url($cat_url) . '" class="widget-title-link">';
	        $after_title = '</a>' . $after_title;
        }

        echo $before_widget;
        if (!empty($title)) { echo $before_title . esc_attr($title) . $after_title; }
		$args = array('posts_per_page' => '1', 'offset' => $offset, 'cat' => $category, 'ignore_sticky_posts' => $sticky);
		$widget_loop = new WP_Query($args); ?>
		<div class="mh-fp-large-widget mh-clearfix"><?php
			while ($widget_loop->have_posts()) : $widget_loop->the_post();
				get_template_part('content', 'lead');
				echo '<hr class="mh-separator">' . "\n";
			endwhile;
			wp_reset_postdata(); ?>
		</div><?php
		echo $after_widget;
    }
    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = sanitize_text_field($new_instance['title']);
        $instance['category'] = absint($new_instance['category']);
        $instance['offset'] = absint($new_instance['offset']);
        $instance['sticky'] = isset($new_instance['sticky']) ? strip_tags($new_instance['sticky']) : '';
        return $instance;
    }
    function form($instance) {
        $defaults = array('title' => '', 'category' => '', 'offset' => '0', 'sticky' => 1);
        $instance = wp_parse_args((array) $instance, $defaults); ?>

        <p>
        	<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'mh-newsdesk-lite'); ?></label>
			<input class="widefat" type="text" value="<?php echo esc_attr($instance['title']); ?>" name="<?php echo $this->get_field_name('title'); ?>" id="<?php echo $this->get_field_id('title'); ?>" />
        </p>
        <p>
			<label for="<?php echo $this->get_field_id('category'); ?>"><?php _e('Select a Category:', 'mh-newsdesk-lite'); ?></label>
			<select id="<?php echo $this->get_field_id('category'); ?>" class="widefat" name="<?php echo $this->get_field_name('category'); ?>">
				<option value="0" <?php if (!$instance['category']) echo 'selected="selected"'; ?>><?php _e('All', 'mh-newsdesk-lite'); ?></option>
				<?php
				$categories = get_categories(array('type' => 'post'));
				foreach($categories as $cat) {
					echo '<option value="' . $cat->cat_ID . '"';
					if ($cat->cat_ID == $instance['category']) { echo ' selected="selected"'; }
					echo '>' . $cat->cat_name . ' (' . $cat->category_count . ')';
					echo '</option>';
				}
				?>
			</select>
		</p>
	    <p>
        	<label for="<?php echo $this->get_field_id('offset'); ?>"><?php _e('Skip Posts (Offset):', 'mh-newsdesk-lite'); ?></label>
			<input class="widefat" type="text" value="<?php echo esc_attr($instance['offset']); ?>" name="<?php echo $this->get_field_name('offset'); ?>" id="<?php echo $this->get_field_id('offset'); ?>" />
	    </p>
        <p>
      		<input id="<?php echo $this->get_field_id('sticky'); ?>" name="<?php echo $this->get_field_name('sticky'); ?>" type="checkbox" value="1" <?php checked('1', $instance['sticky']); ?>/>
	  		<label for="<?php echo $this->get_field_id('sticky'); ?>"><?php _e('Ignore Sticky Posts', 'mh-newsdesk-lite'); ?></label>
    	</p>
    	<p>
    		<strong><?php _e('Info:', 'mh-newsdesk-lite'); ?></strong> <?php _e('This is the lite version of this widget with basic features. If you need more professional features and options, you can upgrade to the premium version of this theme.', 'mh-newsdesk-lite'); ?>
    	</p><?php
    }
}
?>