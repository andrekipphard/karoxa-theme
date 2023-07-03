<?php
    $headline = get_sub_field('headline');
?>
<div class="bg-light">
    <div class="container my-3 my-lg-0 py-4 py-lg-5">
        <div class="row pt-4 pb-1 py-lg-5">
            <div class="col text-center">
                <h2><?= $headline; ?></h2>
                <div class="row pt-0 pt-lg-5">
                    <?php if(have_rows('point_of_sale')):
                        while(have_rows('point_of_sale')): the_row();
                            $pos_image = get_sub_field('pos_image');
                            $headline = get_sub_field('headline');
                            $text = get_sub_field('text');
                    ?>
                        <div class="col-12 col-lg-4">
                            <div class="card h-100 border-0 bg-light pt-3 pg-lg-0 d-flex align-items-center">
                                <img src="<?= wp_get_attachment_image_url($pos_image, 'large');?>">
                                <div class="card-header border-0 bg-light d-flex justify-content-center">
                                    <h3 class="card-title"><?= $headline; ?></h3>
                                </div>
                                <div class="card-body pt-0 flex-column">
                                    <p class="card-text"><?= $text; ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endwhile;
                    endif;
                    ?>
                </div>
            </div>
            
        </div>
    </div>
</div>
