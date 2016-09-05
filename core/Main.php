<?php
/**
 * @authors moling (365024424@qq.com)
 * @date    2016-09-04 20:19:53
 */
namespace core;

class Main
{
    /**
     * 启动框架
     * @return void
     */
    public static function run()
    {
        $route = new \core\lib\Route();
        $Controller = '\app\Controller\\' . $route->controller;
        $action = $route->action;
        $controller = new $Controller();
        $controller->$action();
    }

}