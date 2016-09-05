<?php
/**
 * @authors moling (365024424@qq.com)
 * @date    2016-09-05 14:09:53
 */
namespace core\lib;

class Factory
{
    /**
     * 根据一个名称生成一个类的实例
     * @param  string $name   类的名称
     * @param  string $prefix 命名空间的前缀
     * @return object         返回类的实例
     */
    public static function create($name, $prefix='\app')
    {
        $Class = $prefix . $name;
        return new $Class();
    }

    /**
     * 根据一个名称生成一个模型的实例
     * @param  string $name   模型的名称
     * @param  string $prefix 命名空间的前缀
     * @return objest         返回模型的实例
     */
    public static function getModel($name, $prefix='\app')
    {
        return self::create($name, $prefix . '\Model\\');
    }

    /**
     * 根据一个名称生成一个控制器的实例
     * @param  string $name   控制器的名称
     * @param  string $prefix 命名空间的前缀
     * @return bojest         返回控制器的实例
     */
    public function getController($name, $prefix='\app')
    {
        return self::create($name, $prefix . '\Controller\\');
    }
}