<?php
/**
 * @authors moling (365024424@qq.com)
 * @date    2016-09-12 19:31:29
 */
namespace core\lib\Database;

interface InterfaceDB
{
    /**
     * 连接数据库
     * @param  string $host     主机名
     * @param  string $user     用户名
     * @param  string $password 密码
     * @param  string $dbname   数据库名
     * @return void
     */
    public function connect($host, $user, $password, $dbname);

    /**
     * 查询数据库
     * @param  string $sql SQL查询语法
     * @return mixed
     * 1. 查询失败返回false
     * 2. SELECT、SHOW、DESCRIBE 或 EXPLAIN 查询成功时返回结果集array
     * 3. 其余SQL语句查询成功时返回影响行数int
     */
    public function query($sql);

    /**
     * 关闭数据库
     * @return void
     */
    public function close();
}