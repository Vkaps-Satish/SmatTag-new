jQuery(document).ready(function($){


	if($("#pa_size").val() == "small"){

		$('.select-option,.swatch-wrapper').each(function(i, e){
		      	var value = jQuery('#picker_pa_ttype div.select-option.selected a').attr('title');
						console.log("index", i);
		      	    	console.log("event", e);
		      	     	//  4 5 6 7,9,10,11,12,13,14
					if(value == 'Bone'){
						if(i ==4 || i ==5 || i ==6 ||  i==7 ||  i==8  ||  i==10  ||  i==11 || i==14){
				 		 	$(this).hide();
}

						}else if(value == 'Circle'){
							console.log(i);
								console.log(e);
						if(i ==3){
						$(this).hide();
					}	
						}
						
				
		});

		//$(".style-pro .design-box .woo-complex-custom-prod-img img").css("width", "75%");
		$(".style-pro .design-box .woo-complex-custom-prod-img img").css("width", "100%");
	}else{
		$(".style-pro .design-box .woo-complex-custom-prod-img img").css("width", "100%");
	}

	$("body").on("change", "#picker_pa_size ul input[type=radio]", function(){
		
		if($(this).val() == "small"){
			//$(".style-pro .design-box .woo-complex-custom-prod-img img").css("width", "75%");

 

			$(".style-pro .design-box .woo-complex-custom-prod-img img").css("width", "100%");
					$(".engraving_4").hide();
					$(".engraving_8").hide();
		
				$('.select-option,.swatch-wrapper').each(function(i, e){
				      	var value = jQuery('#picker_pa_ttype div.select-option.selected a').attr('title');
				     	//console.log(value,'small');
				      	//console.log(i,e);

						if(value == 'Bone'){
								console.log(i);
								console.log(e);
							
							if(i ==4 || i ==5 || i ==6 ||  i==7 ||  i==8  ||  i==10  ||  i==11 || i==14){
				 		 		$(this).hide();

							}

						}else if(value == 'Circle'){
							console.log(i);
								console.log(e);
							
								if(i ==3){
						$(this).hide();
					}	
						}
						
				});
		}else{
			
			$(".style-pro .design-box .woo-complex-custom-prod-img img").css("width", "100%");
					$(".engraving_4").show();
					$(".engraving_8").show();
	
				$('.select-option,.swatch-wrapper').each(function(i, e){
					var value = jQuery('#picker_pa_ttype div.select-option.selected a').attr('title');

					var data_value = $('select-option,.swatch-wrapper').attr('data-value');


						if(value == 'Bone'){
							
							if(i ==6  || i ==9 ||  i==10 || i==4 ||  i==6 || i==13 || i==14){
							
				 		 		$(this).show();
				 		 		console.log('bone-1');
							}
						}else if(value == 'Circle'){
							
							if(  i == 18  || i==3 ){

								$(this).show();
								console.log('Circle-1sd');	
							}
						}	

						
						

				});
		}
	});

	$("tr.cart_item").each(function(){
		console.log($(this).find("dl.variation dd.variation-SelectSize").text().toLowerCase());
		if($.trim($(this).find("dl.variation dd.variation-SelectSize").text().toLowerCase()) == 'small'){
			console.log("small");
			$(this).find("td.product-thumbnail img").attr('style', 'width: 75% !important');
		}else{
			$(this).find("td.product-thumbnail img").attr('style', 'width: 100% !important');
		}
	})
})









