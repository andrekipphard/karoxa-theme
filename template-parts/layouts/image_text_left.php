<?php
$image = get_sub_field('image');
$headline = get_sub_field('headline');
$text = get_sub_field('text');
$button_text = get_sub_field('button_text');
$button_url = get_sub_field('button_url');

?>
<div class="py-5">
    <div class="container">
        <div class="row p-0 p-lg-5">
            <div class="col-12 col-lg-7 d-flex justify-content-between flex-column">
                <div class="pt-5 pb-5 pb-lg-0 px-lg-5">
                    <div class="h2 mb-3 mb-lg-3 text-uppercase lemonmilk">
                        <?= $headline ?>
                    </div>
                    <div class="p">
                        <?= $text; ?>
                    </div>
                    <a href="<?= $button_url; ?>"><button class="btn btn-primary">
                        <?= $button_text; ?>
                    </button></a>
                </div>
            </div>
            <div class="col-12 col-lg-5 img-container d-flex justify-content-center align-items-center">
                <img class="img-fluid rounded" src="<?= wp_get_attachment_image_url($image, 'large');?>"/>
            </div>
        </div>
    </div>
</div>