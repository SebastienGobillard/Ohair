<?php 
require('inc/theme-enqueue.php');
require('inc/theme-setup.php');

// *****

// Génération d'un fil d'ariane
function ohair_breadcrumb(){
  // On l'applique à tous les $post
  global $post;
      
    // Breadcrumb navigation

    // Si c'est une page MAIS PAS la front-page OU un article OU une categorie
    if (is_page() && !is_front_page() || is_single() || is_category()) {

      // On rajoute par défaut le lien vers la page d'accueil
      echo '<a title="Accueil" rel="nofollow" href="'.get_option('home').'">Accueil</a>';

      // Si c'est une page
      if (is_page()) {
        // On récupère les pages précédentes du chemin pour arriver à cette page
        $ancestors = get_post_ancestors($post);

        // S'il y a des "ancêtres"
        if ($ancestors) {

          // On les énumère dans l'ordre inverse
          $ancestors = array_reverse($ancestors);

          // Pour chaque "ancêtre" en tant que "miette de pain"
          foreach ($ancestors as $crumb) {
            
            // On affiche le lien et le nom de chaque "miette"
            echo '<a href="'.get_permalink($crumb).'">'.get_the_title($crumb).'</a>';
          }
        }
      }

      // Si c'est un article
      if (is_single()) {
        // On récupère la catégorie de l'article
        $category = get_the_category();

        // On affiche le nom et le lien de la catégorie + le nom de l'article
        echo ' > <a href="'.get_category_link($category[0]->cat_ID).'">'.$category[0]->cat_name.'</a>';
      }

      // Si c'est une catégorie
      if (is_category()) {

        // On récupère les informations de la catégorie
        $category = get_the_category();

        // On affiche le nom de la catégorie
        echo ' > '.$category[0]->cat_name.'';
      }

      // La page en cours
      // Si c'est une page OU un article
      if (is_page() || is_single()) {
        // On affiche le nom de la page ou de l'article (toujours en dernier dans le fil d'Ariane)
        echo ' > '.get_the_title().'';
      }

    // Finalement, s'il s'agit de la front-page
    } elseif (is_front_page()) {
    // On affiche le lien de la page d'Accueil
      echo '<a title="Accueil" rel="nofollow" href="'.get_option('url').'">Accueil</a>';
    }
}

// *****

// Modification de la longueur des extraits pour maîtriser l'affichage des aperçus d'articles sur la page blog
function new_excerpt_length($length) {
  return 20;
}
add_filter('excerpt_length', 'new_excerpt_length');

add_action('send_headers','site_router');

function site_router(){
  $root = str_replace('index.php', '', $_SERVER['SCRIPT_NAME']);
  $url = str_replace($root, '', $_SERVER['REQUEST_URI']);
  $url = explode('/', $url);

  if (count($url) ==1 && $url[0] == 'login') {
      require 'tpl-login.php';
      die();
  }

  elseif (count($url) ==1 && $url[0] == 'profil') {
      require 'tpl-profil.php';
      die();
  }

  elseif (count($url) ==1 && $url[0] == 'logout') {
    wp_logout();
    header('location:'.$root);
    die();
  }

  elseif (count($url) ==1 && $url[0] == 'register') {
    require 'tpl-register.php';
    die();
}
}

// Enlève la barre d'admin sur toutes les pages
add_filter('show_admin_bar','__return_false');