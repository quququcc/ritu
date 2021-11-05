<?php
/**
 * Created by PhpStorm.
 * User: weiming
 * Date: 2021/11/4
 * Time: 23:49
 */

namespace app\ajax\controller;


use app\admin\model\SiteThink;

class Think
{
    public function list($page)
    {
        $limit = 8;
        $data = (new SiteThink())->field(['id', 'title', 'descript', 'created'])->order('created')->limit(($page - 1) * $limit, $limit)->select()->toArray() ?? [];
        foreach ($data as $k => $v) {
            $data[$k]['created'] = date('Y-m-d', strtotime($v['created']));
        }
        $num = (new SiteThink())->count();
        return json_encode([
            'list' => $data,
            'page' => $page,
            'num' => $num,
            'page_num' => ceil($num / $limit)
        ]);
    }

    public function detail($id)
    {
        $data = (new SiteThink())->where('id',$id)->find()->toArray();
        $data['created'] = date('Y-m-d', strtotime($data['created']));
        return json_encode($data);
    }
}