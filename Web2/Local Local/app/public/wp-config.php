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
define( 'AUTH_KEY',          '9tGT-_OFp,?QBE7Y`7e7cSH[ypMoH;siQu)m6u($agzc:Sguzo X7bG%a%cr7R?Z' );
define( 'SECURE_AUTH_KEY',   ')FPN)c+r:>I[g:TnWp>54e5AP?~?!#Io|WGz+gHV.r];Hu@lYKY<Zw;?u{[{o?Y/' );
define( 'LOGGED_IN_KEY',     '`2D::}Y! .ScwB1=8[QK j$IXR5|Icp?NN@9F+cwwNeH,1*VCPwD|RnLx]:Me2fb' );
define( 'NONCE_KEY',         '~9Zo8Y;R0zR25C}6sg=A3li8W_%L&vS9H*h:/9RQan%~-aO*jJ@YXm>St)P^Cml8' );
define( 'AUTH_SALT',         'NrG|JoH}:Z2(yC={Jj@2naI8of=L@J>.@KSk.L$$r?zfH0v`782~(@IFdphm54xt' );
define( 'SECURE_AUTH_SALT',  'MO-Mk9-zbW<c6$ $Qcs9:zKNQe2pJhqQick12e&5t;nzj4eHY4<MdZH%PiKcJhI_' );
define( 'LOGGED_IN_SALT',    'Uu=^od57.(dFQG]b!m92><.K1-#5cSTUAnw@MKP+UMo4BsErWxl7Cv<`_H!]BeEO' );
define( 'NONCE_SALT',        '?_$ZXw*-{Q3PcankhGiCRkkE,Qek_F>ejwvHP5s!2hGpyi2-~CjR {P[%4Tpdtqz' );
define( 'WP_CACHE_KEY_SALT', 'dFovvj!xDT}NT$xe&]mN1Bq:&ip]B[B<}5_B56~t#6m]-{mH$:+ab?X9^#XKO$TI' );


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
