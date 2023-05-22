<?php
/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.4.0
 */

defined( 'ABSPATH' ) || exit;



?>
<div class="container pb-3">
<?php do_action( 'woocommerce_before_cart' ); ?>
    <form class="woocommerce-cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
    <?php do_action( 'woocommerce_before_cart_table' ); ?>

        <table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents" cellspacing="0">
            <thead>
                <tr>
                    <th class="product-remove"><span class="screen-reader-text"><?php esc_html_e( 'Remove item', 'woocommerce' ); ?></span></th>
                    <th class="product-thumbnail"><span class="screen-reader-text"><?php esc_html_e( 'Thumbnail image', 'woocommerce' ); ?></span></th>
                    <th class="product-name text-uppercase lemonmilk"><?php esc_html_e( 'Product', 'woocommerce' ); ?></th>
                    <th class="product-price text-uppercase lemonmilk"><?php esc_html_e( 'Price', 'woocommerce' ); ?></th>
                    <th class="product-quantity text-uppercase lemonmilk"><?php esc_html_e( 'Quantity', 'woocommerce' ); ?></th>
                    <th class="product-subtotal text-uppercase lemonmilk"><?php esc_html_e( 'Subtotal', 'woocommerce' ); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php do_action( 'woocommerce_before_cart_contents' ); ?>

                <?php
                foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
                    $_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                    $product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );
                    $product_sku = $_product->get_sku();

                    if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
                        $product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
                        ?>
                        <tr class="woocommerce-cart-form__cart-item mb-5 <?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">

                            <td class="product-remove py-3 d-flex justify-content-end d-lg-table-cell">
                                <?php
                                    echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                                        'woocommerce_cart_item_remove_link',
                                        sprintf(
                                            '<a href="%s" class="remove align-self-center" aria-label="%s" data-product_id="%s" data-product_sku="%s">&times;</a>',
                                            esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
                                            esc_html__( 'Remove this item', 'woocommerce' ),
                                            esc_attr( $product_id ),
                                            esc_attr( $_product->get_sku() )
                                        ),
                                        $cart_item_key
                                    );
                                ?>
                            </td>

                            <td class="product-thumbnail py-3 d-flex align-items-center d-lg-table-cell">
                            <?php
                            $thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image( 'full' ), $cart_item, $cart_item_key );


                            if ( ! $product_permalink ) {
                                echo $thumbnail; // PHPCS: XSS ok.
                            } else {
                                printf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $thumbnail ); // PHPCS: XSS ok.
                            }
                            ?>
                            </td>

                            <td class="product-name py-3 py-3 d-flex align-items-center d-lg-table-cell justify-content-between" data-title="<?php esc_attr_e( 'Product', 'woocommerce' ); ?>">
                            <?php
                            if ( ! $product_permalink ) {
                                echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;' );
                            } else {
                                echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key ) );
                            }

                            do_action( 'woocommerce_after_cart_item_name', $cart_item, $cart_item_key );

                            // Meta data.
                            echo wc_get_formatted_cart_item_data( $cart_item ); // PHPCS: XSS ok.

                            // Backorder notification.
                            if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
                                echo wp_kses_post( apply_filters( 'woocommerce_cart_item_backorder_notification', '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'woocommerce' ) . '</p>', $product_id ) );
                            }
                            ?>
                            </td>

                            <td class="product-price fw-semibold py-3 py-3 d-flex align-items-center justify-content-between d-lg-table-cell" data-title="<?php esc_attr_e( 'Price', 'woocommerce' ); ?>">
                                <?php
                                    echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
                                ?>
                            </td>

                            <td class="product-quantity fw-semibold py-3 py-3 d-flex align-items-center justify-content-between d-lg-table-cell" data-title="<?php esc_attr_e( 'Quantity', 'woocommerce' ); ?>">
                                <?php
                                if ( $_product->is_sold_individually() ) {
                                    $min_quantity = 1;
                                    $max_quantity = 1;
                                } else {
                                    $min_quantity = 0;
                                    if($_product->get_max_purchase_quantity()==-1){
                                        $max_quantity = 9999999;
                                    }
                                    else{
                                        $max_quantity = $_product->get_max_purchase_quantity();
                                    }

                                }

                                $product_quantity = woocommerce_quantity_input(
                                    array(
                                        'input_name'   => "cart[{$cart_item_key}][qty]",
                                        'input_value'  => $cart_item['quantity'],
                                        'max_value'    => $max_quantity,
                                        'min_value'    => $min_quantity,
                                        'product_name' => $_product->get_name(),
                                        'step'         => 1, // Set the step to 1
                                    ),
                                    $_product,
                                    false
                                );
                                

                                $product_quantity = str_replace('<input', '<button type="button" class="quantity-button quantity-down-product-' . $product_sku .'">-</button><input', $product_quantity);
                                $product_quantity = str_replace('/>', '><button type="button" class="quantity-button quantity-up-product-' . $product_sku .'">+</button>', $product_quantity);

                                echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item ); // PHPCS: XSS ok.
                                ?>
                            </td>

                            <script>
                                jQuery(document).ready(function($) {
                                    // Handle increment button clicks
                                    var product_id = <?=json_encode($product_sku);?>;
                                    //var product_id = $(this).data('product-id');
                                    $(document).on('click', '.quantity-up-product-' + product_id, function(e) {
                                        // Get the quantity input field
                                        var input = $(this).prev();
                                        // Get the current quantity value
                                        var currentVal = +input.val();
                                        // Get the maximum quantity value
                                        var maxVal = +input.attr('max');
                                        // Increase the quantity value if it's less than the maximum
                                        if (currentVal < maxVal) {
                                            input.val(currentVal + 1).trigger('change');
                                        }
                                    });



                                    // Handle decrement button clicks
                                    $(document).on('click', '.quantity-down-product-' + product_id, function(e) {

                                        // Get the quantity input field
                                        var input = $(this).next();
                                        // Get the current quantity value
                                        var currentVal = +input.val();

                                        // Get the minimum quantity value
                                        var minVal = +input.attr('min');
  
                                        // Decrease the quantity value if it's greater than the minimum
                                        if (currentVal > minVal) {
                                            input.val(currentVal-1).trigger('change');
                                        }
                                    });


                                });
                            </script>
                            <td class="product-subtotal fw-semibold d-flex align-items-center justify-content-between d-lg-table-cell" data-title="<?php esc_attr_e( 'Subtotal', 'woocommerce' ); ?>">
                                <?php
                                    echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
                                ?>
                            </td>
                        </tr>
                        <?php
                    }
                }
                ?>

                <?php do_action( 'woocommerce_cart_contents' ); ?>

                <tr>
                    <td colspan="6" class="actions py-4">

                        <?php if ( wc_coupons_enabled() ) { ?>
                            <div class="coupon">
                                <label for="coupon_code" class="screen-reader-text"><?php esc_html_e( 'Coupon:', 'woocommerce' ); ?></label> <input type="text" name="coupon_code" class="input-text me-4" id="coupon_code" value="" placeholder="<?php esc_attr_e( 'Coupon code', 'woocommerce' ); ?>" /> <button type="submit" class="me-4 lemonmilk text-uppercase text-white fw-normal button<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?>" name="apply_coupon" value="<?php esc_attr_e( 'Apply coupon', 'woocommerce' ); ?>"><?php esc_attr_e( 'Apply coupon', 'woocommerce' ); ?></button>
                                <?php do_action( 'woocommerce_cart_coupon' ); ?>
                            </div>
                        <?php } ?>

                        <button type="submit" class="text-uppercase lemonmilk text-white fw-normal button<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?>" name="update_cart" value="<?php esc_attr_e( 'Update cart', 'woocommerce' ); ?>"><?php esc_html_e( 'Update cart', 'woocommerce' ); ?></button>

                        <?php do_action( 'woocommerce_cart_actions' ); ?>

                        <?php wp_nonce_field( 'woocommerce-cart', 'woocommerce-cart-nonce' ); ?>
                    </td>
                </tr>

                <?php do_action( 'woocommerce_after_cart_contents' ); ?>
            </tbody>
        </table>
        <?php do_action( 'woocommerce_after_cart_table' ); ?>
    </form>
    <?php do_action( 'woocommerce_before_cart_collaterals' ); ?>
    <div class="cart-collaterals">
        <?php
            /**
             * Cart collaterals hook.
             *
             * @hooked woocommerce_cross_sell_display
             * @hooked woocommerce_cart_totals - 10
             */
            do_action( 'woocommerce_cart_collaterals' );
        ?>
    </div>
    <?php do_action( 'woocommerce_after_cart' ); ?><?php do_action( 'woocommerce_after_cart' ); ?>
</div>







