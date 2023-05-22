<?php
$headline = get_sub_field('headline');
$text = get_sub_field('text');

?>
<div class="row py-3 py-lg-5 d-flex justify-content-center align-items-center text-center">
    <div class="col">
        <div class="container py-3 py-lg-5">
            <div class="h2 text-uppercase lemonmilk mb-5">
                <?= $headline; ?>
            </div>
            <div class="p">
                <?= $text;?>
            </div>
        </div>
    </div>
</div>