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
define( 'DB_NAME', 'lutron_wp' );

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
define( 'AUTH_KEY',         '+i^:){yf&eVXh@ER~pPoQcR?#^|g,Uo9-hvH.*+@Ongz`mH?|R~1VkgiD#!=ef:e' );
define( 'SECURE_AUTH_KEY',  ',k7-wQN~T{hXldO6rKKG,gF]<$>cUsWOr_eV?Z/Zo)oOO!T4RtV!^`!SK:vs{bm~' );
define( 'LOGGED_IN_KEY',    '[+;{6TsNgaBlJ%}0!r_S2B)V.2=os$>2p7`urVFlQ7|j8Y{V*yA qsG6=:Mn#9|_' );
define( 'NONCE_KEY',        'Q9odZ#y=}I;2}pfU[ViG2JPSH#z%i=03~BcZ3dC[=6-osHPf/:rrEKjF]AbAOPDn' );
define( 'AUTH_SALT',        ' hv>3: 7t@R.<1j:8^rl($W/Nsls*MUW1fk{l()#dqpm*2MHi%d6?AbqxqlTvCAd' );
define( 'SECURE_AUTH_SALT', 't9c#ft}S-}o+l~f5UEs7e@`itHiza2c}9B<IR}eh&kzxUuGa[(6Sx#a!d`EG#Qj!' );
define( 'LOGGED_IN_SALT',   '5eGGL;;u8Q00z)3_ft^s3)Lq(IS@xNG#6vCIe;M`Bday>cwlD#SIZPcX2@=kE:s5' );
define( 'NONCE_SALT',       '#)Foui)&P9_X6JL3V+R|S^X$!^qgPU!z[Y@~5|fL%6q5DVTimc_3gp:[EaegQ$G5' );

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
define( 'WP_DEBUG', true );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
