<?php
/**
 * Do not edit this file. Edit the config files found in the config/ dir instead.
 * This file is required in the root directory so WordPress can find it.
 * WP is hardcoded to look in its own directory or one directory up for wp-config.php.
 */

/*for troubleshooting uploads*/
//define('WP_MEMORY_LIMIT', '256M');

//define('WP_DEBUG', TRUE);           // Turns on error tracking
//define('WP_DEBUG_DISPLAY', FALSE);  // Suppresses displaying errors on site
//define('WP_DEBUG_LOG', TRUE);       // Records errors in /wp-content/debug.log (unless other location specified)
/*-------------------------------*/


require_once dirname(__DIR__) . '/vendor/autoload.php';
require_once dirname(__DIR__) . '/config/application.php';
require_once ABSPATH . 'wp-settings.php';