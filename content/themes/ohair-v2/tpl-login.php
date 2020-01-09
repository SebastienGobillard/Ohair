<?php
/*
Template name: Connexion
*/

// Par défaut on définit le message d'erreur à false
$error = false;
// si le contenu de $_POST n'est pas vide, on traite la demande de connexion
if (!empty($_POST)) {
    // On récupère les infos de connexion dans $_POST via la fonction wp_signon()
    $user = wp_signon($_POST);

    // S'il y a une error, on affiche un message pour l'utilisateur
    if (is_wp_error($user)) {
        $error = $user->get_error_message();
    } else {
        header('location:profil');
    }
} else {
    $user = wp_get_current_user();
    // Si l'ID utilisateur est différent de 0 (connecté)
    if($user->ID !== 0){
        // Je le redirige vers la page de profil
        header('location:profil');
    }
}

?>

<?php get_header(); ?>

<section class="connexion">
    <article>
        <h2>Se Connecter</h2>

        <div class="error">
            <?php echo $error; ?>
        </div>

        <form action="<?php echo $_SERVER['REQUEST_URI'];?>" method="post">

            <div class="login">
                <label for="user_login">Votre login</label>
                <input type="text" class="text" name="user_login" id="user_login">
            </div>
            <div class="password">
                <label for="user_password">Votre mot de passe</label>
                <input type="password" class="text" name="user_password" id="user_password">
            </div>
            <div>
                <input type="checkbox" name="remember" id="remember" value="1">
                <label for="remember">Se souvenir de moi</label>
            </div>
            <div>
                <input type="submit" value="Se connecter" class="submit">
            </div>

            <div class="register">
                <p>Pas encore inscrit(e) ?</p>
                <a href="<?php echo bloginfo('url');?>/register" class="submit">S'enregistrer</a>
            </div>

        </form>

    </article>
</section>

<?php get_footer(); ?>