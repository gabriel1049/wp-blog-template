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
define( 'AUTH_KEY',          'LvT:rZ4B~o?9z$N=%uacNs5f~MU/rX;dure;pMF0$MU0g^wNtllGzO|t< T:uK27' );
define( 'SECURE_AUTH_KEY',   '5$ Iqb0Uxx3_t:z#$^oRWj@vIEfSow^5h]bR_P5qKh=H{dc>-<46ompQ:][.UgQt' );
define( 'LOGGED_IN_KEY',     'n+*x]&_v2O<Jtp#lU79l_]b28#@; ?63>qR# hz8Y!saN#j_ZLsl^bbmzvF*k9ye' );
define( 'NONCE_KEY',         'x[xN>9;vG%^lCyw@:kczd=y$u[H_fZ+oYWX-oGO :4k}(8#Q^+z{TuiL104+t>wI' );
define( 'AUTH_SALT',         'B_#d|TPL6, !4`arcjki6!<#&s#%;|5$1zuCo2_38g(8#[;_3u(gW3Z;|>XassBN' );
define( 'SECURE_AUTH_SALT',  '?3pe#7n=<(ZL?^Gz!a?1 :Dc`S,.}L(,}%}W*q2Kr<7YfS%<V<Zj1pSw#X)j^,/u' );
define( 'LOGGED_IN_SALT',    '|Wh6xmXAhSaovUPQx~ReU5~a-W#dwx_R*z3ZD.A$B58vT>X5iU.ys1C&?sC^H$&Q' );
define( 'NONCE_SALT',        ' u=>zZq/JL*=`mAS+#+Xc@c*ER33y4,(VR2fQJU>,YLbIWMrGAI3o~d^FB~l06N{' );
define( 'WP_CACHE_KEY_SALT', '><ljP@}$u>387x,J^e[]/_pd^);k(`pDMD_`E?p,D*NhOL,vL(7p~aI8uP%M+$j/' );


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
