<?php
/**
 * @authors moling (365024424@qq.com)
 * @date    2016-09-12 19:27:30
 */
namespace core\lib;

class Database
{
    protected $db;
    public function __construct($host, $uesr, $password, $dbname, $type='MySQLi')
    {
        $DB = 'core\lib\Database\\' . $type;
        $this->db = new $DB();
        $this->db->connect($host, $uesr, $password, $dbname);
    }

    public function select($table)
    {
        $sql = "SELECT * FROM `$table`;";

        $result_set = $this->db->query($sql);
        if ($result_set) {
            return $result_set->fetch_all(MYSQLI_ASSOC);
        } else {
            die('查询失败');
        }
    }
}