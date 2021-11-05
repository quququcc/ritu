<?php
/**
 * Created by PhpStorm.
 * User: weiming
 * Date: 2021/11/4
 * Time: 23:42
 */

namespace app\ajax\controller;


use app\admin\model\SiteNews;

class News
{
    public function list($page = 1)
    {
        $limit = 10;
        $data = (new SiteNews())->field(['id', 'title', 'descript', 'image', 'created'])->limit(($page - 1) * $limit, $limit)->order('created')->select()->toArray() ?? [];
        foreach ($data as $k => $v) {
            $data[$k]['created'] = date('Y-m-d', strtotime($v['created']));
        }
        $num = (new SiteNews())->count();
        return json_encode([
            'list' => $data,
            'page' => $page,
            'num' => $num,
            'page_num' => ceil($num / $limit)
        ]);
    }

    public function detail($id)
    {
        $data = (new SiteNews())->where('id',$id)->find()->toArray();
        $data['created'] = date('Y-m-d', strtotime($data['created']));
        return json_encode($data);
    }
}