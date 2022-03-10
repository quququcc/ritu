<?php
/**
 * Created by PhpStorm.
 * User: weiming
 * Date: 2021/12/14
 * Time: 4:46
 */

namespace app\ajax\controller;


use app\admin\model\SiteBannerInside;
use app\admin\model\SiteConfigBottom1;
use app\admin\model\SiteResNews;
use app\admin\model\SiteSeo;
use app\Request;

class News
{
    public function index()
    {
        //head数据
        $data['head'] = (new SiteSeo())->withoutField('id')->where('sign', 'news')->find();

        //banner数据
        $data['banner'] = (new SiteBannerInside())
            ->field('title,title_color,title_s1,title_s1_color,background,button1,button1_link,button2,button2_link')
            ->where('id', 10)->find();

        $data['bottom'] = (new SiteConfigBottom1())->where('sign','res_news')->find();

        return json_encode($data);
    }

    public function list(Request $request)
    {
        $page = $request->param('page',1);
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

    public function detail(Request $request)
    {
        $id = $request->param('id',0);
        if($id==0){
            return "参数错误";
        }

        $data = (new SiteResNews())->where('id', $id)->find();

        $hot = (new SiteResNews())->field('id,title,descript,image,view_num,publish_time')->where('id', '<>', $id)->limit(3)->order('publish_time')->select();

        return json_encode([
            'detail'=>$data,
            'hot_news'=>$hot
        ]);
    }
}