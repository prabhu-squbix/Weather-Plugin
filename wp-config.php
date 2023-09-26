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
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'weather_db' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         '{5Toy[W# R`?kahF8<5=qwQ*#K16LYQSWXCtJU`B6~QGDD@gmABN(o:`inQf-HlU' );
define( 'SECURE_AUTH_KEY',  'uoOV|5ezq:%g21>a:!(;$~HC,8^,Y7]{im!oJxk~a}vbQE&Y+hz9 4^d:]ix!jH3' );
define( 'LOGGED_IN_KEY',    '3(o6nVI*U:W^;(.Lrqq$|xGmINm=!(l@NAh4Nm_/KApKtOc!r*a0,c`z)En;{B%7' );
define( 'NONCE_KEY',        'Gz1TN#;+Lc-)wmUGhIl&}.*RXgg`hQU-nt)|n@Axf|}x=;I)_G vAY:Im0;@yWdO' );
define( 'AUTH_SALT',        '/$bE,ve[x.o=K0e7!2as WX1C*uIpS(pSKR9EPqNtG-BiGAI7)K3zm~L:.!zpX?8' );
define( 'SECURE_AUTH_SALT', 'R+Wuk~+.aEi.QhNG{`c)M!})!El_WgIG/CysKssW/t0+.ntl1u>pGW}-LR K]V_2' );
define( 'LOGGED_IN_SALT',   'Ydh~EK|qU6ytuF+0?+m`P!`_ht4Fc)C3&qZ{%OZNaVY_Q?O;F?5PHI_8TTQp)$TW' );
define( 'NONCE_SALT',       'Z=AVD3MNd/ow|lsT;O7eCh|/;@]!~ke#SC&,mbx:L:+OB3Y`jEHuM`ZI#h3zz%E#' );

/**#@-*/

/**
 * WordPress database table prefix.
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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
