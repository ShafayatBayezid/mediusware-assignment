<?php
/**
 * Plugin Name:       Test
 * Plugin URI:
 * Description:
 * Version:           1.0.0
 * Author:
 * Author URI:
 * License:           GPL-2.0+
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       test
 * Domain Path:       /languages
 */


// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}



define ('TEST_VERSION', '1.0.0');
defined ('TEST_PATH') or define ('TEST_PATH', plugin_dir_path (__FILE__));
defined ('TEST_URL') or define ('TEST_URL', plugin_dir_url (__FILE__));
defined ('TEST_BASE_FILE') or define ('TEST_BASE_FILE', __FILE__);
defined ('TEST_BASE_PATH') or define ('TEST_BASE_PATH', plugin_basename (__FILE__));
defined ('TEST_IMG_DIR') or define ('TEST_IMG_DIR', plugin_dir_url (__FILE__) . 'assets/img/');
defined ('TEST_CSS_DIR') or define ('TEST_CSS_DIR', plugin_dir_url (__FILE__) . 'assets/css/');
defined ('TEST_JS_DIR') or define ('TEST_JS_DIR', plugin_dir_url (__FILE__) . 'assets/js/');


require_once TEST_PATH . 'backend/class-test-admin.php';

require_once TEST_PATH . 'frontend/class-test-client.php';