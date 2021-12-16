<?php
/**
 * Created by PhpStorm.
 * User: weiming
 * Date: 2021/12/14
 * Time: 4:43
 */

namespace app\ajax\controller;


use app\admin\model\SiteBannerInside;
use app\admin\model\SiteResNews;
use app\admin\model\SiteResTop;
use app\Request;

class Top
{
    public function index()
    {
        //banner数据
        $data['banner'] = (new SiteBannerInside())
            ->field('title,title_color,title_s1,title_s1_color,background')
            ->where('id', 8)->find();

        //猜你想看(公司动态)
        $recommend = (new SiteResNews())
            ->field('id,title')
            ->order('view_num')
            ->limit(6)->select();
        $data['recommend'] = $recommend;

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