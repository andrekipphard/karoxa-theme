<?php 
    $text = get_sub_field('text');
    $kontaktinformationen = get_sub_field('kontaktinformationen');
?>
<div class="container mb-5">
    <div class="row">
        <div class="col-12 col-lg-6">
            <div class="kontaktinformationen pe-0 pe-lg-5 mb-5 mb-lg-0">
                <div class="h2 text-uppercase lemonmilk">
                    Kontaktinformationen
                </div>
                <div class="p">
                    <?= $text; ?>
                </div>
                <?php if(have_rows('kontaktinformationen')):
                    while(have_rows('kontaktinformationen')): the_row();
                        $icon = get_sub_field('icon');
                        $kontaktinformation = get_sub_field('kontaktinformation');
                        $url = get_sub_field('url');
                ?>
                <div class="row">
                    <div class="col-1">
                        <i class="bi text-primary bi-<?= $icon; ?>"></i>
                    </div>
                    <div class="col-11">
                        <?php if($url):?><a href="<?= $url;?>"><?php endif;?><?= $kontaktinformation; ?><?php if($url):?></a><?php endif;?>
                    </div>
                </div>
                <?php endwhile;?>
                <?php endif;?>
            </div>
        </div>
        <div class="col-12 col-lg-6">
            <div class="kontaktformular ps-0 ps-lg-5">
                <div class="h2 text-uppercase lemonmilk">
                    Kontaktformular
                </div>
                <?php if ( filter_input( INPUT_GET, 'kontaktformular' ) === 'gesendet' ) : ?>

                    <div class="alert alert-success" role="alert">
                    Das Formular wurde erfolgreich gesendet.
                    </div>

                <?php endif ?>
                <form id="form-id" action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" method="post">
                    <div class="mb-3">
                        <input type="text" class="ohnohoney" id="nameInput">
                    </div>
                    <div class="mb-3">
                        <input type="email" class="ohnohoney" id="emailInput">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="ohnohoney" id="betreffInput">
                    </div>
                    <div class="mb-3">
                        <textarea class="ohnohoney" id="nachrichtInput" rows="3"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="nameqay" class="form-label">Name *</label>
                        <input type="text" class="form-control" id="nameqay" name="nameqay" required>
                    </div>
                    <div class="mb-3">
                        <label for="emailwsx" class="form-label">E-Mail *</label>
                        <input type="email" class="form-control" id="emailwsx" name="emailwsx" required>
                    </div>
                    <div class="mb-3">
                        <label for="betreffedc" class="form-label">Betreff</label>
                        <input type="text" class="form-control" id="betreffedc" name="betreffedc">
                    </div>
                    <div class="mb-3">
                        <label for="nachrichtrfv" class="form-label">Kommentar oder Nachricht</label>
                        <textarea class="form-control" id="nachrichtrfv" rows="3" name="nachrichtrfv"></textarea>
                    </div>
                    <div class="mb-3">
                        <input class="form-check-input" type="checkbox" value="" id="datenschutztgb" required>
                        <label class="form-check-label" for="datenschutztgb">Ich habe die <a href="/datenschutzerklaerung/">Datenschutzerklärung</a> gelesen und akzeptiere diese. *</label>
                    </div>
                    <div class="mb-3">
                        <input type="hidden" name="action" value="form_submit_action">
                        <button type="submit" class="submit-form btn btn-primary">Senden</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>