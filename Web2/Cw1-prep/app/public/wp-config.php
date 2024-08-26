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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

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
define( 'AUTH_KEY',          'y0yAxi6Z]&*t.UCO&=7Njq1~GH9I%uC{F*XR=(1:ZvHrYeMX#(Tw=[ib0rbg{9e|' );
define( 'SECURE_AUTH_KEY',   '@`]swiyI&[vLR^b4zR7P&=@iZk<hO_?HN]v[qWcxePki@WX~_ijY)X5.4Va4mlje' );
define( 'LOGGED_IN_KEY',     'TQJV.Qdn,N*;MYf7[<R-l/Xvc-,+Z7VzW78^{I`-Ga$}3<Mckca2xI4<YBi6M#Qd' );
define( 'NONCE_KEY',         '/X}^$vu-8wLquf#02W=;6,yt$hjC2r8q646j:Z/sK8*#Ob{1Rw(L#t] k:BYMn;,' );
define( 'AUTH_SALT',         'pS}qf6u;.|n&$hAi <SJkZ94g1U(hClCaPo$2X_$jnoY*uJBbEU}D;TL(4YfG7Yu' );
define( 'SECURE_AUTH_SALT',  'i+@V4<q/N|MyYz*h%j3I%O]yiu!#MJ`{F>`T,Bnj9W9{oSN8ZPUT/%BDeb!O{CCc' );
define( 'LOGGED_IN_SALT',    '8NEwGe8(BrqZr3. L]`)?sbr;+~}Quh4f)io7LjHC;H2AO)_wSLM{4(>Ui^`a{Aa' );
define( 'NONCE_SALT',        'qwu:[j36O o&AB1b>FK3OA8U?n7,]!TlQ:Po~9(W&;ke3P >cP8{_aD/WHM8aFMi' );
define( 'WP_CACHE_KEY_SALT', '8OWpU0:<=(JD5,AE3.ClD54 FiT&4a]KXOgcZ_(z/_{FYJ=yr:}T3yJ9Bc5= IMc' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
