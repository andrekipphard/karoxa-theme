<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<li <?php wc_product_class( '', $product ); ?>>
    <?php               
        $product_title = $product->get_title();
        $product_permalink = $product->get_permalink();
        $product_price = $product->get_price_html();
        $product_id = $product->get_id();
        $product_cats = get_categories($product_id);
        $product_subcats = get_product_subcategories($product_id);
    ?>
    <div class="col-12 col-lg-12 carousel-col rounded p-4">
        <a href="<?=$product_permalink?>"><img class="img-fluid mb-2" src="<?php echo wp_get_attachment_url( $product->get_image_id(), 'large' ); ?>" /></a>
        <?php 
            if ( ! $product->is_in_stock() ) {
                echo '<div class="outofstock-badge pt-1 pb-1 ps-3 pe-3 lemonmilk">' . esc_html__( 'AUSVERKAUFT', 'woocommerce' ) . '</div>';
            }
            else if ( $product->is_on_sale() ) {
                echo '<div class="onsale-badge pt-1 pb-1 ps-3 pe-3 lemonmilk">' . esc_html__( 'SALE', 'woocommerce' ) . '</div>';
            }

            
        ?>
        <div class="p carousel-produkt-subkategorie mb-2 d-flex flex-wrap">
            <?php $category_count = 1;?>
            <?php foreach ($product_subcats as $subcategory):?>
                    <a href="<?=$subcategory['url'];?>"><?= $subcategory['name'];?></a><?php if($category_count<count($product_subcats)):?>,<?php endif;?>
                    <?php $category_count++;?>
                    <?php endforeach;
            ?>
        </div>
        <?php if(!is_front_page()):?>
        <div class="p carousel-produkt-kategorie d-flex flex-wrap mb-2 g-20">
            <?php print_product_categories($product_id);?>
            
        </div>
        <?php endif;?>
        <div class="carousel-produkt-titel mb-2">
            <?= $product_title;?>
        </div>
        <div class="p carousel-produkt-preis">
            <?= $product_price;?>
        </div>
    </div>
</li>

