<?php
/*
Plugin Name:   Replace Hello Instead Howdy in Admin Panel
Plugin URI : https://profiles.wordpress.org/mehtashail/
Description:   Add Hello Instead of Howdy in Admin Panel
Version: 1.0.0
Author: Shail Mehta
Text Domain: wporg
Author URL : https://profiles.wordpress.org/mehtashail/
*/
// Prevent direct file access
if (!defined('ABSPATH')) {
    exit;
}
defined('remove_howdy_in_admin_ROOT') or define('remove_howdy_in_admin_ROOT', plugin_dir_path(__FILE__));

/*Activation & Deactivation */
function __construct()
{
    register_activation_hook(__FILE__, 'remove_howdy_in_admin_install');
    register_deactivation_hook(__FILE__, 'remove_howdy_in_admin_install');
}

/*Plugin Install*/
function remove_howdy_in_admin_install()
{
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
}
function replace_howdy( $wp_admin_bar ) {

    $my_account=$wp_admin_bar->get_node('my-account');

    $newtitle = str_replace( 'Howdy,', 'Hello ', $my_account->title );

    $wp_admin_bar->add_node( array(

        'id' => 'my-account',

        'title' => $newtitle,

    ) );

}
add_filter( 'admin_bar_menu', 'replace_howdy',25 );
?>