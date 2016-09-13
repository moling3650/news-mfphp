<?php
/**
 * @authors moling (365024424@qq.com)
 * @date    2016-09-12 19:27:30
 */
namespace core\lib;

class Database
{
    protected $db;
    public function __construct($host, $uesr, $password, $dbname, $drive='MySQLi')
    {
        $DB = 'core\lib\Database\\' . $drive;
        $this->db = new $DB();
        $this->db->connect($host, $uesr, $password, $dbname);
    }

    public function test($sql)
    {
        return $this->db->query($sql);
    }
}