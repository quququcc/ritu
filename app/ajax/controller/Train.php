<?php
/**
 * Created by PhpStorm.
 * User: weiming
 * Date: 2021/11/4
 * Time: 23:07
 */

namespace app\ajax\controller;


use app\admin\model\SiteTrain;
use app\admin\model\SiteTrainCate;

class Train
{
    public function cate()
    {
        $data = (new SiteTrainCate())->order('sort')->select()->toArray();
        return json_encode($data);
    }

    public function list($cate_id = 0, $page = 1)
    {
        $limit = 9;
        if ($cate_id != 0) {
            $data = (new SiteTrain())->field(['id', 'title', 'descript', 'image'])->where('cate_id', $cate_id)->limit(($page - 1) * $limit, $limit)->order('sort')->order('id')->select()->toArray() ?? [];
        } else {
            $data = (new SiteTrain())->field(['id', 'title', 'descript', 'image'])->limit(($page - 1) * $limit, $limit)->order('sort')->order('id')->select()->toArray() ?? [];
        }
        return json_encode($data);
    }

    public function detail($id)
    {
        $data = (new SiteTrain())->where('id',$id)->find()->toArray();
        return json_encode($data);
    }
}