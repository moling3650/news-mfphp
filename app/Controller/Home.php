<?php
/**
 * @authors moling (365024424@qq.com)
 * @date    2016-09-05 08:34:20
 */
namespace app\Controller;

use core\lib\Database;

class Home
{
    public function index()
    {
        echo "hello world!<hr>";
        $db = new Database('localhost', 'root', 'test', 'test');
        dump($db->test('SHOW TABLES;'));
    }

}