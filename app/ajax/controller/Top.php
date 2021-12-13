<?php
/**
 * Created by PhpStorm.
 * User: weiming
 * Date: 2021/12/14
 * Time: 4:43
 */

namespace app\ajax\controller;


use app\admin\model\SiteResTop;

class Top
{
    public function index($page = 1)
    {
        $data = (new SiteResTop())->field('title,image,descript,path')->order('sort')->page($page, 9)->select();
        $count = (new SiteResTop())->count();

        return json_encode([
            'list' => $data,
            'page' => (int)$page,
            'limit' => 9,
            'page_num' => ceil($count/9),
        ]);
    }
}