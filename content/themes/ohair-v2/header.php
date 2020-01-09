<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>o'Hair</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <!-- <link rel="stylesheet" href="public/css/vendor.css">
  <link rel="stylesheet" href="public/css/app.css">
  <script src="public/js/vendor.js"></script>
  <script src="public/js/app.js"></script> -->
  <?php wp_head();?>
</head>
<body>
  <!-- WRAPPER -->
  <div class="wrapper">

    <!-- HEADER -->

    <?php
      $banner_args = [
        'post_type' => 'page',
        'pagename' => 'banner'
      ];

      $banner = new WP_Query($banner_args);

      if($banner->have_posts()):while($banner->have_posts()): $banner->the_post();
    ?>
    
    <header style="background-image: url('<?php the_post_thumbnail_url(); ?>')">

      <div class="translucid">

        <!-- MENU -->
        <section class="menu">

          <article class="navigation">
              <a href="<?php bloginfo('url'); ?>"><i class="fas fa-home"></i></a>
              <a href="#"><i class="fas fa-ellipsis-h ui-button"></i></a>
          </article>

          <article class="connexion">
            <?php 

              // Récupérer les informations de l'utilisateur
              $user = wp_get_current_user();
              // var_dump($user);

              // Si l'utilisateur n'est pas connecté
              if ($user->ID==0): ?>

                <!-- On affiche le lien l'icone de connexion -->
                <a href="<?php echo bloginfo('url'); ?>/login"><i class="fas fa-sign-in-alt"></i></a>

                <!-- On affiche l'icone d'inscription -->
                <a href="<?php echo bloginfo('url'); ?>/register"><i class="fas fa-user-plus"></i></a>

              <!-- Si l'utilisateur connecté est un administrateur (je vérifie dans les rôles, car il peut avoir plusieurs rôles) -->
              <?php elseif (in_array("administrator", $user->roles)): ?>

                <!-- On affiche l'icône' vers le back-office -->
                <a href="<?php echo bloginfo('url'); ?>/wp-admin"><i class="fas fa-tools"></i></a>

                <!-- On affiche l'icône' vers le profil -->
                <a href="<?php echo bloginfo('url'); ?>/profil"><i class="fas fa-user"></i></a>

                <!-- On affiche l'icone de déconnexion -->
                <a href="<?php echo bloginfo('url'); ?>/logout"><i class="fas fa-sign-out-alt"></i></a>

              <!-- Pour tous les autres utilisateurs -->
              <?php else: ?>
                <!-- On affiche l'icône' vers le profil -->
                <a href="<?php echo bloginfo('url'); ?>/profil"><i class="fas fa-user"></i></a>

                <!-- On affiche l'icone de déconnexion -->
                <a href="<?php echo bloginfo('url'); ?>/logout"><i class="fas fa-sign-out-alt"></i></a>

              <?php endif; ?> 

          </article>

        </section>

        <!-- BANNER -->
          <section class="banner">
            <h1><?php the_title();?></h1>
            <p><?php the_content();?></p>
          </section>
      </div>

    </header>

    <?php
      wp_reset_postdata();
      endwhile; endif;
    ?>

    <main>

    <div class="breadcrumb">Vous êtes ici > <?php ohair_breadcrumb(); ?></div>