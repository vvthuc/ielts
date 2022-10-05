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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'landing' );

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
define( 'AUTH_KEY',         '0lo3E9~u,.LGUkjJ4(&G%<!2bbHoU~@>GJMhVI!HUneoEg|PL=h`N{t8:BRCT+ht' );
define( 'SECURE_AUTH_KEY',  'N&6z=4Io4uU}Z@c2zHW(!g*B)i8{W(}j^CHlxlV0bN!d-uU: .JUQ]fu/J|u$W+/' );
define( 'LOGGED_IN_KEY',    ',CA&?+N_[^>D1`U:f1,IXTyLwAxhnzi@*+5$*Jx1RRHHm)9ZX,5RBzgK>bv3n}V{' );
define( 'NONCE_KEY',        'l.}EkR[L~yr=uGaJ$bnnE{:g}9,7(OgKLw|hE@-cw;fV_2-hF@bQh_j-W2(jvmjq' );
define( 'AUTH_SALT',        'MJC*ryW[EC:nAcd/G*&%xs5=pR$]259:#xW?m&(Me2jaB;T,|k>/V|^v(KrCQS]>' );
define( 'SECURE_AUTH_SALT', '@2{k:*K.nUo:)r5TJKAF}3?UqpOdV2/!RM }GKU.Agp,6Y>s}e/Pk%^iromcgFux' );
define( 'LOGGED_IN_SALT',   'V+CMKbDV1WI;nuB9=g7&F:DtD tl#xCL(3Er^L;ddbJ?2sPWeaAA^>`B*/?h.*$W' );
define( 'NONCE_SALT',       '+{8U>)AuH%[D3yo)`)vfo`=;Mp.B1%}wV)20w#DcN SU;hhh}faMxJ#]sonUH6Ng' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp';

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
define( 'WP_DEBUG', true );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
