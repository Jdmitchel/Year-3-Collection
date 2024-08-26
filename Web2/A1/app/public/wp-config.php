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
define( 'AUTH_KEY',          'L=`_U^^yCr:Wd3wi|:d}eQs#Jo^u/X7sJ<?4_>xQ4X86@cIAG/D3`&I/nqMrp~N;' );
define( 'SECURE_AUTH_KEY',   'MB{2Pyy=0!1C[/`nvB~nD2k;u[_{G.{f,VDi60tP`|jNXu4<~eIf-cD;0Yy.a{%h' );
define( 'LOGGED_IN_KEY',     '/0wb50s{@ 7]Sz]!]!*_l8&Po~D$2cQx;[,-h=EGC<z+EM)36X.t.oAHc!67mfjx' );
define( 'NONCE_KEY',         'L2A7ncH?j4,._2?[]MxV0Mn-yh6F}EFdzpl[z$92yA&ps/?ooc4:NBA_r[IjzECY' );
define( 'AUTH_SALT',         'AU?^$C_*F0`SK E]84oHrVU6{Q:QXD{4k{RDp$fZ9A9|V#Y:W_``CC{:biH8q,q=' );
define( 'SECURE_AUTH_SALT',  'xbk]Nm1$n)cWK4=8wm}wyCt|^<!LL7]&JIarG|+R|yZz3X]0k3l:+,-k+]YUAGd{' );
define( 'LOGGED_IN_SALT',    'LHeB[O[d-0WBMq)hHHXU<XFcpt4{jF=J}F%h||^<t9z++vWW/8v(LyI5}2C^|~Xi' );
define( 'NONCE_SALT',        'A% (9.UYe1vG7KW0U(*4{PO`+tMc1?~/aw x)%)[N<?!&a>~FPQppUCMtbv{ZG(n' );
define( 'WP_CACHE_KEY_SALT', 'D]_{DN~_I+Ysq)--AGNdYYnD)xH9996$7,!0hDDGPx5VqhWhPq{J:>{y18u)gNeJ' );


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
