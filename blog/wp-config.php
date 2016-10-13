<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clefs secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur 
 * {@link http://codex.wordpress.org/fr:Modifier_wp-config.php Modifier
 * wp-config.php}. C'est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d'installation. Vous n'avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define('DB_NAME', 'cl45-eseomega');

/** Utilisateur de la base de données MySQL. */
define('DB_USER', 'cl45-eseomega');

/** Mot de passe de la base de données MySQL. */
define('DB_PASSWORD', 'roueavant30');

/** Adresse de l'hébergement MySQL. */
define('DB_HOST', 'localhost');

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define('DB_CHARSET', 'utf8');

/** Type de collation de la base de données. 
  * N'y touchez que si vous savez ce que vous faites. 
  */
define('DB_COLLATE', '');

/**#@+
 * Clefs uniques d'authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant 
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n'importe quel moment, afin d'invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '-%kT;_R2w]]uRF!U8*Vr`tX<Fjx` ^J1ZH{3TR?bY9PcClaNRWu`|7E{$x9k&oXZ');
define('SECURE_AUTH_KEY',  'NB R2~wDc3,M/CT3Ck}eQ/$O-:A;_)8k.hG))@iNUfR@5Lv{x5~>k,YlNg`Z{YEU');
define('LOGGED_IN_KEY',    ' *N-0YbS.z#(?{7FYo~+5?& Oi&4t<PWsL78`mt|y_-LqqFsNo-CUwfue4[(8yJr');
define('NONCE_KEY',        '(SS-k|p /A+rv7OeWSx^2;C~cP}::$Pv|yhvxYud:qxv4;K+ltuXR(  +K;0}YZ>');
define('AUTH_SALT',        'UjrjptOGaNpU?I}meb-Uz`M1^7|9k,4_5Mm0_l7Fj&>%69YqDFBg|: [/;cCT=*.');
define('SECURE_AUTH_SALT', 'U*;4M<is!u^{yo(`b[DnWy~4kbU(RU&RJVFccq3yM[Y2j*%G7{J~$%{!R-b&+CTw');
define('LOGGED_IN_SALT',   'p@z7>;V_4(ov}>p@7Y>)L/0M}s KT-C-1rNnE<B lWD8Ln},!8gdL}3)>JBQIsPt');
define('NONCE_SALT',       '0$y[`]NMIJ{jA+uczJZ=[+QfC(jLy<qe6FE%!o0zq4((I@,GNLtrnA,cZC}Aw~Fy');
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique. 
 * N'utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés!
 */
$table_prefix  = 'wp_';

/** 
 * Pour les développeurs : le mode deboguage de WordPress.
 * 
 * En passant la valeur suivante à "true", vous activez l'affichage des
 * notifications d'erreurs pendant votre essais.
 * Il est fortemment recommandé que les développeurs d'extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de 
 * développement.
 */ 
define('WP_DEBUG', false); 

/* C'est tout, ne touchez pas à ce qui suit ! Bon blogging ! */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');