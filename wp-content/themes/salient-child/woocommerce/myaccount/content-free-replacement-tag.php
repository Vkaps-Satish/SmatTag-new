<?php
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);

    
 ?>
<style>
  .hr{
    border-top:1px solid #527fb4;
    margin: 10px auto;
  }
  .Shipping_cart{
    display: flex;
    flex-wrap: wrap;
  }
  .shipning_inner-cart{
    flex: 1;
    padding: 5px;
  }.shipning_inner-cart:nth-child(2){
     border-left: 1px solid #527fb4;
     border-right: 1px solid #527fb4;
  }
  .shipning_inner-cart p{
    margin-bottom: 0;
    padding-bottom: 10px;
  }
  .shipning_inner-cart img {
    width: 100%;
    max-width: 150px;
    border: 1px solid #527fb4;
    padding: 10px;
    border-radius: 5px;
  }
  .Shipping_cart.addTocart_btn{
    justify-content: flex-end;
    border-top: 1px solid #527fb4;
      padding-top: 15px;
  }
</style>

<?php 
$currentUserId  = get_current_user_id();
$postId         = $_GET['pet_id'];
$userId         = get_post_field( 'post_author', $postId );
if ($currentUserId != $userId) {
    echo '<div class="not-found-text width-100">You are not authorized, as you are not the owner of the pet.</div>';
}else{
    $mypod = pods( 'pet_profile', $postId );
    $smartTagId = $mypod->display('smarttag_id_number');
    global $wpdb, $globalRepBrassIdTag, $globalRepAluminumIdTag, $globalBrassIdTag, $globalAluminumIdTag;
     $results = $wpdb->get_results("SELECT wp_woocommerce_order_items.`order_item_name`, wp_woocommerce_order_items.`order_item_type`, wp_woocommerce_order_items.`order_id`, wp_woocommerce_order_itemmeta.* FROM wp_woocommerce_order_items JOIN wp_woocommerce_order_itemmeta ON wp_woocommerce_order_items.order_item_id = wp_woocommerce_order_itemmeta.order_item_id where wp_woocommerce_order_itemmeta.order_item_id = (SELECT MAX(order_item_id) FROM wp_woocommerce_order_itemmeta where meta_value = '".$smartTagId."' and meta_key = 'Serial Number')", OBJECT);




    $dataa = json_encode($results);
    $data = json_decode($dataa);

   

    foreach ($data as $value) {

        
      

       $order_id = $value->order_id;
     
       if ($value->meta_key == 'FrontLine1') {
           $frontLine1 = strip_tags($value->meta_value);
       }elseif ($value->meta_key == 'FrontLine2') {
           $frontLine2 = strip_tags($value->meta_value);
       }elseif ($value->meta_key == 'FrontLine3') {
           $frontLine3 = strip_tags($value->meta_value);
       }elseif ($value->meta_key == 'FrontLine4') {
           $frontLine4 = strip_tags($value->meta_value);
       }elseif ($value->meta_key == 'BackLine1') {
           $backLine1  = strip_tags($value->meta_value);
       }elseif ($value->meta_key == 'BackLine2') {
           $backLine2  = strip_tags($value->meta_value);
       }elseif ($value->meta_key == 'BackLine3') {
           $backLine3  = strip_tags($value->meta_value);
       }elseif ($value->meta_key == 'BackLine4') {
           $backLine4  = strip_tags($value->meta_value);
       }elseif ($value->meta_key == '_product_id') {
           $product_id  = $value->meta_value;
       }elseif ($value->meta_key == '_variation_id') {
           $variation_id  = $value->meta_value;
       }elseif ($value->meta_key == 'pa_shape') {
           $shape  = $value->meta_value;
       }elseif ($value->meta_key == 'pa_size') {
           $size  = $value->meta_value;
       }elseif ($value->meta_key == 'pa_color') {
           $color  = $value->meta_value;
       }elseif ($value->meta_key == 'pa_ttype') {
           $type  = $value->meta_value;
       }elseif ($value->meta_key == 'pa_style') {
           $style  = $value->meta_value;
       }elseif ($value->meta_key == 'FrontImage') {
            $frontImage  = $value->meta_value;
       }elseif ($value->meta_key == 'BackImage') {
           $backImage  = $value->meta_value;
       }
    } 

    

if(isset($product_id)){
   


    if ($product_id == $globalBrassIdTag || $product_id == $globalRepBrassIdTag) {
       $attributes = array(
           'pa_ttype'  => $type,
           'pa_size'   => $size,
           'pa_style'  => $style,
       );
    }elseif ($product_id == $globalAluminumIdTag || $product_id == $globalRepAluminumIdTag) {
       $attributes = array(
           'pa_shape'  => $shape,
           'pa_size'   => $size,
           'pa_color'  => $color,
       );
    }
    ?>
    <div class="pp-tabs-wrap">
       <div class="pp-tabs-nav">
          <div class="view pp-tabs-nav-inner pp-tab-option-1 active">View</div>
          <div class="view pp-tabs-nav-inner pp-tab-option-2">Edit</div>
      </div>
      <div class="pp-tabs-content pp-tab-content-1 simple-pet-info" 22 style="display: block;">
          <div class="acc-blue-box mb-15">
             <div class="acc-blue-head">
                Pet ID Tag Information-
                <div class="acc-edit lines-edit">
                   <i class="fa fa-edit"></i> EDIT
               </div>
           </div>
           <div class="acc-blue-content">
            <div class="row">
               <div class="col-sm-2 rmb-15">



                  <?php echo get_the_post_thumbnail($postId); ?>
              </div>
              <div class="col-sm-5 rmb-15">
                  <h4 class="color-light-blue">FRONT</h4>
                  <?php if ($product_id == $globalBrassIdTag || $product_id == $globalRepBrassIdTag) { 
                     echo $frontImage;
                 }elseif ($product_id == $globalAluminumIdTag || $product_id == $globalRepAluminumIdTag) { ?>
                  <p class="fline1"><strong>Line 1:</strong> <span><?php            echo $frontLine1; ?></span></p>
                  <p class="fline2"><strong>Line 2:</strong> <span><?php            echo $frontLine2; ?></span></p>
                  <p class="fline3"><strong>Line 3:</strong> <span><?php            echo $frontLine3; ?></span></p>
                  <p class="fline4"><strong>Line 4:</strong> <span><?php            echo $frontLine4; ?></span></p>
              <?php } ?>
          </div>
          <div class="col-sm-5">
              <h4 class="color-light-blue">BACK</h4>
              <p class="bline1"><strong>Line 1:</strong> <span><?php echo $backLine1; ?></span></p>
              <p class="bline2"><strong>Line 2:</strong> <span><?php echo $backLine2; ?></span></p>
              <p class="bline3"><strong>Line 3:</strong> <span><?php echo $backLine3; ?></span></p>
              <p class="bline4"><strong>Line 4:</strong> <span><?php echo $backLine4; ?></span></p>
          </div>
      </div>
    </div>
    </div>
    </div>

<?php  ?>

    <!-- for protection plan start -->
  <div class="pp-tabs-content pp-tab-content-1 with_pa_protection1" style="display: hide;">
      <div class="acc-blue-box mb-15">
          <div class="acc-blue-head">

              <span class="shipping_information">Customer Shipping Information</span>
              <div class="acc-edit lines-edit">
                  <i class="fa fa-cog"></i> EDIT
              </div>
          </div>
          <div class="acc-blue-content">
            <div class="Shipping_cart">
              <div class="shipning_inner-cart">
                <h4>YOUR ORDER:</h4>
                <strong>Replacement Tag :</strong><br>
                      <strong>Pet Name :</strong><?php echo get_the_title(); ?>
                     <?php echo $backImage?>
              </div>
              <div class="shipning_inner-cart">
                 <h3>Shipping Info:</h3> 
                    <p>Billing Adderess</p>
                                    <?php 
                                    $order = wc_get_order($order_id);

                                  echo $billing_first_name = $order->get_billing_first_name(); echo "&nbsp;";
                                  echo $billing_last_name  = $order->get_billing_last_name();echo "";
                                  echo $billing_company    = $order->get_billing_company();echo "<br>";
                                  echo $billing_address_1  = $order->get_billing_address_1();echo "<br>";
                                  echo $billing_address_2  = $order->get_billing_address_2();echo "<br>";
                                  echo $billing_city       = $order->get_billing_city();echo "<br>";
                                  echo $billing_state      = $order->get_billing_state();echo "<br>";
                                  echo $billing_postcode   = $order->get_billing_postcode(); echo "<br>";
                                  echo $billing_country    = $order->get_billing_country(); echo "<br>"; ?>
<div class="hr"></div>
           <h3>Shipping Info:</h3> 
                    <p>Billing Adderess</p> 
              </div>
              <div class="shipning_inner-cart">
                <?php 
                       echo  $shipping_method_title       = $order->get_shipping_method();                                      
   // unset($_POST['action']);
   // $PetArg = $_POST['protectionArrangement'];
                         ?>
                         <p><a href="https://staging.idtag.com/my-account/edit-address/billing/" class="btn">Edit Billing Information</a></p>          
              </div>

            </div>
            <div class="Shipping_cart addTocart_btn">
              <form  action="" method="post" id="replace-form">
                            <input type="hidden" name="product_id" class="product_id" value="<?php echo $product_id; ?>" id="product-id">
                            <input type="hidden" name="variation_id" class="variation_id" value="<?php echo $variation_id; ?>" id="variation_id">
                            <input type="hidden" name="size" class="size" value="<?php echo $size; ?>" id="size">
                            <input type="hidden" name="color" class="color" value="<?php echo $color; ?>" id="color">
                            <input type="hidden" name="shape" class="shape" value="<?php echo $shape; ?>" id="shape">
                            <input type="hidden" name="style" class="style" value="<?php echo $style; ?>" id="style">
                      <input type="hidden" name="frontLine1" class="front-line-1 front-line" value="<?php if(isset($frontLine1)){ echo $frontLine1; } ?>">
                      <input type="hidden" name="frontLine2" class="front-line-2 front-line"  value="<?php if(isset($frontLine2)){ echo $frontLine2; } ?>">
                      <input type="hidden" name="frontLine3" class="front-line-3 front-line"  value="<?php if(isset($frontLine3)){ echo $frontLine3; } ?>">
                      <input type="hidden" name="frontLine4" class="front-line-4 front-line"  value="<?php if(isset($frontLine4)){ echo $frontLine4; } ?>">
                      <input type="hidden" name="backLine1" class="back-line-1"  value="<?php if(isset($backLine1)){ echo $backLine1; }?>">
                      <input type="hidden" name="backLine2" class="back-line-2"  value="<?php if(isset($backLine2)){ echo $backLine2; } ?>">
                      <input type="hidden" name="backLine3" class="back-line-3"  value="<?php if(isset($backLine3)){ echo $backLine3; } ?>">
                      <input type="hidden" name="backLine4" class="back-line-4"  value="<?php if(isset($backLine4)){ echo $backLine4; } ?>">
                      <input type="submit" name="submit" class="single_id_tag_add_to_cart_button" value="Add to Cart">
            </form>
            </div>
            <!-- end Shipping_cart -->

             
              </div>
          </div>
      </div>
  </div>
<!-- for protection plan end -->






    <div class="pp-tabs-content pp-tab-content-2">
      <div class="contact-form">
         <form action="" method="post" class="update-form">
            <input type="hidden" name="post_id" value="<?php echo $postId; ?>">      
            <div class="acc-blue-box">
               <div class="acc-blue-content">
                  <div class="row">
                     <?php if ($product_id == $globalBrassIdTag || $product_id == $globalRepBrassIdTag) {
                        echo '<div class="col-sm-12 mb-15">
                        <h4 class="color-light-blue">BACK</h4>
                        <p><strong>Line 1: </strong><input type="text" name="backLine1" value="<?php echo $backLine1; ?>" class="backLine1" ></p>
                        <p><strong>Line 2: </strong><input type="text" name="backLine2" value="<?php echo $backLine2; ?>" class="backLine2" ></p>
                        <p><strong>Line 3: </strong><input type="text" name="backLine3" value="<?php echo $backLine3; ?>" class="backLine3" ></p>
                        <p><strong>Line 4: </strong><input type="text" name="backLine4" value="<?php echo $backLine4; ?>" class="backLine4" ></p>
                        </div>
                        </div>
                        ';
                    }elseif ($product_id == $globalAluminumIdTag || $product_id == $globalRepAluminumIdTag) {
                       echo '
                       <div class="col-sm-6 mb-15">
                       <h4 class="color-light-blue">FRONT</h4>
                       <p><strong>Line 1: </strong><input type="text" name="frontLine1" maxlength="20" class="frontLine1" value="<?php echo $frontLine1; ?>"></p>
                       <p><strong>Line 2: </strong><input type="text" name="frontLine2" maxlength="20" class="frontLine2" value="<?php echo $frontLine2; ?>"></p>
                       <p><strong>Line 3: </strong><input type="text" name="frontLine3" maxlength="20" class="frontLine3" value="<?php echo $frontLine3; ?>"></p>
                       <p><strong>Line 4: </strong><input type="text" name="frontLine4" maxlength="20" class="frontLine4" value="<?php echo $frontLine4; ?>"></p>
                       </div>
                       <div class="col-sm-6 mb-15">
                       <h4 class="color-light-blue">BACK</h4>
                       <p><strong>Line 1: </strong><input type="text" name="backLine1" maxlength="20" value="<?php echo $backLine1; ?>" class="backLine1" ></p>
                       <p><strong>Line 2: </strong><input type="text" name="backLine2" maxlength="20" value="<?php echo $backLine2; ?>" class="backLine2" ></p>
                       <p><strong>Line 3: </strong><input type="text" name="backLine3" maxlength="20" value="<?php echo $backLine3; ?>" class="backLine3" ></p>
                       <p><strong>Line 4: </strong><input type="text" name="backLine4"  maxlength="20" value="<?php echo $backLine4; ?>" class="backLine4" ></p>
                       </div>
                       </div>
                       ';
                   }?>
                   <div class="text-center">
                       <button type="button" class="site-btn-light-blue lines-show">Save</button>
                   </div>
               </div>
           </div>
       </form>
    </div>
    </div>
    <div class="row">
        <div class="col-sm-4 rmb-15">
            <div class="blue-border-box">
              <p></p>
              <?php  
                $customer_user_id = get_current_user_id(); // current user ID here for example
                $customer_orders = wc_get_orders( array(
                    'meta_key' => '_customer_user',
                    'meta_value' => $customer_user_id,
                    'numberposts' => -1
                ));
                foreach($customer_orders as $order ){
                    foreach($order->get_items() as $item_id => $item){
                        if( method_exists( $item, 'get_data' ) ) {
                            $item_data = $item->get_data();
                                $order_id = $item_data['order_id'];
                                $result = $wpdb->get_results('select t1.*, t2.* FROM 
                             wp_woocommerce_order_items as t1 JOIN wp_woocommerce_order_itemmeta as t2 ON t1.order_item_id = t2.order_item_id where t1.order_id='.$order_id);
                            foreach ($result as $result1) {
                                if ($result1->meta_key == 'pa_protection') {
                                    $pa_protection = strip_tags($result1->meta_value);
                                    $myArray[] = $pa_protection;
                                }
                            }
                        } 
                    }
                }
                if ($product_id == 6089 || $product_id == 7722) {
                    if ($type == "bone") {
                        echo $backImage; 
                    }elseif ($type == "circle") {
                        echo $backImage; 
                    }elseif ($type == "heart") {
                        echo $backImage; 
                    }
                }elseif ($product_id == 6033 || $product_id == 7659) {
                    if ($shape == "bone") {
                        echo $backImage; 
                    }elseif ($shape == "circle") {
                        echo $backImage; 
                    }elseif ($shape == "heart") {
                        echo $backImage; 
                    }
                }
                if ($myArray!='') { 
                    if(in_array('platinum',$myArray ) || in_array('gold',$myArray )){ ?>
                        <a href="javascript:;" class="color-light-blue with_pa_protection  ">Order Replacement Tag<i class="fa fa-caret-right"></i></a>
                    <?php }else{  ?>
                            <a href="javascript:;" class="color-light-blue replace-btn">Order Replacement Tag <i class="fa fa-caret-right"></i></a>
                        <?php }  
                    }else{  ?>
                            <a href="javascript:;" class="color-light-blue replace-btn">Order Replacement Tag <i class="fa fa-caret-right"></i></a>
                        <?php } ?>
            </div>
        </div>
          <div class="col-sm-4 rmb-15">
              <div class="blue-border-box">
                  <p></p>
                  <?php if(isset($frontImage)){ echo $frontImage; }
                      if ($product_id == 6033 || $product_id == 7659) {
                          echo $frontLine1."<br>".$frontLine2."<br>".$frontLine3."<br>".$frontLine4."<br>";
                      }
                  ?>
                  <a href="javascript:;" class="color-light-blue old-product">Order Your Custom Tag <i class="fa fa-caret-right"></i></a>
              </div>                
          </div>
          <div class="col-sm-4 rmb-15">
              <div class="blue-border-box">
                  <p>
                    <img src="https://staging.idtag.com/wp-content/uploads/2018/01/Brass-tags-1.png">
                  </p>
                  
                <a href="https://staging.idtag.com/product/aluminum-id-tag/" class="color-light-blue">Create a New Tag <i class="fa fa-caret-right"></i></a> 
              </div>              
        </div>
    </div>
    <form style="display: none;" action="" method="post" id="replace-form">
       <input type="hidden" name="product_id" value="<?php echo $product_id; ?>" id="product-id">
       <input type="hidden" name="frontLine1" class="front-line-1 front-line" value="">
       <input type="hidden" name="frontLine2" class="front-line-2 front-line" value="">
       <input type="hidden" name="frontLine3" class="front-line-3 front-line" value="">
       <input type="hidden" name="frontLine4" class="front-line-4 front-line" value="">
       <input type="hidden" name="backLine1" class="back-line-1" value="">
       <input type="hidden" name="backLine2" class="back-line-2" value="">
       <input type="hidden" name="backLine3" class="back-line-3" value="">
       <input type="hidden" name="backLine4" class="back-line-4" value="">
       <input type="hidden" name="serialNumber" value="<?php echo $smartTagId; ?>">
       <?php if ($product_id == 6089 || $product_id == 7722) { ?>
           <input type="hidden" name="type" value="<?php echo $type; ?>">
           <input type="hidden" name="style" value="<?php echo $style; ?>">
       <?php } elseif ($product_id == 6033 || $product_id == 7659) { ?>
           <input type="hidden" name="color" value="<?php echo $color; ?>">
           <input type="hidden" name="type" value="<?php echo $shape; ?>">
       <?php } ?>
       <input type="hidden" name="size" value="<?php echo $size; ?>">
    </form>

 <?php }else{
            echo "Sorry No Idtag to Replacement";
 } ?>
    <script type="text/javascript">
        jQuery(document).ready(function($){
            $('.with_pa_protection').click(function(){
            $('.with_pa_protection1').toggle();
            $('.simple-pet-info').toggle();
        });
        $(".lines-edit").click(function(){
               $(".pp-tab-option-2").click();
        });
        $(".lines-show").click(function(){
            var is_done = true;
            console.log($('input.frontLine1').val().length);
            for (var i = 1; i <= 4 ; i++) {
                if($('input.frontLine'+i).val().length > 20){
                   alert('Please select below 20 ');
                   is_done = false;
                   break;
                   return false;
                } 
            }
            $("p.fline1 span").text($('input.frontLine1').val());
            $("p.fline2 span").text($('input.frontLine2').val());
            $("p.fline3 span").text($('input.frontLine3').val());
            $("p.fline4 span").text($('input.frontLine4').val());

            $("p.bline1 span").text($('input.backLine1').val());
            $("p.bline2 span").text($('input.backLine2').val());
            $("p.bline3 span").text($('input.backLine3').val());
            $("p.bline4 span").text($('input.backLine4').val());
                if(is_done){
                   $(".pp-tab-option-1").click();
                }

        });
            $(".pp-tab-option-2").click(function(){
                $('input.frontLine1').val($("p.fline1 span").text());
                $('input.frontLine2').val($("p.fline2 span").text());
                $('input.frontLine3').val($("p.fline3 span").text());
                $('input.frontLine4').val($("p.fline4 span").text());
                $('input.backLine1').val($("p.bline1 span").text());
                $('input.backLine2').val($("p.bline2 span").text());
                $('input.backLine3').val($("p.bline3 span").text());
                $('input.backLine4').val($("p.bline4 span").text());
            });
            $('.replace-btn').on('click',function(){
               var productId = $('input#product-id').val();
               $('input.front-line-1').val($("p.fline1 span").text());
               $('input.front-line-2').val($("p.fline2 span").text());
               $('input.front-line-3').val($("p.fline3 span").text());
               $('input.front-line-4').val($("p.fline4 span").text());
               $('input.back-line-1').val($("p.bline1 span").text());
               $('input.back-line-2').val($("p.bline2 span").text());
               $('input.back-line-3').val($("p.bline3 span").text());
               $('input.back-line-4').val($("p.bline4 span").text());
               if (productId == '6089' || productId == '7722') {
                   $('input.front-line').prop('disabled', true);
                   $('form#replace-form').attr('action','/product/aluminum-id-tag-2/');
                   $('form#replace-form').submit();
               }else if (productId == '6033' || productId == '7659') {
                   $('form#replace-form').attr('action','/product/brass-id-tag-2/');
                   $('form#replace-form').submit();
               }
            });
            $('.replace-btn-2').on('click',function(){
               var productId = $('input#product-id').val();
               $('input.front-line-1').val($("p.fline1 span").text());
               $('input.front-line-2').val($("p.fline2 span").text());
               $('input.front-line-3').val($("p.fline3 span").text());
               $('input.front-line-4').val($("p.fline4 span").text());
               $('input.back-line-1').val($("p.bline1 span").text());
               $('input.back-line-2').val($("p.bline2 span").text());
               $('input.back-line-3').val($("p.bline3 span").text());
               $('input.back-line-4').val($("p.bline4 span").text());
               if (productId == '6033' || productId == '7659') {
                   $('input.front-line').prop('disabled', true);
                   $('form#replace-form').attr('action','/product/aluminum-id-tag-2/');
                   $('form#replace-form').submit();
               }else if (productId == '6089' || productId == '7722') {
                   $('form#replace-form').attr('action','/product/brass-id-tag-2/');
                   $('form#replace-form').submit();
               }
            });
        });
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
  
$(document).ready(function(){
    $(document).on('click', '.single_id_tag_add_to_cart_button', function (e) {
            e.preventDefault();
            var size = $('.size').val();
            var color = $('.color').val();
            var shape = $('.shape').val();
             var style = $('.style').val();
            var frontLine1 = $('.front-line-1').val();
            var frontLine2 =$('.front-line-2').val();
            var frontLine3 = $('.front-line-3').val();
            var frontLine4 = $('.front-line-4').val();
            var backLine1 = $('.back-line-1').val();
            var backLine2 = $('.back-line-2').val();
            var backLine3 = $('.back-line-3').val();
            var backLine4 = $('.back-line-4').val();
            var product_id = $('.product_id').val();
            var variation_id = $('.variation_id').val();
            if (product_id == 6089 || product_id == 7722) { 
                data1 = {
                        'attribute_pa_ttype': 'bone',
                        'attribute_pa_size': size,
                        'attribute_pa_style': style,
                        'product_id': product_id,
                        'variation_id': variation_id,
                        'action': 'woocommerce_ajax_add_to_cart',
                        'engraving_front_line_1': frontLine1,
                        'engraving_front_line_2': frontLine2,
                        'engraving_front_line_3': frontLine3,
                        'engraving_front_line_4': frontLine4,
                        'engraving_back_line_1': backLine1,
                        'engraving_back_line_2': backLine2,
                        'engraving_back_line_3': backLine3,
                        'price': 0,

                  };
            }else if (product_id == 6033 || product_id == 7659) { 
                    data1 = {
                        'attribute_pa_shape': shape,
                        'attribute_pa_size': size,
                        'attribute_pa_color': color,
                        'action': 'woocommerce_ajax_add_to_cart',
                        'product_id': product_id,
                        'variation_id': variation_id,
                        'engraving_front_line_1': frontLine1,
                        'engraving_front_line_2': frontLine2,
                        'engraving_front_line_3': frontLine3,
                        'engraving_front_line_4': frontLine4,
                        'engraving_back_line_1': backLine1,
                        'engraving_back_line_2': backLine2,
                        'engraving_back_line_3': backLine3,
                       
                    };
            }
                  $(".loader-wrap").fadeIn();
                    $.ajax({
                        type: 'POST',
                        url: ajaxurl,
                        data: data1,
                        success: function(response) {
                            //return false;
                            $(".loader-wrap").fadeOut();
                            console.log(response);
                            window.location.href = window.location.origin+'/cart';
                        }
                    });
    });

});

</script>
<?php }