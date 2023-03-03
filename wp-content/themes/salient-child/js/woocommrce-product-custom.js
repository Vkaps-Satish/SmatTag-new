jQuery(document).ready(function($){

	/*if($("#pa_size").val() == "small"){
		$('.select-option,.swatch-wrapper').each(function(i, e){
		    var value = jQuery('#picker_pa_ttype div.select-option.selected a').attr('title');
				if(value == 'Bone'){
				$('.front_img').attr('src', 'https://staging.idtag.com/wp-content/uploads/2022/04/bone_bone_pink-100x57.jpg')


					var bone_variation  = $(this).attr('data-value');
					    if(bone_variation == 'bone-10' || bone_variation == 'bone-9' || bone_variation == 'bone-2' || bone_variation == 'bone-3'  || bone_variation == 'bone-4'  || bone_variation == 'bone-5'  || bone_variation == 'bone-6' ) {
					    	$(this).hide();
					    	if(bone_variation == 'bone-8'){
					    		$(this).addClass('selected');
					    	}


					    }

				}else if(value == 'Circle'){
					
					var circle_variation  = $(this).attr('data-value');
					 	 if(circle_variation == 'circle-5' || circle_variation == 'circle-4' || circle_variation == 'circle-2'  || circle_variation == 'circle-1'  || circle_variation == 'circle-8' || circle_variation == 'black-front-tag') {
							$(this).hide();
						}
				}else if(value == 'Heart'){
						var heart_variation  = $(this).attr('data-value');
						  if( heart_variation == 'kissme' || heart_variation == 'pinkheart' || heart_variation == 'blueheart'){
							$(this).hide();
						}
						if(heart_variation == 'heart-1'){
							$(this).show();
						}
				}
					
		});

/*Alunimum Bone*/

		/*$('.select-option,.swatch-wrapper').each(function(i, e){
		    var value = jQuery('#picker_pa_shape div.select-option.selected a').attr('title');
				if(value == 'Bone'){
					var aluBone_variation  = $(this).attr('data-value');
					  	if(aluBone_variation == 'golden-bone' || aluBone_variation == 'black-bone' || aluBone_variation == 'blue-bone' || aluBone_variation== 'pink-bone' || aluBone_variation== 'red-bone'){
							$(this).show();
						}
				}else if(value == 'Circle'){
					var circle_variation  = $(this).attr('data-value');
						if( circle_variation == 'fronttag-circle'){
           					$(this).hide();
      					}
				}

		});




		$(".style-pro .design-box .woo-complex-custom-prod-img img").css("width", "100%");
	}else{
		$(".style-pro .design-box .woo-complex-custom-prod-img img").css("width", "100%");
	}

	
	$("body").on("change", "#picker_pa_size ul input[type=radio]", function(){
		if($(this).val() == "small"){
			$(".style-pro .design-box .woo-complex-custom-prod-img img").css("width", "100%");
				$(".engraving_4").hide();
				$(".engraving_8").hide();
			$('.select-option,.swatch-wrapper').each(function(i, e){

				var value = jQuery('#picker_pa_ttype div.select-option.selected a').attr('title');
					if(value == 'Bone'){
						var bone_variation  = $(this).attr('data-value');
							if(bone_variation == 'bone-10' || bone_variation == 'bone-9' || bone_variation == 'bone-2' || bone_variation == 'bone-3'  || bone_variation == 'bone-4'  || bone_variation == 'bone-5'  || bone_variation == 'bone-6' ) {
							    	$(this).hide();
							  }
					}else if(value == 'Circle'){
						var circle_variation  = $(this).attr('data-value');
							if(circle_variation == 'circle-5' || circle_variation == 'circle-4' || circle_variation == 'circle-2'  || circle_variation == 'circle-1'  || circle_variation == 'circle-8' || circle_variation == 'black-front-tag') {
								$(this).hide();
							}
					}else if(value == 'Heart'){
						var heart_variation  = $(this).attr('data-value');
						  if( heart_variation == 'kissme' ||  heart_variation == 'pinkheart' || heart_variation == 'blueheart'){
								$(this).hide();
							}
							if(heart_variation == 'heart-1'){
								$(this).show();
							}
						}
						
			});
			/*For aluminium*/
			/*$('.select-option,.swatch-wrapper').each(function(i, e){
			 var value = jQuery('#picker_pa_shape div.select-option.selected a').attr('title');
				if(value == 'Bone'){
					var aluBone_variation  = $(this).attr('data-value');
					  if(aluBone_variation == 'golden-bone' || aluBone_variation == 'black-bone' || aluBone_variation == 'blue-bone' || aluBone_variation== 'pink-bone' || aluBone_variation== 'red-bone'){
						$(this).show();

					}

				}else if(value == 'Circle'){
					var circle_variation  = $(this).attr('data-value');


     				 if( circle_variation == 'fronttag-circle'){
           				 $(this).hide();
          
     				 }
				}
			});	




		}else{*/
				/*$(".style-pro .design-box .woo-complex-custom-prod-img img").css("width", "100%");
					$(".engraving_4").show();
					$(".engraving_8").show();
	
				$('.select-option,.swatch-wrapper').each(function(i, e){
					var value = jQuery('#picker_pa_ttype div.select-option.selected a').attr('title');
					var data_value = $('select-option,.swatch-wrapper').attr('data-value');
						
						if(value == 'Bone'){
							var bone_variation  = $(this).attr('data-value');
						 		if(bone_variation == 'bone-10' || bone_variation == 'bone-9' || bone_variation == 'bone-2' || bone_variation == 'bone-3'  || bone_variation == 'bone-4'  || bone_variation == 'bone-5'  || bone_variation == 'bone-6' ) {
					    			$(this).show();
					    		}
						}else if(value == 'Circle'){
							var circle_variation  = $(this).attr('data-value');
								if(circle_variation == 'circle-5' || circle_variation == 'circle-4' || circle_variation == 'circle-2'  || circle_variation == 'circle-1'   || circle_variation == 'black-front-tag') {
									$(this).show();
								}
						}else if(value == 'Heart'){


								var heart_variation  = $(this).attr('data-value');
								  console.log('heart', circle_variation , 'large');
								  if( heart_variation == 'heart-2' ||  heart_variation == 'kissme' || heart_variation == 'pinkheart' || heart_variation == 'blueheart'){
									$(this).show();
								}
								if(heart_variation == 'heart-1'){
									$(this).hide();
								}

							
								
						}
				});*/
		/*For Aluminium*/

				/*$('.select-option,.swatch-wrapper').each(function(i, e){
				    var value = jQuery('#picker_pa_shape div.select-option.selected a').attr('title');
						if(value == 'Bone'){
							var aluBone_variation  = $(this).attr('data-value');
							  if(aluBone_variation == 'golden-bone' || aluBone_variation== 'red-bone'){
								$(this).hide();

							}
									
/*
								if( i == 8|| i == 4 ){

						 		 	$(this).hide();
								}
*/
					/*	}else if(value == 'Circle'){
							var circle_variation  = $(this).attr('data-value');
							      if( circle_variation == 'fronttag-circle' ||  circle_variation == 'blue-circle' ||  circle_variation == 'black-circle' ||  circle_variation == 'pink-circle'){
							            $(this).show();
							          
							      }			
						}
				});	




			}*/
	//});*/*/

	$("tr.cart_item").each(function(){
		console.log($(this).find("dl.variation dd.variation-SelectSize").text().toLowerCase());
		if($.trim($(this).find("dl.variation dd.variation-SelectSize").text().toLowerCase()) == 'small'){
			console.log("small");
			$(this).find("td.product-thumbnail img").attr('style', 'width: 75% !important');
		}else{
			$(this).find("td.product-thumbnail img").attr('style', 'width: 100% !important');
		}
	})
});



/* Brass Tag*/
$("body").on("click","#picker_pa_ttype .select-option",function(){
	var picker_pa_size = $("#picker_pa_size input[type='radio']:checked").val();
	update_options(picker_pa_size);	
});

/*Aluminium Tag*/
$("body").on("click","#picker_pa_shape .select-option",function(){
	var picker_pa_size = $("#picker_pa_size input[type='radio']:checked").val();
	update_options(picker_pa_size);	
});

$("body").on("change","#picker_pa_size ul input[type=radio]", function(){
	var picker_pa_size = $(this).val();	
	$('.woo-complex-prod-variants').find('.size').text(picker_pa_size);
	update_options(picker_pa_size);	
})

function update_options( picker_pa_size ){
	var product_id = $('.variations_form').attr('data-product_id');
	var size = picker_pa_size;
	
 	if(product_id == "6089"){
 		var type =  $('#picker_pa_ttype').find('.selected').attr('data-value');
    	$('.woo-complex-prod-variants').find('.type').text(type);

    }
    if(product_id == "6033"){
    	var type =  $('#picker_pa_shape').find('.selected').attr('data-value');
    	$('.woo-complex-prod-variants').find('.type').text(type);
    }

	var data = { 	
		product_id : product_id, 
		type :  type, 
		size :  size, 
		action : 'get_product_variation_through_size',}
		$(".loader-wrap").fadeIn();
	
	$.ajax({
		type: 'POST',
  		url: ajaxurl,
  		data: data,
  		dataType: "json",
      	success: function(response) {
      		jQuery("#picker_pa_color").find((".swatch-wrapper")).hide(); 
      		jQuery("#picker_pa_style").find((".swatch-wrapper")).hide(); 
      			$(".loader-wrap").fadeOut();
      		console.log(typeof response);
      		var data = response.data;
      		console.log("Data", typeof data);
      		jQuery(data).each(function(index,attr){
				jQuery("#picker_pa_color").find(("[data-value="+attr.attribute_pa_color+"]")).show();
      			jQuery("#picker_pa_style").find(("[data-value="+attr.attribute_pa_style+"]")).show();
      		})
      	}
	});
}


