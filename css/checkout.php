<?php
/*
Template Name: Офрмление заказа
*/

get_header(); ?>
    <style>
        .woocommerce{
            background: none;
        }
        .optional{
            display: none;
        }
        .woocommerce-form__label{
            display: none;
        }
    </style>
<main>
	<section id="ordering" class="cart">
		<div class="conteiner m-auto">
			<div class="back__to">
				<a href="/cart/">Назад к корзине</a>
			</div>
<!--			<div class="head">-->
<!--				<h1>-->
<!--					Доставка-->
<!--				</h1>-->
<!--			</div>-->
			<div class="step__name-dreadcumbs">
				<ul>
					<li>
						<a href="/cart/">Корзина</a>
					</li>
					<li>
						<a href="#">Оплата</a>
					</li>
					<li>
						<a href="#">Спасибо!</a>
					</li>
			</div>
<?php
while (have_posts()){
	the_post();
	the_content();
}
?>
			<div class="back__to m-top">
				<a href="/cart/">Назад к корзине</a>
			</div>
		</div></section></main>
<?php
get_footer();