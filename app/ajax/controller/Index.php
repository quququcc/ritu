<?php

namespace app\ajax\controller;

use app\admin\model\SiteCases;
use app\admin\model\SiteDrill;
use app\admin\model\SiteNews;
use app\admin\model\SiteTeam;

class Index
{
    /**
     * @note: 首页所有数据接口
     * @return string
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     */
    public function index()
    {
        $data = array();
        //咨询产品与落地方案

        //项目服务优势

        //课程落地风采 使用人才训练内容
        $data['style'] = (new SiteDrill())->field(['id', 'title', 'image'])->limit(4)->order('created')->select()->toArray() ?? [];

        //专家团队介绍
        $data['team'] = (new SiteTeam())->order('sort')->select()->toArray();

        //服务案例展示
        $data['case'] = (new SiteCases())->field(['name', 'image'])->limit(18)->order('sort','asc')->select()->toArray() ?? [];

        //新闻资讯
        $data['news'] = (new SiteNews())->field(['id', 'title', 'descript', 'image', 'created'])->limit(5)->order('created')->select()->toArray() ?? [];

        return json_encode($data);
    }
}
