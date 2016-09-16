<?php
/**
 * @authors moling (365024424@qq.com)
 * @date    2016-09-12 19:40:35
 */
namespace core\lib\drive\database;

use core\lib\drive\interfaceDB;

class MySQLi implements InterfaceDB
{
    /**
     * 数据库连接
     * @var object
     */
    public $conn;

    /**
     * 连接数据库
     * @param  string $host     主机名
     * @param  string $user     用户名
     * @param  string $password 密码
     * @param  string $dbname   数据库名
     * @return void
     */
    public function connect($host, $user, $password, $dbname)
    {
        $this->conn = @new \mysqli($host, $user, $password, $dbname);

        if ($this->conn->connect_errno) {
            die('连接 MySQL 失败: ' . $this->conn->connect_error);
        }
    }

    /**
     * 查询数据库
     * @param  string $sql SQL查询语法
     * @return mixed
     * 1. 查询失败返回false
     * 2. SELECT、SHOW、DESCRIBE 或 EXPLAIN 查询成功时返回结果集array
     * 3. 其余SQL语句查询成功时返回影响行数int
     */
    public function query($sql)
    {
        $result = $this->conn->query($sql);

        // 查询失败
        if ($result === false) {
            if (DEBUG) {
                die('查询失败：' . $this->conn->error);
            }
            return false;
        }
        // SELECT、SHOW、DESCRIBE 或 EXPLAIN 查询成功
        if (is_object($result)) {
            return $result->fetch_all(MYSQLI_ASSOC);
        }
        // 其余SQL语句查询成功
        return $this->conn->affected_rows;

    }

    /**
     * 关闭数据库连接
     * @return void
     */
    public function close()
    {
        $this->conn->close();
    }
}