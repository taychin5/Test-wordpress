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

$stringfromfile = file('.git/HEAD', FILE_USE_INCLUDE_PATH);
$firstLine = $stringfromfile[0]; //get the string from the array
$explodedstring = explode("/", $firstLine, 3); //seperate out by the "/" in the string
$branchname = $explodedstring[2]; //get the one that is always the branch name
$branchname = trim($branchname);
if ($branchname !== 'master') {
	define('DB_NAME', 'local');
	define('DB_USER', 'root');
	define('DB_PASSWORD', 'root');
	define('DB_HOST', 'localhost');
} else {
	define('DB_NAME', 'wordpress');

	/** Database username */
	define('DB_USER', 'wordpress');

	/** Database password */
	define('DB_PASSWORD', 'b0e303f446b2c5af6c850cfb7cbe6af577884b26a591e43c');

	/** Database hostname */

	define('DB_HOST', 'localhost');

	/** Database charset to use in creating database tables. */
	define('DB_CHARSET', 'utf8');

	/** The database collate type. Don't change this if in doubt. */
	define('DB_COLLATE', '');
}

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
define('AUTH_KEY',         '%o}0C~Ou@*shm|HJCx </A?p1~J(A&4:*I{Wf@6jwE1H%s0U7V;8pKDVry,548;r');
define('SECURE_AUTH_KEY',  ')uZ(7.kZ,Hgc-*sIOb;-%K`8TVD />cL>2x!%Mj<g-Hg8(qY!53Boa.]n0Oeymh%');
define('LOGGED_IN_KEY',    'p7%eBmkhI<3~n9FB*q_xz P*C>bwFGyp%nE3& DV-QL;sRr:Gg5{$C3Iv})*$IeU');
define('NONCE_KEY',        '/D{w7f+-#ee2,8 2@hBks3pGoaH5V((l#%/zW. P4*{j[6l[<:CVNesdDw37DfnQ');
define('AUTH_SALT',        'cy8!vTxwk6!ia4F`v!@g;`.B0^9%>lwZ;}X 1m3{of2|MbCTRfx~yU|C)@D^w5%J');
define('SECURE_AUTH_SALT', 'V;qDsS~!L$f10C._`j_@=_m$5E||[UA6Wi><eKu<}Ck[5ECFI}@RCN/4Ib<WrdgX');
define('LOGGED_IN_SALT',   'nfy.M!1EnSUwO$]b*)]{)LYAV&Gf#SM=+_-s<(GSv%h_&{[j*:]>.Lus&4~/ )A&');
define('NONCE_SALT',       'Oi.8$/%$E?v4u,3%,4pPdGUE-1i_0k;*UsL~`>AsR>oUA#l|&0Ud/l1$nXi<b[{H');

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define('WP_DEBUG', false);

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if (!defined('ABSPATH')) {
	define('ABSPATH', __DIR__ . '/');
}

$protocol = stripos($_SERVER['SERVER_PROTOCOL'], 'https') === 0 ? 'https://' : 'http://';
define('WP_SITEURL', $protocol . $_SERVER['HTTP_HOST']);
define('WP_HOME', $protocol . $_SERVER['HTTP_HOST']);


/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
