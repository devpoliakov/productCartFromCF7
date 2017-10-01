<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */
 
 /**
 *  Add different parts for sidebar
 * 
 */
 
 add_action( 'topsidebar_77', 'post_order_print' , 11);
#add_action( 'topsidebar_77', 'good_connection' , 10);

#add_action( 'topsidebar_77', 'good_connection', 9);

add_action( 'topsidebar_77', 'form_displayer');

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
get_header( 'shop' ); 
?>


			
	<?php
		/**
		 * woocommerce_before_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		do_action( 'woocommerce_before_main_content' );
	?>
    
<div class="row">
<hr />
<article class="col-lg-9 col-md-8 col-sm-12 col-xs-12 contentainer_for_products_of_detail">
<!-- full publication -->
		<?php while ( have_posts() ) : the_post(); 
		$catData = current_category_data($post->ID);
		$catLink = get_category_link($catData->term_id);
		$catName = $catData->name;

		$image = wp_get_attachment_image_src( get_post_thumbnail_id( $loop->post->ID ), 'single-post-thumbnail' );
		 ?>		
		<p class="category-name"><?=$catName?></p>
		<div class="col-md-6 col-sm-12 nopaddingLeft">
         	

        	<img  src="<?php  echo $image[0]; ?>" height="90" class="img_for_products_of_detail" 
        	data-id="<?php echo $loop->post->ID; ?>">
			<div id="imgModal" class="modal">
			  <span class="close" onclick="document.getElementById('imgModal').style.display='none'">&times;</span>
			  <img class="modal-content" id="img01">
			  <div id="caption"></div>
			</div>

        	<p><?=woocommerce_template_single_title()?></p>
        	<style type="text/css">
        	.adding_to_cart{
        		cursor: pointer;
        		color: #000;
        		padding: 5px;
        		border: 1px solid #f58612;
        		border-radius: 5px;
        	}
        	.adding_to_cart:hover{
        		text-decoration: none;
        	}
        	.cont_for_products_of_busket{
    		    /* width: 47%; */
    		    position: relative;
    		    width: 100%;
			    height: 40px;
			    overflow: hidden;
			    border-radius: 10px;
			    border: 1px solid #ccc;
			    display: inline-block;
			    vertical-align: middle;
        	}
        	
        	.cont_for_products_of_busket .dashicons{
    		    border: 1px solid #ccc;
			    border-radius: 5px ;
			    font-size: 14px;
			    cursor: pointer;
		        padding: 3px 0px;
    			margin: 0px;
    			width: 35px;
    			position: absolute;
        	}

        	.cont_for_products_of_busket .dashicons-plus {
        		top: 0px;
    			right: 0px;
    			border-top-right-radius: 10px;
    			border-bottom-right-radius: 0px;

        	}
        	.cont_for_products_of_busket .dashicons-minus {
        		bottom: 0px;
    			right: 0px;
    			border-bottom-right-radius: 10px;
    			border-top-right-radius: 0px;
        	}
        	
        	.cont_for_products_of_busket .number_of_product{
        		font-size: 18px;
				vertical-align: middle;
				width: 80px;
    			border: none;
        	}
        	
        	/*
        	.cont_for_products_of_busket:nth-child(odd){
        		margin-right: 3%;
        	}
        	.cont_for_products_of_busket:nth-child(even){
        		margin-left: 3%;
        	}
        	*/
        	.number_to_cart{
        		border: 1px solid #ccc;
        		border-radius: 5px;
        		width: 80px;
        		padding: 5px;
    			display: inline-block;
        	}
        	
        	.img_for_products_of_busket{
    		    height: 40px;
			    width: auto;
			    border: none;
        	}
        	</style>
<div class="add_to_cart_container">
<input type="number" class="number_to_cart" step="500" value="500" min="500" />
<a data-serv-id="<?php echo $post->ID; ?>" class="adding_to_cart">Add to request</a>
</div>


<script type="text/javascript">
// display existing product in cart
$(document).ready(function(){
    var vallo_ready_cartus = <?php echo json_encode($_COOKIE['vallo_cf7_cartus_3']); ?>;
    
    $.each( vallo_ready_cartus, function( key, value ) {
                    var value = value.split(',');
                    if(value[0] > 0){

                        
                    var product_cart_itemus = '<div class="cont_for_products_of_busket '+ key +' " data-prod-id="'+ key +'">';
                    var product_cart_itemus = product_cart_itemus + '<img  src="'+value[1]+'" height="30" class="img_for_products_of_busket" title="<?php echo $product->post->post_title; ?>" data-id="<?php echo $loop->post->ID; ?>">';
                    
                    
                    var product_cart_itemus = product_cart_itemus + '<input type="number" readonly class="number_of_product" value="' + value[0] + '" />';    
                    var product_cart_itemus = product_cart_itemus + '<input type="hidden" class="number_to_cart" value="500" />';  
                    var product_cart_itemus = product_cart_itemus + '<span class="dashicons dashicons-plus" data-serv-id="'+ key +'"></span>';
                    var product_cart_itemus = product_cart_itemus + '<span class="dashicons dashicons-minus" data-serv-id="'+ key +'"></span>';
                    //var product_cart_itemus = product_cart_itemus + '<span class="service-closer dashicons dashicons-no"></span>';
    
                    var product_cart_itemus = product_cart_itemus + '</div>';
                    
    
                    $('.product-container').prepend(product_cart_itemus);
                
                }else{
                    document.cookie = 'vallo_cf7_cartus_3['+key+']=' + value + "; expires = Thu, 18 Dec 2013 12:00:00 UTC; path=/" ;
                }

            });
});
</script>
<?php 

?>
        	

            <script type="text/javascript">
            

            // add to cart function
        	function vallo_adding_to_cart(plus_orminus){


        		var dataservid = $(this).attr('data-serv-id');                
                var number_of_product_input = $(this).parent().find('.number_to_cart');
        		var number_of_product = number_of_product_input.val();

                
                
                var vallo_cartus = [number_of_product,
                                    '<?php  echo $image[0]; ?>'
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
                    var product_cart_itemus = product_cart_itemus + '<img  src="<?php  echo $image[0]; ?>" height="30" class="img_for_products_of_busket" title="<?php echo $product->post->post_title; ?>" data-id="<?php echo $loop->post->ID; ?>">';
                    
                    
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
                                    '<?php  echo $image[0]; ?>'
                                    ];

                document.cookie = 'vallo_cf7_cartus_3['+dataservid+']=' + vallo_cartus + "; path=/" ;
            }

        	}
            // end of function

            $(".adding_to_cart").click(function(){
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
        	



            
        	</script>


        </div>
        <div class="col-md-6 col-sm-12">
        	<div class="product_content">
	        	<?php echo the_content(); ?>
	        </div>
	        <div class="col-sm-12 print-category-icon-container nopadding">	        	
	        	<a href="<?=$catLink?>" class="cat_icon"></a>
	        	<a href="javascript:window.print()" class="dashicons dashicons-share-alt2"></a>
			</div>
	        <div class="col-sm-12 next-previous-container nopadding">
	        	<?php previous_post_link_product('%link', '< Previous item', true); ?>
				<?php next_post_link_product('%link', 'Next item >', true); ?>
			</div>
		</div>
		
		

		<?php 

		

		endwhile; // end of the loop. ?>
</article> <?php get_sidebar( 'top_icons' ); ?>
               
	<?php
		/**
		 * woocommerce_after_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
	?>
      

	<?php
		/**
		 * woocommerce_sidebar hook.
		 *
		 * @hooked woocommerce_get_sidebar - 10
		 */
		#do_action( 'woocommerce_sidebar' );
	?>

<?php get_footer( 'shop' ); ?>

</div>
<script type="text/javascript" src="/wp-content/themes/Vallo/js/lightbox.js"></script>
