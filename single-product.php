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
        	
<?php
do_action('add_CF7_basket_buttom');
?>





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
