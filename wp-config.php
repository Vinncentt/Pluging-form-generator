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
define( 'DB_NAME', 'Gform' );

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
define( 'AUTH_KEY',         '&kF|wU!p,g>NH75|0Kn=GVvoaR[.4Klg<PFv[-v_Y4w8(N!4z;hoZg* Z]y0Y$AY' );
define( 'SECURE_AUTH_KEY',  'KEn5zFPJ;RY5ZH)[)n48!|,9?c*S(h&07#mrfxt`A}NMM^Pq>*^I*c8.=WNEktJA' );
define( 'LOGGED_IN_KEY',    '?xeP)Fr|^(=GIWvbjY==G{fEB-.LfIVvk%[H-ki7k8E_:rf:*`y_me;qt{czy>&w' );
define( 'NONCE_KEY',        'kj~4[eKn%8949-NQxJ1lN7eOwFF1v6A2V{.?5y7/KVY1o*MCJM?J:%=.PPJfsWRM' );
define( 'AUTH_SALT',        'Nmn*>-FK}b_Nke+:-i{Yp*#UC(,4T@-LGUW#_t@#MzARM);O/%vfmN_F69`Cz!;^' );
define( 'SECURE_AUTH_SALT', '7<xugVG#ET 87 ??KqxRBJn4$4.R#ONnNhQ3XLq@ZWo&(9BZhf.VHXMap+W(~oC0' );
define( 'LOGGED_IN_SALT',   'WZ<%9/$IC x8Ia-PPq=3VxP0#lTz}4A:: +Wh@4Rl6i6;IzkpgxC)hKwO$kpb)eq' );
define( 'NONCE_SALT',       'HzbH(m)xRAH%T3 )M19h3q74$Sz5,ivB%e.0lGeMBg|3VbycJ/QbH}*_Hwe,r+_#' );

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
