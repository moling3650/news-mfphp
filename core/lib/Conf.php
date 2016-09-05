<?php
/**
 * @authors moling (365024424@qq.com)
 * @date    2016-09-05 17:12:49
 */
namespace core\lib;

class Conf
{
    /**
     * 缓存配置文件
     * @var array $conf
     */
    public static $conf = [];
    /**
     * 取得一个配置文件的所有配置或其中一个配置项
     * @param  string $name 配置文件名
     * @param  string $key  配置项名
     * @return 当$key为空时返回文件中所有配置，否则只返回$key这配置项
     */
    public static function get($name, $key=null)
    {
        // 判断配置是否已缓存
        if (isset(self::$conf[$name])) {
            $config = self::$conf[$name];
        } else {
            // 判断配置文件是否存在
            $file = CONFIG_DIR . '/' . $name . '.php';
            if (!is_file($file)) {
                throw new \Exception('没有这个配置文件');
            }
            // 导入文件并缓存配置
            $config = require $file;
            self::$conf[$name] = $config;
        }

        // 如果$key为null则返回所有的设置
        if (is_null($key)) {
            return $config;
        }
        // 判断配置项是否存在并返回
        if (isset($config[$key])) {
            return $config[$key];
        } else {
            throw new \Exception('没有这个配置项');
       }
    }
}