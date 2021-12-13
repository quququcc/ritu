<?php
/**
 * Created by PhpStorm.
 * User: weiming
 * Date: 2021/12/14
 * Time: 4:46
 */

namespace app\ajax\controller;


use app\admin\model\SiteResNews;

class News
{
    public function index($page = 1)
    {
        $data = (new SiteResNews())->field('id,title,descript,image,view_num,publish_time')->order('publish_time')->page($page, 5)->select();
        $count = (new SiteResNews())->count();

        foreach ($data as &$v) {
            $v['publish_time'] = date('Y/m/d', strtotime($v['publish_time']));
        }

        return json_encode([
            'list' => $data,
            'page' => (int)$page,
            'limit' => 5,
            'page_num' => ceil($count / 5),
        ]);
    }

    public function detail($id = 1)
    {
        $data = (new SiteResNews())->where('id', $id)->find();

        $hot = (new SiteResNews())->field('id,title,descript,image,view_num,publish_time')->where('id', '<>', $id)->limit(3)->order('publish_time')->select();

        return json_encode([
            'detail'=>$data,
            'hot_news'=>$hot
        ]);
    }
}