<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
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
define( 'DB_NAME' , 'wapress' );

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
define( 'AUTH_KEY',         'i7Me)*gD8H3+k? *rw&dtFPNp$K-FXVDVzL,c(6V)xTR5)1IY>Rqkg$[0WE|gE6z' );
define( 'SECURE_AUTH_KEY',  'WE^Bar>r*7y6W}k9tPm9hW1KPz0KLm/U7=Lt=2vx;= j*W4zAU@J3;_DB!$rI~tb' );
define( 'LOGGED_IN_KEY',    'VncOpd@V,g#SDi ZgQIA2F}xWD-w!Hmtu^SS>{E,#?z:{=rc!t-HNw akB{|0VQ,' );
define( 'NONCE_KEY',        '?] 2k03H/qdp$+M4j>KL9//Iv1X|L0&FZ^9KX,YhO5G3kX[|S;~7jHcW}wd?<+:}' );
define( 'AUTH_SALT',        '{W-Udx=Jo[tl!).xr*J6uwbc  fq9ZuZcD,Awom^{K{.oVku50AH^1iEy|xWRU:K' );
define( 'SECURE_AUTH_SALT', 'AqT0ZwG+GJ:EZ!/z+0)I|GiuzX2`{4[>D_9iA->vtLvzEN1}>^7hpr71stc;voQ1' );
define( 'LOGGED_IN_SALT',   '10/DwkvbHv87S+lmUuYa,DAS7meWO2U(`SPz2etW)#2LJ-~Lw=:PYg.V8g$$Er2.' );
define( 'NONCE_SALT',       ')LXdy{;*/Dq|S@|<n=R[hvZPolN_?Z7D.U7wmcTiV-iydI50.X}tT@?7D|[sRwDw' );

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
