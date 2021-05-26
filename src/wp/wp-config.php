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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'foodrecipe' );

/** MySQL database username */
define( 'DB_USER', 'kvi_root' );

/** MySQL database password */
define( 'DB_PASSWORD', '1234567890' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'Q}A &fEr?_r$(2ztH%3?yq>$jYd-OMqlz2cGP$B-Y4h=)LAGdu%3$>KH`dDT%CgE' );
define( 'SECURE_AUTH_KEY',  '!Yu3vteCw/k6/.zn>;o6SvEOkw#~A>?(C;myx.g,+a7mBa/{PkvQ~8pSwo<GfE@/' );
define( 'LOGGED_IN_KEY',    'x~pKld f@jys>U_fOK{Dmv1C-%2N.n.?5A;X<wRb^Ce-ve)jED5(v#8jw401J1VB' );
define( 'NONCE_KEY',        'whxNcJ=LuLE$V$BFp+^XH8@7oH|oD^p9(<NTRUo`<T!n^<f*=ges7ODQ/)HPSL<c' );
define( 'AUTH_SALT',        'D?)Qn&BBG`D-XLpe9Ll=krovwsQ{hB&fr%zywt./]jCl;50Wzd-1v+c&yOuUR>.v' );
define( 'SECURE_AUTH_SALT', 'jAMsQ2m]hwPJ`O+-- #}3)hF=iQ-3#Wc6OjU4%t3>YiI/A23sbGz^}5O-@+jZ{G`' );
define( 'LOGGED_IN_SALT',   'HcmyobgkGGIrfN2MXeT]eMsZ0gfyCA{$mKKiKs]$E}HomWEF*a=wx)}{ln_8JT_p' );
define( 'NONCE_SALT',       'f)EG<jPqtt3mp0kZj.{?DrWkx+<os|5zrz5Sd9tT~?nfrICEU.M|xRH&<vJM/N*F' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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
define( 'WP_DEBUG', false );
define ( 'FS_METHOD', 'direct');

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
