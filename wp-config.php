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
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress_hsm' );

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
define( 'AUTH_KEY',         'K5_-,Cqy]fInTdCJB0L>77eChLoDn5+uG*}ye)9{>4edmk~/j;yJbyi$W}yQnD>M' );
define( 'SECURE_AUTH_KEY',  'U-ukNC/O-@M)93?S^N@>35h7G}9D&X;Wpu2bch5?-o|q~kE>(Xv82VtAA_)aZIx[' );
define( 'LOGGED_IN_KEY',    'vira17W5-%dAq[5|]B#?Ife5IrNyrNHDbAn,SsW6QRTOjvurmHT[[4_X] h,7EsB' );
define( 'NONCE_KEY',        'ajCJiH7gd4gUV=OAw%/E2=Oh}u],90|3QW{<;7i=`?7VyIKK~4ujviA=#=Tzh8G8' );
define( 'AUTH_SALT',        'l14ui{95R39eJcESyVRF-pLwoIzyD%c}XQaJxi?@TRGD1KT|jm+aXd6TP-]Av1[F' );
define( 'SECURE_AUTH_SALT', 'wy-wYEF48Bd5hsk]?X9T1mK *XKS)60{:)OMbxh00=f*3xT+K+Z-m!1m0]kFD{/Z' );
define( 'LOGGED_IN_SALT',   'Hp-WLnq1U 7@05K:;V0 lCm$t-kY9fbj{BRexc)Bn}` XN9fsm:d^LQ~JI0:V8jk' );
define( 'NONCE_SALT',       '><,.Z<0|[}L:zfP7]E(MkKgII>]6N175ud5t(OV@(CrDNh$FaX=YYQur*|3pY:X3' );

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
