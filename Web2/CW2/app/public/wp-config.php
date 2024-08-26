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
define( 'AUTH_KEY',          'P6_:V#X0XTM8,H:I)~o80VW:NpA+TQ(K9.9ajm}y:{693O@*HAImp=%[r)BKXvO7' );
define( 'SECURE_AUTH_KEY',   'a8>nvc^E<[L9]m:YY%n Ro#rB{&/C7<h_u`dc`Zx3BMKG{$`3YSbZCs(i<kicfL(' );
define( 'LOGGED_IN_KEY',     'lmor:J$5YA_l]+^x/*H*e:+Rn@Mj^ri:4l)vGkfVkKZlM8<4T%<oU+RM;m4QlmK?' );
define( 'NONCE_KEY',         'B9goRb8I&r(5~xn4*=ZCQ@.42CzkvH//1 qHdIXa$,U3O%xbDOf~@fi2S0o;Xl6a' );
define( 'AUTH_SALT',         'WwiLb7C09`^,vbASp)f^s{gZea3EzW$#*3m|)HjGHqV{h6h.Z2c#e*nL9/&gaoAz' );
define( 'SECURE_AUTH_SALT',  'Cu*UM-[)NNDE)Bm&$>mKW,b-i!^%pS-i+cbLo[UHJF[#{%nS}>/]Ab1:H>A}wC6K' );
define( 'LOGGED_IN_SALT',    '1ZIoLThR*D:J2K6W1O0Bs#X:)*04,?RSSQQ>BZ~c^bZj>S2miIlhFxiy- KZy=ei' );
define( 'NONCE_SALT',        ',ss@YVnc~K+ZzrG3h@7-{,lD<%=7hEr)ra__Y&[:Rl/|S5<Qm=2w1U8o7l8&3n&t' );
define( 'WP_CACHE_KEY_SALT', 'I@-a;m-Z~.?aF  Id!m_&r[vd,y`ZH/)TeEzhGK2$.+#$(J]IV|H7gR.9t7?o_Ws' );


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
