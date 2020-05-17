<footer id="footer">
    <div class="conteiner m-auto">
        <div class="footer__menu">
            <nav class="footer__nav">
                <?php
                wp_nav_menu([
                    'theme_location' => 'header',
                    'container'      => false,
                    'items_wrap'     => '<ul>%3$s</ul>',
                    'menu_class'     => '',
                ]);

                ?>
            </nav>
        </div>
        <div class="footer__contacts">
            <div class="footer__subscribe">
                <p>Вы можете подписаться на рассылку выгодных предложений от нашего магазина:</p>
                <?php echo do_shortcode('[mailpoet_form id="1"]') ?>
            </div>
            <div class="footer__about">
                <div class="phone">
                    <p>Телефон:</p>
                    <a href="tel:<?php echo carbon_get_theme_option('tel1') ?>"><?php echo carbon_get_theme_option('tel1') ?></a>
                </div>
                <div class="operating__mode">
                    <p>Режим работы:</p>
                    <p>с <?php echo carbon_get_theme_option('open') ?> до <?php echo carbon_get_theme_option('close') ?><br>
                        ежедневно</p>
                </div>
            </div>
        </div>
    </div>
    <div class="footer__signature conteiner m-auto">
        <p>
            Copyright © <?php echo date('Y'); ?> Корзинка
        </p>
    </div>
</footer>
<?php wp_footer(); ?>

<div id="modal" class="uk-modal">
    <div class="uk-modal-dialog">
        <a class="uk-modal-close uk-close"></a>
        <div class="modal-body">
            <?php echo do_shortcode(' [contact-form-7 id="119" title="Модальное окно"]'); ?>
        </div>
    </div>
</div>

</body>

</html>