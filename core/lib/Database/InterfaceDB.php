<?php
/**
 * @authors moling (365024424@qq.com)
 * @date    2016-09-12 19:31:29
 */
namespace core\lib\Database;

interface InterfaceDB
{
    public function connect($host, $user, $password, $dbname);
    public function query($sql);
    public function close();
}