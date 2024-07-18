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
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'db_addwebsolution' );

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
define( 'AUTH_KEY',         ')y:HqtsF0O>{ZjY/h~9eEk*m.MX/0o/X{`pTMAEp;EW_cKe;x,KO>{AA6)-jfJL/' );
define( 'SECURE_AUTH_KEY',  'LWSf!~???~Ho2!a|/(IC{0t+.)|O2qa6n;4:a6D^B8,7IwbF:o5=5$fC>XdLgBJ=' );
define( 'LOGGED_IN_KEY',    ']/5czr4EKWd|W0scLUcr?;?cg9ng.hXbQIlp2I>B*cyV2q~_c4PyQwDRnFh)-xiE' );
define( 'NONCE_KEY',        'BRI>D$XZOo=@~?}F.r.[<M{}uH.hi}TaP-]WtMs9-wDQeMfx=&A(,VIyILv!`_wM' );
define( 'AUTH_SALT',        '@a7u23)td>MWTVeeF61>RU0K2W5+DSpL%[#Z4 #>Ks$E+(N5{?<PX6#P:W5rQSR ' );
define( 'SECURE_AUTH_SALT', '^3=5k=.E`N[%5wI58r[H!C,x<X$3 pAmAbC)OM)iDHUc=0OuA.wa!lG*^<>f4pHb' );
define( 'LOGGED_IN_SALT',   '|(vav*R/1%O0c&C:|Znfkmqw~XvD_{kEklP,k`+y1O;brW80&ySi?7NrEHiZ06al' );
define( 'NONCE_SALT',       'Sv557tMBo|lWPc>U8ZNHG4-weSf5XWbASa=N~G}(#|BLaAp ZD(X5QjA%ui?0sEf' );

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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
