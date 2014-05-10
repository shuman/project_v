<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'projectv');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '%JfH?>|Dpr<-{Eb#Uj^Ykm (KpC43!Q-5xF653HU$y<Qg:DF:Qt:2ds7ZCE}t+e#');
define('SECURE_AUTH_KEY',  'c6@OtG`+>K-T^VY=7a~z-nQmx!M_A=Xb(&0-:`U-~4%Q$C#U2|ro,|y^~Y?MQK^8');
define('LOGGED_IN_KEY',    '0rH|k4|[Y%beN&#%l]ADFHwoY(Y9LDcd X}?[z1MSh=_dG_Fb$IE~Yd8t*!3A=yO');
define('NONCE_KEY',        '|r]-<@sx<K2{X<F$M.@vX*|;O e<[z*kSVk@G0+uY|S|nM1{SJK);fxH$^<*=F@D');
define('AUTH_SALT',        '|$;]l)]<ydsz5m.hk7Fbny@~1^VKz*tQ:ewO/<9ye++<*doe-M!^V-g(.&BM`V{Z');
define('SECURE_AUTH_SALT', '6<^z3_>,[p5D]TZr|3*Rz}Dr/ndX.WK(rV=6h>}vvG@80p[!j IM)B4+9h|!5Kte');
define('LOGGED_IN_SALT',   ')EI@&mGo%cma%g?QgTmc(v8u(hPJ7,G=)z4VVa!kPU2/B0hB4MEnE-4wE@ln[k7@');
define('NONCE_SALT',       '@;{(3h$FOE:v%kLO+c&36Opu!hNzis_UW. VJb:tQ%g+,I4W|)|j9J|VS !?AQ-s');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
