<?php
/*
* Template Name: Акции
* Template post type: post
*/

get_header(); ?>
<main>
	<div class="conteiner m-auto">
		<div class="content__otherPage">
			<?php
			while (have_posts()) : the_post(); ?>
				<div class="sale_cat_item">
					<div class="sale_head">
						<h3><?php echo the_title() ?></h3>
					</div>
					<div class="sale_content" sty>
						<div class="sale_img" style="float: left;">
							<?php echo get_the_post_thumbnail($post->ID, 'thumbnail'); ?>
						</div>
						<div class="sale_text">
							<?php echo the_content() ?>
						</div>
					</div>
				</div>
			<?php endwhile; ?>
</main>
</div>
</div>
<?php
get_footer();
