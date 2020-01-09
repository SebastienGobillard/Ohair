<?php get_header(); ?>

<section class="single">

    <?php if(have_posts()):while(have_posts()):the_post(); ?>

        <article>
            <h2><?php the_title(); ?></h2>
            <div class="info">
                <p>Posté le <span><?php the_date();?></span> dans <span><?php the_category(', ');?></span> par <span><?php the_author(); ?></span>.</p>
            </div>
            <div class="illustration" style="background-image: url('<?php the_post_thumbnail_url();?>')">
            </div>
            <div class="contenu">
                <?php the_content();?>
            </div>
            <div class="info_bis">
                <p>Posté dans <span><?php the_category(', ');?></span> par <span><?php the_author(); ?></span>.</p>
            </div>

            <div class="commentaires">
                <?php comments_template(); ?>
            </div>
        </article>

    <?php
        wp_reset_postdata();
        endwhile;endif;
    ?>
</section>


<?php get_footer(); ?>