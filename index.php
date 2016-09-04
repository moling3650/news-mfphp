<?php
/**
 * @authors moling (365024424@qq.com)
 * @date    2016-09-04 20:01:55
 */
define('BASE_DIR', __DIR__);
define('DEBUG', true);

if (DEBUG) {
    ini_set('display_error', 'On');
} else {
    ini_set('display_error', 'Off');
}

echo 'hello, world!';