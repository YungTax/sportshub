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
define( 'DB_NAME', 'sporthub' );

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
define( 'AUTH_KEY',          '!/R*_{QwYUZeN=bG+lgYF&J/g61+|}]QU3#T.,!bA@WmzboEnl6O!jCeE8[[s=O(' );
define( 'SECURE_AUTH_KEY',   '5k?j!pkq~2HA)Jv]{A=L~GuZ4%P6*Lh/FSd{Q BK58v@(Ax3t4.w?q7ixob>w2:Z' );
define( 'LOGGED_IN_KEY',     'M}.~-3+Db08xF30%Rv!;7Y;Lr;Tw$&GI%0OhGV:THKh(@vd[g*[YNSJs@(: B!af' );
define( 'NONCE_KEY',         '%DWK{guA|c.[/Doc]~#=$@yh&QukP}h4lxrZz-oZ9.:?>QY)M*0Fp-<mRh2_n/_<' );
define( 'AUTH_SALT',         'Q)&%`ET1%#~cKIyU[Lr7#cFk{UkkG f@j%BUg8$xgpPG&2;FOz^]H ,U3$uv=4DZ' );
define( 'SECURE_AUTH_SALT',  'gRzmoO9TXO/WY>a,ZI7VT11nzZ@J7Em?e&%PXJI-8f8iMT|Z`jt l3+AOMrx&5Wt' );
define( 'LOGGED_IN_SALT',    'huHd|[jo7IJ,=9tv`!1z1JCl]aj:Sd[@;3,}O{H90(j|I2(!D2o4=(5aa-?8XT.O' );
define( 'NONCE_SALT',        '!041bEukxaGEP}Pgn5Z[iv7tyJR2S(WWUs%zA46N<Cb$=&pb6Ou5(5l0>KeA09zd' );
define( 'WP_CACHE_KEY_SALT', ')@3(d~DevpvfK(ubx.99f:e_$ |gVLBCV6iO(}O,xo{@TF~}FZ5v64<=}m;scs:y' );


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
	define( 'WP_DEBUG', true );
	define( 'WP_DEBUG_LOG', true );
	define( 'WP_DEBUG_DISPLAY', true );
}

define( 'FS_METHOD', 'direct' );
define( 'WP_AUTO_UPDATE_CORE', 'minor' );
define('WP_MEMORY_LIMIT','1536M');
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
