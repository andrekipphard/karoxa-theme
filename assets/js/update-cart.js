jQuery(document).ready(function(){
    jQuery('.woocommerce-cart').find('button[name="update_cart"]').prop('disabled', false);

    jQuery('body').on('updated_cart_totals', function() {
        jQuery('.woocommerce-cart').find('button[name="update_cart"]').prop('disabled', false);

    })
});