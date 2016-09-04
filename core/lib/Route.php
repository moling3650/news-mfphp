<?php
/**
 * @authors moling (365024424@qq.com)
 * @date    2016-09-04 22:32:23
 */
namespace core\lib;

class Route
{
    /**
     * 控制器名
     * @var string
     */
    public $controller;

    /**
     * 控制器的行为
     * @var string
     */
    public $action;

    /**
     * 初始化控制器和行为
     */
    public function __construct()
    {
        if (!isset($_SERVER['REQUEST_URI'])) {
            throw new \Exception('Request URI is missing.');
        }

        $patharr = explode('/', trim($_SERVER['REQUEST_URI'], '/'));
        $this->controller = !empty($patharr[0]) ? $patharr[0] : 'Index';
        $this->action = !empty($patharr[1]) ? $patharr[1] : 'index';
    }
}