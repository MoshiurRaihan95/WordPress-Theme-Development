<?php

/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wordpress');

/** Database username */
define('DB_USER', 'root');

/** Database password */
define('DB_PASSWORD', '');

/** Database hostname */
define('DB_HOST', 'localhost');

/** Database charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The database collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         't6e)}J[#`XOrR#6ry]:CV.Ff<hJ_o?wj@T,x:z1&b9o6yt0_w*]=P3Ue33bf=ymT');
define('SECURE_AUTH_KEY',  'X2FF2.G+v#wLfJ=xnXzd|<!+_8AN,3&%jri#|19.z0yxL,J8Q7LV|M6;O*_|M`7s');
define('LOGGED_IN_KEY',    'jD4%(v5cI9#o2AmXAs7UtV)#RshjQQxhusX6b1fg!{T0XrH%F@M}(ICg@,G5)Yve');
define('NONCE_KEY',        '^)6k(LS;O9!`c,!.uCRH#E;:!/DLEGX:!hc41ai?1myfx;;+o^;id|_L5Mpf_3ul');
define('AUTH_SALT',        'SaD;P7}Bqz&98g1<jtxt|{U0/@oP+-2Jax_pIE167LBK~i|NTlK_8[WI q?2qzHK');
define('SECURE_AUTH_SALT', '?JWe]xkYx}:gW)/;Nou;C:;-eLB!#{F1*t+,<|1ODD/E( xQ^cTsQs@ioBe=<k;A');
define('LOGGED_IN_SALT',   'rgd/795#umgn?j%?V:9:U0T%wBkb`<T7/MBUF#yp:_h/FD;.)@V%$BF^7Qkb/{]%');
define('NONCE_SALT',       'dVR)fmHed8[ipQQ[g=`=WK^)KnQtl(njnLf}1l4:/lDE$3n{h@$8[XU#0G8w4^}+');

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define('WP_DEBUG', false);

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if (!defined('ABSPATH')) {
	define('ABSPATH', __DIR__ . '/');
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
