<div class="container">
    <div class="row d-flex justify-content-center py-5">
        <div class="col">
            <div class="row pt-5">
                <div class="col d-flex align-items-center">
                    <div class="h2 me-3 fs-1 ps-3">
                        Kategorien
                    </div>
                </div>
            </div>
            <div class="row pb-5">
                <?php 
                    $args = array(
                        'taxonomy'     => 'product_cat',
                        'orderby'      => 'name',
                        'show_count'   => 0,
                        'pad_counts'   => 0,
                        'hierarchical' => 1,
                        'title_li'     => '',
                        'hide_empty'   => 0,
                        'parent'       => 0
                    );
                    $all_categories = get_categories( $args );
                    foreach ($all_categories as $cat) :
                        if($cat->category_parent == 0) {
                            $category_id = $cat->term_id;       
                            //echo '<div class="woocommerce-category-image-wrap">';
                            //echo '<a href="'. get_term_link($cat->slug, 'product_cat') .'">';
                            $thumbnail_id = get_woocommerce_term_meta( $cat->term_id, 'thumbnail_id', true ); 
                            $image = wp_get_attachment_url( $thumbnail_id );
                            if ( $image ) {
                            //  echo '<img src="' . $image . '" alt="" width="200" height="200" />';
                            }
                            //echo '<h2>'.$cat->name.'</h2>';
                            //echo '</a>';
                            //echo '</div>';
                        }
                        ?><div class="col-4 cat-col rounded shadow p-5 text-end">
                                    <a href="<?= get_term_link($cat->slug, 'product_cat') ?>" ><img class="img-fluid mb-4" src="<?=$image?>" /></a>
                                    <?php if(category_has_sale_products($cat)):?>
                                        <div class="onsale-image pt-1 pb-1 ps-3 pe-3 mt-5">SALE</div>
                                    <?php endif;?>
                                    <div class="p carousel-produkt-kategorie mb-4 text-start">
                                        <a href="<?= get_term_link($cat->slug, 'product_cat') ?>" class="pt-1 pb-1 pe-3 ps-3 rounded fs-5"><?=$cat->name;?></a>
                                    </div>
                                    <a href="<?= get_term_link($cat->slug, 'product_cat') ?>" class="text-end"><button type="button" class="btn categories-btn fw-bold fs-5">Jetzt entdecken<i class="bi bi-chevron-right"></i></button></a>
                                </div>
                    <?php endforeach;
                ?>

            </div>
        </div>
    </div>
</div>

