<?php
/*
Template name: Connexion
*/
$error = false;

if(!empty($_POST)) {
    if($_POST['user_pass'] != $_POST['user_pass2']) {
        $error = 'Les 2 mots de passe ne correspondent pas.';
    } else {
        if(!is_email($_POST['user_email'])) {
            $error = ' Veuillez entrer un email valide.';
        } else {
            $user = wp_insert_user(array(
                'user_login'        => $_POST['user_login'],
                'user_pass'         => $_POST['user_pass'],
                'user_email'        => $_POST['user_email'],
                'user_registered'   => date('Y-m-d H:i:s')
            ));
            if(is_wp_error($user)) {
                $error = $user->get_error_message();
            } else {
                $msg = 'Vous êtes maintenant inscrit.';
                $headers = 'FROM: '.get_option('admin_email')."\r\n";
                wp_mail($_POST['user_email'], 'Inscription réussie', $msg, $headers);
                $_POST = array();
                wp_signon($user);
                header('location:profil');
            }
        }
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

            <label for="user_login">Votre login</label>
            <input type="text" class="text" value="<?php echo isset($_POST['user_login']) ? $_POST['user_login'] : ''; ?>" name="user_login" id="user_login">

            <label for="user_email">Votre email</label>
            <input type="email" class="text" value="<?php echo isset($_POST['user_email']) ? $_POST['user_email'] : ''; ?>" name="user_email" id="user_email">

            <label for="user_pass">Votre mot de passe</label>
            <input type="password" class="text" name="user_pass" id="user_pass">

            <label for="user_pass2">Confirmer otre mot de passe</label>
            <input type="password" class="text" name="user_pass2" id="user_pass2">

            <input type="checkbox" name="remember" id="remember" value="1">
            <label for="remember">Se souvenir de moi</label>

            <input type="submit" value="Se connecter">
        </form>

    </article>
</section>

<?php get_footer(); ?>