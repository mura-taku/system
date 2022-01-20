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
define('AUTH_KEY',         'AYJE2Qut5kcjgdcMtC6fLHr+pjci4DcS3h4WIHeoIJaAzQHu3MO0MWHBuQPcdDPZ/CES5PBv3tUpNtDUCbsnWg==');
define('SECURE_AUTH_KEY',  '8Z5Ct+ytNru/EJWMlGeOZYs6cLC925/yK0+qTGt5QP4sVuU7Vk+oZ9ZbIs7g9vqtGCnNz1n7R0QlBZDRNDn2ug==');
define('LOGGED_IN_KEY',    'U3dcFHCwj2xQuLE+UubH9uZGDV6aF8dpURdxcK6kDOdsjw1dBDTTsU5zp+NGLlADsCKgel4+6MqXwgWPohf+hA==');
define('NONCE_KEY',        'fyAVtXma+YtIDF8LwcNJCon+RUO8rPrPA3sarbNjxos6w7bWjX/ZgFMD+8lQH3ygcU2mBVRuY8kKrvhBl2njNw==');
define('AUTH_SALT',        '5Cr/7wXeBbDqCIr82nxkuoPVGga0gO8r6GZfh3aI0kciVcMzOgdngweIIfFtS762+wvZNAChJ8vZtXXTca8zbQ==');
define('SECURE_AUTH_SALT', 'CdI/6hG0DwYXk9IjiYcUunoO8gFpr3xIq/e0t//butGUKgM0w34Sob4hb1an2RDTbmpucPfEs9ZmEHiBO3rSwQ==');
define('LOGGED_IN_SALT',   'UB+ZhYlpMjYp5muKTYDFdJBRhJKcM7c/5ZknS31p3J7lZBQjOTqWi5GnubQKOV79p7PHpngmq0PD4XlBY+u+Fw==');
define('NONCE_SALT',       '+kYmyARMRkcgmHiEAL6ZWCe+b4BI/WXa/ZZ2WcdnMYKqwiS6O1UAGsSH4txrn+SPZ9CMqZb34j2gvHyevMRGMw==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
