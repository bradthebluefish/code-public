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
  echo 'hello world';
}

add_action('admin_menu', 'my_admin_menu');

function my_admin_menu () {
  add_management_page('Footer Text', 'Footer Text', 'manage_options', __FILE__, 'footer_text_admin_page');
}

function footer_text_admin_page () {
  echo 'this is where we will edit the variable';
}