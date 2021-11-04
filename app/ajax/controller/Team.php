<?php
/**
 * Created by PhpStorm.
 * User: weiming
 * Date: 2021/11/4
 * Time: 23:02
 */

namespace app\ajax\controller;


use app\admin\model\SiteTeam;

class Team
{
    public function index()
    {
        $data = (new SiteTeam())->order('sort')->select()->toArray();
        return json_encode($data);
    }
}