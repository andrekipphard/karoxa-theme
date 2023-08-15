<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;?>
<div class="pt-5">
<?php
/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>
</div>

<div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>
    <div class="row p-0 p-lg-5">
        <div class="col-12 col-lg-6 image">
            <?php
            /**
             * Hook: woocommerce_before_single_product_summary.
             * 
             * @hooked woocommerce_show_product_sale_flash - 10
             * @hooked woocommerce_show_product_images - 20
             */
            do_action( 'woocommerce_before_single_product_summary' );
            ?>
        </div>
        <div class="col-12 col-lg-6 mt-3 mt-lg-0 d-flex align-items-center content">
            <div class="summary entry-summary w-100">
                <?php
                /**
                 * Hook: woocommerce_single_product_summary.
                 *
                 * @hooked woocommerce_template_sin gle_title - 5
                 * @hooked woocommerce_template_single_rating - 10
                 * @hooked woocommerce_template_single_price - 10
                 * @hooked woocommerce_template_single_excerpt - 20
                 * @hooked woocommerce_template_single_add_to_cart - 30
                 * @hooked woocommerce_template_single_meta - 40
                 * @hooked woocommerce_template_single_sharing - 50
                 * @hooked WC_Structured_Data::generate_product_data() - 60
                 */
                do_action( 'woocommerce_single_product_summary' );
                ?>
                <?php if ( have_rows( 'grosentabelle' ) ) : ?>
                    <!-- Button trigger modal -->
                    <?php while ( have_rows( 'grosentabelle' ) ) : the_row(); 
                        $titel = get_sub_field( 'titel' );
                        $inhalt = get_sub_field( 'inhalt' );?>
                        <button type="button" class="btn btn-link ps-0" style="text-decoration:underline;" data-bs-toggle="modal" data-bs-target="#groessentabelleModal">
                            Größentabelle
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="groessentabelleModal" tabindex="-1" aria-labelledby="groessentabelleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="#groessentabelleModalLabel"><?= $titel;?></h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <?= $inhalt;?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
                
                
            </div>
        </div>
    </div>
    <div class="row p-0 p-lg-5">
        <div class="col-12 col-lg-6 text-center fw-light mb-5 mb-lg-0">
            <div class="row mb-5">
                <div class="col-6 text-center fw-semibold">
                    <i class="bi px-0 px-lg-5 bi-box-seam fs-1"></i><br>
                    Schnelle Lieferung
                </div>
                <div class="col-6 px-0 px-lg-5 text-center fw-semibold">
                    <i class="bi bi-box2-heart fs-1"></i><br>
                    Einfache Rückgabe
                </div>
            </div>
            Hast du Fragen zur SHAPEWEAR?<br>
            <a href="/faq/" class="faq-link">zu unseren FAQs</a>
        </div>
        <div class="col-12 col-lg-6">
            <?php the_content();?>
            
            
        </div>
    </div>
<div class="row pt-5">
<?php
	/**
	 * Hook: woocommerce_after_single_product_summary.
	 *
	 * @hooked woocommerce_output_product_data_tabs - 10
	 * @hooked woocommerce_upsell_display - 15
	 * @hooked woocommerce_output_related_products - 20
	 */
	do_action( 'woocommerce_after_single_product_summary' );
	?>
</div>
	


</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>
<script>
    jQuery('.legal-price-info').appendTo('.price');
</script>
