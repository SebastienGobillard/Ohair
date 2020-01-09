<?php get_header(); ?>

<section class="presentation">
    <h2>Bienvenue Sur le blog</h2>
    <p>C'est le temple du potin, du bavardage, des conseils et d'autres sujets aussi divers que variés !</p>
    <p>Vous pouvez affiner la recherche avec les étiquettes ci-dessous :</p>
</section>

<section class="articles">
    <?php
        $articles_args = [
            'category_name' => 'blog',
            'posts_per_page' => 12,
        ];

        $article = new WP_Query($articles_args);

        if($article->have_posts()):while($article->have_posts()):$article->the_post();
    ?>
        <article style="background-image:url('<?php the_post_thumbnail_url();?>">
            <div class="transparent">
                <h3><?php the_title();?></h3>
                <p><?php the_excerpt();?></p>
                <a href="<?php the_permalink();?>" class="read_more">Lire la suite</a>
            </div>
        </article>

    <?php
        wp_reset_postdata();
        endwhile;endif;
    ?>
</section>
<?php get_footer(); ?>