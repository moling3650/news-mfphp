<?php
/**
 * @authors moling (365024424@qq.com)
 * @date    2016-09-05 08:34:20
 */
namespace app\Controller;

use core\lib\Model;

class Home
{
    public function index()
    {
        echo "hello world!<hr>";
        $model = new Model();
        dump($model->insert([
            'title' => 'insert test2',
            'content' => 'test2',
            'create_at' => time()
            ]));
        dump($model->update(17, [
                'title' => 'update test',
                'content' => 'test15',
            ]));
        dump($model->delete('22'));
        dump($model->select('*', '`id` >= 15'));
    }
}