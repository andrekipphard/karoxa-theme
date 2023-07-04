<div class="container pt-3 pt-lg-5">
    <?php 

        $categories = get_sub_field('kategorien');

        // Wenn Kategorien ausgewählt wurden, zeige sie an
        if ($categories):
            foreach ($categories as $category):
                $category_name = $category->name;
                $category_desc = $category->description;
                $category_link = get_term_link($category->term_id);
                
                // Kategorie-Inhalte anzeigen
                ?>
                <div class="row pt-3 pt-lg-5">
                    <div class="col d-flex align-items-center align-items-lg-start flex-column">
                        <div class="h2 me-0 me-lg-3 fs-1 ps-0 ps-lg-3">
                            <a href="<?= $category_link ?>"><?= $category_name?></a>
                        </div>
                        <div class="p me-0 me-lg-3 ps-0 ps-lg-3">
                            <?= $category_desc; ?>
                        </div>
                    </div>
                </div>
                <div class="row pb-3 pb-lg-0 ps-0 ps-lg-3 pe-0 pe-lg-3 products-of-category">
                    <div class="col mobile-hide">
                        <?php echo do_shortcode('[product_category category="' . $category->slug . '" columns="4" limit="8"]'); ?>
                    </div>
                    <div class="col desktop-hide">
                        <?php echo do_shortcode('[product_category category="' . $category->slug . '" columns="4" limit="4"]'); ?>
                    </div>
                </div>
                <div class="row pb-3 pb-lg-5 mb-lg-5 text-center">
                    <div class="col">
                        <a href="<?= $category_link ?>"><btn class="btn btn-primary">Mehr anzeigen</btn></a>
                    </div>
                </div>
                <?php
            endforeach;
        endif;

    ?>
</div>
