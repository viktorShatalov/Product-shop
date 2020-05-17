<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

    <?php wp_head(); ?>
</head>


<header id="header">
    <div class="top__row">
        <div class="conteiner m-auto">
            <div class="logo">
                <a href="/">
                    <img src="<?php echo carbon_get_theme_option('kor_logo') ?>" alt="Логотип Магазина 'Карзинка'">
                </a>
                <div class="burger"><span></span></div>
            </div>
            <nav class="menu__items">
                <?php
                wp_nav_menu([
                    'theme_location' => 'header',
                    'container'      => false,
                    'items_wrap'     => '<ul>%3$s</ul>',
                    'menu_class'     => '',
                ]);

                ?>
                <div class="mobile__content">
                    <a class="category__link" href="http://korzinka11.ru/catalog/">Каталог</a>
                    <div class="mobile__content-description">
                        <div class="free_shipping">
                            <p>
                                У нас бесплатная доставка!<br>
                                <span>от 2000 руб.</span>
                            </p>
                        </div>
                        <div class="contacts__phone">
                            <a href="tel:<?php echo carbon_get_theme_option('tel1') ?>"><?php echo carbon_get_theme_option('tel1') ?></a>
                            <p>
                                с 9:00 до 22:00<br>
                                ежедневно
                            </p>
                        </div>
                    </div>
                    <div class="close-menu">
                        <p>Закрыть меню</p>
                    </div>
                </div>
            </nav>
            <div class="cabinet">
                <a href="/my-account/">
                    <img src="<?php echo get_template_directory_uri() ?>/assets/img/icon/noun_personal.png" alt="personal icon">
                    <span>Личный кабинет</span>
                </a>
            </div>
        </div>
    </div>
    <div class="bottom__row">
        <div class="conteiner m-auto">
            <div class="catalog__menu">
                <span class="burger__catalog">
                    <span></span>
                </span>
                <a class="category__link " href="/catalog/">Каталог товаров</a>
                <div class="category">
                    <div class="category__box-menu">
                        <ul class="category__menu-items">
                            <?php $categories = get_terms([
                                'taxonomy'   => 'product_cat',
                                'hide_empty' => false,
                                'parent'     => 0,
                            ]);
                            //pr($categories);
                            $i = 0;
                            foreach ($categories as $category) :
                                $i++;
                                $meta = get_term_meta($category->term_id, 'thumbnail_id', true);
                                $url  = wp_get_attachment_url($meta);
                            ?>
                                <li data-filter=".item<?php echo $i ?>"><a href="<?php echo get_category_link($category->term_id) ?>"><?php echo $category->name ?></a>
                                </li>
                            <?php
                            endforeach; ?>
                        </ul>
                        <div class="box__sub-menu">
                            <?php
                            $i = 0;
                            foreach ($categories as $category) :
                                $i++; ?>
                                <div class="category__sub-menu item<?php echo $i ?>">
                                    <h3>
                                        <?php echo $category->name ?>
                                    </h3>
                                    <ul>
                                        <?php $cat_child = get_terms([
                                            'taxonomy'   => 'product_cat',
                                            'hide_empty' => false,
                                            'child_of'     => $category->term_id,
                                        ]);
                                        foreach ($cat_child as $cat) : ?>
                                            <li><a href="<?php echo get_category_link($cat->term_id) ?>"><?php echo $cat->name ?></a></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <!-- <div class="category__description">
                        <p>
                            Если вы не нашли то, что искали, можете обратиться по телефону, мы уверены в том, что сможем
                            вам помочь
                        </p>
                    </div> -->
                </div>
            </div>
            <div class="search">
                <?php get_search_form(); ?>
            </div>
            <div class="free_shipping">
                <p>
                    У нас бесплатная доставка!<br>
                    <span>от 2000 руб.</span>
                </p>
            </div>
            <div class="contacts__phone">
                <a href="tel:<?php echo carbon_get_theme_option('tel1') ?>"><?php echo carbon_get_theme_option('tel1') ?></a>
            </div>
            <div id="cart" class="cart"><a href="<?php
                                                    global $woocommerce;
                                                    echo $woocommerce->cart->get_cart_url() ?>">
                    <button class="cart__btn">
                        <img src="<?php echo get_template_directory_uri() ?>/assets/img/icon/noun_cart.png" alt="cart">
                        <span class="basket-btn__counter"><?php
                                                            global $woocommerce;
                                                            sprintf($woocommerce->cart->cart_contents_count) ?></span>
                    </button>

                    Корзина
                </a>
            </div>
        </div>
    </div>
</header>