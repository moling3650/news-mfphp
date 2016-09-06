<?php
/**
 * @authors moling (365024424@qq.com)
 * @date    2016-09-04 20:57:37
 */
namespace core\lib;

class Loader
{
    /**
     * 自动加载类
     * 当'new \foo\Bar()'时会从'/path/to/project/foo/Bar.php'加载
     * @param  string $class 类的全名（带命名空间）
     * @return void          当文件存在就加载
     */
    public static function autoload($class)
    {
        $file = BASE_DIR . '/' . str_replace('\\', '/', $class) . '.php';

        if (is_file($file)) {
            require $file;
        } else if (DEBUG) {
            throw new \Exception('没有找到文件： ' . $file);
        }
    }
}