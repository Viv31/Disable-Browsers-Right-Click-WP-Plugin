<?php 
/*
* Plugin Name:Disable Right Click
* Author:Vaibhav Gangrade
* Version:1.0
* Description:Disable right click of browser for preventing data threat.
* Author URI:
* Author URL:
*/

if(!defined('ABSPATH')) exit;//Prevent Direct Access
if(!function_exists('DRC_disable_click')){

	if (!function_exists('DRC_load_admin_js'))
	{
	    function DRC_load_admin_js()
	    {
	        //adding jquery
	        wp_enqueue_script(array(
	            'jquery'
	        ));
	    }
	    add_action('wp_enqueue_scripts', 'DRC_load_admin_js');
	
	}
	function DRC_disable_click(){ ?>
		<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script> -->
		
		<script type="text/javascript">
		jQuery(document).ready(function() {
		    jQuery("body").on("contextmenu",function(){
		       return false;
		    }); 

		    jQuery(document).keydown(function (event) {
		    if (event.keyCode == 123) { // Prevent F12
		        return false;
		    } else if (event.ctrlKey && event.shiftKey && event.keyCode == 73) { // Prevent Ctrl+Shift+I        
		        return false;
		    }
		});
		}); 
		</script>
	<?php }
}
add_action('init','DRC_disable_click');
