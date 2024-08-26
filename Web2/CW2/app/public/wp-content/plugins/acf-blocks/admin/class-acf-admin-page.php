<?php
class acfb_Settings_Page {
	public function __construct() {
		add_action( 'admin_menu', array( $this, 'acfb_settings' ), 10 );
	}
	public function acfb_settings() {
		$page_title = 'ACF Blocks Dashboard';
		$menu_title = 'ACF Blocks';
		$capability = 'manage_options';
		$slug = 'acf-blocks';
		$callback = array($this, 'acfb_settings_content');
		$icon_url = 'dashicons-admin-plugins';
		add_menu_page($page_title, $menu_title, $capability, $slug, $callback, $icon_url);
	}
	public function acfb_settings_content() {
	?>
	


<div class="acfb-settings-wrap">
    <div class="components-panel">
        <div class="components-panel__body is-opened">
            <div class="components-panel__header">
	            <?php
	            $is_free = acfb_fs()->is_free_plan();
	            ?>
                <h2>Getting Started with <strong>ACF Blocks</strong></h2>
	            <p>Congratulations! You've just added awesome Gutenberg blocks. Check more information about the plugin below. ACF Blocks is built on top of <a href="https://www.advancedcustomfields.com/pro/?utm_source=ACFBlocks%2B<?php echo $is_free ? 'Free' : 'Pro'; ?>&utm_medium=insideplugin&utm_campaign=ACFBlocks%2Bupgrade">Advanced&nbsp;Custom&nbsp;Fields&nbsp;PRO</a>, please make sure you have ACF PRO plugin installed & activated to use ACF Blocks Free.</p>
                <iframe width="650" height="380" src="https://www.youtube.com/embed/zupr0fl_qAw" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        

            	<div class="acfb_admin_templib">
            		<h1>Ready to Use Section Templates</h1>
            		<p>We created customizable ready to use sections that you can use to save time creating a beautiful WordPress website fast. We have added these templates to Gutenberg Templates Library, from where you can easily copy & paste these (and many more) Gutenberg template easily.</p>
            		<div class="acfb_admin_templib_button">
            			<a href="https://templates.gutenberghub.com/?plugin=ACF%20Blocks" target="_blank">Browse Library</a>
            			<a href="https://chrome.google.com/webstore/detail/gutenberghub/pkjhekakadbpmpehgkdndgmpepphekbk" target="_blank">Chrome Extension</a>
            		</div>
            	</div>

                <div class="acfb_admin_call_to">
                	<div>If you have any questions or suggestion, let us know through <a href="https://twitter.com/acfwpblocks" target="_blank">Twitter</a> or our <a href="https://www.facebook.com/acfwpblocks/" target="_blank">Facebook community </a>. Also, <a href="https://acfblocks.com/subscribe" target="_blank">subscribe to our newsletter</a> if you want to stay up to date with what's new and upcoming at AcfBlocks. 
                	<br>
                	<br>
					<span style="text-align: left;">For bug reporting please use the contact form <a href="<?php menu_page_url('acf-blocks-contact');  ?>">here</a>.</span> 
                	</div>
                </div>
            </div>
        </div>
    </div>
</div>


	<?php
	}
	
}
new acfb_Settings_Page();