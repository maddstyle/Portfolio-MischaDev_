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
define('DB_NAME', 'mischaDev_');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost:8888');

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
define('AUTH_KEY',         '>dBjBAA1:^2k3=46cXMoIDt:V/B]CMD;ykkF>:w8R1hL5I>p9c,J#Y`i?R<c+zx3');
define('SECURE_AUTH_KEY',  '5]iMT8zB4m`l>BoXx_d^Tf0[TF]v]K|dD-uzdt7E33Se +ivW4A!6{N5PJ=?wyR6');
define('LOGGED_IN_KEY',    ']D_{Wg kgdH8)Z=6je;knkU*)2qJEgPXDmZV#fP~CpAa>0 &#pBZ<z;$StgQc;VZ');
define('NONCE_KEY',        '5b5BmQ e,;nU>iguTE*l<r_x{fy$^j/7GDMj|z,W0=MSUJ(^O!~md`)a5}WctEEO');
define('AUTH_SALT',        '3uqg<O!D^hQ[7h6C4yHUJf]R04H6KZLn:S/jk :xM_bQktLm6^@>*Q~>&mm)v}PT');
define('SECURE_AUTH_SALT', 'Q-n`4sfub<Jd`oIMIhmX;2$L|PC y_^&niPmLrR-wF_Ghd@~v0qMoe|#^qQaQJ>0');
define('LOGGED_IN_SALT',   'zF(%T?*RAW{;%t$ZJZp=nb)be bAEJ!ir7^!>t# ;M^K|JN9AxY~to !~&)1BZ@5');
define('NONCE_SALT',       ':{/0mM9F%$9eFeh{mLk>]Y|V^[?LDq),@ECh2uE[edhE Av9}_6+C}=Zz9^>|4UW');

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
define('WP_DEBUG', true);

//Enable Debug logging to the /wp-content/debug.log file
define('WP_DEBUG_LOG', true);

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if (!defined('ABSPATH')) {
	define('ABSPATH', __DIR__ . '/');
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
