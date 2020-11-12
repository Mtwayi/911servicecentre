<?php
/** Enable W3 Total Cache */
define('WP_CACHE', false); // Added by W3 Total Cache

/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', '911servicecentre');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'c^vrTx=f[-]$4}v~W$[mv7Z,a{-1zB3gP%>w8OMOp@GN|=LWyX-Vr8f9M3!`mO@g');
define('SECURE_AUTH_KEY',  '|PxcHgiEsKNi.u+3hN[-X6pJ8pAF&8/Y1YmbJY.OP}VF69#m_d>3k/o*16#:q&Zt');
define('LOGGED_IN_KEY',    '/%EMbZ {)xBgI&=ZcsEuAS=MICax7pRvUI ?Y/SM__X3k}vp1MN%_1S|zpd N9fN');
define('NONCE_KEY',        'jV^DQiYBS@p;?q]B1!bSN;xhGq~w4NytYi8!k8>w;-Qwc$zTq2dPq%<IVp()E(L!');
define('AUTH_SALT',        'yS&D$|fUJYE${uw(~*n{.pj:Zz{q,N;2/qWTkOw8&[f~7/9ZWFv]lJ%GrQ_D:b-m');
define('SECURE_AUTH_SALT', 'do6^]x4Rm,**Wa?FuT_Jbx_c X6m=Hz5e@zhg%N[I`;I TODK?eWj</$YW<at0,;');
define('LOGGED_IN_SALT',   '*uD5?3Om4,Irej(<9_`(H!W|.:b?/;R{&X7D2?/*J+TG9&GcsQLvP(ju]7r&phmo');
define('NONCE_SALT',       'tK#@Qjwn!bUSKdy9%(]_lQ/yLpu?Bxde=!>&pMbX43`e[n@R:(pQ61!-CZ|x>qQM');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
