<?php
$image = get_sub_field('image');
$headline = get_sub_field('headline');
$text = get_sub_field('text');
$button_text = get_sub_field('button_text');
$button_url = get_sub_field('button_url');

?>
<div class="row py-4 py-lg-5 bg-dark-overlay position-relative background-fixed d-flex justify-content-center align-items-center text-center" style="background-image:url('<?= wp_get_attachment_image_url($image, 'full');?>'); background-position:center; background-repeat: no-repeat; background-size:cover; background-attachment:fixed;">
    <div class="col">
        <div class="container py-4 py-lg-5">
            <div class="h1 text-uppercase lemonmilk text-white mb-5">
                <?= $headline; ?>
            </div>
            <div class="p text-white mb-5">
                <?= $text;?>
            </div>
            <a href="<?= $button_url; ?>"><button class="btn btn-primary">
                <?= $button_text; ?>
            </button></a>
        </div>
    </div>
</div>