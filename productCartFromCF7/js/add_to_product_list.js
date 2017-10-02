           // add to cart function
            function vallo_adding_to_cart(plus_orminus){


                var dataservid = $(this).attr('data-serv-id');                
                var number_of_product_input = $(this).parent().find('.number_to_cart');
                var number_of_product = number_of_product_input.val();

                
                
                var vallo_cartus = [number_of_product,
                                    produc_CF7_image
                                    ];
                
                document.cookie = 'vallo_cf7_cartus_3['+dataservid+']=' + vallo_cartus + "; path=/" ;
                

                ishere = 0;
                $('.product-container .cont_for_products_of_busket').each(function(){
                    if ($(this).hasClass(dataservid)) {
                        ishere = 1;
                    }

                });

                
                // detecting exist product
            if(ishere !== 1){
                    var product_cart_itemus = '<div class="cont_for_products_of_busket '+ dataservid +' " data-prod-id="'+ dataservid +'">';
                    var product_cart_itemus = product_cart_itemus + '<img  src="'+produc_CF7_image+'" height="30" class="img_for_products_of_busket" data-id="'+ dataservid +'">';
                    
                    
                    var product_cart_itemus = product_cart_itemus + '<input type="number" readonly class="number_of_product" value="' + number_of_product + '" />';    
                    var product_cart_itemus = product_cart_itemus + '<input type="hidden" class="number_to_cart" value="500" />';  
                    var product_cart_itemus = product_cart_itemus + '<span class="dashicons dashicons-plus" data-serv-id="'+ dataservid +'"></span>';
                    var product_cart_itemus = product_cart_itemus + '<span class="dashicons dashicons-minus" data-serv-id="'+ dataservid +'"></span>';
                    //var product_cart_itemus = product_cart_itemus + '<span class="service-closer dashicons dashicons-no"></span>';
    
                    var product_cart_itemus = product_cart_itemus + '</div>';
                    
    
                    $('.product-container').prepend(product_cart_itemus);
    
            } else if(ishere == 1){
                //
                if (plus_orminus == 'minus'){
                var number_of_product = parseInt($('.cont_for_products_of_busket.' + dataservid +' .number_of_product').val()) - parseInt(number_of_product);
                } else {
                var number_of_product = parseInt($('.cont_for_products_of_busket.' + dataservid +' .number_of_product').val()) + parseInt(number_of_product);
                }
                // delete if < 0 
                if (number_of_product < 1 ){
                    $('.cont_for_products_of_busket.'+dataservid ).remove();

                }else{
                $('.cont_for_products_of_busket.' + dataservid +' .number_of_product').val(number_of_product);
                }
                var vallo_cartus = [number_of_product,
                                    produc_CF7_image
                                    ];

                document.cookie = 'vallo_cf7_cartus_3['+dataservid+']=' + vallo_cartus + "; path=/" ;
            }

            }
// end of function