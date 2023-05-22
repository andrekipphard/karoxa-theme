<?php global $product;

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
    <div class="col-12 col-lg-12 carousel-col rounded shadow p-4">
        <a href="<?=$product_permalink?>"><img class="img-fluid mb-2" src="<?php echo wp_get_attachment_url( $product->get_image_id(), 'large' ); ?>" /></a>
        <?php 
            if ( ! $product->is_in_stock() ) {
                echo '<div class="outofstock-badge pt-1 pb-1 ps-3 pe-3 lemonmilk">' . esc_html__( 'AUSVERKAUFT', 'woocommerce' ) . '</div>';
            }
            else if ( $product->is_on_sale() ) {
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
</li>
