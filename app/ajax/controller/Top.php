<?php
/**
 * Created by PhpStorm.
 * User: weiming
 * Date: 2021/12/14
 * Time: 4:43
 */

namespace app\ajax\controller;


use app\admin\model\SiteBannerInside;
use app\admin\model\SiteConfigBottom1;
use app\admin\model\SiteResNews;
use app\admin\model\SiteResTop;
use app\admin\model\SiteSeo;
use app\Request;

class Top
{
    public function index()
    {
        //head数据
        $data['head'] = (new SiteSeo())->withoutField('id')->where('sign', 'top')->find();

        //banner数据
        $data['banner'] = (new SiteBannerInside())
            ->field('title,title_color,title_s1,title_s1_color,background,button1,button1_link,button2,button2_link')
            ->where('id', 8)->find();

        //猜你想看(公司动态)
        $recommend = (new SiteResNews())
            ->field('id,title')
            ->order('view_num')
            ->limit(6)->select();
        $data['recommend'] = $recommend;

        $data['bottom'] = (new SiteConfigBottom1())->where('sign','res_top')->find();
        return json_encode($data);
    }

    public function list(Request $request)
    {
        $page = $request->param('page',1);
        $data = (new SiteResTop())->field('title,form_link,image,descript,path')->order('sort')->page($page, 9)->select();
        $count = (new SiteResTop())->count();

        return json_encode([
            'list' => $data,
            'page' => (int)$page,
            'limit' => 9,
            'page_num' => ceil($count/9),
        ]);
    }
}