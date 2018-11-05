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
define('DB_NAME', 'mywordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         '*042fdEZnSkR9f,l Nch!gsb<mP|(t=lkd<~:TfU_rLDwQ6QsW:4:!?UReKn<t^[');
define('SECURE_AUTH_KEY',  'J-CLo~kj*}C$M1>fC@:PHxa81L=N@hl`&8k^Gi2uXZ+mjE-n`*1)~8-f6m-oMzJq');
define('LOGGED_IN_KEY',    'rc$C@cu&wAs.TJuq=6>{|.,@8bZxpe(k#v]2!dWby!6WpfEQ2GbHLX^6so,K1gh:');
define('NONCE_KEY',        'N_%;H#s%f@.xL2Zg.L_61`QDo$47@FmXGpG|2*53*@E?rfb+Ly{*-]#V/+?gap[&');
define('AUTH_SALT',        'FQfknsh|.n<b?!8rbu*G=Fk>rBUBhpIBoZk{;xdCy;LaXQ(vRdwUbXGc{3F?T88Q');
define('SECURE_AUTH_SALT', '4B6}DwAC{eJjC+al% `{=Yt{-S33oyOOU|4$Xp=[Xb*O_TbgKjeFNgR9@DB JKI&');
define('LOGGED_IN_SALT',   '5Q6uNf>EO2bZgn3G*&iWJG$*KA(7b(=BqetYAw<~O96%rBcHScN;4G8T_[#]1xBe');
define('NONCE_SALT',       'V?BY=9@)lP~g>ihJ,oYSW.co-H$z`ya3$/IPYDWPx@VwqSU3F|ks$+Ym:9VT*4&n');

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
