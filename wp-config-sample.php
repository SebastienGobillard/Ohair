<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clés secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur
 * {@link http://codex.wordpress.org/fr:Modifier_wp-config.php Modifier
 * wp-config.php}. C’est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //

//! remplacer matrice par les infos nécessaires

/** Nom de la base de données de WordPress. */
define('DB_NAME', 'matrice');

/** Utilisateur de la base de données MySQL. */
define('DB_USER', 'matrice');

/** Mot de passe de la base de données MySQL. */
define('DB_PASSWORD', 'matrice');

/** Adresse de l’hébergement MySQL. */
define('DB_HOST', 'localhost');

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define('DB_CHARSET', 'utf8');

/** Type de collation de la base de données.
  * N’y touchez que si vous savez ce que vous faites.
  */
define('DB_COLLATE', '');

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * ! {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'put your unique phrase here');
define('SECURE_AUTH_KEY',  'put your unique phrase here');
define('LOGGED_IN_KEY',    'put your unique phrase here');
define('NONCE_KEY',        'put your unique phrase here');
define('AUTH_SALT',        'put your unique phrase here');
define('SECURE_AUTH_SALT', 'put your unique phrase here');
define('LOGGED_IN_SALT',   'put your unique phrase here');
define('NONCE_SALT',       'put your unique phrase here');
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix  = 'wp_';

// Jevais indiquer à WordPress le nouvel emplacement de mon dossier "wp-content"
define( 'WP_CONTENT_URL', 'http://monurl.local/content' ); // ! à modifier avec le nom de mon localhost
define( 'WP_CONTENT_DIR', dirname( ABSPATH ) . '/content' );

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortemment recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

// Si je suis en dev
if (WP_DEBUG) {

  // J'active l'installation de thèmes et de plugins
  define('DISALLOW_FILE_MODS', false);

  // Permet où non l'affichage des erreurs
  define('WP_DEBUG_DISPLAY', true);

  // Permet ou non de stocker dans un fichier les logs d'erreurs
  define('WP_DEBUG_LOG', true);

  // Je désactive les révisions (le versionning des contenus)
  define( 'WP_POST_REVISIONS', false );

  // La corbeille est conservée 1 jour
  define( 'EMPTY_TRASH_DAYS', 1 );

} else {

  // Je désactive l'installation de thèmes et de plugins
  define('DISALLOW_FILE_MODS', true);

  // Permet où non l'affichage des erreurs
  // inutle car désactivée lorsque WP_DEBUG est à false
  define('WP_DEBUG_DISPLAY', false);

  // Permet ou non de stocker dans un fichier les logs d'erreur
  // inutle car désactivée lorsque WP_DEBUG est à false
  define('WP_DEBUG_LOG', false);

  // J'active les révisions (le versionning des contenus)
  // Je spécifie le nombre de versions maximums
  define( 'WP_POST_REVISIONS', 10 );

  // La corbeille est conservée 30 jours
  define( 'EMPTY_TRASH_DAYS', 30 ); // 30 days

}

// Je demande à WordPress de télécharger directement les fichiers
// (valable pour les fichiers de MAJ, trad, thèmes, plugins, ...)
define('FS_METHOD', 'direct');

// Je désactive l'éditeur embarqué
define( 'DISALLOW_FILE_EDIT', true );

/* C’est tout, ne touchez pas à ce qui suit ! */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
    define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');