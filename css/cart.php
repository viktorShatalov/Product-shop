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
 * @package WooCommerce/Templates
 * @version 3.8.0
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_cart' ); ?>
    <main>
        <section id="cart">
            <div class="conteiner m-auto">
                <div class="back__to">
                    <a href="/shop/">Продолжить покупки</a>
                </div>
                <div class="head">
                    <h1>
                        Корзина
                    </h1>
                    <a href="#">Распечатать страницу</a>
                </div>
                <div class="step__name-dreadcumbs">
                    <ul>
                        <li>
                            <a href="#">Корзина</a>
                        </li>
                        <li>
                            <a href="#">Оплата</a>
                        </li>
                        <li>
                            <a href="#">Спасибо!</a>
                        </li>
                </div>

                <form class="woocommerce-cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
                    <div class="cart__content">
						<?php do_action( 'woocommerce_before_cart_table' ); ?>
                        <div class="cart__items">
                            <!--                            <table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents"-->
                            <!--                                   cellspacing="0">-->
                            <!--                                <thead>-->
                            <!--                                <tr>-->
                            <!--                                    <th class="product-remove">&nbsp;</th>-->
                            <!--                                    <th class="product-thumbnail">&nbsp;</th>-->
                            <!--                                    <th class="product-name">-->
							<?php //esc_html_e( 'Product', 'woocommerce' ); ?><!--</th>-->
                            <!--                                    <th class="product-price">-->
							<?php //esc_html_e( 'Price', 'woocommerce' ); ?><!--</th>-->
                            <!--                                    <th class="product-quantity">-->
							<?php //esc_html_e( 'Quantity', 'woocommerce' ); ?><!--</th>-->
                            <!--                                    <th class="product-subtotal">-->
							<?php //esc_html_e( 'Subtotal', 'woocommerce' ); ?><!--</th>-->
                            <!--                                </tr>-->
                            <!--                                </thead>-->
                            <!--                                <tbody>-->
							<?php do_action( 'woocommerce_before_cart_contents' ); ?>

							<?php
							foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
							$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
							$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

							if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
							$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
							?>
                            <div class="<?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">
                                <div class="cart_item-box">

                                    <div class="product-remove">
										<?php
										echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
											'woocommerce_cart_item_remove_link',
											sprintf(
												'<a href="%s" class="remove" aria-label="%s" data-product_id="%s" data-product_sku="%s">&times;</a>',
												esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
												esc_html__( 'Remove this item', 'woocommerce' ),
												esc_attr( $product_id ),
												esc_attr( $_product->get_sku() )
											),
											$cart_item_key
										);
										?>
                                    </div>

                                    <div class="product-thumbnail">
										<?php
										$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );

										if ( ! $product_permalink ) {
											echo $thumbnail; // PHPCS: XSS ok.
										} else {
											printf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $thumbnail ); // PHPCS: XSS ok.
										}
										?>
                                    </div>
                                </div>
                                <div class="cart_item-box">
                                    <div class="product-name"
                                         data-title="<?php esc_attr_e( 'Product', 'woocommerce' ); ?>">
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
                                    </div>
                                    <div>
                                        <div class="itemOfGoods">
                                            <p>Артикул <span>25390687</span></p>
                                        </div>
                                        <div class="weigth">
                                            <p>Вес: <span>75 г</span></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="cart_item-box">
                                    <div class="product-price"
                                         data-title="<?php esc_attr_e( 'Price', 'woocommerce' ); ?>">
										<?php
										echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
										?>
                                    </div>


                                    <div class="product-subtotal"
                                         data-title="<?php esc_attr_e( 'Subtotal', 'woocommerce' ); ?>">
										<?php
										echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
										?>
                                    </div>

                                    <div class="product-quantity"
                                         data-title="<?php esc_attr_e( 'Quantity', 'woocommerce' ); ?>">
                                         <!-- <input type="submit" id="quantity-arrow-minus" value="-"></input> -->
										<?php
										if ( $_product->is_sold_individually() ) {
											$product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
										} else {
											$product_quantity = woocommerce_quantity_input(
												array(
													'input_name'   => "cart[{$cart_item_key}][qty]",
													'input_value'  => $cart_item['quantity'],
													'max_value'    => $_product->get_max_purchase_quantity(),
													'min_value'    => '0',
													'product_name' => $_product->get_name(),
												),
												$_product,
												false
											);
										}

										echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item ); // PHPCS: XSS ok.
										?>
                                         <!-- <input type="submit" id="quantity-arrow-plus" value="+"></input> -->
                                    </div>
                                </div>
								<?php
								}

								?>
                                <!--                                </tbody>-->
                                <!--                                </table>-->
                            </div>
                            <?php } ?>
                        </div>


                            <div class="add__coupon">
								<?php if ( wc_coupons_enabled() ) { ?>
                                    <div class="coupon__description">
                                        <label for="coupon_code-label" for="coupon_code">Промокод</label>
                                        <div class="coupon__action">
                                            <input type="text" name="coupon_code" class="input-text" id="coupon_code"
                                                   value=""
                                                   placeholder="<?php esc_attr_e( 'Coupon code', 'woocommerce' ); ?>"/>
                                            <button type="submit" class="button" name="apply_coupon"
                                                    value="<?php esc_attr_e( 'Apply coupon', 'woocommerce' ); ?>">
                                                Применить
                                            </button>
											<?php do_action( 'woocommerce_cart_coupon' ); ?>
                                        </div>
                                    </div>
								<?php } ?>
                                <div class="order-total">
                                    <div class="total-box">
                                        <p>
                                            Итого:
                                        </p>
                                        <span>
                  <strong>
                    <span class="amount"><?php wc_cart_totals_order_total_html(); ?></span>
                  </strong>
                </span>
                                    </div>
                                    <div class="order-total_description">
                                        <p>
                                            Общая стоимость,<br> без учёта доставки
                                        </p>
                                    </div>
                                    <div class="wc-proceed-to-checkout">
										<?php do_action( 'woocommerce_proceed_to_checkout' ); ?>
                                    </div>
                                </div>
                            </div>
							<?php do_action( 'woocommerce_after_cart_table' ); ?>
							<?php do_action( 'woocommerce_cart_contents' ); ?>
                            <button style="display: none;" type="submit" class="button" name="update_cart"
                                    value="<?php esc_attr_e( 'Update cart', 'woocommerce' ); ?>"><?php esc_html_e( 'Update cart', 'woocommerce' ); ?></button>
							<?php do_action( 'woocommerce_cart_actions' ); ?>
							<?php wp_nonce_field( 'woocommerce-cart', 'woocommerce-cart-nonce' ); ?>
							<?php do_action( 'woocommerce_after_cart_contents' ); ?>
                        </div>
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
                <div class="back__to m-top">
                    <a href="/shop/">Продолжить покупки</a>
                </div>
            </div>
        </section>
    </main>
<?php do_action( 'woocommerce_after_cart' );

add_action( 'woocommerce_cart_collaterals', 'aroma_cart_totals', 10 );
function aroma_cart_totals() {
	if ( is_checkout() ) {
		return;
	}
	wc_get_template( 'cart/aroma-cart-totals.php' );

}

add_action( 'wp_footer', 'aroma_update_cart', 10 );
function aroma_update_cart() {
	// Проверяем, что это страница корзины.
	if ( ! is_cart() ) {
		return;
	}

	?>
    <script>
        jQuery(function ($) {
            var delay;

            // Вешаем "слушателя".
            $('.woocommerce').on('change', 'input.qty', function () {

                if (undefined !== delay) {
                    clearTimeout(delay);
                }

                // Делаем задержку в полсекунды, чтобы не генерить
                // лишние запросы на сервер.
                delay = setTimeout(
                    function () {
                        // Кликаем на кпоку обновления корзины.
                        $('[name="update_cart"]').trigger('click');
                    },
                    500
                );

            });
        });
    </script>

	<?php
}