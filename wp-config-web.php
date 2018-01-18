<?php
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
//define('WP_CACHE', true); //Added by WP-Cache Manager
define( 'WPCACHEHOME', '/home/gnigatssmaj/public_html/masscomm/wp-content/plugins/wp-super-cache/' ); //Added by WP-Cache Manager
define('DB_NAME', 'gnigatss_upcmc');

/** MySQL database username */
define('DB_USER', 'gnigatss_upmuser');

/** MySQL database password */
define('DB_PASSWORD', ';#kA07ea^)X7~(?Nd9');

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
define('AUTH_KEY',         'uz]JbhZ*fl+t#4V`Y~S$)ccOhJ)WSZMT,G44 U4r,f_!`]niha(-V2j:]1s8sxcR');
define('SECURE_AUTH_KEY',  'HbO^qtG=lXYr*2vGD S>$^Vz7gJYGY%I_aBQC8hm}L `~fr1[5vqap]3LTS?AN,3');
define('LOGGED_IN_KEY',    '-%s;T+40Jrr*71d fpa(-K1_D_s{6ak++y 2P{7,XeKc^hDvah#Oh8|[J|:Sxz8c');
define('NONCE_KEY',        'OGzMWc^CGb6fMqv9$Tcm`0GlYyYhJf1.._7J>nkpXYy,2%13dKuNQl!/qt?Dso%b');
define('AUTH_SALT',        ' (`eZka>ZFME9>iNIWVj>dBzNgj8Dp;V7Ub|e~tA;V/BQ6)xIZ:4NcmhW,v,o?zo');
define('SECURE_AUTH_SALT', '#e!hKYw`_PUnv[f$LJb}BGd2-)vy<fM7S:,R!aWu{ba*}Py0A^n9*dzutp^@t7Tl');
define('LOGGED_IN_SALT',   'M-7l9(Yli/K|gv[<?. b=6MUaQC$Fkf)aU<<IH$1ir>;|o,.5oO@a bnRqkaz;/S');
define('NONCE_SALT',       'YISJ0>s~SFh:hA9;*H:Mk$K<N]9{k<T}4fey2GP#9inRJ&?FIB?3;r;:<<!%vv7o');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_upcmc_';

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
/*define('DISALLOW_FILE_EDIT', TRUE);
define('DISALLOW_FILE_MODS', TRUE );*/
/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
