<?php
/**
 * Created by PhpStorm.
 * User: FS
 * Date: 2021/12/14
 * Time: 17:45
 */

namespace app\ajax\controller;


use app\admin\model\SiteConfigLink;

class Config
{
    public function link()
    {
        $data = (new SiteConfigLink())->field('name,link')->order('sort')->select();
        return json_encode($data);
    }
}