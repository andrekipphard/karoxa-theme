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
    <?php 
        // Loop through each non-empty main category
        foreach ($categories as $category):
            $category_name = $category->name;
            $category_desc = $category->description;
            $category_link = get_term_link($category->term_id);
            
    ?>
    <div class="row pt-5">
        <div class="col d-flex align-items-start flex-column">
            <div class="h2 me-3 fs-1 ps-3">
                <a href="<?= $category_link ?>"><?= $category_name?></a>
            </div>
            <div class="p me-3 ps-3">
                <?= $category_desc; ?>
            </div>
        </div>
    </div>
    <div class="row pb-5 ps-3 pe-3">
        <div class="col">
            <?php echo do_shortcode('[product_category category="' . $category->slug . '" columns="4" limit="8"]'); ?>
        </div>
    </div>
    <?php
        endforeach;
    ?>
</div>

