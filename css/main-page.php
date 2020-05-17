<?php
/*
Template Name: Главная страница
*/
?>
<?php get_header(); ?>
<main>
    <!-- first slider -->
    <section id="first__slider">
        <div class="conteiner m-auto">
            <div class="first__slider">
                <?php $array = carbon_get_theme_option('slider');
                foreach ($array as $slide) : ?>
                    <div class="slider__item">
                        <img data-lazy="<?php echo $slide['slide_main'] ?>" alt="Продукты на дом">
                        <div class="slider__item-description">
                            <h1>
                                <?php echo $slide['text_slide'] ?>
                            </h1>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <!-- sale product -->
    <section id="sale__product">
        <h2>Акция</h2>
        <div class="conteiner m-auto">
            <div class="sale__product-slider">
                <?php
                $product_ids_on_sale = wc_get_product_ids_on_sale();

                $args = array(
                    'post_type' => 'product',
                    'post__in' => array_merge(array(0), $product_ids_on_sale),
                    'posts_per_page' => 10,
                );
                $loop = new WP_Query($args);
                while ($loop->have_posts()) :
                    $loop->the_post();
                    global $product;
                ?>
                    <a href="<?php echo get_permalink($product->get_id()) ?>">
                        <div class="sale__product-card">
                            <div class="card__img">
                                <img data-lazy="<?php
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
                                            <span><?php echo $product->get_sale_price(); ?></span>₽
                                        </p>
                                    </div>
                                    <div class="current__price">
                                        <p>
                                            <span><?php echo $product->get_regular_price(); ?></span>₽
                                        </p>
                                    </div>
                                </div>
                                <div class="addToCart">
                                    <div class="itemOfGoods">
                                        <p>
                                            <?php echo wc_attribute_label('pa_attr') ?><span><?php echo $product->get_attribute('attr') ?></span>
                                        </p>
                                    </div>
                                    <?php woocommerce_template_loop_add_to_cart() ?>
                                </div>
                            </div>
                        </div>
                    </a>
                <?php endwhile; ?>
            </div>
        </div>
    </section>
    <!-- Category ptoduct -->
    <section id="category__ptofuct">
        <h2>Категории товаров</h2>
        <div class="conteiner m-auto">
            <div class="category__ptofuct-content">
                <div class="category__items">
                    <?php $categories = get_terms([
                        'taxonomy'   => 'product_cat',
                        'hide_empty' => false,
                        'parent'     => 0,
                    ]);
                    //pr($categories);
                    foreach ($categories as $category) :
                        $meta = get_term_meta($category->term_id, 'thumbnail_id', true);
                        $url          = wp_get_attachment_url($meta);
                    ?>
                        <a href="<?php echo get_category_link($category->term_id) ?>">
                            <div class="item">
                                <img src="<?php echo $url ?>" alt="Категории товаров в магазине корзинка">
                                <div class="category__description">
                                    <h3>
                                        <?php echo $category->name ?>
                                    </h3>
                                </div>
                            </div>
                        </a>
                    <?php endforeach; ?>
                    <a href="#modal" data-uk-modal>
                        <div class="item last__item">

                            <div class="category__description">
                                <h3>
                                    Не нашли то, что искали?
                                </h3>
                                <p>
                                    Сообщите нам, мы
                                    стараемся расширять<br>
                                    свой ассортимент!
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- reviews -->
    <section id="reviews">
        <h2>Отзывы покупателей</h2>
        <div class="conteiner m-auto">
            <div class="review__items">
                <?php $comments = get_comments([
                    'post_id' => '',
                    'status'  => 'approve',
                    'number'  => 8,
                ]);
                if ($comments) :
                    foreach ($comments as $comment) : ?>
                        <div class="review_item">
                            <div class="review__data">
                                <span><?php echo date('d m Y года', strtotime($comment->comment_date)) ?></span>
                            </div>
                            <div class="review__name">
                                <span><?php echo $comment->comment_author ?></span>
                            </div>
                            <div class="review__text">
                                <p>
                                    <?php echo wp_trim_words($comment->comment_content, 20) ?>
                                </p>
                            </div>
                        </div>
                <?php endforeach;
                endif;
                ?>
            </div>
    </section>
</main>
<?php get_footer(); ?>