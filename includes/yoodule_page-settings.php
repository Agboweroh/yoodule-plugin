<?php


if( !function_exists("yoodule_settings") ) {

	function yoodule_settings(){
		?>
<h2> The yoodule  Settings</h2>
		<div class="box">

	<form method="post">
        <label >stripe API Secret</label>
        <br>
        <br>
        <input type="text" name="stripe-secret" value="<?php echo get_option("stripe_api_secret");?>" class="regular-text" placeholder="Enter your Stripe Api Secret">
        <br>
        <br>
        <br>
        <label >stripe API Client</label>
        <br>
        <br>
        <input type="text" name="stripe-client" value="<?php echo get_option("stripe_api_client");?>" class="regular-text" placeholder="Enter your  Stripe Client ID">
        <br>
        <br>
        <br>
        <input class="button-primary" type="submit" name="submit" value="<?php esc_attr_e( 'Submit' ); ?>" />
    </form>
		</div>
<?php
	}
	if (isset($_POST["submit"])){

		$secret = $_POST["stripe-secret"];
		$client = $_POST["stripe-client"];

        if (!get_option("stripe_api_stripe") && !get_option("stripe_api_client")){
	        add_option( 'stripe_api_client' , $client , '' , 'no');
	        add_option( 'stripe_api_secret' , $secret , '' , 'no');
	        add_action('admin_notices', 'custom_insert_notice');
        }else {
	        update_option( 'stripe_api_client' , $client );
	        update_option( 'stripe_api_secret' , $secret );
	        add_action('admin_notices', 'custom_update_notice');
        }

	}


}
// Let’s create a custom notice that is only displayed to users with the author user role
function custom_insert_notice(){

	?>
    <div class="notice notice-success notice-info is-dismissible">
        <p>API Keys Saved successfully!</p>
    </div>
<?php }
function custom_update_notice(){

	?>
    <div class="notice notice-success notice-info is-dismissible">
        <p>API Keys have been  Updated successfully!</p>
    </div>
<?php }
function custom_failure_notice(){

	?>
    <div class="notice notice-error notice-info is-dismissible">
        <p>API Keys has  failed!</p>
    </div>
<?php }


