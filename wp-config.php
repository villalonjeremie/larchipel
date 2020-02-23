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
define( 'DB_NAME', 'local' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'x/RRWRHE5SnfYUBD8+/smeYTAWhbBxn6Nf4V90RWA3Hy0woVreXW5gYHkr6WZMVO68yXnjPSZd0aFRqeBeJUNg==');
define('SECURE_AUTH_KEY',  'r1vhNEsZEH9Kkx2Cde2Z6z04SB45K/PLcnP6p8npyUciYpmigR8D7PVwMi9MYPK7RjMVkeqI8HOKVd0HzlAi1w==');
define('LOGGED_IN_KEY',    'HdkDxW1OTWr/uIwNGIxMXmD0k9GYoL98SdIPwZLaOevc9p+jHgppMEH9P1Fju4Yy3GpXM3IBTzxLrEpc/Cqdbg==');
define('NONCE_KEY',        'LusgwnuzQn5ZZWXOIsRe+szo4PZP/FPa/ZFery7X03OTwxCrWRwLmGXoLge8d41ZOUPu2Q/Ch+GTTWZcPFhnow==');
define('AUTH_SALT',        'wjXFn15XWBWUwx7SHxTZFupzjOrVcdz/GgtHJAA6baOgNnJTykUpweX2mhAsBjIpboRuUkjEIym9Vb0F8criWA==');
define('SECURE_AUTH_SALT', 'W2l3HZc8ofHJ1TSyHnQ1400zh+Xe9Nv4SwWxuhCuEkN1r00tkjJ9Nd2hNJdPipauD+G9q7DTEgbIwM6uNCXM6w==');
define('LOGGED_IN_SALT',   'YbvNk5zlym410Z1YyBhW3chmVA/OqPPBLxsRFLPQIUKVSzjRYXrr3wz+gx92NPcRM1p582f9MP1+QXzqGO49gg==');
define('NONCE_SALT',       'PuhCFLh0KkEDDWoN75/LXZ82BbhfAG+KTDsprtuHbx2XP5hgsRi3dntTyEVEYvbgT/4PaDzY2wvx8mmi6J5ELg==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_ekwuy3nf5x_';




/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
