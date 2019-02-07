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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
//define('DB_NAME', 'hendragym');
define('DB_NAME', 'hendragym');

/** MySQL database username */
define('DB_USER', 'homestead');
//define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'secret');
//define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');
//define('DB_HOST', '127.0.0.1');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         'VL<=DqGU>*?cT]Oaw^%/ B@$>+ufV-3Zv(MEay,qS]oS<&x/L1>MK$!TV,fzuH <');
define('SECURE_AUTH_KEY',  '=~=C}ms!;b6NOR2tMumCk4=tIqPsZI]x|}t d$68IilEB%Bu|IA^[Ogm5[#T[O47');
define('LOGGED_IN_KEY',    'XBmeL mCVZpPw/;E=iS>vPe=MT~hbwBz|}thP^V2cK_fHrdHA=w0wPnzcM4E,[e)');
define('NONCE_KEY',        'L](|M=b/zQP6^<|KakR_f||Q-orU~pS>w51awGFt!ys_O9.Ih9#}PV?]V??MR3?g');
define('AUTH_SALT',        'K|knS| 7$YO8BbgZaF3Dy1SG8~#~Pm/e6Rw8%&K#%Lmi:pW]V.RzYeUQjUDsF [a');
define('SECURE_AUTH_SALT', '#4,iVTXN3/_B|9<8{okeT!>(<LXSPlx6;+F_f^z#ku `9!|>=FtDPC[a7qk#A-{0');
define('LOGGED_IN_SALT',   '3b >Ef]VvgQ@<bYsJf|Co D$TsKq?vO{m~n-$O1q8MzMLhN?wzdOO5%>@9YO6GI[');
define('NONCE_SALT',       'HmVh}m>X;wbYwM3_Z^Q*] FSDT{6^(8H+g!r;(okV--5@Be~kglZ7Kcp5tE;(V6T');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
