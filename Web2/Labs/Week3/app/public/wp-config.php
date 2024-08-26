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
define( 'AUTH_KEY',          '+Waz|:3jNs.f|&^H-G.*?,/01Do&J6Dvw(fIf&AR}g&)HFN|)^mnc;!y!4)xv8tY' );
define( 'SECURE_AUTH_KEY',   'qc/$w%|N+}+[LVii6g}Rj~5sO{FY05kCf9G)Js:K}:k}FHYVPfFf0#xz8*_A67DI' );
define( 'LOGGED_IN_KEY',     'jUvi5xX[,RQZ)Hs+AC$K`kEU}0TU|[mdd8Yp|%[ZDB+902Yz#TDMSo&F>*D,2|gu' );
define( 'NONCE_KEY',         '=U.=(hIT*a Jih!p3P@LSBtS7e,dETvvsjJ`jG:$;NAfT>h??h@ebA]XX:6,Lym.' );
define( 'AUTH_SALT',         'x,S0g#_C&t+Z%A?s0(RRxM!P5ukFb. tk@%SJD^0l*[x@}(H0NLw4C No)%#$|{/' );
define( 'SECURE_AUTH_SALT',  '.ijnPk? :qZycg:_sy}Pg}dz<uz&~.C,,aFnA1g}l3a*;(6:(S|]8o~/aZBitLM0' );
define( 'LOGGED_IN_SALT',    'N&^;n<tPwgI~P:yJM-,1CU,@P T=?D;o;GaP:dVm|qRZ(<keC}kgHQ<uC/<o$&gC' );
define( 'NONCE_SALT',        's-BJ4J#q_G4_@!/txeVXO5v*KrFOh|ph|VM;Io#aYRopzdI1f-D@=Z~v7~wJ7DvC' );
define( 'WP_CACHE_KEY_SALT', '$fT!B;~H%/Xm.u([44!V0??-wfVDz|[L14wIhm,^2Y34f[<q?]9u(nAT vqSG/xZ' );


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
