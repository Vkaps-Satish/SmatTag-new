<?php

$curl = curl_init();

curl_setopt_array($curl, [
    CURLOPT_URL => "http://3.80.120.98/basicRowScript.php?email=sheltermanager@azfriends.org",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
]);

$finalData = curl_exec($curl);

curl_close($curl);



 $finalData = array_map('trim',$finalDatas);












/*pet profesional data*/
    
       function PetProfessionalSignup($finalData){
       
        $orgnization_name   = (isset($finalData['Pet Shelter / Vet Business Name'])) ? $finalData['Pet Shelter / Vet Business Name'] : "";
        $pet_pro_first_name = (isset($finalData['Pet Shelter/ Vet Contact First Name'])) ? $finalData['Pet Shelter/ Vet Contact First Name'] : "";
        $pet_pro_last_name =  (isset($finalData['Pet Shelter / Vet Conact Last Name'])) ? $finalData['Pet Shelter / Vet Conact Last Name'] : "";
        $pet_pro_address_1 =  (isset($finalData['Pet Shelter / Vet  Address Line 1'])) ? $finalData['Pet Shelter / Vet  Address Line 1'] : "";
        $pet_pro_address_2 =  (isset($finalData['Pet Shelter / Vet Address Line 2'])) ? $finalData['Pet Shelter / Vet Address Line 2'] : "";
        $pet_pro_city =  (isset($finalData['Pet Shelter / Vet City'])) ? $finalData['Pet Shelter / Vet City'] : "";
        $pet_pro_state =  (isset($finalData['Pet Shelter / Vet State'])) ? $finalData['Pet Shelter / Vet State'] : "";
        $pet_pro_zip =  (isset($finalData['Pet Shelter / Vet Zip Code'])) ? $finalData['Pet Shelter / Vet Zip Code'] : "";
        $pet_pro_country =  (isset($finalData['Pet Shelter / Vet Country'])) ? $finalData['Pet Shelter / Vet Country'] : "";
           if(isset($finalData['Pet Shelter / Vet Primary Phone']))
            {
              $pet_pro_p_phone =  sprintf("%d", $finalData['Pet Shelter / Vet Primary Phone']);
            }
            else{
                 $pet_pro_p_phone = "";
            } 
            if(isset($finalData['Pet Shelter / Vet Cell Phone']))
            {
              $pet_pro_cell_phone =  sprintf("%d", $finalData['Pet Shelter / Vet Cell Phone']);
            }
            else{
                 $pet_pro_cell_phone = "";
            } 
        if(isset($finalData['Pet Shelter / Vet Receives Lost Pet Alerts?'])){
             $pet_pro_receive_alert =  $finalData['Pet Shelter / Vet Receives Lost Pet Alerts?'] == '1' ? 'yes' : "no";
        }
       
        $pet_pro_sec_fistname =  (isset($finalData['Pet Shelter / Vet Secondary Contact First Name'])) ? $finalData['Pet Shelter / Vet Secondary Contact First Name'] : "";
        $pet_pro_sec_lastname =  (isset($finalData['Pet Shelter / Vet Second Secondary Contact Last Name'])) ? $finalData['Pet Shelter / Vet Second Secondary Contact Last Name'] : "";
        $pet_pro_sec_email =  (isset($finalData['Pet Shelter / Vet Secondary Conact Email'])) ? $finalData['Pet Shelter / Vet Secondary Conact Email'] : "";
        $pet_pro_sec_address_1 =  (isset($finalData['Pet Shelter / Vet Secondary Address Line 1'])) ? $finalData['Pet Shelter / Vet Secondary Address Line 1'] : "";
        $pet_pro_sec_address_2 =  (isset($finalData['Pet Shelter / Vet Secondary Address Line 2'])) ? $finalData['Pet Shelter / Vet Secondary Address Line 2'] : "";
        $pet_pro_sec_city =  (isset($finalData['Pet Shelter / Vet Secondary City'])) ? $finalData['Pet Shelter / Vet Secondary City'] : "";
         $pet_pro_sec_state =  (isset($finalData['Pet Shelter / Vet Secondary Address State'])) ? $finalData['Pet Shelter / Vet Secondary Address State'] : "";
        $pet_pro_sec_zip =  (isset($finalData['Pet Shelter / Vet Secondary Address Zip Code'])) ? $finalData['Pet Shelter / Vet Secondary Address Zip Code'] : "";
        $pet_pro_sec_country =  (isset($finalData['Pet Shelter / Vet Secondary Address  Country'])) ? $finalData['Pet Shelter / Vet Secondary Address  Country'] : "";
        if(isset($finalData['Pet Shelter / Vet Secondary Contact Phone']))
            {
            $pet_pro_sec_contact =  sprintf("%d", $finalData['Pet Shelter / Vet Secondary Contact Phone']);
            }
            else{
                 $pet_pro_sec_contact = "";
            }
        if(isset($finalData['Pet Shelter / Vet Secondary Cell Phone']))
            {
            $pet_pro_sec_cell =  sprintf("%d", $finalData['Pet Shelter / Vet Secondary Cell Phone']);
            }
            else{
                 $pet_pro_sec_cell = "";
            }   
        // $pet_pro_sec_contact =  (isset($finalData['Pet Shelter / Vet Secondary Contact Phone'])) ? $finalData['Pet Shelter / Vet Secondary Contact Phone'] : "";
        // $pet_pro_sec_cell =  (isset($finalData['Pet Shelter / Vet  Secondary Cell Phone'])) ? $finalData['Pet Shelter / Vet  Secondary Cell Phone'] : "";
        if(isset($finalData['Is Secondary Facility Receiving Alerts?'])){
              $pet_pro_sec_receive_alert =   $finalData['Is Secondary Facility Receiving Alerts?'] == '1'  ? 'yes' : "no";
        }
      
        $pet_pro_idtag_uniqueid   = (isset($finalData['Shelter / Vet - Unique ID'])) ? $finalData['Shelter / Vet - Unique ID'] : "";

    $pet_pro_email =  $finalData['Pet Shelter/ Vet Primary Business Email'];
    $exists = email_exists(trim($pet_pro_email));

    if($pet_pro_email == ""){
          return json_encode(array('success'=>0,'title'=>'Pet Professional','action' =>'not_found','message'=>'email not found'));
    }
    
    elseif ( !$exists) {
        $user_name          = $pet_pro_email;
        $org_email          = $pet_pro_email;
        $random_password    = rand();

        // echo $user_id      = wp_create_user( 'google', '123456', 'xekafixewo@proeasyweb.com' );
        // echo "tttt";die;
        $user_id      =  wp_create_user( $user_name , $random_password, $org_email );
            $user_id_role = new WP_User($user_id);
            $user_id_role->set_role('pet_professional');

            $professionData = array(

                'Organization_name'         => $orgnization_name,
                'Organization_email'        => $pet_pro_email,
                'first_name'                => $pet_pro_first_name,
                'last_name'                 => $pet_pro_last_name,  
                'primary_country'           => $pet_pro_country,
                'primary_address_line1'     => $pet_pro_address_1,
                'primary_address_line2'     => $pet_pro_address_2,
                'primary_city'              => $pet_pro_city,
                'primary_state'             => $pet_pro_state,
                'primary_postcode'          => $pet_pro_zip,
                'primary_home_number'       => $pet_pro_p_phone,
                'primary_cell_number'       => $pet_pro_cell_phone,
                'primary_argent_alert'      => $pet_pro_receive_alert,
                'secondary_email'           => $pet_pro_sec_email,
                'secondary_first_name'      => $pet_pro_sec_fistname,
                'secondary_last_name'       => $pet_pro_sec_lastname,  
                'secondary_address_line1'   => $pet_pro_sec_address_1,
                'secondary_address_line2'   => $pet_pro_sec_address_2,
                'secondary_city'            => $pet_pro_sec_city,
                'secondary_state'           => $pet_pro_sec_state,
                'secondary_postcode'        => $pet_pro_sec_zip,
                'secondary_country'         => $pet_pro_sec_country,
                'secondary_home_number'     => $pet_pro_sec_contact,
                'secondary_cell_number'     => $pet_pro_sec_cell,
                'secondary_argent_alert'    => $pet_pro_sec_receive_alert,
                'idtagsite_pet_pro_uniqueid'    => $pet_pro_idtag_uniqueid,
                'source_system'             => 'IDTAG IMPORT',

            );
            
            foreach ($professionData as $key => $value) {
                update_user_meta($user_id, $key, $value);

            }
            // update_user_meta( $user_id, 'sl_email_confirmation', 'false');
            // salient_register_emails_filter_replace($_POST['org_email']);
            return  json_encode(array('success'=>1,'title'=>'Pet Professional','action' =>'created', 'user_id' => $user_id,'message'=>'Account successfully created.'));
                 // echo json_encode(array('success'=>1,'title'=>'Pet Professional','message'=>'Account successfully created.'));

    }else{
         $user = get_user_by( 'email', $pet_pro_email );
         $userId = $user->ID;

            $professionData = array(

                'Organization_name'         => $orgnization_name,
                'Organization_email'        => $pet_pro_email,
                'first_name'                => $pet_pro_first_name,
                'last_name'                 => $pet_pro_last_name,  
                'primary_country'           => $pet_pro_country,
                'primary_address_line1'     => $pet_pro_address_1,
                'primary_address_line2'     => $pet_pro_address_2,
                'primary_city'              => $pet_pro_city,
                'primary_state'             => $pet_pro_state,
                'primary_postcode'          => $pet_pro_zip,
                'primary_home_number'       => $pet_pro_p_phone,
                'primary_cell_number'       => $pet_pro_cell_phone,
                'primary_argent_alert'      => $pet_pro_receive_alert,
                'secondary_email'           => $pet_pro_sec_email,
                'secondary_first_name'      => $pet_pro_sec_fistname,
                'secondary_last_name'       => $pet_pro_sec_lastname,  
                'secondary_address_line1'   => $pet_pro_sec_address_1,
                'secondary_address_line2'   => $pet_pro_sec_address_2,
                'secondary_city'            => $pet_pro_sec_city,
                'secondary_state'           => $pet_pro_sec_state,
                'secondary_postcode'        => $pet_pro_sec_zip,
                'secondary_country'         => $pet_pro_sec_country,
                'secondary_home_number'     => $pet_pro_sec_contact,
                'secondary_cell_number'     => $pet_pro_sec_cell,
                'secondary_argent_alert'    => $pet_pro_sec_receive_alert,
                'idtagsite_pet_pro_uniqueid'    => $pet_pro_idtag_uniqueid,
                'source_system'             => 'IDTAG IMPORT',

            );
            
            foreach ($professionData as $key => $value) {
                update_user_meta($userId, $key, $value);

            }
            // update_user_meta( $userId, 'sl_email_confirmation', 'false');
            return json_encode(array('success'=>1,'title'=>'Pet Professional','action' =>'updated','user_id' => $userId, 'message'=>'Account successfully updated.'));
    }
 
}


    function createOwnerProfileUnderPetPro($finalData,$userid){

        $Owner_First_Name   = (isset($finalData['Onwer First Name'])) ? $finalData['Onwer First Name'] : "";
        $Owner_Last_Name = (isset($finalData['Owner Last Name'])) ? $finalData['Owner Last Name'] : "";
        $owneremail =  (isset($finalData['Owner Primary Email'])) ? $finalData['Owner Primary Email'] : "";
        $owner_alt_email =  (isset($finalData['Owner Alternate Email'])) ? $finalData['Owner Alternate Email'] : "";
        $owner_address_1 =  (isset($finalData['Owner Address Line 1'])) ? $finalData['Owner Address Line 1'] : "";
        $owner_address_2 =  (isset($finalData['Owner Address Line 2'])) ? $finalData['Owner Address Line 2'] : "";
        $Owner_City =  (isset($finalData['Owner City'])) ? $finalData['Owner City'] : "";
        $Owner_State =  (isset($finalData['Owner State'])) ? $finalData['Owner State'] : "";
        $owner_country =  (isset($finalData['Owner Country'])) ? $finalData['Owner Country'] : "";
        // $owner_p_phone =  (isset($finalData['Owner Primary Phone Number'])) ? $finalData['Owner Primary Phone Number'] : "";
         if(isset($finalData['Owner Primary Phone Number']) && !empty($finalData['Owner Primary Phone Number']))
            {
            $owner_p_phone =  sprintf("%d", $finalData['Owner Primary Phone Number']);
            }
            else{
                 $owner_p_phone = "";
            }   
        if(isset($finalData['Owner Cell Phone Number']) && !empty($finalData['Owner Cell Phone Number']))
            {
            $owner_cell_phone =  sprintf("%d", $finalData['Owner Cell Phone Number']);
            } 
             else{
                 $owner_cell_phone = "";
            }           
        // $owner_cell_phone = (isset($finalData['Owner Cell Phone Number'])) ? $finalData['Owner Cell Phone Number'] : "";
        if(isset($finalData['Does Owner Receive Alerts?'])){
             $owner_receive_alert =  $finalData['Does Owner Receive Alerts?'] == 1 ? 'yes' : "no";
        }
       
        $sec_owner_firstname =  (isset($finalData['Secondary Onwer First Name'])) ? $finalData['Secondary Onwer First Name'] : "";
        $sec_owner_lastname =  (isset($finalData['Secondary Owner Last Name'])) ? $finalData['Secondary Owner Last Name'] : "";
        $sec_owner_email =  (isset($finalData['Secondary Owner Primary Email'])) ? $finalData['Secondary Owner Primary Email'] : "";
        $sec_owner_alt_email =  (isset($finalData['Secondary Owner Alternate Email'])) ? $finalData['Secondary Owner Alternate Email'] : "";
        $sec_owner_address_1 =  (isset($finalData['Secondary Owner Address Line 1'])) ? $finalData['Secondary Owner Address Line 1'] : "";
        $sec_owner_address_2  =  (isset($finalData['Secondary Owner Address Line 2'])) ? $finalData['Secondary Owner Address Line 2'] : "";
         $sec_owner_city =  (isset($finalData['Secondary Owner City'])) ? $finalData['Secondary Owner City'] : "";
        $sec_owner_state =  (isset($finalData['Secondary Owner State'])) ? $finalData['Secondary Owner State'] : "";
        $sec_owner_country =  (isset($finalData['Secondary Owner Country'])) ? $finalData['Secondary Owner Country'] : "";
         if(isset($finalData['Secondary Owner Primary Phone Number']))
            {
            $sec_owner_p_phone =  sprintf("%d", $finalData['Secondary Owner Primary Phone Number']);
            } 
        else{
                 $sec_owner_p_phone = "";
            } 
        if(isset($finalData['Secondary Owner Cell Phone Number']))
            {
            $sec_owner_cell_phone =  sprintf("%d", $finalData['Secondary Owner Cell Phone Number']);
            }  
             else{
                 $sec_owner_cell_phone = "";
            }   
        // $sec_owner_p_phone =  (isset($finalData['Secondary Owner Primary Phone Number'])) ? $finalData['Secondary Owner Primary Phone Number'] : "";
        // $sec_owner_cell_phone =  (isset($finalData['Secondary Owner Cell Phone Number'])) ? sprintf("%d", $finalData['Secondary Owner Cell Phone Number']) : "";
        if(isset($finalData['Does Secondary Owner Receive Alerts?'])){
             $sec_owner_alert =  $finalData['Does Secondary Owner Receive Alerts?'] == 1 ? 'yes' : "no";
        }
       
        $owner_unique_id =  (isset($finalData['Pet Owner Unique ID'])) ? $finalData['Pet Owner Unique ID'] : "";
       
        $email        = trim($owneremail);
        $exists = email_exists(trim($owneremail));
        if($email == ""){

             $petID = $this->importCreatePetProfile($finalData,$userid);
            // update_user_meta( $userId, 'sl_email_confirmation', 'false');
            return json_encode(array('success'=>1,'title'=>'Pet professional','action' =>'created','user_id' => $userid,'pet_id' => $petID, 'message'=>'Pet professional Account successfully created.'));
        }
        elseif (!$exists) {

        $user_name          = $owneremail;
        $org_email          = $owneremail;
        $random_password    = rand();

        // echo $user_id      = wp_create_user( 'google', '123456', 'xekafixewo@proeasyweb.com' );
        // echo "tttt";die;
        $user_id      =  wp_create_user( $user_name , $random_password, $org_email );
            $ownerData = array(

                'first_name'               => $Owner_First_Name,
                'last_name'                => $Owner_Last_Name,                         
                'primary_country'          => $owner_country,
                'primary_address_line1'    => $owner_address_1,
                'primary_address_line2'    => $owner_address_2,
                'primary_city'             => $Owner_City,
                'primary_state'            => $Owner_State,
                'primary_home_number'      => $owner_p_phone,
                'primary_cell_number'      => $owner_cell_phone,
                'primary_argent_alert'     => $owner_receive_alert,
                'secondary_first_name'    => $sec_owner_firstname,
                'secondary_last_name'     => $sec_owner_lastname,  
                'secondary_email'         => $sec_owner_email,  
                'secondary_country'       => $sec_owner_country,
                'secondary_address_line1' => $sec_owner_address_1,
                'secondary_address_line2' => $sec_owner_address_2,
                'secondary_city'          => $sec_owner_city,
                'secondary_state'         => $sec_owner_state,
                'secondary_home_number'   => $sec_owner_p_phone,
                'secondary_cell_number'   => $sec_owner_cell_phone,
                'secondary_argent_alert'  => $sec_owner_alert,
                'idtagsite_owener_unique_id' => $owner_unique_id,
                'created_by'              => $userid,
                'source_system'           => 'IDTAG IMPORT',

            );
            
            foreach ($ownerData as $key => $value) {
                update_user_meta($user_id, $key, $value);

            }
            // update_user_meta( $user_id, 'sl_email_confirmation', 'false');
            // salient_register_emails_filter_replace($_POST['org_email']);
              $petID = $this->importCreatePetProfile($finalData,$user_id);
            return  json_encode(array('success'=>1,'title'=>'Pet Owner','action' =>'created', 'user_id' => $user_id,'pet_id' => $petID,'message'=>'Account successfully created.'));
                 // echo json_encode(array('success'=>1,'title'=>'Pet Professional','message'=>'Account successfully created.'));
        
    }
    else{

         $user = get_user_by( 'email', $owneremail );
         $userId = $user->ID;

            $ownerData = array(

                'first_name'               => $Owner_First_Name,
                'last_name'                => $Owner_Last_Name,                         
                'primary_country'          => $owner_country,
                'primary_address_line1'    => $owner_address_1,
                'primary_address_line2'    => $owner_address_2,
                'primary_city'             => $Owner_City,
                'primary_state'            => $Owner_State,
                'primary_home_number'      => $owner_p_phone,
                'primary_cell_number'      => $owner_cell_phone,
                'primary_argent_alert'     => $owner_receive_alert,
                'secondary_first_name'    => $sec_owner_firstname,
                'secondary_last_name'     => $sec_owner_lastname,  
                'secondary_email'         => $sec_owner_email,  
                'secondary_country'       => $sec_owner_country,
                'secondary_address_line1' => $sec_owner_address_1,
                'secondary_address_line2' => $sec_owner_address_2,
                'secondary_city'          => $sec_owner_city,
                'secondary_state'         => $sec_owner_state,
                'secondary_home_number'   => $sec_owner_p_phone,
                'secondary_cell_number'   => $sec_owner_cell_phone,
                'secondary_argent_alert'  => $sec_owner_alert,
                'idtagsite_owener_unique_id' => $owner_unique_id,
                'created_by'              => $userid,
                'source_system'           => 'IDTAG IMPORT',


            );
            
            foreach ($ownerData as $key => $value) {
                update_user_meta($userId, $key, $value);

            }
            $petID = $this->importCreatePetProfile($finalData,$userId);
            // update_user_meta( $userId, 'sl_email_confirmation', 'false');
            return json_encode(array('success'=>1,'title'=>'Pet Owner','action' =>'updated','user_id' => $userId,'pet_id' => $petID, 'message'=>'Account successfully updated.'));
    }
 
    }


 function createOwnerProfile($finalData){

        $Owner_First_Name   = (isset($finalData['Onwer First Name'])) ? $finalData['Onwer First Name'] : "";
        $Owner_Last_Name = (isset($finalData['Owner Last Name'])) ? $finalData['Owner Last Name'] : "";
        $owneremail =  (isset($finalData['Owner Primary Email'])) ? $finalData['Owner Primary Email'] : "";
        $owner_alt_email =  (isset($finalData['Owner Alternate Email'])) ? $finalData['Owner Alternate Email'] : "";
        $owner_address_1 =  (isset($finalData['Owner Address Line 1'])) ? $finalData['Owner Address Line 1'] : "";
        $owner_address_2 =  (isset($finalData['Owner Address Line 2'])) ? $finalData['Owner Address Line 2'] : "";
        $Owner_City =  (isset($finalData['Owner City'])) ? $finalData['Owner City'] : "";
        $Owner_State =  (isset($finalData['Owner State'])) ? $finalData['Owner State'] : "";
        $owner_country =  (isset($finalData['Owner Country'])) ? $finalData['Owner Country'] : "";
        // $owner_p_phone =  (isset($finalData['Owner Primary Phone Number'])) ? $finalData['Owner Primary Phone Number'] : "";
        // $owner_cell_phone = (isset($finalData['Owner Cell Phone Number'])) ? $finalData['Owner Cell Phone Number'] : "";
          if(isset($finalData['Owner Primary Phone Number']) && !empty($finalData['Owner Primary Phone Number']))
            {
            $owner_p_phone =  sprintf("%d", $finalData['Owner Primary Phone Number']);
            }
            else{
                 $owner_p_phone = "";
            }   
        if(isset($finalData['Owner Cell Phone Number']) && !empty($finalData['Owner Cell Phone Number']))
            {
            $owner_cell_phone =  sprintf("%d", $finalData['Owner Cell Phone Number']);
            } 
             else{
                 $owner_cell_phone = "";
            }   
        if(isset($finalData['Does Owner Receive Alerts?'])){
             $owner_receive_alert =  $finalData['Does Owner Receive Alerts?'] == 1 ? 'yes' : "no";
        }
    
        $sec_owner_firstname =  (isset($finalData['Secondary Onwer First Name'])) ? $finalData['Secondary Onwer First Name'] : "";
        $sec_owner_lastname =  (isset($finalData['Secondary Owner Last Name'])) ? $finalData['Secondary Owner Last Name'] : "";
        $sec_owner_email =  (isset($finalData['Secondary Owner Primary Email'])) ? $finalData['Secondary Owner Primary Email'] : "";
        $sec_owner_alt_email =  (isset($finalData['Secondary Owner Alternate Email'])) ? $finalData['Secondary Owner Alternate Email'] : "";
        $sec_owner_address_1 =  (isset($finalData['Secondary Owner Address Line 1'])) ? $finalData['Secondary Owner Address Line 1'] : "";
        $sec_owner_address_2  =  (isset($finalData['Secondary Owner Address Line 2'])) ? $finalData['Secondary Owner Address Line 2'] : "";
         $sec_owner_city =  (isset($finalData['Secondary Owner City'])) ? $finalData['Secondary Owner City'] : "";
        $sec_owner_state =  (isset($finalData['Secondary Owner State'])) ? $finalData['Secondary Owner State'] : "";
        $sec_owner_country =  (isset($finalData['Secondary Owner Country'])) ? $finalData['Secondary Owner Country'] : "";
        // $sec_owner_p_phone =  (isset($finalData['Secondary Owner Primary Phone Number'])) ? $finalData['Secondary Owner Primary Phone Number'] : "";
        // $sec_owner_cell_phone =  (isset($finalData['Secondary Owner Cell Phone Number'])) ? $finalData['Secondary Owner Cell Phone Number'] : "";
          if(isset($finalData['Secondary Owner Primary Phone Number']) && !empty($finalData['Secondary Owner Primary Phone Number']))
            {

            $sec_owner_p_phone =  sprintf("%d", $finalData['Secondary Owner Primary Phone Number']);
            }
            else{

                 $sec_owner_p_phone = "";
            } 
        if(isset($finalData['Secondary Owner Cell Phone Number']) && !empty($finalData['Secondary Owner Cell Phone Number'])){
            $sec_owner_cell_phone =  sprintf("%d", $finalData['Secondary Owner Cell Phone Number']);
            }else{
                 $sec_owner_cell_phone = "";
            }   
         if(isset($finalData['Does Secondary Owner Receive Alerts?'])){
             $sec_owner_alert =  $finalData['Does Secondary Owner Receive Alerts?'] == 1 ? 'yes' : "no";
        }
    
        $owner_unique_id =  (isset($finalData['Pet Owner Unique ID'])) ? $finalData['Pet Owner Unique ID'] : "";
       
        $email        = trim($owneremail);
        $exists = email_exists(trim($owneremail));
        if ( !$exists) {
        $user_name          = $owneremail;
        $org_email          = $owneremail;
        $random_password    = rand();

        // echo $user_id      = wp_create_user( 'google', '123456', 'xekafixewo@proeasyweb.com' );
        // echo "tttt";die;
        $user_id      =  wp_create_user( $user_name , $random_password, $org_email );
            $ownerData = array(

                'first_name'               => $Owner_First_Name,
                'last_name'                => $Owner_Last_Name,                         
                'primary_country'          => $owner_country,
                'primary_address_line1'    => $owner_address_1,
                'primary_address_line2'    => $owner_address_2,
                'primary_city'             => $Owner_City,
                'primary_state'            => $Owner_State,
                'primary_home_number'      => $owner_p_phone,
                'primary_cell_number'      => $owner_cell_phone,
                'primary_argent_alert'     => $owner_receive_alert,
                'secondary_first_name'    => $sec_owner_firstname,
                'secondary_last_name'     => $sec_owner_lastname,  
                'secondary_email'         => $sec_owner_email,  
                'secondary_country'       => $sec_owner_country,
                'secondary_address_line1' => $sec_owner_address_1,
                'secondary_address_line2' => $sec_owner_address_2,
                'secondary_city'          => $sec_owner_city,
                'secondary_state'         => $sec_owner_state,
                'secondary_home_number'   => $sec_owner_p_phone,
                'secondary_cell_number'   => $sec_owner_cell_phone,
                'secondary_argent_alert'  => $sec_owner_alert,
                'idtagsite_owener_unique_id' => $owner_unique_id,
                'source_system'           => 'IDTAG IMPORT',

            );
            
            foreach ($ownerData as $key => $value) {
                update_user_meta($user_id, $key, $value);

            }
            // update_user_meta( $user_id, 'sl_email_confirmation', 'false');
            // salient_register_emails_filter_replace($_POST['org_email']);
             $petID = $this->importCreatePetProfile($finalData,$user_id);
            return  json_encode(array('success'=>1,'title'=>'Pet Owner','action' =>'created', 'user_id' => $user_id,'pet_id' => $petID,'message'=>'Account successfully created.'));
                 // echo json_encode(array('success'=>1,'title'=>'Pet Professional','message'=>'Account successfully created.'));
        
    }else{
         $user = get_user_by( 'email', $email );
         $user_id = $user->ID;

            $ownerData = array(

                'first_name'               => $Owner_First_Name,
                'last_name'                => $Owner_Last_Name,                         
                'primary_country'          => $owner_country,
                'primary_address_line1'    => $owner_address_1,
                'primary_address_line2'    => $owner_address_2,
                'primary_city'             => $Owner_City,
                'primary_state'            => $Owner_State,
                'primary_home_number'      => $owner_p_phone,
                'primary_cell_number'      => $owner_cell_phone,
                'primary_argent_alert'     => $owner_receive_alert,
                'secondary_first_name'    => $sec_owner_firstname,
                'secondary_last_name'     => $sec_owner_lastname,  
                'secondary_email'         => $sec_owner_email,  
                'secondary_country'       => $sec_owner_country,
                'secondary_address_line1' => $sec_owner_address_1,
                'secondary_address_line2' => $sec_owner_address_2,
                'secondary_city'          => $sec_owner_city,
                'secondary_state'         => $sec_owner_state,
                'secondary_home_number'   => $sec_owner_p_phone,
                'secondary_cell_number'   => $sec_owner_cell_phone,
                'secondary_argent_alert'  => $sec_owner_alert,
                'idtagsite_owener_unique_id' => $owner_unique_id,
                'source_system'           => 'IDTAG IMPORT',


            );
            
            foreach ($ownerData as $key => $value) {
                update_user_meta($user_id, $key, $value);

            }
            // update_user_meta( $userId, 'sl_email_confirmation', 'false');
               $petID = $this->importCreatePetProfile($finalData,$user_id);
            return json_encode(array('success'=>1,'title'=>'Pet Owner','action' =>'updated','user_id' => $user_id, 'pet_id' => $petID, 'message'=>'Account successfully updated.'));
    }
 
    }

    
    function importCreatePetProfile($professionalData,$userId){

        $title  = $professionalData['Pet Name'];
        $petUni = $professionalData['Pet Unique ID'];

        $petMicrochip= (isset($professionalData["Pet\'s Microchip ID"])) ? trim($professionalData["Pet\'s Microchip ID"]) : "";
         if(isset($professionalData["Pet\'s Microchip ID"]))
         {
            $petMicrochip =  sprintf("%d", $professionalData["Pet\'s Microchip ID"]);
         } 
        $args=array(
            'post_type' => 'pet_profile',
            'post_status' => 'publish',
            'posts_per_page' => 1,
            'meta_query'=>array(
                'relation' => 'AND',
                array(
                    'key' => 'microchip_id_number',
                    'value' => $petMicrochip,
                ),
            )
        
        );
        
        $query = new WP_Query($args);
        if ($query->have_posts()) {
            while( $query->have_posts() ) : $query->the_post();
                $post_id =  get_the_ID();
            endwhile;
        }
        $petName     = (isset($professionalData['Pet Name'])) ? trim($professionalData['Pet Name']) : ""; 
        $petType     = (isset($professionalData['Pet Type'])) ? trim($professionalData['Pet Type']) : ""; 
        $petBreed    = (isset($professionalData['Pet Breed'])) ? trim($professionalData['Pet Breed']) : ""; 
        $petSecBreed = (isset($professionalData["Pet\'s Secondary Bree if Applicable"])) ? trim($professionalData["Pet\'s Secondary Bree if Applicable"]) : "";
        $petColor    = (isset($professionalData["Pet\'s Color"])) ? trim($professionalData["Pet\'s Color"]) : ""; 
        $petSecColor = (isset($professionalData["Pet\'s Secondary Color if Applicable"])) ? trim($professionalData["Pet\'s Secondary Color if Applicable"]) : "";
        $petGender   = (isset($professionalData["Pet\'s Gender"])) ? trim($professionalData["Pet\'s Gender"]) : ""; 
        $petWeight   = (isset($professionalData["Pet\'s Weight"])) ? trim($professionalData["Pet\'s Weight"]) : ""; // not available in db
        $petBirth    = (isset($professionalData["Pet\'s Birthday"])) ? trim($professionalData["Pet\'s Birthday"]) : ""; 
       
        $spayed  = (isset($professionalData["Is Pet Neutered or Spayed"])) ? trim($professionalData["Is Pet Neutered or Spayed"]) : "";
        $vaccin  = (isset($professionalData["Are Vacciniations Up to Date"])) ? trim($professionalData["Are Vacciniations Up to Date"]) : "";
        $unique_feature  = (isset($professionalData["Pet\'s Unique Features"])) ? trim($professionalData["Pet\'s Unique Features"]) : "";
        $spacial_need  = (isset($professionalData["Pet\'s Special Needs"])) ? trim($professionalData["Pet\'s Special Needs"]) : "";
        $allergies  = (isset($professionalData["Pet\'s Allergies"])) ? trim($professionalData["Pet\'s Allergies"]) : "";
        $pet_vet_clinic  = (isset($professionalData["Pet\'s Vet Clinic\'s Business Name"])) ? trim($professionalData["Pet\'s Vet Clinic\'s Business Name"]) : "";
        $pet_vet_fname  = (isset($professionalData["Vet\'s First Name"])) ? trim($professionalData["Vet\'s First Name"]) : "";
        $pet_vet_lname  = (isset($professionalData["Vet\'s Last Name"])) ? trim($professionalData["Vet\'s Last Name"]) : "";
        $pet_vet_email  = (isset($professionalData["Pet\'s Vet Email"])) ? trim($professionalData["Pet\'s Vet Email"]) : "";
        $pet_vet_add1  = (isset($professionalData["Pet\'s Vet Adderss Line 1"])) ? trim($professionalData["Pet\'s Vet Adderss Line 1"]) : "";
        $pet_vet_add2  = (isset($professionalData["Pet\'s Vet Address Line 2"])) ? trim($professionalData["Pet\'s Vet Address Line 2"]) : "";
        $pet_vet_city  = (isset($professionalData["Pet\'s Vet Address City"])) ? trim($professionalData["Pet\'s Vet Address City"]) : "";
        $pet_vet_state  = (isset($professionalData["Pet\'s Vet Address State"])) ? trim($professionalData["Pet\'s Vet Address State"]) : "";
        $pet_vet_zip  = (isset($professionalData["Pet\'s Vet Address Zip Code"])) ? trim($professionalData["Pet\'s Vet Address Zip Code"]) : "";
        // $pet_vet_phone  = (isset($professionalData["Pet Vet\'s Phone Number"])) ? trim($professionalData["Pet Vet\'s Phone Number"]) : "";
        if(isset($professionalData["Pet Vet\'s Phone Number"]) && !empty($professionalData["Pet Vet\'s Phone Number"]))
            {
            $pet_vet_phone =  sprintf("%d", $professionalData["Pet Vet\'s Phone Number"]);
            }
            else{
                 $pet_vet_phone = "";
            } 
        if(isset($professionalData["Pet\'s Vet Alternate Phone Number"]) && !empty($professionalData["Pet Vet\'s Phone Number"]))
            {
            $pet_vet_alt_phone =  sprintf("%d", $professionalData["Pet\'s Vet Alternate Phone Number"]);
            }
            else{
                 $pet_vet_alt_phone = "";
            } 
        // $pet_vet_alt_phone  = (isset($professionalData["Pet\'s Vet Alternate Phone Number"])) ? trim($professionalData["Pet\'s Vet Alternate Phone Number"]) : "";
        $smartTag_id  = (isset($professionalData["Pet\'s Smart Tag ID"])) ? trim($professionalData["Pet\'s Smart Tag ID"]) : "";
        if(!empty($post_id)){
        update_post_meta($post_id, 'pet_name',  $petName);
        update_post_meta($post_id, 'pet_type', $petType);
        update_post_meta($post_id, 'primary_breed', $petBreed);
        update_post_meta($post_id, 'secondary_breed', $petSecBreed);
        update_post_meta($post_id, 'primary_color', $petColor);
        update_post_meta($post_id, 'secondary_color', $petSecColor);
        update_post_meta($post_id, 'gender', $petGender);
        update_post_meta($post_id, 'pet_date_of_birth', $petBirth);
        update_post_meta($post_id, 'microchip_id_number', $petMicrochip);
        update_post_meta($post_id, 'idtag_id', $petUni);
        update_post_meta($post_id, 'neutered_spayed', $spayed);
        update_post_meta($post_id, 'unique_features', $unique_feature);
        update_post_meta($post_id, 'spacial_need', $spacial_need);
        update_post_meta($post_id, 'allergies', $allergies);
        update_post_meta($post_id, 'vaccinations', $vaccin);
        update_post_meta($post_id, 'pet_owner', $userId);
        update_post_meta($post_id, 'clinic_name', $pet_vet_clinic);
        update_post_meta($post_id, 'vaterinarian_first_name', $pet_vet_fname);
        update_post_meta($post_id, 'vaterinarian_last_name', $pet_vet_lname);
        update_post_meta($post_id, 'vaterinarian_email', $pet_vet_email);
        update_post_meta($post_id, 'vaterinarian_address_line_1', $pet_vet_add1);
        update_post_meta($post_id, 'vaterinarian_address_line_2', $pet_vet_add2);
        update_post_meta($post_id, 'vaterinarian_city', $pet_vet_city);
        update_post_meta($post_id, 'vaterinarian_state', $pet_vet_state);
        update_post_meta($post_id, 'vaterinarian_zip_code', $pet_vet_zip);
        update_post_meta($post_id, 'vaterinarian_primary_phone_number', $pet_vet_phone);
        update_post_meta($post_id, 'vaterinarian_secondary_phone_number', $pet_vet_alt_phone);
        update_post_meta($post_id, 'smarttag_id_number', $smartTag_id);

        return $post_id;
            

        }
        else{
            $newPost = array(
         'post_title'   => trim($title),
         'post_status'  => 'publish',
         'post_type'    => 'pet_profile',
         'post_author'  => $userId
        );
       
        $postId = wp_insert_post($newPost);
        update_post_meta($postId, 'pet_name',  $petName);
        update_post_meta($postId, 'pet_type', $petType);
        update_post_meta($postId, 'primary_breed', $petBreed);
        update_post_meta($postId, 'secondary_breed', $petSecBreed);
        update_post_meta($postId, 'primary_color', $petColor);
        update_post_meta($postId, 'secondary_color', $petSecColor);
        update_post_meta($postId, 'gender', $petGender);
        update_post_meta($postId, 'pet_date_of_birth', $petBirth);
        update_post_meta($postId, 'microchip_id_number', $petMicrochip);
        update_post_meta($postId, 'idtag_id', $petUni);
        update_post_meta($postId, 'neutered_spayed', $spayed);
        update_post_meta($postId, 'unique_features', $unique_feature);
        update_post_meta($postId, 'spacial_need', $spacial_need);
        update_post_meta($postId, 'allergies', $allergies);
        update_post_meta($postId, 'vaccinations', $vaccin);
        update_post_meta($postId, 'pet_owner', $userId);
        update_post_meta($postId, 'clinic_name', $pet_vet_clinic);
        update_post_meta($postId, 'vaterinarian_first_name', $pet_vet_fname);
        update_post_meta($postId, 'vaterinarian_last_name', $pet_vet_lname);
        update_post_meta($postId, 'vaterinarian_email', $pet_vet_email);
        update_post_meta($postId, 'vaterinarian_address_line_1', $pet_vet_add1);
        update_post_meta($postId, 'vaterinarian_address_line_2', $pet_vet_add2);
        update_post_meta($postId, 'vaterinarian_city', $pet_vet_city);
        update_post_meta($postId, 'vaterinarian_state', $pet_vet_state);
        update_post_meta($postId, 'vaterinarian_zip_code', $pet_vet_zip);
        update_post_meta($postId, 'vaterinarian_primary_phone_number', $pet_vet_phone);
        update_post_meta($postId, 'vaterinarian_secondary_phone_number', $pet_vet_alt_phone);
        update_post_meta($postId, 'smarttag_id_number', $smartTag_id);

        return $postId;
        }
       
    }
 
    

