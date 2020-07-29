<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'carlaanalytics' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '_-5rHB[pS1gRmC]Z1Yz-K-m2*B<+rdW+lW5Xs4;:?_^D?YsPF9cIi)gbU))8LDOX' );
define( 'SECURE_AUTH_KEY',  'H fLDLJ );eW*AKk ;UT1%+<v+RF r7t- ygb2-s.$3*g5v89=);r&m60Fb|?=ws' );
define( 'LOGGED_IN_KEY',    '+f`:.b{-s{G!M(tPCu&Htv%B6|;E73]_A:)n_3~OttPy% ,_GtQdw;U=aAtTu91y' );
define( 'NONCE_KEY',        'r+z5NQUCl3t3TLBy1YP1X=Y}u=/JmBoPEL/A/aVo_,Qt5>HYm!-zJY ?.vkfcN4(' );
define( 'AUTH_SALT',        '4Mj}a.FHuP+hiX7t$.asIE{^)3;MR~~w$>+TfN7D7[,_UMkQ^$(v4ZAxXF+:FY0k' );
define( 'SECURE_AUTH_SALT', '>6H-UEk$N&jhhkEd`:FeAVn19Dz`F]q<saN5b-*a9&VNb%H~*gj(JrsyKJNFEFk+' );
define( 'LOGGED_IN_SALT',   't~5|`;;J:0U`zZiW3)0Q2|z>c5A-Br&Xw^Qo/M9JqOsh60V5!gXv1mh-V>,pGJQ9' );
define( 'NONCE_SALT',       'Qb3IyK-YPO=ok+ Vu2e}-(9Fs+EtjxpQEjcP/<]RP,d?iiGWlzD91<TNm=)E~^`7' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'crh_';

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
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
