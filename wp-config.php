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
define( 'DB_NAME', 'db_hunterxpainting' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost:8888' );

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
define( 'AUTH_KEY',         '{/9g_+;{Q!Qx)!*ics+e5sDUjyY%| ye&]VB`sGM,ux=$B1}gb$V(:aurTDPw&31' );
define( 'SECURE_AUTH_KEY',  'Ov=QsWgEi-Y^0NR@KR*Un|n>K{*JwSlU^^=Z9vE>FN<v(!4].XP}}9_oKZ6Rm^d#' );
define( 'LOGGED_IN_KEY',    'nH5n$if!!;4c(K$%Tvb.~ZItAuR)rnxBv{&z3f4s]0O~*jLu@cPSd4d4{;:vHpn=' );
define( 'NONCE_KEY',        '4AM^s@+RFevMo};5@Fl:Z(FLEfrNMnoBmWc<x]:/i4o$s;Fj!K71mvNiT6l$0mqQ' );
define( 'AUTH_SALT',        '= yH6!Qz-7@w.IvLH.t<QfeCfYek[C 2G WZ-_l|0):qj;?odcxpcOe?@U&um4Ab' );
define( 'SECURE_AUTH_SALT', '3`F#Sg0)^TD5Vu]qO_ff2RC1UM}%k[JCVUrFDPyg~3g}~Lxn~5XtCY<-#G[zXwsz' );
define( 'LOGGED_IN_SALT',   '!]!`b)`T<^S8sP!?f1,2|^I!PZxM6B42Xq:K[?@tvgF}?y-`M+Z=MI>>YS)$~V3Y' );
define( 'NONCE_SALT',       'cFISOU-jr$>T:Q#+Mkw)A`+cLD0YNW*I5*NE6 (-dpo=yrI-zj| :FQw%f-0[~H2' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

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
