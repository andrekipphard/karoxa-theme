<?php
    $slide = get_sub_field('slide');
?>
<div class="row" style="padding-left:0; padding-right:0;">
    <div class="col" style="padding-left:0; padding-right:0;">
        <?php if(have_rows('slide')):            ?>
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <?php if(count($slide)>1):?>
                    <div class="carousel-indicators">
                        <?php while(have_rows('slide')): the_row();?>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?= get_row_index()-1;?>"<?php if(get_row_index()==1):?> class="active"aria-current="true"<?php endif;?>  aria-label="Slide <?= get_row_index();?>"></button>
                        <?php endwhile;?>
                        
                    </div>
                <?php endif;?>
                <div class="carousel-inner">
                    <?php while(have_rows('slide')): the_row();
                        $image = get_sub_field('image');
                        $headline = get_sub_field('headline');
                        $text = get_sub_field('text');
                        $button_url = get_sub_field('button_url');?>
                        <div class="carousel-item<?php if(get_row_index()==1):?> active<?php endif;?>">
                            <div class="row d-flex justify-content-center align-items-center text-center hero px-0" style="background-image:url('<?= wp_get_attachment_image_url($image, 'full');?>'); background-position:center; background-repeat: no-repeat; background-size:cover;">
                                <div class="col">
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
                    <?php endwhile;?>
                    <?php if(count($slide)>1):?>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                        <?php endif;?>
                </div>
            </div>
        <?php endif;?>
    </div>
</div>

