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
define( 'AUTH_KEY',          '5p6e$XEn@[95iKC3upD@h$0sRA)d+B65$tbU`y4 lSML?V%2_3I[PmHm_1 qcfD;' );
define( 'SECURE_AUTH_KEY',   '^DI,a10:1PR,^:lUuH1yz>Zb2NH$cIG7&E@_+ty=:EPn2Jx{a#f%-XY)HWtzKJ{s' );
define( 'LOGGED_IN_KEY',     'VuUQmKZKL<e6W%ldAuO2QU1E-/^M@5@6PiJ@P2hs}>1<-^*HFAbyyXK!hq*/weo?' );
define( 'NONCE_KEY',         '=K}[68V22Q0@sqajoxR#a4>8_`xTkn6}+rAx%=[.Nw%nr@X{SH:_<9L=0IdZH0@6' );
define( 'AUTH_SALT',         'S *S6M2aQ39ancv&1@<)2=(u$6@}Zqa`$C)661O}^9C[Ia^jpR0X]_MT|mo>P&;g' );
define( 'SECURE_AUTH_SALT',  '] I=065&7I}UYas=J_JvMJi<2c#k nd}&=-[4m2JfR^N=nm-ugQjxRm-b7#Lg<l0' );
define( 'LOGGED_IN_SALT',    'ziXIlr[uBUbC4jsm4,odlv@(%N;YSc536nkO zsR@HX92GZ:wSzo}f73)$=]Xy!V' );
define( 'NONCE_SALT',        '=?;gi!2sq1yT7Qwdie04$3e+CHt)?,xn.:+r9i4LqJd>Bo@^McqPhFW`-s[YP7*m' );
define( 'WP_CACHE_KEY_SALT', 'cD9:07Ms!sV/E@A4PHUYs0Kb {.TNQ6,=b|4EoF%)km[i%Pgb*%6xin78Y?(4&@a' );


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
