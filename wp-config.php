<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wpress01');

/** MySQL database username */
define('DB_USER', 'gy6');
/** define('DB_USER', 'root'); */

/** MySQL database password */
define('DB_PASSWORD', 'vbB5UY5ZhgFE');
/** define('DB_PASSWORD', 'ooF1ahSu'); */

/** MySQL hostname */
define('DB_HOST', '10.176.3.163');
/** define('DB_HOST', 'localhost'); */

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         '5AONOcAmBX6>x6#sS}.!/nL?;o)V?bmp$K[JnxM7O8|Y.^6HBxEs8-^4%2(6_KIM');
define('SECURE_AUTH_KEY',  ' +N|4Eu9ubh]*ZB;k|U+T:?cMYttiCc2~y`84.jbb))+{ik2Ue+FOv74O(A9Cm|8');
define('LOGGED_IN_KEY',    'Ng^M*J+]@pz<.DD7}&+r3x}Q]Eg/WyzeKWOjAMnvVU/=vQG^@xt6-XG%8||fS{M1');
define('NONCE_KEY',        '4O1|^7)WZ~4U-+g;P[VIPHSs8Gl0NlEX}^zBAD%h#O ^-/5i,nR|:`LBJYxa|}-s');
define('AUTH_SALT',        '40~x)fDA|Qcow+czZ}nPQUa2I8a |{--2--fx4J!#U:a!L>{q>p6Xh9;oq!fge.j');
define('SECURE_AUTH_SALT', 'MAk&OF<do`3thrS|(+(8KL7[+U++p2hJyeP[16ZWjH5o{IEIUp`JI]CyB&DW0<68');
define('LOGGED_IN_SALT',   'r)H!LAK{p+B@7b~+5l&l-,r;O+9 1Jwty7NNbO<|qa6/?Cxq~;Ktp;l>-<v7-sd}');
define('NONCE_SALT',       'g*Yifg5~2>Yw~LRZ>ibZ8Eaqx>4&E5.lpd@o.LfZjIbzpA}KgxfD,{]WqI|<7j-R');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);



// Contact Form 7 Tweaks
define ('WPCF7_AUTOP', false);
define ('WPCF7_LOAD_CSS', false); // Added to disable CSS loading
define ('WPCF7_LOAD_JS', false); // Added to disable JS loading

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
