<div class="container">
    <div class="row pt-lg-5 pb-3 pb-lg-5">
        <div class="col pt-5">
            <div class="h2 me-3 ps-3 fs-1">
                Unsere Kategorien
            </div>
        </div>
    </div>
    <div class="row pb-5 ps-3 pe-3">
        <div class="col">
            <ul class="nav nav-tabs mb-5" id="categoryTab" role="tablist">
                <?php
                $args = array(
                    'taxonomy' => 'product_cat',
                    'hide_empty' => true,
                );
                $categories = get_categories( $args );
                $active_key = -1;
                foreach ( $categories as $key => $category ) {
                    $product_count = $category->count;
                    if ( $product_count > 0 && $active_key === -1 ) {
                        $active_key = $key;
                    }
                ?>
                    <li class="nav-item <?php echo $key == $active_key ? ' active' : ''; ?>" role="presentation">
                        <button class="nav-link <?php echo $key == $active_key ? ' active' : ''; ?>" id="category-<?php echo $category->term_id; ?>-tab" data-bs-toggle="tab" data-bs-target="#category-<?php echo $category->term_id; ?>-tab-pane" type="button" role="tab" aria-controls="category-<?php echo $category->term_id; ?>-tab-pane" aria-selected="<?php echo $key == $active_key ? 'true' : 'false'; ?>"><?php echo $category->name; ?></button>
                    </li>
                <?php } ?>
            </ul>
            <select id="categorySelect" class="d-block d-md-none">
                <?php foreach ( $categories as $key => $category ) {
                    $product_count = $category->count;
                    if ( $product_count > 0 ) {
                        ?>
                        <option value="category-<?php echo $category->term_id; ?>"><?php echo $category->name; ?></option>
                        <?php
                    }
                } ?>
            </select>


            <div class="tab-content" id="categoryTabContent">
                <?php foreach ( $categories as $key => $category ) {
                    $product_count = $category->count;
                    if ( $product_count > 0 ) {
                ?>
                        <div class="tab-pane fade<?php echo $key == $active_key ? ' show active' : ''; ?>" id="category-<?php echo $category->term_id; ?>-tab-pane" role="tabpanel" aria-labelledby="category-<?php echo $category->term_id; ?>-tab" tabindex="0">
                            <?php echo do_shortcode('[product_category category="' . $category->slug . '" columns="4"]'); ?>
                        </div>
                <?php }
                } ?>
            </div>

        </div>
    </div>
</div>