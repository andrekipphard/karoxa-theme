<?php
    $kategorie = get_sub_field('kategorie');
    $kategorie_slug = sanitize_title($kategorie);
    $term = get_term_by('slug', $kategorie_slug, 'product_cat');
    $kategorie_link = get_term_link($term->term_id, 'product_cat');
    $product_count = count_products_in_category($kategorie_slug);
    $product_args = array(
        'post_status' => 'publish',
        'limit' => -1,
        'category' => $product_term_slugs,
        //more options according to wc_get_products() docs
    );
    $products = wc_get_products($product_args);
    $array = count($products);
    $index = 0;
    $index_items = 0;

    ?>
<div class="container">
    <div class="row d-flex justify-content-center py-5 ">
        <div class="col">
            <div class="row pt-5">
                <div class="col d-flex align-items-center">
                    <div class="h2 me-3 ps-3 fs-1">
                    <a href="<?=$kategorie_link?>" class="text-dark"><?= $kategorie;?></a>
                    </div>
                    <div class="p">
                        <a href="<?=$kategorie_link?>" class="text-dark">(<?= $product_count;?>)</a>
                    </div>
                </div>
            </div>
            <div class="row pb-5">
                <div class="col">
                    <div id="carouselExample" class="carousel slide carousel-dark">
                        <div class="carousel-inner carousel-flex">
                            <div class="carousel-item active p-3">


                                <?php 
                                    while($index<4 && !empty($products[$index])):
                                        $product_title = $products[$index]->get_title();
                                        $product_permalink = $products[$index]->get_permalink();
                                        $product_cats = get_categories($product_id);
                                        $product_price = $products[$index]->get_price_html();
                                        $product_id = $products[$index]->get_id();
                                        $product_subcats = get_product_subcategories($product_id);
                                ?>

                                        <div class="col-3 carousel-col rounded shadow p-4">
                                            <a href="<?=$product_permalink?>"><img class="img-fluid mb-2" src="<?php echo wp_get_attachment_url( $products[$index]->get_image_id(), 'large' ); ?>" /></a>
                                            <?php 
                                                if ( ! $products[$index]->is_in_stock() ) {
                                                    echo '<div class="outofstock-badge pt-1 pb-1 ps-3 pe-3 lemonmilk">' . esc_html__( 'AUSVERKAUFT', 'woocommerce' ) . '</div>';
                                                }
                                                else if ( $products[$index]->is_on_sale() ) {
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
                                            <div class="p carousel-produkt-kategorie mb-2 d-flex flex-wrap">
                                                <!--<a href="/produkt-kategorie/<?=$kategorie_slug?>/" class="pt-1 pb-1 pe-3 ps-3 rounded"><?= $kategorie?></a>-->
                                                <?php print_product_categories($product_id);?>
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
                                <div class="carousel-item p-3">
                                    <?php while($index<4*$index_items+4):
                                        $product_title = $products[$index]->get_title();
                                        $product_permalink = $products[$index]->get_permalink();
                                        $product_cats = $products[$index]->get_categories();
                                        $product_price = $products[$index]->get_price_html();
                                        $product_currency = get_woocommerce_currency();
                                        $product_subcats = get_product_subcategories($product_id);  
                                    ?>
                                        <div class="col-3 carousel-col rounded shadow p-4">
                                            <a href="<?=$product_permalink?>"><img class="img-fluid mb-2" src="<?php echo wp_get_attachment_url( $products[$index]->get_image_id(), 'large' ); ?>" /></a>
                                            <?php 
                                                if ( ! $products[$index]->is_in_stock() ) {
                                                    echo '<div class="outofstock-badge pt-1 pb-1 ps-3 pe-3 lemonmilk">' . esc_html__( 'AUSVERKAUFT', 'woocommerce' ) . '</div>';
                                                }
                                                else if ( $products[$index]->is_on_sale() ) {
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
                                                <?php print_product_categories($product_id);?>
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

                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
