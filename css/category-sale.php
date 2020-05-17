<?php
get_header(); ?>
<main>
    <div class="conteiner m-auto">
        <div class="content__otherPage">
            <div>
                <h1>Акции</h1>
            </div>
            <div id="sale">
                <div class="product__items">
                    <ul>
                        <?php
                        $product_ids_on_sale = wc_get_product_ids_on_sale();

                        $args = array(
                            'post_type'      => 'product',
                            'post__in'       => array_merge(array(0), $product_ids_on_sale),
                            'posts_per_page' => 50,
                        );
                        $loop = new WP_Query($args);
                        while ($loop->have_posts()) :
                            $loop->the_post();
                            global $product;
                        ?>
                            <li>
                                <a href="<?php echo get_permalink($product->get_id()) ?>">
                                    <div class="sale__product-card">
                                        <div class="card__img">
                                            <img src="<?php
                                                        $img_id  = get_post_thumbnail_id();
                                                        $img_url = wp_get_attachment_url($img_id);
                                                        echo $img_url;
                                                        ?>" alt="ТОвары со скидкой">
                                        </div>
                                        <div class="card__name">
                                            <h3>
                                                <?php echo $product->get_name(); ?>
                                            </h3>
                                        </div>
                                        <div class="card__footer">
                                            <div>
                                                <div class="strikeout__price">
                                                    <p>
                                                        <span><?php echo $product->get_regular_price(); ?></span>₽
                                                    </p>
                                                </div>
                                                <div class="current__price">
                                                    <p>
                                                        <span><?php echo $product->get_sale_price(); ?></span>₽
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="addToCart">
                                                <div class="itemOfGoods">
                                                    <p>
                                                        <?php echo wc_attribute_label('pa_attr') ?>
                                                        <span><?php echo $product->get_attribute('attr') ?></span>
                                                    </p>
                                                </div>
                                                <?php woocommerce_template_loop_add_to_cart() ?>
                                            </div>
                                        </div>
                                    </div>
                                </a>

                            </li>
                        <?php endwhile; ?>
                    </ul>
                </div>
            </div>
</main>
</div>
</div>
<?php
get_footer();
