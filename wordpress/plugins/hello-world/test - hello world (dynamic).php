<?php

/**
* Plugin Name: Hello World
* Plugin URI: http://www.bradleymaravalli.com
* Description: This plugin does some stuff with WordPress
* Version: 1.0.0
* Author: Bradley Maravalli
* Author URI: http://www.bradleymaravalli.com
* License: GPL2
*/

add_action( 'wp_footer', 'my_function' );

function my_function() {
  $textvar = get_option('test_plugin_variable', 'hello world');
  echo $textvar;
}

add_action('admin_menu', 'my_admin_menu');

function my_admin_menu () {
  add_management_page('Footer Text', 'Footer Text', 'manage_options', __FILE__, 'footer_text_admin_page');
  add_management_page( $page_title, $menu_title, $capability, $menu_slug, $function );
}

function footer_text_admin_page () {

  $textvar = get_option('test_plugin_variable', 'hello world');
  if (isset($_POST['change-clicked'])) {
    update_option( 'test_plugin_variable', $_POST['footertext'] );
    $textvar = get_option('test_plugin_variable', 'hello world');
  }

?>

<div class="wrap">
  <h1>Footer Text</h1>
  <p>This simple plugin will output some text to the footer of your template. Change the text below:</p>
  <form action="<?php echo str_replace('%7E', '~', $_SERVER['REQUEST_URI']); ?>" method="post">
  Footer Text:<input type="text" value="<?php echo $textvar; ?>" name="footertext" placeholder="hello world"><br />
  <input name="change-clicked" type="hidden" value="1" />
  <input type="submit" value="Change Text" />
  </form>
</div>

<?

}
