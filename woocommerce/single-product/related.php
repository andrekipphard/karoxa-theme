<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.9.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( $related_products ) : ?>

	<section class="related products">
		<?php
		$heading = apply_filters( 'woocommerce_product_related_products_heading', __( 'Related products', 'woocommerce' ) );
		if ( $heading ) :
			?>
			<h2><?php echo esc_html( $heading ); ?></h2>
		<?php endif; ?>
		<?php woocommerce_product_loop_start(); ?>
            <div class="row pb-5">
                <?php foreach ( $related_products as $related_product ) : ?>
                    <?php               
                        $product_title = $related_product->get_title();
                        $product_permalink = $related_product->get_permalink();
                        $product_price = $related_product->get_price_html();
                        $product_id = $related_product->get_id();
                        $product_cats = get_categories($product_id);
                        $product_subcats = get_product_subcategories($product_id);
                    ?>
                    <div class="col-12 col-lg-3 carousel-col rounded shadow p-4">
                        <a href="<?=$product_permalink?>"><img class="img-fluid mb-2" src="<?php echo wp_get_attachment_url( $related_product->get_image_id(), 'large' ); ?>" /></a>
                        <?php 
                            if ( ! $related_product->is_in_stock() ) {
                                echo '<div class="outofstock-badge pt-1 pb-1 ps-3 pe-3 lemonmilk">' . esc_html__( 'AUSVERKAUFT', 'woocommerce' ) . '</div>';
                            }
                            else if ( $related_product->is_on_sale() ) {
                                echo '<div class="onsale-badge pt-1 pb-1 ps-3 pe-3 lemonmilk">' . esc_html__( 'SALE', 'woocommerce' ) . '</div>';
                            }

                            
                        ?>
                        <div class="p carousel-produkt-subkategorie mb-2">
                            <?php $category_count = 1;?>
                            <?php foreach ($product_subcats as $subcategory):?>
                                    <a href="<?=$subcategory['url'];?>"><?= $subcategory['name'];?></a><?php if($category_count<count($product_subcats)):?>,<?php endif;?>
                                    <?php $category_count++;?>
                                    <?php endforeach;
                            ?>
                        </div>
                        <div class="p carousel-produkt-kategorie mb-2 d-flex flex-wrap">
                            <?php print_product_categories($product_id);?>
                        </div>
                        <div class="carousel-produkt-titel mb-2">
                            <?= $product_title;?>
                        </div>
                        <div class="p carousel-produkt-preis">
                            <?= $product_price;?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
		<?php woocommerce_product_loop_end(); ?>
	</section>
	<?php
        endif;

wp_reset_postdata();
