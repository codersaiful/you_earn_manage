<?php
/**
 * Plugin Name: You Earn Manage
 * Plugin URI: https://codeastrology.com/
 * Description: Customized plugin for your Woo Product Table Pro plugin. 
 * Author: Saiful Islam
 * Author URI: https://codecanyon.net/user/codersaiful
 * Tags: customized plugin
 * Version: 1.2
 * Requires at least:    4.0.0
 * Tested up to:         5.0.1
 * WC requires at least: 3.0.0
 * WC tested up to: 	 3.4.4
 * 
 * Text Domain: yem
 */

if( is_admin() ){
    include __DIR__ . '/includes/menu.php';
}else{
    include __DIR__ . '/includes/footer_javascript.php';
}



//Plugin Install
function yem_plugin_install(){
    $data = array( '_yem_target_cf' => 'cf_you_earn_manage');
    for($i=0;$i<=4;$i++){
        $data['_yem_target_percentage'][$i] = '';
        $data['_yem_min_price'][$i] = '';
        $data['_yem_max_price'][$i] = '';
    }
    update_option( 'yem_values', $data );
}
//Plugin Uninstall
function yem_plugin_uninstall(){
    
}





register_activation_hook(__FILE__, 'yem_plugin_install' );
register_deactivation_hook( __FILE__, 'yem_plugin_uninstall' );