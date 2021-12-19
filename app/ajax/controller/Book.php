<?php
/**
 * Created by PhpStorm.
 * User: weiming
 * Date: 2021/12/14
 * Time: 4:35
 */

namespace app\ajax\controller;


use app\admin\model\SiteBannerInside;
use app\admin\model\SiteConfigBottom1;
use app\admin\model\SiteResBook;
use app\admin\model\SiteResNews;
use app\Request;
use think\response\Json;

class Book
{
    public function index()
    {
        //banner数据
        $data['banner'] = (new SiteBannerInside())
            ->field('title,title_color,title_s1,title_s1_color,background')
            ->where('id', 6)->find();

        //猜你想看(公司动态)
        $recommend = (new SiteResNews())
            ->field('id,title')
            ->order('view_num')
            ->limit(6)->select();
        $data['recommend'] = $recommend;

        $data['bottom'] = (new SiteConfigBottom1())->where('sign','res_book')->find();

        return json_encode($data);
    }

    public function list(Request $request)
    {
        $page = $request->param('page',1);
        $data = (new SiteResBook())->field('title,form_link,image,descript,path')->order('sort')->page($page, 9)->select();
        $count = (new SiteResBook())->count();

        return json_encode([
            'list' => $data,
            'page' => (int)$page,
            'limit' => 9,
            'page_num' => ceil($count / 9),
        ]);
    }

    /**
     * @note: 站点顶部白皮书信息
     * @return Json
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     */
    public function top()
    {
        $data = (new SiteResBook())->field('id,title,form_link,path')->order('id')->find();

        return json_encode($data);
    }
}