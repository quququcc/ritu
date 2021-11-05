<?php
/**
 * Created by PhpStorm.
 * User: weiming
 * Date: 2021/11/4
 * Time: 23:27
 */

namespace app\ajax\controller;


use app\admin\model\SiteDrill;

class Drill
{
    public function list($page = 1)
    {
        $limit = 9;
        $data = (new SiteDrill())->field(['id', 'title', 'descript', 'image','created'])->limit(($page - 1) * $limit, $limit)->order('created')->select()->toArray() ?? [];
        $num = (new SiteDrill())->count();
        foreach ($data as $k=>$v){
            $data[$k]['created'] = date('Y年m月d日',strtotime($v['created']));
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
        $data = (new SiteDrill())->where('id',$id)->find()->toArray();
        $data['created'] = date('Y年m月d日',strtotime($data['created']));
        //获取上一篇下一篇
        $prev = (new SiteDrill())->field(['id','title'])->where('id','<',$id)->limit(1)->find()->toArray() ?? [];
        $next = (new SiteDrill())->field(['id','title'])->where('id','>',$id)->limit(1)->find()->toArray() ?? [];

        $return = [
            'detail'=>$data,
            'prev'=>$prev,
            'next'=>$next,
        ];

        return json_encode($return);
    }
}