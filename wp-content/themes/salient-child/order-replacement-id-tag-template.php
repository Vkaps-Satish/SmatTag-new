<?php 
/*
* Template Name:  Order Replacement Id Tag Template
*/
get_header(); 
if ( !is_user_logged_in() ){
    print('<script>
    		window.location.href = "'.site_url().'/login-to-smarttag/?login=1&redir=https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'].'";
    	</script>');
    die();    
} global $woocommerce;

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
<div class="container-wrap">		
	<div class="container main-content">
		<div class="row">
			<div class="col-sm-3 woo-sidebar">
				<h3 class="widgettitle"><?php echo $parent_title = get_the_title($post->post_parent); ?></h3>
				<?php echo do_shortcode("[wpb_childpages]"); ?>
		    </div>
			<div class="col-sm-9">
				<div class="page-heading sdsdsddsdddsdd">
					<h1><?php echo get_the_title(); ?></h1>
				</div>
				<?php 

				if (isset($_POST['post_id']) && isset($_POST['smarttagid']) && $_POST['product_name']!='') {

		
    
					
			        $smartTagId = $_POST['smarttagid'];
			        global $wpdb;
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
			        if ($product_id == 6089 || $product_id == 7722) {
			            $attributes = array(
			                'pa_ttype'  => $type,
			                'pa_size'   => $size,
			                'pa_style'  => $style,
			            );
			        }elseif ($product_id == 6033 || $product_id == 7659) {
			            $attributes = array(
			                'pa_shape'  => $shape,
			                'pa_size'   => $size,
			                'pa_color'  => $color,
			            );
			        }
			        // print_r($attributes);
			        $postId = $_POST['post_id'];
			        // $product = new WC_Product_Variable( $product_id );
			        // echo $variation_id."<br>variation_id:- ".iconic_find_matching_product_variation($product, $attributes);
			        	
			      //  if(isset($product_id)){ ?>




			        <div class="pp-tabs-wrap">
			            <div class="pp-tabs-nav">
			                <div class="view pp-tabs-nav-inner pp-tab-option-1 active">View</div>
			                <div class="view pp-tabs-nav-inner pp-tab-option-2">Edit</div>
			            </div>
			            <div class="pp-tabs-content pp-tab-content-1 simple-pet-info" style="display: block;">
			                <div class="acc-blue-box mb-15">
			                    <div class="acc-blue-head">
			                        Pet ID Tag Information
			                        <div class="acc-edit lines-edit">
			                            <i class="fa fa-cog"></i> EDIT
			                        </div>
			                    </div>
			                    <div class="acc-blue-content">
			                        <div class="row">
			                            <div class="col-sm-2 rmb-15">
			                                <?php echo get_the_post_thumbnail($postId); ?>
			                            </div>
			                            <div class="col-sm-5 rmb-15">
			                                <h4 class="color-light-blue">FRONT</h4>
			                                <?php if ($product_id == 6089 || $product_id == 7722) { 
			                                        echo $frontImage;
			                                    }elseif ($product_id == 6033 || $product_id == 7659) { ?>
			                                        <p class="fline1"><strong>Line 1:</strong> <span><?php echo $frontLine1; ?></span></p>
			                                        <p class="fline2"><strong>Line 2:</strong> <span><?php echo $frontLine2; ?></span></p>
			                                        <p class="fline3"><strong>Line 3:</strong> <span><?php echo $frontLine3; ?></span></p>
			                                        <p class="fline4"><strong>Line 4:</strong> <span><?php echo $frontLine4; ?></span></p>
			                                <?php } ?>
			                            </div>
			                            <div class="col-sm-5">
			                                <h4 class="color-light-blue">BACK</h4>
			                                <p class="bline1"><strong>Line 1:</strong> <span><?php if(isset($backLine1)){ echo $backLine1; } ?></span></p>
			                                <p class="bline2"><strong>Line 2:</strong> <span><?php if(isset($backLine2)){ echo $backLine2;} ?></span></p>
			                                <p class="bline3"><strong>Line 3:</strong> <span><?php if(isset($backLine3)){ echo $backLine3; } ?></span></p>
			                                <p class="bline4"><strong>Line 4:</strong> <span><?php if(isset($backLine4)){ echo $backLine4; } ?></span></p>
			                            </div>
			                        </div>
			                    </div>
			                </div>
			            </div>

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
	                   <?php echo $frontImage?>
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
					 <h3>Shipping Info:</h4> 
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
					            <input type="submit" name="submit" class="single_id_tag_add_to_cart_button" value=" Direct Checkout">
						</form>
	        	</div>
	        	<!-- end Shipping_cart -->

	           
	            </div>
	        </div>
	    </div>
	</div>
<!-- for protection plan end -->
			            <div class="pp-tabs-content pp-tab-content-3 show-update-form">
			                <div class="contact-form">
			                    <form action="" method="post" class="update-form">
			                        <input type="hidden" name="post_id" value="<?php echo $postId; ?>">      
			                        <div class="acc-blue-box">
			                            <div class="acc-blue-content">
			                                <div class="row">
			                                    <?php if ($product_id == 6089 || $product_id == 7722) {
			                                        echo '<div class="col-sm-12 mb-15">
			                                            <h4 class="color-light-blue">BACK12</h4>
			                                            <p><strong>Line 1: </strong><input type="text" name="backLine1" value="<?php echo $backLine1; ?>" class="backLine1" ></p>
			                                            <p><strong>Line 2: </strong><input type="text" name="backLine2" value="<?php echo $backLine2; ?>" class="backLine2" ></p>
			                                            <p><strong>Line 3: </strong><input type="text" name="backLine3" value="<?php echo $backLine3; ?>" class="backLine3" ></p>
			                                            <p><strong>Line 4: </strong><input type="text" name="backLine4" value="<?php echo $backLine4; ?>" class="backLine4" ></p>
			                                        </div>
			                                    </div>';
			                                    }elseif ($product_id == 6033 || $product_id == 7659) {
			                                        echo '<div class="col-sm-6 mb-15">
			                                            <h4 class="color-light-blue">FRONT</h4>
			                                            <p><strong>Line 1: </strong><input type="text" name="frontLine1" class="frontLine1" value="<?php echo $frontLine1; ?>"></p>
			                                            <p><strong>Line 2: </strong><input type="text" name="frontLine2" class="frontLine2" value="<?php echo $frontLine2; ?>"></p>
			                                            <p><strong>Line 3: </strong><input type="text" name="frontLine3" class="frontLine3" value="<?php echo $frontLine3; ?>"></p>
			                                            <p><strong>Line 4: </strong><input type="text" name="frontLine4" class="frontLine4" value="<?php echo $frontLine4; ?>"></p>
			                                        </div>
			                                        <div class="col-sm-6 mb-15">
			                                            <h4 class="color-light-blue">BACK12</h4>
			                                            <p><strong>Line 1: </strong><input type="text" name="backLine1" value="<?php echo $backLine1; ?>" class="backLine1" ></p>
			                                            <p><strong>Line 2: </strong><input type="text" name="backLine2" value="<?php echo $backLine2; ?>" class="backLine2" ></p>
			                                            <p><strong>Line 3: </strong><input type="text" name="backLine3" value="<?php echo $backLine3; ?>" class="backLine3" ></p>
			                                            <p><strong>Line 4: </strong><input type="text" name="backLine4" value="<?php echo $backLine4; ?>" class="backLine4" ></p>
			                                        </div>
			                                    </div>';
			                                    }?>
			                                <div class="text-center">
			                                    <button type="button" class="site-btn-light-blue lines-show replacement-tag-save ">Save</button>
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
										    'post_status' => $order_statuses,
										    'numberposts' => -1
										) );
										
										foreach($customer_orders as $order ){
											foreach($order->get_items() as $item_id => $item){
												if( method_exists( $item, 'get_data' ) ) {
										            $item_data = $item->get_data();
										            $order_id = $item_data['order_id'];
													$result = $wpdb->get_results('select t1.*, t2.* FROM 
										       									 wp_woocommerce_order_items as t1 JOIN wp_woocommerce_order_itemmeta as t2 ON t1.order_item_id = t2.order_item_id
										       								 where t1.order_id='.$order_id);

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
		                                    /*echo '<img src="'.get_site_url().'/wp-content/themes/salient-child/images/black_bone_shape_2_2.png" data-name="color-bone">';*/
		                                    echo $backImage; 
		                                }elseif ($type == "circle") {
		                                   /* echo '<img src="'.get_site_url().'/wp-content/themes/salient-child/images/bluetag2.jpg" data-name="color-circle">';*/
		                                   echo $backImage; 
		                                }elseif ($type == "heart") {
		                                   /* echo '<img src="'.get_site_url().'/wp-content/themes/salient-child/images/heart_pink_shape_2.png" data-name="color-heart">';*/
		                                   echo $backImage; 
		                                }
		                            }elseif ($product_id == 6033 || $product_id == 7659) {
		                                if ($shape == "bone") {
		                                   /* echo '<img src="'.get_site_url().'/wp-content/themes/salient-child/images/bone_back.jpg" data-name="back-img">';*/
		                                   echo $backImage; 
		                                }elseif ($shape == "circle") {
		                                   /* echo '<img src="'.get_site_url().'/wp-content/themes/salient-child/images/circle_back.png" data-name="back-img">';*/
		                                   echo $backImage; 
		                                }elseif ($shape == "heart") {
		                                   /* echo '<img src="'.get_site_url().'/wp-content/themes/salient-child/images/brass_heart.jpg" data-name="back-img">';*/
		                                   echo $backImage; 
		                                }
			                        }

			                        if ($myArray!='') { 
			                        	if(in_array('platinum',$myArray ) || in_array('gold',$myArray )){ ?>
                    			    	 		<a href="javascript:;" class="color-light-blue with_pa_protection  ">Order Replacement Tag<i class="fa fa-caret-right"></i></a>
							<?php   	}else{  ?>
                        			    		<a href="javascript:;" class="color-light-blue replace-btn">Order Replacement Tag <i class="fa fa-caret-right"></i></a>
                			   			<?php }  

			                        }else{  ?>
		                        		<a href="javascript:;" class="color-light-blue replace-btn">Order Replacement Tag <i class="fa fa-caret-right"></i></a>
		                        	<?php }  ?>

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
			                        	<img src="<?php echo site_url()?>/wp-content/uploads/2018/01/Brass-tags-1.png">
			                        </p>
			                        
			                      <a href="<?php echo site_url()?>/product/aluminum-id-tag/" class="color-light-blue">Create a New Tag <i class="fa fa-caret-right"></i></a> 
			                    </div>              
			                </div>
			            </div>
			        </div>
			        <form style="display: none;" action="" method="post" id="replace-form">
			            <input type="hidden" name="product_id" value="<?php echo $product_id; ?>" id="product-id">
			            <input type="hidden" name="variation_id" value="<?php echo $variation_id; ?>" id="variation_id">
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
						<?php if ($product_id == 6089 || $product_id == 7722) { ?>
			                <input type="hidden" name="type" value="<?php echo $type; ?>">
			                <input type="hidden" name="style" value="<?php echo $style; ?>">
			            <?php } elseif ($product_id == 6033 || $product_id == 7659) { ?>
			                <input type="hidden" name="color" value="<?php echo $color; ?>">
			                <input type="hidden" name="type" value="<?php echo $shape; ?>">
			            <?php } ?>
			            <input type="hidden" name="size" value="<?php echo $size; ?>">
			        </form> -->
					<script type="text/javascript">
			            jQuery(document).ready(function($){
							$('.with_pa_protection').click(function(){
		            			$('.with_pa_protection1').toggle();
			            		$('.simple-pet-info').toggle();
			            	});
							$(".lines-edit").click(function(){
			                	$(".pp-tab-option-2").click();

			                });
			                $(".pp-tab-option-1").click(function(){
			                 	$('.show-update-form').toggle();

			                });
			                $(".lines-show").click(function(){
			                    $("p.fline1 span").text($('input.frontLine1').val());
			                    $("p.fline2 span").text($('input.frontLine2').val());
			                    $("p.fline3 span").text($('input.frontLine3').val());
			                    $("p.fline4 span").text($('input.frontLine4').val());

			                    $("p.bline1 span").text($('input.backLine1').val());
			                    $("p.bline2 span").text($('input.backLine2').val());
			                    $("p.bline3 span").text($('input.backLine3').val());
			                    $("p.bline4 span").text($('input.backLine4').val());
			                    $(".pp-tab-option-1").click();
			                });
			                $(".pp-tab-option-2").click(function(){
			                	$('.show-update-form').toggle();
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
			                       /* $('form#replace-form').attr('action','/product/aluminum-id-tag-2/');*/
			                       /*custom jquery code end--added by developer( hide and add correct page)*/
			                        $('form#replace-form').attr('action','/product/aluminum-id-tag/');
			                        $('form#replace-form').submit();
			                    }else if (productId == '6033' || productId == '7659') {
			                        $('form#replace-form').attr('action','/product/brass-id-tag-2/');
			                        $('form#replace-form').submit();
			                    }
			                });
			            });
			        </script>					
				<?php 

			}else if(isset($_POST['post_id']) && isset($_POST['smarttagid']) && $_POST['product_name'] =='') {

				echo "Sorry No Idtag to Replacement";

			}else{
					$user_id = get_current_user_id();
				    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				    $args=array(
				        'post_type' => 'pet_profile',
				        'paged' => $paged,
				        'author' => $user_id
				    );
				    $wp_query = new WP_Query($args);
				    $i = 0;
				    if ($wp_query->have_posts()) {

				        while ( $wp_query->have_posts() ) : $wp_query->the_post(); 
				          $mypod = pods( 'pet_profile', get_the_id() ); 
					      $smarttag_id_number = $mypod->display('smarttag_id_number');
					      $microchip_id_number = $mypod->display('microchip_id_number');
					      $subscriptionId  = $mypod->display("smarttag_subscription_id");


				            if (!empty(trim($subscriptionId))) {
						        $itemNumber     = explode("-", $subscriptionId);
						        $itemKey        = $itemNumber[0];

						          /*custom jquery code start--added by satish*/

						 $subscriptionId = (new WC_Order_Item_Data_Store)->get_order_id_by_order_item_id($itemNumber[0]);
							/*custom jquery code start--added by satish*/

						        $subscription   = wc_get_order($subscriptionId);
						        $product_name   = "";
						        $subscription   = wcs_get_subscription($subscriptionId);
						        $date           = $subscription->get_date("end");
						        $date           = date_parse_from_format('Y-m-d H:i:s',$date);
						        $time           = mktime(0, 0, 0, $date['month'], $date['day'], $date['year']);
						        $date           = date("m/d/Y", $time);
						        foreach( $subscription->get_items() as $item_id => $product_subscription ){
						          $product_name = $product_subscription['name']." (Expires: ".$date.")";
						          $variationId  = $product_subscription['variation_id'];
						        }
						      }else{
				                $product_name = '';
				            }
				            
				            ?>
				            <div class="bottom-border-box">
				                <h3><?= get_the_title(); ?></h3>
				                <div class="row">
				                    <div class="col-sm-3 rmb-15">
				                        <?php echo get_the_post_thumbnail(); ?>
				                    </div>
				                    <div class="col-sm-5 rmb-15">
				                        <strong>Pet Name:</strong> <span class="name"><?php echo get_the_title(); ?></span>
				                        <br>
				                        <strong>Pet Type:</strong> <span><?php echo $mypod->display('pet_type'); ?></span>
				                        <br>
				                        <strong>IDTag Serial Number:</strong> <span class="name"><?php echo $mypod->display('smarttag_id_number'); ?></span>
				                         <strong>IDTag Serial Number:</strong> <span class="name"><?php echo $mypod->display('microchip_id_number'); ?></span>
				                        <br>
				                        <strong>ID Tag Plan:</strong> <span><?php echo $product_name; ?></span>
				                    </div>
				                    <div class="col-sm-4 mb-elements">                        
				                        <form action="" method="post" class="custom-form">
				                            <input type="hidden" name="post_id" value="<?php echo get_the_ID(); ?>">
				                            <input type="hidden" name="smarttagid" value="<?php echo $smarttag_id_number; ?>"
				                            >
				                             <input type="hidden" name="product_name" value="<?php echo $product_name; ?>"
				                            >
				                            <p><button type="submit" class="replacement-tag button view site-btn-light-blue"><strong>Order a free Replacement Tag</strong> <i class="fa fa-caret-right"></i></button></p>
				                        </form>
				                    </div>
				                </div>
				            </div>
				        <?php 
				        endwhile;


				        $total_pages = $wp_query->max_num_pages;
				        if ($total_pages > 1){

				            $current_page = max(1, get_query_var('paged'));

				            echo "<div id='pagination'>".paginate_links(array(
				                'base' => get_pagenum_link(1) . '%_%',
				                'format' => 'page/%#%',
				                'current' => $current_page,
				                'total' => $total_pages,
				                'prev_text'    => __('prev'),
				                'next_text'    => __('next'),
				            ))."</div>";
				        }?>
				        <?php
				    } else{
				        echo "Sorry, No pet found";
				    }
				}
			//}else{
			//	 echo "Sorry, No Id Tag found for replacement";
			//}	

				?>
			</div>
		</div>
	</div>
</div>
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

	<?php  session_start();
 			$_SESSION["product_id"] = $product_id; // 86400 = 1 day
 			$_SESSION["idtag_action"] = 'replacement_id_tag'; // 86400 = 1 day?>
			if (product_id == 6089 || product_id == 7722) { 
	     		data1 = {
	         		    'attribute_pa_ttype': 'bone',
	         		    'attribute_pa_size': size,
	         		    'attribute_pa_style': style,
	         		     'product_id': product_id,
	         		    'variation_id': variation_id,
	         		   	'action': 'woocommerce_ajax_add_to_cart_replacement',
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
	           			    'action': 'woocommerce_ajax_add_to_cart_replacement',
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
		        		$.ajax({
		      		        type: 'POST',
		      		        url: ajaxurl,
		      		        data: data1,
		      		        beforeSend:function(){
 								$(".loader-wrap").fadeIn();
							},
			      		    success: function(response) {
	      		        		$(".loader-wrap").fadeOut();
      		    		 		window.location.href = window.location.origin+'/cart';
		      		        }
		      		    });
		});
	});

</script>


<?php get_footer(); ?>

	