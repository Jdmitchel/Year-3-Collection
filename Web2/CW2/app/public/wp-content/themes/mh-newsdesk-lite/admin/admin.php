<?php

if (!defined('ABSPATH')) {
	exit;
}

/***** Welcome Notice in WordPress Dashboard *****/

if (!function_exists('mh_newsdesk_lite_admin_notice')) {
	function mh_newsdesk_lite_admin_notice() {
		global $pagenow, $mh_newsdesk_lite_version;
		if (current_user_can('edit_theme_options') && 'index.php' === $pagenow && !get_option('mh_newsdesk_lite_notice_welcome') || current_user_can('edit_theme_options') && 'themes.php' === $pagenow && isset($_GET['activated']) && !get_option('mh_newsdesk_lite_notice_welcome')) {
			wp_enqueue_style('mh-newsdesk-lite-admin-notice', get_template_directory_uri() . '/admin/admin-notice.css', array(), $mh_newsdesk_lite_version);
			mh_newsdesk_lite_welcome_notice();
		}
	}
}
add_action('admin_notices', 'mh_newsdesk_lite_admin_notice');

/***** Hide Welcome Notice in WordPress Dashboard *****/

if (!function_exists('mh_newsdesk_lite_hide_notice')) {
	function mh_newsdesk_lite_hide_notice() {
		if (isset($_GET['mh-newsdesk-lite-hide-notice']) && isset($_GET['_mh_newsdesk_lite_notice_nonce'])) {
			if (!wp_verify_nonce($_GET['_mh_newsdesk_lite_notice_nonce'], 'mh_newsdesk_lite_hide_notices_nonce')) {
				wp_die(__('Action failed. Please refresh the page and retry.', 'mh-newsdesk-lite'));
			}
			if (!current_user_can('edit_theme_options')) {
				wp_die(__('You do not have the necessary permission to perform this action.', 'mh-newsdesk-lite'));
			}
			$hide_notice = sanitize_text_field($_GET['mh-newsdesk-lite-hide-notice']);
			update_option('mh_newsdesk_lite_notice_' . $hide_notice, 1);
		}
	}
}
add_action('wp_loaded', 'mh_newsdesk_lite_hide_notice');

/***** Content of Welcome Notice in WordPress Dashboard *****/

if (!function_exists('mh_newsdesk_lite_welcome_notice')) {
	function mh_newsdesk_lite_welcome_notice() {
		global $mh_newsdesk_lite_data; ?>
		<div class="notice notice-success mh-welcome-notice">
			<a class="notice-dismiss mh-welcome-notice-hide" href="<?php echo esc_url(wp_nonce_url(remove_query_arg(array('activated'), add_query_arg('mh-newsdesk-lite-hide-notice', 'welcome')), 'mh_newsdesk_lite_hide_notices_nonce', '_mh_newsdesk_lite_notice_nonce')); ?>">
				<span class="screen-reader-text">
					<?php echo esc_html__('Dismiss this notice.', 'mh-newsdesk-lite'); ?>
				</span>
			</a>
			<p><?php printf(esc_html__('Thanks for using %s! To get started please make sure you visit our %swelcome page%s.', 'mh-newsdesk-lite'), $mh_newsdesk_lite_data['Name'], '<a href="' . esc_url(admin_url('themes.php?page=newsdesk')) . '">', '</a>'); ?></p>
			<p class="mh-welcome-notice-button">
				<a class="button-secondary" href="<?php echo esc_url(admin_url('themes.php?page=newsdesk')); ?>">
					<?php printf(esc_html__('Get Started with %s', 'mh-newsdesk-lite'), $mh_newsdesk_lite_data['Name']); ?>
				</a>
				<a class="button-primary" href="<?php echo esc_url('https://www.mhthemes.com/themes/mh/newsdesk/'); ?>" target="_blank">
					<?php esc_html_e('Upgrade to MH Newsdesk Pro', 'mh-newsdesk-lite'); ?>
				</a>
			</p>
		</div><?php
	}
}

/***** Theme Info Page *****/

if (!function_exists('mh_newsdesk_lite_add_theme_info_page')) {
	function mh_newsdesk_lite_add_theme_info_page() {
		add_theme_page(esc_html__('Welcome to MH Newsdesk lite', 'mh-newsdesk-lite'), esc_html__('Theme Info', 'mh-newsdesk-lite'), 'edit_theme_options', 'newsdesk', 'mh_newsdesk_lite_display_theme_info_page');
	}
}
add_action('admin_menu', 'mh_newsdesk_lite_add_theme_info_page');

if (!function_exists('mh_newsdesk_lite_display_theme_info_page')) {
	function mh_newsdesk_lite_display_theme_info_page() {
		global $mh_newsdesk_lite_data; ?>
		<div class="theme-info-wrap">
			<h1>
				<?php printf(esc_html__('Welcome to %1s %2s', 'mh-newsdesk-lite'), $mh_newsdesk_lite_data['Name'], $mh_newsdesk_lite_data['Version']); ?>
			</h1>
			<div class="mh-row theme-intro mh-clearfix">
				<div class="mh-col-1-4">
					<img class="theme-screenshot" src="<?php echo get_template_directory_uri(); ?>/screenshot.png" alt="<?php esc_html_e('Theme Screenshot', 'mh-newsdesk-lite'); ?>" />
				</div>
				<div class="mh-col-3-4 theme-description">
					<?php echo esc_html($mh_newsdesk_lite_data['Description']); ?>
				</div>
			</div>
			<hr>
			<div class="theme-links mh-clearfix">
				<p>
					<strong><?php esc_html_e('Important Links:', 'mh-newsdesk-lite'); ?></strong>
					<a href="<?php echo esc_url('https://www.mhthemes.com/themes/mh/newsdesk-lite/'); ?>" target="_blank">
						<?php esc_html_e('Theme Info Page', 'mh-newsdesk-lite'); ?>
					</a>
					<a href="<?php echo esc_url('https://www.mhthemes.com/support/'); ?>" target="_blank">
						<?php esc_html_e('Support Center', 'mh-newsdesk-lite'); ?>
					</a>
					<a href="<?php echo esc_url('https://wordpress.org/support/theme/mh-newsdesk-lite'); ?>" target="_blank">
						<?php esc_html_e('Support Forum', 'mh-newsdesk-lite'); ?>
					</a>
					<a href="<?php echo esc_url('https://www.mhthemes.com/themes/showcase/'); ?>" target="_blank">
						<?php esc_html_e('MH Themes Showcase', 'mh-newsdesk-lite'); ?>
					</a>
				</p>
			</div>
			<hr>
			<div id="getting-started">
				<h3>
					<?php printf(esc_html__('Get Started with %s', 'mh-newsdesk-lite'), $mh_newsdesk_lite_data['Name']); ?>
				</h3>
				<div class="mh-row mh-clearfix">
					<div class="mh-col-1-2">
						<div class="section">
							<h4>
								<span class="dashicons dashicons-welcome-learn-more"></span>
								<?php esc_html_e('Theme Documentation', 'mh-newsdesk-lite'); ?>
							</h4>
							<p class="about">
								<?php printf(esc_html__('Need any help with configuring %s? The documentation for this theme includes all theme related information that is needed to get your site up and running in no time. In case you have any additional questions, feel free to reach out in the theme support forums on WordPress.org.', 'mh-newsdesk-lite'), $mh_newsdesk_lite_data['Name']); ?>
							</p>
							<p>
								<a href="<?php echo esc_url('https://www.mhthemes.com/support/documentation-mh-newsdesk/'); ?>" target="_blank" class="button button-secondary">
									<?php esc_html_e('Visit Documentation', 'mh-newsdesk-lite'); ?>
								</a>
								<a href="<?php echo esc_url('https://wordpress.org/support/theme/mh-newsdesk-lite'); ?>" target="_blank" class="button button-secondary">
									<?php esc_html_e('Support Forum', 'mh-newsdesk-lite'); ?>
								</a>
							</p>
						</div>
						<div class="section">
							<h4>
								<span class="dashicons dashicons-admin-appearance"></span>
								<?php esc_html_e('Theme Options', 'mh-newsdesk-lite'); ?>
							</h4>
							<p class="about">
								<?php printf(esc_html__('%s supports the Theme Customizer for all theme settings. Click "Customize Theme" to open the Customizer now.',  'mh-newsdesk-lite'), $mh_newsdesk_lite_data['Name']); ?>
							</p>
							<p>
								<a href="<?php echo admin_url('customize.php'); ?>" class="button button-secondary">
									<?php esc_html_e('Customize Theme', 'mh-newsdesk-lite'); ?>
								</a>
							</p>
						</div>
					</div>
					<div class="mh-col-1-2">
						<div class="section">
							<h4>
								<span class="dashicons dashicons-cart"></span>
								<?php esc_html_e('MH Newsdesk Pro', 'mh-newsdesk-lite'); ?>
							</h4>
							<p class="about">
								<?php esc_html_e('If you like the free version of this theme, you will LOVE the full version of MH Newsdesk which includes unique custom widgets, additional features and more useful options to customize your website.', 'mh-newsdesk-lite'); ?>
							</p>
							<p>
								<a href="<?php echo esc_url('https://www.mhthemes.com/themes/mh/newsdesk/'); ?>" target="_blank" class="button button-primary">
									<?php esc_html_e('Upgrade to MH Newsdesk Pro', 'mh-newsdesk-lite'); ?>
								</a>
							</p>
						</div>
						<div class="section">
							<h4>
								<span class="dashicons dashicons-images-alt"></span>
								<?php esc_html_e('MH Themes Showcase', 'mh-newsdesk-lite'); ?>
							</h4>
							<p class="about">
								<?php esc_html_e('Need some inspiration? In the MH Themes Showcase you can see websites of other users who are running WordPress themes by MH Themes.', 'mh-newsdesk-lite'); ?>
							</p>
							<p>
								<a href="<?php echo esc_url('https://www.mhthemes.com/themes/showcase/'); ?>" target="_blank" class="button button-secondary">
									<?php esc_html_e('MH Themes Showcase', 'mh-newsdesk-lite'); ?>
								</a>
							</p>
						</div>
					</div>
				</div>
			</div>
			<hr>
			<div class="theme-comparison">
				<h3 class="theme-comparison-intro">
					<?php esc_html_e('Upgrade to MH Newsdesk for more awesome features:', 'mh-newsdesk-lite'); ?>
				</h3>
				<table>
					<thead class="theme-comparison-header">
						<tr>
							<th class="table-feature-title"><h3><?php esc_html_e('Features', 'mh-newsdesk-lite'); ?></h3></th>
							<th><h3><?php esc_html_e('MH Newsdesk lite', 'mh-newsdesk-lite'); ?></h3></th>
							<th><h3><?php esc_html_e('MH Newsdesk', 'mh-newsdesk-lite'); ?></h3></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><h3><?php esc_html_e('Theme Price', 'mh-newsdesk-lite'); ?></h3></td>
							<td><?php esc_html_e('Free', 'mh-newsdesk-lite'); ?></td>
							<td>
								<a href="<?php echo esc_url('https://www.mhthemes.com/pricing/#join'); ?>" target="_blank">
									<?php esc_html_e('View Pricing', 'mh-newsdesk-lite'); ?>
								</a>
							</td>
						</tr>
						<tr>
							<td><h3><?php esc_html_e('Responsive Layout', 'mh-newsdesk-lite'); ?></h3></td>
							<td><span class="dashicons dashicons-yes"></span></td>
							<td><span class="dashicons dashicons-yes"></span></td>
						</tr>
						<tr>
							<td><h3><?php esc_html_e('Extended Layout Options', 'mh-newsdesk-lite'); ?></h3></td>
							<td><span class="dashicons dashicons-no"></span></td>
							<td><span class="dashicons dashicons-yes"></span></td>
						</tr>
						<tr>
							<td><h3><?php esc_html_e('Homepage Template', 'mh-newsdesk-lite'); ?></h3></td>
							<td><span class="dashicons dashicons-yes"></span></td>
							<td><span class="dashicons dashicons-yes"></span></td>
						</tr>
						<tr>
							<td><h3><?php esc_html_e('Total Widget Areas', 'mh-newsdesk-lite'); ?></h3></td>
							<td><?php esc_html_e('6', 'mh-newsdesk-lite'); ?></td>
							<td><?php esc_html_e('14', 'mh-newsdesk-lite'); ?></td>
						</tr>
						<tr>
							<td><h3><?php esc_html_e('Custom Widgets', 'mh-newsdesk-lite'); ?></h3></td>
							<td><?php esc_html_e('3 (Basic Features)', 'mh-newsdesk-lite'); ?></td>
							<td><?php esc_html_e('10 (Full Features)', 'mh-newsdesk-lite'); ?></td>
						</tr>
						<tr>
							<td><h3><?php esc_html_e('Custom Menus', 'mh-newsdesk-lite'); ?></h3></td>
							<td><?php esc_html_e('1', 'mh-newsdesk-lite'); ?></td>
							<td><?php esc_html_e('4', 'mh-newsdesk-lite'); ?></td>
						</tr>
						<tr>
							<td><h3><?php esc_html_e('jQuery News Ticker', 'mh-newsdesk-lite'); ?></h3></td>
							<td><span class="dashicons dashicons-no"></span></td>
							<td><span class="dashicons dashicons-yes"></span></td>
						</tr>
						<tr>
							<td><h3><?php esc_html_e('Built-in Breadcrumb Navigation', 'mh-newsdesk-lite'); ?></h3></td>
							<td><span class="dashicons dashicons-no"></span></td>
							<td><span class="dashicons dashicons-yes"></span></td>
						</tr>
						<tr>
							<td><h3><?php esc_html_e('Built-in Social Buttons', 'mh-newsdesk-lite'); ?></h3></td>
							<td><span class="dashicons dashicons-no"></span></td>
							<td><span class="dashicons dashicons-yes"></span></td>
						</tr>
						<tr>
							<td><h3><?php esc_html_e('Related Posts Feature', 'mh-newsdesk-lite'); ?></h3></td>
							<td><span class="dashicons dashicons-no"></span></td>
							<td><span class="dashicons dashicons-yes"></span></td>
						</tr>
						<tr>
							<td><h3><?php esc_html_e('Full-Width Page Template', 'mh-newsdesk-lite'); ?></h3></td>
							<td><span class="dashicons dashicons-yes"></span></td>
							<td><span class="dashicons dashicons-yes"></span></td>
						</tr>
						<tr>
							<td><h3><?php esc_html_e('Contact Page Template', 'mh-newsdesk-lite'); ?></h3></td>
							<td><span class="dashicons dashicons-no"></span></td>
							<td><span class="dashicons dashicons-yes"></span></td>
						</tr>
						<tr>
							<td><h3><?php esc_html_e('HTML Sitemap Template', 'mh-newsdesk-lite'); ?></h3></td>
							<td><span class="dashicons dashicons-no"></span></td>
							<td><span class="dashicons dashicons-yes"></span></td>
						</tr>
						<tr>
							<td><h3><?php esc_html_e('Theme Options', 'mh-newsdesk-lite'); ?></h3></td>
							<td><?php esc_html_e('Basic Options', 'mh-newsdesk-lite'); ?></td>
							<td><span class="dashicons dashicons-yes"></span></td>
						</tr>
						<tr>
							<td><h3><?php esc_html_e('Color Options', 'mh-newsdesk-lite'); ?></h3></td>
							<td><span class="dashicons dashicons-no"></span></td>
							<td><span class="dashicons dashicons-yes"></span></td>
						</tr>
						<tr>
							<td><h3><?php esc_html_e('Google Webfonts Collection', 'mh-newsdesk-lite'); ?></h3></td>
							<td><span class="dashicons dashicons-no"></span></td>
							<td><span class="dashicons dashicons-yes"></span></td>
						</tr>
						<tr>
							<td><h3><?php esc_html_e('Typography Options', 'mh-newsdesk-lite'); ?></h3></td>
							<td><span class="dashicons dashicons-no"></span></td>
							<td><span class="dashicons dashicons-yes"></span></td>
						</tr>
						<tr>
							<td><h3><?php esc_html_e('Extended Features', 'mh-newsdesk-lite'); ?></h3></td>
							<td><span class="dashicons dashicons-no"></span></td>
							<td><span class="dashicons dashicons-yes"></span></td>
						</tr>
						<tr>
							<td><h3><?php esc_html_e('Child Theme Files', 'mh-newsdesk-lite'); ?></h3></td>
							<td><span class="dashicons dashicons-no"></span></td>
							<td><span class="dashicons dashicons-yes"></span></td>
						</tr>
						<tr>
							<td><h3><?php esc_html_e('Support', 'mh-newsdesk-lite'); ?></h3></td>
							<td><?php esc_html_e('Support Forum', 'mh-newsdesk-lite'); ?></td>
							<td><?php esc_html_e('Personal E-Mail Support', 'mh-newsdesk-lite'); ?></td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td>
								<a href="<?php echo esc_url('https://www.mhthemes.com/themes/mh/newsdesk/'); ?>" target="_blank" class="upgrade-button">
									<?php esc_html_e('Upgrade to MH Newsdesk Pro', 'mh-newsdesk-lite'); ?>
								</a>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<hr>
			<div id="theme-author">
				<p><?php printf(esc_html__('%1s is proudly brought to you by %2s. If you like %3s: %4s.', 'mh-newsdesk-lite'),
					$mh_newsdesk_lite_data['Name'],
					'<a target="_blank" href="https://www.mhthemes.com/" title="MH Themes">MH Themes</a>',
					$mh_newsdesk_lite_data['Name'],
					'<a target="_blank" href="https://wordpress.org/support/view/theme-reviews/mh-newsdesk-lite?filter=5" title="MH Newsdesk lite Review">' . esc_html__('Rate this theme', 'mh-newsdesk-lite') . '</a>'); ?>
				</p>
			</div>
		</div> <?php
	}
}

?>