<?php 

/*Function to search microchip from wp_serial_number_data custom table*/
function getMicrochipData($request)
{
	global $wpdb;
	$data = $request;
	 $serial_number = $data['serial_number'];
	if (isset($serial_number) && !empty(trim($serial_number))) {

$serial_data = $wpdb->get_results("SELECT * FROM wp_serial_number_data  WHERE serial_number = '".$serial_number."'"); 
// print_r($serial_data);die; 
    $user_id        = $serial_data[0]->user_id;
    $pet_profile_id = $serial_data[0]->pet_profile_id;

    $data = [];
    if(isset($user_id) && !empty($user_id))
    {
        $data['user_data'] = get_user_meta($user_id);
    }
    if(isset($pet_profile_id) && !empty($pet_profile_id))
    {
        $data['petprofile_data'] = get_post_meta($pet_profile_id);
    }

    
    if(!empty($data))
    {
    	return $data;

    }
    else{
    	$data = array('status' => '0');
    	return $data;
    	// echo json_encode($data);
    }
	
	}
	
}

function getUserRole($request)
{
    $user_id = $request['user_id'];
    if(isset($user_id))
    {
        // $data = get_user_meta($user_id);    
        $data = get_user_meta($user_id, 'wp_capabilities', true);
        $roles = array_keys((array)$data);
        foreach ($roles as $key => $value) {
           if($value == 'pet_professional')
           {
            $data = array('status' => 'success');

             echo json_encode($data);
           }
        }
    }
   
}

/*Registeration all API  */

add_action('rest_api_init', function () {

  	register_rest_route( 'getserial/v1', 'get-microchip-data',array(
        'methods'  => 'GET',
        'callback' => 'getMicrochipData'
    ));

});

add_action('rest_api_init', function () {

    register_rest_route( 'getusersrole/v1', 'get-user-role',array(
        'methods'  => 'GET',
        'callback' => 'getUserRole'
    ));

});

