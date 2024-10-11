<?php
define( 'WP_CACHE', true );
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
define( 'DB_NAME', 'u985379591_ffj4j' );

/** Database username */
define( 'DB_USER', 'u985379591_hohdR' );

/** Database password */
define( 'DB_PASSWORD', 'CVtP0Q9NIt' );

/** Database hostname */
define( 'DB_HOST', '127.0.0.1' );

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
define( 'AUTH_KEY',          'ex#nKCB[,U2I1WW!k@Mt.0Y8Y1p8HjH&uqE6|&jdT8aXMK?$q=:w1rnH<yJvSX,s' );
define( 'SECURE_AUTH_KEY',   'ZC9nQ(zPf51aO=AYC)&y msJ5b-cz-[^UC{[(}A:l/7&i^F.G+C,S)iAG?MpBBb4' );
define( 'LOGGED_IN_KEY',     'g0Q6ljMxfNpQmaQ6w<,#5Z[h?Z#JSR~BnZ$b}-P@jrz<W`R/5{{sxr/G^Yac(Sba' );
define( 'NONCE_KEY',         'q/4Syk:;F$ ;GF+#cEk/PN(sqiL})Sr&p6k:hr)Jr8DF76>d,-,IY:vFmpyt.V[^' );
define( 'AUTH_SALT',         '/$KWbtvh{IWna;3rA]^[tW4T4`,eEx7(J=tKm0yf~{K)&63L_q:tD!&+H@p#Gi:.' );
define( 'SECURE_AUTH_SALT',  ':DOtfn6s];eg `G9X+^%80:alFQ(_S/H}h.lKhrW|btO%3D{O(CO$|OFZXRu<B3p' );
define( 'LOGGED_IN_SALT',    ';`a*Xc;hL{K5L_[K8dH:?oV+hDXSDTdOm0fw6LA9/#Nfs@KOn583tCTQFsf>#1]h' );
define( 'NONCE_SALT',        '] :Xy!XjTFaIlcT|L-f%sUXZqxSxF}?H*1Nh5SP[l4VQ@g[9j}~LW`}xh.3[F2~#' );
define( 'WP_CACHE_KEY_SALT', 'f^G[$+L72Y_$j4R8!C)=Bz&T>BC^xRxu0ro2ry:hcSp8wbkm<EDH*gD9^a9fHRSA' );


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

define( 'FS_METHOD', 'direct' );
define( 'COOKIEHASH', '58c4f55db589f3a8eb63a9c617706218' );
define( 'WP_AUTO_UPDATE_CORE', 'minor' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
