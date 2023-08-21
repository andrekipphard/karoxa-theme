<?php
    // Get all non-empty main categories
    $args = array(
        'taxonomy' => 'product_cat',
        'parent' => 0,
        'hide_empty' => true,
    );
    $categories = get_categories( $args );
?>

<div class="container pt-5">
    <div class="row pt-5">
        <div class="col d-flex align-items-start flex-column">
            <div class="h2 me-3 fs-1 ps-3">
                <a href="/shop/">Alle Produkte</a>
            </div>
        </div>
    </div>
    <div class="row pb-3 pb-lg-0 ps-0 ps-lg-3 pe-0 pe-lg-3 products-of-category">
        <div class="col mobile-hide">
            <?php echo do_shortcode('[products columns="4" limit="8"]'); ?>
        </div>
        <div class="col desktop-hide">
            <?php echo do_shortcode('[products columns="4" limit="4"]'); ?>
        </div>
    </div>
    <div class="row pb-3 pb-lg-5 mb-lg-5 text-center">
        <div class="col">
            <a href="/shop/"><btn class="btn btn-primary">Mehr anzeigen</btn></a>
        </div>
    </div>
</div>

