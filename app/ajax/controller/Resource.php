<?php
/**
 * Created by PhpStorm.
 * User: weiming
 * Date: 2021/12/14
 * Time: 4:31
 */

namespace app\ajax\controller;


use app\admin\model\SiteBannerInside;

class Resource
{
    public function index()
    {
        //banner数据
        $data['banner'] = (new SiteBannerInside())
            ->field('title,title_color,title_s1,title_s1_color,background')
            ->where('id', 6)->find();

        return json_encode($data);
    }
}