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
define( 'DB_NAME', 'u793270522_khmertell' );

/** Database username */
define( 'DB_USER', 'u793270522_touchsangrotha' );

/** Database password */
define( 'DB_PASSWORD', 'Touchmakmak1234!@#$' );

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
define( 'AUTH_KEY',          'ou&:vm`1Ve$ycYwR`}3R)|R3VerS78z:5o_F-I,1b<mIz/jVO[-IB~NeZVe )HYc' );
define( 'SECURE_AUTH_KEY',   'UJi8QtA!ik<J/heUfif $+eLK6nL*=+1<S9~W./c(c<LFur8EP.E@__t2/k {J/9' );
define( 'LOGGED_IN_KEY',     'oN79)mt$f&9j9Z$3(yKl)W/[qip1@1>w;?| uT1n9(DM+EIR!YvOGm99dyt`A6!N' );
define( 'NONCE_KEY',         ',;MEoKvN:n2{`ba5T}YO9}v079-q>I*Ht<>;^; -Pa)B<vne_k5(p{J(l/TBBpGJ' );
define( 'AUTH_SALT',         'MJ9FlO/-D;{qOIgr<Ij{x.5y=+^= M[Km$X3|+04BRlF4AJ3}e$HsZ5qJ#,J+{Fn' );
define( 'SECURE_AUTH_SALT',  'oObFSJ}ua+n&k.ujh6aB?SE1n>uIw~,zr?K<Ax;ZiUM4HfKN@rb<c|)EjrDawL7+' );
define( 'LOGGED_IN_SALT',    '6T^AiC)A!<rg7bEkyrBCX;Cl%:Fj@Dk(*?I<PJR{~X^~4BeG+![T`D=X?03W,(uX' );
define( 'NONCE_SALT',        'wtQ2XtjZ@BMKD2df)x7]c&.7!6fWbn*(t3>t|=a9gNEW $F<nl)]usGcJ5mvSKB8' );
define( 'WP_CACHE_KEY_SALT', '3$`7%A]0Ju^FAhhi(.pw{nw;K4x?PC Vj=4kLzA-sezE6F}:#Npz>!+-~|0W3M#7' );


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
define( 'COOKIEHASH', '37a31724c4084b3b8f9f382fcb0356b9' );
define( 'WP_AUTO_UPDATE_CORE', 'minor' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
