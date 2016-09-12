<?php
/**
 * @authors moling (365024424@qq.com)
 * @date    2016-09-12 19:40:35
 */
namespace core\lib\Database;

use core\lib\Database\InterfaceDB;

class MySQLi implements InterfaceDB
{
    public $conn;

    public function connect($host, $user, $password, $dbname)
    {
        // 连接数据库
        $this->conn = @new \mysqli($host, $user, $password, $dbname);
        // 检查连接是否成功
        if ($this->conn->connect_errno) {
            die('连接 MySQL 失败: ' . $this->conn->connect_error);
        }
    }

    public function query($sql)
    {
        return $this->conn->query($sql);
    }

    public function close()
    {
        $this->conn->close();
    }
}