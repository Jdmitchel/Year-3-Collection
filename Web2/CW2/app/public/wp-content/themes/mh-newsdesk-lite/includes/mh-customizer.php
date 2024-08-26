<?php

function mh_newsdesk_lite_customize_register($wp_customize) {

	/***** Register Custom Controls *****/

	class MH_Newsdesk_Lite_Upgrade extends WP_Customize_Control {
        public function render_content() {  ?>
        	<p class="mh-upgrade-thumb">
        		<img src="<?php echo get_template_directory_uri(); ?>/images/mh_newsdesk.png" />
        	</p>
        	<p class="customize-control-title mh-upgrade-title">
        		<?php esc_html_e('MH Newsdesk Pro', 'mh-newsdesk-lite'); ?>
        	</p>
        	<p class="textfield mh-upgrade-text">
        		<?php esc_html_e('If you like the free version of this theme, you will LOVE the full version of MH Newsdesk which includes unique custom widgets, additional features and more useful options to customize your website.', 'mh-newsdesk-lite'); ?>
			</p>
			<p class="customize-control-title mh-upgrade-title">
        		<?php esc_html_e('Additional Features:', 'mh-newsdesk-lite'); ?>
        	</p>
        	<ul class="mh-upgrade-features">
	        	<li class="mh-upgrade-feature-item">
	        		<?php esc_html_e('Options to modify color scheme', 'mh-newsdesk-lite'); ?>
	        	</li>
	        	<li class="mh-upgrade-feature-item">
	        		<?php esc_html_e('Typography options', 'mh-newsdesk-lite'); ?>
	        	</li>
	        	<li class="mh-upgrade-feature-item">
	        		<?php esc_html_e('Several additional widget areas', 'mh-newsdesk-lite'); ?>
	        	</li>
	        	<li class="mh-upgrade-feature-item">
	        		<?php esc_html_e('Additional custom widgets', 'mh-newsdesk-lite'); ?>
	        	</li>
	        	<li class="mh-upgrade-feature-item">
	        		<?php esc_html_e('Additional custom menu slots', 'mh-newsdesk-lite'); ?>
	        	</li>
	        	<li class="mh-upgrade-feature-item">
	        		<?php esc_html_e('Social buttons, related articles, ...', 'mh-newsdesk-lite'); ?>
	        	</li>
	        	<li class="mh-upgrade-feature-item">
	        		<?php esc_html_e('News ticker and many more...', 'mh-newsdesk-lite'); ?>
	        	</li>
        	</ul>
			<p class="mh-button mh-upgrade-button">
				<a href="https://www.mhthemes.com/themes/mh/newsdesk/" target="_blank" class="button button-secondary">
					<?php esc_html_e('Upgrade to MH Newsdesk Pro', 'mh-newsdesk-lite'); ?>
				</a>
			</p>
			<p class="mh-button">
				<a href="https://www.mhthemes.com/themes/showcase/" target="_blank" class="button button-secondary">
					<?php esc_html_e('MH Themes Showcase', 'mh-newsdesk-lite'); ?>
				</a>
			</p>
			<p class="mh-button">
				<a href="https://www.mhthemes.com/support/documentation-mh-newsdesk/" target="_blank" class="button button-secondary">
					<?php esc_html_e('Theme Documentation', 'mh-newsdesk-lite'); ?>
				</a>
			</p>
			<p class="mh-button">
				<a href="https://wordpress.org/support/theme/mh-newsdesk-lite" target="_blank" class="button button-secondary">
					<?php esc_html_e('Support Forum', 'mh-newsdesk-lite'); ?>
				</a>
			</p><?php
        }
    }

	/***** Add Panels *****/

	$wp_customize->add_panel('mh_theme_options', array('title' => esc_html__('Theme Options', 'mh-newsdesk-lite'), 'description' => '', 'capability' => 'edit_theme_options', 'theme_supports' => '', 'priority' => 1,));

	/***** Add Sections *****/

	$wp_customize->add_section('mh_newsdesk_lite_general', array('title' => esc_html__('General', 'mh-newsdesk-lite'), 'priority' => 1, 'panel' => 'mh_theme_options'));
	$wp_customize->add_section('mh_newsdesk_lite_upgrade', array('title' => esc_html__('More Features', 'mh-newsdesk-lite'), 'priority' => 2, 'panel' => 'mh_theme_options'));

    /***** Add Settings *****/

	$wp_customize->add_setting('mh_newsdesk_lite_options[excerpt_length]', array('default' => 35, 'type' => 'option', 'sanitize_callback' => 'mh_newsdesk_lite_sanitize_integer'));
    $wp_customize->add_setting('mh_newsdesk_lite_options[excerpt_more]', array('default' => esc_html__('Read More', 'mh-newsdesk-lite'), 'type' => 'option', 'sanitize_callback' => 'mh_newsdesk_lite_sanitize_text'));
	$wp_customize->add_setting('mh_newsdesk_lite_options[sidebar]', array('default' => 'right', 'type' => 'option', 'sanitize_callback' => 'mh_newsdesk_lite_sanitize_select'));
	$wp_customize->add_setting('mh_newsdesk_lite_options[premium_version_upgrade]', array('default' => '', 'type' => 'option', 'sanitize_callback' => 'esc_attr'));

    /***** Add Controls *****/

    $wp_customize->add_control('excerpt_length', array('label' => esc_html__('Custom Excerpt Length in Words', 'mh-newsdesk-lite'), 'section' => 'mh_newsdesk_lite_general', 'settings' => 'mh_newsdesk_lite_options[excerpt_length]', 'priority' => 1, 'type' => 'text'));
    $wp_customize->add_control('excerpt_more', array('label' => esc_html__('Custom Excerpt More-Text', 'mh-newsdesk-lite'), 'section' => 'mh_newsdesk_lite_general', 'settings' => 'mh_newsdesk_lite_options[excerpt_more]', 'priority' => 2, 'type' => 'text'));
	$wp_customize->add_control('sidebar', array('label' => esc_html__('Sidebar', 'mh-newsdesk-lite'), 'section' => 'mh_newsdesk_lite_general', 'settings' => 'mh_newsdesk_lite_options[sidebar]', 'priority' => 3, 'type' => 'select', 'choices' => array('right' => esc_html__('Right Sidebar', 'mh-newsdesk-lite'), 'left' => esc_html__('Left Sidebar', 'mh-newsdesk-lite'))));
	$wp_customize->add_control(new MH_Newsdesk_Lite_Upgrade($wp_customize, 'premium_version_upgrade', array('section' => 'mh_newsdesk_lite_upgrade', 'settings' => 'mh_newsdesk_lite_options[premium_version_upgrade]', 'priority' => 1)));
}
add_action('customize_register', 'mh_newsdesk_lite_customize_register');

/***** Data Sanitization *****/

function mh_newsdesk_lite_sanitize_text($input) {
    return wp_kses_post(force_balance_tags($input));
}
function mh_newsdesk_lite_sanitize_integer($input) {
    return strip_tags(intval($input));
}
function mh_newsdesk_lite_sanitize_checkbox($input) {
    if ($input == 1) {
        return 1;
    } else {
        return '';
    }
}
function mh_newsdesk_lite_sanitize_select($input) {
    $valid = array(
        'enable' => esc_html__('Enable', 'mh-newsdesk-lite'),
        'disable' => esc_html__('Disable', 'mh-newsdesk-lite'),
        'right' => esc_html__('Right Sidebar', 'mh-newsdesk-lite'),
        'left' => esc_html__('Left Sidebar', 'mh-newsdesk-lite')
    );
    if (array_key_exists($input, $valid)) {
        return $input;
    } else {
        return '';
    }
}

/***** Return Theme Options / Set Default Options *****/

if (!function_exists('mh_newsdesk_lite_theme_options')) {
	function mh_newsdesk_lite_theme_options() {
		$theme_options = wp_parse_args(
			get_option('mh_newsdesk_lite_options', array()),
			mh_newsdesk_lite_default_options()
		);
		return $theme_options;
	}
}

if (!function_exists('mh_newsdesk_lite_default_options')) {
	function mh_newsdesk_lite_default_options() {
		$default_options = array(
			'excerpt_length' => 35,
			'excerpt_more' => esc_html__('Read More', 'mh-newsdesk-lite'),
			'sidebar' => 'right'
		);
		return $default_options;
	}
}

/***** Enqueue Customizer CSS *****/

function mh_newsdesk_lite_customizer_css() {
	wp_enqueue_style('mh-customizer', get_template_directory_uri() . '/admin/customizer.css', array());
}
add_action('customize_controls_print_styles', 'mh_newsdesk_lite_customizer_css');

?>