<?php
/**
 * @authors moling (365024424@qq.com)
 * @date    2016-09-17 13:46:25
 */
namespace core\lib;

use core\lib\Conf;

abstract class ModelMedoo
{
    public $link;
    protected $table;
    public function __construct()
    {
        $this->link = new \medoo(Conf::get('database', 'medoo'));
    }

    /**
     * 查询结果集
     * @param  string/array $columns 选择的字段
     * @param  array        $where   筛选查询的条件
     * @return array                 结果集
     */
    public function select($columns='*', $where=null)
    {
        return $this->link->select($this->table, $columns, $where);
    }

    /**
     * 插入数据
     * @param  array $datas 插入的数据集
     * @return mixed        最后插入的主键
     */
    public function insert($datas)
    {
        return $this->link->insert($this->table, $datas);
    }

    /**
     * 更新数据
     * @param  array $datas 更新的数据集
     * @param  array $where 筛选更新的条件
     * @return int          更新的行数
     */
    public function update($datas, $where=null)
    {
        return $this->link->update($this->table, $datas, $where);
    }

    /**
     * 删除数据
     * @param  array $where 筛选删除的条件
     * @return int          删除的行数
     */
    public function delete($where)
    {
        return $this->link->delete($this->table, $where);
    }

    /**
     * 查询一条数据
     * @param  string/array $columns 查询的字段
     * @param  array $where          筛选查询的条件
     * @return string/array          第一条结果的字段
     */
    public function get($columns, $where=null)
    {
        return $this->link->get($this->table, $columns, $where);
    }

    /**
     * 查询表的行数
     * @param  array $where 筛选查询的条件
     * @return int          符合条件的行数
     */
    public function count($where=null)
    {
        return $this->link->count($this->table, $where);
    }
}