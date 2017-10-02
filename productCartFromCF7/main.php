<?
/*
Plugin Name: CF7 basket
Description: Simple baskety of product based on CF7 form
Version: 1.2
Author: Senquiem
*/

define('MSP_HELLOWORLD_DIR', plugin_dir_path(__FILE__));
define('MSP_HELLOWORLD_URL', plugin_dir_url(__FILE__));

add_action( 'admin_menu', 'my_plugin_menu' );

// lib to generate pdf from email html
include( plugin_dir_path( __FILE__ ) . 'includes/dompdf/autoload.inc.php');

// ajax section
include( plugin_dir_path( __FILE__ ) . 'includes/ajax.php');

function productCartFromCF7_css() {

wp_register_style('productCartFromCF7', plugins_url('/css/productCartFromCF7.css',__FILE__ ));
wp_enqueue_style('productCartFromCF7');

}
add_action( 'wp_head','productCartFromCF7_css');

// display exist list of products
function get_product_list() {
?>
<script type="text/javascript">

    var vallo_ready_cartus = <?php echo json_encode($_COOKIE['vallo_cf7_cartus_3']); ?>;
    var produc_CF7_image = '<?php  
    $image = wp_get_attachment_image_src( get_post_thumbnail_id( $loop->post->ID ), 'single-post-thumbnail' );
    echo $image[0]; ?>';
</script>
<script type='text/javascript' src='<?php echo plugins_url('/js/get_product_list.js?ver=1.8',__FILE__ ) ?>'></script>
<script type='text/javascript' src='<?php echo plugins_url('/js/add_to_product_list.js?ver=1.9',__FILE__ ) ?>'></script>
<script type='text/javascript' src='<?php echo plugins_url('/js/add_to_product_activation.js?ver=1.2',__FILE__ ) ?>'></script>



<?php


}
add_action( 'wp_footer','get_product_list');



function my_plugin_menu() {
	add_options_page( 'CF7 basket', 'CF7 basket settings', 'manage_options' , 'calculator', 'plugin_options' );
}

function plugin_options() {
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}



	if (isset($_GET['service'])&&isset($_GET['in_service']))
	{
		add_service($_GET['service']);
	}

}


// service section
#include( plugin_dir_path( __FILE__ ) . 'includes/service.php');

