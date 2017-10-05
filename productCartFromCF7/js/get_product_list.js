// display existing product in cart
    $.each( vallo_ready_cartus, function( key, value ) {
                    var value = value.split(',');
                    if(value[0] > 0 && key > 0){

                        
                    var product_cart_itemus = '<div class="cont_for_products_of_busket '+ key +' " data-prod-id="'+ key +'">';
                    var product_cart_itemus = product_cart_itemus + '<img  src="'+value[1]+'" title="'+value[2]+'" height="30" class="img_for_products_of_busket" data-id="'+ key +'">';
                    
                    
                    var product_cart_itemus = product_cart_itemus + '<input type="number" name="number_'+ key +'" readonly class="number_of_product" value="' + value[0] + '" />';    
                    var product_cart_itemus = product_cart_itemus + '<input type="hidden" class="number_to_cart" value="500" />';  
                    var product_cart_itemus = product_cart_itemus + '<span class="dashicons dashicons-plus" data-serv-id="'+ key +'"></span>';
                    var product_cart_itemus = product_cart_itemus + '<span class="dashicons dashicons-minus" data-serv-id="'+ key +'"></span>';
                    //var product_cart_itemus = product_cart_itemus + '<span class="service-closer dashicons dashicons-no"></span>';
                    var product_cart_itemus = product_cart_itemus + '</div>';
                    
                    //simple send data to email
                    var product_cart_itemus_for_send = '<input type="checkbox" checked id="check_prod_'+ key +'" name="cart-product['+ key +']" value="'+ value[2] +': ' + value[0] + '">';
                    $('.cart-product .hiddenus').prepend(product_cart_itemus_for_send);
    
                    $('.product-container').prepend(product_cart_itemus);
                
                }else{
                    document.cookie = 'vallo_cf7_cartus_3['+key+']=' + value + "; expires = Thu, 18 Dec 2013 12:00:00 UTC; path=/" ;
                }

            });