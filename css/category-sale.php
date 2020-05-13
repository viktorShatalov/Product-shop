<?php
get_header(); ?>
<main>
    <div class="conteiner m-auto">
        <div class="content__otherPage">
            <div>
                <h1>Акции</h1>
            </div>
            <div class="sale__items">
                <?php
                global $post;
                $cat   = get_queried_object();
                $posts = get_posts("category=$cat->term_id&orderby=date&numberposts=20");
                if ($posts) {
                    foreach ($posts as $post) {
                        setup_postdata($post); ?>
                        <a href="<?php echo get_permalink() ?>">
                            <div class="sale_cat">
                                <div class="sale_head">
                                    <h3><?php echo $post->post_title ?></h3>
                                    <?php echo get_the_post_thumbnail($post->ID); ?>
                                </div>
                            </div>
                        </a>

                <?php }
                    wp_reset_postdata();
                } ?>
            </div>
</main>
</div>
</div>
<?php
get_footer();
