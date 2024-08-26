<?php

/***** MH Recent Posts *****/

class mh_newsdesk_lite_recent_posts extends WP_Widget {
    function __construct() {
		parent::__construct(
			'mh_newsdesk_lite_recent_posts', esc_html_x('MH Recent Posts', 'widget name', 'mh-newsdesk-lite'),
			array(
				'classname' => 'mh_newsdesk_lite_recent_posts',
				'description' => esc_html__('Display a list of most recent posts.', 'mh-newsdesk-lite'),
				'customize_selective_refresh' => true
			)
		);
	}
    function widget($args, $instance) {
        extract($args);
        $title = apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title'], $instance, $this->id_base);
        $postcount = empty($instance['postcount']) ? '5' : $instance['postcount'];
        $offset = empty($instance['offset']) ? '' : $instance['offset'];
        $sticky = isset($instance['sticky']) ? $instance['sticky'] : 0;

        echo $before_widget;
        if (!empty($title)) { echo $before_title . esc_attr($title) . $after_title; }
		$args = array('posts_per_page' => $postcount, 'offset' => $offset, 'ignore_sticky_posts' => $sticky);
		$widget_loop = new WP_Query($args); ?>
		<ul class="mh-rp-widget widget-list"><?php
			while ($widget_loop->have_posts()) : $widget_loop->the_post(); ?>
				<li class="rp-widget-item"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a></li><?php
			endwhile;
			wp_reset_postdata(); ?>
		</ul><?php
		echo $after_widget;
    }
    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = sanitize_text_field($new_instance['title']);
        $instance['postcount'] = absint($new_instance['postcount']);
        $instance['offset'] = absint($new_instance['offset']);
        $instance['sticky'] = isset($new_instance['sticky']) ? strip_tags($new_instance['sticky']) : '';
        return $instance;
    }
    function form($instance) {
        $defaults = array('title' => '', 'postcount' => '5', 'offset' => '0', 'sticky' => 0);
        $instance = wp_parse_args((array) $instance, $defaults); ?>

        <p>
        	<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'mh-newsdesk-lite'); ?></label>
			<input class="widefat" type="text" value="<?php echo esc_attr($instance['title']); ?>" name="<?php echo $this->get_field_name('title'); ?>" id="<?php echo $this->get_field_id('title'); ?>" />
        </p>
	    <p>
        	<label for="<?php echo $this->get_field_id('postcount'); ?>"><?php _e('Limit Post Number:', 'mh-newsdesk-lite'); ?></label>
			<input class="widefat" type="text" value="<?php echo esc_attr($instance['postcount']); ?>" name="<?php echo $this->get_field_name('postcount'); ?>" id="<?php echo $this->get_field_id('postcount'); ?>" />
	    </p>
	    <p>
        	<label for="<?php echo $this->get_field_id('offset'); ?>"><?php _e('Skip Posts (Offset):', 'mh-newsdesk-lite'); ?></label>
			<input class="widefat" type="text" value="<?php echo esc_attr($instance['offset']); ?>" name="<?php echo $this->get_field_name('offset'); ?>" id="<?php echo $this->get_field_id('offset'); ?>" />
	    </p>
        <p>
      		<input id="<?php echo $this->get_field_id('sticky'); ?>" name="<?php echo $this->get_field_name('sticky'); ?>" type="checkbox" value="1" <?php checked('1', $instance['sticky']); ?>/>
	  		<label for="<?php echo $this->get_field_id('sticky'); ?>"><?php _e('Ignore Sticky Posts', 'mh-newsdesk-lite'); ?></label>
    	</p><?php
    }
}
?>