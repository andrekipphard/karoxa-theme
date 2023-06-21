<?php
$image = get_sub_field('image');
$headline = get_sub_field('headline');
$text = get_sub_field('text');
$button_url = get_sub_field('button_url');

?>
<div class="row d-flex justify-content-center align-items-center text-center hero mb-3" style="background-image:url('<?= wp_get_attachment_image_url($image, 'full');?>'); background-position:center; background-repeat: no-repeat; background-size:cover;">
    <div class="col">
        <div class="container">
            <div class="move-in-from-right">
                <div class="h1 text-uppercase lemonmilk text-white mb-5">
                    <?= $headline; ?>
                </div>
                <div class="p text-white mb-5">
                    <?= $text;?>
                </div>
                <?php if ( $button_text = get_sub_field('button_text') ) : ?>	
                <a href="<?= $button_url; ?>"><button class="btn btn-outline-light text-uppercase">
                    <?= $button_text; ?>
                </button></a>
                <?php endif;?>
            </div>
            
        </div>
    </div>
</div>
