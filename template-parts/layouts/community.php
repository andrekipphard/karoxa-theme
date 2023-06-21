<?php
$mood_image = get_sub_field('mood_image');


?>
<div class="bg-light py-4 my-3 my-lg-0 py-lg-5">
    <div class="container">
        <div class="row bg-light community pb-4 py-lg-5">
            <div class="col-12 col-lg-5 img-container">
                <img class="img-fluid" src="<?= wp_get_attachment_image_url($mood_image, 'large');?>" height="100%" />
            </div>
            <div class="col-12 col-lg-7 d-flex flex-column justify-content-center pb-3 pb-lg-0">
                <div class="col-12 ms-0 ms-lg-5 d-flex justify-content-between flex-column text-center rounded-lg-lg" style="background-color:#d9d9d9">
                    <div class="px-5 pt-5">
                    <div class="h3 mb-1 mb-0 text-uppercase lemonmilk">
                        Das sagt unsere
                    </div>
                    <div class="h2 mb-3 mb-lg-3 text-uppercase lemonmilk">
                        Community
                    </div>
                    </div>
                    <div class="px-3 px-lg-5">
                    <?php if(have_rows('bewertungen')):
                        while(have_rows('bewertungen')): the_row();
                            $bewertung = get_sub_field('bewertung');
                    ?>
                    <img class="img-fluid rounded mb-1" src="<?= wp_get_attachment_image_url($bewertung, 'large');?>" />
                    <?php
                        endwhile;
                    endif;
                    ?>
                    </div>
                    
                    <?php if(have_rows('social_media')):
                    ?>
                    <div class="row pt-4 d-flex justify-content-center pb-3">
                        <ul class="footer-icons d-flex justify-content-center	">
                            <?php while(have_rows('social_media')): the_row();
                                    $social_icon = get_sub_field('social_icon');
                                    $social_icon_url = get_sub_field('social_icon_url');
                                    $background_color = get_sub_field('background_color');?>
                            <li style="background-color:<?=$background_color;?>" class="rounded-circle social-icon"><a href="<?=$social_icon_url?>" class="stretched-link"><i class="fs-5 bi bi-<?= $social_icon;?> text-white"></i></a></li>
                            <?php endwhile;?>
                        </ul>
                    </div>
                    <?php endif;?>
                </div>
            </div>

            
        </div>
    </div>
</div>

