<?php get_header(); ?>

<section class="top_part">

    <article class="anecdotes">
        <div>
            <?php
            $anecdote_args = [
                'post_type' => 'anecdote',
                'posts_per_page' => 1,
                'orderby' => 'rand'
            ];
            
            $anecdote = new WP_Query($anecdote_args);
            
            if($anecdote->have_posts()):while($anecdote->have_posts()):$anecdote->the_post();
            ?>
            <div class="entete">
                <h2 class="didyouknow">Le Saviez-vous ?</h2>
                <h3><?php the_title();?></h3>
            </div>
            <p><?php echo get_field('texte');?></p>
        <?php
            wp_reset_postdata();
            endwhile;endif;
        ?>
        </div>
    </article>

    <article class="presentation">
        <?php
            $presentation_args = [
                'post_type' => 'page',
                'pagename' => 'presentation'
            ];

            $presentation = new WP_Query($presentation_args);

            if($presentation->have_posts()):while($presentation->have_posts()):$presentation->the_post();
            ?>
                <?php the_content();?>
            <?php
            wp_reset_postdata();
            endwhile;endif;
        ?>
    </article>
</section>

<section class="bottom_part">
    <?php
        // Afin d'afficher mes catégories, je les récupère via get_terms
        // je rajoute comme paramètre le type que je veux récupérer 'category'
        // je précise que je veux toutes les catégories, même vide, via 'hide_empty' = 0 (0 signifiant même vide)
        $categories = get_terms('category', ['hide_empty' => 0]);
        // var_dump($categories);

        // Je fais une boucle
        // Pour chaque itération category de categories
        foreach($categories as $category) {
            // Je récupère les différents éléments que je veux afficher
            // Je récupère certains éléments dans des variables pour les injecter plus facilement dans le code
            $image = get_field('image', $category);
            $icone = get_field('icone', $category);
            echo '<article style="background-image: url(' . $image . ')">';
            echo '<h2>' . get_cat_name($category->term_id) . '</h2>';
            echo category_description($category->term_id);
            echo '<a href="' . get_category_link($category->term_id) . '" class="home_button"> ' . $icone . '</a>';
            echo '</article>';
        }
    ?>

</section>

<?php get_footer(); ?>