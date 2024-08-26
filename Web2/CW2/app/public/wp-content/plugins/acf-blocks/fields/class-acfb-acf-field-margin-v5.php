<?php

// exit if accessed directly
if( ! defined( 'ABSPATH' ) ) exit;


// check if class already exists
if( !class_exists('acfb_acf_field_margin') ) :


class acfb_acf_field_margin extends acf_field {
	
	
	/*
	*  __construct
	*
	*  This function will setup the field type data
	*
	*  @type	function
	*  @date	5/03/2014
	*  @since	5.0.0
	*
	*  @param	n/a
	*  @return	n/a
	*/
	
	function __construct( $settings ) {
		
		/*
		*  name (string) Single word, no spaces. Underscores allowed
		*/

		
		$this->name = 'margin';
		
		
		/*
		*  label (string) Multiple words, can include spaces, visible when selecting a field type
		*/
		
		$this->label = __('Acfb Margin', 'acfb-margin');
		
		
		/*
		*  category (string) basic | content | choice | relational | jquery | layout | CUSTOM GROUP NAME
		*/
		
		$this->category = 'basic';
		
		
		/*
		*  defaults (array) Array of default settings which are merged into the field object. These are used later in settings
		*/
		
		$this->defaults = array(
			'margin_enable' => 0
		);

		
		/*
		*  l10n (array) Array of strings that are used in JavaScript. This allows JS strings to be translated in PHP and loaded via:
		*  var message = acf._e('margin', 'error');
		*/
		
		$this->l10n = array(
			'error'	=> __('Error! Please enter a higher value', 'acfb-margin'),
		);
		
		
		/*
		*  settings (array) Store plugin settings (url, path, version) as a reference for later use with assets
		*/
		
		$this->settings = $settings;
		
		
		// do not delete!
    	parent::__construct();
    	
	}
	
	
	/*
	*  render_field_settings()
	*
	*  Create extra settings for your field. These are visible when editing a field
	*
	*  @type	action
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	$field (array) the $field being edited
	*  @return	n/a
	*/
	
	function render_field_settings( $field ) {
		
		/*
		*  acf_render_field_setting
		*
		*  This function will create a setting for your field. Simply pass the $field parameter and an array of field settings.
		*  The array of settings does not require a `value` or `prefix`; These settings are found from the $field array.
		*
		*  More than one setting can be added by copy/paste the above code.
		*  Please note that you must also have a matching $defaults value for the field name (font_size)
		*/

		acf_render_field_setting( $field, array(
			'label'			=> __('Enable Field','acfb-typography'),
			'instructions'	=> __('Default','acfb-typography'),
			'type'			=> 'true_false',
			'name'			=> 'margin_enable',
			'layout'        => 'horizontal',
			'ui'			=> 0
		));

		acf_render_field_setting( $field, array(
			'label'			=> __('Margin Top','acfb-margin'),
			'instructions'	=> __('Default','acfb-margin'),
			'type'			=> 'number',
			'name'			=> 'margin_top',
			'prepend'		=> 'px',
		));
		
		acf_render_field_setting( $field, array(
			'label'			=> __('Margin Right','acfb-margin'),
			'instructions'	=> __('Default','acfb-margin'),
			'type'			=> 'number',
			'name'			=> 'margin_right',
			'prepend'		=> 'px',
		));

		acf_render_field_setting( $field, array(
			'label'			=> __('Margin Bottom','acfb-margin'),
			'instructions'	=> __('Default','acfb-margin'),
			'type'			=> 'number',
			'name'			=> 'margin_bottom',
			'prepend'		=> 'px',
		));


		acf_render_field_setting( $field, array(
			'label'			=> __('Margin Left','acfb-margin'),
			'instructions'	=> __('Default','acfb-margin'),
			'type'			=> 'number',
			'name'			=> 'margin_left',
			'prepend'		=> 'px',
		));

		



	}
	
	
	
	/*
	*  render_field()
	*
	*  Create the HTML interface for your field
	*
	*  @param	$field (array) the $field being rendered
	*
	*  @type	action
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	$field (array) the $field being edited
	*  @return	n/a
	*/
	
	function render_field( $field ) {
		
		
		/*
		*  Review the data of $field.
		*  This will show what data is available
		*/


		// echo '<pre>';
		// 	print_r( $field );
		// echo '</pre>';
		
		
		/*
		*  Create a simple text input using the 'font_size' setting.
		*/

		$field = array_merge($this->defaults, $field);

		// $default_font_family = $field['font_family'];

		if ( empty($field['value']) ) {

			$field['value']['margin_enable'] = $field['margin_enable'];

			$field['value']['margin_top'] = $field['margin_top'];
			$field['value']['margin_bottom'] = $field['margin_bottom'];
			$field['value']['margin_left'] = $field['margin_left'];
			$field['value']['margin_right'] = $field['margin_right'];

		}

		?>
	<?php 
		?>


<div class="acf_margin_root acfb_cs_field_root">


	<div class="acf-input">
	<div class="acf-true-false">
			<input type="checkbox" 
			name="<?php echo $field['name'] . 'margin_enable' ?>" 
			value="<?php echo $field['value']['margin_enable']; ?>"
			id="acfb_eye_margin_<?php echo $field['name']; ?>" 
			class="acfb-checkbox-true-false"
			<?php 
				if ($field['value']['margin_enable'] === 1) {

					echo 'checked';

				}
			?>
			>
			<label for="acfb_eye_margin_<?php echo $field['name']; ?>">
				<svg class="acfb_eye_svg" viewBox="0 -1 401.52289 401" xmlns="http://www.w3.org/2000/svg"><path d="m370.589844 250.972656c-5.523438 0-10 4.476563-10 10v88.789063c-.019532 16.5625-13.4375 29.984375-30 30h-280.589844c-16.5625-.015625-29.980469-13.4375-30-30v-260.589844c.019531-16.558594 13.4375-29.980469 30-30h88.789062c5.523438 0 10-4.476563 10-10 0-5.519531-4.476562-10-10-10h-88.789062c-27.601562.03125-49.96875 22.398437-50 50v260.59375c.03125 27.601563 22.398438 49.96875 50 50h280.589844c27.601562-.03125 49.96875-22.398437 50-50v-88.792969c0-5.523437-4.476563-10-10-10zm0 0"/><path d="m376.628906 13.441406c-17.574218-17.574218-46.066406-17.574218-63.640625 0l-178.40625 178.40625c-1.222656 1.222656-2.105469 2.738282-2.566406 4.402344l-23.460937 84.699219c-.964844 3.472656.015624 7.191406 2.5625 9.742187 2.550781 2.546875 6.269531 3.527344 9.742187 2.566406l84.699219-23.464843c1.664062-.460938 3.179687-1.34375 4.402344-2.566407l178.402343-178.410156c17.546875-17.585937 17.546875-46.054687 0-63.640625zm-220.257812 184.90625 146.011718-146.015625 47.089844 47.089844-146.015625 146.015625zm-9.40625 18.875 37.621094 37.625-52.039063 14.417969zm227.257812-142.546875-10.605468 10.605469-47.09375-47.09375 10.609374-10.605469c9.761719-9.761719 25.589844-9.761719 35.351563 0l11.738281 11.734375c9.746094 9.773438 9.746094 25.589844 0 35.359375zm0 0"/></svg>
			</label>
	</div>
	</div>



<?php 
	$acfb_margin_display = $field['value']['margin_enable'] === 1 ? 'block' : 'none';
?>

<div class="acfb_margin_main acfb_cs_field_main" style="display: <?php echo $acfb_margin_display; ?>">

		<div class="acfb-margin">

        <div class="acf-field acf-field-range">
        	<div class="acf-label">
        		<label>Top</label>
        	</div>
        	<div class="acf-input">
        		<div class="acf-range-wrap">
    	    		<input 
						type="number" 
						id="test"
						name="<?php echo $field['name'] . 'margin_top' ?>"
						value="<?php echo esc_attr($field['value']['margin_top']) ?>" 
						step="1" style="width: 3.9em;"
					>
					<div class="acf-append">
						<?php //echo $field['value']['margin_top'] ?>
							px
					</div>
				</div>
        	</div>
        </div>


         <div class="acf-field acf-field-range">
        	<div class="acf-label">
        		<label>Right</label>
        	</div>
        	<div class="acf-input">
        		<div class="acf-range-wrap">
    	    		<input 
						type="number" 
						id="test"
						name="<?php echo $field['name'] . 'margin_right' ?>"
						value="<?php echo esc_attr($field['value']['margin_right']) ?>" 
						step="1" style="width: 3.9em;"
					>
					<div class="acf-append">
						<?php //echo $field['value']['margin_right'] ?>
							px
					</div>
				</div>
        	</div>
         </div>


         <div class="acf-field acf-field-range">
        	<div class="acf-label">
        		<label>Bottom</label>
        	</div>
        	<div class="acf-input">
        		<div class="acf-range-wrap">
    	    		<input 
						type="number" 
						id="test"
						name="<?php echo $field['name'] . 'margin_bottom' ?>"
						value="<?php echo esc_attr($field['value']['margin_bottom']) ?>" 
						step="1" style="width: 3.9em;"
					>
					<div class="acf-append">
						<?php //echo $field['value']['margin_bottom'] ?>
							px
					</div>
				</div>
        	</div>
        </div>

         <div class="acf-field acf-field-range">
        	<div class="acf-label">
        		<label>Left</label>
        	</div>
        	<div class="acf-input">
        		<div class="acf-range-wrap">
    	    		<input 
						type="number" 
						id="test"
						name="<?php echo $field['name'] . 'margin_left' ?>"
						value="<?php echo esc_attr($field['value']['margin_left']) ?>" 
						step="1" style="width: 3.9em;"
					>
					<div class="acf-append">
						<?php //echo $field['value']['margin_left'] ?>
							px
					</div>
				</div>
        	</div>
        </div>

        </div>
        </div>
        </div>


		<?php
	}
	
		
	/*
	*  input_admin_enqueue_scripts()
	*
	*  This action is called in the admin_enqueue_scripts action on the edit screen where your field is created.
	*  Use this action to add CSS + JavaScript to assist your render_field() action.
	*
	*  @type	action (admin_enqueue_scripts)
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	n/a
	*  @return	n/a
	*/

	
	/*
	function input_admin_enqueue_scripts() {
		
		// vars
		$url = $this->settings['url'];
		$version = $this->settings['version'];
		
		
		// register & include JS
		wp_register_script('acfb-margin', "{$url}assets/js/input.js", array('acf-input'), $version);
		wp_enqueue_script('acfb-margin');
		
		
		// register & include CSS
		wp_register_style('acfb-margin', "{$url}assets/css/input.css", array('acf-input'), $version);
		wp_enqueue_style('acfb-margin');
		
	}
	
	*/
	
	
	/*
	*  input_admin_head()
	*
	*  This action is called in the admin_head action on the edit screen where your field is created.
	*  Use this action to add CSS and JavaScript to assist your render_field() action.
	*
	*  @type	action (admin_head)
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	n/a
	*  @return	n/a
	*/

	/*
		
	function input_admin_head() {
	
		
		
	}
	
	*/
	
	
	/*
   	*  input_form_data()
   	*
   	*  This function is called once on the 'input' page between the head and footer
   	*  There are 2 situations where ACF did not load during the 'acf/input_admin_enqueue_scripts' and 
   	*  'acf/input_admin_head' actions because ACF did not know it was going to be used. These situations are
   	*  seen on comments / user edit forms on the front end. This function will always be called, and includes
   	*  $args that related to the current screen such as $args['post_id']
   	*
   	*  @type	function
   	*  @date	6/03/2014
   	*  @since	5.0.0
   	*
   	*  @param	$args (array)
   	*  @return	n/a
   	*/
   	
   	/*
   	
   	function input_form_data( $args ) {
	   	
		
	
   	}
   	
   	*/
	
	
	/*
	*  input_admin_footer()
	*
	*  This action is called in the admin_footer action on the edit screen where your field is created.
	*  Use this action to add CSS and JavaScript to assist your render_field() action.
	*
	*  @type	action (admin_footer)
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	n/a
	*  @return	n/a
	*/

	/*
		
	function input_admin_footer() {
	
		
		
	}
	
	*/
	
	
	/*
	*  field_group_admin_enqueue_scripts()
	*
	*  This action is called in the admin_enqueue_scripts action on the edit screen where your field is edited.
	*  Use this action to add CSS + JavaScript to assist your render_field_options() action.
	*
	*  @type	action (admin_enqueue_scripts)
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	n/a
	*  @return	n/a
	*/

	/*
	
	function field_group_admin_enqueue_scripts() {
		
	}
	
	*/

	
	/*
	*  field_group_admin_head()
	*
	*  This action is called in the admin_head action on the edit screen where your field is edited.
	*  Use this action to add CSS and JavaScript to assist your render_field_options() action.
	*
	*  @type	action (admin_head)
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	n/a
	*  @return	n/a
	*/

	/*
	
	function field_group_admin_head() {
	
	}
	
	*/


	/*
	*  load_value()
	*
	*  This filter is applied to the $value after it is loaded from the db
	*
	*  @type	filter
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	$value (mixed) the value found in the database
	*  @param	$post_id (mixed) the $post_id from which the value was loaded
	*  @param	$field (array) the field array holding all the field options
	*  @return	$value
	*/
	
	
	
	function load_value( $value, $post_id, $field ) {
		
		return $value;
		
	}
	
	
	
	
	/*
	*  update_value()
	*
	*  This filter is applied to the $value before it is saved in the db
	*
	*  @type	filter
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	$value (mixed) the value found in the database
	*  @param	$post_id (mixed) the $post_id from which the value was loaded
	*  @param	$field (array) the field array holding all the field options
	*  @return	$value
	*/
	
	
	
	function update_value( $value, $post_id, $field ) {
		
		return $value;
		
	}
	
	
	
	
	/*
	*  format_value()
	*
	*  This filter is appied to the $value after it is loaded from the db and before it is returned to the template
	*
	*  @type	filter
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	$value (mixed) the value which was loaded from the database
	*  @param	$post_id (mixed) the $post_id from which the value was loaded
	*  @param	$field (array) the field array holding all the field options
	*
	*  @return	$value (mixed) the modified value
	*/
		
	
	
	function format_value( $value, $post_id, $field ) {
		
		// bail early if no value
		if( empty($value) ) {
		
			return $value;
			
		}
		
		
		// apply setting
		// if( $field['font_size'] > 12 ) { 
			
			// format the value
			// $value = 'something';
		
		// }
		
		
		// return
		return $value;
	}
	
	
	
	
	/*
	*  validate_value()
	*
	*  This filter is used to perform validation on the value prior to saving.
	*  All values are validated regardless of the field's required setting. This allows you to validate and return
	*  messages to the user if the value is not correct
	*
	*  @type	filter
	*  @date	11/02/2014
	*  @since	5.0.0
	*
	*  @param	$valid (boolean) validation status based on the value and the field's required setting
	*  @param	$value (mixed) the $_POST value
	*  @param	$field (array) the field array holding all the field options
	*  @param	$input (string) the corresponding input name for $_POST value
	*  @return	$valid
	*/
	
	
	
	// function validate_value( $valid, $value, $field, $input ){
		
	// 	// Basic usage
		
	// if( $value < $field['custom_minimum_setting'] )
	// 	{
	// 		$valid = false;
	// 	}
		
		
	// 	// Advanced usage
	// 	if( $value < $field['custom_minimum_setting'] )
	// 	{
	// 		$valid = __('The value is too little!','acfb-margin');
	// 	}
		
		
	// 	// return
	// 	return $valid;
		
	// }
	
	
	
	/*
	*  delete_value()
	*
	*  This action is fired after a value has been deleted from the db.
	*  Please note that saving a blank value is treated as an update, not a delete
	*
	*  @type	action
	*  @date	6/03/2014
	*  @since	5.0.0
	*
	*  @param	$post_id (mixed) the $post_id from which the value was deleted
	*  @param	$key (string) the $meta_key which the value was deleted
	*  @return	n/a
	*/
	
	/*
	
	function delete_value( $post_id, $key ) {
		
		
		
	}
	
	*/
	
	
	/*
	*  load_field()
	*
	*  This filter is applied to the $field after it is loaded from the database
	*
	*  @type	filter
	*  @date	23/01/2013
	*  @since	3.6.0	
	*
	*  @param	$field (array) the field array holding all the field options
	*  @return	$field
	*/
	
	
	
	function load_field( $field ) {
		
		return $field;
		
	}	
	
	
	
	
	/*
	*  update_field()
	*
	*  This filter is applied to the $field before it is saved to the database
	*
	*  @type	filter
	*  @date	23/01/2013
	*  @since	3.6.0
	*
	*  @param	$field (array) the field array holding all the field options
	*  @return	$field
	*/
	
	
	
	function update_field( $field ) {
			
		return $field;
		
	}	
	
	
	
	
	/*
	*  delete_field()
	*
	*  This action is fired after a field is deleted from the database
	*
	*  @type	action
	*  @date	11/02/2014
	*  @since	5.0.0
	*
	*  @param	$field (array) the field array holding all the field options
	*  @return	n/a
	*/
	
	/*
	
	function delete_field( $field ) {
		
		
		
	}	
	
	*/
	
	
}


// initialize
new acfb_acf_field_margin( $this->settings );


// class_exists check
endif;

?>