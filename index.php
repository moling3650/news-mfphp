<?php
/**
 * @authors moling (365024424@qq.com)
 * @date    2016-09-04 20:01:55
 */
// 定义项目常量
define('BASE_DIR', __DIR__);
define('CONFIG_DIR', BASE_DIR . '/core/config');

define('DEBUG', true);

// 开启或关闭debug模式
if (DEBUG) {
    ini_set('display_error', 'On');
} else {
    ini_set('display_error', 'Off');
}

// 自动加载类
require BASE_DIR . '/core/lib/Loader.php';
spl_autoload_register('\core\lib\Loader::autoload');

\core\Main::run();