<div class="container pb-5">
    <div class="row">
        <div class="col">
            <div class="accordion accordion-flush" id="accordionFlushExample">
                <?php if ( have_rows( 'faq' ) ) : ?>
                    <!-- Button trigger modal -->
                    <?php while ( have_rows( 'faq' ) ) : the_row(); 
                        $headline = get_sub_field( 'headline' );
                        $text = get_sub_field( 'text' );?>
                        <div class="accordion-item mb-3">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse<?php echo get_row_index();?>" aria-expanded="false" aria-controls="flush-collapseOne">
                                    <?= $headline; ?>
                                </button>
                            </h2>
                            <div id="flush-collapse<?php echo get_row_index();?>" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body"><?= $text; ?></div>
                            </div>
                        </div>
                    <?php endwhile;?>
                <?php endif;?>
            </div>
        </div>
    </div>
</div>