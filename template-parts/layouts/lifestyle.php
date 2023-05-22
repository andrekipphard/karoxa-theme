<?php
$mockup_image = get_sub_field('mockup_image');
$instagram_profile_image = get_sub_field('instagram_profile_image');
$instagram_account_name = get_sub_field('instagram_account_name');
$text = get_sub_field('text');
?>
<div class="bg-light">
    <div class="container">
        <div class="row pt-5 pt-lg-5 pe-lg-5 ps-lg-5 lifestyle">
            <div class="col-12 col-lg-4 d-flex justify-content-center align-items-center ps-lg-5 pt-lg-3">
                <img class="img-fluid" src="<?= wp_get_attachment_image_url($mockup_image, 'large');?>" />
            </div>
            <div class="col-12 col-lg-8 d-flex justify-content-between flex-column pb-lg-5 pt-lg-5 pe-lg-5">
                <div class="col ms-lg-5 d-flex justify-content-between flex-column rounded p-lg-4 mt-5 mt-lg-0">
                    <div class="h3 text-center text-lg-start">
                        Weitere Tipps & Inspirationen zu deinem
                    </div>
                    <div class="h2 text-uppercase lemonmilk text-center text-lg-start">
                        Lifestyle
                    </div>
                    <div class="row d-flex justify-content-between align-items-center">
                        <div class="col-2 col-lg-1">
                            <a href="https://www.instagram.com/<?=$instagram_account_name?>/"><img class="img-fluid rounded-circle border border-dark" src="<?= wp_get_attachment_image_url($instagram_profile_image, 'large');?>"/></a>
                        </div>
                        <div class="col-5 col-lg-3">
                            <div class="h4 mb-0">
                                <a href="https://www.instagram.com/<?=$instagram_account_name?>/" class="text-dark"><?=$instagram_account_name;?></a>
                            </div>
                        </div>
                        <div class="col-5 col-lg-8 mt-3 mt-lg-0">
                            <?php if (have_rows('social_media')):?>
                            <ul class="footer-icons d-flex justify-content-left mb-3 mb-lg-0">
                                <?php while(have_rows('social_media')): the_row();
                                        $social_icon = get_sub_field('social_icon');
                                        $social_icon_url = get_sub_field('social_icon_url');?>
                                <li class=""><a href="<?=$social_icon_url;?>" class=""><i class="fs-1 fs-lg-5 bi bi-<?=$social_icon;?> text-dark fs-2 me-3"></i></a></li>
                                <?php endwhile;?>
                            </ul>
                            <?php endif;?>
                        </div>
                    </div>
                    <div class="p text-left">
                        <?=$text;?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
