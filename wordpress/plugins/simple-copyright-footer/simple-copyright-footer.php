<?php

/**
* Plugin Name: Simple Copyright Footer
* Plugin URI: https://wordpress.org/plugins/simple-copyright-footer/
* Description: This plugin produces a simple copyright text in the footer.
* Version: 1.0.0
* Author: Bradley Maravalli
* Author URI: http://www.bradleymaravalli.com
* License: GPL2
* Text Domain: simple-copyright-footer
*/


// ----------------------------------------------------------------------------


// REGISTER JS & CSS - FRONTEND
function register_plugin_enqueue_script() {
	wp_register_style( 'style', plugins_url( 'css/style.css' ,  __FILE__  ) );
	wp_enqueue_style( 'style' );
}
add_action( 'wp_enqueue_scripts', 'register_plugin_enqueue_script' );


// REGISTER JS & CSS - BACKEND
function register_admin_enqueue_script() {   
	wp_register_style( 'admin', plugins_url( 'css/admin.css' ,  __FILE__  ) );
	wp_enqueue_style( 'admin' );
}
add_action('admin_enqueue_scripts', 'register_admin_enqueue_script');

// REGISTER COLOR API
function mw_enqueue_color_picker( $hook_suffix ) {
    // first check that $hook_suffix is appropriate for your admin page
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script( 'color-field-handle', plugins_url('js/color-field.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
}
add_action( 'admin_enqueue_scripts', 'mw_enqueue_color_picker' );


// ----------------------------------------------------------------------------


// FRONTEND
function my_function() {
  $copyright = get_option('footer_text_variable', 'copyright');
  $textalign = get_option('text_align_variable', 'center');
  $display = get_option('display_variable', 'block');
  $paddingtopbottom = get_option('padding_top_bottom_variable', '0px');
  $paddingrightleft = get_option('padding_right_left_variable', '10px');
  $fontsize = get_option('font_size_variable', '16px');  
  $fontcolor = get_option('font_color_variable', 'white');
  $backgroundcolor = get_option('background_color_variable', 'black');
  if(empty($copyright)){
    $copyright = '&copy; Copyright ' . date("Y"); //Output: © Copyright 2018
 	}
  //echo "<div class='copyright-bar'><p>" . $copyright . "</p></div>";
  ?>  

	  <style>
			.copyright-bar {
				background-color: <?php echo $backgroundcolor; ?>;
				color: <?php echo $fontcolor; ?>;
				font-size: <?php echo $fontsize; ?>;
				padding-top: <?php echo $paddingtopbottom; ?>;
				padding-bottom: <?php echo $paddingtopbottom; ?>;
				text-align: <?php echo $textalign; ?>;
				display: <?php echo $display; ?>;
			}
			<?php if(!empty($paddingrightleft)){ 
				echo
				".copyright-bar p {\n".
					"padding-right: " . $paddingrightleft . ";\n" .
					"padding-left: " . $paddingrightleft . ";\n" .
				"}";
			}
			?>
		</style>
  
	  <div class="copyright-bar">
			<p><?php echo $copyright ?></p>
		</div>
	<?php
}
add_action( 'wp_footer', 'my_function' );


// ----------------------------------------------------------------------------


// BACKEND
function my_admin_menu () {
  add_management_page('Copyright', 'Copyright', 'manage_options', __FILE__, 'footer_text_admin_page');
  //add_management_page( $page_title, $menu_title, $capability, $menu_slug, $function );
}
add_action('admin_menu', 'my_admin_menu');

function footer_text_admin_page () {
  $copyright = get_option('footer_text_variable');
  if (isset($_POST['save-button'])) {
    update_option( 'footer_text_variable', $_POST['copyrighttext'] );
    $copyright = get_option('footer_text_variable');
  }
  $display = get_option('display_variable');
  if (isset($_POST['save-button'])) {
    update_option( 'display_variable', $_POST['display'] );
    $display = get_option('display_variable');
  } 
  $textalign = get_option('text_align_variable');
  if (isset($_POST['save-button'])) {
    update_option( 'text_align_variable', $_POST['textalign'] );
    $textalign = get_option('text_align_variable');
  }
  $paddingtopbottom = get_option('padding_top_bottom_variable');
  if (isset($_POST['save-button'])) {
    update_option( 'padding_top_bottom_variable', $_POST['paddingtopbottom'] );
    $paddingtopbottom = get_option('padding_top_bottom_variable');
  }
  $paddingrightleft = get_option('padding_right_left_variable');
  if (isset($_POST['save-button'])) {
    update_option( 'padding_right_left_variable', $_POST['paddingrightleft'] );
    $paddingrightleft = get_option('padding_right_left_variable');
  }
  $fontsize = get_option('font_size_variable');
  if (isset($_POST['save-button'])) {
    update_option( 'font_size_variable', $_POST['fontsize'] );
    $fontsize = get_option('font_size_variable');
  }
  $fontcolor = get_option('font_color_variable');
  if (isset($_POST['save-button'])) {
    update_option( 'font_color_variable', $_POST['fontcolor'] );
    $fontcolor = get_option('font_color_variable');
  }
  $backgroundcolor = get_option('background_color_variable');
  if (isset($_POST['save-button'])) {
    update_option( 'background_color_variable', $_POST['backgroundcolor'] );
    $backgroundcolor = get_option('background_color_variable');
  }		  
	if(empty($copyright)){
    $copyright = '&copy; Copyright ' . date("Y"); //Output: © Copyright 2018
 	}
 	/*
 	if(empty($textalign)){
	  $textalign = 'center';
  }
 	if(empty($display)){
	  $displayname = 'show';
  }
  */
  if($display == 'block'){
	  $displayname = 'show';
  }
  elseif($display == 'none'){
	  $displayname = 'hide';
  }
?>
	<div class="wrap copyright-admin">
	  <h1>Copyright</h1>
	  <p>This plugin will output copyright text to the footer of your template. Change the text and other options below:</p>
	  <form action="<?php echo str_replace('%7E', '~', $_SERVER['REQUEST_URI']); ?>" method="post">
	  	<div class="scf_input">
			  <label>Copyright Text:</label>
			  <input type="text" value="<?php echo $copyright; ?>" name="copyrighttext" placeholder="">
		  </div>
	  	<div class="scf_input">
			  <label>Display:</label>
			  <select name="display">
				  <option value="<?php echo $display; ?>"> Current: <?php echo $displayname; ?></option>
				  <option value="block">Show</option>
				  <option value="none">Hide</option>
				</select>
		  </div>
	  	<div class="scf_input">
			  <label>Text Align:</label>
			  <select name="textalign">
				  <option value="<?php echo $textalign; ?>"> Current: <?php echo $textalign; ?></option>
				  <option value="center">Center</option>
				  <option value="right">Right</option>
				  <option value="left">Left</option>
				</select>
	  	</div>
	  	<div class="scf_input">
			  <label>Padding Top/Bottom:</label>
				<input type="text" value="<?php echo $paddingtopbottom; ?>" name="paddingtopbottom" placeholder="0px">
	  	</div>
	  	<div class="scf_input">
			  <label>Padding Right/Left:</label>
				<input type="text" value="<?php echo $paddingrightleft; ?>" name="paddingrightleft" placeholder="10px">
	  	</div>
	  	<div class="scf_input">
				<label>Font Size:</label>
			  <input type="text" value="<?php echo $fontsize; ?>" name="fontsize" placeholder="16px">
		  </div>
	  	<div class="scf_input">
			  <label>Font Color:</label>
				<input type="text" value="<?php echo $fontcolor; ?>" name="fontcolor" class="color-field" data-default-color="#eeeeee" />
	  	</div>
	  	<div class="scf_input">
				<label>Background Color:</label>
				<input type="text" value="<?php echo $backgroundcolor; ?>" name="backgroundcolor" class="color-field" data-default-color="#24282e" />
	  	</div>
			<input name="save-button" type="hidden" value="1" /><input type="submit" value="Save" />
	  </form>
	</div>
<?php
}


// ----------------------------------------------------------------------------


// SHORTCODE
function wporg_shortcodes_init()
{
    function wporg_shortcode($atts = [], $content = null)
    {
	      $copyright = get_option('footer_text_variable', 'copyright');
	      if(empty($copyright)){
			    $copyright = '&copy; Copyright ' . date("Y"); //Output: © Copyright 2018
			 	}
				$content = "<p>" . $copyright . "</p>";
        return $content;
    }
    add_shortcode('copyright', 'wporg_shortcode');
}
add_action('init', 'wporg_shortcodes_init');
add_filter('widget_text', 'do_shortcode');