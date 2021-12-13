<?php
/**
 * Created by PhpStorm.
 * User: weiming
 * Date: 2021/12/14
 * Time: 4:35
 */

namespace app\ajax\controller;


use app\admin\model\SiteResBook;

class Book
{
    public function index($page = 1)
    {
        $data = (new SiteResBook())->field('title,image,descript,path')->order('sort')->page($page, 9)->select();
        $count = (new SiteResBook())->count();

        return json_encode([
            'list' => $data,
            'page' => (int)$page,
            'limit' => 9,
            'page_num' => ceil($count/9),
        ]);
    }
}