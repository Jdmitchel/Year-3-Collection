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
define( 'AUTH_KEY',          'Za~Lu0Okx|:20-qW=TJH%;HWJ/WbC$7K2hp+yXS`h|~W5clc,,+HpUY$R*#G fE:' );
define( 'SECURE_AUTH_KEY',   'P+<N?A7%/+K6&1e%gxGiM7oGjJ(-~:[5JXF!8SUBK96^jcD-t,VJ=D.;OOSC<+=v' );
define( 'LOGGED_IN_KEY',     '|,dIG 4;37Yvpsy&36A9w}m:9w&:7lxc/q-0~|s3]cG>R9$pvka$C@Gk%-IGy)kb' );
define( 'NONCE_KEY',         '~wP3a;l(=ZMLFI,ccfuRG3>A)6C-{qaY4n&zpee5YdtKq0OzrBfdR X#*{j:+/AR' );
define( 'AUTH_SALT',         '<j::irK4-z#K$ErF[1,||cV:mSb1plDmOWU[4YA)fCyXsfxSdXbUqkFjjs{1}Hgh' );
define( 'SECURE_AUTH_SALT',  'I>3Vs95gn,`JP|!v>2zCUnD!>koL;?5%_<Uob6kX&! {-ti(N&rU&@_JFPhU}2mc' );
define( 'LOGGED_IN_SALT',    ':9LkSV~kYXN.K*Q#$Rjw7%85W(PfF?`(%Q(P+eRe8AKg 67jZ6gXz}k@RB@W! 6,' );
define( 'NONCE_SALT',        '`W[v6Y}5tR?4@u5C^3${h,x}~w94fW~#OM:3XQ,)M%n{$l2P ]]e3A= G7Fk?3x$' );
define( 'WP_CACHE_KEY_SALT', '(L`DpKfeqmk9 qm=E3S=<qkbRGiwO]OIIPEed:NF;wwu?<a@z|!p(D0mafM/{(DS' );


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
