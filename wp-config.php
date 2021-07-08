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
define( 'DB_NAME', 'wordpress' );

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
define( 'AUTH_KEY',         'K|Co_WI6qQ}7`<9>u>r#5Ggh2s79kk8CzK{&vD?dcDpgyv;{n3s-_rVy=DMn0:L`' );
define( 'SECURE_AUTH_KEY',  'pFQ3zZf`q{RK)STb]80XUd$MfMf&)[gz[Tq9(Eo[hgQ9}.u67+d5?<{8}<.}jy.T' );
define( 'LOGGED_IN_KEY',    'KlhrM#nQnNV?BSm>vz6!L1SZ2eb*$+e)(X*jAf<piMM!ackk@73RT+31!QQG#6Q;' );
define( 'NONCE_KEY',        'oOPj!=SE}+&7@9O-l[_#e]1BIC<.yZxZa^HNQ Y@8[i,-;f^IFp*SESFd&R{f0SF' );
define( 'AUTH_SALT',        'wwZuko2|uo.@BM6Kk( K)]K#&I2[<r4Vu|i$4Iac~QB}c(YSZ|[jrBhwV_%|I*gL' );
define( 'SECURE_AUTH_SALT', '~R3 &OF]IsKl#ySn8dJ1i5wMdt7Ag<VHHUgjgCW6VldIynMQk_}KJ85AL/.AUmFS' );
define( 'LOGGED_IN_SALT',   'rwa@ QTPK6.qsZXd/f#Ubv)%8nk4NNX=wSHI?_!wtJ,9W)x`%c*B8#Ye;qJ0UnXe' );
define( 'NONCE_SALT',       '1U(/ !(+zP=8{:<PHWbi0d_vpm$mfiY4Y@4s%;-?Ns+W?/I:s|T{uz6`2A,:5%55' );

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
