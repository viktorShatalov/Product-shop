<?php
/*
Template Name: Простые страницы
*/

get_header();
echo '<main>
<div class="conteiner m-auto">
<div class="content__otherPage">';
while ( have_posts() ) {
	the_post();
	the_content();
}
echo '</main>
</div>
</div>';
get_footer();