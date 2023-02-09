<?php


//flush_rewrite_rules(true);

// ini_set('display_errors','on');
// ini_set('error_reporting', E_ALL );
// define('WP_DEBUG', true);
// define('WP_DEBUG_DISPLAY', true);
// error_reporting(E_ALL);
// ini_set('display_errors', '1');

//https://prelaunch.idtag.com/wp-admin/post.php?post=7804&action=edit
/* ..............................................................................................*/
/*....................................Pet Protection Plans id ...................................*/
/*...............................................................................................*/


global $micoPrntId,$plholderImg,$loginUrl;
    $plholderImg = 82739; 
    $loginUrl = site_url('/login-to-smarttag/?login=1');
global $ssil1,$sgol1,$sgol2,$spla1,$spla2;
    $micoPrntId = 7804;
    $ssil1      = '75193';
    $sgol1      = '75192';
    $sgol2      = '75189';
    $spla1      = '75188';
    $spla2      = '75196';

//smartTag plans
global $SmtProPlan,$SmtSil1,$SmtSil2,$SmtSil3,$SmtGol1,$SmtGol2,$SmtGol3,$SmtPla1,$SmtPla2,$SmtPla3;
    $SmtProPlan = 6137;
    $SmtSil1    = '6850';
    $SmtSil2    = '6851';
    $SmtSil3    = '6852';
    $SmtGol1    = '6853';
    $SmtGol2    = '6854';
    $SmtGol3    = '6855';
    $SmtPla1    = '6856';
    $SmtPla2    = '6857';
    $SmtPla3    = '6858';

global $brassIdTag,$aluminumIdTag,$heth_proid,$protectionArrangement;
    $brassIdTag     = '6089';
    $aluminumIdTag  = '6033';
    $heth_proid     = '7500';
    $protectionArrangement = '6138';

/* ..............................................................................................*/
/*........................................ protection plan id ...................................*/
/*...............................................................................................*/
global $proSil1,$proSil2,$proGol1,$proGol2,$proPla1,$proPla2;
    $proSil1      = '75193' ;
    $proSil2      = '75193' ;
    $proGol1      = '75192' ;
    $proGol2      = '75189';
    $proPla1      = '75188';
    $proPla2      = '75196';

//smartTag plans
global $proSmtSil1,$proSmtSil2,$proSmtSil3,$proSmtGol1,$proSmtGol2,$proSmtGol3,$proSmtPla1,$proSmtPla2,$proSmtPla3;

    $proSmtSil1 = '75381';
    $proSmtSil2 = '75380';
    $proSmtSil3 = '75379';
    $proSmtGol1 = '75378';
    $proSmtGol2 = '75377';
    $proSmtGol3 = '75376';
    $proSmtPla1 = '75375';
    $proSmtPla2 = '75374';
    $proSmtPla3 = '75373';

/*Custom Product */
global $globalBrassIdTag, $globalAluminumIdTag, $globalRepBrassIdTag, $globalRepAluminumIdTag, $brassIdTagProductSlug, $aluminumIdTagProductSlug;
$globalBrassIdTag       = 6089;
$globalAluminumIdTag    = 6033;
$globalRepBrassIdTag    = 7722;
$globalRepAluminumIdTag = 7659;
$brassIdTagProductSlug  = "brass-id-tag";
$aluminumIdTagProductSlug = "aluminum-id-tag";

/*Microchip Product*/

global $globalMicrochipDataId, $globalMicrochipStandrdId, $globalMicrochipMiniData, $globalMicrochipMiniBox;
$globalMicrochipDataId = 6134;
$globalMicrochipStandrdId = 7908;
$globalMicrochipMiniData = 78799;  
$globalMicrochipMiniBox = 78798;

/*Universal Microchip Plan*/

global $globalUniversalMicrPlanId;
$globalUniversalMicrPlanId = 6908;

global $printLostPoster;
$printLostPoster = 83410;

/*Define Global serial Number Prefix*/
global $serialNumberPrefix1, $serialNumberPrefix2 ,$serialNumberPrefix3;

$serialNumberPrefix1 = 900139;
$serialNumberPrefix2 = 900141;
$serialNumberPrefix3 = 900074;
$serialNumberPrefix4 = 987000;

/*----------------------------------global arrays----------------------------------------------*/

//prefix for microchip
global $microchipPrefixArray;
$microchipPrefixArray = [900139, 900141, 900074, 987000];  

//pet colors
global $petColors;
$petColors = array(
        "Black" => "Black",
        "Brown" => "Brown",
        "Gold" => "Gold",
        "Gray" => "Gray",
        "Orange" => "Orange",
        "Red" => "Red",
        "Sliver" => "Sliver",
        "Tan" => "Tan",
        "White" => "White",
        "Yellow" => "Yellow"
    );
//


/*Make first later in upper case of posts title*/
function makeTitle($title) {
    $title = ucfirst($title);
    return $title;
}
add_filter( 'the_title', 'makeTitle', 10, 1 );

//override checkout.min.js for custom validate fields
add_action('wp_enqueue_scripts', 'override_woo_frontend_scripts');
function override_woo_frontend_scripts() {
    wp_deregister_script('wc-checkout');
    wp_enqueue_script('wc-checkout', get_stylesheet_directory_uri() . '/woocommerce/assets/js/frontend/checkout.min.js', array('jquery'), null, true);
}


add_action( 'wp_enqueue_scripts', 'salient_child_enqueue_styles');
function salient_child_enqueue_styles() {
    
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css', array('font-awesome'));

    if ( is_rtl() ) 
        wp_enqueue_style(  'salient-rtl',  get_template_directory_uri(). '/rtl.css', array(), '1', 'screen' );

    wp_enqueue_style(  'phone-code-style',  get_stylesheet_directory_uri(). '/css/intlTelInput.css', array(), '1', 'screen' );
    // wp_enqueue_style(  'phone-code-demo-style',  get_stylesheet_directory_uri(). '/css/demo.css', array(), '1', 'screen' );

}
// function replace_core_jquery_version() {
//     wp_deregister_script( 'jquery' );
//     //   
//     wp_register_script( 'jquery', "https://code.jquery.com/jquery-3.3.1.min.js", array(), '3.3.1' );
// }
// add_action( 'wp_enqueue_scripts', 'replace_core_jquery_version' );
/*Added JS and CSS*/

add_action( 'wp_enqueue_scripts', 'wpdocs_scripts_method' );

function wpdocs_scripts_method() {
            
  wp_enqueue_script( 'jquery-js', 'https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js', array( 'jquery' ),rand(),true );

wp_enqueue_script( 'jquery-js', 'https://cdn.jsdelivr.net/npm/jquery.ui.widget@1.10.3/jquery.ui.widget.js', array( 'jquery' ),rand(),true );

    wp_enqueue_script( 'jquery-js-Ui', 'https://code.jquery.com/ui/1.10.4/jquery-ui.min.js', array( 'jquery' ),rand(),true );

    wp_enqueue_script( 'popper-script', get_stylesheet_directory_uri() . '/js/popper.js', array( 'jquery' ),rand(),true );
    wp_enqueue_script( 'bootstrap-script', get_stylesheet_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ),rand(),true );
    wp_enqueue_script( 'slider-script', get_stylesheet_directory_uri() . '/js/lightslider.js', array( 'jquery' ),rand(),true );
    wp_enqueue_script( 'select-script', get_stylesheet_directory_uri() . '/js/custom-select.js', array( 'jquery' ),rand(),true );
    wp_enqueue_script( 'radio-script', get_stylesheet_directory_uri() . '/js/custom-radio.js', array( 'jquery' ),rand(),true );
    wp_enqueue_script( 'validate-script', get_stylesheet_directory_uri() . '/js/validate.js', array( 'jquery' ),rand(),true );

    if(!is_page(107938)){
        wp_enqueue_script( 'steps-script', get_stylesheet_directory_uri() . '/js/steps.js', array( 'jquery' ),rand(),true );
        
    }

    
    wp_enqueue_script( 'tabs-script', get_stylesheet_directory_uri() . '/js/tabs.js', array( 'jquery' ),rand(),true );
    wp_enqueue_script( 'custom-script', get_stylesheet_directory_uri() . '/js/custom.js', array( 'jquery' ),rand(),true );  
    wp_enqueue_script( 'customjsr-script', get_stylesheet_directory_uri() . '/js/custom-js-r.js', array( 'jquery' ),rand(),true );  
    wp_enqueue_script( 'customjss-script', get_stylesheet_directory_uri() . '/js/custom-js-s.js', array( 'jquery' ),rand(),true );
    wp_enqueue_script( 'custom-woocommrce-script', get_stylesheet_directory_uri() . '/js/woocommrce-product-custom.js', array( 'jquery' ),rand(),true );
    wp_enqueue_script( 'additional-script', 'https://jqueryvalidation.org/files/dist/additional-methods.min.js', array( 'jquery' ),'',true ); 
    wp_enqueue_script( 'phone-code-script', get_stylesheet_directory_uri() . '/js/intlTelInput.js', array( 'jquery' ),rand(),true ); 
    /*custom jquery code start--added by developer*/
     wp_enqueue_script( 'jquery-ui-script', get_stylesheet_directory_uri() .'/js/jquery-ui.js', array( 'jquery' ),rand(),true ); /*custom jquery code end--added by developer( remove datepiker error on console)*/

      if( is_page( array( 'register-multiple-microchip' ) ) ){
        // wp_enqueue_script( 'Multi-steps-script', , array( 'jquery' ),rand(),true );

        wp_enqueue_script( 'script-name', get_stylesheet_directory_uri() . '/js/multi-stage.js', array(), '1.0.0', true );
    }
    
}



//function load_admin_script() {

    //  wp_enqueue_script( 'jquery-js', 'https://code.jquery.com/ui/1.10.4/jquery-ui.min.js', array( 'jquery' ),rand(),true );

    //$post = get_post_type();
    //if($post == 'pet_profile'){
         // wp_enqueue_script( 'jquery-js', 'https://code.jquery.com/ui/1.10.4/jquery-ui.min.js', array( 'jquery' ),rand(),true );

       // wp_enqueue_script( 'jquery-js', get_stylesheet_directory_uri() .'/js/jquery-dropdown.js', array( 'jquery' ),rand(),true );

       /* wp_enqueue_script( 'jquery-ui-script', get_stylesheet_directory_uri() .'/js/jquery-ui.js', array( 'jquery' ),rand(),true );*/   
        
       // wp_enqueue_script( 'combobox-script', get_stylesheet_directory_uri() .'/js/jquery.ui.combobox.js', array( 'jquery' ),rand(),true );

       // wp_enqueue_script( 'custom-dropdown', get_stylesheet_directory_uri() .'/js/custom-dropdown.js', array( 'jquery' ),rand(),true );
   // }

    //wp_enqueue_script( 'phone-code-script', get_stylesheet_directory_uri() . '/js/intlTelInput.js', array( 'jquery' ),rand(),true );
//}
     //add_action( 'admin_enqueue_scripts', 'load_admin_script' );

    
  /*custom jquery code start--added by satish*/
    

function load_admin_style() {
    wp_enqueue_style( 'jquery-ui-style', get_stylesheet_directory_uri().'wp-content/themes/salient-child/css/jquery-ui.css', false,00);
 /*custom jquery code end--added by satish*/
    wp_enqueue_style(  'phone-code-style',  get_stylesheet_directory_uri(). '/css/intlTelInput.css', array(), '1', 'screen' );
     wp_enqueue_style(  'custome-style',  get_stylesheet_directory_uri(). '/css/custom.css', array(), rand(), 'screen' );
}
add_action( 'admin_enqueue_scripts', 'load_admin_style' );

//add search for author in pet profiles
add_filter('wp_dropdown_users', 'MySwitchUser');
function MySwitchUser($output)
{
      global $post;
    //global $post is available here, hence you can check for the post type here
    //$users = get_users('role=subscriber');
    $users = get_users();

    $output = "<select class=\"selectpicker\" data-show-subtext=\"true\" data-live-search=\"true\" id=\"post_author_override\" name=\"post_author_override\" class=\"\">";

    //Leave the admin in the list
    //$output .= "<option value=\"1\">Admin</option>";
    foreach($users as $user)
    {
        $sel = ($post->post_author == $user->ID)?"selected='selected'":'';
        $output .= '<option value="'.$user->ID.'"'.$sel.'>'.$user->user_login.'</option>';
    }
    $output .= "</select>";

    return $output;
}



// update '1' to the ID of your form
add_filter( 'gform_pre_render_1', 'add_readonly_script' );
function add_readonly_script( $form ) {
    ?>
 
    <script type="text/javascript">
        jQuery(document).ready(function(){
            /* apply only to a input with a class of smartid_disabled */
            jQuery("li.smartid_disabled input#input_1_1").attr("readonly","readonly");
        });
    </script>
 
    <?php
    return $form;
}

foreach ( array( 'pre_term_description' ) as $filter ) {
    remove_filter( $filter, 'wp_filter_kses' );
}

//order history show into the pet professionals
// include('subMenu.php');

// $menu =  wp_nav_menu( array('menu' => 'Main Navigation','menu_class' => 'menu-name','walker' => new subMenu));

add_shortcode( 'my_products', 'bbloomer_user_products_bought' );
 
function bbloomer_user_products_bought() {
global $product, $woocommerce, $woocommerce_loop;
$columns = 3;
$current_user = wp_get_current_user();
$args = array(
    'post_type' => 'product',
    'post_status' => 'publish',
    'posts_per_page' => -1
);
$loop = new WP_Query($args);
 
ob_start();
 
woocommerce_product_loop_start();
 
while ( $loop->have_posts() ) : $loop->the_post();
$theid = get_the_ID();
if ( wc_customer_bought_product( $current_user->user_email, $current_user->ID, $theid ) ) {
wc_get_template_part( 'content', 'product' ); 
} 
endwhile; 
 
woocommerce_product_loop_end();
 
woocommerce_reset_loop();
wp_reset_postdata();
 
return '<div class="woocommerce columns-' . $columns . '">' . ob_get_clean() . '</div>';
}   



/*Start:- Assign Products Template according to name*/

function customProductTemplate($template, $slug, $name) {
    global $product;
    $product_id = $product->get_id();
    $post_object = get_post($product_id);
    $post_name = $post_object->post_name;
    if ($name === 'single-product' && $slug === 'content') {
        $temp = locate_template(array("{$slug}-{$name}-{$post_name}.php", WC()->template_path() . "{$slug}-{$name}-{$post_name}.php"));
        if($temp) {
           $template = $temp;
        }
    }
    return $template;
}
add_filter('wc_get_template_part', 'customProductTemplate', 10, 3);

/*End:- Assign Custom Products Template*/

/*Function For Display Single and category product*/

function woocommerce_content() { ?>

       
    <div class="woo-sidebar col-sm-3">
        <?php echo do_shortcode("[stag_sidebar id='woocommerce']"); ?>
    </div>
    <div class="woo-content col-sm-9 ocean" id="woo-content">
        <?php
        if ( is_singular( 'product' ) ) { 
            
            while ( have_posts() ) : the_post();
                wc_get_template_part( 'content', 'single-product');
                $terms = wp_get_post_terms( get_the_ID(), 'product_cat' );
                $idd=$terms[0]->term_id;
                    echo '<script type="text/javascript">
                        jQuery(document).ready(function () {
                            jQuery("ul.product-categories").find("li.cat-item-'.$idd.'").addClass("active");
    
                          });
                    </script>';
            endwhile;

        } else { 

           // $cate = get_queried_object();
            //$cateID = $cate->term_id;
            $terms = wp_get_post_terms( get_the_ID(), 'product_cat' );
          
           $cateID = $terms[0]->term_id;
            if ($cateID != 15) {
            ?>
                <div class="page-heading ocea">
                    <h1><?php woocommerce_page_title(); ?></h1>
                </div> 
            <?php }
            if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>

                <h1 class="page-title"><?php woocommerce_page_title(); ?></h1>

            <?php endif; ?> 

            <?php do_action( 'woocommerce_archive_description' ); ?>

            <?php if ( have_posts() ) : ?>

                <?php do_action( 'woocommerce_before_shop_loop' ); ?>

                <?php woocommerce_product_loop_start(); ?>

                    <?php woocommerce_product_subcategories(); ?>

                    <?php while ( have_posts() ) : the_post(); ?>

                        <?php wc_get_template_part( 'content', 'product' ); ?>

                    <?php endwhile; // end of the loop. ?>

                <?php woocommerce_product_loop_end(); ?>

                <?php do_action( 'woocommerce_after_shop_loop' ); ?>

            <?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

                <?php //do_action( 'woocommerce_no_products_found' ); ?>

            <?php endif;

            global $wp_query;
             $cat_obj = $wp_query->get_queried_object();
             $id = $cat_obj->term_id;
             echo '<script type="text/javascript">
                        jQuery(document).ready(function () {
                            jQuery("ul.product-categories").find("li.cat-item-'.$id.'").addClass("active");
                        })
                    </script>';

        } ?>
    </div>
<?php
    }


/*function for update freature image of pet profile*/
function updateFeatureImage($file,$post_id){

    $success = 0;
    if ($file["feature"]['error'] > 0) {
        $msg = 'File name cannot be empty';
    }elseif ($file["feature"]['size'] > 2000000) {
        $msg = 'Please only select images less than 2MB in size';
    }else{
       $upload = wp_upload_bits($file["feature"]["name"], null, file_get_contents($file["feature"]["tmp_name"]));
        // print_r($file);die;
        $filename = $upload['file'];
        $wp_filetype = wp_check_filetype(basename( $filename ), null );
        if (strtolower($wp_filetype['ext']) == 'png' || strtolower($wp_filetype['ext']) == 'jpg' || strtolower($wp_filetype['ext']) == 'jpeg') {

           
            $wp_upload_dir = wp_upload_dir();
            $attachment = array(
                'guid'              => $wp_upload_dir['url'] . '/' . basename( $filename ),
                'post_mime_type'    => $wp_filetype['type'],
                'post_title'        => preg_replace( '/\.[^.]+$/', '', basename( $filename ) ),
                'post_content'      => '',
                'post_status'       => 'inherit'
            );
            $attach_id = wp_insert_attachment( $attachment, $filename, $post_id );
            require_once(ABSPATH . 'wp-admin/includes/image.php');
            $attach_data = wp_generate_attachment_metadata( $attach_id, $filename );
            wp_update_attachment_metadata( $attach_id, $attach_data );
            set_post_thumbnail( $post_id, $attach_id ); 
            $msg     = "Update Profile Successfully.";
            $success = 1;
        }else{
            $msg = "Please upload only jpg, jpeg and png Type Image.";
        }
        
    }
    return json_encode(array("success"=>$success, "msg"=>$msg));
}

/*function for update freature image of pet profile*/
function uploadImage($file,$post_id){
    
    $success = 0;
    if ($file["feature"]['error'] > 0) {
        $msg = 'File name cannot be empty';
    }elseif ($file["feature"]['size'] > 2000000) {
        $msg = 'Please only select images less than 2MB in size';
    }else{
       $upload = wp_upload_bits($file["feature"]["name"], null, file_get_contents($file["feature"]["tmp_name"]));
        // print_r($file);die;
        $filename = $upload['file'];
        $wp_filetype = wp_check_filetype(basename( $filename ), null );
        if (strtolower($wp_filetype['ext']) == 'png' || strtolower($wp_filetype['ext']) == 'jpg' || strtolower($wp_filetype['ext']) == 'jpeg') {

            
            $wp_upload_dir = wp_upload_dir();
            $attachment = array(
                'guid'              => $wp_upload_dir['url'] . '/' . basename( $filename ),
                'post_mime_type'    => $wp_filetype['type'],
                'post_title'        => preg_replace( '/\.[^.]+$/', '', basename( $filename ) ),
                'post_content'      => '',
                'post_status'       => 'inherit'
            );
            $attach_id = wp_insert_attachment( $attachment, $filename, $post_id );
            require_once(ABSPATH . 'wp-admin/includes/image.php');
            $attach_data = wp_generate_attachment_metadata( $attach_id, $filename );
            wp_update_attachment_metadata( $attach_id, $attach_data );
            set_post_thumbnail( $post_id, $attach_id ); 
            $msg     = "Update Profile Successfully";
            $success = 1;
        }else{
            $msg = "Please upload only jpg, jpeg and png Type Image.";
        }
        
    }
    return json_encode(array("success"=>$success, "msg"=>$msg));
}
/*function for update pet profile info.*/
function updatePetInformation($post,$post_id = '',$short=true,$other=false){
    if (empty($post_id)) {
        $post_id = $post['post_id'];
    }
    $title                  = $post['title']; 
    $type                   = $post['pet_type']; 
    $primary                = $post['primary_breed']; 
    $secondary              = $post['secondary_breed']; 
    $primary_color          = $post['primary_color']; 
    $secondary_color        = $post['secondary_color']; 
    $gender                 = $post['gender']; 
    $size                   = $post['size']; 
    $dob                    = $post['pet_date_of_birth']; 
    $my_post['ID']          = $post_id;
    $my_post['post_title']  = $title;
    wp_update_post( $my_post );
    update_post_meta($post_id,'pet_type',$type);
    update_post_meta($post_id,'primary_breed',$primary);
    update_post_meta($post_id,'secondary_breed',$secondary);
    update_post_meta($post_id,'primary_color',$primary_color);
    update_post_meta($post_id,'secondary_color',$secondary_color);
    update_post_meta($post_id,'gender',$gender);
    update_post_meta($post_id,'size',$size);
    update_post_meta($post_id,'pet_date_of_birth',$dob);

    if ($short) {
        $neuteredSpayed         = $post['neutered_spayed']; 
        $shot                   = $post['shot'];
        $unique_features        = $post['unique_features'];
        $special_needs        = $post['special_needs'];
        $allergies              = $post['allergies'];
        update_post_meta($post_id,'neutered_spayed',$neuteredSpayed);
        update_post_meta($post_id,'shot',$shot);
        update_post_meta($post_id,'unique_features',$unique_features);
        update_post_meta($post_id,'special_needs',$special_needs);
        update_post_meta($post_id,'allergies',$allergies);
        
    }
    $msg = "Pet Information updated Successfully";
    return json_encode(array("success"=>1, "msg"=>$msg));
}

/*Function for update Owner Information*/
function updateOwnerInformation($post,$user_id,$emaill=1){

    $firstName  = $post['primary_first_name'];
    $lastName   = $post['primary_last_name'];
    $email      = $post['primary_email'];
    $phone      = $post['primary_home_number'];
    $current_user       = get_user_by( 'id', $user_id );
    $current_email      = $current_user->user_email;
    $phoneExist = phone_exists($phone);
    if ($phoneExist['success'] && $phone != get_user_meta($user_id, 'primary_home_number', true)) {
        $msg = "This primary home number is already used by other user.";
        return json_encode(array("success"=>0, "msg"=>$msg, "data"=>$phoneExist));
    }

    if ($emaill && $current_email != $email) {
        if (is_wp_error( $email )) {
            $msg    = $email->get_error_message();
            return json_encode(array("success"=>0, "msg"=>$msg));
        }else{
            $email  = wp_update_user( array( 'ID' => $user_id, 'user_email' => $email ) );
        }
    }
    update_user_meta( $user_id, 'primary_country', $post['primary_country'] );
    update_user_meta( $user_id, 'primary_address_line1', $post['primary_address_line1'] );
    update_user_meta( $user_id, 'primary_address_line2', $post['primary_address_line2'] );
    update_user_meta( $user_id, 'primary_city', $post['primary_city'] );
    update_user_meta( $user_id, 'primary_state', $post['primary_state'] );
    update_user_meta( $user_id, 'primary_postcode', $post['primary_postcode'] );
    update_user_meta( $user_id, 'primary_home_number', $post['primary_home_number'] );
    update_user_meta( $user_id, 'primary_cell_number', $post['primary_cell_number'] );

    update_user_meta( $user_id, 'primary_phone_country_code', $post['primary_home_number_code'] );
    update_user_meta( $user_id, 'primary_cell_country_code', $post['primary_cell_number_code'] );
    if (isset($post['primary_argent_alert'])) {
        update_user_meta( $user_id, 'primary_argent_alert', $post['primary_argent_alert'] );
    }

    if (is_wp_error( $firstName )) {
        $msg = $firstName->get_error_message();
    }elseif (is_wp_error( $lastName )) {
        $msg = $lastName->get_error_message();
    }else{
        $firstName = wp_update_user( array( 'ID' => $user_id, 'first_name' => $firstName ) );
        $lastName = wp_update_user( array( 'ID' => $user_id, 'last_name' => $lastName ) );
        $msg = "Owner Information updated Successfully";
    }
    return json_encode(array("success"=>1, "msg"=>$msg));
}

/*Function for update Alternate Emergency Information*/
function updateAlternateEmergencyInformation($post,$user_id){

    update_user_meta( $user_id, 'secondary_first_name', $post['secondary_first_name'] );
    update_user_meta( $user_id, 'secondary_last_name', $post['secondary_last_name'] );
    update_user_meta( $user_id, 'secondary_email', $post['secondary_email'] );
    update_user_meta( $user_id, 'secondary_country', $post['secondary_country'] );
    update_user_meta( $user_id, 'secondary_address_line1', $post['secondary_address_line1'] );
    update_user_meta( $user_id, 'secondary_address_line2', $post['secondary_address_line2'] );
    update_user_meta( $user_id, 'secondary_city', $post['secondary_city'] );
    update_user_meta( $user_id, 'secondary_state', $post['secondary_state'] );
    update_user_meta( $user_id, 'secondary_postcode', $post['secondary_postcode'] );
    update_user_meta( $user_id, 'secondary_home_number', $post['secondary_home_number'] );
    update_user_meta( $user_id, 'secondary_cell_number', $post['secondary_cell_number'] );
    update_user_meta( $user_id, 'secondary_phone_country_code', $post['secondary_home_number_code'] );
    update_user_meta( $user_id, 'secondary_cell_country_code', $post['secondary_cell_number_code'] );

    $msg = "Alternate Emergency Contact updated Successfully";
    return json_encode(array("success"=>1, "msg"=>$msg));
}

/*Function for update Vaterinarian Information*/
function updateVaterinarianInformation($post,$post_id=''){

    if (empty($post_id)) {
        $post_id = $post['postId'];
    }

    
    update_post_meta($post_id,'clinic_name',$post['clinic_name']);
    update_post_meta($post_id,'vaterinarian_firstlast_name',$post['vaterinarian_firstlast_name']);
    update_post_meta($post_id,'vaterinarian_country',$post['vaterinarian_country']);
    update_post_meta($post_id,'vaterinarian_email',$post['vaterinarian_email']);
    update_post_meta($post_id,'vaterinarian_address_line_1',$post['vaterinarian_address_line_1']);
    update_post_meta($post_id,'vaterinarian_address_line_2',$post['vaterinarian_address_line_2']);
    update_post_meta($post_id,'vaterinarian_city',$post['vaterinarian_city']);
    update_post_meta($post_id,'vaterinarian_state',$post['vaterinarian_state']);
    update_post_meta($post_id,'vaterinarian_zip_code',$post['vaterinarian_zip_code']);
    update_post_meta($post_id,'vaterinarian_primary_phone_number',$post['vaterinarian_primary_phone_number']);
    update_post_meta($post_id,'vaterinarian_secondary_phone_number',$post['vaterinarian_secondary_phone_number']);
    update_post_meta($post_id,'vaterinarian_primary_phone_number_code',$post['vaterinarian_primary_phone_number_code']);
    update_post_meta($post_id,'vaterinarian_secondary_phone_number_code',$post['vaterinarian_secondary_phone_number_code']);
    
    $msg = "Veterinarian Contact Information updated Successfully";
    return json_encode(array("success"=>1, "msg"=>$msg));
}

function createPost($post,$file){
    $title              = $post['title'];
    $smarttagTagID      = $post['smartTagID'];
    $userID             = get_current_user_id();
    
    $new_post = array(
        'post_title'   => $title,
        'post_status'  => 'publish',
        'post_type'    => 'pet_profile',
    );
 
    $post_id = wp_insert_post($new_post);
    update_post_meta($post_id,'smarttag_id_number',$smarttagTagID);
    update_post_meta($post_id, 'source_system', 'SMARTTAG');
    updateVaterinarianInformation($post,$post_id);
    updateFeatureImage($file,$post_id);
    updatePetInformation($post,$post_id);
    updateOwnerInformation($post,$userID);
    updateAlternateEmergencyInformation($post,$userID);
}

add_filter( 'gform_validation_1', 'custom_validation' );
function custom_validation( $validation_result ) {
    //print_r($validation_result);
    $form = $validation_result['form'];

    $id = rgpost( 'input_1' );

    $rs = hasBoughtIDTag($id);
    if ($rs) {
        foreach( $form['fields'] as $field ) {
            if ( $field->id == '1' ) {
                if(checkSmartIDTagPetProfile($id) != true){
                    $validation_result['is_valid'] = false;
                    $field->failed_validation = true;
                    $field->validation_message = 'This SmartTagID is Already Registered';
                }
            }
        }
    }else{
         $validation_result['is_valid'] = false;
        foreach( $form['fields'] as $field ) {
            if ( $field->id == '1' ) {
                $field->failed_validation = true;
                $field->validation_message = 'This SmartTagID is not valid';
            }
        }               
    }
 
    //Assign modified $form object back to the validation result
    $validation_result['form'] = $form;
    return $validation_result;
 
}

function hasBoughtIDTag($id, $userId = "") {

    global $globalAluminumIdTag, $globalBrassIdTag, $globalRepAluminumIdTag, $globalRepBrassIdTag, $globalMicrochipDataId, $globalMicrochipStandrdId;

    // Set HERE in the array your specific target product IDs
    $rs = 0;
    $i  = 0;
    if (strlen($id) == 8) {
        $prod_arr = array( $globalBrassIdTag, $globalAluminumIdTag );
    }elseif (strlen($id) == 15) {
        $prod_arr = array( $globalMicrochipDataId, $globalMicrochipStandrdId );
    }
    if (empty($userId) && is_user_logged_in()) {
        $userId = get_current_user_id();
    }
    // Get all customer orders


    if (empty($userId)) {
        $customer_orders = get_posts( array(
            'numberposts' => -1,
            'post_type'   => 'shop_order', // WC orders post type
            'post_status' => array_keys( wc_get_order_statuses() ),
        ) );
    }else{
       $customer_orders = get_posts( array(
            'numberposts' => -1,
            'meta_key'    => '_customer_user',
            'meta_value'  => $userId,
            'post_type'   => 'shop_order', // WC orders post type
            'post_status' => array_keys( wc_get_order_statuses() ),
        ) ); 
    }
    

    foreach ( $customer_orders as $customer_order ) {
        // Updated compatibility with WooCommerce 3+
        $order_id   = $customer_order->ID;
        $order      = wc_get_order( $order_id );
        $order      = new WC_Order( $order_id );
        // Iterating through each current customer products bought in the order
        foreach ($order->get_items() as $item) {
            // print_r($item);
            // WC 3+ compatibility
            if ( version_compare( WC_VERSION, '3.0', '<' ) ) 
                $product_id = $item['product_id'];
            else
                $product_id = $item->get_product_id();

            // Your condition related to your 2 specific products Ids
            if ( in_array( $product_id, $prod_arr ) ) {
                $kua = $item->get_meta_data();
                $result[] = $kua;
                
            }
        }
    }
    
    if (is_array($result) && isset($result[0])) {
        foreach ($result as $check) {
            foreach ($check as $key => $value) {
                if (strlen($id) == 8) {
                    if ($value->key == 'Serial Number') {
                        $idTagID[] = $value->value;
                    }
                }elseif (strlen($id) == 15) {
                    if ($value->key == 'Serial Number Range') {
                        $idTagID[] = $value->value;
                    }
                }
            }
        }
    }else{
        $rs = 0;
    }

    if (is_array($idTagID) && isset($idTagID[0])) {
        foreach ($idTagID as $value) {
            $values = explode(',', $value);
            foreach ($values as $value) {
                if (strlen($id) == 8) {
                    if ($value == $id) {
                        $rs = 1;
                        break;
                    }
                }elseif (strlen($id) == 15) {
                    $microchip = explode('-', $value);
                    $j = $microchip[0];
                    while ($j <= $microchip[1]) {
                        if ($id == $j) {
                            $rs = 1;
                            break;
                        }
                        $j++;
                    }
                }
            }
        }
    }else{
        $rs = 0;
    }
    return $rs;
}



function hasBoughtMichrochipTag($id, $userId = "") {

    global $globalAluminumIdTag, $globalBrassIdTag, $globalRepAluminumIdTag, $globalRepBrassIdTag, $globalMicrochipDataId, $globalMicrochipStandrdId;

    // Set HERE in the array your specific target product IDs
    $rs = 0;
    $i  = 0;

       

    if (strlen($id) == 8) {
        $prod_arr = array( $globalBrassIdTag, $globalAluminumIdTag );
    }elseif (strlen($id) == 15) {
        $prod_arr = array( $globalMicrochipDataId, $globalMicrochipStandrdId );
    }
    if (empty($userId) && is_user_logged_in()) {
        $userId = get_current_user_id();
    }
    // Get all customer orders


    if (empty($userId)) {
       
       $customer_orders = get_posts(array(
        'numberposts' => -1,
        'meta_key' => '_customer_user',
        'orderby' => 'date',
        'order' => 'DESC',
        'post_type' => wc_get_order_types(),
        'post_status' => array_keys(wc_get_order_statuses()), 'post_status' => array('wc-processing'),
    ));
    }else{
       $customer_orders = get_posts( array(
            'numberposts' => -1,
            'meta_key'    => '_customer_user',
            'meta_value'  => $userId,
            'post_type'   => wc_get_order_types(), // WC orders post type
            'post_status' => array_keys( wc_get_order_statuses() ),
        ) ); 
    }
    

 

    foreach ( $customer_orders as $customer_order ) {
        // Updated compatibility with WooCommerce 3+
        $order_id   = $customer_order->ID;
        $order      = wc_get_order( $order_id );
        $order      = new WC_Order( $order_id );
        // Iterating through each current customer products bought in the order
        foreach ($order->get_items() as $item) {
          
            // WC 3+ compatibility
            if ( version_compare( WC_VERSION, '3.0', '<' ) ) 
                $product_id = $item['product_id'];
            else
                $product_id = $item->get_product_id();

            // Your condition related to your 2 specific products Ids
            if ( in_array( $product_id, $prod_arr ) ) {
                $kua = $item->get_meta_data();
                $result[] = $kua;
                
            }
        }
      
    }
    
    if (is_array($result) && isset($result[0])) {
        foreach ($result as $check) {
            foreach ($check as $key => $value) {
                if (strlen($id) == 8) {
                    if ($value->key == 'Serial Number') {
                        $idTagID[] = $value->value;
                    }
                }elseif (strlen($id) == 15) {
                    if ($value->key == 'Serial Number Range') {
                        $idTagID[] = $value->value;
                    }
                }
            }
        }
    }else{
        $rs = 0;
    }

    if (is_array($idTagID) && isset($idTagID[0])) {
        foreach ($idTagID as $value) {
            $values = explode(',', $value);
            foreach ($values as $value) {
                if (strlen($id) == 8) {
                    if ($value == $id) {
                        $rs = 1;
                        break;
                    }
                }elseif (strlen($id) == 15) {
                    $microchip = explode('-', $value);
                    $j = $microchip[0];
                    while ($j <= $microchip[1]) {
                        if ($id == $j) {
                            $rs = 1;
                            break;
                        }
                        $j++;
                    }
                }
            }
        }
    }else{
        $rs = 0;
    }
    return $rs;
}
















/*Check SmartID Tag is exist or not in pet profile post*/
function checkSmartIDTagPetProfile($smarttagid = ""){

    if(isset($_POST) && empty($smarttagid)){
        $smarttagid = $_POST['SmartTag-id'];
    }
    $args=array(
        'post_type' => 'pet_profile',
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'meta_query'=>array(
            'relation' => 'AND',
                array(
                    'key' => 'smarttag_id_number',
                    'value' => $smarttagid,
                ),
            )
        
    );


    echo $smarttagid; die();


    $query = new WP_Query($args);
    if ($query->have_posts()) {
        return false;
    }else{
        return true;
    }
    return $query;
}

/*Check Microchip ID is exist or not in pet profile post*/
function checkMicrochipIDPetProfile($microchip = ""){

    if(isset($_POST) && empty($microchip)){
        $microchip = $_POST['microchip-id'];
    }

    $args=array(
        'post_type' => 'pet_profile',
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'meta_query'=>array(
            'relation' => 'AND',
                array(
                    'key' => 'microchip_id_number',
                    'value' => $microchip,
                ),
            )
        
    );
    $query = new WP_Query($args);

    if ($query->have_posts()) {
       
        return false;
    }else{

        return true;
    }

    return $query;
}

/*Check Microchip ID owner is exist or not in pet profile post*/
function checkMicrochipIDOwner($microchip = ""){

    if(isset($_POST) && empty($microchip)){
        $microchip = $_POST['microchip-id'];
    }

    $args=array(
        'post_type' => 'pet_profile',
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'meta_query'=>array(
            'relation' => 'AND',
                array(
                    'key' => 'microchip_id_number',
                    'value' => $microchip,
                ),
            )
        
    );
    $query = new WP_Query($args);
      if ($query->have_posts()) {
         $posts = $query->get_posts();
         $post_id = $posts[0]->ID;
         $owner_exist = get_post_meta( $post_id, 'owner_email' );
         if($owner_email != ''){
            return true;
         }
         else{
            return false;
         }
         
      }
    
   
}
/*Check Universal Microchip Id is exist or not in pet profile post*/
add_action('wp_ajax_checkUniversalMicrochipId', 'checkUniversalMicrochipIdForPetProfile');
add_action('wp_ajax_nopriv_checkUniversalMicrochipId', 'checkUniversalMicrochipIdForPetProfile');
function checkUniversalMicrochipIdForPetProfile($universalMicrochipID = ""){

    global $serialNumberPrefix1,$serialNumberPrefix2,$serialNumberPrefix3,$serialNumberPrefix4;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

    if(isset($_POST) && empty($universalMicrochipID)){
        $universalMicrochipId = $_POST['smarttag_id_number'];
    }
    $result = substr($universalMicrochipId, 0, 6);

           $validSerialPrefix = array($serialNumberPrefix1, $serialNumberPrefix2, $serialNumberPrefix3,$serialNumberPrefix4);
       
    if (in_array( $result, $validSerialPrefix)){

          $result = 0;
            $msg    = 'This is not universal Microchip ID. Please visit Smartag MichroChip';
            $myarray = array("status"=>"201","result"=>"otherMichrochip", "message"=> $msg );
            echo json_encode($myarray);
            exit();

    }else{
           
                $args=array(
                    'post_type' => 'pet_profile',
                    'post_status' => 'publish',
                    'posts_per_page' => -1,
                    'meta_query'=>array(
                        'relation' => 'OR',
                            array(
                                'key' => 'universal_microchip_id',
                                'value' => $universalMicrochipId,
                            ),
                        )
                    
                );
                
                $query = new WP_Query($args);

               

            global $wpdb;


                 $current_post = $wpdb->get_results( "SELECT * FROM $wpdb->postmeta WHERE  meta_key ='universal_microchip_id' AND  meta_value =".$universalMicrochipId );
              


                if (!empty($current_post)) {
                   
                        $result = 0;
                       $msg    = 'This ID Already Registered';
                       $myarray = array("status"=>"302","result"=>"exist", "message"=> $msg );
                       echo json_encode($myarray);

                }else{
                        $result = 0;
                       $msg    = '';
                       $myarray = array("status"=>"200","result"=>"success", "message"=> $msg );
                       echo json_encode($myarray);
                }
                exit;
        }        
    

}        

function checkUniversalMicrochipIdForPetProfileReturn($universalMicrochipID){
 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

   $args=array(
        'post_type' => 'pet_profile',
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'meta_query'=>array(
                'relation' => 'OR',
                array(
                    'key' => 'universal_microchip_id',
                    'value' => $universalMicrochipID,
                    'compare'   => 'LIKE',
                ),
            )
        
    );



    
         global $wpdb;

            $data = $wpdb->get_results($wpdb->prepare( "SELECT * FROM $wpdb->postmeta WHERE meta_value = %s", $universalMicrochipID) , ARRAY_N  );
/*
         if(count($data) > 0 ){
                echo "hai";
         }else{
                echo "Nhi hai";
        }*/

/*

        $query = new WP_Query($args);
            


            print_r($query->have_posts());
        die('ssdssdf');
*/

    if (count($data) > 0 ) {
          $result = 0;
           $msg    = 'This ID Already Registered';
           $myarray = array("status"=>"302","result"=>"exist", "message"=> $msg );
           echo json_encode($myarray);
    }else{
           $result = 0;
           $msg    = '';
           $myarray = array("status"=>"200","result"=>"success", "message"=> $msg );
           echo json_encode($myarray);
    }
    exit;
}

add_action('wp_ajax_check_smartTag_id', 'ValidSmartIDTag');
add_action('wp_ajax_nopriv_check_smartTag_id','ValidSmartIDTag');
function ValidSmartIDTag(){
    
    $smarttagid = $_POST['SmartTagid'];
    
    $args=array(
        'post_type' => 'pet_profile',
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'meta_query'=>array(
            'relation' => 'AND',
                array(
                    'key' => 'smarttag_id_number',
                    'value' => $smarttagid,
                ),
            )
        
    );
    $query = new WP_Query($args);
    if ($query->have_posts()) {

        $args=array(
        'post_type' => 'lost_found_pets',
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'meta_query'=>array(
           array('relation'=>'AND'),
           array(
                array(
                    'key' => 'smarttag_id_number',
                    'value' => $smarttagid,
                ),
                array(
                    'key' => 'pet_status',
                    'value' => '1',
                ),
              )
            )
        
        );
      
        $query = new WP_Query($args);
        if ($query->have_posts()) {
            while( $query->have_posts() ) : $query->the_post();
                $id = get_the_ID();
                $title = get_the_title($post->ID);
               echo json_encode(array('postId'=>$id,'postTitle'=>$title));//true     
            endwhile;
            }else{
                 echo json_encode(array('success'=>1,'message'=>'This Pet is not Lost', 'color'=>'green'));
            }
    }else{
        echo json_encode(array('success'=>1,'message'=>'SmartTag Id is not valid', 'color'=>'red'));//false
    }
    exit();
}

function checkSmartIDTag($value,$post_type,$key,$secondkKey = "",$secondValue = ""){
    
    $args=array(
        'post_type' => $post_type,
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'meta_query'=>array(
            'relation' => 'AND',
                array(
                    'key' => $key,
                    'value' => $value,
                ),
            )
        
    );

    if (!empty($secondkKey) && !empty($secondValue)) {
        $args=array(
            'post_type' => $post_type,
            'post_status' => 'publish',
            'posts_per_page' => -1,
            'meta_query'=>array(
                'relation' => 'AND',
                    array(
                        'key' => $key,
                        'value' => $value,
                    ),
                    array(
                        'key' => $secondkKey,
                        'value' => $secondValue,
                    ),
                )
            
        );
    }
    $query = new WP_Query($args);
    if ($query->have_posts()) {
        return false;
    }else{
        return true;
    }
}

function checkMicrochipID($value,$post_type,$key,$secondkKey = "",$secondValue = ""){
    $args=array(
        'post_type' => $post_type,
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'meta_query'=>array(
            'relation' => 'AND',
                array(
                    'key' => $key,
                    'value' => $value,
                ),
            )
        
    );
    if (!empty($secondkKey) && !empty($secondValue)) {
        $args=array(
            'post_type' => $post_type,
            'post_status' => 'publish',
            'posts_per_page' => -1,
            'meta_query'=>array(
                'relation' => 'AND',
                    array(
                        'key' => $key,
                        'value' => $value,
                    ),
                    array(
                        'key' => $secondkKey,
                        'value' => $secondValue,
                    ),
                )
            
        );
    }
    $query = new WP_Query($args);
    if ($query->have_posts()) {
        return false;
    }else{
        return true;
    }
}

/**
 * Load jQuery datepicker.
 *
 * By using the correct hook you don't need to check `is_admin()` first.
 * If jQuery hasn't already been loaded it will be when we request the
 * datepicker script.
 */
function wpse_enqueue_datepicker() {
    // Load the datepicker script (pre-registered in WordPress).
    wp_enqueue_script( 'jquery-ui-datepicker' );
    wp_register_style( 'jquery-ui', 'https://code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css' );
    wp_enqueue_style( 'jquery-ui' );  
}
add_action( 'wp_enqueue_scripts', 'wpse_enqueue_datepicker' );


add_filter( 'gform_confirmation', 'custom_gform_confirmation', 10, 4 );
function custom_gform_confirmation( $confirmation, $form, $lead, $ajax ){
    if ( 'Edit a Post' == $form['title'] ){
        $confirmation = array( 'redirect' => get_permalink($lead['post_id']) );
    }

    return $confirmation;
}




/*This function for home slider*/
add_shortcode( 'home_slider_new', 'display_home_slider' );
function display_home_slider(){
    $args = array( 'post_type' => 'home_slider_new');
    $loop = new WP_Query( $args );
    $result = '';
    $result = '<div class="banner-slides"><ul id="banner-slider" class="banner-slider">';
    $i = 0;
    // while ( $loop->have_posts() : $loop->the_post()){
    //     echo $i++;
    // }
    $posts = get_posts([
          'post_type' => 'home_slider_new',
          'post_status' => 'publish',
          'numberposts' => -1
          // 'order'    => 'ASC'
        ]);
    ?>
    <script type="text/javascript">
    $(function() {

     
        
        <?php foreach ($posts as $key => $value) { ?>
              var  MicId = $('.microchip_id').val();
          
                    $('.microchip_id').blur(function () {
                             var MicId_count =  $('.microchip_id').val().length;
                           
                             if(MicId_count  == 10){
                              console.log('10');
                                $('select[name=register_type] option:eq(3)').prop("disabled", false);
                               $('select[name=register_type] option:eq(3)').attr('selected', 'selected');
                                $('select[name=register_type] option:eq(1)').prop("disabled", true);
                                $('select[name=register_type] option:eq(2)').prop("disabled", true);
                                
                           }else if(MicId_count == 15){
                            console.log('15');
                                   $('select[name=register_type] option:eq(1)').prop("disabled", false);
    
                                $('select[name=register_type] option:eq(1)').attr('selected', 'selected');
                                 $('select[name=register_type] option:eq(2)').prop("disabled", true);
                                 $('select[name=register_type] option:eq(3)').prop("disabled", true);

                                
                               
                           }else if(MicId_count == 8){
                            console.log('8');
                             $('select[name=register_type] option:eq(2)').prop("disabled", false);
                                 $('select[name=register_type] option:eq(2)').attr('selected', 'selected');
                                 $('select[name=register_type] option:eq(1)').prop("disabled", true);
                                 $('select[name=register_type] option:eq(3)').prop("disabled", true);
                             
                         }else if(MicId_count > 17){
                            alert('Allow only 15 digit ');
                            exit();
                         }
                });

            $("form[name='ReMicro<?= $key;?>']").validate({
                     rules: {
                            microchip_id: {
                                    required: true,
                                    },
                            con_microchip_id: {
                                    required: true,
                                    equalTo : "#MicId<?= $key;?>"
                                    },
                            register_type: {
                                    required: true
                                    }
                            },
                        submitHandler: function(form) {
                        var Mid = new FormData();
                        var  MicId = $('#MicId<?= $key;?>').val();
                        var  ConMicId = $('#CmicId<?= $key;?>').val();
                        var  regityType = $('#regityType<?= $key;?>').val();
                        var MicId_count =  $('#MicId<?= $key;?>').val().length;





                        if(MicId_count  ==  '10'){
                            window.location.href = "/our-services/"+regityType+"/?id="+MicId; 
                        }else if(MicId_count >='15'){
                            window.location.href = "/our-services/"+regityType+"/?id="+MicId; 
                        }else{
                            window.location.href = "/our-services/"+regityType+"/?id="+MicId; 
                        }


                        if( MicId === ConMicId && MicId !=""){
                                console.log('testing');
                            //window.location.href = "/"+regityType+"/?id="+MicId;
                            }else{
                                $('#conf').fadeIn();
                            }
                        }   
                    });
        <?php } ?>
    });
    </script>
    <?php 
    while ( $loop->have_posts() ) : $loop->the_post();
    ?>
    <?php 
        $thumb = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_id()), 'full' );

       // print_r($thumb);


        $mypod = pods( 'home_slider_new', get_the_id() );
    ?> 
    <?php

    $result .= "<li style='background-position: right center;'>";
    $result .=  "<img src='$thumb[0]' alt='' >";
     $result .="<div class='container'>
      <div class='slider-faderIn'  style='display:none;'><div class='slide-content'><h3>";
   /* $result .= get_the_title();*/
    $result .= '</h3><div class="slide-content-list">';
    $result .= get_the_content();
    $result .= '</div><div class="slide-st-btn"><a href="';
    $result .= $mypod->display('home_slider_button_link');
    $result .= '">';
    $result .= $mypod->display('home_slide_button');
    $result .= '</a></div></div><section class="content-section register-microchip-section">
    <div class="container">
        <div class="section-content">
            <h2 class="section-title">Register Any Brand Microchip or SmartTag ID Tag:</h2>         
            <form class="rm-form" name="ReMicro'.$i.'">
                <div class="rm-fields">
                    <div class="rm-fields-inner">
                        <input type="text" id="MicId'.$i.'" class="microchip_id break_number" name="microchip_id" placeholder="*Enter ID Number" value="">
                        <span class="error" id="conf" style="display:none">Please Confirm Id</span>
                    </div>

                    <div class="rm-fields-inner"><input type="text" class="con_microchip_id break_number" id="CmicId'.$i.'" name="con_microchip_id" placeholder="*Confirm ID Number" value=""></div>

                    <div class="rm-fields-inner">
                        <select class="slide-select register_type" id="regityType'.$i.'" name="register_type">
                            <option value="">*Select</option>
                            <option value="microchip-registry">Register a SmartTag Microchip</option>
                            <option value="smarttag-registry">Register a SmartTag ID Tag</option>
                            <option value="universal-microchip-register-new">Register a non-SmartTag Microchip</option>
                        </select>
                        <span class="error" id="type" style="display:none">type</span>
                    </div>

                </div>              
                <div class="rm-submit">
                    <button type="submit">Register Your Microchip or SmartTag® <i class="fa fa-caret-right"></i></button>
                </div>
            </form>
        </div>
    </div>
</section></div></div></li>';
$i++;
    endwhile;
    $result .= '</ul></div>';

    return $result;
}

/*This function for blog slider*/

add_shortcode( 'blog_posts', 'display_blog_posts' );
function display_blog_posts(){
    $args = array( 'post_type' => 'post', 'posts_per_page' => 2, 'orderby' => 'date', 'order' => 'DESC', 'tax_query'=>array(
          'relation' => 'AND',array('taxonomy' => 'category','field' => 'id','terms' => 94,),));
    $loop = new WP_Query( $args );
    $result = '';
    $result = '<div class="blog-slides"><ul id="blog-slider" class="blog-slider">';
    while ( $loop->have_posts() ) : $loop->the_post();
        $img = get_the_post_thumbnail_url();
        $result .= "<li><div class='blog-slide-content'><a href='";
        $result .= get_permalink();
        $result .= "'><div class='blog-slide-img'>";
        $result .= "<img  src='$img' class='attachment-post-thumbnail size-post-thumbnail wp-post-image' alt=''>";
        $result .= "</div><div class='blog-slide-text'><h3>";
        $result .= get_the_title();
        $result .= '</h3><p class="blog-slide-date">';
        $result .= get_the_date( 'm-d-Y' );
        $result .= '</p></div></div></li>';
    endwhile;
    $result .= '</ul></div>';

    return $result;
}
add_action('wp_ajax_Multicustomer', 'Create_Multiple_Customers');
add_action('wp_ajax_nopriv_Multicustomer', 'Create_Multiple_Customers');
 
 function Create_Multiple_Customers() {

    print_r($_POST['users_info']);
die();


    if (isset($_POST['users_info'][0])) {
        foreach ($_POST['users_info'] as $key => $user) {
            $userId = 0;
            $phone = phone_exists($user['primary_home_number']);
            if (!email_exists($user['p_email']) && !empty($user['p_email']) && !empty($user['primary_home_number']) && $phone['success'] == 0) {
                $user_fields = array(
                    'user_login'    => $user['p_email'],
                    'role'          => 'customer',
                    'user_email'    => $user['p_email'],
                    'first_name'    => $user['first_name'],
                    'last_name'     => $user['last_name'],
                    'display_name'  => $user['first_name'],
                );
            }else{
               $singleUser = get_user_by( 'email', $user['p_email'] );
               $userId = $singleUser->ID;
            }

            $petIdArr = array();

            foreach ($_POST['pets_info'][$key] as $petKey => $pet) {

                $allowed    =  array('gif','png' ,'jpg', 'jpeg');
               // $petId      = createPetProfileForPetProForms($pet);

                array_push($petIdArr,$petId);

                if ($petId) {                        
                    if (isset($_FILES['profile_images']['name'][$key][$petKey])) {
                        $imageName      = $_FILES['profile_images']['name'][$key][$petKey];
                        $imageTempName  = $_FILES['profile_images']['tmp_name'][$key][$petKey];
                        $imageSize      = $_FILES['profile_images']['size'][$key][$petKey];
                        $error          = $_FILES['profile_images']['error'][$key][$petKey];
                        $ext            = pathinfo($imageName, PATHINFO_EXTENSION);

                        if(in_array($ext,$allowed) && $error == 0 && $imageSize < 2000000) {

                            uploadePetImageForPetProForms($imageName,$imageTempName,$petId);
                        }
                    }
                }
            }

            if (!empty($petIdArr)) {
                if (!$userId) {
                    $userId = wp_insert_user($user_fields);
                }

                update_user_meta($userId,'created_by',get_current_user_id());
                update_user_meta( $userId, 'primary_country', $user['primary_country'] );
                update_user_meta( $userId, 'primary_address_line1', $user['primary_address_line1'] );
                update_user_meta( $userId, 'primary_address_line2', $user['primary_address_line2'] );
                update_user_meta( $userId, 'primary_city', $user['primary_city'] );
                update_user_meta( $userId, 'primary_state', $user['primary_state'] );
                update_user_meta( $userId, 'primary_postcode', $user['primary_postcode'] );
                update_user_meta( $userId, 'primary_home_number', $user['primary_home_number'] );
                update_user_meta( $userId, 'primary_phone_country_code', $user['primary_home_number_code'] );
                update_user_meta( $userId, 'primary_cell_number', $user['primary_cell_number'] );
                update_user_meta( $userId, 'primary_cell_country_code', $user['primary_cell_number_code'] );

                foreach ($petIdArr as $petId) {
                    $arg = array( 'ID' => $petId,'post_author' => $userId);
                    wp_update_post( $arg );
                }
            }
        }
    }    
    exit();
}



function uploadePetImageForPetProForms($name,$tempName,$post_id){

    $upload     = wp_upload_bits($name, null, file_get_contents($tempName));
    $filename   = $upload['file'];
    $wp_filetype = wp_check_filetype(basename( $filename ), null );

    $wp_upload_dir = wp_upload_dir();
    $attachment = array(
        'guid'              => $wp_upload_dir['url'] . '/' . basename( $filename ),
        'post_mime_type'    => $wp_filetype['type'],
        'post_title'        => preg_replace( '/\.[^.]+$/', '', basename( $filename ) ),
        'post_content'      => '',
        'post_status'       => 'inherit'
    );
    $attach_id = wp_insert_attachment( $attachment, $filename, $post_id );
    require_once(ABSPATH . 'wp-admin/includes/image.php');
    $attach_data = wp_generate_attachment_metadata( $attach_id, $filename );
    wp_update_attachment_metadata( $attach_id, $attach_data );
    set_post_thumbnail( $post_id, $attach_id ); 
}

function createPetProfileForPetProForms($pets){

    $title  = $pets['pet_name'];
    $serial = $pets['serialNumber'];
    $newPost = array(
        'post_title'  => $title,
        'post_status' => 'publish',        
        'post_type'   => 'pet_profile' ,       
    );

    if (preg_match('/^\d{8}$/', $serial)) {
        $smartTagId  = $serial;
        $microchipId = "";
    }elseif (preg_match('/^\d{15}$/', $serial)) {
        $microchipId = $serial;
        $smartTagId  = "";
    }else{
        return false;
    }

    $check = json_decode(checkSerialNumberExist2($serial),true);


    if (!$check['success']) {
        return false;
    }

    $postId = wp_insert_post($newPost);

    if ($postId) {

        update_post_meta($postId , 'smarttag_id_number', $smartTagId);
        update_post_meta($postId , 'microchip_id_number', $microchipId);
        update_post_meta($postId , 'pet_name', $pets['pet_name']);
        update_post_meta($postId , 'primary_breed', $pets['primary_breed']);
        update_post_meta($postId , 'gender', $pets['gender']);
        update_post_meta($postId , 'pet_type', $pets['PetTyp']);
        update_post_meta($postId , 'secondary_breed', $pets['secondary_breed']);
        update_post_meta($postId , 'primary_color', $pets['primary_color']);
        update_post_meta($postId , 'secondary_color', $pets['secondary_color']);
        update_post_meta($postId , 'size', $pets['Size']);
        update_post_meta($postId , 'pet_date_of_birth', $pets['pet_date_of_birth']);

        return $postId; 
    }   
}

function CreatePetProfile($pets){

    
    // print_r($_FILES["files"]["size"][0]);die;
    $title = $pets['pet_name'];
    $newPost = array(
            'post_title'  => $title,
            'post_status' => 'publish',        
            'post_type'   => 'pet_profile' ,       
          );
        $postId = wp_insert_post($newPost);
        // echo $postId;die;
        update_post_meta($postId , 'smarttag_id_number', $pets['smartTag_id']);
        update_post_meta($postId , 'pet_name', $pets['pet_name']);
        update_post_meta($postId , 'primary_breed', $pets['primary_breed']);
        update_post_meta($postId , 'gender', $pets['gender']);
        update_post_meta($postId , 'pet_type', $pets['PetTyp']);
        update_post_meta($postId , 'secondary_breed', $pets['secondary_breed']);
        update_post_meta($postId , 'primary_color', $pets['primary_color']);
        update_post_meta($postId , 'secondary_color', $pets['secondary_color']);
        update_post_meta($postId , 'size', $pets['Size']);
        update_post_meta($postId , 'pet_date_of_birth', $pets['pet_date_of_birth']);
        
        $image = uploadImage($_FILES ,$postId);
        echo "image";
        
        return $postId;    
}
/*This function for register a new customer*/
 add_action('wp_ajax_new_register_user', 'handle_register_user');
 add_action('wp_ajax_nopriv_new_register_user', 'handle_register_user');

 function handle_register_user() {

    


    $newusername = $_POST['p_email'];
    $newemail    = $_POST['p_email'];
    $newpassword = $_POST['password'];
    $secemail = $_POST['s_email'];

    if(!is_user_logged_in() && !email_exists($newemail)){
        $user_id = wp_create_user( $newusername, $newpassword, $newemail);
        if ( is_wp_error( $user_id ) ){

            echo json_encode(array("success"=>1,"message"=>'<div class="alert alert-danger alert-dismissible" style="margin-top:18px;"><strong>Error! </strong>'.$user_id->get_error_message().'</div>'));
            exit();
            // return $user_id->get_error_message();         
        }else{
            $creds = array(
            'user_login'    => $newemail,
            'user_password' => $newpassword,
            );
            $loginuser = wp_signon($creds);
            
            updateUserFields($user_id,$_POST);  
            echo json_encode(array("success"=>1,"message"=>'<div class="alert alert-success alert-dismissible" style="margin-top:18px;"><strong>Success! </strong>User has been created</div>',"usrId"=> $user_id));
        exit();
        }
    }else if(email_exists($newemail) && !is_user_logged_in()){
        echo json_encode(array("success"=>1,"message"=>'<div class="alert alert-danger alert-dismissible" style="margin-top:18px;"><strong>Error! </strong>Email already exists</div>'));
    exit();
    }else{
        $user_id = get_current_user_id(); 
    }
        updateUserFields($user_id,$_POST);
        
        echo json_encode(array("success"=>1,"message"=>'<div class="alert alert-success alert-dismissible" style="margin-top:18px;"><strong>Success! </strong>User Updated</div>',"usrId"=> $user_id));
        exit();
    
  }

  function updateUserFields($user_id,$post){
    
    $user_meta = array(

                'first_name'               => $post['p_fst_name'],
                'last_name'                => $post['p_lst_name'],                         
                'primary_country'          => $post['p_country'],
                'primary_address_line1'    => $post['p_add1'],
                'primary_address_line2'    => $post['p_add2'],
                'primary_city'             => $post['p_city'],
                'primary_state'            => $post['p_state'],
                'primary_postcode'         => $post['p_zipcode'],
                'primary_home_number'      => $post['p_prm_no'],
                'primary_cell_number'      => $post['p_sec_no'],
                'primary_phone_country_code' => $post['p_prm_no_code'],
                'primary_cell_country_code' => $post['p_sec_no_code'],

                'secondary_first_name'    => $post['s_fst_name'],
                'secondary_last_name'     => $post['s_lst_name'],  
                'secondary_email'         => $post['s_email'],  
                'secondary_country'       => $post['s_country'],
                'secondary_address_line1' => $post['s_add1'],
                'secondary_address_line2' => $post['s_add2'],
                'secondary_city'          => $post['s_city'],
                'secondary_state'         => $post['s_state'],
                'secondary_postcode'      => $post['s_zipcode'],
                'secondary_home_number'   => $post['s_prm_no'],
                'secondary_cell_number'   => $post['s_sec_no'],
                'secondary_phone_country_code' => $post['s_prm_no_code'],
                'secondary_cell_country_code' => $post['s_sec_no_code'],
                'source_system'           => 'SMARTTAG',
                'checkbox_under_userInfo' => $post['checkbox_under_userInfo'],
               );             
                foreach ($user_meta as $key => $value) {
                    update_user_meta($user_id, $key, trim($value));
                }
                     return true;
  }

  function upload_user_file( $file = array() ) { 
    require_once( ABSPATH . 'wp-admin/includes/admin.php' );
    $file_return = wp_handle_upload( $file, array('test_form' => false ) );
    if( isset( $file_return['error'] ) || isset( $file_return['upload_error_handler'] ) ) {
        return false;
    } else {
        $filename = $file_return['file'];
        $attachment = array(
            'post_mime_type' => $file_return['type'],
            'post_title' => preg_replace( '/\.[^.]+$/', '', basename( $filename ) ),
            'post_content' => '',
            'post_status' => 'inherit',
            'guid' => $file_return['url']
        );
        $attachment_id = wp_insert_attachment( $attachment, $file_return['url'] );
        require_once(ABSPATH . 'wp-admin/includes/image.php');
        $attachment_data = wp_generate_attachment_metadata( $attachment_id, $filename );
        wp_update_attachment_metadata( $attachment_id, $attachment_data );
        if( 0 < intval( $attachment_id ) ) {
          return $attachment_id;
        }
    }
    return false;
}




    add_action('wp_ajax_multiCustomerPetPro', 'createMultiCustomerPetPro');
    add_action('wp_ajax_nopriv_multiCustomerPetPro', 'createMultiCustomerPetPro');


    /*Multiple Pet owner with multiple pet register*/ 


function createMultiCustomerPetPro(){

    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);

    if (isset($_POST['users_info'])) {
        foreach ($_POST['users_info'] as $userKey => $userInfo) {
            $firstName = $userInfo['p_fst_name'];
            $lastName  = $userInfo['p_lst_name'];
            $email     = $userInfo['p_email'];

                $newusername = $userInfo['p_email'];
                $newemail    = $userInfo['p_email'];
                $newpassword = $userInfo['password'];

                 if(is_user_logged_in() && !email_exists($newemail)){
                    $user_id = wp_create_user( $newusername, $newpassword, $newemail);
                     echo json_encode(array("success"=>1,"message"=>'<div class="alert alert-success alert-dismissible" style="margin-top:18px;"><strong>Success! </strong>User has been created</div>',"usrId"=> $user_id));
                   
                }else if(email_exists($newemail) && is_user_logged_in()){
                    $user = get_user_by( 'email', $newemail );
                     $user_id = $user->ID;

                    echo json_encode(array("success"=>1,"message"=>'<div class="alert alert-danger alert-dismissible" style="margin-top:18px;"><strong>Error! </strong>Email already exists</div>'));
             
                }

                    $first_name                 = $userInfo['p_fst_name'];
                    $last_name                  = $userInfo['p_lst_name'];
                    $primary_country            = $userInfo['p_country'];
                    $primary_address_line1      = $userInfo['p_add1'];
                    $primary_address_line2      = $userInfo['p_add2'];
                    $primary_city               = $userInfo['p_city'];
                    $primary_state              = $userInfo['p_state'];
                    $primary_postcode           = $userInfo['p_zipcode'];
                    $primary_home_number        = $userInfo['p_prm_no'];
                    $primary_cell_number        = $userInfo['p_sec_no'];
                    $primary_phone_country_code = $userInfo['p_prm_no_code'];
                    $primary_cell_country_code  = $userInfo['p_sec_no_code'];

                  update_user_meta($user_id, 'first_name', $first_name);
                  update_user_meta($user_id, 'last_name', $last_name);
                  update_user_meta($user_id, 'primary_country', $primary_country);
                  update_user_meta($user_id, 'primary_address_line1', $primary_address_line1);
                  update_user_meta($user_id, 'primary_address_line2', $primary_address_line2);
                  update_user_meta($user_id, 'primary_city', $primary_city);
                  update_user_meta($user_id,  'primary_state' , $primary_state);
                  update_user_meta($user_id, 'primary_postcode', $primary_postcode);
                  update_user_meta($user_id, 'primary_home_number',$primary_home_number);
                  update_user_meta($user_id, 'primary_cell_number', $primary_cell_number);
                  update_user_meta($user_id, 'primary_phone_country_code', $primary_phone_country_code);
                  update_user_meta($user_id, 'primary_cell_country_code', $primary_cell_country_code);

            foreach ($_POST['pets_info'][$userKey] as $petKey => $petInfo) {

                $information = array();
                $info        = array();
                $petName     = $petInfo['pet_name'];
                $petImage     = $petInfo['files'];

                $title   = $petInfo['pet_name'];
                    $newPost = array(
                    'post_title'  => $title,
                    'post_status' => 'publish',        
                    'post_type'   => 'pet_profile', 
                     'post_author'   =>  $user_id,      
                  );
                  
                $postId = wp_insert_post($newPost);

                $primary_home_number = get_user_meta( $user_id, 'primary_home_number', true ); 
                update_post_meta($postId , 'primary_home_number', $primary_home_number);
                update_post_meta($postId , 'pet_name', $petInfo['pet_name']);
                update_post_meta($postId , 'primary_breed', $petInfo['primary_breed']);
                update_post_meta($postId , 'gender', $petInfo['gender']);
                update_post_meta($postId , 'secondary_breed', $petInfo['secondary_breed']);
                update_post_meta($postId , 'primary_color', $petInfo['primary_color']);
                update_post_meta($postId , 'secondary_color', $petInfo['secondary_color']);
                update_post_meta($postId , 'size', $petInfo['size']);
                update_post_meta($postId , 'pet_date_of_birth', $petInfo['pet_date_of_birth']);
                update_post_meta($postId, 'source_system', 'SMARTTAG');

                update_post_meta($postId, 'microchip_id_number', $petInfo['microchip_id']);
                update_post_meta($postId,'pet_type', $petInfo['pet_type']);

                $allowed    =  array('gif','png' ,'jpg', 'jpeg');
                $petIdArr = array();

                array_push($petIdArr,$postId);

                if ($postId) {                        
                    if (isset($_FILES['profile_images']['name'][$userKey][$petKey])) {
                        $imageName      = $_FILES['profile_images']['name'][$userKey][$petKey];

                        $imageTempName  = $_FILES['profile_images']['tmp_name'][$userKey][$petKey];
                        $imageSize      = $_FILES['profile_images']['size'][$userKey][$petKey];
                        $error          = $_FILES['profile_images']['error'][$userKey][$petKey];
                        $ext            = pathinfo($imageName, PATHINFO_EXTENSION);

                        if(in_array($ext,$allowed) && $error == 0 && $imageSize < 2000000) {

                            uploadePetImageForPetProForms($imageName,$imageTempName,$postId);
                        }
                    }
                }
            }
        }
    }
}


 /*Multiple Petprofile*/ 
add_action('wp_ajax_Create_mul_Pet_profile', 'Multiple_Pet_Profile');
add_action('wp_ajax_nopriv_Create_mul_Pet_profile', 'Multiple_Pet_Profile');
 // Allow 
function Multiple_Pet_Profile(){

    ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

    $j      = 0;
    
    while ($j < $p_fst_name) {    

    echo $j.'usre_Info';
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);
    $newusername = $_POST['p_email'][$j];
    $newemail    = $_POST['p_email'][$j];
    $newpassword = $_POST['password'][$j];

     if(is_user_logged_in() && !email_exists($newemail)){
    $user_id = wp_create_user( $newusername, $newpassword, $newemail);
         
            echo json_encode(array("success"=>1,"message"=>'<div class="alert alert-success alert-dismissible" style="margin-top:18px;"><strong>Success! </strong>User has been created</div>',"usrId"=> $user_id));
       
    }else if(email_exists($newemail) && is_user_logged_in()){
        $user = get_user_by( 'email', $newemail );
     $user_id = $user->ID;

        echo json_encode(array("success"=>1,"message"=>'<div class="alert alert-danger alert-dismissible" style="margin-top:18px;"><strong>Error! </strong>Email already exists</div>'));
 
      }

             $first_name                 = $_POST['p_fst_name'][$j];
            $last_name                  = $_POST['p_lst_name'][$j];                       
            $primary_country            = $_POST['p_country'][$j];
            $primary_address_line1      = $_POST['p_add1'][$j];
            $primary_address_line2      = $_POST['p_add2'][$j];
            $primary_city               = $_POST['p_city'][$j];
            $primary_state              = $_POST['p_state'][$j];
            $primary_postcode           = $_POST['p_zipcode'][$j];
            $primary_home_number        = $_POST['p_prm_no'][$j];
            $primary_cell_number        = $_POST['p_sec_no'][$j];
            $primary_phone_country_code = $_POST['p_prm_no_code'][$j];
            $primary_cell_country_code  = $_POST['p_sec_no_code'][$j];

     update_user_meta($user_id, 'first_name', $first_name);
     update_user_meta($user_id, 'last_name', $last_name);
     update_user_meta($user_id, 'primary_country', $primary_country);
     update_user_meta($user_id, 'primary_address_line1', $primary_address_line1);
     update_user_meta($user_id, 'primary_address_line2', $primary_address_line2);
     update_user_meta($user_id, 'primary_city', $primary_city);
     update_user_meta($user_id,  'primary_state' , $primary_state);
     update_user_meta($user_id, 'primary_postcode', $primary_postcode);
     update_user_meta($user_id, 'primary_home_number',$primary_home_number);
     update_user_meta($user_id, 'primary_cell_number', $primary_cell_number);
     update_user_meta($user_id, 'primary_phone_country_code', $primary_phone_country_code);
     update_user_meta($user_id, 'primary_cell_country_code', $primary_cell_country_code);

     




    $size   = count ($_POST['pet_name']);
    $i      = 0;
        while ($i < $size) {

            echo $i.'pet';

      
            $title   = $_POST['pet_name'][$i];
            $newPost = array(
                'post_title'  => $title,
                'post_status' => 'publish',        
                'post_type'   => 'pet_profile', 
                 'post_author'   =>  $user_id,      
              );
            $postId = wp_insert_post($newPost);


            update_post_meta($postId , 'pet_name', $_POST['pet_name'][$i]);
            update_post_meta($postId , 'primary_breed', $_POST['primary_breed'][$i]);
            update_post_meta($postId , 'gender', $_POST['gender'][$i]);
            update_post_meta($postId , 'secondary_breed', $_POST['secondary_breed'][$i]);
            update_post_meta($postId , 'primary_color', $_POST['primary_color'][$i]);
            update_post_meta($postId , 'secondary_color', $_POST['secondary_color'][$i]);
            update_post_meta($postId , 'size', $_POST['Size'][$i]);
            update_post_meta($postId , 'pet_date_of_birth', $_POST['pet_date_of_birth'][$i]);
            update_post_meta($postId, 'source_system', 'SMARTTAG');

            update_post_meta($postId, 'microchip_id_number', $_POST['microchip_id'][$i]);
            update_post_meta($postId,'pet_type', $_POST['pet_type'][$i]);

           

            if ($_FILES["files"]['error'][$i] > 0) {
                // $msg = 'File name cannot be empty';
                 $msg =  json_encode(array("success"=>0,"message"=>'<div class="alert alert-success alert-dismissible" style="margin-top:18px;"><strong>Fail!</strong><li>File name cannot be empty"</li></div>'));

            }elseif ($_FILES["files"]['size'][$i] > 2000000) {
                $msg =  json_encode(array("success"=>0,"message"=>'<div class="alert alert-success alert-dismissible" style="margin-top:18px;"><strong>Fail!</strong><li>Please only select images less than 2MB in size"</li></div>'));

                // $msg = 'Please only select images less than 2MB in size';
            }else{
               $upload = wp_upload_bits($_FILES["files"]["name"][$i], null, file_get_contents($_FILES["files"]["tmp_name"][$i]));
            
                $filename = $upload['file'];
                $wp_filetype = wp_check_filetype(basename( $filename ), null );
                if (strtolower($wp_filetype['ext']) == 'png' || strtolower($wp_filetype['ext']) == 'jpg' || strtolower($wp_filetype['ext']) == 'jpeg') {
                    $wp_upload_dir = wp_upload_dir();
                    $attachment = array(
                        'guid'              => $wp_upload_dir['url'] . '/' . basename( $filename ),
                        'post_mime_type'    => $wp_filetype['type'],
                        'post_title'        => preg_replace( '/\.[^.]+$/', '', basename( $filename ) ),
                        'post_content'      => '',
                        'post_status'       => 'inherit'
                    );
                    $attach_id = wp_insert_attachment( $attachment, $filename, $postId );
                    require_once(ABSPATH . 'wp-admin/includes/image.php');
                    $attach_data = wp_generate_attachment_metadata( $attach_id, $filename );
                    wp_update_attachment_metadata( $attach_id, $attach_data );
                    set_post_thumbnail( $postId, $attach_id ); 
                    
                    
                    $msg =  json_encode(array("success"=>1,"message"=>'<div class="alert alert-success alert-dismissible" style="margin-top:18px;"><strong>Success!</strong><li>Update Profile Successfully"</li></div>'));
                
            //$msg = "Update Profile Successfully";
                }else{
                     $msg =  json_encode(array("success"=>0,"message"=>'<div class="alert alert-success alert-dismissible" style="margin-top:18px;"><strong>Fail!</strong><li>Please upload only jpg, jpeg and png Type Image."</li></div>'));

                }
            
            }
        $i++;
        echo $msg;
    }
  

 $j++;
        echo $msg;
}
    
}




add_action('wp_ajax_Create_Multiple_Pet_profile', 'Create_Multiple_Pet_profile');
add_action('wp_ajax_nopriv_Create_Multiple_Pet_profile', 'Create_Multiple_Pet_profile');


function Create_Multiple_Pet_profile(){
    
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    $tempData = str_replace("\\", "",$_POST['profile_data']);
    $cleanData = json_decode($tempData);
    foreach ($cleanData as $key => $value) {

        

           if(empty($_POST['post_id'])){
               $title   = $value->pet_name;
               $user_id = $_POST['userId'];
               $user_info = get_userdata($user_id);
                

               // Add the content of the form to $post as an array

               $new_post = array(
                   'post_title'    => $title,
                   'post_status'   => 'publish',           // Choose: publish, 
                   'post_type'     => 'pet_profile',
                   'post_author'   =>  $user_id,
               );

               if (isset($_POST['universal_microchip_id']) && !empty($_POST['universal_microchip_id'])) {
                   $new_post = array(
                       'post_title'    => $title,
                       'post_status'   => 'pending',           // Choose: publish, 
                       'post_type'     => 'pet_profile',
                       'post_author'   =>  $user_id, 
                   );
               }
               
            

             $postid = wp_insert_post($new_post, true);

           
               if($value->microchip_id){
                       $id = $value->microchip_id;
                       
                       $serialNumberExist = checkSerialNumberFromDatabase($id);

                       if($serialNumberExist == 0){
                            add_post_meta( $postid, 'michrochip_status', 'Unassigned Microchip', true );
                       }else{
                           update_post_meta($postid, 'michrochip_status', 'Assigned Microchip');
                       }
                   }



               /*$serialNumberExist = checkSerialNumberFromDatabase($id);

               if($serialNumberExist == 0){
                    add_post_meta( $postid, 'michrochip_status', 'Unassigned Microchip', true );
               }else{
                   update_post_meta($postid, 'michrochip_status', 'Assigned Microchip');
               }*/
               $first_name = get_user_meta($user_id, 'first_name',true );
               $last_name = get_user_meta($user_id, 'last_name',true );
               $owner_name = $first_name." ".$last_name;
              


        update_post_meta($postId , 'pet_name', $value->pet_name);
        update_post_meta($postId , 'primary_breed', $value->primary_breed);
        update_post_meta($postId , 'gender', $value->gender);
        update_post_meta($postId , 'secondary_breed', $value->secondary_breed);
        update_post_meta($postId , 'primary_color', $value->primary_color);
        update_post_meta($postId , 'secondary_color', $value->secondary_color);
        update_post_meta($postId , 'Size', $value->size);
        update_post_meta($postId , 'pet_date_of_birth', $value->pet_date_of_birth);
        update_post_meta($post_id, 'source_system', 'SMARTTAG');






               $pet_name =  get_post_meta( $postid, 'pet_name' ,true ); 
               $pet_date_of_birth =  get_post_meta( $postid, 'pet_date_of_birth' ,true ); 
               $color = get_post_meta( $postid, 'primary_color' ,true ); 


         if($color ==1 ){
            $pet_color = 'Black';
         }elseif($color ==2){
          $pet_color = 'Blue';}elseif($color ==3){$pet_color = 'Brown';}elseif($color ==4){$pet_color = 'Gold';}elseif($color ==5){$pet_color = 'Gray';}elseif($color ==6){$pet_color = 'Orange';}elseif($color ==7){$pet_color='Red';}elseif($color ==8){$pet_color = 'Sliver';}elseif($color ==9){$pet_color = 'Tan';}elseif($color ==10){$pet_color = 'White';}elseif($color ==11){$pet_color = 'Yellow';}

                  



            /*  foreach ($_POST as $key => $value) {
                   if ($key == "microchip_id") {
                       $key = "microchip_id_number";
                   }*/
                   update_post_meta($postid,'microchip_id_number',$value->microchip_id);
                   update_post_meta($postid,'pet_type',$value->pet_type);
              // }*
               
                $parent_post_id = $postid;  // The parent ID of our attachments
               $valid_formats = array("jpg", "png", "gif", "bmp", "jpeg"); // Supported file types
               $max_file_size =  2*1000000; // in kb
               $max_image_upload = 10; // Define how many images can be uploaded to the current post
               $wp_upload_dir = wp_upload_dir();
               $path = $wp_upload_dir['path'] . '/';
               $count = 0;

               $attachments = get_posts( array(
                   'post_type'         => 'attachment',
                   'posts_per_page'    => -1,
                   'post_parent'       => $parent_post_id,
                   'exclude'           => get_post_thumbnail_id() // Exclude post thumbnail to the attachment count
               ) );

           // Image upload handler
           if( $_SERVER['REQUEST_METHOD'] == "POST" ){

                   

               if(isset($_FILES['files']['name'])){
               // Check if user is trying to upload more than the allowed number of images for the current post
               if( ( count( $attachments ) + count( $_FILES['files']['name'] ) ) > $max_image_upload ) {
                   $upload_message[] = "Sorry you can only upload " . $max_image_upload . " images for each Ad";
               } else {
                   
                   foreach ( $_FILES['files']['name'] as $f => $name ) {
                       $extension = pathinfo( $name, PATHINFO_EXTENSION );
                       // Generate a randon code for each file name
                       $new_filename = cvf_td_generate_random_code( 20 )  . '.' . $extension;
                       
                       if ( $_FILES['files']['error'][$f] == 4 ) {
                           continue; 
                       }
                       
                       if ( $_FILES['files']['error'][$f] == 0 ) {
                           // Check if image size is larger than the allowed file size
                           if ( $_FILES['files']['size'][$f] > $max_file_size ) {
                               $upload_message[] = "$name is too large!.";
                               continue;
                           
                           // Check if the file being uploaded is in the allowed file types
                           } 
                           elseif( ! in_array( strtolower( $extension ), $valid_formats ) ){
                               $upload_message[] = "$name is not a valid format";
                               continue; 
                           
                           } else{ 
                               // If no errors, upload the file...
                               if( move_uploaded_file( $_FILES["files"]["tmp_name"][$f], $path.$new_filename ) ) {
                                   
                                   $count++; 

                                   $filename = $path.$new_filename;
                                   $filetype = wp_check_filetype( basename( $filename ), null );
                                   $wp_upload_dir = wp_upload_dir();
                                   $attachment = array(
                                       'guid'           => $wp_upload_dir['url'] . '/' . basename( $filename ), 
                                       'post_mime_type' => $filetype['type'],
                                       'post_title'     => preg_replace( '/\.[^.]+$/', '', basename( $filename ) ),
                                       'post_content'   => '',
                                       'post_status'    => 'inherit'
                                   );
                                   // Insert attachment to the database
                                  
                                   require_once( ABSPATH . 'wp-admin/includes/image.php' );
                                   
                                   // Generate meta data
                                   $attach_data = wp_generate_attachment_metadata( $attach_id, $filename ); 
                                   wp_update_attachment_metadata( $attach_id, $attach_data );
                                   $attach_id = wp_insert_attachment( $attachment, $filename, $parent_post_id );
                                    $all_images_id_array[] = $attach_id;

                               }

                           }
                       }
                   }
                   
               }
           }
           }
        }else{
            echo json_encode(array("success"=>0,"message"=>"Undefind Error","petId"=>0));
        } 
           }

           if ( isset( $upload_message ) ) :
               echo json_encode(array("success"=>0,"message"=>'<div class="alert alert-danger alert-dismissible" style="margin-top:18px;"><strong>Error!</strong> '.implode(',',$upload_message).'</div>'));
               exit();
           endif;
           
           // If no error, show success message
           if( $count != 0 ){ 
               set_post_thumbnail($postid, $all_images_id_array[0] ); 
               update_post_meta($postid,'pet_images',implode(',', $all_images_id_array));

           }

           if (isset($_POST['universal_microchip_id']) && !empty($_POST['universal_microchip_id'])) {
               echo json_encode(array("success"=>1,"message"=>'<div class="alert alert-success alert-dismissible" style="margin-top:18px;"><strong>Success!</strong> Pet Profile Successfully Added and currently it\'s in pending status, If you purchase universal microchip subscription plan then it\'s automatically update pending to publish.</div>',"petId"=>$postid));
               exit();
           }
           echo json_encode(array("success"=>1,"message"=>'<div class="alert alert-success alert-dismissible" style="margin-top:18px;"><strong>Success!</strong> Pet Profile Successfully Added</div>',"petId"=>$postid));
           

   die;

}

 /*This function for create a pet profile by a new customer*/
// Allow front-end submission 
add_action('wp_ajax_Create_Pet_profile', 'cvf_upload_files');
add_action('wp_ajax_nopriv_Create_Pet_profile', 'cvf_upload_files'); // Allow front-end submission 

function cvf_upload_files(){
    if(empty($_POST['post_id'])){
        $title   = $_POST['pet_name'];
        $user_id = $_POST['userId'];
        $user_info = get_userdata($user_id);
         
        // Add the content of the form to $post as an array
        if (isset($_POST['universal_microchip_id']) && !empty($_POST['universal_microchip_id'])) {
            $new_post = array(
                'post_title'    => $title,
                'post_status'   => 'pending', // Choose: pending, 
                'post_type'     => 'pet_profile',
                'post_author'   =>  $user_id, 
            );
        }else{
            $new_post = array(
                'post_title'    => $title,
                'post_status'   => 'publish',   // Choose: publish, 
                'post_type'     => 'pet_profile',
                'post_author'   =>  $user_id,
            );
        }
        
        $postid = wp_insert_post($new_post, true);

        if(isset($_POST['microchip_id'])){
            $id = $_POST['microchip_id'];
            $serialNumberExist = checkSerialNumberFromDatabase($id);

            if($serialNumberExist == 0){
                 add_post_meta( $postid, 'michrochip_status', 'Unassigned Microchip', true );
            }else{
                update_post_meta($postid, 'michrochip_status', 'Assigned Microchip');
            }
        }


        $first_name = get_user_meta($user_id, 'first_name',true );
        $last_name = get_user_meta($user_id, 'last_name',true );
        $primary_home_number = get_user_meta( $user_id, 'primary_home_number', true ); 
        $owner_name = $first_name." ".$last_name;
        
    
        update_post_meta($postid, 'owner_name', $owner_name);
        update_post_meta($postid, 'owner_email', $user_info->user_email);
        update_post_meta($postid, 'source_system', 'SMARTTAG');
        update_post_meta($postid, 'pet_owner', $user_id);
        update_post_meta($postid, 'primary_home_number', $primary_home_number);

        update_post_meta($postid, 'pet_name', $_POST['pet_name']);
        update_post_meta($postid, 'pet_type', $_POST['pet_type']);
        update_post_meta($postid, 'primary_breed', $_POST['primary_breed']);
        update_post_meta($postid, 'secondary_breed', $_POST['secondary_breed']);
        update_post_meta($postid, 'primary_breed', $_POST['primary_breed']);
        update_post_meta($postid, 'primary_breed', $_POST['primary_breed']);
        update_post_meta($postid, 'primary_color', $_POST['primary_color']);
        update_post_meta($postid, 'secondary_color', $_POST['secondary_color']);
        update_post_meta($postid, 'gender', $_POST['gender']);
        update_post_meta($postid, 'size', $_POST['size']);
        update_post_meta($postid, 'pet_date_of_birth', $_POST['pet_date_of_birth']);
        
        update_post_meta($postid, 'vaterinarian_first_name', $_POST['vaterinarian_first_name']);
        update_post_meta($postid, 'vaterinarian_last_name', $_POST['vaterinarian_last_name']);
        update_post_meta($postid, 'vaterinarian_email', $_POST['vaterinarian_email']);
        update_post_meta($postid, 'vaterinarian_address_line_1', $_POST['vaterinarian_address_line_1']);
        update_post_meta($postid, 'vaterinarian_address_line_2', $_POST['vaterinarian_address_line_2']);
        update_post_meta($postid, 'vaterinarian_city', $_POST['vaterinarian_city']);
        update_post_meta($postid, 'vaterinarian_state', $_POST['vaterinarian_state']);
        update_post_meta($postid, 'vaterinarian_zip_code', $_POST['vaterinarian_zip_code']);
        update_post_meta($postid, 'vaterinarian_primary_phone_number', $_POST['vaterinarian_primary_phone_number']);
        update_post_meta($postid, 'vaterinarian_primary_phone_number_code', $_POST['vaterinarian_primary_phone_number_code']);
        update_post_meta($postid, 'vaterinarian_secondary_phone_number', $_POST['vaterinarian_secondary_phone_number']);
        update_post_meta($postid, 'vaterinarian_secondary_phone_number_code', $_POST['vaterinarian_secondary_phone_number_code']);
       
        $microchip_id_number = preg_replace('/\s+/', '', $_POST['microchip_id']);
        update_post_meta($postid, 'microchip_id_number', $microchip_id_number);
    
        $pet_name =  get_post_meta( $postid, 'pet_name' ,true ); 
        $pet_date_of_birth =  get_post_meta( $postid, 'pet_date_of_birth' ,true ); 
        $color = get_post_meta( $postid, 'primary_color' ,true ); 
    
        
        $_SESSION['pet_name'] = $pet_name;
        $_SESSION['pa_color'] = $color;
        $_SESSION['pet_date_of_birth'] = $pet_date_of_birth;

        /*image upload as assign to the pet profile*/    
        $parent_post_id = $postid;  // The parent ID of our attachments
        $valid_formats = array("jpg", "png", "gif", "bmp", "jpeg"); // Supported file types
        $max_file_size =  2*1000000; // in kb
        $max_image_upload = 10; // Define how many images can be uploaded to the current post
        $wp_upload_dir = wp_upload_dir();
        $path = $wp_upload_dir['path'] . '/';
        $count = 0;

        $attachments = get_posts( array(
            'post_type'         => 'attachment',
            'posts_per_page'    => -1,
            'post_parent'       => $parent_post_id,
            'exclude'           => get_post_thumbnail_id() // Exclude post thumbnail to the attachment count
        ) );

        // Image upload handler
        if( $_SERVER['REQUEST_METHOD'] == "POST" ){
            if(isset($_FILES['files']['name'])){
            // Check if user is trying to upload more than the allowed number of images for the current post
                if( ( count( $attachments ) + count( $_FILES['files']['name'] ) ) > $max_image_upload ) {
                    $upload_message[] = "Sorry you can only upload " . $max_image_upload . " images for each Ad";
                } else {
                    
                    foreach ( $_FILES['files']['name'] as $f => $name ) {
                        $extension = pathinfo( $name, PATHINFO_EXTENSION );
                        // Generate a randon code for each file name
                        $new_filename = cvf_td_generate_random_code( 20 )  . '.' . $extension;
                        
                        if ( $_FILES['files']['error'][$f] == 4 ) {
                            continue; 
                        }
                        
                        if ( $_FILES['files']['error'][$f] == 0 ) {
                            // Check if image size is larger than the allowed file size
                            if ( $_FILES['files']['size'][$f] > $max_file_size ) {
                                $upload_message[] = "$name is too large!.";
                                continue;
                            
                            // Check if the file being uploaded is in the allowed file types
                            } 
                            elseif( ! in_array( strtolower( $extension ), $valid_formats ) ){
                                $upload_message[] = "$name is not a valid format";
                                continue; 
                            
                            } else{ 
                                // If no errors, upload the file...
                                if( move_uploaded_file( $_FILES["files"]["tmp_name"][$f], $path.$new_filename ) ) {
                                    
                                    $count++; 

                                    $filename = $path.$new_filename;
                                    $filetype = wp_check_filetype( basename( $filename ), null );
                                    $wp_upload_dir = wp_upload_dir();
                                    $attachment = array(
                                        'guid'           => $wp_upload_dir['url'] . '/' . basename( $filename ), 
                                        'post_mime_type' => $filetype['type'],
                                        'post_title'     => preg_replace( '/\.[^.]+$/', '', basename( $filename ) ),
                                        'post_content'   => '',
                                        'post_status'    => 'inherit'
                                    );
                                    // Insert attachment to the database
                                   
                                    require_once( ABSPATH . 'wp-admin/includes/image.php' );
                                    
                                    // Generate meta data
                                    $attach_data = wp_generate_attachment_metadata( $attach_id, $filename ); 
                                    wp_update_attachment_metadata( $attach_id, $attach_data );
                                    $attach_id = wp_insert_attachment( $attachment, $filename, $parent_post_id );
                                    $all_images_id_array[] = $attach_id;
                                }   
                            }
                        }
                    }
                }
            }
        }

        if ( isset( $upload_message ) ) :
            echo json_encode(array("success"=>0,"message"=>'<div class="alert alert-danger alert-dismissible" style="margin-top:18px;"><strong>Error!</strong> '.implode(',',$upload_message).'</div>'));
            exit();
        endif;
        
        // If no error, show success message
        if( $count != 0 ){ 
            set_post_thumbnail($postid, $all_images_id_array[0] ); 
            update_post_meta($postid,'pet_images',implode(',', $all_images_id_array));
        }

        if (isset($_POST['universal_microchip_id']) && !empty($_POST['universal_microchip_id'])) {
            echo json_encode(array("success"=>1,"message"=>'<div class="alert alert-success alert-dismissible" style="margin-top:18px;"><strong>Success!</strong> Pet Profile Successfully Added and currently it\'s in pending status, If you purchase universal microchip subscription plan then it\'s automatically update pending to publish.</div>',"petId"=>$postid));
            exit();
        }

        echo json_encode(array("success"=>1,"message"=>'<div class="alert alert-success alert-dismissible" style="margin-top:18px;"><strong>Success!</strong> Pet Profile Successfully Added</div>',"petId"=>$postid));
    }else{
        echo json_encode(array("success"=>0,"message"=>"Undefind Error","petId"=> 0));
    }    


    $serialNumberExist = checkSerialNumberFromDatabase($id);

    if($serialNumberExist == 0){
        $client_name = get_post_meta($postid, 'owner_name', true);
        $client_email = get_post_meta($postid, 'owner_email', true);
        $pet_name = get_post_meta($postid, 'pet_name', true);
        $microchip_id_number = get_post_meta($postid, 'microchip_id_number', true);
        $michrochip_status = get_post_meta($postid, 'michrochip_status', true);
        $to = get_option('admin_email');
        $subject = "Unassigned SmartTag Microchip";
        $heading = "Unassigned SmartTag Microchip";
        $message = "Hello Admin,"."\r\n\r\n";
        $message .= " An Unassigned SmartTag microchip has been registered. Please investigate to resolve the issue."."\r\n\r\n";
        $message .= " The User Info and MicroChip Info are Listed below:- "."\r\n\r\n";
        $message .= "<b>Owner Name:-</b> ".$client_name."\r\n\r\n";
        $message .= "<b>Owner Email:- </b>".$client_email."\r\n\r\n";
        $message .= "<b>Pet Name:- </b>".$pet_name."\r\n\r\n";
        $message .= "<b>MichroChip Id:- </b>".$microchip_id_number."\r\n\r\n";
        $message .= "<b>MichroChip Status:-</b> ".$michrochip_status."\r\n\r\n";
        //send_email_woocommerce_style($to , $subject , $heading , $message );
        //send_email_woocommerce_style('satish@vkaps.com' , $subject , $heading , $message );
    }
    exit();
}

// Random code generator used for file names.
function cvf_td_generate_random_code($length=10) {
 
   $string = '';
   $characters = "23456789ABCDEFHJKLMNPRTVWXYZabcdefghijklmnopqrstuvwxyz";
 
   for ($p = 0; $p < $length; $p++) {
       $string .= $characters[mt_rand(0, strlen($characters)-1)];
   }
 
   return $string;
 
}
// Short the string/content 

function shorter($text, $chars_limit){
    // Check if length is larger than the character limit
    if (strlen($text) > $chars_limit)
    {
        // If so, cut the string at the character limit
        $new_text = substr($text, 0, $chars_limit);
        // Trim off white space
        $new_text = trim($new_text);
        // Add at end of text ...
        return $new_text . "...";
    }
    // If not just return the text as is
    else
    {
    return $text;
    }
}

add_action('wp_ajax_add_id-tag_into_cart', 'wdm_add_user_custom_data_options_callback');
add_action('wp_ajax_nopriv_add_id-tag_into_cart', 'wdm_add_user_custom_data_options_callback');

function wdm_add_user_custom_data_options_callback(){

    global $woocommerce, $globalAluminumIdTag, $globalBrassIdTag;    
  //  unset($_POST['action']);
    $cart_item_data = array();
    if(isset($_POST['attribute_pa_color'])){
        $product_id = $globalAluminumIdTag; 
    }else{
        $product_id = $globalBrassIdTag;  
    }


    

    $product_variations = new WC_Product_Variable( $product_id );
    $product_children = $product_variations->get_children();
    $child_variations = array();
    
    foreach ($product_children as $child){
        $child_variations[] = $product_variations->get_available_variation($child);
    }
    foreach ($child_variations as $child_variation) {
        $check = 0;
        foreach ($child_variation['attributes'] as $key => $value) {
            // $cart_item_data[$key] = $_POST[$key];

            if ($_POST[$key] == $value) {
                $check = 1;
                $variation = $child_variation['variation_id'];
            }else{
                $check = 0;
                $variation = 0;
                break;
            }
        }
        if ($check) {
            break;
        }
    }


    $customproduct = $woocommerce->cart->add_to_cart( $product_id ,1, $variation,wc_get_product_variation_attributes( $variation )); 

    if(!empty($customproduct)){
        echo json_encode(array("success"=>1,"message"=>'<div class="alert alert-success alert-dismissible" style="margin-top:18px;"><strong>Success!</strong> Custom Product Added Into Cart</div>'));
        exit(); 
    }else{
        echo json_encode(array("Fail"=>0,"message"=>'<div class="alert alert-success alert-dismissible" style="margin-top:18px;"><strong>Success!</strong><li>"Error"</li></div>'));
    }
    exit();      
}

add_action('wp_ajax_custom_product_price', 'get_custom_product_price');
add_action('wp_ajax_nopriv_custom_product_price', 'get_custom_product_price');

function get_custom_product_price(){


    
      global $woocommerce, $globalAluminumIdTag, $globalBrassIdTag;    
    unset($_POST['action']);
    $cart_item_data = array();
    
    $attributes['attribute_pa_size'] =  $_POST['attribute_pa_size'];
    
    if(isset($_POST['attribute_pa_color'])){
        $product_id = $globalAluminumIdTag; 

        $attributes['attribute_pa_shape'] = $_POST['attribute_pa_shape'];
        $attributes['attribute_pa_color'] = $_POST['attribute_pa_color'];
    }else{
        $product_id = $globalBrassIdTag;  

        $attributes['attribute_pa_ttype'] = $_POST['attribute_pa_ttype'];
        $attributes['attribute_pa_style'] = $_POST['attribute_pa_style'];
    }

    $variationld = find_matching_product_variation_id($product_id, $attributes);
 
   
    
  $product = wc_get_product( $variationld );
    
    if($variationld){

       $product = wc_get_product( $variationld );
        $productPrice = $product->get_regular_price();

        if($productPrice){
            echo json_encode(array("success"=>1,"productPrice" => $productPrice));
        }else{
            echo json_encode(array("success"=>1,"productPrice" => 6.95));

        }
        

    }else{

        
        echo json_encode(array("success"=>1,"productPrice" => 6.95));
    }
    

 die;  
     
}

/*get variation id by attributes*/
function find_matching_product_variation_id($product_id, $attributes){

    return (new \WC_Product_Data_Store_CPT())->find_matching_product_variation(
        new \WC_Product($product_id),
        $attributes
    );
}

// Pet Insurance
add_action('wp_ajax_Pet_Insurance', 'Add_Pet_Insurance_Plan');
add_action('wp_ajax_nopriv_Pet_Insurance', 'Add_Pet_Insurance_Plan');   

function Add_Pet_Insurance_Plan(){
    global $woocommerce;

   

  //unset($_POST['action']);
    if(isset($_POST['health_insurance'])){
        $ins =  $_POST['health_insurance'];
    }else{
        $ins = '7500';
    }

   


  
  $woocart = WC()->cart->add_to_cart($ins);
   if($woocart){
    echo json_encode(array("success"=>1,"message"=>'<div class="alert alert-success alert-dismissible" style="margin-top:18px;"><strong>Success!</strong> Pet Insurance Added Into Cart</div>')); 
   }
   
 exit();
      
 }

add_action('wp_ajax_Pet_Arrangement', 'Add_Pet_Arrangement_Plan');
add_action('wp_ajax_nopriv_Pet_Arrangement', 'Add_Pet_Arrangement_Plan');   

function Add_Pet_Arrangement_Plan(){
    global $woocommerce;


   // unset($_POST['action']);
     
if(isset($_POST['health_insurance'])){
       $PetArg = $_POST['protectionArrangement'];
    }else{
        $PetArg = '6138';
    }

$woocart2 = $woocommerce->cart->add_to_cart($PetArg);   
    
    if($woocart2){
        echo json_encode(array("success"=>1,"message"=>'<div class="alert alert-success alert-dismissible" style="margin-top:18px;"><strong>Success!</strong> Pet Protection Arrangement Added Into Cart</div>'));
    }
 exit();
 }


/*For free customr Id Tag */


add_action('wp_ajax_woocommerce_ajax_add_to_cart_replacement', 'woocommerce_ajax_add_to_cart_replacement');
add_action('wp_ajax_nopriv_woocommerce_ajax_add_to_cart_replacement', 'woocommerce_ajax_add_to_cart_replacement');   

function woocommerce_ajax_add_to_cart_replacement(){


    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);



  global $woocommerce, $globalAluminumIdTag, $globalBrassIdTag;  
        $product_id = $_POST['product_id'];
        $variation_id = $_POST['variation_id'];
        $product = wc_get_product($product_id);
         WC()->cart->add_to_cart( $product_id ,1, $variation_id,wc_get_product_variation_attributes( $variation_id )); 




        $url =  site_url().'our-services/order-a-replacement-id-tag';
        if (strpos($url,'order-a-replacement-id-tag') !== false) {

            $new_array = array($globalAluminumIdTag ,$globalBrassIdTag);
            $items = $woocommerce->cart->get_cart();
             foreach ( $items as $hash => $value ) {
                if(in_array($value['product_id'], $new_array)){
                 
                    $coupon_code = 'freeweek'; 
                       
                       //  if ( WC()->cart->has_discount( $coupon_code ) ) return;
                       
                         foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
                       
                         // this is your product ID
                         $autocoupon = array( $product_id );

                        // print_r($autocoupon);
                        // die();

                       
                    if ( in_array( $cart_item['product_id'], $autocoupon ) ) {   
                             WC()->cart->apply_coupon( $coupon_code );
                             wc_print_notices();

                             $checkout_url=  WC()->cart->get_checkout_url();;

                             echo $checkout_url;  

                             exit();
                         }
                       
                    }
                        



                }else {
                        echo 'No cars.';
                    }

                 exit;
        }

    }else{
        echo 'dfdffff';
    }
}

add_action('wp_ajax_woocommerce_ajax_add_to_cart', 'woocommerce_ajax_add_to_cart');
add_action('wp_ajax_nopriv_woocommerce_ajax_add_to_cart', 'woocommerce_ajax_add_to_cart');   

function woocommerce_ajax_add_to_cart(){
            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);



      global $woocommerce, $globalAluminumIdTag, $globalBrassIdTag;    
    //  unset($_POST['action']);
      $cart_item_data = array();
      if(isset($_POST['attribute_pa_color'])){
          $product_id = $globalAluminumIdTag; 
      }else{
          $product_id = $globalBrassIdTag;  
      }

      $product_variations = new WC_Product_Variable( $_POST['product_id'] );
      $product_children = $product_variations->get_children();
      $child_variations = array();
     

      foreach ($product_children as $child){
          $child_variations[] = $product_variations->get_available_variation($child);
      }
      foreach ($child_variations as $child_variation) {
          $check = 0;
          foreach ($child_variation['attributes'] as $key => $value) {
              // $cart_item_data[$key] = $_POST[$key];

              if ($_POST[$key] == $value) {
                  $check = 1;
                  $variation = $child_variation['variation_id'];
              }else{
                  $check = 0;
                  $variation = 0;
                  break;
              }
          }
          if ($check) {
              break;
          }
      }
          
  
             /*$coupon_code = 'freeweek'; 
  
            if ( $woocommerce->cart->has_discount( $coupon_code ) ) {
          
            foreach ( $woocommerce->cart->get_cart() as $cart_item_key => $cart_item ) {
          
            // this is your product ID
                    $autocoupon = array( $_POST['product_id'] );
                  
                    if ( in_array( $cart_item['product_id'], $autocoupon ) ) {   
                        $woocommerce->cart->apply_coupon( $coupon_code );

                    }
          
            }


            }
*/     

 // apply_coupons($_POST['product_id']);


      $customproduct = $woocommerce->cart->add_to_cart( $_POST['product_id'] ,1, $variation,wc_get_product_variation_attributes( $variation )); 
      

     /* foreach( $woocommerce->cart->get_cart() as $cart_item ){
                    $id = $cart_item['product_id'];
                    if ($product_id == $id) {
                        $cart_item['data']->set_price( $_POST['price'] );
                        print_r($cart_item); die();
                    }
                }*/

             

      if(!empty($customproduct)){
          echo json_encode(array("success"=>1,"message"=>'<div class="alert alert-success alert-dismissible" style="margin-top:18px;"><strong>Success!</strong> Custom Product Added Into Cart</div>'));
          exit(); 
      }else{
          echo json_encode(array("Fail"=>0,"message"=>'<div class="alert alert-success alert-dismissible" style="margin-top:18px;"><strong>Success!</strong><li>"Error"</li></div>'));
      }
      exit(); 
 }



//add_action( 'woocommerce_before_cart', 'bbloomer_apply_matched_coupons' );
  

/*

 function woocommerce_cart_item_subtotal($subtotal, $item, $order){

    print_r($subtotal);die();
 }




*/





function apply_coupons($product_id) {
  
    $coupon_code = 'freeweek'; 
   
   

        $product = wc_get_product( $product_id );
        $price = $product->get_price();
        // Store the overall price for the product, including the cost of the warranty
        $cart_item_data['quote_price'] = $price * 0;

  

    //if ( WC()->cart->has_discount( $coupon_code ) ) return;
  
    foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
        
        $autocoupon = array( $product_id );
  
        $price = $cart_item['line_subtotal']*0;
         $line_subtotal      = $cart_item['line_subtotal']; 
    $line_subtotal_tax  = $cart_item['line_subtotal_tax'];
    // gets the cart item total
    $line_total         = $cart_item['line_total']*0;
    $line_tax           = $cart_item['line_tax'];
        $cart_item['data']->set_price( ( $line_total ) );
      return ($line_total) ? wc_price($line_total) : 0;









/*    if ( in_array( $cart_item['product_id'], $autocoupon ) ) {   
        //WC()->cart->apply_coupon( $coupon_code );
         $product = $cart_item['data'];
         $regular_price = $product->get_regular_price() *0 ;
        
 //$framed_price = 0;

           //$cart_item['data']->price += $framed_price;

                $cart_item['data']->set_price(0); // CHANGE THIS: set the new price
                $new_price = $cart_item['data']->get_price();


   //$regular_price = $product->get_regular_price()*0;

 }
*/





        echo '<input type="hidden" id="hidden_field" name="custom_price" class="custom_price" value="100">';
        wc_print_notices();
         WC()->cart->empty_cart();
 
        

    }
  
    }
  
// }

//Sorry, this product cannot be purchased solution
add_action( 'woocommerce_is_purchasable', 'purchasable_fix'); 
function purchasable_fix() {     
    return true; 
} 

add_action('wp_ajax_productAddToCart', 'CustomProductAddToCart');
add_action('wp_ajax_nopriv_productAddToCart', 'CustomProductAddToCart');  

 function CustomProductAddToCart(){ 
    
    global $woocommerce;
    unset($_POST['action']);
    foreach ($_POST as $key => $value) {
        if($key == 'protectionArrangement' || $key == 'health_insurance' || $key == 'productid'){
            if ($_POST['formType'] == "universal microchip"){
                $cartData['customPetDetail']['petId']   = $_POST['petId'];
                $cartData['customPetDetail']['petName'] = get_the_title($_POST['petId']);
                $res = $woocommerce->cart->add_to_cart($value,1, $variation_id = 0, $variation = array(), $cartData);   
            }else{
                $res = $woocommerce->cart->add_to_cart($value,1,$variation_id = 0, $variation = array());
            }

            if($res){
                if($key == 'protectionArrangement' ){ $message[] = '<div class="alert alert-success alert-dismissible" style="margin-top:18px;"><strong>Success!</strong> Pet Protection Arrangement Product Added Into Cart</div>';
                }else if($key == 'health_insurance' ){ $message[] = '<div class="alert alert-success alert-dismissible" style="margin-top:18px;"><strong>Success!</strong> Pet Insurance Added Into Cart</div>'; 
                }else if($key == 'productid' ){ $message[] = '<div class="alert alert-success alert-dismissible" style="margin-top:18px;"><strong>Success!</strong> Subscription Product Added Into Cart</div>'; 
                }
            }
        }
    }

    $mess = implode("",$message);
    echo json_encode(array("success"=>1,"message"=>$mess)); 
    
    die;
 } 


add_action('wp_ajax_AddSubscriptionPlan', 'Add_Subscription_Plan_Cart');
add_action('wp_ajax_nopriv_AddSubscriptionPlan', 'Add_Subscription_Plan_Cart');  

 function Add_Subscription_Plan_Cart(){  
     global $woocommerce;

     

    if(!empty($_POST['data'])){
         foreach ($_POST['data'] as $value){
            $subscribed[] = $woocommerce->cart->add_to_cart_url($value['UnisalchipPln']); 
           }
       }else{
       
          $product_id = $_POST['product_id'];
            $subscribed[] = $woocommerce->cart->add_to_cart($product_id);
        }

      

        if($subscribed){
            echo json_encode(array("success"=>1,"message"=>'<div class="alert alert-success alert-dismissible" style="margin-top:18px;"><strong>Success!</strong> Subscription Product Added Into Cart</div>'));        
        }
    
        exit();
 }

add_action("wp_ajax_SmartTagRegster", "CreateSmartTag");
add_action("wp_ajax_nopriv_SmartTagRegster", "CreateSmartTag");

function CreateSmartTag(){

     $user_id = email_exists($_POST['p_email']);
    if ( $user_id) {
        echo json_encode(array("success"=>0,"message"=>"User Already Exists. Please Try Another Email"));exit();
    }else{
        $user_fields = array(
            'user_login' => $_POST['p_email'],
            'user_pass'  => $_POST['password'],
            'user_email' => $_POST['p_email'],
            'role'       => 'customer',
        );

        $user_id = wp_insert_user($user_fields);

        $user_meta = array(
            'smartTag_id'               => $_POST['id_num'],
            'first_name'                => $_POST['p_fst_name'],
            'last_name'                 => $_POST['p_lst_name'],  
            'email'                     => $_POST['p_email'],
            'primary_country'           => $_POST['p_country'],
            'primary_address_line1'     => $_POST['p_add1'],
            'primary_address_line2'     => $_POST['p_add2'],
            'primary_city'              => $_POST['p_city'],
            'primary_state'             => $_POST['UserState'],
            'primary_postcode'          => $_POST['p_zipcode'],
            'primary_home_number'       => $_POST['p_prm_no'],
            'primary_cell_number'       => $_POST['p_sec_no'],
            'sequrity_qus1'             => $_POST['Squs1'],
            'sequrity_ans1'             => $_POST['SqAns1'],
            'sequrity_qus2'             => $_POST['Squs2'],  
            'sequrity_ans2'             => $_POST['SqAns2'],
            'source_system'             => 'SMARTTAG',
            'primary_phone_country_code'=> $_POST['p_prm_no_code'],
            'primary_cell_country_code' => $_POST['p_sec_no_code'],
        );

        //check the number is used or not by the registered users
            

        $checkNumber = get_users($array);
        if(!empty($checkNumber)){
            unset($user_meta['primary_home_number']);
            //echo "This no is already registered!! Please choose another no.";
        } 
                  
        //$user_id   = wp_insert_user($user_fields);
        foreach ($user_meta as $key => $value) {
            update_user_meta($user_id, $key, $value);
        }
         update_user_meta( $user_id, 'sl_email_confirmation', 'false');
        salient_register_emails_filter_replace($_POST['p_email']);

        echo json_encode(array("success"=>1,"title"=>"Success","message"=>"Account successfully created. Please click the link in your confirmation email to activate your account.","userid"=>$user_id));

    }
    exit();    
}

add_action("wp_ajax_PetProfessional", "PetProfessionalSignup");
add_action("wp_ajax_nopriv_PetProfessional", "PetProfessionalSignup");

function PetProfessionalSignup(){

    $exists = email_exists(trim($_POST['org_email']));
    if (!is_email($_POST['org_email'])) {
        echo json_encode(array('success'=>0,'title'=>'Pet Professional','message'=>'Please enter a valid email address.'));
        exit;
    }
    if ( !$exists) {
        
        if (isset($_POST['custom_user_type']) && $_POST['custom_user_type'] == "veterinarians") {
            $extraType = 'veterinarians';
        }elseif (isset($_POST['custom_user_type']) && $_POST['custom_user_type'] == "breeders") {
            $extraType = 'breeders';
        }elseif (isset($_POST['custom_user_type']) && $_POST['custom_user_type'] == "rescue groups") {
            $extraType = 'rescue_groups';
        }elseif (isset($_POST['custom_user_type']) && $_POST['custom_user_type'] == "animals shelters") {
            $extraType = 'animals_shelters';
        }else{
            $extraType = "";
        }

        $user_name          = $_POST['org_email'];
        $org_email          = $_POST['org_email'];
        $random_password    = $_POST['org_password'];

        // echo $user_id      = wp_create_user( 'google', '123456', 'xekafixewo@proeasyweb.com' );
        // echo "tttt";die;
        $user_id      =  wp_create_user( $user_name , $random_password, $org_email );
        if ( is_wp_error( $user_id ) ){
            echo json_encode(array('success'=>0,'title'=>'Pet Professional','message'=>$user_id->get_error_message()));exit();
                     //echo "User Already Registerd";
        }else{
            $user_id_role = new WP_User($user_id);
            $user_id_role->set_role('pet_professional');
            $user_id_role->add_role($extraType);

            $professionData = array(

                'Organization_name'         => $_POST['org_name'],
                'Organization_email'        => $_POST['org_email'],
                'first_name'                => $_POST['org_fst_name'],
                'last_name'                 => $_POST['org_lst_name'],  
                'primary_country'           => $_POST['org_country'],
                'primary_address_line1'     => $_POST['org_add1'],
                'primary_address_line2'     => $_POST['org_add2'],
                'primary_city'              => $_POST['org_city'],
                'primary_state'             => $_POST['org_state'],
                'primary_postcode'          => $_POST['org_zipcode'],
                'primary_home_number'       => $_POST['org_prm_no'],
                'primary_cell_number'       => $_POST['org_sec_no'],
                'sequrity_qus1'             => $_POST['org_Squs1'],
                'sequrity_ans1'             => $_POST['org_SqAns1'],
                'sequrity_qus2'             => $_POST['org_Squs2'],  
                'sequrity_ans2'             => $_POST['org_SqAns2'],  
                'created_by'                => $createdBy,
                'source_system'             => 'SMARTTAG',
                'pet_pro_type'              => $extraType,
                'primary_phone_country_code'=> $_POST['org_prm_no_code'],
                'primary_cell_country_code' => $_POST['org_sec_no_code'],
            );
            
            $array = array('meta_key' => 'primary_home_number','meta_value' =>$professionData['primary_home_number']); 
            $checkNumber = get_users($array);
            if(!empty($checkNumber)){
                unset($user_meta['primary_home_number']);
            }
            foreach ($professionData as $key => $value) {
                update_user_meta($user_id, $key, $value);
            }
            update_user_meta( $user_id, 'sl_email_confirmation', 'false');
            salient_register_emails_filter_replace($_POST['org_email']);

            echo json_encode(array('success'=>1,'title'=>'Pet Professional','message'=>'Account successfully created. Please click the link in your confirmation email to activate your account.'));
                 // echo json_encode(array('success'=>1,'title'=>'Pet Professional','message'=>'Account successfully created.'));
        }
    }else{
        echo json_encode(array('success'=>0,'title'=>'Pet Professional','message'=>'User Already Registerd, Please Choose Another Email Address..!'));
    }
    exit();
}

add_action("wp_ajax_LoginWithEmailPassword", "loginWithUserEmail");
add_action("wp_ajax_nopriv_LoginWithEmailPassword", "loginWithUserEmail");

function loginWithUserEmail(){

    //Redirect My-account if user is login
    if(is_user_logged_in()){
        echo json_encode(array('success'=>0,'message'=>'The User Already login'));
        exit();
    }else{
        //$user = get_user_by_email($_POST['email']);
        // print_r(get_user_meta($user->ID));die;
        //$status = get_user_meta($user->ID, "member_status", true);
        
        /*this is the condition to check user active or inactive*/
        /*if(!$status && !empty($user->ID)){
           echo json_encode(array('success'=>0,'message'=>'Your account has been deactivated'));
                exit(); 
        }*/

        if(!empty($_POST['SrialId'])){

            $smarTagID = $_POST['SrialId']; 
            
            $args = array(
                'meta_key' => 'smarttag_id_number',
                'meta_value' => $smarTagID,
                'post_type' => 'pet_profile',
                'post_status' => 'publish',
                'posts_per_page' => 1,
            );

            $profile = get_posts($args);
            if(!empty($profile)){
                
                $profile_id = $profile[0]->ID;
                $email =  get_post_meta($profile_id, 'owner_email', true);
                
                if(empty($email)){
                    echo json_encode(array('success'=>0,'message'=>'Pet owner is not valid'));  
                    exit();  
                }else{
                    $user = get_user_by( 'email', $email );
                    if(!$user){
                        echo json_encode(array('success'=>0,'message'=>'User not found.'));  
                        exit();  
                    }else{
                        $userId = $user->ID;
                        $user_info = get_userdata($userId);
                        $user_roles = $user_info->roles;
                        $roles = $user_roles[0];
                        
                        if( $roles == 'pet_professional'){
                            echo json_encode(array('success'=>0,'message'=>'Please Login Pet Professional Login Form.'));  
                            exit();  
                      
                        }else {
                            wp_set_auth_cookie($userId,$_POST['remember']);
                            echo json_encode(array('success'=>1,'message'=>'You are login','userid'=>$userId));
                            exit();
                        }
                    }
                }
            }else{
                echo json_encode(array('success'=> 0,'message'=>'Smarttag Id is not valid.'));  
                exit();  
            }

            // $args=array(
            //     'post_type' => 'pet_profile',
            //     'post_status' => 'publish',
            //     'posts_per_page' => -1,
            //     'meta_query'=>array(
            //             array(
            //                 'key' => 'smarttag_id_number',
            //                 'value' => $smarTagID,
            //             ),
            //         )
                
            // );
            // $query = new WP_Query($args);
            // $login_michrochip =  $query->have_posts();

            // if($login_michrochip){
            //     while ($query->have_posts()) : $query->the_post(); 
                         
            //         echo $id = get_the_ID(); 
            //         echo $email =  get_post_meta($id, 'owner_email', true);
            //         $user = get_user_by( 'email', $email );
            //         echo $userId = $user->ID;   
            //         $user_info = get_userdata($userId);
            //         //  print_r($user_info);
            //         $user_roles = $user_info->roles;
            //         $roles = $user_roles[0];
                    
            //         if( $roles == 'pet_professional'){
            //             echo json_encode(array('success'=>0,'message'=>'Please Login Pet Professional Login Form.'));  
            //             exit();  
                  
            //         }else {
            //             wp_set_auth_cookie($userId,$_POST['remember']);
            //             echo json_encode(array('success'=>1,'message'=>'You are login','userid'=>$userId));
            //             exit();
            //         }

            //     endwhile;
           
            // }else{
            //     echo json_encode(array('success'=>0,'message'=>'Invalid Serial Id'));
            //     exit;
            // }



            /*$rs     = 0;
            $userId = "";
            $blogusers = get_users();


            foreach ( $blogusers as $user ) {

                $userID = $user->ID;
               // $userID = 29953;
                 $serial = get_user_meta($userID,"smartTag_id",true);

                /* print_r($serial);
                 die;*/

/*
                if( strpos($serial, ",") !== false ) {
                    $ids = explode(',',$serial);
                    if(in_array($_POST['SrialId'],$ids)){
                    
                        $user_info = get_userdata($userID);*/

                        /*$confirmationType = get_user_meta( $userID, 'sl_email_confirmation', true );

                        if ($confirmationType == 'false') {
                            salient_register_emails_filter_replace($user_info->user_email);
                            echo json_encode(array('success'=>0,'message'=>'You have not activated your account, for activate your account please check your email.'));
                            exit();
                        }*/
                       
                       /* $roles = $user_info->roles;
                        if( $roles == 'pet_professional' || in_array( 'pet_professional', $roles )){
                            echo json_encode(array('success'=>0,'message'=>'Please Login Pet Professional Login Form.'));
                        }else{
                        wp_set_auth_cookie($user->ID,$_POST['remember']);
                        echo json_encode(array('success'=>1,'message'=>'You are login'));

                        }
                        // $userdata->user_login;
                        exit();*/
                            
                 /*   }
                }else{
                    if($serial == $_POST['SrialId']){
                        
                        $user_info = get_userdata($userID);

                        $roles = $user_info->roles;
                        if( $roles == 'pet_professional' || in_array( 'pet_professional', $roles )){
                            echo json_encode(array('success'=>0,'message'=>'Please Login Pet Professional Login Form.'));
                        }else{
                        wp_set_auth_cookie($user->ID,$_POST['remember']);
                        echo json_encode(array('success'=>1,'message'=>'You are login'));

                        }
                        exit;
                    }
                }
            }
        
            if (!$rs) {
                echo json_encode(array('success'=>0,'message'=>'Invalid Serial Id'));
                exit;
            }*/


                    
        }else if(!empty($_POST["email"]) && !empty($_POST['password']) && email_exists( $_POST["email"] )){
            $useremail = get_user_by_email($_POST["email"],'ID',true);
            $user_meta = get_userdata($useremail->ID);
            $userId    = $useremail->ID;
            $email     = $_POST["email"];
        }else{
            $phone = phone_exists($_POST["email"]);
            if ($phone['success']) {
                $userId    = $phone['user']->ID;
                $user_meta = get_userdata($userId);
                $email     = $user_meta->data->user_email;
            }else{
                echo json_encode(array('success'=>0,'message'=>'Email or Phone Number Does not Exists. Please try again'));
                exit();
            }
        }
        
        /*$confirmationType = get_user_meta( $userId, 'sl_email_confirmation', true );

        if ($confirmationType == 'false') {
            
            salient_register_emails_filter_replace($email);

            echo json_encode(array('success'=>0,'message'=>'You have not activated your account, for activate your account please check your email.'));
            exit();
        }*/
        $user_roles = $user_meta->roles;
        if(  in_array('pet_professional', $user_roles)){

            echo json_encode(array('success'=>0,'message'=>'This is Pet Professional username. Please login from Pet-Professional'));
            exit();
        }

        $remember   = $_POST["remember"];
        $user       = get_user_by( 'id', $userId );
        $userLogin  = $user->user_login;
        $password   = $_POST['password'];
        if ( !empty( $userLogin)){
            $creds = array(
                'user_login'    => $userLogin,
                'user_password' => $password,
                'remember'      => $remember
            );
            $loginuser = wp_signon($creds);
            if ( is_wp_error( $loginuser ) ){
                echo $user->get_error_message();
                echo json_encode(array('success'=>0,'message'=>'Invalid password. Please try again'));
            }else{
                echo json_encode(array('success'=>1));
            }
        }else{
            echo json_encode(array('success'=>0,'message'=>'Invalid username/password. Please try again'));
        }
    }    
    exit();
}
/*add_action("wp_ajax_PetLoginWithEmailPassword", "PetloginWithUserEmail");
add_action("wp_ajax_nopriv_PetLoginWithEmailPassword", "PetloginWithUserEmail");

function PetloginWithUserEmail(){    
    if(!empty($_POST['srialId'])){


        $rs     = 0;
        $userId = "";
         $blogusers = get_users();
        if(is_user_logged_in()){
            echo json_encode(array('success'=>1,'message'=>'You are already logged in'));
            exit();
        }

        foreach ( $blogusers as $user ) {
            $serial = get_user_meta($user->ID,"smartTag_id",true);
            $email  = $user->user_email;
           
            if( strpos($serial, ",") !== false ) {
                $ids = explode(',',$serial);
                if(in_array($_POST['srialId'],$ids)){
                    // $userdata->user_login;
                    
                    wp_set_auth_cookie($user->ID,$_POST['remember']);
                    echo json_encode(array('success'=>1,'message'=>'You are login'));
                    exit();
                        
                }
            }else{
                if($serial == $_POST['srialId']){
                    wp_set_auth_cookie($user->ID,$_POST['remember']);
                    echo json_encode(array('success'=>1,'message'=>'You are login'));
                    exit;
                }
            }
        }

        
        if (!$rs) {
            echo json_encode(array('success'=>0,'message'=>'Invalid Login Id'));
           
        }
                
    }elseif(!empty($_POST["PetProfessionalemail"]) && !empty($_POST['password']) && email_exists( $_POST["PetProfessionalemail"] )){

        $useremail  = get_user_by_email($_POST["PetProfessionalemail"],'ID',true);
        $user_meta  = get_userdata($useremail->ID);
        $userId     = $useremail->ID;
        $email      = $_POST["PetProfessionalemail"];
    }else{
        $phone = phone_exists($_POST["PetProfessionalemail"]);
        if ($phone['success']) {
            $userId    = $phone['user']->ID;
            $user_meta = get_userdata($userId);
            $email     = $user_meta->data->user_email;
        }else{
            echo json_encode(array('success'=>0,'message'=>'Email or Phone Number Does not Exists. Please try again'));
            exit();
        }
    }

    $user_roles = $user_meta->roles;

    if( !in_array('pet_professional', $user_roles)){
        echo json_encode(array('success'=>0,'message'=>'Invalid Pet Professional username/password. Please try again'));
        exit();
    }

    $remember   = $_POST["remember"];
    $user_meta  = get_user_by( 'email', $email );
    $userLogin  = $user_meta->user_login;
    $password   = $_POST['password'];

    $confirmationType = get_user_meta( $userId, 'sl_email_confirmation', true );
   
    if ($confirmationType == 'false') {
        
        salient_register_emails_filter_replace($email);

        echo json_encode(array('success'=>0,'message'=>'You have not activated your account, for activate your account please check your email.'));
        exit();
    }

    $user_info = get_userdata( $userId);
    if ( !empty( $userLogin)){
        $creds = array(
            'user_login'    => $userLogin,
            'user_password' => $password,
            'remember'      => $remember
        );
        $loginuser = wp_signon($creds);
        if ( is_wp_error( $loginuser ) ){
            echo json_encode(array('success'=>0,'message'=>'Invalid password. Please try again'));
            exit();
        }else{
            echo json_encode(array('success'=>1));
            exit();
        }
    }else{
        echo json_encode(array('success'=>0,'message'=>'Invalid username/password. Please try again'));
        exit();
    }
    exit();
}*/
 
add_action("wp_ajax_PetLoginWithEmailPassword", "PetloginWithUserEmail");
add_action("wp_ajax_nopriv_PetLoginWithEmailPassword", "PetloginWithUserEmail");

function PetloginWithUserEmail(){ 

    $email = $_POST['PetProfessionalemail'];


    $password = $_POST['password'];
    $remember_me = $_POST['remember'];
    if(!empty($_POST['srialId'])){


        $rs     = 0;
        $userId = "";
         $blogusers = get_users();
        if(is_user_logged_in()){
            echo json_encode(array('success'=>1,'message'=>'You are already logged in'));
            exit();
        }

        foreach ( $blogusers as $user ) {
            $serial = get_user_meta($user->ID,"smartTag_id",true);
            $email  = $user->user_email;
           
            if( strpos($serial, ",") !== false ) {
                $ids = explode(',',$serial);
                if(in_array($_POST['srialId'],$ids)){
                    // $userdata->user_login;
                    
                    wp_set_auth_cookie($user->ID,$_POST['remember']);
                    echo json_encode(array('success'=>1,'message'=>'You are login'));
                    exit();
                        
                }
            }else{
                if($serial == $_POST['srialId']){
                    wp_set_auth_cookie($user->ID,$_POST['remember']);
                    echo json_encode(array('success'=>1,'message'=>'You are login'));
                    exit;
                }
            }
        }

        
        if (!$rs) {
            echo json_encode(array('success'=>0,'message'=>'Invalid Login Id'));
           
        }
                
    }elseif(!empty($_POST["PetProfessionalemail"]) && !empty($_POST['password']) && email_exists( $email )){
               
                $exists = email_exists( $email );
                $user  = get_user_by( 'id', $exists );
                $userLogin  = $user->user_login;
                $user_id = $user->ID;
                $creds = array(
                    'user_login'    => $userLogin,
                    'user_password' => $password,
                    'remember'      => $remember
                );

                $user_meta = get_userdata($user_id);
                
                 $user_roles = $user_meta->roles;
                
               
                if(  !in_array('pet_professional', $user_roles)){
                        echo json_encode(array('success'=>0, 'user_type'=>'pet-professional','message'=>'This is Pet Customer username. Please login from Customer portal'));
                    exit();
                }

                 $importStatus = get_user_meta( $exists, 'importStatus' ,true);

                $loginuser = wp_signon($creds);
                if ( is_wp_error( $loginuser ) ){
                    echo $user->get_error_message();
                    echo json_encode(array('success'=>0, 'user_type'=>'customer', 'message'=>'Invalid password. Please try again'));
                        exit();
                }else{
                echo json_encode(array('success'=>1, 'importStatus' => $importStatus,'user_type'=> 'new_in website', 'message'=>'You are login','email'=> $email));
                        exit();
                }



            }elseif(is_numeric($_POST["PetProfessionalemail"])){

                $phone = phone_exists($_POST["PetProfessionalemail"]);
                    if ($phone['success']) {
                            $userId    = $phone['user']->ID;
                            $user_meta = get_userdata($userId);
                            $email     = $user_meta->data->user_email;
                            $exists = email_exists( $email );

                            $user  = get_user_by( 'id', $exists );
                            $userLogin  = $user->user_login;
                            $password = $_POST['password'];    


                            $creds = array(
                                'user_login'    => $userLogin,
                                'user_password' => $password,
                                'remember'      => $remember
                            );
                      
                            update_user_meta( $exists, 'importStatus', 'S');
                            $importStatus = get_user_meta( $exists, 'importStatus' ,true);
                            $loginuser = wp_signon($creds);
                            if ( is_wp_error( $loginuser ) ){
                                    $user->get_error_message();
                                        echo json_encode(array('success'=>0,'message'=>'Invalid password. Please try again'));
                                        exit();
                            }else{
                                echo json_encode(array('success'=>4,'importStatus' => $importStatus,'message'=>'loginIn','email'=> $email));
                                exit();
                            }
                        }else{
                            echo json_encode(array('success'=>5,'importStatus' => 'false','message'=>'Email and Phone Number Does not Exists. Please try again'));
                            exit();
                        }
            }elseif(!email_exists($email) && email_exist_in_drupal($email) ==false){

                     
                 echo json_encode(array('success'=>2, 'importStatus' => 'false','user_type'=> 'Not available', 'message'=>'Email And Phone Does not Exists. Please try again'));
                        exit();        


            }elseif(!email_exists($email) && email_exist_in_drupal($email) ==true){

                $random_password    = rand();
                $user_id            =  wp_create_user( $email , $random_password, $email );
                
                $user_data = array(
                    'ID' => $user_id,
                    'user_pass' => $password
                    );

                    $y = wp_update_user($user_data);
                    $login_data['user_login'] = $email;  
                    $login_data['user_password'] = $password;
                    $login_data['remember'] = $remember_me;  
                    update_user_meta( $user_id, 'importStatus', 'S');
                    $importStatus = get_user_meta( $user_id, 'importStatus' ,true);

                    $user_verify = wp_signon( $login_data, false );
                    echo json_encode(array('success'=>3, 'importStatus' => $importStatus, 'email'=>$email, 'user_type'=> 'CreateNewUserFromDrupal', 'message'=>'You are login in wordpress'));
                    exit(); 



            }       
    
}











add_action("wp_ajax_ForgetUserEmail", "ForgetEmailByPhone");
add_action("wp_ajax_nopriv_ForgetUserEmail", "ForgetEmailByPhone");

 function ForgetEmailByPhone(){
   
      
            $sender  =  "VINODM";
        $users   = get_users( array( 'fields' => array( 'ID' ) ) );

         $phone = phone_exists($_POST['phone']);   
        if($phone['success']){
          foreach($users as $user_id){
                $status =""; 
              $PrimaryPhone =  get_user_meta ($user_id->ID,'primary_home_number',true);
             
                if($PrimaryPhone){
                        $user_meta  = get_userdata($user_id->ID);
                        $user_roles = $user_meta->roles;
                        if( $user_roles == 'pet_professional' || in_array( 'pet_professional', $user_roles )){
                                echo json_encode(array('success'=>0, 'message'=>'This form is only for Customers..'));
                                exit();
                        }else{
                            
                            $userId = $user_id->ID;
                            $action = $_POST['action'];
                           $sms =  getSMSByTwillo($_POST['phone'],$userId, $action);
                            $deliveryMessage = $sms['message'];
                            echo json_encode(array('success'=>1,'title'=>'Send', 'message'=>$deliveryMessage));
                           

                            }   
                }
             }
        }else{
              
                 echo json_encode(array('success'=>1,'title'=>'Forgot Email', 'message'=> 'Phone Number is not associated with SmartTag account. Please contact Support for better assist'));
                 exit();
             
        }    
            
        exit(); 
    } 


add_action("wp_ajax_ForgetUserPassword", "ForgetPasswordEmail");
add_action("wp_ajax_nopriv_ForgetUserPassword", "ForgetPasswordEmail");

function ForgetPasswordEmail(){


    if ( is_user_logged_in() ){
        echo json_encode(array('success'=>0, 'message'=>'User Already Login.'));
        exit();
    }else{

            $account = $_POST['user_login'];

            if(email_exists($account)){

                $user = get_user_by( 'email', $_POST['user_login']);
                $user_meta = get_userdata($user->ID);
                $user_roles = $user_meta->roles;
               
                if( in_array('pet_professional', $user_roles) || $user_roles =='pet_professional' ){ 
                        echo json_encode(array('success'=>0,'message'=>'This form only for customers.'));
                        die();
                }
                    check_ajax_referer( 'ajax-forgot-nonce', 'security' );
                    global $wpdb;    
                    $account = $_POST['user_login'];

                    $user = get_user_by( 'email', $account );
                    $user_id = $user->ID;
                    $success = 1;                
                        if(dtc_send_password_reset_mail($user_id)){
                            echo json_encode(array('success'=>1,'title'=>'Password Reset Request', 'message'=>"Password Reset Request link has been sent to your email address."));
                                exit();
                        }    
                }elseif(is_numeric($account)){

                        $phone = phone_exists($account);
                            if ($phone['success']) {

                                $userId = $phone['user']->ID;
                                $action = $_POST['action'];
                                $sms = getSMSByTwillo($account,$userId,$action);
                                $deliveryMessage = $sms['message'];
                                    echo json_encode(array('success'=>1,'title'=>'Send', 'message'=>$deliveryMessage));
                                    exit();   
                            }else{
                                         echo json_encode(array('success'=>1,'title'=>'Password Reset Request Failer', 'message'=>"This Phone Number is not associated with SmartTag account "));
                                exit();
                                }


                }else{
                     echo json_encode(array('success'=>0,'title'=>'Password Reset Request', 'message'=>'Email was not found, try again!'));
                         exit();
                }
            }   
}             

add_action("wp_ajax_ForgetPetProPassword", "PetPasswordEmail");
add_action("wp_ajax_nopriv_ForgetPetProPassword", "PetPasswordEmail");

function PetPasswordEmail(){

     $account = $_POST['user_login'];
    if (email_exists($account)){
        $user = get_user_by( 'email', $account );
        
        $user_meta = get_userdata($user->data->ID);
        $user_roles = $user_meta->roles;
            if( in_array('pet_professional', $user_roles) || $user_roles =='pet_professional' ){ 
                check_ajax_referer( 'ajax-forgot-nonce', 'security' );
                global $wpdb;    
                $account = $_POST['user_login'];
                $user_exists = false;
            }else{
                    echo json_encode(array('success'=>0,'title'=>'Pet Professional', 'message'=>'This user is not Pet Professional'));  
                    exit();
                }
                $user_exists = true;
                $user       = get_user_by( 'email', $account );
                $user_id    = $user->ID;
                $success    = 1;            

                if(dtc_send_password_reset_mail($user_id)){
                    echo json_encode(array('success'=>1,'title'=>'Password Reset Request', 'message'=>"Password Reset Request link has been sent to your email address."));
                      exit();
                }
                  
    }elseif (is_numeric($account)){
            $phone = phone_exists($account);   
            if($phone['success']){
                $userId = $phone['user']->ID;
                $action = $_POST['action'];
                $sms = getSMSByTwillo($account,$userId, $action);
                $deliveryMessage = $sms['message'];
                 echo json_encode(array('success'=>1,'title'=>'Send', 'message'=>$deliveryMessage));
                    exit();
            }else{
                 echo json_encode(array('success'=>0,'title'=>'Password Reset Request', 'message'=>'Phone Number was not found, try again!'));
                    exit();
            }
    }else{
            echo json_encode(array('success'=>0,'title'=>'Password Reset Request', 'message'=>'Email was not found, try again!'));
                    exit();
            }

}
function dtc_send_password_reset_mail($user_id){
    
    $user = get_user_by('id', $user_id);
    $username = $user->first_name;

    $email = $user->user_email;
    $key = get_password_reset_key( $user );
    $user_login = $user->user_login;

  //$rp_link =  site_url() ."/wp-login.php?action=rp&key=".$key."&login=".rawurlencode($user_login); 
    //$rp_link = "https://staging.idtag.com/password-reset?action=rp&key=".$key."&login=".rawurlencode($user_login); 
    $rp_link = site_url()."/password-reset?action=rp&key=".$key."&login=".rawurlencode($user_login); 

    forgot_password_mail($username ,$email, $rp_link);
    
    return true;
   
}



//Forget Email for Per Professionals
add_action("wp_ajax_PetForgetUserEmail", "PetForgetEmailByPhone");
add_action("wp_ajax_nopriv_PetForgetUserEmail", "PetForgetEmailByPhone");

function PetForgetEmailByPhone(){

        // $PrimaryPhone =  get_user_meta (15807,'primary_home_number',true);
        // print_r($PrimaryPhone);die("ocean");

        $phone   =  trim($_POST['phone']);
        $sender  =  "VINODM";
        $users   = get_users( array( 'fields' => array( 'ID' ) ) );
         $phone = phone_exists($_POST['phone']);   
        if($phone['success']){
        foreach($users as $user_id){
            $status =""; 
            $PrimaryPhone =  get_user_meta ($user_id->ID,'primary_home_number',true);

            if(trim($PrimaryPhone) == $phone){

                $user_meta = get_userdata($user_id->ID);
                $user_roles = $user_meta->roles;

                if( !$user_roles == 'pet_professional' || !in_array( 'pet_professional', $user_roles )){

                    echo json_encode(array('success'=>0, 'message'=>'This form is only for Pet Professionals..'));
                 
                    exit();
                }else{

                    $userId = $user_id->ID;
                    $action = $_POST['action'];
                    $sms = getSMSByTwillo($_POST['phone'],$userId, $action);
                    $deliveryMessage = $sms['message'];
                    echo json_encode(array('success'=>1,'title'=>'Send', 'message'=>$deliveryMessage));

                }   
            }
         }   
        }else{
            echo json_encode(array('success'=>1,'title'=>'Forgot Email', 'message'=> 'Phone Number is not associated with SmartTag account. Please contact Support for better assist'));
                 exit();
        }
         
        exit(); 
    }



add_filter( 'woocommerce_loop_add_to_cart_link', 'quantity_inputs_for_woocommerce_loop_add_to_cart_link', 10, 2 );
function quantity_inputs_for_woocommerce_loop_add_to_cart_link( $html, $product ) {

  

    $geeks = $product->add_to_cart_url();
   $product_id = $product->get_ID();
        preg_match_all('!\d+!', $geeks, $matches);

         echo  '<div class="product_desc" style="text-align:center;">'. get_the_title( $product_id ).'</div>';
        echo "<br/>"; 
       if(isset($matches[0][0])){
            $product_price = $product->get_price();
            $get_dot_from_price = explode('.', $product_price);
            if($get_dot_from_price[1] == '00' ){
                echo  '<p class="price" style="text-align:center;"><span class="woocommerce-Price-amount amount testing"><bdi><span class="woocommerce-Price-currencySymbol">$</span>'.$get_dot_from_price[0].'</bdi></span></p>';
            }else{
                    echo  '<p class="price" style="text-align:center;"><span class="woocommerce-Price-amount amount testing"><bdi><span class="woocommerce-Price-currencySymbol">$</span>'.$product->get_price().'</bdi></span></p>';

            }   

    }
    



    if ( $product && $product->is_type( 'simple' ) && $product->is_purchasable() && $product->is_in_stock() && ! $product->is_sold_individually() ) {
          
            if (!strpos($_SERVER['REQUEST_URI'], "pet-professional") !== false) { ?>
              

<!--  <a href="<?php //echo get_permalink( $loop->post->ID ) ?>" title="<?php echo esc_attr($loop->post->post_title ? $loop->post->post_title : $loop->post->ID); ?>">
                 
                   <h2 class="woocommerce-loop-product__title "><?= the_title(); ?></h2>
                   <span class="price"><span></span><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol"></span><?php echo $product->get_price_html(); ?></span></span>
                </a>   -->
 


              
 <?php }else{
                
 } ?>

               

        <?php
           


        $html = '<form action="' . esc_url( $product->add_to_cart_url() ) . '" class="cart" method="post" enctype="multipart/form-data">';
        $html .="Quantity";
        $html .= woocommerce_quantity_input( array(), $product, false );
        $html .= '<button type="submit" class="single_add_to_cart_button button alt testing">' . esc_html( $product->add_to_cart_text() ) . ' <i class="fa fa-shopping-cart"></i></button>';
        $html .= '</form>';
   }
    return $html;
}
// $test = hasBoughtIDTag('microchip-57179473');


function wpb_list_child_pages() { 
 
global $post; 
 
if ( is_page() && $post->post_parent )
 
    $childpages = wp_list_pages( 'sort_column=menu_order&title_li=&child_of=' . $post->post_parent . '&echo=0' );
else
    $childpages = wp_list_pages( 'sort_column=menu_order&title_li=&child_of=' . $post->ID . '&echo=0' );
 
if ( $childpages ) {
 
    $string = '<ul>' . $childpages . '</ul>';
}
 
return $string;
 
}
 
add_shortcode('wpb_childpages', 'wpb_list_child_pages');

function SO13911452_override_avatar ($avatar_html, $id_or_email, $size, $default, $alt) {
        $havemeta = get_user_meta($id_or_email, 'user_image', true);
        if ($havemeta) {
            $image = wp_get_attachment_image_src($havemeta,'full');
            return "<img alt='' src='".$image[0]."'
srcset='".$image[0]."' class='avatar avatar-64 photo' height='64' width='64' />";
        }else{
            return $avatar_html;
        }
        
}

add_filter ('get_avatar', 'SO13911452_override_avatar', 10, 5);


add_action("wp_ajax_PetProfessionalEdit", "ProfessionalEdit");
add_action("wp_ajax_nopriv_PetProfessionalEdit", "ProfessionalEdit");

function ProfessionalEdit(){
    $postid = $_POST['postID'];
    $Shots = get_post_meta($postid,'shot',false);
    $gender = get_post_meta($postid,'gender',true);
    $size = get_post_meta($postid,'size',true);
    print_r($gender);
    print_r($size);
      
echo '<div class="edit">       
<div class="acc-blue-box">
   <div class="acc-blue-head">
            Pet Image
        </div>
        <div class="acc-blue-content">
            <div class="row">
                 <div class="col-sm-6">
                    <div class="field-div">
                        <img id="blah" src="#" alt="your image" />
                    </div>
                </div>
               <div class = "col-sm-6 upload-form">
                    <div class= "upload-response"></div>
                    <div class = "form-group">
                        <label>*Upload Pet Image: (Optional however in the event your pet is lost a picture is very helpful</label>
                        <input type = "file" name = "files[]" accept = "image/*" class = "files-data form-control" multiple id="imgInp" />
                    </div>
                    <div class = "form-group">
                        <input type = "submit" value = "Upload" class = "btn btn-primary btn-upload" />
                    </div>
                </div> 
              </div>
            </div>
        </div>
<div class="acc-blue-box">
    <div class="acc-blue-head">
        Pet Information
    </div>
    <div class="acc-blue-content">
            <fieldset aria-label="Step Two" tabindex="-1" id="step-2" class="step-form-box">
            <div class= "Edit-response"></div>
            <form id="EditInfo" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="PostId" value="'.$postid.'" id="PostId"/>
                    <div class="contact-form" id="sections">
                        <div class="field-wrap">
                            <div class="field-div">
                                <label>*Microchip Serial #: </label>
                                <input type="text" name="microchip_id_number" placeholder="Enter Microchip Serial Number " class="petdata" pre="'.get_post_meta($postid,'microchip_id_number',true).'" value="'.get_post_meta($postid,'microchip_id_number',true).'" />
                            </div>
                        </div>
                        <div class="field-wrap two-fields-wrap">
                     <div class="field-div">
                            <label>*Pet Name: </label>
                            <input type="text" name="pet_name" placeholder="Enter SmartTag Serial Number " class="petdata" pre="'.get_post_meta($postid,'pet_name',true).'" value="'.get_post_meta($postid,'pet_name',true).'" />
                        </div>
                        <div class="field-div">
                            <div class="field-wrap two-fields-wrap">
                                <div class="field-div">
                                    <label>*Gender: </label>
                                    <select name="gender" id="PetGen" class="petdata">
                                       
                                        <option value="">Select Gender</option>
                                         <option value=""'.(($gender == "male" ) ? "selected='selected'" : "").'>Male</option>
                                         <option value=""'.(($gender == "female" ) ? "selected='selected'" : "").'>Female</option>
                                    </select>
                                </div>
                                <div class="field-div">
                                    <label>*Pet Type: </label>
                                    <select name="pet_type" id="PetTyp" class="petdata">
                                        <option value="">Type</option>
                                        <option value="Type1">Type1</option>
                                        <option value="Type2">Type2</option>
                                        <option value="Type3">Type3</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                     </div>
                        <div class="field-wrap two-fields-wrap">
                            <div class="field-div">
                                <label>Primary Breed: </label>
                                <input type="text" name="primary_breed" placeholder="Address line 1" id="PriBrd" class="petdata" pre="'.get_post_meta($postid,'primary_breed',true).'" value="'.get_post_meta($postid,'primary_breed',true).'" />
                            </div>
                            <div class="field-div">
                                <label>Secondary Breed: </label>
                                <input type="text" name="secondary_breed" placeholder="Address line 2" id="SecBrd" class="petdata" pre="'.get_post_meta($postid,'secondary_breed',true).'" value="'.get_post_meta($postid,'secondary_breed',true).'" />
                            </div>
                        </div>
                        <div class="field-wrap two-fields-wrap">
                            <div class="field-div">
                                <label>Primary Color: </label>
                                <input type="text" name="primary_color" placeholder="Address line 1" id="PrmColor" class="petdata" pre="'.get_post_meta($postid,'primary_color',true).'" value="'.get_post_meta($postid,'primary_color',true).'" />
                            </div>
                            <div class="field-div">
                                <label>Secondary Color(s):</label>
                                <input type="text" name="secondary_color" placeholder="Address line 2" id="SecColor" class="petdata" pre="'.get_post_meta($postid,'secondary_color',true).'" value="'.get_post_meta($postid,'secondary_color',true).'" />
                            </div>
                        </div>
                        <div class="field-wrap two-fields-wrap">
                            <div class="field-div">
                                <label>Size: </label>
                                <input type="text" name="size" placeholder="Address line 1" id="Siz" class="petdata" pre="'.get_post_meta($postid,'size',true).'" value="'.get_post_meta($postid,'size',true).'" />
                            </div>
                            <div class="field-div">
                                <label>Pet Date of Birth: (optional)</label>
                                <div class="field-wrap three-fields-wrap ">
                                    <input type="text" name="pet_date_of_birth" id="pet-dob" placeholder="mm/dd/yy" class="input-10 input petdata" pre="'.get_post_meta($postid,'pet_date_of_birth',true).'"value="'.get_post_meta($postid,'pet_date_of_birth',true).'" />
                                </div>
                            </div>
                        </div>
                        <div class="field-wrap two-fields-wrap">
                            <div class="field-div">
                                <label>Neutered/Spayed: </label>
                                 <select name="neutered_spayed" class="petdata">
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                      </select>
                            </div>
                        </div>
                        <div class="field-wrap two-fields-wrap">
                            <div class="field-div">
                                <label>Shots/Vaccination: </label>
                                <div class="field-div">
                                 <input type="checkbox" class="petdata" name="shot"'.((in_array("Canine Distemper",$Shots)) ? "checked='chekced'" : "").' value="Canine Distemper">Canine Distemper
                                 </div>
                               <div class="field-div">
                                 <input type="checkbox" class="petdata" name="shot"'.((in_array("Measles",$Shots)) ? "checked='chekced'" : "").'value="Measles">Measles
                                 </div>
                                 <div class="field-div">
                                 <input type="checkbox" class="petdata" name="shot"'.((in_array("Parvovirus",$Shots)) ? "checked='chekced'" : "").' value="Parvovirus">Parvovirus
                                 </div>
                                 <div class="field-div">
                                 <input type="checkbox" class="petdata" name="shot"'.((in_array("Hepatitis",$Shots)) ? "checked='chekced'" : "").' value="Hepatitis">Hepatitis
                                 </div>
                                 <div class="field-div">
                                 <input type="checkbox" class="petdata" name="shot"'.((in_array("Rabies",$Shots)) ? "checked='chekced'" : "").' value="Rabies">Rabies
                                 </div>
                                 <div class="field-div">
                                 <input type="checkbox" class="petdata" name="shot"'.((in_array("Respiratory disease from canine adenovirus-2 (CAV-2)",$Shots)) ? "checked='chekced'" : "").' value="Respiratory disease from canine adenovirus-2 (CAV-2)">Respiratory disease from canine adenovirus-2 (CAV-2)
                                 </div>
                                    
                            </div> 
                            <div class="field-div">   
                                 <input type="checkbox" class="petdata" name="shot"'.((in_array("Parainfluenza",$Shots)) ? "checked='chekced'" : "").' value="Parainfluenza">Parainfluenza

                                 <input type="checkbox" class="petdata" name="shot"'.((in_array("Bordetella",$Shots)) ? "checked='chekced'" : "").' value="Bordetella">Bordetella

                                 <input type="checkbox" class="petdata" name="shot"'.((in_array("Leptospirosis",$Shots)) ? "checked='chekced'" : "").' value="Leptospirosis">Leptospirosis

                                 <input type="checkbox" class="petdata" name="shot"'.((in_array("Lyme",$Shots)) ? "checked='chekced'" : "").' value="Lyme">Lyme
                            </div>
                        </div>
                        <div class="field-wrap">
                                <div class="field-div">
                                <label>Unique Features: </label>
                                <textarea  name="Features" class="petdata" pre="'.get_post_meta($postid,'unique_features',true).'" value="'.get_post_meta($postid,'unique_features',true).'" ></textarea>
                                 </div>
                        </div>
                        <div class="field-wrap">
                                <div class="field-div">
                                    <label>Allergies: </label>
                                    <textarea name="Allergies" class="petdata" pre="'.get_post_meta($postid,'allergies',true).'" value="'.get_post_meta($postid,'allergies',true).'" ></textarea>
                                </div>
                        </div>
                        <div class="field-wrap">
                            <div class="field-div">
                                <label>Special Needs:</label>
                                <textarea class="petdata" pre="'.get_post_meta($postid,'special_needs',true).'" value="'.get_post_meta($postid,'special_needs',true).'" ></textarea>
                            </div>
                        </div>  
                        <div class="field-wrap submit-wrap">
                            <div class="field-div">
                                <input type ="submit" value ="Save" class ="btn btn-primary text-center" />
                            </div>
                        </div>                  
                    </div>
                </form>
            </fieldset>
        </div>
    </div>
</div>';
exit();
}
add_action("wp_ajax_PetProfessionalUpdate", "ProfessionalUpdate");
add_action("wp_ajax_nopriv_PetProfessionalUpdate", "ProfessionalUpdate");

function ProfessionalUpdate(){
 unset($_POST['action']);
    foreach ($_POST as $key => $value) {
        $val = explode(',',$value);
        update_post_meta( $val[0],$key,$val[1],$val[2]);
    }
    echo "Successfully Update";
   exit();
}  


add_action("wp_ajax_PetDataSearch", "PetDataSearch");
add_action("wp_ajax_nopriv_PetDataSearch", "PetDataSearch"); 

function PetDataSearch(){

    if(isset($_POST['action'])== 'PetDataSearch'){
        $pet_data =  $_POST['Petdata'];
         $length = strlen($pet_data);
            if($length == 10){
                $phone = preg_replace("/[^0-9]*/",'',$pet_data);
                $sArea = substr($phone,0,3);
                $sPrefix = substr($phone,3,3);
                $sNumber = substr($phone,6,4);
                $phone = "(".$sArea.") ".$sPrefix."-".$sNumber;
                $key =  'primary_home_number';
                $value =$phone;
            }elseif($length == 8){
                $key =  'smarttag_id_number';
                $value =$pet_data;
            }elseif($length == 15){
                $key =  'microchip_id_number';
                $value =$pet_data;
            }elseif(email_exists($pet_data)){
                $key =  'owner_email';
                $value =$pet_data;
            }else{
                $key =  'owner_name';
                $value =$pet_data;
            }
            $user_id =  get_current_user_id();
            $args=array(
                'post_type' => 'pet_profile',
                'post_status' => 'publish',
                'posts_per_page' => -1,
                'author' => $user_id,
                'meta_query' => array(
                    array(
                            'key'     => $key,
                            'value'   => $value,
                            'compare' => '='
                        ),
                )

            );
        $query = new WP_Query($args);
            if( $query->have_posts() ){ 
                while( $query->have_posts() ) : $query->the_post();
                    $userId = get_post_field( 'post_author', get_the_ID() );
                    $microchip_id_number = get_post_meta(get_the_ID(),"microchip_id_number",true);
                    $smarttag_id_number = get_post_meta(get_the_ID(),"smarttag_id_number",true);
                    $pet_name = get_post_meta(get_the_ID(),"pet_name",true);  
                    $pet_type = get_post_meta(get_the_ID(),"pet_type",true); 
                        if($pet_type == 587){
                            $pets_type = 'Cat';
                        }else if($pet_type == 1045){
                            $pets_type = 'Dog';
                        }else if($pet_type == 1046){
                            $pets_type = 'Ferret';
                        }else if($pet_type == 588){
                            $pets_type = 'Horse';
                        }else if($pet_type == 1048){
                            $pets_type = 'Other';
                        }else{
                            $pets_type = 'Rabbit';
                        }
                    $pet_type = (isset(get_term( $pet_type )->name));  
                    $primary_breed = get_post_meta(get_the_ID(),"primary_breed",true);  
                    $p_breed =   (isset(get_term( $primary_breed )->name)) ? get_term( $primary_breed )->name : "" ;
                    $secondary_breed = get_post_meta(get_the_ID(),"secondary_breed",true);
                     $b_breed =   (isset(get_term( $secondary_breed )->name)) ? get_term( $secondary_breed )->name : "" ;   
                    $primary_color = get_post_meta(get_the_ID(),"primary_color",true);   
                        if($primary_color == '1'){
                            $primarycolor =  'Black';
                          }else if($primary_color == '2'){
                            $primarycolor = 'Blue';
                          }else if($primary_color == '3'){
                            $primarycolor =  'Brown';
                          }else if($primary_color == '4'){
                            $primarycolor =  'Gold';
                          }else if($primary_color == '5'){
                            $primarycolor =  'Gray';
                          }else if($primary_color == '6'){
                            $primarycolor =  'Orange';
                          }else if($primary_color == '7'){
                            $primarycolor = 'Sliver';
                          }else if($primary_color == '8'){
                            $primarycolor = 'Tan';
                          }else if($primary_color == '9'){
                            $primarycolor =  'White';
                          }else{
                            $primarycolor =  'Yellow';
                          }
                        $secondary_color = get_post_meta(get_the_ID(),"secondary_color",true);
                        if($secondary_color == '1'){
                            $secoundarycolor =  'Black';
                          }else if($secondary_color == '2'){
                            $secoundarycolor = 'Blue';
                          }else if($secondary_color == '3'){
                            $secoundarycolor =  'Brown';
                          }else if($secondary_color == '4'){
                            $secoundarycolor =  'Gold';
                          }else if($secondary_color == '5'){
                            $secoundarycolor =  'Gray';
                          }else if($secondary_color == '6'){
                            $secoundarycolor =  'Orange';
                          }else if($secondary_color == '7'){
                            $secoundarycolor = 'Sliver';
                          }else if($secondary_color == '8'){
                            $secoundarycolor = 'Tan';
                          }else if($secondary_color == '9'){
                            $secoundarycolor =  'White';
                          }else{
                            $secoundarycolor =  'Yellow';
                          }   
                                $size = get_post_meta(get_the_ID(),"size",true); 
                             if($size == 1){
                              $size = 'Small';
                            }elseif($size == 2){
                              $size =  'Medium';
                            }else{
                              $size ='Large';

                            }
                        $gender = get_post_meta(get_the_ID(),"gender",true);   
                        $pet_date_of_birth = get_post_meta(get_the_ID(),"pet_date_of_birth",true);   
                        $petId = get_the_ID(); 
                        $pet_profile_link = site_url().'/my-account/show-profile?pet_id='.$petId;

                        $user_info = get_userdata($userId);
                        $user_login = $user_info->user_login;
                        $email = $user_info->email;
                        $first_name = $user_info->first_name;
                        $last_name = $user_info->last_name;
                        $primary_address_line1 = $user_info->primary_address_line1;
                        $primary_city = $user_info->primary_city;
                        $primary_state = $user_info->primary_state;
                        $primary_postcode = $user_info->primary_postcode;
                        $primary_home_number = $user_info->primary_home_number;
                        $secondary_cell_number = $user_info->secondary_cell_number;
                        $secondary_phone_country_code = $user_info->secondary_phone_country_code; 
                        $primary_phone_country_code = $user_info->primary_phone_country_code; 
                        $primary_country = $user_info->primary_country;
                        $Owner = site_url().'/my-account/show-profile?pet_id='.$petId;

                        $title = get_the_title(get_the_ID()); 
                        if (has_post_thumbnail( get_the_ID())){


                            $image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'single-post-thumbnail' );

                            $image = $image[0];

                        }else{
                            $image = site_url().'/wp-content/uploads/2021/01/dog-placeholder.png';
                        }

                            echo '<div class="col-sm-12">
                            <div class="acc-blue-box">
                            <div class="acc-blue-head">
                                    Pet Information
                                 </div>
                                 <div class="acc-blue-content">
                                 <div class="row" style="display:flex;">
                                 <div class="col-lg-6">
                                 <strong>Microchip ID Number:</strong> <span>' .$microchip_id_number.'</span><br>
                                  <strong>ID Tag Serial Number:</strong><span>' .$smarttag_id_number.'</span><br>
                                  <strong>Pet Name:</strong> <span>' .$pet_name.'</span><br>
                                  <strong>Pet Type:</strong><span>' .$pets_type.'</span>
                                <br><strong>Gender:</strong> <span>' .$gender.'</span><br><strong>Size:</strong> <span></span>
                                  ' .$size.'<br><strong>Pet Date of Birth:</strong> <span>' .$pet_date_of_birth.'</span><br>
                                <strong>Primary Breed:</strong>' .$p_breed.'<span></span><br>
                                <strong>Secondary Breed:</strong>' .$b_breed.'<span></span><br>
                                <strong>Primary Color:</strong> <span>' .$primarycolor.'</span>
                                <br>
                                <strong>Secondary Color:</strong><span>' .$secoundarycolor.' </span><br>
                                <strong>Pet Profile Link:</strong><span> <a href="'.$pet_profile_link.'">Pet Profile</a </span>  
                                 </div>
                                 <div class="col-lg-6">
                                 <div class="pet-img">
                                 <img src="'.$image.'" alt="" />
                                 </div>
                                 </div>
                                 </div>

                                                  
                                </div>
                                </div>
                                <div class="acc-blue-box">
                                 <div class="acc-blue-head">
                                  Owner Information
                                  
                                </div>
                                <div class="acc-blue-content">
                                  <strong>Email:</strong> <span>'.$email.'</span>
                                  <br>
                                  <strong>First Name:</strong> <span>'.$first_name.'</span>
                                  <br>
                                  <strong>Last Name:</strong> <span>'.$last_name.'</span>
                                  <br>
                                  <strong>Address:</strong>
                                  <br>
                                  <span>'.$primary_address_line1.' <br>'.$primary_city.', '.$primary_state.' ,'.$primary_postcode.', <br>'.$primary_country.' </span>
                                <br>
                                <strong>Primary Phone Number:</strong> <span><span class="phone-country-code" data-val="in"></span>'.$primary_home_number.'</span>
                                <br>
                                <strong>Secondary Phone Number:</strong> <span><span class="phone-country-code" data-val="us"></span> '.$secondary_cell_number.'</span><br>
                                 <strong>Pet Profile Link:</strong><span> <a href="'.$pet_profile_link.'">Owner Profile</a </span>   
                                </div>
                                </div>
                               
                               
                                </div>';
                        endwhile;
                        exit();
                }else{
                    echo "</br><div class='not-found width-100'>No Results Found</div>";
                     exit();
                }  
     exit();

   }else{
    echo "dfd";
    exit();
   }
}




add_action("wp_ajax_PetLostAndFoundFilter", "LostAndFoundFilter");
add_action("wp_ajax_nopriv_PetLostAndFoundFilter", "LostAndFoundFilter"); 

function LostAndFoundFilter(){
    if ( isset($_POST) && !empty( $_POST ) ) {
        $meta_input  = array();
        $meta_input1  = array('relation'=>'OR');
        $new_meta = array();
        //print_r($meta_input);

        // array_push($meta_input);
    
        if($_POST['Status']!='NULL'){ 
            // $meta_input['pet_status'] = $_POST['Status'];
            array_push($meta_input, array('key'=>'pet_status','value'=>$_POST['Status']));
        }          
        if($_POST['PetType']!='NULL'){
            // $meta_input['pet_type'] = $_POST['PetType'];
            array_push($meta_input, array('key'=>'pet_type','value'=>$_POST['PetType']));
        }
        if($_POST['State']!='NULL'){ 
            array_push($meta_input, array('key'=>'state','value'=>$_POST['State']));
            // $meta_input['state'] =$_POST['State'];
        }
        if($_POST['Country']!='NULL'){ 
            array_push($meta_input, array('key'=>'country','value'=>$_POST['Country']));
            // $meta_input['country'] = $_POST['Country'];
        }
        if(!empty($_POST['zip_code'])){


            // $meta_input['zip_code'] = $_POST['zip_code'];
            array_push($meta_input, array('key'=>'zip_code','value'=>$_POST['zip_code']));
        }
            $new_Data = array_merge($meta_input1,$meta_input);
        

    } 
    $args = array(
                'post_type' => 'lost_found_pets',
            'post_per_page'=>'5',
            'order'  => 'ASC',
            'meta_query' => $new_Data
                   );
    $the_query = new WP_Query($args);



    if( $the_query->have_posts() ){ 
        while( $the_query->have_posts() ) : $the_query->the_post();
    
            $smtid = get_post_meta(get_the_ID(),"smarttag_id_number",true); 
             $pet_type = get_post_meta(get_the_ID(),"pet_type",true);


                if($pet_type == 587){
                  $pets_type = 'Cat';
                }else if($pet_type == 1045){
                  $pets_type = 'Dog';
                }else if($pet_type == 1046){
                  $pets_type = 'Ferret';
                }else if($pet_type == 588){
                  $pets_type = 'Horse';
                }else if($pet_type == 1048){
                  $pets_type = 'Other';
                }else{
                  $pets_type = 'Rabbit';
                }



            $reward = get_post_meta(get_the_ID(),"reward",true);   

            $city = get_post_meta(get_the_ID(),"city",true);   
            $state = get_post_meta(get_the_ID(),"state",true);   
            $country = get_post_meta(get_the_ID(),"country",true);  
            $lostdt = get_post_meta(get_the_ID(),"pet_lost_date",true);   
            $status = get_post_meta(get_the_ID(),"pet_status",true); 
           
            $post_link  = get_permalink( get_the_ID() );
           
            $title = get_the_title(get_the_ID()); 
            if (has_post_thumbnail( get_the_ID() ) ):
                $image = wp_get_attachment_image_src( get_post_thumbnail_id( ), 'single-post-thumbnail' );?>
            <?php endif; 
            echo '<div class="lost-found-col">
                <div class="lost-found-col-inner">
                    <div class="lost-found-img">
                        <a href="'.$post_link.'" class="more-info-link"><img src="'.$image[0].'" /></a>
                    </div>
                        <a href="'. $post_link.'" class="more-info-link"><h3 class="lost-found-title">'. $title.'</h3></a>
                        <p><strong>ID Tag #: </strong>'.$smtid.'</p>
                        <p><strong>Pet Type/Breed: </strong>'.$pets_type.'</p>
                        <p><strong>Reward: </strong>'. '$'.$reward.'</p>
                        <p><strong>Lost Area: </strong>'. $city.','.$state.','.$country.'</p>
                        <p><strong>Date Lost: </strong>'.$lostdt.'</p>
                    <div class="lost-found-mi">
                        <a href="'. $post_link.'" class="more-info-link">More Info <i class="fa fa-caret-right"></i></a>
                    </div>
                    <div class="lost-found-rm">
                       <a href="https://idtag.agiliscloud.com/report-found-pet/?pid='.get_the_ID().'&title='. $title.'" class="site-btn site-btn-red">I Found This Pet <i class="fa fa-caret-right"></i></a>
                    </div>
                </div>
            </div>';
        endwhile;
    }else{
        echo "<div class='not-found-text width-100'>Pets Not Found</div>";
        exit();
    }                        
    exit();
}   
add_action("wp_ajax_OenerEdit", "PetOenerEdit");
add_action("wp_ajax_nopriv_OenerEdit", "PetOenerEdit"); 

function PetOenerEdit(){
    $user_id = $_POST['CusID'];
   echo '<div class="acc-blue-box">
                <div class="acc-blue-head">
                    Primary Contact Information
                </div>
                <div class="acc-blue-content">
                        <fieldset aria-label="Step Two" tabindex="-1" id="step-2" class="step-form-box">
                        <form id="ContInfo" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="" id="OwnId" value="'.$user_id.'">
                        <div class="contact-form" id="sections">
                            <div class="field-wrap two-fields-wrap">
                                <div class="field-div">
                                <label>First Name: </label>
                                <input type="text" name="first_name" placeholder="" id="PriBrd" class="Onrdata" pre="'.get_user_meta($user_id, 'first_name', true).'" value="'.get_user_meta($user_id, 'first_name', true).'" />
                            </div>
                            <div class="field-div">
                                <label>Last Name: </label>
                                <input type="text" name="last_name" placeholder="Address line 2" id="SecBrd" class="Onrdata" pre="'.get_user_meta($user_id, 'last_name', true).'" value="'.get_user_meta($user_id, 'last_name', true).'" />
                            </div>
                        </div>
                            <div class="field-wrap">
                                <div class="field-div">
                                <label>Country: </label>
                                <input type="text" name="primary_country" placeholder="Address line 1" id="PriBrd" class="Onrdata" pre="'.get_user_meta($user_id, 'primary_country', true).'" value="'.get_user_meta($user_id, 'primary_country', true).'" />
                                </div>
                            </div>
                    <div class="field-wrap two-fields-wrap">
                        <div class="field-div">
                            <label>Address: </label>
                            <input type="text" name="primary_address_line1" placeholder="Enter SmartTag Serial Number " class="Onrdata" pre="'.get_user_meta($user_id, 'primary_address_line1', true).'" value="'.get_user_meta($user_id, 'primary_address_line1', true).'" />
                        </div>
                        <div class="field-div">
                            <label>&nbsp;</label>
                            <input type="text" name="primary_address_line2" placeholder="" class="Onrdata" pre="'.get_user_meta($user_id, 'primary_address_line2', true).'" value="'.get_user_meta($user_id, 'primary_address_line2', true).'" />
                        </div>
                    </div>
                        <div class="field-wrap two-fields-wrap">
                            <div class="field-div">
                               <label>&nbsp;</label>
                                <input type="text" name="primary_color" placeholder="Address line 1" id="PrmColor" class="Onrdata" pre="'.get_user_meta($user_id, 'primary_color', true).'" value="'.get_user_meta($user_id, 'primary_color', true).'" />
                            </div>
                            <div class="field-div">
                            <div class="field-wrap two-fields-wrap">
                             <div class="field-div">
                                <label>&nbsp;</label>
                                <input type="text" name="secondary_color" placeholder="Address line 2" id="SecColor" class="Onrdata" pre="'.get_user_meta($user_id, 'secondary_color', true).'" value="'.get_user_meta($user_id, 'secondary_color', true).'" />
                              </div>
                              <div class="field-div">
                                <label>&nbsp;</label>
                                <input type="text" name="" placeholder="Address line 2" id="SecColor" class="Onrdata" pre="'.get_user_meta($user_id, 'secondary_color', true).'" value="'.get_user_meta($user_id, 'secondary_color', true).'" />
                              </div>
                            </div>
                        </div>
                       </div>             
                        <div class="field-wrap two-fields-wrap">
                            <div class="field-div">
                                <label>Primary Phone Number: </label>
                                <input type="text" name="primary_home_number" placeholder="Address line 1" id="Siz" class="Onrdata" pre="'.get_user_meta($user_id,'primary_home_number',true).'" value="'.get_user_meta($user_id,'primary_home_number',true).'" />
                            </div>
                            <div class="field-div">
                                <label>Secondary Phone Number: </label>
                                <input type="text" name="primary_cell_number" placeholder="Address line 1" id="Siz" class="Onrdata" pre="'.get_user_meta($user_id,'primary_cell_number',true).'" value="'.get_user_meta($user_id,'primary_cell_number',true).'" />
                            </div>
                            </div>
                        <div class="field-wrap two-fields-wrap">
                            <div class="field-div">
                            <label>Receive Urgent Alerts?</label>
                                <div class="field-wrap two-fields-wrap">
                                    <div class="field-div">
                                    <input type="checkbox" class="Onrdata" pre="'.get_user_meta($user_id,'primary_home_number',true).'" value="'.get_user_meta($user_id,'primary_home_number',true).'" />Yes
                                    </div>
                                    <div class="field-div">
                                    <input type="checkbox" class="Onrdata" pre="'.get_user_meta($user_id,'primary_home_number',true).'" value="'.get_user_meta($user_id,'primary_home_number',true).'" />No
                                    </div>
                                </div>
                             </div>
                        </div>
                    </div>
                <div class="text-center">
                    <button class=" btn=" "="" btn-default="" text-center"="" type="submit">Save</button>
                </div>  
            </form>
        </fieldset>
    </div>
</div>';
   
}

add_action("wp_ajax_OwnerUpdate", "PetProfessionalOwnerUpdate");
add_action("wp_ajax_nopriv_OwnerUpdate", "PetProfessionalOwnerUpdate"); 

function PetProfessionalOwnerUpdate(){
     unset($_POST['action']);
    foreach ($_POST as $key => $value) {
        $val = explode(',',$value);
        update_user_meta( $val[0] , $key , $val[2] , $val[1]);
    }
    echo "Successfully Update";
   exit();
}

add_action("wp_ajax_ValidSmartTag", "SmartTagIdValid");
add_action("wp_ajax_nopriv_ValidSmartTag", "SmartTagIdValid");

function SmartTagIdValid(){
     if(is_user_logged_in()){
     $valid = hasBoughtIDTag($_POST['id']);
        if($valid == 1){
            echo json_encode(array('success'=>'1'));
        }else{
            echo json_encode(array('success'=>'0','id'=>$_POST['id']));
        }  
     }else{
     echo json_encode(array('success'=>'2'));
 }   
 
exit();
} 

add_action("wp_ajax_checkSmartTagIDValid", "checkSmartTagIDValid");
add_action("wp_ajax_nopriv_checkSmartTagIDValid", "checkSmartTagIDValid");
function checkSmartTagIDValid(){

    if (isset($_POST['smartTagID'])) {
        $id     = $_POST['smartTagID'];
        $rs     = hasBoughtIDTag($id);
        $result = 1;
        $msg    = '';
        if ($rs) {
            if(checkSmartIDTagPetProfile($id) != true){
                $result = 0;
                $msg    = 'This ID Already Registered';
            }
        }else{
            $result = 0;
            $msg    = 'This ID is not valid';
        }
     
      echo json_encode(array( 'success' => true,'result' => $result, 'msg' => $msg));
    }
    exit();
}

add_action("wp_ajax_checkMicrochipIDValid", "checkMicrochipIDValid");
add_action("wp_ajax_nopriv_checkMicrochipIDValid", "checkMicrochipIDValid");
function checkMicrochipIDValid(){

    if (isset($_POST['smartTagID'])) {
        $id     = $_POST['smartTagID'];
        $rs     = hasBoughtIDTag($id);
        $result = 1;
        $msg    = '';
        if ($rs) {
            if(checkMicrochipIDPetProfile($id) != true){
                $result = 0;
                $msg    = 'This ID Already Registered';
            }
        }else{
            $result = 0;
            $msg    = 'This ID is not valid';
        }
        // echo true;
       echo json_encode(array('result' => $result, 'msg' => $msg));
    }
    exit();
}



function checkSerialNumberFromDatabase($id){
    global $wpdb;

     $get_row = $wpdb->get_results('SELECT * FROM `wp_serial_number_data` where `serial_number`="'.$id.'"');
       if(count($get_row) >= 1){
            $res =  1; //find

         }else{
            $res =  0;//not find
         }

     return $res;
}



add_action("wp_ajax_isMicrochipIdValid", "isMicrochipIdValidCallback");
add_action("wp_ajax_nopriv_isMicrochipIdValid", "isMicrochipIdValidCallback");
function isMicrochipIdValidCallback(){
    global $microchipPrefixArray;
    if (isset($_POST['action']) && $_POST['action']=='isMicrochipIdValid') {

        $microchip_id = $_POST['microchip_id'];
        $microchip_id = str_replace(' ', '', $microchip_id);
        $microchip_id_prefix = substr($microchip_id, 0, 6);
        
        if(!in_array($microchip_id_prefix, $microchipPrefixArray)){ //validate predefined prefix of michrochip id
            echo json_encode(array("status"=>false, "message"=> "This id is not a microchip id, <a target='_blank' href='/our-services/universal-microchip-register-new/?id=".$microchip_id."'>Click Here</a> to register Universal microchip id.</span>"));

        }else if(checkSerialNumberFromDatabase($microchip_id) == 1){ // check microchip id is exsists or not
            echo json_encode(array("status"=>false, "message"=> "Microchip is already used."));

        }else if(checkMicrochipIDPetProfile($microchip_id) != true){ // check microchip id is used by pet profile
            echo json_encode(array("status"=>false, "message"=> "This Microchip id is already assigned to the pet." ));
        }else{
            $msg = 'Valid SmartTag MichroChip';
            $myarray = array("status"=>true,"message"=> $msg );
            echo json_encode($myarray);
        }
        
        exit();        
    }
}
//test start
add_action("wp_ajax_checkMicrochipIDValid1", "checkMicrochipIDValid1");
add_action("wp_ajax_nopriv_checkMicrochipIDValid1", "checkMicrochipIDValid1");
function checkMicrochipIDValid1(){

    if (isset($_POST['action'])=='checkMicrochipIDValid1') {

       global $serialNumberPrefix1,$serialNumberPrefix2,$serialNumberPrefix3,$serialNumberPrefix4;
        $result = substr($_POST['smarttag_id_number'], 0, 6);
        $validSerialPrefix = array($serialNumberPrefix1, $serialNumberPrefix2, $serialNumberPrefix3,$serialNumberPrefix4);
        $id = $_POST['smarttag_id_number'];

       $serialNumberExist = checkSerialNumberFromDatabase($id);
       if (in_array( $result, $validSerialPrefix)){
         
            $result = 1;
            $msg = '';
            /*if ($serialNumberExist) {*/
            if(checkMicrochipIDPetProfile($id) != true){
                $result = 0;
                $msg = 'This ID Already Registered';
                $myarray = array("status"=>"302","result"=>"exist", "message"=> $msg );
                echo json_encode($myarray);
            }else{
                $msg = 'Valid SmartTag MichroChip';
                $myarray = array("status"=>"200","result"=>"success", "message"=> $msg );
                echo json_encode($myarray);
           }
       /*}else{

                 $msg = "This is not a valid SmartTag microchip. If it is another company's microchip,For Universal Microchip Registration";
                $myarray = array("status"=>"406","result"=>"fail","message"=> $msg);
                   echo json_encode($myarray);
            }*/

        }else if($serialNumberExist){
            if(checkMicrochipIDPetProfile($id) != true){
                $result = 0;
                $msg    = 'This ID Already Registered';
                $myarray = array("status"=>"302","result"=>"exist", "message"=> $msg );
                echo json_encode($myarray);
             }else{
                $msg = 'Valid SmartTag MichroChip';
                $myarray = array("status"=>"200","result"=>"success", "message"=> $msg );
                echo json_encode($myarray);
            }
        }else{
            
            $msg = "This is not a valid SmartTag microchip. If it is another company's microchip,For Universal Microchip Registration";
            $myarray = array("status"=>"406 ","result"=>"fail", "message"=> $msg );
            echo json_encode($myarray);
        }

    }else{
       $msg    = 'Please Enter Smart MichroChip';
       $myarray = array("status"=>"406","result"=>"fail", "message"=> $msg );
       echo json_encode($myarray);
    }
        
           exit();

}




function checkValidSmartTagId($smartTagID){

    if (!empty($smartTagID)) {
        $id     = $smartTagID;
        //$rs     = hasBoughtIDTag($id);
       $serialNumberExist = checkSerialNumberFromDatabase($id);
        $result = 1;
        $msg    = '';
        if ($serialNumberExist) {
            if(checkSmartIDTagPetProfile($id) != true){
                $result = 0;
                 $msg    = 'This ID Already Registered';
                    $myarray = array("status"=>"200","result"=>"exist", "message"=> $msg );
                    echo json_encode($myarray);
               
            }else{
                $msg    = '';
                    $myarray = array("status"=>"200","result"=>"success", "message"=> $msg );
                    echo json_encode($myarray);
            }
        }else{
            $result = 0;
            $msg = "Unable to Find given SmartId";
            $myarray = array("status"=>"200","result"=>"notValid","message"=> $msg);
              echo json_encode($myarray);
           
        }
    }else{
        return "false";
    }
}





add_action("wp_ajax_checkSmartTagIDValid_on_webhook", "checkSmartTagIDValid_on_webhook");
add_action("wp_ajax_nopriv_checkSmartTagIDValid_on_webhook", "checkSmartTagIDValid_on_webhook");


function checkSmartTagIDValid_on_webhook(){

    $smartTagID = $_POST['smarttag_id_number'];

        global $wpdb;

         $get_row = $wpdb->get_results('SELECT * FROM `wp_postmeta` where `meta_key`="smarttag_id_number"  AND `meta_value`="'.$smartTagID.'"');
                if(count($get_row) == 0){
                     $result = 1;
                    $msg    = '';
                    
                   $myarray = array("status"=>"200","result"=>"success", "message"=> $msg );
                   echo json_encode($myarray);
               
            }else{
                    $msg = 'This Id is already assign to another pet';
                    $myarray = array("status"=>"404","result"=>"already", "message"=> $msg );
                    echo json_encode($myarray);

             }

             exit();
      
    }


add_action("wp_ajax_checkSmartTagIDValid_testing", "checkSmartTagIDValid_test");
add_action("wp_ajax_nopriv_checkSmartTagIDValid_testing", "checkSmartTagIDValid_test");
function checkSmartTagIDValid_test(){
   
    $smartTagID = $_POST['smarttag_id_number'];
    echo checkValidSmartTagId($smartTagID) ;
    exit();
}

//test end

if (!function_exists ('phone_exists')) {
    function phone_exists($phone){
        $phones  = preg_replace('~.*(\d{3})[^\d]{0,7}(\d{3})[^\d]{0,7}(\d{4}).*~', '($1) $2-$3', $phone). "\n";
        if($phones){
            $args = array(
                'meta_key' => 'primary_home_number',
                'meta_value' => trim($phones),
                'number' => 1,
                'count_total' => true,
                'operator' => 'LIKE',
            );

        }else{
            $args = array(
                'meta_key' => 'primary_home_number',
                'meta_value' => trim($phone),
                'number' => 1,
                'count_total' => true,
                 'operator' => 'LIKE',
            );
        }

        $user = reset(get_users($args)); 
        if ($user) {
            $result['success'] = 1;
            $result['user'] = $user;
            return $result;
        }else{
            $result['success'] = 0;
            return $result;
        }
    }
}

add_action('wp_ajax_ourServicesUpdatePetInfo', 'ourServicesUpdatePetInfo');
add_action('wp_ajax_nopriv_ourServicesUpdatePetInfo', 'ourServicesUpdatePetInfo');
function ourServicesUpdatePetInfo(){
    $_POST['title'] = $_POST['pet_name'];
    $result = updatePetInformation($_POST, $_POST['petId'], false);
    if ($_FILES['feature']['size'] > 0) {
        $image = updateFeatureImage($_FILES,$_POST['petId']);
    }else{
        $image['success'] = 0;
        $image = json_encode($image);
    }
    $results['pet']     = json_decode($result);
    $results['image']   = json_decode($image);
    echo json_encode($results);
    exit();
}
// updatePetInformation

add_action('wp_ajax_set_temp_session', 'set_temp_session_custom_products');
add_action('wp_ajax_nopriv_set_temp_session', 'set_temp_session_custom_products');

function set_temp_session_custom_products(){
   $str = $_POST['post'];
   
   $data = unserializeForm($str);
   $_SESSION['type']  = $data['type'];

   $_SESSION['size']  = $data['size']; 
     
   $_SESSION['style'] = $data['style'];
   
   $_SESSION['color'] = $data['color'];
   
   $_SESSION['dataProduct'] = $data['dataProduct'];
   
die;
}
 
 //unserialize data 
function unserializeForm($str) {
    $returndata = array();
    $strArray = explode("&", $str);
    $i = 0;
    foreach ($strArray as $item) {
        $array = explode("=", $item);
        $returndata[$array[0]] = $array[1];
    }

    return $returndata;
}


//get session variables
add_action('wp_ajax_get_session', 'get_session_custom_products');
add_action('wp_ajax_nopriv_get_session', 'get_session_custom_products');
function get_session_custom_products(){
    // echo json_encode(array("test"=>"test"));
    echo json_encode(array("type"=>$_SESSION['type'],"size"=>$_SESSION['size'],"style"=>$_SESSION['style']));
    exit();
}

if( !function_exists('salient_register_emails_filter_replace')):
    function  salient_register_emails_filter_replace( $email) {
        $user = get_user_by( 'email', $email );
        $name = $user->user_login;
        $link = get_option('siteurl').'/?action=email_confirmation&user_id='.$user->ID.'&email='.$email;

        $message = 'Hi '.$name.',<br><br>Please <a href="'.$link.'">confirm your email address.</a><br><br>Thanks!<br>Admin';

        $subject = "Confirm your Registration on SmartTag";

        $new_order_settings = get_option( 'woocommerce_new_order_settings', array() );

        $mailer          = WC()->mailer();

        // create a new email
        $emaill = new WC_Email();

        // wrap the content with the email template and then add styles
        $message = $emaill->style_inline( $mailer->wrap_message( $subject, $message ) );

        wp_mail( $email, $subject, $message ); 

        // print the preview email
        // wp_mail($email,$subject,$message);

    }
endif;

add_action( 'init', 'sl_email_confirmation_callback' );
if( !function_exists('sl_email_confirmation_callback') ):
    function sl_email_confirmation_callback(){

        if( isset( $_GET['action'] ) && ( $_GET['action'] == 'email_confirmation' ) ){
            $user_id    = $_GET['user_id']; //
            $email      = $_GET['email'];
            $user = get_user_by( 'email', $email );
            $name = $user->user_login;
            if( email_exists( $email ) ){
                if (get_user_meta( $user_id, 'sl_email_confirmation', true) == 'true'){
                    wp_redirect( get_bloginfo('url').'/link-expired/' );
                    exit();
                } 
                update_user_meta( $user_id, 'sl_email_confirmation', 'true' );
                $user_meta  = get_userdata( $user_id );

                $user_roles = $user_meta->roles;

                $email_content = 'Hi '.$name.',<br><br>Congratulations on joining the SmartTag.<br><br>Thanks!<br>Admin';
                $subject = "Welcome To SmartTag";

                $mailer = WC()->mailer();

                $emaill = new WC_Email();

                // wrap the content with the email template and then add styles
                $email_content = $emaill->style_inline( $mailer->wrap_message( $subject, $email_content ) );

                wp_mail( $email, $subject, $email_content ); 
                
                // wp_mail($email,"Welcome To SmartTag",$email_content);
                wp_redirect( get_bloginfo('url').'/thank-you-email/' );
                exit;           
            }
        }
    }
endif;

function wpse27856_set_content_type(){
    return "text/html";
}
add_filter( 'wp_mail_content_type','wpse27856_set_content_type' );


add_action('wp_ajax_checkUserExist', 'checkUserExist');
add_action('wp_ajax_nopriv_checkUserExist','checkUserExist');

function checkUserExist(){
    if(email_exists($_POST['p_email'])){
        echo json_encode(array('success'=>0,'message'=>'This email already exist'));
    }else{
        echo json_encode(array('success'=>1));
    }
    exit();
}

add_action('wp_ajax_checkUserPhoneExist', 'checkUserPhoneExist');
add_action('wp_ajax_nopriv_checkUserPhoneExist','checkUserPhoneExist');

function checkUserPhoneExist(){
    $phone = phone_exists($_POST['primary_phone_number']);
    if ($phone['success'] == 1 && isset($_POST['ownerId']) && $_POST['ownerId']) {
        if ($phone['user']->ID == $_POST['ownerId']) {
            echo json_encode(array("success"=>0));
            exit();
        }
    }
    echo json_encode(phone_exists($_POST['primary_phone_number']));
    exit();
}

add_action('wp_ajax_checkUserPhoneExiststeps', 'checkUserPhoneExiststeps');
add_action('wp_ajax_nopriv_checkUserPhoneExiststeps','checkUserPhoneExiststeps');

function checkUserPhoneExiststeps(){
    $res = phone_exists($_POST['primary_phone_number']);
     $userID = get_current_user_id();
     $primary_home_number = get_user_meta( $userID,'primary_home_number', true); 
     if ($res['success'] == 1) {
        $id = $res['user']->ID;
        if ($userID == $id) {
            echo "true"; exit();
        }else{
            echo "false"; exit();
        }
     }else{
        echo "true"; exit();
     }
    
    
    exit();
}

add_action('wp_ajax_checkSerialNumberExist', 'checkSerialNumberExist');
add_action('wp_ajax_nopriv_checkSerialNumberExist','checkSerialNumberExist');

function checkSerialNumberExist(){
    $serial = $_POST['serialNumber'];
    $rs = hasBoughtIDTag($serial);
    if ($rs) {
        if (strlen((string)$serial) == 8) {
            $smarTagID = $serial;

            if(checkSmartIDTagPetProfile($smarTagID) != true){
                echo json_encode(array('success'=>0,'message'=>'This ID Already Registered.'));
            }else{
                echo json_encode(array('success'=>1,"message"=>"smartTagID"));
            }
        }elseif (strlen((string)$serial) == 15) {
            $microchipId = $serial;

            if(checkMicrochipIDPetProfile($microchipId) != true){
                echo json_encode(array('success'=>0,'message'=>'This ID Already Registered.'));
            }else{
                echo json_encode(array('success'=>1,"message"=>"Microchi ID"));
            }

        }else{
            echo json_encode(array('success'=>0,'message'=>'Invalid serial id.'));
        }
    }else{
        echo json_encode(array('success'=>0,'message'=>'Invalid serial id.'));
    }
    exit();
}

function checkSerialNumberExist2($serial){
    
    $rs     = hasBoughtIDTag($serial);

    if ($rs) {
        if (strlen((string)$serial) == 8) {
            $smarTagID = $serial;

            if(checkSmartIDTagPetProfile($smarTagID) != true){
                return json_encode(array('success'=>0,'message'=>'This ID Already Registered.'));
            }else{
                return json_encode(array('success'=>1,"message"=>"smartTagID"));
            }
        }elseif (strlen((string)$serial) == 15) {
            $microchipId = $serial;

            if(checkMicrochipIDPetProfile($microchipId) != true){
                return json_encode(array('success'=>0,'message'=>'This ID Already Registered.'));
            }else{
                return json_encode(array('success'=>1,"message"=>"Microchi ID"));
            }

        }else{
            return json_encode(array('success'=>0,'message'=>'Invalid serial id.'));
        }
    }else{
        return json_encode(array('success'=>0,'message'=>'Invalid serial id.'));
    }
    exit();
}
// lock wp-admin for pet professional customers
function ace_block_wp_admin() {
    if ( is_admin() && ! current_user_can( 'administrator' ) && ! ( defined( 'DOING_AJAX' ) && DOING_AJAX ) ) {
        wp_safe_redirect( home_url() );
        exit;
    }
}
add_action( 'admin_init', 'ace_block_wp_admin' );
add_action( 'wp_enqueue_scripts', 'misha_deactivate_pass_strength_meter', 10 );
function misha_deactivate_pass_strength_meter() {
 
    wp_dequeue_script( 'wc-password-strength-meter' );
}

/*******************
 * Modify the User Search in Admin to include first, last names.
 * Add sorting by name if search string starts with 'byname:'.
*/
// add_action('pre_user_query','mam_pre_user_query');
function mam_pre_user_query($user_search) {
   global $wpdb;
   // print_r($user_search);
   $vars = $user_search->query_vars;
   if (!is_null($vars['search'])) {
      /* For some reason, the search term is enclosed in asterisks.
         Remove them */
      $search = preg_replace('/^\*/','',$vars['search']);
      $search = preg_replace('/\*$/','',$search);
      $user_search->query_from .= " INNER JOIN {$wpdb->usermeta} m1 ON " .
         "{$wpdb->users}.ID=m1.user_id AND (m1.meta_key='first_name')";
      $user_search->query_from .= " INNER JOIN {$wpdb->usermeta} m2 ON " .
         "{$wpdb->users}.ID=m2.user_id AND (m2.meta_key='last_name')";
 
      // IF the search var starts with byname:, sort by name.
      if (preg_match('/^byname:/',$search)) {
         $search = preg_replace('/^byname:/','',$search);
         $user_search->query_orderby = ' ORDER BY UPPER(m2.meta_value), UPPER(m1.meta_value) ';
         $user_search->query_vars['search'] = $search;
         $user_search->query_where = str_replace('byname:','',$user_search->query_where);
      }
      
      $names = explode(' ',$search,2);
        if(count($names)){
            $first_name = $names[0];
            $last_name = $names[1];
            $names_where = $wpdb->prepare("m1.meta_value LIKE '%s' OR m2.meta_value LIKE '%s' OR (m1.meta_value LIKE '%s' AND m2.meta_value LIKE '%s')", "%{$search}%","%$search%","%$first_name%","%$last_name%");
        }else{
           $names_where = $wpdb->prepare("m1.meta_value LIKE '%s' OR m2.meta_value LIKE '%s'", "%{$search}%","%$search%");
        }

      //$names_where = $wpdb->prepare("m1.meta_value LIKE '%s' OR m2.meta_value LIKE '%s'",
        // "%{$search}%","%$search%");
      $user_search->query_where = str_replace('WHERE 1=1 AND (',
         "WHERE 1=1 AND ({$names_where} OR ",$user_search->query_where);
   }
   //print_r('<br />SEARCH OBJECT: ');print_r($user_search);
   //print_r('<br />SEARCH TERM: ');print_r($search);
   //print_r('<br />QUERY_FROM: ');print_r($user_search->query_from);
   //print_r('<br />NAMES_WHERE: ');print_r($names_where);
   //print_r('<br />QUERY_WHERE: ');print_r($user_search->query_where);
}



//update woocoomerce coupon message
remove_filter( 'woocommerce_coupon_code', 'strtolower' ); // Remove coupons case-insensitive filter

function example_callback($image){
    return "large";
}


function checkImageSize(){
    print_r($_FILES);die;
}
// add_filter( 'woocommerce_get_image_size_swatches_image_size', 'example_callback' );





add_action('wp_ajax_checkEmailExistMultiple', 'checkEmailExistMultiple');
add_action('wp_ajax_nopriv_checkEmailExistMultiple','checkEmailExistMultiple');
function checkEmailExistMultiple(){

    if(empty($_POST['userEmail'])){
            $_POST['userEmail'] = $_POST['p_email'];
        }else{
            $_POST['p_email'] = $_POST['p_email'];
        }



   
    if(email_exists($_POST['userEmail']) && !is_user_logged_in()){
        echo "false";
    }elseif(!email_exists($_POST['userEmail']) && !is_user_logged_in()){
        echo "true";
    }else{
        if (is_user_logged_in()) {
            $currentUser = wp_get_current_user();
            $email       = $currentUser->user_email;
            if ($email == $_POST['userEmail']) {
                echo 'true';
                exit();
            }
        }
        echo "true";
    }
    exit();
}








add_action('wp_ajax_checkEmailExist', 'checkValidEmail');
add_action('wp_ajax_nopriv_checkEmailExist','checkValidEmail');
function checkValidEmail(){

    if(empty($_POST['userEmail'])){
            $_POST['userEmail'] = $_POST['p_email'];
        }else{
            $_POST['p_email'] = $_POST['p_email'];
        }



   
    if(email_exists($_POST['userEmail']) && !is_user_logged_in()){
        echo "false";
    }elseif(!email_exists($_POST['userEmail']) && !is_user_logged_in()){
        echo "true";
    }else{
        if (is_user_logged_in()) {
            $currentUser = wp_get_current_user();
            $email       = $currentUser->user_email;
            if ($email == $_POST['userEmail']) {
                echo 'true';
                exit();
            }
        }
        echo "true";
    }
    exit();
}

add_action('wp_ajax_removePetProfile', 'removeExsistingPetProfile');
add_action('wp_ajax_nopriv_removePetProfile','removeExsistingPetProfile');
function removeExsistingPetProfile(){
        $userId = get_current_user_id();
        
        if (is_user_logged_in() && ($_POST['userId'] == $userId)) {
            $post_id = $_POST['petProID'];
            $status = "draft";

            $post_id = wp_update_post([
                'ID' => $post_id,
                'post_status' => $status,
              ], true);

            if (is_wp_error($post_id)){
                $response = "false";

            } else{
                $response = "true";
                $url = site_url("/my-account/");
            }  
        }else{
            $response = "false";
        }
        
        echo json_encode(array("res"=>$response,"url"=>$url));
    exit();
}


add_action('wp_ajax_checkPrimaryExists', 'checkprimary_phone');
add_action('wp_ajax_nopriv_checkPrimaryExists','checkprimary_phone');
function checkprimary_phone(){

        if(empty($_POST['priary_phone'])){
            $_POST['priary_phone'] = $_POST['p_prm_no'];
        }else{
            $_POST['p_prm_no'] = $_POST['p_prm_no'];
        }


    if((isset($_POST['priary_phone'])) && (check_phone_exists($_POST['priary_phone']) == 'true')){
        echo 'true';
    }else{
        if (is_user_logged_in()) {
            $userId = get_current_user_id();
            $phone  = get_user_meta($userId,"primary_home_number",true);
            if ($phone == $_POST['priary_phone']) {
                echo 'true';
                exit();
            }
        }
        echo 'false';
    }
    exit();
}









function check_phone_exists($phone){
    $args = array(
        'meta_key' => 'primary_home_number',
        'meta_value' => $phone,
        'number' => 1,
        'count_total' => true
    );
    $get_users = get_users($args);
    $user = reset($get_users); 
    if ($user) {
        return 'false';
    }else{
        return 'true';
    }
}

add_filter( 'woocommerce_ship_to_different_address_checked', '__return_false' );

/* OLD */
/*function stateName($stateCode){
    $countries_obj = new WC_Countries();
    $allState = $countries_obj->__get('states');
    foreach ($allState as $key => $value) {
        if(!empty($value)){
            foreach ($value as $statekey => $statevalue) {
                if($statekey == $stateCode){
                    return $statevalue;
                }
            }
        }   
    }
    return $stateCode;
}*/

/* NEW */
function stateName($stateCode ="", $countryCode=""){
    $countries_obj = new WC_Countries();
    $allState = $countries_obj->__get('states');

    foreach ($allState as $key => $value) {
        if(!empty($value)){
            if ($key == $countryCode) {
                foreach ($value as $statekey => $statevalue) {
                    if($statekey == $stateCode){
                        return $statevalue;
                    }
                }
            }
        }   
    }
    return false;
}

function getCountryName($countryCode){
    $countriesObj = new WC_Countries();
    $countries    = $countriesObj->__get('countries');
    foreach ($countries as $key => $value) {
        if ($key == $countryCode) {
            return $value;
        }
    }
    return false;
}

function steateListbystatecode($stateCode){
    $countries_obj = new WC_Countries();
    $allState = $countries_obj->__get('states');
    foreach ($allState as $key => $value) {
        if(!empty($value)){
            foreach ($value as $statekey => $statevalue) {
                if($statekey == $stateCode){
                    return createDropdown($value, $stateCode);
                }
            }
        }   
    }
    return false;
}

function createDropdown($stateList,$stateCode){
    $state = array();
    $state[0] = '<option value="">State</option>';
    foreach ($stateList as $key => $value) {
        $selected = "";
        if($key == $stateCode){
            $selected = 'selected="selected"';
        }
        $state[] = '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';
    }
    $string = implode("",$state);
    return $string;
}


// =========================================================

/*when author update, then owner_email meta field also update in pet profile..*/
add_action('post_updated', 'prefix_on_update_author', 10, 3);
function prefix_on_update_author($post_ID, $post_after, $post_before){

    $authorId = $post_after->post_author;
    $postID = $post_ID;
    $authoEmail = get_the_author_meta('user_email',$authorId);
    $first_name = get_the_author_meta('first_name',$authorId);
    $last_name = get_the_author_meta('last_name',$authorId);
    
    $name = $first_name." ".$last_name;
    if($post_after->post_author != $post_before->post_author){
         $_POST['pods_meta_owner_email']= $authoEmail;
         $_POST['pods_meta_owner_name']= $name;
    }
}

/*custom filter in pet profile*/
function searchfilter($query){

    $post_type = 'pet_profile';
    $custom_fields = array(
                        "_pet-name",
                        "_microchip-id-number",
                    );

    if( ! is_admin() )
        return;
    // print_r($query->query);
    if ( $query->query['post_type'] != $post_type )
        return;

    $search_term = $query->query_vars['s'];

    // Set to empty, otherwise it won't find anything
    $query->query_vars['s'] = '';

    if ( $search_term != '' ) {
        $meta_query = array( 'relation' => 'OR' );

        foreach( $custom_fields as $custom_field ) {
            array_push( $meta_query, array(
                'key' => $custom_field,
                'value' => $search_term,
                'compare' => 'LIKE'
            ));
        }
        
        $query->set( 'meta_query', $meta_query );
        // return;
    };

}
add_filter('pre_get_posts', 'searchfilter');

function segnalazioni_search_join ( $join ) {
    
    global $pagenow, $wpdb;
    
    // I want the filter only when performing a search on edit page of Custom Post Type named "segnalazioni".
    if ( is_admin() && 'edit.php' === $pagenow && 'pet_profile' === $_GET['post_type'] && ! empty( $_GET['s'] ) ) {    
        $join .= 'LEFT JOIN ' . $wpdb->postmeta . ' ON ' . $wpdb->posts . '.ID = ' . $wpdb->postmeta . '.post_id ';
    }
    return $join;
}
add_filter( 'posts_join', 'segnalazioni_search_join' );


function segnalazioni_search_where( $where ) {
    global $pagenow, $wpdb;

    // I want the filter only when performing a search on edit page of Custom Post Type named "segnalazioni".
    if ( is_admin() && 'edit.php' === $pagenow && 'pet_profile' === $_GET['post_type'] && ! empty( $_GET['s'] ) ) {
        
        $where = preg_replace(
            "/\(\s*" . $wpdb->posts . ".post_title\s+LIKE\s*(\'[^\']+\')\s*\)/",
            "(" . $wpdb->posts . ".post_title LIKE $1) OR (" . $wpdb->postmeta . ".meta_value LIKE $1)", $where );
        
    }
    return $where;
}
add_filter( 'posts_where', 'segnalazioni_search_where' );

function checkEmail($email) {
   $find1 = strpos($email, '@');
   $find2 = strpos($email, '.');
   return ($find1 !== false && $find2 !== false && $find2 > $find1);
}


function add_author_support_to_posts() {
    add_post_type_support( 'pet_profile', 'author' );

}
add_action( 'init', 'add_author_support_to_posts' );

//https://prelaunch.idtag.com/wp-admin/edit.php?post_type=pet_profile
/*custom filter in pet profile end code*/

add_action( 'wp_ajax_userLiveSearch', 'userSearchInLiveSearchByPetPro' );
function userSearchInLiveSearchByPetPro(){
    if (isset($_GET['userId'])) {
        $userId = $_GET['userId'];
    }else{
        $userId = get_current_user_id();
    }
    $search_string = $_GET['term'];
    $exclude_user  = explode(",", $_GET['notRepeat']);
    unset($exclude_user[count($exclude_user)-1]);
    $users = new WP_User_Query( array(
        'exclude'        => $exclude_user,
        'role__not_in'   => 'pet_professional',
        'search'         => "*{$search_string}*",
        'search_columns' => array(
            'user_login',
            'user_nicename',
            'user_email',
            'user_url',
        ),
        'meta_query' => array(
            'relation' => 'AND',
                array(
                    'key'     => 'created_by',
                    'value'   => $userId,
                    'compare' => '='
                )
        )
    ) );

    $firstNameUsers = new WP_User_Query( array(
        'exclude'       => $exclude_user,
        'role__not_in'  => 'pet_professional',
        'meta_query' => array(
            'relation' => 'AND',
            array(
                'key'     => 'created_by',
                'value'   => $userId,
                'compare' => '='
            ),
            array(
                'key'     => 'first_name',
                'value'   => $search_string,
                'compare' => 'LIKE'
            )
        )
    ) );
    $userFound  = $firstNameUsers->get_results();
    $usersFound = $users->get_results();
    if (!empty($userFound)) {
        foreach ($userFound as $key => $user) {
            $metch = 0;
            foreach ($usersFound as $uKey => $singleUser) {
                if ($singleUser->ID == $user->ID) {
                    $metch = 1;
                }
            }
            if (!$metch) {
               $usersFound[] = $userFound[$key];
            }
        }
    }
    
    if (count($usersFound) > 0) {
        $usersFound = json_decode(json_encode($usersFound),true);
        if (count($usersFound) > 1) {
            foreach ($usersFound as $key => $value) {
                $usersFound[$key]["userMeta"] = get_user_meta($value['ID']);
                if (!empty($usersFound[$key]["userMeta"]['first_name'][0])) {
                    $firstName = $usersFound[$key]["userMeta"]['first_name'][0];
                }else{
                    $firstName = $value['data']['display_name'];
                }
                $label = $firstName." (".$value['data']['user_email'].")";
                $value = $value['data']['user_email'];
                $usersFound[$key]["label"] = $label;
                $usersFound[$key]["value"] = $value;
            }
        }elseif (count($usersFound) == 1) {
            $usersFound[0]["userMeta"] = get_user_meta($usersFound[0]['ID']);
            if (!empty($usersFound[0]["userMeta"]['first_name'][0])) {
                $firstName = $usersFound[0]["userMeta"]['first_name'][0];
            }else{
                $firstName = $usersFound[0]['data']['display_name'];
            }
            $label = $firstName." (".$usersFound[0]['data']['user_email'].")";
            $value = $usersFound[0]['data']['user_email'];
            $usersFound[0]["label"] = $label;
            $usersFound[0]["value"] = $value;
        }
    }
    echo json_encode($usersFound); exit;
}


add_action('wp_ajax_userInstantLogin', 'userInstantLoginstepform');
add_action('wp_ajax_nopriv_userInstantLogin','userInstantLoginstepform');

function userInstantLoginstepform(){
    $email = $_POST['email'];
    $password = $_POST['password'];
    if(!is_user_logged_in()){
        $creds = array(
            'user_login'    => $email,
            'user_password' => $password,
            );
            $loginuser = wp_signon($creds);
            if ( is_wp_error( $loginuser ) ) {
                
                echo json_encode(array('success'=>0,'message'=>$loginuser->get_error_message()));
                exit();
            }else{
                 echo json_encode(array('success'=>1,'message'=>'test'));
            }
    }else{
        json_encode(array('success'=>0,'message'=>'User already registered'));
    }
    die;
}

// Change sender adress
add_filter( 'woocommerce_email_from_address', function( $from_email, $wc_email ){
    
    $user = wp_get_current_user();

    if ( in_array( 'pet_professional', (array) $user->roles ) || in_array( 'wholesaler', (array) $user->roles )  ) {
        $from_email = "microchip@idtag.com";
    }else if ( in_array( 'subscriber', (array) $user->roles ) || in_array( 'customer', (array) $user->roles ) ) {
        $from_email = "info@idtag.com";
    }
    
     return $from_email;
}, 10, 2 );


add_shortcode( 'custom-password-lost-form', 'render_password_lost_form' );

function render_password_lost_form( $attributes, $content = null ) {
    // Parse shortcode attributes
    $default_attributes = array( 'show_title' => false );
    $attributes = shortcode_atts( $default_attributes, $attributes );
 
    if ( is_user_logged_in() ) {
        return __( 'You are already signed in.', 'personalize-login' );
    } else {
        return $this->get_template_html( 'password_lost_form', $attributes );
    }
}

add_action('wp_ajax_get_pet_breeds', 'get_pet_breeds_by_tagId');
add_action('wp_ajax_nopriv_get_pet_breeds','get_pet_breeds_by_tagId');

function get_pet_breeds_by_tagId(){
    
    if(!empty($_POST['typeId'])){
        $parentId = $_POST['typeId'];
        $terms = get_terms( array(
            'taxonomy' => 'pet_type_and_breed',
            'hide_empty' => false,
            'parent' => $parentId,
        ) );
        
        $option = "";
        if(!empty($terms)){
            $option .= "<option value=''>Select</option>";
            foreach ($terms as $key => $value) {
                $selected = "";
                if(!empty($_POST['primary_breed']) && ( $value->term_taxonomy_id == $_POST['primary_breed']) ){
                    $selected = "selected";
                }
                $option .= "<option ".$selected." value='". $value->term_taxonomy_id ."'>".$value->name."</option>";
              
            }
        }
        
        echo json_encode(array("res"=>"success","data"=>$option));
        
    }
    exit();
}

/*parent breeds*/
function get_top_parents( $taxonomy ) {
     
     $terms = get_terms( array(
            'taxonomy' => $taxonomy,
            'hide_empty' => false,
            'parent' => 0,
        ) );
        if($terms){
            $i = 0;
            foreach ($terms as $key => $value) {
                $array[$i]['term_id'] = $value->term_id;
                $array[$i]['name'] = $value->name;
                $i++;
            }
            return $array;
        }else{
            return false;
        }
}

function trigger_pet_insurence_Reminder(){

    global $wpdb;
    $date = date("Y-m-d");
    $date = date("Y-m-d", (strtotime ( "-7 day" , strtotime ( $date) ) ));
    
    $petProfiles = $wpdb->get_results("SELECT wp_posts.* FROM wp_posts  WHERE ( DATE(wp_posts.post_date) = '".$date."') AND wp_posts.post_type = 'pet_profile' AND wp_posts.post_status = 'publish' ORDER BY wp_posts.post_date DESC");
   
    foreach ($petProfiles as $post) {
        $user = get_userdata($post->post_author);
        if($user){
            $email = $user->user_email;
           // complimentary_petfirst_insurance_confirmation($email);
        }
    }

    exit();
}

/* point no 10 */
function pet_insurence_reminder($user_id){
   
       /* $user_info = get_userdata($user_id);
        $email = $user_info->user_email;

        $subject = "PetFirst Insurance Reminder";
        $heading = "PetFirst Insurance Reminder";

        $message = "Hello Valued SmartTag Customer,"."\r\n\r\n";
 
        $message .=  "Every SmartTag customer will be receiving a FREE 30 days of Pet Medical
                          Insurance, provided by PetFirst, as part of your SmartTag benefits."."\r\n";
             
        $message .= "You must call 855-454-7387 to activate this 30 day complimentary insurance, so don't wait.Veterinary costs continue to rise, and at SmartTag we want to provide you with an introductory pet insurance plan to help reimburse you for your pet's veterinary expenses. We are the only ID Tag company to include pet insurance with our membership."."\r\n";
             
        $message .= "Pet Medical Insurance Plan details:"."\r\n";
             
        $message .= "Aggregate Benefit Limit: $1,000"."\r\n";
             
        $message .= "Per Incident Limit: $500"."\r\n";
             
        $message .= "Per Incident Deductible: $50"."\r\n";
             
        $message .= "Reimbursement: 90%"."\r\n\r\n";
             
        $message .= "You must call to activate this FREE pet insurance and to confirm your pet's details. Please call 855-454-7387 today, for your FREE 30 day Pet Medical Insurance."."\r\n\r\n";
        $message .= mailFooter();
    */
         $user_info = get_userdata($user_id);
        $email = $user_info->user_email;

        $subject = "Pawp offer.Reminder";
        $heading = "Pawp offer. Reminder";

        $message = "Hello Valued SmartTag Customer,"."\r\n\r\n";
 
        $message .=  "Every SmartTag customer will be receiving a FREE 30 days of Pet Medical
                          Insurance, provided by PetFirst, as part of your SmartTag benefits."."\r\n";
             
        $message .= "You must call 855-454-7387 to activate this 30 day complimentary insurance, so don't wait.Veterinary costs continue to rise, and at SmartTag we want to provide you with an introductory pet insurance plan to help reimburse you for your pet's veterinary expenses. We are the only ID Tag company to include pet insurance with our membership."."\r\n";
             
        $message .= "Pet Medical Insurance Plan details:"."\r\n";
             
        $message .= "Aggregate Benefit Limit: $1,000"."\r\n";
             
        $message .= "Per Incident Limit: $500"."\r\n";
             
        $message .= "Per Incident Deductible: $50"."\r\n";
             
        $message .= "Reimbursement: 90%"."\r\n\r\n";
             
        $message .= "You must call to activate this FREE pet insurance and to confirm your pet's details. Please call 855-454-7387 today, for your FREE 30 day Pet Medical Insurance."."\r\n\r\n";
        $message .= mailFooter();
    
//send_email_woocommerce_style("rohit@vkaps.com" , "PetFirst Insurance Reminder testing" , $heading , $message );
send_email_woocommerce_style($email , $subject , $heading , $message );
        
}

/* point no 11 */
function approve_testimonials($post ,$post_id){

    $email = get_post_meta($post_id, "email_testimonial" , true);
   
        $subject = "Your content on SmartTag has been Approved";
        $heading = "Your content on SmartTag has been Approved";

        $message  = "Your content on IDtag.com has been Approved" ."\r\n\r\n";
        $message .= mailFooter();

        send_email_woocommerce_style($email , $subject , $heading , $message );
        //send_email_woocommerce_style("rohit@vkaps.com" , $subject , $heading , $message );
        
}

/*custom gravity form templates*/


/*point no 13*/
function pet_has_found_confirmation(){

$subject = $petName." FOUND PET BULLETIN!";

$message =  "Dear". $pet_owner."\r\n";
 
$message .= $petName ."has been found!"."\r\n\r\n";
 
$message .= "SmartTag# ".$serialNumber."\r\n";
$message .= "We are very glad to inform you that [pet:title] has been found. In order to get your pet back home, immediately contact the finder at the following:"."\r\n";
 
$message .= "Finder’s Contact Info:"."\r\n";
$message .= "Name:"."[node:field_custom_idtag]"."\r\n";
$message .= "Phone:".$contact."\r\n";
$message .="Email:". $email."\r\n";
$message .="Address:". $address."\r\n";

$message .="If you cannot reach the person listed above, please contact our Live Emergency Support Team at (866) 60-FOUND (36863) 24 Hours a Day / 7 Days a week.Would you like to give us a testimonial about your experience with our service, and your lost pet story? If so then please email your story to support@idtag.com";

$message .= mailFooter();
 
}

/*point no 14*/

function pet_has_found_reunited_and_return_in_area($postId){

    $user_id =  get_current_user_id();
    $user     = get_userdata( $user_id );
    $email      = $user->user_email;
    
    $petTitle = get_post_meta($postId , "title" ,true);
    $address  = get_post_meta($postId , "address_line" ,true);
    $lostDate = get_post_meta($postId , "pet_lost_date" ,true);
    $reward   =  get_post_meta($postId , "reward" ,true);

    $subject = "PET HAS BEEN FOUND AND REUNITED IN YOUR AREA";
    $heading = "PET HAS BEEN FOUND AND REUNITED IN YOUR AREA";

    $message = "Update: A Pet has been found and Reunited with the owner in your area."."\r\n";

    $message .= "We would like to inform you that <b>". $petTitle ."</b> has been found and successfully reunited with its owner, and they are both very happy!"."\r\n";

    $message .= "Thank you for all that you do! "."\r\n\r\n";
    $message .= "Have a good day."."\r\n\r\n";
    $message .= "Pet's Last Seen Location:"."\r\n\r\n";

    $message .= "Date lost: ". $lostDate ."\r\n";
    $message .= "Address: ".$address."\r\n";
    $message .= "Wearing Collar: ".""."\r\n";
    $message .= "Reward: ".$reward."\r\n\r\n";
    $message .= "";

    $message .= mailFooter();
    send_email_woocommerce_style($email , $subject , $heading , $message );
    //send_email_woocommerce_style("rohit@vkaps.com" , $subject , $heading , $message );
}

/*Point no 15*/
function lostPetEmail( $serial="" , $postId , $phone="", $fax="" , $email="" ,$address =""){

        $petName = get_post_meta($postId , "title" ,true);
        

        $subject = $petName." LOST PET BULLETIN!";
        $heading = "LOST PET BULLETIN!";
     
        // $microchip_serial = "5646464646445";

        $message  = "Dear Valued SmartTag Customer," ."\r\n\r\n";

        $message .= "This message from SmartTag to confirm that you have reported your pet ".$petName." with SmartTag# ".$serial." as LOST. At SmartTag, we realize that this can be an extremely stressful time and we want you to know we are using all information available to ensure your pets safe return. We have attempted to notify all of the Shelters & Rescues Groups on file within a 50-mile radius of your pets last known location via email and/or fax  (see list below). The information for the local organizations is kept up to date regularly by SmartTag. However, it is advised to call each organization to ensure the notices were received.". "\r\n\r\n";

        $message .=   "Pet lost info: " . "\r\n\r\n" ;

        $message .= "Address: ". $address ."\r\n" ;
        $message .= "Phone: ". $phone . "\r\n";
        $message .= "Fax: " . $fax . "\r\n";
        $message .= "Email: " . $email . "\r\n\r\n";

        $message .= "Below is the list of Shelters and Rescue Groups we have notified within a 50 square mile radius of zip code regarding your lost pet,". $petName ."\r\n\r\n" ;

        $message .= "Should your pet be found, you will be notified directly via email and or phone once the finder contacts SmartTag for your information."."\r\n\r\n" ;
        
        $message .= mailFooter();

        send_email_woocommerce_style($email , $subject , $heading , $message );
       // send_email_woocommerce_style("rohit@vkaps.com" , $subject , $heading , $message );

}

/*point no 16*/
function microchip_registration_confirmation(){

    $subject = $petName."Microchip Registration - Transfer email";
    $heading = "Microchip Registration";

    $message = "Dear Valued SmartTag Customer,";
 
    $message .=    "Congratulations on registering your pet ".$petName." with the SmartTag Microchip Lifetime Plan. ".$petName." has been transferred to your account and is now protected for life! If you would like to upgrade your plan and get premium pet protection services please log into your account."."\r\n";
     
     
     
    $message .= "Microchip ID: ". $microchipId ."\r\n\r\n";
     
     
     
    $message .= "Please note, your microchip is activated! For added safety, you should log into your account and complete ".$petName."/owner profile."."\r\n";
     
    $message .= "Go to our website www.IDtag.com Click on the 'Account Login' which is on the upper right corner of our homepage and enter your email address and password."."\r\n\r\n";
    
    $message .= "Click on EDIT and fill ".$petName."’s information, veterinarian doctor’s information, and the secondary contact information."."\r\n\r\n";

    $message .=  "Upload a picture of our pet (you can upload up to 5 pictures)"."\r\n";
    $message .=   "Click on ‘Save Changes’ at the bottom of the page."."\r\n";
    $message .= "You can edit, add, and update the information at any time from any computer, for free! Also if ".$petName." loses his or her ID tag you can get a replacement at IDtag.com."."\r\n";
     
    $message .= "To view ".$petName." information, please navigate to the link below:"."\r\n";

    $message .= mailFooter();
    
    send_email_woocommerce_style($email , $subject , $heading , $message );
    send_email_woocommerce_style("rohit@vkaps.com" , $subject , $heading , $message );
}

/*  point no 17*/
function microchip_registration_success_confirmation( $petName, $email, $microchipId){



    $subject = "Congratulations on Registering ".$petName." with SmartTag";
    $heading = "Registering SmartTag";

    $message = "Dear Valued SmartTag Customer"."\r\n";

    $message .= "Congratulations on registering ".$petName." with SmartTag. We are contacting you about the SmartTag Microchip and ID tag you have received. We have activated your ID tag, your microchip is activated with our lifetime pet protection!"."\r\n\r\n";
 
    $message .= "It is advised that you take the time to complete ".$petName."/owner profile by logging into your account for added pet safety."."\r\n\r\n";
 
 
 
    $message .= "Please go to our website www.IDtag.comClick on the 'Account Login' which is on the upper right corner of our homepage and enter the email address and password listed below."."\r\n\r\n";

    $message .= "Click on EDIT and fill ".$petName."’s information, veterinarian doctor’s information, and the secondary contact information."."\r\n\r\n";

    $message .= "Upload a picture of our pet (you can upload up to 5 pictures)"."\r\n";
    $message .= "Finally, please click on ‘Save Changes’ at the bottom of the page."."\r\n\r\n";
    $message .= "Account Details"."\r\n";
    $message .= "Username:". $email."\r\n";
    $message .= "Microchip ID:". $microchipId."\r\n";
 
    $message .= "NOTE: For security purposes, please login and change your password."."\r\n";
 
    $message .= "Please note that you can edit, add, and update the information at any time from any computer, for free! Also if ".$petName." loses his or her ID tag you can get a replacement at".site_url()."."."\r\n";

    $message .= mailFooter();
    
    send_email_woocommerce_style($email , $subject , $heading , $message );
    send_email_woocommerce_style("rohit@vkaps.com" , $subject , $heading , $message );

}

/*point no 18*/
function smartTag_registration_confirmation(){


    $subject = "Congratulations on Registering ".$petName." with SmartTag";
    $heading = "SmartTag Registration";

    $message =  "Dear Valued SmartTag Customer,"."\r\n";
 
    $message .= "Congratulations on registering your pet ".$petName." with SmartTag. We have activated your microchip with [subscriptions:value]. If you would like to get premium pet protection services please go to our website and review the added protection you can get with premium protection plans."."\r\n";
     
     
     
    $message .= "Microchip ID: [serial:value]"."\r\n";

     
     
     
    $message .= "Please place your metal ID Tag on ".$petName."'s collar. If ".$petName." loses his or her SmartTag, you can get a replacement at IDtag.com"."\r\n";

     
    $message .= "There are over 30 styles and colors, with engraving options too."."\r\n";

     
     
    $message .= "Please note, your microchip is activated! For added safety, you should log into your account and complete ".$petName."/owner profile."."\r\n";

     
    $message .= "Go to our website www.IDtag.comClick on the 'Account Login' which is on the upper right corner of our homepage and enter your email address and password."."\r\n";


    $message .= "Click on EDIT and fill ".$petName."’s information, veterinarian doctor’s information, and the secondary contact information."."\r\n";


    $message .= "Upload a picture of our pet (you can upload up to 5 pictures)"."\r\n";


    $message .= "Click on ‘Save Changes’ at the bottom of the page."."\r\n";

    $message .= "You can edit, add, and update the information at any time from any computer, for free! Also if ".$petName." loses his or her ID tag you can get a replacement at IDtag.com."."\r\n";


    $message .= mailFooter();
    send_email_woocommerce_style("gaurav@vkaps.com" , $subject , $heading , $message );send_email_woocommerce_style("rohit@vkaps.com" , $subject , $heading , $message );
    send_email_woocommerce_style($email , $subject , $heading , $message );
     

}


/* point no 19*/
function petIsuranceReminder($email){
    $subject = 
    $message  = "Hello Valued SmartTag Customer"."\r\n\r\n";
    
    $message  .= "Every SmartTag customer will be receiving a FREE 30 days of Pet Medical
        Insurance, provided by PetFirst, as part of your SmartTag benefits."."\r\n\r\n";
    
    $message  .= "You must call 855-454-7387 to activate this 30 day complimentary insurance, so don't wait."."\r\n\r\n";
    
    $message  .= "Veterinary costs continue to rise, and at SmartTag we want to provide you with an introductory pet insurance plan to help reimburse you for your pet's veterinary expenses. We are the only ID Tag company to include pet insurance with our membership."."\r\n\r\n";
    
    $message  .= "Pet Medical Insurance Plan details:"."\r\n\r\n";
    
    $message  .= "Aggregate Benefit Limit: $1,000"."\r\n\r\n";
    
    $message  .= "Per Incident Limit: $500"."\r\n\r\n";
    
    $message  .= "Per Incident Deductible: $50"."\r\n\r\n";
    
    $message  .= "Reimbursement: 90%"."\r\n\r\n";
    
    $message  .= "You must call to activate this FREE pet insurance and to confirm your
    pet's details. Please call 855-454-7387 today, for your FREE 30 day Pet
    Medical Insurance."."\r\n\r\n";

    $message .= mailFooter();

    //send_email_woocommerce_style("rohit@vkaps.com" , $subject , $heading , $message );
    send_email_woocommerce_style($email , $subject , $heading , $message );
    die;

}

/*point no 20*/

function complimentary_petfirst_insurance_confirmation($email){
    


    $subject = "IMPORTANT: SmartTag - Complimentary Petfirst Insurance But You Must Call To Activate, Don't Wait.";

    $heading = "IMPORTANT: SmartTag - Complimentary Petfirst Insurance But You Must Call To Activate, Don't Wait.";

    $message = "Hello Valued SmartTag Customer,"."\r\n\r\n";
 
    $message .= "Every SmartTag customer will be receiving a FREE 30 days of Pet Medical Insurance, provided by PetFirst, as part of your SmartTag benefits."."\r\n\r\n";
     
    $message .= "You must call 855-454-7387 to activate this 30 day complimentary insurance, so don't wait.Veterinary costs continue to rise, and at SmartTag we want to provide you with an introductory pet insurance plan to help reimburse you for your pet's veterinary expenses. We are the only ID Tag company to include pet insurance with our membership."."\r\n\r\n";
     
    $message .= "Pet Medical Insurance Plan details:"."\r\n\r\n";
     
    $message .= "Aggregate Benefit Limit: $1,000"."\r\n\r\n";
     
    $message .= "Per Incident Limit: $500"."\r\n\r\n";
     
    $message .= "Per Incident Deductible: $50"."\r\n\r\n";
     
    $message .= "Reimbursement: 90%"."\r\n\r\n";
     
    $message .= "You must call to activate this FREE pet insurance and to confirm your pet's details. Please call 855-454-7387 today, for your FREE 30 day Pet Medical Insurance."."\r\n\r\n";
    
    $message .= mailFooter();

    /*send_email_woocommerce_style("gaurav@vkaps.com" , $subject , $heading , $email );
    send_email_woocommerce_style("rohit@vkaps.com" , $subject , $heading , $message );*/
    send_email_woocommerce_style($email , $subject , $heading , $message );
}
/*point no 24*/

function forgot_password_mail($userName , $email , $link) {

    global $loginUrl;
    
    $subject = "SmarTag Password Reset";
    $heading = "SmarTag Password Reset";


    $message  .= "Hello ".$userName.",". "\r\n";
    $message  .= "SmartTag has received a password reset request for your account on Please click this link to reset your password and log in.". "\r\n\r\n";

   $message .= "<a href=".$link.">Click Here</a>"."\r\n\r\n";       
    $message  .= "If you did not make this password reset request, you can ignore this message or contact us via support@idtag.com or (201) 537-5644 for further assistance or to verify your account."."\r\n\r\n";
    $message  .= "Thank you,"."\r\n\r\n";
    $message  .= " SmartTag Team;,"."\r\n\r\n";
  
    //$message  .= mailFooter();

    //send_email_woocommerce_style("rohit@vkaps.com" , $subject , $heading , $message );
    send_email_woocommerce_style($email , $subject ,$heading, $message );
 }


function forgot_password($userName , $email , $link) {

    global $loginUrl;

    $subject = "Replacement login information for ".$userName." at SmartTag";
    $heading = "Replacement login information";
    $message  .= "Hello ".$userName.",". "\r\n";
         
    $message  .= "Thank you for registering at <a href='".site_url()."'>".site_url()."</a>. You may now log in by clicking this link or copying and pasting it to your browser:". "\r\n\r\n";
         
    $message  .= "<a href='".$link."'>".$link."</a>". "\r\n\r\n";
         
    $message  .= "This link can only be used once to log in and will lead you to a page where you can set your password. After setting your password, you will be able to log in at <a href='".$loginUrl."'>".$loginUrl."</a> in the future using:"."\r\n\r\n";
                  
    $message  .= mailFooter();

    //send_email_woocommerce_style("rohit@vkaps.com" , $subject , $heading , $message );
    send_email_woocommerce_style($email , $subject , $heading , $message );
 }

/*point no 25*/
// add_action( 'user_register', 'so174837_registration_email_alert', 10, 1 );
function so174837_registration_email_alert( $userId ) {
        global $loginUrl;
        $user       = get_userdata( $user_id );
        $email      = $user->user_email;
        
        $username   =  $_POST['p_email'];
        $password   =  $_POST['password'];

        
        $subject    = "Account details for " .$username ."at".  get_bloginfo( 'name' ) ; 
        $heading    =   "User Registration";

       
        $loginstr   = "<a href =".$loginUrl.">".$loginUrl."</a>";


        $message  = "Hello " . $username.","."\r\n\r\n";
        $message .= "Thank you for registering at ". get_bloginfo( 'name' ).". You may now log in by clicking this link or copying and pasting it to your browser:". "\r\n\r\n";
        $message .=   $loginstr . "\r\n\r\n" ;
        $message .= "This link can only be used once to log in and will lead you to a page where you can set your password. After setting your password, you will be able to log in at ".$loginstr." in the future using:"."\r\n\r\n" ;

        $message .= "username: ". $username . "\r\n";
        $message .= "password: " . $password . "\r\n\r\n";

        $message .= mailFooter();

        // send_email_woocommerce_style("rohit@vkaps.com" , $subject , $heading , $message );

        send_email_woocommerce_style($email , $subject , $heading , $message );
        

}


function send_email_woocommerce_style($email, $subject, $heading, $message) {

    
  // Get woocommerce mailer from instance
  $mailer = WC()->mailer();
  // Wrap message using woocommerce html email template
  $wrapped_message = $mailer->wrap_message($heading, $message);
  // Create new WC_Email instance
  $wc_email = new WC_Email;
  // Style the wrapped message with woocommerce inline styles
  $html_message = $wc_email->style_inline($wrapped_message);
  // Send the email using wordpress mail function
  //wp_mail( $email, $subject, $html_message, HTML_EMAIL_HEADERS );
  wp_mail( $email, $subject, $html_message);
  
}

function mailFooter(){
    

        $footer = "SmartTag Benefits:". "\r\n\r\n";
        $footer .= "Instant Pet “Amber Alert” with a full pet profile, sent to all shelter and rescue groups within a 50-mile radius of the pet’s last known location.". "\r\n";

        $footer .= "24/7 Live lost pet call center to field and directly connect all calls, to reunite pets with their owners.". "\r\n";

        $footer .= "A metal collar ID tag.". "\r\n";

        $footer .= "Free pet and owner profile updates anytime.". "\r\n";

        $footer .= "All SmartTag microchips are registered with national AAHA registry.". "\r\n";
        $footer .= "Free Pet Medical Insurance (30 days of pet insurance – accidents and illnesses covered) Must call to activate, PetFirst at 855-454-7387.". "\r\n";
        
        $footer .= "Instant Lost Pet Posters generated with a click of a button.". "\r\n";
        
        $footer .= "Lost pets are posted on Facebook.". "\r\n\r\n";

        $footer .= "Warm regards,". "\r\n";
        $footer .= "SmartTag Customer Service". "\r\n";

        return $footer;

}


add_action( 'wp', 'redirect' );
function redirect() {
  if ( is_page('my-account') && !is_user_logged_in() ) {
      wp_redirect( home_url('/login-to-smarttag/?login=1') );
      die();
  }
}

add_action( 'gform_pre_submission_16', 'set_pre_post_content', 10, 2 );

function set_pre_post_content( $entry, $form ) {

    $subject = "NEW HERO RECOMMENDATION";
    $heading = "NEW HERO RECOMMENDATION";
    
    $message = "Submitted on: ".date("Y:m:d")."\r\n";
    $message .= "Submitted by user: " .$_POST['input_1']."\r\n";
                        

    $message .= "Submitted values are:"."\r\n";
    

    $message .= "Phone Number: ".$_POST['input_3'] ."\r\n";
    $message .= "Recommended Hero's Phone Number: ".$_POST['input_3'] ."\r\n";
    $message .= "The results of this submission may be viewed at:"."\r\n";
    $message .= "<a href='".site_url("/")."'>".site_url("/")."</a>\r\n";

   
    $message .= "Click here to unsubscribe from this email."."\r\n\r\n";
   
    $message .= mailFooter();

    $admin_email = get_option('admin_email');

   // send_email_woocommerce_style("rohit@vkaps.com" , $subject , $heading , $message );
    send_email_woocommerce_style($admin_email , $subject , $heading , $message );
    

    // //changing post content
    // $post->post_content = 'Blender Version:' . rgar( $entry, '7' ) . "<br/> <img src='" . rgar( $entry, '8' ) . "'> <br/> <br/> " . rgar( $entry, '13' ) . " <br/> <img src='" . rgar( $entry, '5' ) . "'>";
 
    // //updating post
    // wp_update_post( $post );
}

add_action('woocommerce_new_order', 'thankYouMail');

function thankYouMail($order_id) { 

    $status = get_post_meta($order_id, 'send_thank_msg', true);
    $key = get_post_meta($order_id, '_order_key', true);

    $first_name = get_post_meta($order_id, '_billing_first_name', true);
    $last_name = get_post_meta($order_id, '_billing_last_name', true);
    $email = get_post_meta($order_id, '_billing_email', true);
    $phone_number = get_post_meta($order_id, '_billing_phone', true);
    $address1 = get_post_meta($order_id, '_billing_address_1', true);
    $city = get_post_meta($order_id, '_billing_city', true);
    $state = get_post_meta($order_id, '_billing_state', true);
    $zip = get_post_meta($order_id, '_billing_postcode', true);




    
    if(!$status){
        $subject = "Order #".$order_id." at ".get_bloginfo( 'name' );
        $heading = "Thank you for your order";       
        $orderUrl = site_url()."/checkout/order-received/".$order_id."/?key=".$key;

        $msg = "Thank you for your order, your order number is ".$order_id." at <b>".get_bloginfo( 'name' )."</b>.\r\nIf this is your first order with us, you will receive a separate e-mail with login instructions. You can view your order history with us at any time by logging into our website at:\r\n\r\n<a href='".site_url()."'>".site_url()."</a>\r\n\r\nYou can find the status of your current order at:\r\n\r\n<a href='".$orderUrl."'>".$orderUrl."</a>\r\n\r\nPlease contact us if you have any questions about your order.";
        update_post_meta( $order_id, 'send_thank_msg', true);

        //send_email_woocommerce_style("gaurav@vkaps.com" , $subject , $heading , $msg );
        send_email_woocommerce_style($email , $subject , $heading , $msg );
    }

    $carts = WC()->cart->cart_contents;
 /*   if(!empty($carts)){
        foreach ( $carts as $cart ) {

            $product_id = $cart['product_id'];
            
            if ($product_id == 6137 || $product_id == 7804) {*/

              /*  $msg = "Hello Valued SmartTag Customer,\r\n\r\nEvery SmartTag customer will be receiving a FREE 30 days of Pet Medical\r\nInsurance, provided by PetFirst, as part of your SmartTag benefits.\r\n\r\nYou must call 855-454-7387 to activate this 30 day complimentary insurance, so don't wait.\r\n\r\nVeterinary costs continue to rise, and at SmartTag we want to provide you with an introductory pet insurance plan to help reimburse you for your pet's veterinary expenses. We are the only ID Tag company to include pet insurance with our membership.\r\n\r\nPet Medical Insurance Plan details:\r\n\r\nAggregate Benefit Limit: $1,000\r\n\r\nPer Incident Limit: $500\r\n\r\nPer Incident Deductible: $50\r\n\r\nReimbursement: 90%\r\n\r\nYou must call to activate this FREE pet insurance and to confirm your pet's details. Please call 855-454-7387 today, for your FREE 30 day Pet Medical Insurance.\r\n\r\nSmartTag Benefits:\r\n\r\nInstant Pet “Amber Alert” with a full pet profile, sent to all shelter and rescue groups within a 50-mile radius of the pet’s last known location.\r\n24/7 Live lost pet call center to field and directly connect all calls, to reunite pets with their owners.\r\nA metal collar ID tag.\r\nFree pet and owner profile updates anytime.\r\nAll SmartTag microchips are registered with national AAHA registry.\r\nAll ID tags and microchips are searchable in online search.\r\nFree Pet Medical Insurance (30 days of pet insurance – accidents and illnesses covered) Must call to activate, PetFirst at 855-454-7387.\r\nInstant Lost Pet Posters generated with a click of a button.\r\nLost pets are posted on Facebook.\r\nWarm Regards,\r\n\r\nSmartTag Customer Service";
                $subject = "PetFirst Insurance Reminder";
                $heading = "";   
               // send_email_woocommerce_style("gaurav@vkaps.com" , $subject , $heading , $msg );
                send_email_woocommerce_style($email , $subject , $heading , $msg );   
                break;*/
       /*     }
        }
    }


    */





}

function checkSubscriptionExpire($day){
    $date = date("Y-m-d");
    $date = date("Y-m-d", (strtotime ( '+'.$day.' day' , strtotime ( $date) ) ));
    $subscriptions = array(
        'numberposts' => -1,
        'post_type'   => 'shop_subscription', // Subscription post type
        'post_status' => 'wc-active', // Active subscription
        'meta_query' => array( // Start & end date
            array(
                'key' => "_schedule_next_payment",
                'value' => $date,
                'compare' => '=',
                'type' => "date"
            ),
        ),
    );

    $query = new WP_Query($subscriptions);
    while( $query->have_posts() ) : $query->the_post();

        $subscription = new WC_Subscription( get_the_ID() );
        foreach ($subscription->get_items() as $itemKey => $itemData) {
            if($itemData['product_id'] == 6137){
                $subsName = $itemData->get_name();
                $firstName = get_post_meta(get_the_ID(), '_billing_first_name', true);
                $lastName = get_post_meta(get_the_ID(), '_billing_last_name', true);
                $email = get_post_meta(get_the_ID(), '_billing_email', true);

                $subject = "IDTAG Alerts";
                $heading = "IDTAG Alerts"; 

                if($day == 7){
                    $msg = "Dear ".$firstName." ".$lastName.",\r\n\r\n\r\nWe would like to inform you that your SmartTag for ".$subsName." is up for renewal on ".$date.". Your plan is set to renew on this date,should we have any problems processing your credit card on file, we will contact you via email.\r\n\r\nSmartTag ID\r\n\r\nIf you wish to renew ahead of time, please login to your account and renew manually or call (201) 537 – 5644 (9am-5pm EST, 7 days a week).\r\n\r\nLOGIN TO MY ACCOUNT\r\n\r\nIf ".get_bloginfo( 'name' )."'s ID tag is not activated, the information associated with the ID tag will no longer be visible to our lost pet emergency support center and our service will be deactivated, that notifies shelters if your pet is lost. If you have any questions or need further assistance, please contact SmartTag at support@idtag.com or call (201) 537 – 5644 (9am-5pm EST, 7 days a week).\r\n\r\nSmartTag Benefits:\r\n\r\nInstant Pet “Amber Alert” with a full pet profile, sent to all shelter and rescue groups within a 50-mile radius of the pet’s last known location.\r\n24/7 Live lost pet call center to field and directly connect all calls, to reunite pets with their owners.\r\nA metal collar ID tag. (Brass or Aluminum)\r\nFree pet and owner profile updates anytime.\r\nAll ID tags and microchips are searchable in online search.\r\nFree Pet Medical Insurance (30 days of pet insurance – accidents and illnesses covered) Must call to activate, PetFirst at 855-454-7387.\r\nInstant Lost Pet Posters generated with a click of a button.\r\nLost pets are posted on Facebook.\r\n\r\nSincerely,\r\n\r\nSmartTag Customer Care Department\r\n\r\nBy selecting a 1 year or 5 year protection plan, Customer hereby authorizes SmartTag to maintain and charge the customer's credit card of record automatically 30 days before the date of expiration of the subscription plan. Customer agrees that the card will be automatically charged each year for a new 1 year subscription plan, every 5th year for a 5 year plan, unless customer contacts SmartTag via phone to cancel their subscription plan. If you do not respond stating you do not want to continue your service, your pet protection service will be automatically continued according to your subscription plan, and your credit card on file will be charged for subscription renewal. All service plans will be charged 30 days prior to expiration to ensure owners maintain active ID tags for their pets. If a charge fails to renew, owners will be contacted so there is time to update the billing information on file to ensure tags are active.";
                }else{
                    $msg = "Dear ".$firstName." ".$lastName.",\r\n\r\n\r\nYour SmartTag for ".$subsName." is up for renewal on ".$date.". Your pet protection plan is set to renew on this date,should we have any problems processing your credit card on file, we will contact you via email.\r\n\r\nSmartTag ID\r\n\r\nIf you wish to renew ahead of time, please login to your account and renew manually or call (201) 537 – 5644 (9am-5pm EST, 7 days a week).\r\n\r\nLOGIN TO MY ACCOUNT\r\n\r\nIf ".get_bloginfo( 'name' )."'s ID tag is not activated, the information associated with the ID tag will no longer be visible to our lost pet emergency support center and our service will be deactivated, that notifies shelters if your pet is lost. If you have any questions or need further assistance, please contact SmartTag at support@idtag.com or call (201) 537 – 5644 (9am-5pm EST, 7 days a week).\r\n\r\nSmartTag Benefits:\r\n\r\nInstant Pet “Amber Alert” with a full pet profile, sent to all shelter and rescue groups within a 50-mile radius of the pet’s last known location.\r\n24/7 Live lost pet call center to field and directly connect all calls, to reunite pets with their owners.\r\nA metal collar ID tag. (Brass or Aluminum)\r\nFree pet and owner profile updates anytime.\r\nAll ID tags and microchips are searchable in online search.\r\nFree Pet Medical Insurance (30 days of pet insurance – accidents and illnesses covered) Must call to activate, PetFirst at 855-454-7387.\r\nInstant Lost Pet Posters generated with a click of a button.\r\nLost pets are posted on Facebook.\r\n\r\nSincerely,\r\n\r\nSmartTag Customer Care Department\r\n\r\nBy selecting a 1 year or 5 year protection plan, Customer hereby authorizes SmartTag to maintain and charge the customer's credit card of record automatically 30 days before the date of expiration of the subscription plan. Customer agrees that the card will be automatically charged each year for a new 1 year subscription plan, every 5th year for a 5 year plan, unless customer contacts SmartTag via phone to cancel their subscription plan. If you do not respond stating you do not want to continue your service, your pet protection service will be automatically continued according to your subscription plan, and your credit card on file will be charged for subscription renewal. All service plans will be charged 30 days prior to expiration to ensure owners maintain active ID tags for their pets. If a charge fails to renew, owners will be contacted so there is time to update the billing information on file to ensure tags are active.";
                }
               // send_email_woocommerce_style("gaurav@vkaps.com" , $subject , $heading , $msg );
                send_email_woocommerce_style($email , $subject , $heading , $msg );
            }
        }
    endwhile;
}


// add_action('transition_post_status','wpse45803_transition_post_status',10,3);
// function wpse45803_transition_post_status($new_status,$old_status,$post){
//     if($new_status == "wc-on-hold" && $post->post_type == "shop_subscription"){
//         $subscription = new WC_Subscription( get_the_ID() );
//         foreach ($subscription->get_items() as $itemKey => $itemData) {
//             if($itemData['product_id'] == 6137){
//                 $subsName = $itemData->get_name();
//                 $firstName = get_post_meta(get_the_ID(), '_billing_first_name', true);
//                 $lastName = get_post_meta(get_the_ID(), '_billing_last_name', true);
//                 $email = get_post_meta(get_the_ID(), '_billing_email', true);

//                 $subject = "Special Offer - $5 OFF Coupon Today!";
//                 $heading = "IDTAG Alerts"; 

//                 $msg = "Dear ".$firstName." ".$lastName.",\r\n\r\n\r\nYour pet protection plan for ".$subsName." is still inactive. In order to receive continuous protection service from SmartTag, Please, renew your account. We want you back to protect your pet!\r\n\r\nSmartTag ID\r\n\r\nRenew your account TODAY and receive $5.00 OFF (Use the following coupon code online), Use Coupon Code: DISCOUNT\r\n\r\nLOGIN TO MY ACCOUNT\r\n\r\nPlease login to your account to Re-Activate your ID tag. If you have any questions or need further assistance, please contact SmartTag at [site:customer-service-email] or call [site:customer-service-phone] (9am-5pm EST, 7 days a week). Keep in mind, your credit card information on file might be invalid, please navigate to your Stored Cards tab and update your payment information.\r\n\r\nSmartTag Benefits:\r\n\r\nInstant Pet “Amber Alert” with a full pet profile, sent to all shelter and rescue groups within a 50-mile radius of the pet’s last known location.\r\n24/7 Live lost pet call center to field and directly connect all calls, to reunite pets with their owners.\r\nA metal collar ID tag. (Brass or Aluminum)\r\nFree pet and owner profile updates anytime.\r\nAll ID tags and microchips are searchable in online search.\r\nFree Pet Medical Insurance (30 days of pet insurance – accidents and illnesses covered) Must call to activate, PetFirst at 855-454-7387.\r\nInstant Lost Pet Posters generated with a click of a button.\r\nLost pets are posted on Facebook.\r\n\r\nSincerely,\r\n\r\nSmartTag Customer Care Department\r\n\r\nBy selecting a 1 year or 5 year protection plan, Customer hereby authorizes SmartTag to maintain and charge the customer's credit card of record automatically 30 days before the date of expiration of the subscription plan. Customer agrees that the card will be automatically charged each year for a new 1 year subscription plan, every 5th year for a 5 year plan, unless customer contacts SmartTag via phone to cancel their subscription plan. If you do not respond stating you do not want to continue your service, your pet protection service will be automatically continued according to your subscription plan, and your credit card on file will be charged for subscription renewal. All service plans will be charged 30 days prior to expiration to ensure owners maintain active ID tags for their pets. If a charge fails to renew, owners will be contacted so there is time to update the billing information on file to ensure tags are active.";
//                 send_email_woocommerce_style("gaurav@vkaps.com" , $subject , $heading , $msg );
//                 send_email_woocommerce_style($email , $subject , $heading , $msg );
//             }
//         }
//     }
// }

function getExpirySubscription($time){
    global $wpdb;
    $date = date("Y-m-d");
    $date = date("Y-m-d", (strtotime ( $time , strtotime ( $date) ) ));
    $subscriptions = $wpdb->get_results("SELECT wp_posts.* FROM wp_posts  WHERE 1=1  AND ( DATE(wp_posts.post_modified) = ".$date.") AND wp_posts.post_type = 'shop_subscription' AND ((wp_posts.post_status = 'wc-on-hold'))  ORDER BY wp_posts.post_date DESC ");
    foreach ($subscriptions as $post) {
        $subscription = new WC_Subscription( $post->ID );
        foreach ($subscription->get_items() as $itemKey => $itemData) {
            if($itemData['product_id'] == 6137){
                $subsName = $itemData->get_name();
                $firstName = get_post_meta(get_the_ID(), '_billing_first_name', true);
                $lastName = get_post_meta(get_the_ID(), '_billing_last_name', true);
                $email = get_post_meta(get_the_ID(), '_billing_email', true);

                $subject = "Special Offer - 35% OFF on any SmartTag Protection Plan Today";
                $heading = "IDTAG Alerts"; 

                $msg = "Dear ".$firstName." ".$lastName.",\r\n\r\n\r\nYour account for ".$subsName." is still inactive. In order to receive continuous protection service from SmartTag, Please, renew your account.\r\n\r\nSmartTag ID\r\n\r\nRenew your account TODAY and receive 35% OFF on any of our protection plans (Use the following coupon code online), Use Coupon Code: RENEW\r\n\r\nLOGIN TO MY ACCOUNT\r\n\r\nPlease login to your account to Re-Activate your ID tag. If you have any questions or need further assistance, please contact SmartTag at support@idtag.com or call (201) 537 – 5644 (9am-5pm EST, 7 days a week). Keep in mind, your credit card information on file might be invalid, please navigate to your Stored Cards tab and update your payment information.\r\n\r\nSmartTag Benefits:\r\n\r\nInstant Pet “Amber Alert” with a full pet profile, sent to all shelter and rescue groups within a 50-mile radius of the pet’s last known location.\r\n24/7 Live lost pet call center to field and directly connect all calls, to reunite pets with their owners.\r\nA metal collar ID tag. (Brass or Aluminum)\r\nFree pet and owner profile updates anytime.\r\nAll ID tags and microchips are searchable in online search.\r\nFree Pet Medical Insurance (30 days of pet insurance – accidents and illnesses covered) Must call to activate, PetFirst at 855-454-7387.\r\nInstant Lost Pet Posters generated with a click of a button.\r\nLost pets are posted on Facebook.\r\n\r\nSincerely,\r\n\r\nSmartTag Customer Care Department\r\n\r\nBy selecting a 1 year or 5 year protection plan, Customer hereby authorizes SmartTag to maintain and charge the customer's credit card of record automatically 30 days before the date of expiration of the subscription plan. Customer agrees that the card will be automatically charged each year for a new 1 year subscription plan, every 5th year for a 5 year plan, unless customer contacts SmartTag via phone to cancel their subscription plan. If you do not respond stating you do not want to continue your service, your pet protection service will be automatically continued according to your subscription plan, and your credit card on file will be charged for subscription renewal. All service plans will be charged 30 days prior to expiration to ensure owners maintain active ID tags for their pets. If a charge fails to renew, owners will be contacted so there is time to update the billing information on file to ensure tags are active.";
               // send_email_woocommerce_style("gaurav@vkaps.com" , $subject , $heading , $msg );
                send_email_woocommerce_style($email , $subject , $heading , $msg );
            }
        }
    }
}

add_action('pre_post_update','save_post_callback');
function save_post_callback($post_id){
    global $post;
    
    if ( ($post->post_type == 'testimonial') && ($post->post_status == 'publish') ){
        return;
    }
        if(!empty($post_id) && $post->post_type == 'testimonial'){
            approve_testimonials($post , $post_id);    
        }
    
    
    //if you get here then it's your post type so do your thing....
}

/*user deativate*/
/*https://cullenwebservices.com/wordpress-change-delete-a-user-to-inactivate-a-user-save-their-information/*/
add_filter('manage_users_columns', 'cc_add_user_id_column');
function cc_add_user_id_column($columns) {
    $columns['delete'] = 'Activate/Deactivate';
    $columns['status'] = 'Status';
    return $columns;
}
  
add_action('manage_users_custom_column',  'cc_show_user_id_column_content', 10, 3);
function cc_show_user_id_column_content($value, $column_name, $user_id) {
    
    $user = get_userdata( $user_id );
    if ( 'delete' == $column_name ) {
        // print_r($user_id);
        $status = get_user_meta($user_id, 'member_status', true);
        /*print_r($user->roles);die; */
        if (in_array('member',$user->roles) || in_array('customer',$user->roles) || in_array('subscriber',$user->roles)) {
          if ($status == 1) {
            return '<a href="/deactivate-user?usrid='.$user_id.'">deactivate</a>';
            
          } else {
              return '<a href="/activate-user?usrid='.$user_id.'">activate</a>';
              // return 'deactivate';
          }
        }
    }
    if ( 'status' == $column_name ) {
        $status =  get_user_meta($user_id, 'member_status', true);
        return ($status == 1) ? "activate" :"deactivate";
    }
    return $value;
}


 add_action( 'init', 'my_url_handler' );

function my_url_handler() {
    $current_user = wp_get_current_user();
    
    if(user_can( $current_user, 'administrator') && isset( $_GET['usrid']) && $_SERVER["REQUEST_URI"] == "/deactivate-user?usrid=".$_GET['usrid'] ){
        $user_id = $_GET['usrid'];
        update_user_meta($user_id,'member_status','0', '1');
        exit( wp_redirect("/wp-admin/users.php") );

    }

    if(user_can( $current_user, 'administrator')  && isset( $_GET['usrid']) && $_SERVER["REQUEST_URI"] == "/activate-user?usrid=".$_GET['usrid'] ){
        $user_id = $_GET['usrid'];
        update_user_meta($user_id,'member_status','1', '0');
        exit( wp_redirect("/wp-admin/users.php") );
        
    }
}

/*hook when pet profile has created*/

// add_action('wp_insert_post', 'check_for_post_in_database', 10, 3 );
function check_for_post_in_database($post_id, $post, $update) {
    if (!$update && $post->post_type == "pet_profile") {
        print_r($post);
        print_r(get_post_meta($post->ID));
        die;
        $user_id = $post->post_author;
        $user = get_userdata($user_id);
        $email = $user->user_email;
        pet_insurence_reminder($user_id);
        petIsuranceReminder($email);
        
        
       
    }
}

add_action('updated_post_meta', 'wpse16835_after_post_meta', 10, 4  );

function wpse16835_after_post_meta( $meta_id, $post_id, $meta_key, $meta_value ){
    // print_r($meta_key);die("ocean111");
    $microchipId = get_post_meta($post_id,"microchip_id_number",true);

    if($meta_key == "microchip_id_number" && $microchipId == $meta_value ){

        $author_id = get_post_field ('post_author', $post_id);
        $user = get_userdata($author_id);
        $email = $user->user_email;
        
        $petName = get_the_title($post_id);
        
        microchip_registration_success_confirmation( $petName, $email, $microchipId);
        
    }
}

/*remove pet profile*/

add_action("init",function(){
    
    if(isset($_POST['action']) && $_POST['action']=="remove-pet"){
        
        $postid = $_POST['post_id'];

        $update =   wp_update_post(array(
                        'ID'    =>  $postid,
                        'post_status'   =>  'draft'
                    ),true);

        $redirect  = site_url("/my-account");

        if(is_wp_error($update)){

            $error = $update->get_error_message();

            $redirect = add_query_arg( 'msg', '$error', $redirect );
            wp_redirect( $redirect );
            exit;
            
           
        }else{
            $redirect = add_query_arg( 'msg', 'success', $redirect );
            wp_redirect( $redirect );
            exit;
        }
        
    }

});


add_filter( 'woocommerce_order_button_text', 'woo_custom_order_button_text' ); 

function woo_custom_order_button_text() {
    return __( 'Place Order', 'woocommerce' ); 
}
 

function get_phone_by_contry_code($phoneNumberCode){



$countryPhoneCode = json_decode(file_get_contents(__DIR__."/lib/countryPhoneCode.json"));

    if(!empty($phoneNumberCode)){
        $count = sizeof($countryPhoneCode);
        $i = 0;
        while ($i < $count) {
            if($countryPhoneCode[$i]->iso2 == $phoneNumberCode){
                $code = $countryPhoneCode[$i]->dialCode;
                $formate = "+".$code."-";
                break;
            }
            $i++;
        }
        return $formate;
    }

    return false;

}

add_action('init', 'get_custom_coupon_code_to_session');
function get_custom_coupon_code_to_session(){
    if( isset($_GET['coupon_code']) ){
        // Ensure that customer session is started
        if( !WC()->session->has_session() )
            WC()->session->set_customer_session_cookie(true);

        // Check and register coupon code in a custom session variable
        $coupon_code = WC()->session->get('coupon_code');
        if(empty($coupon_code)){
            $coupon_code = esc_attr( $_GET['coupon_code'] );
            WC()->session->set( 'coupon_code', $coupon_code ); // Set the coupon code in session
        }
    }
}

add_action( 'woocommerce_before_checkout_form', 'add_discout_to_checkout', 10, 0 );
function add_discout_to_checkout( ) {
    // Set coupon code
    $coupon_code = WC()->session->get('coupon_code');
    if ( ! empty( $coupon_code ) && ! WC()->cart->has_discount( $coupon_code ) ){
        WC()->cart->add_discount( $coupon_code ); // apply the coupon discount
        WC()->session->__unset('coupon_code'); // remove coupon code from session
    }
}





add_action( 'rest_api_init', function(){
    register_rest_route('testing_cron-job', '/callback', array(
        'methods'  => 'GET',
        'callback' => 'signup_pet_alert_cron',
        'permission_callback' => '__return_true'
    )
    );
});







/*
add_filter( 'woocommerce_cart_shipping_method_full_label', 'change_cart_shipping_method_full_label', 10, 2 );
function change_cart_shipping_method_full_label( $label, $method ) {

           echo  $has_cost  =  $method->cost;
    $hide_cost = ! $has_cost && in_array( $method->get_method_id(), array( 'free_shipping', 'local_pickup' ), true );

    if ( ! $has_cost && ! $hide_cost ) {
        $label  = $method->get_label() . ': Free';
    }
    return $label;
}

*/

add_filter( 'woocommerce_package_rates', 'custom_shipping_costs', 20, 2 );
function custom_shipping_costs( $rates, $package ) {
    // New shipping cost (can be calculated)
/* $WC_Shipping = new WC_Shipping();
$shipping_classes = $WC_Shipping->get_shipping_classes();
print_r($shipping_classes);
die();*/

   $new_express_ground_price = 36.50;
    $new_priority_ground_price = 11.00;
    $new_standard_ground_price = 5.95;

    foreach( $rates as $rate_key => $rate ){

       if( $rate->label == 'Express Ground' &&  $rate->method_id == 'flat_rate'){
         $rates[$rate_key]->cost = $new_express_ground_price;
        }else if( $rate->label == 'Priority Ground' &&  $rate->method_id == 'flat_rate'){
          $rates[$rate_key]->cost = $new_priority_ground_price;  
        }else if( $rate->label == 'Standard Ground' &&  $rate->method_id == 'flat_rate'){
         $rates[$rate_key]->cost = $new_standard_ground_price;   
        } 
    }
  

    return $rates;
  
}

/*update price acc. to quantity*/

/*add_action( 'woocommerce_before_calculate_totals', 'quantity_based_bulk_pricing', 9999, 1 );
function quantity_based_bulk_pricing( $cart ) {

   
    foreach( $cart->get_cart() as $cart_item_key => $cart_item ) {
        // Get the bulk price from product (variation) custom field
          
        $quantity = $cart_item['quantity'];
        $price = $cart_item['data']->get_price();
       $update_price =  $price * $quantity;
       
            // Set the bulk price
            $cart_item['data']->set_price( $update_price );
        
    }
}
*/

  


function filter_woocommerce_order_formatted_line_subtotal( $subtotal, $item, $order ) {
    // The instance of the WC_Product Object
    $product = $item->get_product();

    if ( $product ) {
        return $product->get_price_html();
    }

    return $subtotal;
}
add_filter( 'woocommerce_order_formatted_line_subtotal', 'filter_woocommerce_order_formatted_line_subtotal', 20, 3 );


 
/*add_action( 'woocommerce_before_calculate_totals', 'bbloomer_alter_price_cart', 9999 );
 
function bbloomer_alter_price_cart( $cart ) {
 
    if ( is_admin() && ! defined( 'DOING_AJAX' ) ) return;
 
    if ( did_action( 'woocommerce_before_calculate_totals' ) >= 2 ) return;
 
    // IF CUSTOMER NOT LOGGED IN, DONT APPLY DISCOUNT
    if ( ! wc_current_user_has_role( 'customer' ) ) return;
 
    // LOOP THROUGH CART ITEMS & APPLY 20% DISCOUNT
    foreach ( $cart->get_cart() as $cart_item_key => $cart_item ) {
        $product = $cart_item['data'];
        $price = $product->get_price();
        if($product->get_id() != 6438){
            $cart_item['data']->set_price( $price * 0 );
        }else{
            $cart_item['data']->set_price( $price  );
        }
        
    }
 
}*/


/*
function add_cart_item_data( $cart_item_data, $product_id, $variation_id ) {
    print_r($cart_item_data);
    die('sadsd');

    // Has our option been selected?
    if( ! empty( $_POST['quotesystem'] ) ) {
        $product = wc_get_product( $product_id );
        $price = $product->get_price();
        // Store the overall price for the product, including the cost of the warranty
        $cart_item_data['quote_price'] = $price * 0;
    }
    return $cart_item_data;
}
add_filter( 'woocommerce_add_cart_item_data', 'add_cart_item_data', 10, 3 );

function before_calculate_totals( $cart_obj ) {
  if ( is_admin() && ! defined( 'DOING_AJAX' ) ) {
    return;
  }
  // Iterate through each cart item
  foreach( $cart_obj->get_cart() as $key=>$value ) {
        print_r($value);

    /*if( isset( $value['quote_price'] ) ) {
      $price = $value['quote_price'];
      $value['data']->set_price( ( $price ) );
    }*/
  //}
//}




function tatwerat_startSession() {
    if(!session_id()) {
        session_start();
     

    }
}

add_action('init', 'tatwerat_startSession', 1);


/* add_filter( 'woocommerce_add_to_cart_validation', 'woocommerce_add_to_cart_validationcustom', 10, 5 );
function woocommerce_add_to_cart_validationcustom( $product_id, $quantity, $variation_id ) {

    global $woocommerce;
        echo $variation_id; echo "<br>";
        echo $product_id; echo "<br>";
        echo $quantity; echo "<br>";
        print_r($variation_id);
    // Set a minimum item quantity
        
        $product_ids = $_SESSION['product_id'];
    // Check if the quantity is less then our minimum
    if ( $product_id == $product_ids){
     
     wp_redirect( wc_get_cart_url() );
      wc_add_notice( __( 'This product is already in your cart.', 'woocommerce' ), 'success' );
     
      return false;
    } else {
        return true;
    }
} */





/*function prevent_from_adding_cart_if_user_product_already_bought( $passed, $product_id, $quantity ) { 
    if ( has_bought_items( get_current_user_id(), $product_id ) ) {
        wc_add_notice( __( "Cart item is already add on cart", 'woocommerce' ), 'error' );

          


        $passed = false;
    }
    return $passed;
}
add_filter( 'woocommerce_add_to_cart_validation', 'prevent_from_adding_cart_if_user_product_already_bought', 10, 3 );


function has_bought_items( $user_var = 0,  $product_ids = 0 ) {
    global $wpdb;
    
    // Based on user ID (registered users)
    if ( is_numeric( $user_var) ) { 
        $meta_key     = '_customer_user';
        $meta_value   = $user_var == 0 ? (int) get_current_user_id() : (int) $user_var;
    } 
    // Based on billing email (Guest users)
    else { 
        $meta_key     = '_billing_email';
        $meta_value   = sanitize_email( $user_var );
    }
    
    $paid_statuses    = array_map( 'esc_sql', wc_get_is_paid_statuses() );
    $product_ids      = is_array( $product_ids ) ? implode(',', $product_ids) : $product_ids;

    $line_meta_value  = $product_ids !=  ( 0 || '' ) ? 'AND woim.meta_value IN ('.$product_ids.')' : 'AND woim.meta_value != 0';

    // Count the number of products
    $count = $wpdb->get_var( "
        SELECT COUNT(p.ID) FROM {$wpdb->prefix}posts AS p
        INNER JOIN {$wpdb->prefix}postmeta AS pm ON p.ID = pm.post_id
        INNER JOIN {$wpdb->prefix}woocommerce_order_items AS woi ON p.ID = woi.order_id
        INNER JOIN {$wpdb->prefix}woocommerce_order_itemmeta AS woim ON woi.order_item_id = woim.order_item_id
        WHERE p.post_status IN ( 'wc-" . implode( "','wc-", $paid_statuses ) . "' )
        AND pm.meta_key = '$meta_key'
        AND pm.meta_value = '$meta_value'
        AND woim.meta_key IN ( '_product_id', '_variation_id' ) $line_meta_value 
    " );

    // Return true if count is higher than 0 (or false)
    return $count > 0 ? true : false;
}




*/





/*add_action( 'woocommerce_before_calculate_totals', 'add_custom_price', 10, 1);
function add_custom_price( $cart_object ) {
       $product_ids = $_SESSION['product_id'];
             

                 $product_cart_id = WC()->cart->generate_cart_id( $product_ids );
    $in_cart = WC()->cart->find_product_in_cart( $product_cart_id );

       














    foreach ( $cart_object->get_cart() as $cart_item ) {    
        $product_id = $cart_item['data']->id;

        if($product_ids == $product_id && isset($_SESSION['idtag_action'])=='replacement_id_tag'){

                $price = $cart_item['data']->price * 0;
                    if ( version_compare( WC_VERSION, '3.0', '<' ) ) {
                        $cart_item['data']->price = $price; // Before WC 3.0
                    } else {
                        $cart_item['data']->set_price( $price ); // WC 3.0+
                    }  
                     wc_add_notice( __( 'This product is already in your cart.', 'woocommerce' ), 'success' );

                // $_SESSION["idtag_action"] = 'new-id-tag';
               // unset($_SESSION['product_id']);
             //  unset($_SESSION['replacement-id-tag']);
        }
          
    }


      
    
}*/




add_action("wp_ajax_add_protection_plan", "add_protection_plan");
add_action("wp_ajax_nopriv_add_protection_plan", "add_protection_plan");


function add_protection_plan(){
    global $woocommerce;
    



    $product_id = $_POST['product_id'];
    $variation = $_POST['variation_id'];
        $customproduct = $woocommerce->cart->add_to_cart( $product_id ,1, $product_id,wc_get_product_variation_attributes( $product_id )); 

  
 $myarray = array("status"=>"200","result"=>"success","message"=> 'Protection plan successfully added to cart ');
   echo  json_encode($myarray);

   exit();

}


add_action("init", "initilize");
function initilize(){


    $terms = update_term_meta(1535, "pa_style_swatches_id_photo" , "107002");
    $terms = update_term_meta(1536, "pa_style_swatches_id_photo" , "107003");
    $terms = update_term_meta(1537, "pa_style_swatches_id_photo" , "107014");
     $terms = update_term_meta(1538, "pa_style_swatches_id_photo" , "107088");
 
    // $terms = update_post_meta(6134, "_product_image_gallery" , "107116");
                // set_post_thumbnail( 6134, '107116' );

                update_post_meta( 6134,'_thumbnail_id', 107116 ); 
                update_post_meta( 78798,'_thumbnail_id', 107115 ); 
                update_post_meta( 78799,'_thumbnail_id', 107117 ); 
                update_post_meta( 7908,'_thumbnail_id', 107123 ); 
   
/*$display_type = get_term_meta( '6134' ); // !! No key defined
echo '<pre>';
print_r($display_type);
echo '</pre>';
*/
}


  add_action( 'admin_enqueue_scripts', 'load_custom_script' ); 
  function load_custom_script() {
      
      wp_enqueue_script('custom_js_script', 'https://cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js', array('jquery'));
      wp_enqueue_script('custom_js_script', 'https://cdn.datatables.net/1.12.0/js/dataTables.bootstrap4.min.js', array('jquery'));
      ?>
        <script type="text/javascript">
           /*  jQuery(document).ready(function(){
                alert();
                jQuery('#example').DataTable({
                    "language": {
                        "emptyTable": "No Fosters"
                }
            });
        });*/

        </script>
      <?php
  }





function register_custom_menu_page() {
    add_menu_page('Microchip Status', 'Unregistered Microchip', 'add_users', 'Microchip_page', '_custom_menu_page', null, 6); 
}
add_action('admin_menu', 'register_custom_menu_page');  


function _custom_menu_page(){
    global $wpdb;
$paged = get_query_var('paged')? get_query_var('paged') : 1;

       $args = array(
            'post_type' => 'pet_profile',
             'post_status' => 'publish',
              'posts_per_page' => 10,
                'meta_query' => array(
                    'meta_value' => array(
                        'key' => 'michrochip_status',
                        'value'=> 'Unassigned Microchip'
                )));

        $dbResult = new WP_Query($args);

?><table id="myTable" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>S.No</th>
            <th>Client Name</th>
            <th>Client Email</th>
            <th>Pet Name</th>
            <th>Microchip ID </th>
            <th>Status</th>
            
        </tr>
    </thead>
         <?php
if ($dbResult->have_posts())
{
    $i = 1;
    while ($dbResult->have_posts()):
        $dbResult->the_post(); ?> 
                <tbody>
                   <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo get_post_meta(get_the_ID() , 'owner_name', true); ?></td>
                        <td><?php echo get_post_meta(get_the_ID() , 'owner_email', true); ?></td>
                        <td><?php echo get_post_meta(get_the_ID() , 'pet_name', true); ?></td>
                        <td><?php echo get_post_meta(get_the_ID() , 'microchip_id_number', true); ?></td>
                        <td><?php echo get_post_meta(get_the_ID() , 'michrochip_status', true);; ?></td>
                    </tr>
                </tbody> <?php
        $i++;
    endwhile;
} ?>

                <tfoot>
                    <tr>
                        <th>S.No</th>
                        <th>Client Name</th>
                        <th>Client Email</th>
                        <th>Pet Name</th>
                        <th>Microchip ID </th>
                        <th>Status</th>
                        
                    </tr>
                </tfoot>
            </table>
<?php
}

function show_checkbox_for_webhook(){
    ?>
    <label><input type="checkbox" class="webhook_checkbox_check" name="webhook"  value="webhook">I would like to take advantage of a 1 free month of Flea & Tick Treatment for my pet ($20 RETAIL VALUE)</label>
    <label><input type="checkbox" class="webhook_checkbox_check"  name="webhook1" value="webhook">I would like to have access to 3 months of Veterinary Tela Health
(Text or call a Veterinarian anytime with concerning questions
($25 RETAIL VALUE))</label>


    <p class="form-row terms wc-terms-and-conditions">
        <label class="woocommerce-form__label woocommerce-form__label-for-checkbox checkbox">
            <input type="checkbox"  class="woocommerce-form__input woocommerce-form__input-checkbox input-checkbox" name="terms" <?php checked( apply_filters( 'woocommerce_terms_is_checked_default', isset( $_POST['terms'] ) ), true ); ?> id="terms" /> <span class="term"><?php printf( __( '*I agree to <a href="'. get_site_url().'/terms-conditions/" target="_blank" class="woocommerce-terms-and-conditions-link">terms &amp; conditions</a>', 'woocommerce' ), esc_url( wc_get_page_permalink( 'terms' ) ) ); ?></span> <span class="required">*</span>
        </label>
        <span class="term-condition" style="color:red; display: none; font-size: 12px;">This Field is required</span>
        <input type="hidden" name="terms-field" value="1" />
    </p>





    <?php
}
add_action( 'woocommerce_after_cart_totals', 'show_checkbox_for_webhook', 20, 1 );
add_action( 'wp_ajax_set_cart_as_webhook', 'set_cart_as_webhook' );
add_action( 'wp_ajax_nopriv_set_cart_as_webhook', 'set_cart_as_webhook' );
function set_cart_as_webhook() {


    if ( isset($_POST['webhook'] ) ){

    session_start();
 
      $_SESSION['webhook'] = $_POST['webhook'];

      
       // die();

        /* $_SESSION['webhook']  = $_POST['webhook'];
         echo $_POST['webhook'];_*/
    }
        
}

add_action('woocommerce_checkout_create_order', 'update_is_it_a_gift_in_meta_before_checkout_create_order', 20, 2);
function update_is_it_a_gift_in_meta_before_checkout_create_order( $order, $data ) {
      
    
    if( $_SESSION['webhook'] == 'yes' ){
        $order->update_meta_data( 'webhook', 'yes' );
    }elseif($_SESSION['webhook'] == 'no'){
        $order->update_meta_data( 'webhook', 'no' );
    }
}



/*add_action('woocommerce_checkout_update_order_meta',function( $order_id, $posted ) {
    $order = wc_get_order( $order_id );
        $webhook = $_SESSION['webhook'];


            print_r($_SESSION);
            die();
    $order->update_meta_data( 'webhook', $webhook);
       
    $order->save();
     $_SESSION['webhook'] == '';
} , 10, 2);*/



/*store cart meta deta in session varible in checkout page*/
/*add_action('woocommerce_before_checkout_form', 'displays_cart_products_attribute');
function displays_cart_products_attribute() {
    

    foreach ( WC()->cart->get_cart() as $cart_item ) {
         $pet_name = $cart_item['engraving_front_line_1'];
         if(isset($pet_name)){
            $item_data = $cart_item['data'];
               $attributes = $item_data->get_attributes();
                   foreach ( $attributes as $attribute ){      
                       $_SESSION['pa_shape'] = $attributes['pa_shape'];
                       $_SESSION['pa_size'] = $attributes['pa_size'];
                       $_SESSION['pa_color'] = $attributes['pa_color'];
                         break;
                   }
                $_SESSION['pet_name'] = $pet_name; 
         }else{
            unset($_SESSION["pet_name"]);
            unset($_SESSION["pa_shape"]);
            unset($_SESSION["pa_size"]);
            unset($_SESSION["pa_color"]);
         }
    }
        


}
*/







/*add_action('init', 'related_products');
function related_products(){
    

    global $product; // If not set…

if( ! is_a( $product, 'WC_Product' ) ){
    $product = wc_get_product(get_the_id());
}

$args = array(
    'posts_per_page' => 4,
    'columns'        => 4,
    'orderby'        => 'rand',
    'order'          => 'desc',
);

$args['related_products'] = array_filter( array_map( 'wc_get_product', wc_get_related_products( '92617', $args['posts_per_page']) ), 'wc_products_array_filter_visible' );
$args['related_products'] = wc_products_array_orderby( $args['related_products'], $args['orderby'], $args['order'] );

// Set global loop values.
wc_set_loop_prop( 'name', 'related' );
wc_set_loop_prop( 'columns', $args['columns'] );

wc_get_template( 'single-product/related.php', $args );
}
*/



/*
add_action('init', 'webhook_to_cart');
function webhook_to_cart(){
        
    if(! is_admin()){
           global $woocommerce;


           $body=array();
              $items = $woocommerce->cart->get_cart();

               foreach($items as $item => $values) { 
                   $product =  wc_get_product( $values['data']->get_id()); 
                   /*echo "<b>".$_product->get_title().'</b>  <br> Quantity: '.$values['quantity'].'<br>'; 
                   $price = get_post_meta($values['product_id'] , '_price', true);
                   echo "  Price: ".$price."<br>";
       */
/*
                    $body = array(
                       'product_name' => $product->get_title(),
                       'product_Qty' => $values['quantity'],
                       'product_price' => get_post_meta($values['product_id'] , '_price', true)
                       );
               } */

                 
    
/*$body1 = 'Testing';
    
    $url = 'https://staging.idtag.com/testing-2/';


       $request = wp_remote_post( $url, $body1 );



    if ( is_wp_error( $request ) || wp_remote_retrieve_response_code( $request ) != 200 ) {
        error_log( print_r( $request, true ) );
    }

    $response = wp_remote_retrieve_body( $request );
    print_r($response);

   die('sas');

}
}*/

add_action('wp_ajax_Create_Pet_profile_For_Webhook', 'cvf_upload_files_webhook');
add_action('wp_ajax_nopriv_Create_Pet_profile_For_Webhook', 'cvf_upload_files_webhook'); // Allow front-end submission 

function cvf_upload_files_webhook(){
    /*Code for creating a pet's profile*/
    if(empty($_POST['post_id'])){
        $title   = $_POST['pet_name'];
        $user_id = $_POST['userId'];
        $user_info = get_userdata($user_id);
         

        // Add the content of the form to $post as an array

        $new_post = array(
            'post_title'    => $title,
            'post_status'   => 'publish',           // Choose: publish, 
            'post_type'     => 'pet_profile',
            'post_author'   =>  $user_id,
        );

      
        
     $postid = wp_insert_post($new_post);

        $first_name = get_user_meta($user_id, 'first_name',true );
        $last_name = get_user_meta($user_id, 'last_name',true );
        $owner_name = $first_name." ".$last_name;
        $primary_home_number = get_user_meta( $user_id, 'primary_home_number', true ); 
        
     update_post_meta($postid, 'owner_name', $owner_name);
        update_post_meta($postid, 'owner_email', $user_info->user_email);
        update_post_meta($postid, 'source_system', 'SMARTTAG');
        update_post_meta($postid, 'pet_owner', $user_id);
        update_post_meta($postid, 'primary_home_number', $primary_home_number);

        update_post_meta($postid, 'pet_name', $_POST['pet_name']);
        update_post_meta($postid, 'pet_type', $_POST['pet_type']);
        update_post_meta($postid, 'primary_breed', $_POST['primary_breed']);
        update_post_meta($postid, 'secondary_breed', $_POST['secondary_breed']);
        update_post_meta($postid, 'primary_breed', $_POST['primary_breed']);
        update_post_meta($postid, 'primary_breed', $_POST['primary_breed']);
        update_post_meta($postid, 'primary_color', $_POST['primary_color']);
        update_post_meta($postid, 'secondary_color', $_POST['secondary_color']);
        update_post_meta($postid, 'gender', $_POST['gender']);
        update_post_meta($postid, 'size', $_POST['size']);
        update_post_meta($postid, 'pet_date_of_birth', $_POST['pet_date_of_birth']);
        
        update_post_meta($postid, 'vaterinarian_first_name', $_POST['vaterinarian_first_name']);
        update_post_meta($postid, 'vaterinarian_last_name', $_POST['vaterinarian_last_name']);
        update_post_meta($postid, 'vaterinarian_email', $_POST['vaterinarian_email']);
        update_post_meta($postid, 'vaterinarian_address_line_1', $_POST['vaterinarian_address_line_1']);
        update_post_meta($postid, 'vaterinarian_address_line_2', $_POST['vaterinarian_address_line_2']);
        update_post_meta($postid, 'vaterinarian_city', $_POST['vaterinarian_city']);
        update_post_meta($postid, 'vaterinarian_state', $_POST['vaterinarian_state']);
        update_post_meta($postid, 'vaterinarian_zip_code', $_POST['vaterinarian_zip_code']);
        update_post_meta($postid, 'vaterinarian_primary_phone_number', $_POST['vaterinarian_primary_phone_number']);
        update_post_meta($postid, 'vaterinarian_primary_phone_number_code', $_POST['vaterinarian_primary_phone_number_code']);
        update_post_meta($postid, 'vaterinarian_secondary_phone_number', $_POST['vaterinarian_secondary_phone_number']);
        update_post_meta($postid, 'vaterinarian_secondary_phone_number_code', $_POST['vaterinarian_secondary_phone_number_code']);
       
        $microchip_id_number = preg_replace('/\s+/', '', $_POST['microchip_id']);
        update_post_meta($postid, 'microchip_id_number', $microchip_id_number);
    
        

        $pet_name =  get_post_meta( $postid, 'pet_name' ,true ); 
        $pet_date_of_birth =  get_post_meta( $postid, 'pet_date_of_birth' ,true ); 
        $color = get_post_meta( $postid, 'primary_color' ,true ); 

        /*Store pet infomration in session variable*/
        $_SESSION['pet_name'] = $pet_name;
        $_SESSION['pa_color'] = $color;
        $_SESSION['pet_date_of_birth'] = $pet_date_of_birth;

    // Image upload handler

        $parent_post_id = $postid;  // The parent ID of our attachments
        $valid_formats = array("jpg", "png", "gif", "bmp", "jpeg"); // Supported file types
        $max_file_size =  2*1000000; // in kb
        $max_image_upload = 10; // Define how many images can be uploaded to the current post
        $wp_upload_dir = wp_upload_dir();
        $path = $wp_upload_dir['path'] . '/';
        $count = 0;

        $attachments = get_posts( array(
            'post_type'         => 'attachment',
            'posts_per_page'    => -1,
            'post_parent'       => $parent_post_id,
            'exclude'           => get_post_thumbnail_id() // Exclude post thumbnail to the attachment count
        ) );

    
    if( $_SERVER['REQUEST_METHOD'] == "POST" ){
        if(isset($_FILES['files']['name'])){
            // Check if user is trying to upload more than the allowed number of images for the current post
            if( ( count( $attachments ) + count( $_FILES['files']['name'] ) ) > $max_image_upload ) {
                $upload_message[] = "Sorry you can only upload " . $max_image_upload . " images for each Ad";
            } else {
                
                foreach ( $_FILES['files']['name'] as $f => $name ) {
                    $extension = pathinfo( $name, PATHINFO_EXTENSION );
                    // Generate a randon code for each file name
                    $new_filename = cvf_td_generate_random_code( 20 )  . '.' . $extension;
                    
                    if ( $_FILES['files']['error'][$f] == 4 ) {
                        continue; 
                    }
                    
                    if ( $_FILES['files']['error'][$f] == 0 ) {
                        // Check if image size is larger than the allowed file size
                        if ( $_FILES['files']['size'][$f] > $max_file_size ) {
                            $upload_message[] = "$name is too large!.";
                            continue;
                        
                        // Check if the file being uploaded is in the allowed file types
                        }elseif( ! in_array( strtolower( $extension ), $valid_formats ) ){
                            $upload_message[] = "$name is not a valid format";
                            continue; 
                        
                        }else{ 
                            // If no errors, upload the file...
                            if( move_uploaded_file( $_FILES["files"]["tmp_name"][$f], $path.$new_filename ) ) {
                                
                                $count++; 

                                $filename = $path.$new_filename;
                                $filetype = wp_check_filetype( basename( $filename ), null );
                                $wp_upload_dir = wp_upload_dir();
                                $attachment = array(
                                    'guid'           => $wp_upload_dir['url'] . '/' . basename( $filename ), 
                                    'post_mime_type' => $filetype['type'],
                                    'post_title'     => preg_replace( '/\.[^.]+$/', '', basename( $filename ) ),
                                    'post_content'   => '',
                                    'post_status'    => 'inherit'
                                );
                                // Insert attachment to the database
                               
                                require_once( ABSPATH . 'wp-admin/includes/image.php' );
                                
                                // Generate meta data
                                $attach_data = wp_generate_attachment_metadata( $attach_id, $filename ); 
                                wp_update_attachment_metadata( $attach_id, $attach_data );
                                $attach_id = wp_insert_attachment( $attachment, $filename, $parent_post_id );
                                $all_images_id_array[] = $attach_id;
                            }
                        }
                    }
                }
            }
        }
    }

    if ( isset( $upload_message ) ) :
        echo json_encode(array("success"=>0,"message"=>'<div class="alert alert-danger alert-dismissible" style="margin-top:18px;"><strong>Error!</strong> '.implode(',',$upload_message).'</div>'));
        exit();
    endif;
    
    // If no error, show success message
    if( $count != 0 ){ 
        set_post_thumbnail($postid, $all_images_id_array[0] ); 
        update_post_meta($postid,'pet_images',implode(',', $all_images_id_array));

    }

    if (isset($_POST['universal_microchip_id']) && !empty($_POST['universal_microchip_id'])) {
        echo json_encode(array("success"=>1,"message"=>'<div class="alert alert-success alert-dismissible" style="margin-top:18px;"><strong>Success!</strong> Pet Profile Successfully Added and currently it\'s in pending status, If you purchase universal microchip subscription plan then it\'s automatically update pending to publish.</div>',"petId"=>$postid));
        exit();
    }
    echo json_encode(array("success"=>1,"message"=>'<div class="alert alert-success alert-dismissible" style="margin-top:18px;"><strong>Success!</strong> Pet Profile Successfully Added</div>',"petId"=>$postid));
 }else{
     echo json_encode(array("success"=>0,"message"=>"Undefind Error","petId"=>0));
 }    







 $serialNumberExist = checkSerialNumberFromDatabase($id);

 if($serialNumberExist == 0){
      $client_name = get_post_meta($postid, 'owner_name', true);
      $client_email = get_post_meta($postid, 'owner_email', true);
      $pet_name = get_post_meta($postid, 'pet_name', true);
      $microchip_id_number = get_post_meta($postid, 'microchip_id_number', true);
      $michrochip_status = get_post_meta($postid, 'michrochip_status', true);
      $to = get_option('admin_email');
      $subject = "Unassigned SmartTag Microchip";
         $heading = "Unassigned SmartTag Microchip";
      $message = "Hello Admin,"."\r\n\r\n";
      $message .= " An Unassigned SmartTag microchip has been registered. Please investigate to resolve the issue."."\r\n\r\n";
      $message .= " The User Info and MicroChip Info are Listed below:- "."\r\n\r\n";
      $message .= "<b>Owner Name:-</b> ".$client_name."\r\n\r\n";
      $message .= "<b>Owner Email:- </b>".$client_email."\r\n\r\n";
      $message .= "<b>Pet Name:- </b>".$pet_name."\r\n\r\n";
      $message .= "<b>SmartTag Id:- </b>".$microchip_id_number."\r\n\r\n";
      $message .= "<b>SmartTag Status:-</b> ".$michrochip_status."\r\n\r\n";
  send_email_woocommerce_style($to , $subject , $heading , $message );
  //send_email_woocommerce_style('satish@vkaps.com' , $subject , $heading , $message );
 }

     exit();
}



add_action( 'wp_logout', 'force_clear_woocommerce_cart' );
function force_clear_woocommerce_cart(){

    error_log("Clearing cart");
    global $woocommerce;
    $woocommerce->cart->empty_cart();

}





function bbloomer_change_checkout_field_input_type() {
echo "<script>document.getElementById('billing_phone').type = 'text';
document.getElementById('shipping_phone').type = 'text';
var billing_phone = $('#billing_phone').val();
            if(billing_phone!=''){
                $('#billing_phone').val(billing_phone.replace(/^(\d{3})(\d{3})(\d+)$/, '($1) $2-$3'));
        }</script>";
}
  
add_action( 'woocommerce_after_checkout_form', 'bbloomer_change_checkout_field_input_type');


// Looks at the totals to see if payment is actually required.
/*function filter_woocommerce_cart_needs_payment( $needs_payment, $cart ) {
    // Set true
    $needs_payment = true;
    
    return $needs_payment;
}
add_filter( 'woocommerce_cart_needs_payment', 'filter_woocommerce_cart_needs_payment', 10, 2 );

*/

//var_dump($response);

   
add_action( 'woocommerce_payment_complete', 'order_received_empty_cart_action', 10, 1 );
function order_received_empty_cart_action( $order_id ){
    WC()->cart->empty_cart();
}



function checkUniversalMicrochip($universalMicrochipID){
 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

   $args=array(
        'post_type' => 'pet_profile',
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'meta_query'=>array(
                'relation' => 'OR',
                array(
                    'key' => 'universal_microchip_id',
                    'value' => $universalMicrochipID,
                    'compare'   => 'LIKE',
                ),
            )
        
    );
            global $wpdb;

            $data = $wpdb->get_results($wpdb->prepare( "SELECT * FROM $wpdb->postmeta WHERE meta_value = %s", $universalMicrochipID) , ARRAY_N  );

            if (count($data) > 0 ) {
                return false;
            }else{
                return true;
            }
                return $data;
}


    
function checkSmartTagId($smartTagID){
 
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

   global $wpdb;

        $data = $wpdb->get_results($wpdb->prepare( "SELECT * FROM $wpdb->postmeta WHERE meta_value = %s", $smartTagID) , ARRAY_N  );

        if (count($data) > 0 ) {
            return false;
        }else{
            return true;
        }
            return $data;
}




/**/

function changeRestPrefix() {
return "idtag-api"; //become yourwebsite/wpjsoncustom/wp/v2/
}
add_filter( 'rest_url_prefix', 'changeRestPrefix');




/*Rest API to register Pet with Michrochip*/

add_action( 'rest_api_init', function(){
    register_rest_route('pet-register-microchip', '/add', array(
            'methods'  => 'POST',
            'callback' => 'michrochip_registring',
            'permission_callback' => '__return_true'
        )
    );
});
function michrochip_registring(WP_REST_Request $request) {
    global $serialNumberPrefix1,$serialNumberPrefix2,$serialNumberPrefix3,$serialNumberPrefix4;


    $check     = checkAuthentication();
    $checkAuth = json_decode($check,true);

    if (!$checkAuth['success']) {
        return $checkAuth;
    }else{
        $accountId = $checkAuth['userID'];
    }

    $response = array();
    $parameters = $request->get_params();

/*user info*/
    $FirstName = $parameters['FirstName'];
    $LastName = $parameters['LastName'];
    $Email = trim($parameters['Email']);
   // $Password = $parameters['Password'];

    $PrimaryPhone = trim($parameters['PrimaryPhone']);
    $Address = $parameters['Address'];
    $City = $parameters['City'];
    $State = $parameters['State'];
    $Country = $parameters['Country'];
    $PostalCode = $parameters['PostalCode'];



/*Pet Info*/

    $MicrochipId    = $parameters['Pet']['MicrochipId'];
    $PetName        = $parameters['Pet']['PetName'];
    $PetType        = $parameters['Pet']['PetType'];
    $PrimaryColor   = $parameters['Pet']['PrimaryColor'];
    $Gender         = $parameters['Pet']['Gender'];
    $Size           = $parameters['Pet']['Size'];
    $DOB            = $parameters['Pet']['Dob'];
    $SecondaryColor = $parameters['Pet']['SecondaryColor'];
    
    // var_dump(email_exists($Email));die;
    /*save User information*/
     if(email_exists($Email)){
        $user = get_user_by( 'email', $Email );
        $newUserId = $user->ID;
    }

    if($PetName == ""){

        $response['status'] = "error";
        $response['message'] = "Pet Name is required.";  
        return new WP_REST_Response( $response, 400 ); 

    }

    if($MicrochipId == ""){

        $response['status'] = "error";
        $response['message'] = "Microchip Id is required.";  
        return new WP_REST_Response( $response, 400 ); 

    }


    if($FirstName == ""){

        $response['status'] = "error";
        $response['message'] = "First name is required.";  
        return new WP_REST_Response( $response, 400 ); 

    }elseif($LastName == ""){

        $response['status'] = "error";
        $response['message'] = "Last name is required..";  
        return new WP_REST_Response( $response, 400 );  

    }else if($Email == ""){

        $response['status'] = "error";
        $response['message'] = "Email addresss is required.";  
        return new WP_REST_Response( $response, 400 );  

    }else if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {

        $response['status'] = "error";
        $response['message'] = "Invalid Email format.";  
        return new WP_REST_Response( $response, 400 );  

    }else if($PrimaryPhone == ""){

        $response['status'] = "error";
        $response['message'] = "Primary Phone is required.";  
        return new WP_REST_Response( $response, 400 );  

    }else if(strlen($PrimaryPhone) != 10){

        $response['status'] = "error";
        $response['message'] = "Primary phone number should be 10 digits";  
        return new WP_REST_Response( $response, 400 );  

    }else if(is_numeric($PrimaryPhone)!=1){

        $response['status'] = "error";
        $response['message'] = "Please Enter only number";  
        return new WP_REST_Response( $response, 400 );  

    }else if(trim($Size) != "small" && trim($Size) != "large" && !empty(trim($Size))){

        $response['status'] = "error";
        $response['message'] = "The size field accepts only small or large.";  
        return new WP_REST_Response( $response, 400 );  

    }else if(trim($Gender) != "male" && trim($Gender) != "female" && !empty(trim($Gender))){

        $response['status'] = "error";
        $response['message'] = "The Gender field accepts only male or female.";  
        return new WP_REST_Response( $response, 400 ); 

    }else if(trim($DOB) == ''){

        $response['status'] = "error";
        $response['message'] = "Date Field is required";  
        return new WP_REST_Response( $response, 400 ); 

    }else if (!preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$DOB)) {

        $response['status'] = "error";
        $response['message'] = "Please user this formate YYYY-MM-DD";  
        return new WP_REST_Response( $response, 400 ); 

    }else if($newUserId){
        if(strlen($MicrochipId) == '15'){
            $result = substr($MicrochipId, 0, 6);
            $validSerialPrefix = array($serialNumberPrefix1, $serialNumberPrefix2, $serialNumberPrefix3,$serialNumberPrefix4);
            if (in_array( $result, $validSerialPrefix)){
                if(checkMicrochipIDPetProfile($MicrochipId) != false){
                    $new_post = array(
                        'post_title'    => $PetName,
                        'post_status'   => 'publish',   
                        'post_type'     => 'pet_profile',
                        'post_author'   =>  $newUserId,
                    );
                    
                    $postId = wp_insert_post($new_post, true);
                }else{
                    global $wpdb;
                    $postId = $wpdb->get_var( $wpdb->prepare("SELECT `post_id` FROM `wp_postmeta` WHERE `meta_value` = ".$MicrochipId." AND `meta_key` = 'microchip_id_number'") );
                }


                if($PetType == 'Cat'){
                    $petCode = '587';
                }else if($PetType == 'Dog'){
                    $petCode = '1045';
                }else if($PetType == 'Ferret'){
                    $petCode = '1046';
                }else if($PetType == 'Horse'){
                    $petCode = '588';
                }else if($PetType == 'Other'){
                    $petCode = '1048';
                }else{
                    $petCode =  '1047';
                }   
                //$postId = wp_insert_post($new_post, true);

                update_post_meta($postId , 'pet_name', $PetName);
                update_post_meta($postId , 'pet_type', $petCode);
                update_post_meta($postId , 'gender', $Gender);
                update_post_meta($postId , 'primary_color', $PrimaryColor);
                update_post_meta($postId , 'secondary_color', $SecondaryColor);
                update_post_meta($postId , 'Size', $Size);
                update_post_meta($postId,'microchip_id_number',$MicrochipId);
                update_post_meta($postId,'user_id',$newUserId);


                /*Update user Information*/

                if (isset($FirstName) && !empty(trim($FirstName))) {
                    update_user_meta($newUserId,'first_name',$FirstName);
                }
                if (isset($LastName) && !empty(trim($LastName))) {
                    update_user_meta($newUserId,'last_name',$LastName);
                }
                if (isset($Address) && !empty(trim($Address))) {
                    update_user_meta($newUserId,'primary_address_line1',$Address);
                }
                if (isset($City) && !empty(trim($City))) {
                    update_user_meta($newUserId,'primary_city',$City);
                }
                if (isset($State) && !empty(trim($State))) {
                    update_user_meta($newUserId,'primary_state',$State);
                }
                if (isset($Country) && !empty(trim($Country))) {
                    update_user_meta($newUserId,'primary_country',$Country);
                }
                if (isset($PostalCode) && !empty(trim($PostalCode))) {
                    update_user_meta($newUserId,'primary_postcode',$PostalCode);
                }

                update_user_meta($newUserId,'primary_home_number',$PrimaryPhone);
                update_user_meta($newUserId, 'source', 'api');

                if(email_exists($Email)){
                    $message = "User Information has Updated and Pet Profile Registered Successfully";  
                }else{
                    $message = "User and Pet profile registered successfully";  
                }    
                
                
                $response['status']       = "success";
                $response['message']      = $message;
                $response['userId']       = $newUserId;
                $response['petProfileId'] = $postId;
                return new WP_REST_Response( $response, 200 ); 


            }else{

                $response['status'] = "error";
                $response['message'] = "Please enter a valid MicroChip Id";  
                return new WP_REST_Response( $response, 400 ); 
            }   

        }else{

            $response['status'] = "error";
            $response['message'] = "Microchip Id should be 15 digits only";  
            return new WP_REST_Response( $response , 400 ); 
        }

    }else{

             
        $subject = 'Congratulations on Registering'. $PetName.' with SmartTag <br>';

        $message = 'Dear Valued SmartTag Customer,<br><br>';
        $message .= 'Congratulations on registering your pet '. $PetName.' with SmartTag. We have activated your microchip with [subscriptions:value]. If you would like to get premium pet protection services please go to our website and review the added protection you can get with premium protection plans.<br><br>
            Microchip ID:'.$MicrochipId.' <br>
            </br>
            </br>
            Please place your metal ID Tag  collar. If '. $PetName.' loses his or her SmartTag, you can get a replacement at IDtag.com<br>
            </br>
            There are over 30 styles and colors, with engraving options too.<br><br>
            Please note, your microchip is activated! For added safety, you should log into your account and complete '. $PetName.'/owner profile.<br><br>
            Go to our website <a href="www.IDtag.com"> www.IDtag.com</a><br>
            Click on the ‘Account Login’ which is on the upper right corner of our homepage and enter your email address and password.<br>
            Click on EDIT and fill [node:title]’s information, veterinarian doctor’s information, and the secondary contact information.<br>
            Upload a picture of our pet (you can upload up to 5 pictures)<br>
            Click on ‘Save Changes’ at the bottom of the page.
            You can edit, add, and update the information at any time from any computer, for free! Also if [node:title] loses his or her ID tag you can get a replacement at IDtag.com.<br><br><br>
            SmartTag Benefits:<br><br>
            Instant Pet “Amber Alert” with a full pet profile, sent to all shelter and rescue groups within a 50-mile radius of the pet’s last known location.</br>
            24/7 Live lost pet call center to field and directly connect all calls, to reunite pets with their owners.<br>
            A metal collar ID tag.<br>
            Free pet and owner profile updates anytime.<br>
            All SmartTag microchips are registered with national AAHA registry.<br>
            All ID tags and microchips are searchable in online search.<br>
            Free Pet Medical Insurance (30 days of pet insurance – accidents and illnesses covered) Must call to activate, PetFirst at 855-454-7387.<br>
            Instant Lost Pet Posters generated with a click of a button.<br>
            Lost pets are posted on Facebook.<br>
            Sincerely,<br><br>
            SmartTag Customer Care Department';

        wp_mail($Email, $subject, $message);
        
        $response['status'] = "success";
        $response['message'] = "Please check your mail";  
        return new WP_REST_Response( $response , 200); 
    }           
}

/*Register pet with UniversalMicheochip*/

add_action( 'rest_api_init', function(){
    register_rest_route('pet-register-universal', '/add', array(
            'methods'  => 'POST',
            'callback' => 'universalMichrochip_registring',
            'permission_callback' => '__return_true'
        )
    );
});
function universalMichrochip_registring(WP_REST_Request $request) {

 global $serialNumberPrefix1,$serialNumberPrefix2,$serialNumberPrefix3,$serialNumberPrefix4;
    $response = array();
    
    $parameters = $request->get_params();
    $MicrochipId   = $parameters['MicrochipId'];
    $UserEmail   = $parameters['UserEmail'];
    $user = get_user_by( 'email', $UserEmail );
    $user_id = $user->ID;


    $userdata = get_userdata( $user_id );

        if($userdata){


            if(strlen($MicrochipId) == '15'){
                $result = substr($MicrochipId, 0, 6);
                 $validSerialPrefix = array($serialNumberPrefix1, $serialNumberPrefix2, $serialNumberPrefix3,$serialNumberPrefix4);
                if (!in_array( $result, $validSerialPrefix)){
                   
                    if(checkUniversalMicrochip($MicrochipId) != false){


                        $PetName   = $parameters['PetName'];
                        $PetType   = $parameters['PetType'];
                        $PrimaryColor   = $parameters['PrimaryColor'];
                        $Gender   = $parameters['Gender'];
                        $Size   = $parameters['Size'];


                        $new_post = array(
                              'post_title'    => $PetName,
                              'post_status'   => 'publish',           // Choose: 
                              'post_type'     => 'pet_profile',
                              'post_author'   =>  $user_id,
                          );

                        if($PetType == 'Cat'){
                            $petCode = '587';
                        }else if($PetType == 'Dog'){
                            $petCode = '1045';
                        }else if($PetType == 'Ferret'){
                            $petCode = '1046';
                        }else if($PetType == 'Horse'){
                            $petCode = '588';
                        }else if($PetType == 'Other'){
                            $petCode = '1048';
                        }else{
                            $petCode =  '1047';
                        }   


                         
                       $postId = wp_insert_post($new_post, true);
                            update_post_meta($postId , 'pet_name', $PetName);
                            update_post_meta($postId , 'pet_type', $petCode);
                            update_post_meta($postId , 'gender', $Gender);
                            update_post_meta($postId , 'primary_color', $PrimaryColor);
                            update_post_meta($postId , 'Size', $Size);
                            update_post_meta($postId, 'source_system', 'SMARTTAG');
                            update_post_meta($postId,'universal_microchip_id',$MicrochipId);
                            update_post_meta($postId,'post_author',$user_id);

                            $response['status'] = 200;
                            $response['message'] = "Successfully";  
                            return new WP_REST_Response( $response ); 
                    }else{
                          
                            $response['status'] = 404;
                            $response['message'] = "This ID Already Registered";  
                            return new WP_REST_Response( $response ); 
                        }   


                  
                }else{
                        
                        $response['status'] = 404;
                        $response['message'] = "This is not an Universal MichroChip";  
                        return new WP_REST_Response( $response ); 


                    }   

            }else{

                   
                    $response['status'] = 404;
                    $response['message'] = "Please Insert 15 digit.";  
                    return new WP_REST_Response( $response ); 
                }

        }else{

            $response['status'] = 404;
            $response['message'] = "User Not Found";  
            return new WP_REST_Response( $response ); 





      }

}

/*Api for pet register with smarttag id */


/*Register pet with UniversalMicheochip*/

add_action( 'rest_api_init', function(){
    register_rest_route('pet-register-smarttag', '/add', array(
            'methods'  => 'POST',
            'callback' => 'smarttag_registring',
            'permission_callback' => '__return_true'
            
        )
    );
});
function smarttag_registring(WP_REST_Request $request) {
    $response = array();
    
    $parameters = $request->get_params();
    $SmartTag_id   = $parameters['MicrochipId'];
    $UserEmail   = $parameters['UserEmail'];
    $user = get_user_by( 'email', $UserEmail );
    $user_id = $user->ID;


    $userdata = get_userdata( $user_id );

        if($userdata){


            if(strlen($SmartTag_id) == '8'){
                $result = substr($SmartTag_id, 0, 6);
                 
                   
                    if(checkSmartTagId($SmartTag_id) != false){

                        $PetName   = $parameters['PetName'];
                        $PetType   = $parameters['PetType'];
                        $PrimaryColor   = $parameters['PrimaryColor'];
                        $Gender   = $parameters['Gender'];
                        $Size   = $parameters['Size'];


                        $new_post = array(
                              'post_title'    => $PetName,
                              'post_status'   => 'publish',           // Choose: 
                              'post_type'     => 'pet_profile',
                              'post_author'   =>  $user_id,
                          );

                        if($PetType == 'Cat'){
                            $petCode = '587';
                        }else if($PetType == 'Dog'){
                            $petCode = '1045';
                        }else if($PetType == 'Ferret'){
                            $petCode = '1046';
                        }else if($PetType == 'Horse'){
                            $petCode = '588';
                        }else if($PetType == 'Other'){
                            $petCode = '1048';
                        }else{
                            $petCode =  '1047';
                        }   


                         
                       $postId = wp_insert_post($new_post, true);
                            update_post_meta($postId , 'pet_name', $PetName);
                            update_post_meta($postId , 'pet_type', $petCode);
                            update_post_meta($postId , 'gender', $Gender);
                            update_post_meta($postId , 'primary_color', $PrimaryColor);
                            update_post_meta($postId , 'Size', $Size);
                            update_post_meta($postId, 'source_system', 'SMARTTAG');
                            update_post_meta($postId,'smarttag_id_number',$SmartTag_id);
                            update_post_meta($postId,'post_author',$user_id);

                            $response['status'] = 200;
                            $response['message'] = "Successfully";  
                            return new WP_REST_Response( $response ); 
                    }else{
                          
                            $response['status'] = 404;
                            $response['message'] = "This ID Already Registered";  
                            return new WP_REST_Response( $response ); 
                        }   
                }else{

                   
                    $response['status'] = 404;
                    $response['message'] = "Please Insert 8 digit.";  
                    return new WP_REST_Response( $response ); 
                }

        }else{

            $response['status'] = 404;
            $response['message'] = "User Not Found";  
            return new WP_REST_Response( $response ); 
        }

}


// Conditional function that checks if a product is in cart and return the correct button text
function change_button_text( $product_id, $button_text ) {
    foreach( WC()->cart->get_cart() as $item ) {
        if( $product_id === $item['product_id'] ) {
            return __('Added to Cart', 'woocommerce');
        }
    }
    return $button_text;
}

// Archive pages: For simple products (ajax add to cart button)
add_filter( 'woocommerce_product_add_to_cart_text', 'change_ajax_add_to_cart_button_text', 10, 2 );
function change_ajax_add_to_cart_button_text( $button_text, $product ) {
    if ( $product->is_type('simple') ) {
        $button_text = change_button_text( $product->get_id(), $button_text );
    }
    return $button_text;
}

// Single product pages: Simple and external products
add_filter( 'woocommerce_product_single_add_to_cart_text', 'change_single_add_to_cart_button_text', 10, 2 );
function change_single_add_to_cart_button_text( $button_text, $product ) {
    if (  ! $product->is_type('variable') ) {
        $button_text = change_button_text( $product->get_id(), $button_text );
    }
    return $button_text;
}

// Single product pages: Variable product and its variations
add_action( 'woocommerce_after_variations_form', 'action_after_variations_form_callback' );
function action_after_variations_form_callback() {
    global $product;

    // Get the produc variation Ids for the variable product
    $children_ids = $product->get_visible_children();

    $ids_in_cart  = [];

    // Loop through cart items
    foreach( WC()->cart->get_cart() as $item ) {
        if( in_array( $item['variation_id'], $children_ids ) ) {
            $ids_in_cart[] = $item['variation_id'];
        }
    }
    ?>
    <script type="text/javascript">
    jQuery(function($){
        var b = 'button.single_add_to_cart_button',
            t = '<?php echo $product->single_add_to_cart_text(); ?>';

        $('form.variations_form').on('show_variation hide_variation found_variation', function(){
            $.each(<?php echo json_encode($ids_in_cart); ?>, function(j, v){
                var i = $('input[name="variation_id"]').val();
                if(v == i && i != 0 ) {
                    $(b).html('<?php _e('Added to Cart', 'woocommerce'); ?>');
                    return false;
                } else {
                    $(b).html(t);
                }
            });
        });
    });
    </script>
    <?php
}



function email_exist_in_drupal($email){


    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => "http://3.80.120.98/basicRowScript.php?email=".$email,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
    ]);


    $response = curl_exec($curl);
   
    $finalDatas = json_decode($response, true);
    if(empty($finalDatas)){
         return false;
    }else{
        return true;
    }



}








/*Functionality implement fot first time login page*/

add_action('wp_ajax_firstTimeLoginWithEmailPassword', 'firstTimeLogin');
add_action('wp_ajax_nopriv_firstTimeLoginWithEmailPassword', 'firstTimeLogin');

function firstTimeLogin(){
/*ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);*/
    if($_POST['action']== 'firstTimeLoginWithEmailPassword'){
        global $wpdb;

        $email = $_POST['email'];
        $password = $_POST['password'];
        $remember_me = $_POST['remember'];
        $exists = email_exists( $email );


        if(!empty($_POST["email"]) && !empty($_POST['password']) && email_exists( $email ) && !is_numeric( $email )){
                
                $user  = get_user_by( 'id', $exists );
                $userLogin  = $user->user_login;
                $user_id = $user->ID;
                $creds = array(
                    'user_login'    => $userLogin,
                    'user_password' => $password,
                    'remember'      => $remember
                );

                $user_meta = get_userdata($user_id);
                $user_roles = $user_meta->roles;
                if(  in_array('pet_professional', $user_roles)){
                        echo json_encode(array('success'=>0, 'user_type'=>'pet-professional','message'=>'This is Pet Professional username. Please login from Pet-Professional'));
                    exit();
                }

                $importStatus = get_user_meta( $exists, 'importStatus' ,true);

                $loginuser = wp_signon($creds);
                if ( is_wp_error( $loginuser ) ){
                    echo $user->get_error_message();
                    echo json_encode(array('success'=>0, 'user_type'=>'customer', 'message'=>'Invalid password. Please try again'));
                        exit();
                }else{
                echo json_encode(array('success'=>1, 'importStatus' => $importStatus,'user_type'=> 'new_in website', 'message'=>'You are login','email'=> $email));
                        exit();
                }



            }elseif(is_numeric($_POST["email"])){

                $phone = phone_exists($_POST["email"]);
                    if ($phone['success']) {
                        $userId    = $phone['user']->ID;
                        

                            $user_meta = get_userdata($userId);
                            $email     = $user_meta->data->user_email;
                            $exists = email_exists( $email );

                            $user  = get_user_by( 'id', $exists );
                            $userLogin  = $user->user_login;
                            $password = $_POST['password'];    


                            $creds = array(
                                'user_login'    => $userLogin,
                                'user_password' => $password,
                                'remember'      => $remember
                            );
                      
                            update_user_meta( $exists, 'importStatus', 'S');
                            $importStatus = get_user_meta( $exists, 'importStatus' ,true);
                            $loginuser = wp_signon($creds);
                            if ( is_wp_error( $loginuser ) ){
                                    $user->get_error_message();
                                        echo json_encode(array('success'=>0,'message'=>'Invalid password. Please try again'));
                                        exit();
                            }else{
                                echo json_encode(array('success'=>4,'importStatus' => $importStatus,'message'=>'loginIn','email'=> $email));
                                exit();
                            }
                        }elseif(email_exist_in_drupal($email)== true){
                               
                                $phone = phone_exists($_POST["email"]); /*To check*/
                                $userId    = $phone['user']->ID;
                                $user_meta = get_userdata($userId);
                                $email     = $user_meta->data->user_email;
                                $exists = email_exists( $email );
                                    if($exists){
                                            echo json_encode(array('success'=>6, 'account_exist'=>'yes','message'=>'Invalid password. Please try again'));    

                                     }else{

                                            $random_password    = rand();
                                            $user_id           =  wp_create_user( $email , $random_password, $email );
                                             $user_data = array(
                                                'ID' => $user_id,
                                                'user_pass' => $password
                                                );

                                                $y = wp_update_user($user_data);
                                                $login_data['user_login'] = $email;  
                                                $login_data['user_password'] = $password;
                                                $login_data['remember'] = $remember_me;  
                                                update_user_meta( $user_id, 'importStatus', 'S');
                                                $importStatus = get_user_meta( $user_id, 'importStatus' ,true);

                                                $user_verify = wp_signon( $login_data, false );
                                                echo json_encode(array('success'=>3, 'importStatus' => $importStatus, 'email'=>$email, 'user_type'=> 'CreateNewUserFromDrupal', 'message'=>'You are login in wordpress'));
                                                exit(); 

                                               
                                     }
                        }else{
                                echo json_encode(array('success'=>5,'importStatus' => 'false','message'=>'Email and Phone Number Does not Exists. Please try again'));
                                exit();
                        }
            }elseif(!email_exists($email) && email_exist_in_drupal($email) ==false){

                     
                 echo json_encode(array('success'=>2, 'importStatus' => 'false','user_type'=> 'Not available', 'message'=>'Email And Phone Does not Exists. Please try again'));
                        exit();        


            }elseif(!email_exists($email) && email_exist_in_drupal($email) ==true){

                $random_password    = rand();
                $user_id            =  wp_create_user( $email , $random_password, $email );
                
                $user_data = array(
                    'ID' => $user_id,
                    'user_pass' => $password
                    );

                    $y = wp_update_user($user_data);
                    $login_data['user_login'] = $email;  
                    $login_data['user_password'] = $password;
                    $login_data['remember'] = $remember_me;  
                    update_user_meta( $user_id, 'importStatus', 'S');
                    $importStatus = get_user_meta( $user_id, 'importStatus' ,true);

                    $user_verify = wp_signon( $login_data, false );
                    echo json_encode(array('success'=>3, 'importStatus' => $importStatus, 'email'=>$email, 'user_type'=> 'CreateNewUserFromDrupal', 'message'=>'You are login in wordpress'));
                    exit(); 



            }       
    }

}



add_action('wp_ajax_createNewUserComing', 'createNewUserComing');
add_action('wp_ajax_nopriv_createNewUserComing', 'createNewUserComing');

function createNewUserComing(){




    if($_POST['action']== 'createNewUserComing'){

        $email = $_POST['email']; 
            /*Come's in drupal database*/
            
            $user_name          = $_POST['email'];
            $org_email          = $_POST['email'];
            $random_password    = rand();
            $user_id            =  wp_create_user( $user_name , $random_password, $org_email );
            $password = 'admin001';
             $user_data = array(
                    'ID' => $user_id,
                    'user_pass' => $password
                );

                $y = wp_update_user($user_data);
                $login_data['user_login'] = $email;  
                $login_data['user_password'] = $password;
                $login_data['remember'] = $remember_me;  
                update_user_meta( $user_id, 'importStatus', 'S');




                  
                $user_verify = wp_signon( $login_data, false );
                echo json_encode(array('success'=>1, 'email'=>$user_name, 'user_type'=> 'createNewUserComing', 'message'=>'You are login'));
            exit();

    }


}

/*reset password email Stop*/
add_filter( 'send_password_change_email', '__return_false' );


require_once "functions/functions-cart-checkout-order-page.php";
require_once "functions/functions-woocommerce-my-account.php";
require_once "functions/functions-subscription-link.php";
require_once "functions/functions-BabelBark-api.php";
require_once "functions/function-import-csv.php";
require_once "functions/functions-aaha-api.php";
require_once "helper-function.php";


 function getSMSByTwillo($account,$userId, $action){

    $user = get_user_by('id', $userId);
    $username = $user->first_name;

    $email = $user->user_email;
    $key = get_password_reset_key( $user );
    $user_login = $user->user_login;

    $status =1;
    $user_info = get_userdata($userId);
    $user_nicename = $user_info->user_nicename;
    $user_login = $user_info->user_login;
    $userEmail  = $user_info->user_email;
    $userRole   = $user_info->roles;
    $message = site_url()."/password-reset?action=rp&key=".$key."&login=".rawurlencode($user_login); 
    $twillo_sid = 'AC333b6c2c50f3445e067ff7caf8f895e7'; 
        $number = preg_replace("/[^0-9]/", "", $account);
        $to  = '1'.$account;
        
        //(646) 355-8711
        $from = '12012258134';
       
        
                $Message .= " Dear ".$user_nicename;
                $Message .= " This is Your Email Address ".$userEmail."\\n\\r";
                $Message .= " Thank you.";
                $Message .= "\\n\\r";
                $Message .= " SmartTag Team ";
       
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.twilio.com/2010-04-01/Accounts/'.$twillo_sid.'/Messages.j%0A',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => 'From=%2B'.$from.'&Body='.$message.'%20&To=%2B'.$to,
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/x-www-form-urlencoded',
                'Authorization: Basic QUMzMzNiNmMyYzUwZjM0NDVlMDY3ZmY3Y2FmOGY4OTVlNzowOTJlMGMxMWYwYjVhZjI3OWNjZmFlZjNiMzY2ZGVmOQ=='
          ),
        ));
        $response = curl_exec($curl);
        $xml = simplexml_load_string($response);
        $json = json_encode($xml);
        $array = json_decode($json,TRUE);
        
        $RestExceptionCode = $array['RestException']['Code'];
        $RestExceptionMessage = $array['RestException']['Message'];
        $delivery_status = $array['Message']['Status'];
            if($RestExceptionCode!=''){
                $result['success'] = 1;
                $result['title']    = 'Message Not Send';
                $result['message']    = $RestExceptionMessage;
            }elseif($delivery_status == 'queued' || $delivery_status == 'sending' || $delivery_status == 'sent'){
                $result['success'] = 1;
                $result['title']    = 'send';
                $result['message']    = 'Password Reset Request link has been sent to your Phone Number.';
            }
              
                return $result;
                die();  
}

/*Michreochip Range Search functionalitry for backend*/


function register_functionlity_for_microchip_search() {
    add_menu_page('Microchip Search', 'Search Microchip', 'add_users', 'Search_microchip_page', '_custom_menu_seach_page', null, 6); 
}
add_action('admin_menu', 'register_functionlity_for_microchip_search');  


function _custom_menu_seach_page(){
    ?>
    <div class="loader-outer" style="display: none;">
         <div class="loader" ></div>
     </div>

    <form method="post" class="michrochip_range" id="MichroChip_range">
        <div class="form-group">
            <div class="group-section">
                <div class="range-haed">
                    <h3 for="" class="text-start">Search Microchip</h3>
                </div>

            <div class="form-contant">
                <input type="text" class="form-control" id="michrochip_start_range" aria-describedby="emailHelp" placeholder="Enter Microchip number">
                <span class="michrochip_start_range" style="display:none;"></span>
          <!--   <div class="form-group">
                <label for="">MichroChip Range End</label>
                <input type="text" class="form-control" id="michrochip_end_range" aria-describedby="emailHelp" placeholder="Enter MichroChip number">
                <span class="michrochip_end_range" style="display:none;">This field is required</span>
            </div> -->
                <button type="submit" id="searchWithMicroChip" class="btn btn-primary">Submit</button>
        </div>   
    </div>
        </div> 
     
    </form>
    <div class="search-row"></div> 
                  <br/>
                  <br/>
                  <br/>
                  <br/>
                  <br/>
                  <br/>
        </div>

<?php  

}

add_action( 'admin_footer', 'searchWithMichrochip' );
function searchWithMichrochip() { ?>
    <script type="text/javascript" >
    jQuery(document).ready(function($) {
        jQuery('#searchWithMicroChip').click(function(e){
            e.preventDefault();
            var michrochip_start_range = $('#michrochip_start_range').val();
            var michrochip_end_range = $('#michrochip_end_range').val();
            if(michrochip_start_range == ''){
                jQuery('.michrochip_start_range').fadeIn();
                jQuery('.michrochip_start_range').text('This field is requires');
                jQuery('.michrochip_start_range').css('color', 'red');
                return false;
            }else if(isNaN(michrochip_start_range)== true){
                jQuery('.michrochip_start_range').fadeIn();
                jQuery('.michrochip_start_range').text('Please enter Number only');
                jQuery('.michrochip_start_range').css('color', 'red');
            }else if(michrochip_start_range.length!=15){
                jQuery('.michrochip_start_range').fadeIn();
                jQuery('.michrochip_start_range').text('Please enter 15 digit Number');
                jQuery('.michrochip_start_range').css('color', 'red');
            }else{
                jQuery('.michrochip_start_range').fadeOut();
                var dataVariable = {
                    'action': 'SeachWithMicrochip', // your action name
                    'michrochip_start_range': $('#michrochip_start_range').val(), 
                    'michrochip_end_range': $('#michrochip_end_range').val(),
                };
                $('.loader-outer').fadeIn();
                jQuery.ajax({
                    url: ajaxurl, // this will point to admin-ajax.php
                    type: 'POST',
                    data: dataVariable, 
                    success: function (response) {
                        $('.loader-outer').fadeOut();
                        $('.search-row').html(response);
                        return false;
                    }
                });
           } 
        });    
    });
    </script> 
    <?php
}


add_action("wp_ajax_SeachWithMicrochip" , "SeachWithMicrochip");
//array('987000008578277' , '987000008578291')

function SeachWithMicrochip(){
    $michrochip_start_range = $_POST['michrochip_start_range'];
    $michrochip_end_range = $_POST['michrochip_end_range'];
    $args = array(
        'post_type' => 'pet_profile',
        'posts_per_page' => 10, 
        'meta_query' => array( 
         array(
             'key' => 'microchip_id_number',
             'value' =>  $michrochip_start_range,
             'compare'=> '='
           
             ),
         )
    ); 
$loop = new WP_Query( $args );
    if($loop->have_posts()){
        while ( $loop->have_posts() ) : $loop->the_post();
                 $userId = get_post_field( 'post_author', get_the_ID() );
                /*Pet Information*/  
                $microchip_id_number = get_post_meta(get_the_ID(),"microchip_id_number",true);
                $smarttag_id_number = get_post_meta(get_the_ID(),"smarttag_id_number",true);
                $PetProsUser_ids = get_getProName_microchipName($microchip_id_number, $smarttag_id_number);
                $PetProsUser_id = $PetProsUser_ids['user_id'];
                $getMichroChipRange = getMichroChipRange($microchip_id_number, $PetProsUser_id); 
                $michroChipRange  = $getMichroChipRange['range']; 
                if(isset($michroChipRange)){
                    $range = $getMichroChipRange['range'];
                }else{
                    $range = 'Range Not Avaliable';
                }
                $PetProfessional = get_userdata($PetProsUser_id);
                $pet_name = get_post_meta(get_the_ID(),"pet_name",true);  
                $pet_type = get_post_meta(get_the_ID(),"pet_type",true); 
                if($pet_type == 587){
                  $pets_type = 'Cat';
                }else if($pet_type == 1045){
                  $pets_type = 'Dog';
                }else if($pet_type == 1046){
                  $pets_type = 'Ferret';
                }else if($pet_type == 588){
                  $pets_type = 'Horse';
                }else if($pet_type == 1048){
                  $pets_type = 'Other';
                }else{
                  $pets_type = 'Rabbit';
                }
                $pet_type = (isset(get_term( $pet_type )->name));  
                $primary_breed = get_post_meta(get_the_ID(),"primary_breed",true);  
                $p_breed =   (isset(get_term( $primary_breed )->name)) ? get_term( $primary_breed )->name : "" ;
                $secondary_breed = get_post_meta(get_the_ID(),"secondary_breed",true);
                $b_breed =   (isset(get_term( $secondary_breed )->name)) ? get_term( $secondary_breed )->name : "" ;
                $primary_color = get_post_meta(get_the_ID(),"primary_color",true);   
                if($primary_color == '1'){
                  $primarycolor =  'Black';
                }else if($primary_color == '2'){
                  $primarycolor = 'Blue';
                }else if($primary_color == '3'){
                  $primarycolor =  'Brown';
                }else if($primary_color == '4'){
                  $primarycolor =  'Gold';
                }else if($primary_color == '5'){
                  $primarycolor =  'Gray';
                }else if($primary_color == '6'){
                  $primarycolor =  'Orange';
                }else if($primary_color == '7'){
                  $primarycolor = 'Sliver';
                }else if($primary_color == '8'){
                  $primarycolor = 'Tan';
                }else if($primary_color == '9'){
                  $primarycolor =  'White';
                }else{
                  $primarycolor =  'Yellow';
                }
                $secondary_color = get_post_meta(get_the_ID(),"secondary_color",true);
              if($secondary_color == '1'){
                  $secoundarycolor =  'Black';
                }else if($secondary_color == '2'){
                  $secoundarycolor = 'Blue';
                }else if($secondary_color == '3'){
                  $secoundarycolor =  'Brown';
                }else if($secondary_color == '4'){
                  $secoundarycolor =  'Gold';
                }else if($secondary_color == '5'){
                  $secoundarycolor =  'Gray';
                }else if($secondary_color == '6'){
                  $secoundarycolor =  'Orange';
                }else if($secondary_color == '7'){
                  $secoundarycolor = 'Sliver';
                }else if($secondary_color == '8'){
                  $secoundarycolor = 'Tan';
                }else if($secondary_color == '9'){
                  $secoundarycolor =  'White';
                }else{
                  $secoundarycolor =  'Yellow';
                }   
                $size = get_post_meta(get_the_ID(),"size",true); 
                if($size == 1){
                    $size = 'Small';
                }elseif($size == 2){
                    $size =  'Medium';
                }else{
                    $size ='Large';
                }
                $gender = get_post_meta(get_the_ID(),"gender",true);   
                $pet_date_of_birth = get_post_meta(get_the_ID(),"pet_date_of_birth",true);   
                $petId = get_the_ID(); 
                $pet_profile_link = site_url().'/my-account/show-profile?pet_id='.$petId;
                $user_profile = site_url().'/wp-admin/user-edit.php?user_id='.$userId;
                $pet_pros_profile = site_url().'/wp-admin/user-edit.php?user_id='.$PetProsUser_id;
                    $user_info = get_userdata($userId);
                    $user_login = $user_info->user_login;
                    $email = $user_info->user_email;
                    $first_name = $user_info->first_name;
                    $last_name = $user_info->last_name;
                    $primary_address_line1 = $user_info->primary_address_line1;
                    $primary_city = $user_info->primary_city;
                    $primary_state = $user_info->primary_state;
                    $primary_postcode = $user_info->primary_postcode;
                    $primary_home_number = $user_info->primary_home_number;
                    $secondary_cell_number = $user_info->secondary_cell_number;
                    $secondary_phone_country_code = $user_info->secondary_phone_country_code; 
                    $primary_phone_country_code = $user_info->primary_phone_country_code; 
                    $primary_country = $user_info->primary_country;
                    $Owner = site_url().'/my-account/show-profile?pet_id='.$petId;
                    $title = get_the_title(get_the_ID()); 
                        if (has_post_thumbnail( get_the_ID())){
                            $image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'single-post-thumbnail' );
                            $image = $image[0];
                        }else{
                            $image = site_url().'/wp-content/uploads/2021/01/dog-placeholder.png';
                        }

                      echo '<div class="col-sm-12">
                      <div class="acc-blue-box">
                      <div class="acc-blue-head">
                              Pet Information
                           </div>
                           <div class="acc-blue-content">
                           <div class="row" style="display:flex;">
                           <div class="col-lg-6">
                           <strong class="bold_area">Microchip ID Number:</strong> <span class="bold_child_sub">' .$microchip_id_number.'</span><br>
                            <strong class="bold_area">ID Tag Serial Number:</strong><span class="bold_child_sub">' .$smarttag_id_number.'</span><br>
                            <strong class="bold_area">Pet Name:</strong> <span class="bold_child_sub">' .$pet_name.'</span><br>
                            <strong class="bold_area">Pet Type:</strong><span class="bold_child_sub">' .$pets_type.'</span>
                          <br><strong class="bold_area">Gender:</strong> <span class="bold_child_sub">' .$gender.'</span><br><strong class="bold_area">Size:</strong> <span class="bold_child_sub">
                            ' .$size.'</span><br><strong class="bold_area">Pet Date of Birth:</strong> <span class="bold_child_sub">' .$pet_date_of_birth.'</span><br>
                          <strong class="bold_area">Primary Breed:</strong><span class="bold_child_sub">' .$p_breed.'</span><br>
                          <strong class="bold_area">Secondary Breed:</strong><span class="bold_child_sub">' .$b_breed.'</span><br>
                          <strong class="bold_area">Primary Color:</strong> <span class="bold_child_sub">' .$primarycolor.'</span>
                          <br>
                          <strong class="bold_area">Secondary Color:</strong><span  class="bold_area" >' .$secoundarycolor.' </span><br>
                           <strong class="bold_area">Pet Profile Link:</strong><span  class="bold_area" > <a href="'.$pet_profile_link.'">Pet Profile</a </span>   
                            </div>
                           <div class="col-lg-6">
                           <div class="pet-img">
                           <img src="'.$image.'" alt="" height="250px" width="250px" />
                           </div>
                           </div>
                           </div>
                            </div>
                          </div>
                          <div class="acc-blue-box">
                           <div class="acc-blue-head">
                            Owner Information
                            
                          </div>
                          <div class="acc-blue-content">
                            <strong class="bold_area">Email:</strong> <span class="bold_child_sub">'.$email.'</span>
                            <br>
                            <strong class="bold_area">First Name:</strong> <span class="bold_child_sub">'.$first_name.'</span>
                            <br>
                            <strong class="bold_area">Last Name:</strong> <span class="bold_child_sub">'.$last_name.'</span>
                            <br>
                            <strong class="bold_area">Address:</strong>
                            <br>
                            <span class="bold_child_sub">'.$primary_address_line1.' <br>'.$primary_city.', '.$primary_state.' ,'.$primary_postcode.', <br>'.$primary_country.' </span>
                          <br>
                          <strong class="bold_area">Primary Phone Number:</strong> <span class="bold_child_sub"><span class="phone-country-code" data-val="in"></span>'.$primary_home_number.'</span>
                          <br>
                          <strong class="bold_area">Secondary Phone Number:</strong> <span class="bold_child_sub"><span class="phone-country-code" data-val="us"></span> '.$secondary_cell_number.'</span><br>

                        
                             <strong class="bold_area">Pet Professional Name:</strong><span class="bold_child_sub"> <a target="_blank" href="'.$pet_pros_profile.'">'.$PetProfessional->data->display_name.'</a> </span>
                              <br>
                             <strong class="bold_area">Pet Owner Profile Link:</strong><span class="bold_child_sub"> <a target="_blank"href="'.$user_profile.'">Owner Profile</a></span> <br>
                               <strong class="bold_area">Range it belongs to:</strong><span >"'. $res = str_replace( array( '\'', '"',',' , ';', '<', '>' ), ' ', $range).'"</span> 
                              

                          </div>
                          </div>
                         </div>';
            endwhile;
            exit();

    }else{
       echo '<span> <a target="_blank"href="'.site_url().'/wp-admin/post-new.php?post_type=pet_profile">Click to register a new microchip</a> </span> <br>';
       exit();
       
    }
}



function get_getProName_microchipName($microchip_id_number, $smarttag_id_number){
    global $wpdb;
    if(!empty($microchip_id_number)){
        $number= $microchip_id_number;
    }else{
         $number= $smarttag_id_number;
    }
    $post_id = $wpdb->get_results("SELECT * FROM `wp_serial_number_data` WHERE `serial_number` = '$number' ORDER BY `serial_number`");
        $result['success'] = 1;
        $result['title']    = 'Get User';
        $result['user_id']    = $post_id[0]->user_id;
        return $result;  
        die(); 
}


function getMichroChipRange($microchip_id_number, $PetProsUser_id){

    $customer_orders = get_posts(array(
          'numberposts' => -1,
          'meta_key' => '_customer_user',
          'orderby' => 'date',
          'order' => 'DESC',
          'meta_value' => $PetProsUser_id,//Pet Prof orderId
          'post_type' => wc_get_order_types(),
          'post_status' => array_keys(wc_get_order_statuses()), 
          'fields' => 'ids',
    ));
    $data = array();
    $user_orders = array(); //
    foreach ($customer_orders as $orderID) {
        $orderObj = wc_get_order($orderID);
            foreach ( $orderObj->get_items() as $item_id => $item ) {
                $data[] = wc_get_order_item_meta( $item_id, 'Serial Number Range', true ); 
            }
    }
            foreach(array_filter($data) as $range){
                $range = explode('-', $range);
                $value = $microchip_id_number;
                $min = $range[0];
                $max = $range[1];
                    if (in_array($value, range($min, $max))) {
                        $range = $min.'-'.$max;
                        $result['range'] = $range;
                        return $result; 
                    } 
            }           die();
}



/* Functionlity for custom search */


function register_functionlity_for_custom_microchip_search() {
    add_menu_page('Custom Search', 'Custom Microchip', 'add_users','Custom_search', '_custom_menu_seach_page_for_petpros', null, 6); 
}

add_action('admin_menu', 'register_functionlity_for_custom_microchip_search');  


function _custom_menu_seach_page_for_petpros(){
    ?>
    <div class="loader-outer" style="display: none;">
         <div class="loader" ></div>
     </div>

    <form method="post" class="searchCustomfunctionality" id="custom_michrochip_search">
        <div class="form-group">
            <div class="group-section">
                <div class="range-haed">
                    <h3 for="" class="text-start">Search Microchip</h3>
                </div>

            <div class="form-contant">
                <input type="text" class="form-control" id="searchCustom" aria-describedby="emailHelp" placeholder="Enter Microchp number/Id tag serial number/First Name/Last Name/phone number">
                <span class="michrochip_start_range" style="display:none;"></span>
    
                <button type="submit" id="searchCustomfunctionality" class="btn btn-primary">Search</button>
        </div>   
    </div>
        </div> 
     
    </form>
    <div class="search-row"></div> 
                  <br/>
                  <br/>
                  <br/>
                  <br/>
                  <br/>
                  <br/>
        </div>

<?php  

}
add_action( 'admin_footer', 'customsearchWithMichrochip' );
function customsearchWithMichrochip(){ ?>


    <script type="text/javascript" >
    jQuery(document).ready(function($) {
        jQuery('#searchCustomfunctionality').click(function(e){
            e.preventDefault();

            var searchCustom = $('#searchCustom').val();
           
            if(searchCustom == ''){
                jQuery('.michrochip_start_range').fadeIn();
                jQuery('.michrochip_start_range').text('This field is required');
                jQuery('.michrochip_start_range').css('color', 'red');
                return false;
            }else{
                jQuery('.michrochip_start_range').fadeOut();
                var dataVariable = {
                    'action': 'customeSearchFunctionality', // your action name
                    'searchCustom': $('#searchCustom').val(), 
                   
                };
                $('.loader-outer').fadeIn();
                jQuery.ajax({
                    url: ajaxurl, // this will point to admin-ajax.php
                    type: 'POST',
                    data: dataVariable, 
                    success: function (response) {
                        $('.loader-outer').fadeOut();
                        $('.search-row').html(response);
                        return false;
                    }
                });
           } 
        });    
    });
    </script> 
    <?php
}


add_action('wp_ajax_customeSearchFunctionality', 'customeSearchFunctionality');
add_action('wp_ajax_nopriv_customeSearchFunctionality', 'customeSearchFunctionality');

function customeSearchFunctionality(){
    
   if(isset($_POST['action'])== 'customeSearchFunctionality'){
    //$pet_data = $_POST['searchCustom'];
    //$length = strlen($pet_data);
    // if($length == 10){
    //           $phone = preg_replace("/[^0-9]*/",'',$pet_data);
    //           $sArea = substr($phone,0,3);
    //           $sPrefix = substr($phone,3,3);
    //           $sNumber = substr($phone,6,4);
    //           $phone = "(".$sArea.") ".$sPrefix."-".$sNumber;
    //           $key =  'primary_home_number';
    //           $value =$phone;
    //       }elseif($length == 8){
    //           $key =  'smarttag_id_number';
    //           $value =$pet_data;
    //           $compare = '=';
    //       }elseif($length == 15){
    //           $key =  'microchip_id_number';
    //           $value =$pet_data;
    //            $compare = '=';
    //       }elseif(email_exists($pet_data)){
    //             $key =  'owner_email';
    //             $value =$pet_data;
    //             $compare = '=';
    //       }else{

    //             $key =  'owner_name';
    //             $value = $pet_data;
    //             $compare = '=';
               
    //       }

    // $args =  array(
    //         'post_type' => 'pet_profile',
    //         'post_status' => 'publish',
    //         'posts_per_page' => -1,
    //         'meta_query' => array(
    //             array(
    //                 'key'     => $key,
    //                 'value'   => $value,
    //                 'compare' => $compare
    //             )
    //       )
    // );


    // rohit
    $search_string = $_POST['searchCustom'];
    $meta_array = [];
    $searchBy = ["primary_home_number", "smarttag_id_number", "microchip_id_number","owner_email","owner_name"];
    foreach ($searchBy as $meta_key) {
        $fields = array(
                "key" => $meta_key,
                "value" => trim($search_string),
                "compare" => "=",
            );
        array_push($meta_array,$fields);
    }
    $meta_array['relation'] = 'OR';
        
    // print_r($meta_array);
    $args =  array(
        'post_type' => 'pet_profile',
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'meta_query' => array($meta_array)
    );

    $query = new WP_Query($args);
            if( $query->have_posts() ){ ?>

            <table id="customers" class="table-section">
                <tr>
                    <th>S.NO</th>   
                    <th>MicroChip Number</th>
                    <th>Serial Number</th>
                    <th>Email Address</th>
                    <th>Phone Number</th>
                    <th>Owner First Name</th>
                    <th>Owner Last Name</th>
                </tr>
                <?php
                $i=1;
                while( $query->have_posts() ) : $query->the_post();
                ?>
                <tr>
                <?php
                    $post_id = get_the_ID();
                    $userId = get_post_field( 'post_author', get_the_ID() );
                    $microchip_id_number = get_post_meta(get_the_ID(),"microchip_id_number",true);
                    $smarttag_id_number = get_post_meta(get_the_ID(),"smarttag_id_number",true);
                    $pet_name = get_post_meta(get_the_ID(),"pet_name",true);  
                    $pet_type = get_post_meta(get_the_ID(),"pet_type",true); 

                    if($pet_type == 587){
                        $pets_type = 'Cat';
                    }else if($pet_type == 1045){
                        $pets_type = 'Dog';
                    }else if($pet_type == 1046){
                        $pets_type = 'Ferret';
                    }else if($pet_type == 588){
                        $pets_type = 'Horse';
                    }else if($pet_type == 1048){
                        $pets_type = 'Other';
                    }else{
                        $pets_type = 'Rabbit';
                    }

                    $pet_type = (isset(get_term( $pet_type )->name));  
                    $primary_breed = get_post_meta(get_the_ID(),"primary_breed",true);  
                    $p_breed =   (isset(get_term( $primary_breed )->name)) ? get_term( $primary_breed )->name : "" ;
                    $secondary_breed = get_post_meta(get_the_ID(),"secondary_breed",true);
                    $b_breed =   (isset(get_term( $secondary_breed )->name)) ? get_term( $secondary_breed )->name : "" ;   
                    $primary_color = get_post_meta(get_the_ID(),"primary_color",true);   
                      if($primary_color == '1'){
                          $primarycolor =  'Black';
                        }else if($primary_color == '2'){
                          $primarycolor = 'Blue';
                        }else if($primary_color == '3'){
                          $primarycolor =  'Brown';
                        }else if($primary_color == '4'){
                          $primarycolor =  'Gold';
                        }else if($primary_color == '5'){
                          $primarycolor =  'Gray';
                        }else if($primary_color == '6'){
                          $primarycolor =  'Orange';
                        }else if($primary_color == '7'){
                          $primarycolor = 'Sliver';
                        }else if($primary_color == '8'){
                          $primarycolor = 'Tan';
                        }else if($primary_color == '9'){
                          $primarycolor =  'White';
                        }else{
                          $primarycolor =  'Yellow';
                        }
                      $secondary_color = get_post_meta(get_the_ID(),"secondary_color",true);
                      if($secondary_color == '1'){
                          $secoundarycolor =  'Black';
                        }else if($secondary_color == '2'){
                          $secoundarycolor = 'Blue';
                        }else if($secondary_color == '3'){
                          $secoundarycolor =  'Brown';
                        }else if($secondary_color == '4'){
                          $secoundarycolor =  'Gold';
                        }else if($secondary_color == '5'){
                          $secoundarycolor =  'Gray';
                        }else if($secondary_color == '6'){
                          $secoundarycolor =  'Orange';
                        }else if($secondary_color == '7'){
                          $secoundarycolor = 'Sliver';
                        }else if($secondary_color == '8'){
                          $secoundarycolor = 'Tan';
                        }else if($secondary_color == '9'){
                          $secoundarycolor =  'White';
                        }else{
                          $secoundarycolor =  'Yellow';
                        }   
                        $size = get_post_meta(get_the_ID(),"size",true); 
                           if($size == 1){
                            $size = 'Small';
                          }elseif($size == 2){
                            $size =  'Medium';
                          }else{
                            $size ='Large';

                          }
                        $gender = get_post_meta(get_the_ID(),"gender",true);   
                        $pet_date_of_birth = get_post_meta(get_the_ID(),"pet_date_of_birth",true);   
                        $petId = get_the_ID(); 
                        /*$pet_profile_link = site_url().'/my-account/show-profile?pet_id='.$petId;
*/
                        $pet_profile_link = site_url().'/wp-admin/post.php?post='.$petId.'&action=edit';
                        $user_info = get_userdata($userId);
                        $email = $user_info->user_email;
                        $user_login = $user_info->user_login;
                        $first_name = $user_info->first_name;
                        $last_name = $user_info->last_name;
                        $primary_address_line1 = $user_info->primary_address_line1;
                        $primary_city = $user_info->primary_city;
                        $primary_state = $user_info->primary_state;
                        $primary_postcode = $user_info->primary_postcode;
                        $primary_home_number = $user_info->primary_home_number;
                        $secondary_cell_number = $user_info->secondary_cell_number;
                        $secondary_phone_country_code = $user_info->secondary_phone_country_code; 
                        $primary_phone_country_code = $user_info->primary_phone_country_code; 
                        $primary_country = $user_info->primary_country;
                        $Owner = site_url().'/wp-admin/user-edit.php?user_id='.$userId;
                        $title = get_the_title(get_the_ID()); 
                            if (has_post_thumbnail( get_the_ID())){
                                $image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'single-post-thumbnail' );
                                $image = $image[0];

                            }else{
                                $image = site_url().'/wp-content/uploads/2021/01/dog-placeholder.png';
                            } ?>
                            
                            <td><?php echo $i; ?></td>
                            <td><a  target="_blank" href="<?php echo $pet_profile_link;?>"><?php echo $microchip_id_number ?></td>
                            <td><a  target="_blank" href="<?php echo $pet_profile_link;?>"><?php echo $smarttag_id_number; ?></td>
                            <td><a  target="_blank" href="<?php echo $Owner;?>"><?php echo $email; ?></td>
                            <td><a  target="_blank" href="<?php echo $Owner;?>"><?php echo $primary_home_number; ?></td>
                            <td><a  target="_blank" href="<?php echo $Owner;?>"><?php echo $first_name; ?></td>
                            <td><a  target="_blank" href="<?php echo $Owner;?>"><?php echo $last_name; ?></td>
                         </tr>
                     <?php
                        $i++;
                          endwhile;
                       ?>  </table>
                       <?php   
                          exit();
                }else{
                    echo "</br><div class='not-found width-100'>No Results Found</div>";
                }  
        exit();
    }
}


add_action("init", function(){

    if(isset($_GET['test'])){
        
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://staging.idtag.com/idtag-api/pet-register-microchip/add',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS =>'{
            "FirstName": "demo_first_name",
            "LastName": "demo_last_name",
            "Email": "demo@idtag.com",
            "PrimaryPhone": "1234567890",
            "Address": "",
            "City": "",
            "State": "",
            "Country": "",
            "PostalCode": "",
            "Pet": {
                "MicrochipId": "987000221144567",
                "PetName": "Spot",
                "PetType": "Dog",
                "PrimaryColor": "Blue",
                "Gender": "male",
                "Size": "small", 
                "Dob": "2022-03-30",
                "SecoundaryColor": "brown"
            }
        }',
          CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json'
          ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;
        die;
        

    }
});