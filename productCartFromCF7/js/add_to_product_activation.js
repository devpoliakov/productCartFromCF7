    $('body').on('click', '.adding_to_cart', function(){
    
                vallo_adding_to_cart.call(this);
                ///////////////
                var cart = $('.product-container');
        var imgtodrag = $('.img_for_products_of_detail');
        if (imgtodrag) {
            var imgclone = imgtodrag.clone()
                .offset({
                top: imgtodrag.offset().top,
                left: imgtodrag.offset().left
            })
                .css({
                'opacity': '0.5',
                    'position': 'absolute',
                    'height': '150px',
                    'width': '150px',
                    'z-index': '100'
            })
                .appendTo($('body'))
                .animate({
                'top': cart.offset().top + 10,
                    'left': cart.offset().left + 10,
                    'width': 75,
                    'height': 75
            }, 1000);
            


            imgclone.animate({
                'width': 0,
                    'height': 0
            }, function () {
                $(this).detach()
            });
        }
    

                ////////////
            });
            $('body').on('click', '.dashicons.dashicons-plus', function(){
                vallo_adding_to_cart.call(this);
            });
            $('body').on('click', '.dashicons.dashicons-minus', function(){
                vallo_adding_to_cart.call(this, 'minus');
            });