<?php
/**
 * @authors moling (365024424@qq.com)
 * @date    2016-09-12 19:27:30
 */
namespace core\lib;

use core\lib\Conf;

abstract class Model
{
    protected $db;
    protected $table;
    public function __construct()
    {
        extract(Conf::get('database'));
        $DB = 'core\lib\drive\database\\' . $drive;
        $this->db = new $DB();
        $this->db->connect($host, $uesr, $password, $dbname);
    }

    /**
     * SELECT 查询数据
     * @param  mixed  $fields 选择的列，可以是字符串或字符串的数组
     * @param  string $where  筛选的条件
     * @return array          返回选择的结果集
     */
    public function select($fields='*', $where=null)
    {
        $fields = array_map(function ($value) {
            return "`$value`";
        }, is_array($fields) ? $fields : [$fields]);

        $sql = join(' ', ["SELECT", join(', ', $fields), "FROM `$this->table`"]);
        if (!is_null($where)) {
            $sql .= " WHERE $where";
        }
        // dump($sql);
        return $this->db->query($sql);
    }

    /**
     * INSERT INTO 插入一行数据
     * @param  array $data 要插入的一条数据
     * @return int         返回影响行数
     */
    public function insert($data)
    {

        foreach ($data as $key => $value) {
            $keys[] = "`$key`";
            $values[] = is_string($value) ? "'$value'" : $value;
        }

        $sql = join('', ["INSERT INTO `$this->table` (", join(', ', $keys), ") VALUES (", join(', ', $values), ")"]);
        // dump($sql);
        return $this->db->query($sql);
    }

    /**
     * UPDATE 更新一行数据
     * @param  mixed $id   主键：字符串或整数
     * @param  array $data 要更新的数据
     * @return int         影响的行数
     */
    public function update($id, $data)
    {
        foreach ($data as $key => $value) {
            $fields[] = "`$key` = " . (is_string($value) ? "'$value'" : $value);;
        }
        $sql = join(' ', ["UPDATE `$this->table` SET", join(', ', $fields), "WHERE `id` =", $id]);
        // dump($sql);
        return $this->db->query($sql);
    }

    /**
     * DELETE 删除一行数据
     * @param  mixed $id 主键：字符串或整数
     * @return int       影响的行数
     */
    public function delete($id)
    {
        $sql = "DELETE FROM `$this->table` WHERE `id` = " . $id;
        // dump($sql);
        return $this->db->query($sql);
    }
}