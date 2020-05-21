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

// Load env vars from .env if available
if (file_exists('.env')) {
    require_once '_config/environment.php';
}

// DB config

define( 'DB_NAME', getenv('DB_NAME'));
define( 'DB_USER', getenv('DB_USER'));
define( 'DB_PASSWORD', getenv('DB_PASS'));
define( 'DB_HOST', getenv('DB_HOST'));
define( 'DB_CHARSET', 'utf8' );
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
define( 'AUTH_KEY',          '' );
define( 'SECURE_AUTH_KEY',   '' );
define( 'LOGGED_IN_KEY',     '' );
define( 'NONCE_KEY',         '' );
define( 'AUTH_SALT',         '' );
define( 'SECURE_AUTH_SALT',  '' );
define( 'LOGGED_IN_SALT',    '' );
define( 'NONCE_SALT',        '' );

// Tables prefix
$table_prefix = getenv('DB_TABLE_PREFIX');

// Uploads dir (relative to base path)
define('UPLOADS', 'data');

// debug
$isProduction = getenv('ENV_MODE') === 'production';
define('WP_DEBUG', !$isProduction);

// S3 Uploads
# define( 'S3_UPLOADS_BUCKET', getenv('S3_BUCKET') );
# define( 'S3_UPLOADS_REGION', getenv('S3_REGION') );
# define( 'S3_UPLOADS_KEY', getenv('S3_KEY') );
# define( 'S3_UPLOADS_SECRET', getenv('S3_SECRET') );


/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}


/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
