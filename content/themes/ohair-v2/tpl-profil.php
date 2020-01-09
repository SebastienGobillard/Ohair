<?php
/*
Template name: Profil
*/
// Je rcupère les informations de l'utilisateur
$user = wp_get_current_user();
// print_r($user);
// Si l'ID de l'utilisateur est égale à 0 (non connecté)
if($user->ID == 0){
    // Je le redirige vers la page de login
    header('location:login');
}
?>

<?php get_header(); ?>

<section class="connexion">
    <article>
        
        <h2>Salut <?php echo $user->user_login; ?></h2>

    </article>
</section>

<?php get_footer(); ?>