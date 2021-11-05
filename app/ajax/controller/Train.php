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
            $num = (new SiteTrain())->where('cate_id', $cate_id)->count();
        } else {
            $data = (new SiteTrain())->field(['id', 'title', 'descript', 'image'])->limit(($page - 1) * $limit, $limit)->order('sort')->order('id')->select()->toArray() ?? [];
            $num = (new SiteTrain())->count();
        }
        return json_encode([
            'list' => $data,
            'page' => $page,
            'num' => $num,
            'page_num' => ceil($num / $limit)
        ]);
    }

    public function detail($id)
    {
        $data = (new SiteTrain())->where('id',$id)->find()->toArray();
        //获取上一篇下一篇
        $prev = (new SiteTrain())->field(['id','title'])->where('id','<',$id)->limit(1)->find()->toArray() ?? [];
        $next = (new SiteTrain())->field(['id','title'])->where('id','>',$id)->limit(1)->find()->toArray() ?? [];

        $return = [
            'detail'=>$data,
            'prev'=>$prev,
            'next'=>$next,
        ];

        return json_encode($return);
    }
}