<?php
/**
 * Created by PhpStorm.
 * User: weiming
 * Date: 2021/11/4
 * Time: 23:33
 */

namespace app\ajax\controller;


use app\admin\model\SiteCases;

class Cases
{
    public function list($page = 1)
    {
        $limit = 18;
        $data = (new SiteCases())->field(['name', 'image'])->limit(($page - 1) * $limit, $limit)->order('sort','asc')->select()->toArray() ?? [];
        $num = (new SiteCases())->count();
        return json_encode([
            'list' => $data,
            'page' => $page,
            'num' => $num,
            'page_num' => ceil($num / $limit)
        ]);
    }
}