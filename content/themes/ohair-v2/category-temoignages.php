<?php get_header(); ?>

<section class="presentation">
    <h2>Bienvenue Sur la page des témoignages</h2>
    <p>C'est dans cet espace que vous pourrez lire les témoignages de toutes les personnes ayant eu recours à O'hair.</p>
    <p>N'hésitez pas à partager l'aventure humaine que vous avez vécue grâce à O'hair, cela nous fait toujours plaisir.</p>
    </section>

<section class="articles">
    <?php
        $temoignages_args = [
            'category_name' => 'temoignages',
            'posts_per_page' => 18,
        ];

        $temoignage = new WP_Query($temoignages_args);

        if($temoignage->have_posts()):while($temoignage->have_posts()):$temoignage->the_post();
    ?>
        <article>
            <img src="<?php the_post_thumbnail_url();?>" alt="">
            <a href="<?php the_permalink();?>" class="read_more">Le témoignage de Laure</a>
        </article>

    <?php
        wp_reset_postdata();
        endwhile;endif;
    ?>
</section>
<?php get_footer(); ?>