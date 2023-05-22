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
            Hast du Fragen zum SHAPE BODY?<br>
            <a href="/" class="faq-link">zu unseren FAQs</a>
        </div>
        <div class="col-12 col-lg-6">
            <?php the_content();?>
            <div class="product_meta mt-5 mt-lg-0">
                <?php if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) : ?>
                    <span class="sku_wrapper fw-semibold"><?php esc_html_e( 'SKU:', 'woocommerce' ); ?> <span class="sku fw-normal"><?php echo ( $sku = $product->get_sku() ) ? $sku : esc_html__( 'N/A', 'woocommerce' ); ?></span></span>
                <?php endif; ?>
            </div>
            <?php if(get_the_terms( $product->get_id(), 'product_cat' )):
                $terms = get_the_terms( $product->get_id(), 'product_cat' );
                if ( $terms && ! is_wp_error( $terms ) ) :
                    $cat_links = array();
                    foreach ( $terms as $term ) {
                        $cat_links[] = sprintf( '<a href="%s">%s</a>', esc_url( get_term_link( $term->term_id, 'product_cat' ) ), esc_html( $term->name ) );
                    }
                    $cat_list = join( ', ', $cat_links );
                    printf( '<div class="product-categories fw-semibold">Kategorien: <span class="fw-normal">%s</span></div>', $cat_list );
                endif;
            endif;
            ?>
            <div class="tags fw-semibold">
            <?php if(get_the_terms( $product->get_id(), 'product_tag' ) ):
                $tag_count = sizeof( get_the_terms( $product->get_id(), 'product_tag' ) );
                
                if ( $tag_count > 0 ) {
                    echo esc_html_e( 'Tags: ', 'woocommerce' );
                    echo ' ';
                    printf('<span class="fw-normal">');
                    $tag_index = 1;
                    foreach ( get_the_terms( $product->get_id(), 'product_tag' ) as $key => $term ) {
                        echo '<a href="' . esc_url( get_term_link( $term->term_id, 'product_tag' ) ) . '">' . esc_html( $term->name ) . '</a>';
                        if ( $tag_index < $tag_count ) {
                            echo ', ';
                        }
                        $tag_index++;
                    }
                    printf('</span>');
                }
            endif;
            ?>
            </span>
            </div>
            
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
