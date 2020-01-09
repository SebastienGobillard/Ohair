<?php get_header(); ?>

<section class="presentation">
    <h2>Bienvenue dans l'annuaire</h2>
    <p>Ici, vous trouverez tous les prestataires enregistrés sur le site et prêts à être contactés.</p>
    <p>Vous pouvez affiner la recherche avec les filtres ci-dessous :</p>
    <ul>
        <li>Département : <input type="number" name="departement" id="departement" min="00" max="95">
        <li><label for="coiffeur"><input type="radio" name="profession" id="coiffeur">Coiffeur</label></li>
        <li><label for="perruquier"><input type="radio" name="profession" id="perruquier">Perruquier</label></li>
        <li><label for="association"><input type="radio" name="profession" id="association">Association</label></li>
    </ul>
</section>

<section class="fiches">
    <?php
        $profession = null;
        $departement = null;

        $annuaire_args = [
            'post_type' => 'annuaire',
            'orderby'   => 'title',
            'order' => 'ASC',
            'posts_per_page' => 12,
        ];

        $annuaire = new WP_Query($annuaire_args);

        if($annuaire->have_posts()):while($annuaire->have_posts()): $annuaire->the_post();
    ?>
        <article>
            <h3><?php the_title(); ?> - <?php echo get_field('departement');?> - <?php echo get_field('profession');?></h3>
            <p>Siret : <?php echo get_field('siret');?></p>
            <p>Adresse : <?php echo get_field('adresse');?> - <?php echo get_field('code_postal');?> <?php echo get_field('ville');?></p>
            <p>Contact : <?php echo get_field('telephone');?> - <?php echo get_field('email');?></p>
            <p>Site web : <?php echo get_field('site_internet');?></p>

        </article>
    <?php
    wp_reset_postdata();
    endwhile;endif;
    ?>
</section>

<?php get_footer(); ?>