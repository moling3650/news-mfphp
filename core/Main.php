<?php
/**
 * @authors moling (365024424@qq.com)
 * @date    2016-09-04 20:19:53
 */
namespace core;

use core\lib\Route;
use core\lib\Factory;

class Main
{
    /**
     * 启动框架
     * @return void
     */
    public static function run()
    {
        $route = new Route();
        $action = $route->action;
        Factory::getController($route->controller)->$action();
    }
}