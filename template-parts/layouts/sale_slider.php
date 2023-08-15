<?php
    $kategorie = 'Shapewear';
    $kategorie_slug = sanitize_title($kategorie);
    $sale_page_url = "/ausverkauf/";
    $product_count = count_products_on_sale();
    // Initialize an empty array to store the products
    $sale_products = array();

    // Get all products on sale
    $product_ids = wc_get_product_ids_on_sale();

    // Loop through the products on sale
    foreach ( $product_ids as $product_id ) {
        // Get the product object
        $product = wc_get_product( $product_id );

        // Check if the product is a variation
        if ( $product->is_type( 'variation' ) ) {
            // Get the parent product object
            $parent_product = wc_get_product( $product->get_parent_id() );

            // Check if the parent product is on sale
            if ( $parent_product->is_on_sale() ) {
            // Add the parent product to the array
            $sale_products[] = $parent_product;
            }
        } else {
            // Add the product to the array
            $sale_products[] = $product;
        }
    }
    $product_term_slugs = array($kategorie_slug);
    
    $product_args = array(
        'post_status' => 'publish',
        'limit' => -1,
        'category' => $product_term_slugs,
        //more options according to wc_get_products() docs
    );
    $products = $sale_products;
    $array = count($products);
    $index_items=0;
    $index = 0;?>
<div class="container">
    <div class="row d-flex justify-content-center py-3 py-lg-5 ">
        <div class="col">
            <div class="row pt-3 pt-lg-5">
                <div class="col d-flex align-items-center">
                    <div class="h2 me-3 ps-3 fs-1">
                    <a href="<?=$sale_page_url?>" class="text-dark">Produkte in Sale</a>
                    </div>
                    <div class="p">
                        <a href="<?=$sale_page_url?>" class="text-dark">(<?= $product_count;?>)</a>
                    </div>
                </div>
            </div>
            <div class="row pb-0 pb-lg-3">
                <div class="col px-0">
                    <!-- Desktop Slider -->
                    <div id="carouselExample" class="carousel slide carousel-dark carousel-desktop">
                        <div class="carousel-inner carousel-flex">
                            <div class="carousel-item active p-3 col-12">


                                <?php 
                                    while($index<4 && !empty($products[$index])):
                                        $product_title = $products[$index]->get_title();
                                        $product_permalink = $products[$index]->get_permalink();
                                        $product_cats = $products[$index]->get_categories();
                                        $product_price = $products[$index]->get_price_html();
                                        $product_subcats = get_product_subcategories($product_id);    
                                ?>

                                        <div class="col-6 col-lg-3 carousel-col rounded p-4">
                                            <a href="<?=$product_permalink?>"><img class="img-fluid mb-2" src="<?php echo wp_get_attachment_url( $products[$index]->get_image_id(), 'large' ); ?>" /></a>
                                            <?php 
                                                if ( ! $products[$index]->is_in_stock() ) {
                                                    echo '<div class="outofstock-badge pt-1 pb-1 ps-3 pe-3 lemonmilk">' . esc_html__( 'AUSVERKAUFT', 'woocommerce' ) . '</div>';
                                                }

                                                else if( $products[$index]->is_on_sale() ) {
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
                                               <!-- <a href="/produkt-kategorie/<?=$kategorie_slug?>/" class="pt-1 pb-1 pe-3 ps-3 rounded"><?= $kategorie?></a>-->
                                                <?php print_product_categories($products[$index]->get_id());?>
                                            </div>
                                            <div class="carousel-produkt-titel mb-2">
                                                <?= $product_title;?>
                                            </div>
                                            <div class="p carousel-produkt-preis">
                                                <?= $product_price;?>

                                            </div>
                                        </div>
                                <?php
                                        $index++;
                                    endwhile;
                                ?>
                            </div>
                            <?php $index_items++;?>
                            <?php while ($index < $array):?>
                                <div class="carousel-item p-3 col-12">
                                    <?php while($index<4*$index_items+4):
                                        $product_title = $products[$index]->get_title();
                                        $product_permalink = $products[$index]->get_permalink();
                                        $product_cats = $products[$index]->get_categories();
                                        $product_price = $products[$index]->get_price_html();
                                        $product_currency = get_woocommerce_currency();
                                        $product_subcats = get_product_subcategories($product_id);  
                                    ?>
                                        <div class="col-6 col-lg-3 carousel-col rounded p-4">
                                            <a href="<?=$product_permalink?>"><img class="img-fluid mb-2" src="<?php echo wp_get_attachment_url( $products[$index]->get_image_id(), 'large' ); ?>" /></a>
                                            <?php 
                                                if ( ! $products[$index]->is_in_stock() ) {
                                                    echo '<div class="outofstock-badge pt-1 pb-1 ps-3 pe-3 lemonmilk">' . esc_html__( 'AUSVERKAUFT', 'woocommerce' ) . '</div>';
                                                }
                                                else if( $products[$index]->is_on_sale() ) {
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
                                                <!--<a href="/produkt-kategorie/<?=$kategorie_slug?>/" class="pt-1 pb-1 pe-3 ps-3 rounded"><?= $kategorie?></a>-->
                                                <?php print_product_categories($products[$index]->get_id());?>
                                            </div>
                                            <div class="carousel-produkt-titel mb-2">
                                                <?= $product_title;?>
                                            </div>
                                            <div class="p carousel-produkt-preis">
                                                <?= $product_price;?>

                                            </div>
                                        </div>
                                        <?php $index++;?>
                                        <?php if($index >= $array):
                                            break;
                                        ?>
                                        <?php endif;?>
                                    <?php endwhile;?>
                                </div>
                                <?php $index_items++;?>
                            <?php endwhile;?>
                        </div>
                        <?php if($index_items>1):?>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        <?php endif;?>
                    </div>
                    <?php 
                        $index = 0;
                    ?>
                    <!-- Mobile Slider 2 Columns -->
                    <div id="carouselMobile" class="carousel slide carousel-dark carousel-mobile" data-ride="carousel" data-touch="true">
                        <div class="carousel-inner carousel-flex">
                            <div class="carousel-item active col-12">


                                <?php 
                                    while($index<2 && !empty($products[$index])):
                                        $product_title = $products[$index]->get_title();
                                        $product_permalink = $products[$index]->get_permalink();
                                        $product_cats = $products[$index]->get_categories();
                                        $product_price = $products[$index]->get_price_html();
                                        $product_subcats = get_product_subcategories($product_id);    
                                ?>

                                        <div class="col-6 col-lg-3 carousel-col rounded p-4">
                                            <a href="<?=$product_permalink?>"><img class="img-fluid mb-2" src="<?php echo wp_get_attachment_url( $products[$index]->get_image_id(), 'large' ); ?>" /></a>
                                            <?php 
                                                if ( ! $products[$index]->is_in_stock() ) {
                                                    echo '<div class="outofstock-badge pt-1 pb-1 ps-3 pe-3 lemonmilk">' . esc_html__( 'AUSVERKAUFT', 'woocommerce' ) . '</div>';
                                                }

                                                else if( $products[$index]->is_on_sale() ) {
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
                                            
                                            <div class="carousel-produkt-titel mb-2">
                                                <?= $product_title;?>
                                            </div>
                                            <div class="p carousel-produkt-preis">
                                                <?= $product_price;?>

                                            </div>
                                        </div>
                                <?php
                                        $index++;
                                    endwhile;
                                ?>
                            </div>
                            <?php $index_items++;?>
                            <?php while ($index < $array):?>
                                <?php $index_loop_item = 0;?>
                                <div class="carousel-item col-12">
                                    <?php while($index_loop_item < 2):
                                        $product_title = $products[$index]->get_title();
                                        $product_permalink = $products[$index]->get_permalink();
                                        $product_cats = $products[$index]->get_categories();
                                        $product_price = $products[$index]->get_price_html();
                                        $product_currency = get_woocommerce_currency();
                                        $product_subcats = get_product_subcategories($product_id);  
                                    ?>
                                        <div class="col-6 col-lg-3 carousel-col rounded p-4">
                                            <a href="<?=$product_permalink?>"><img class="img-fluid mb-2" src="<?php echo wp_get_attachment_url( $products[$index]->get_image_id(), 'large' ); ?>" /></a>
                                            <?php 
                                                if ( ! $products[$index]->is_in_stock() ) {
                                                    echo '<div class="outofstock-badge pt-1 pb-1 ps-3 pe-3 lemonmilk">' . esc_html__( 'AUSVERKAUFT', 'woocommerce' ) . '</div>';
                                                }
                                                else if( $products[$index]->is_on_sale() ) {
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
                                                <!--<a href="/produkt-kategorie/<?=$kategorie_slug?>/" class="pt-1 pb-1 pe-3 ps-3 rounded"><?= $kategorie?></a>-->
                                                <!--<?php print_product_categories($products[$index]->get_id());?>-->
                                            </div>
                                            <div class="carousel-produkt-titel mb-2">
                                                <?= $product_title;?>
                                            </div>
                                            <div class="p carousel-produkt-preis">
                                                <?= $product_price;?>

                                            </div>
                                        </div>
                                        <?php $index++;?>
                                        <?php $index_loop_item++;?>
                                        <?php if($index >= $array):
                                            break;
                                        ?>
                                        <?php endif;?>
                                    <?php endwhile;?>
                                </div>
                                <?php $index_items++;?>
                            <?php endwhile;?>
                        </div>
                        <?php if($index_items>1):?>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselMobile" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselMobile" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        <?php endif;?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
