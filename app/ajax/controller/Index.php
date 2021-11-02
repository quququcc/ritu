<?php

namespace app\ajax\controller;

use app\ajax\model\SiteIndex;
use app\ajax\model\SiteAdvantage;
use app\ajax\model\SiteSolution;
use app\ajax\model\SiteProducts;
use app\ajax\model\SiteProject;
use app\ajax\model\SitePartner;

class Index
{
    /**
     * @note: 首页所有数据接口
     * @return string
     */
    public function index()
    {
        $data = array();
        //背景图
        $data['background'] = (new SiteIndex)->field(['background_1', 'background_2'])->where('id', 1)->find()->toArray();

        //我们的优势
        $data['advantage'] = (new SiteAdvantage)->order('sort')->select()->toArray() ?? [];

        //解决方案
        $data['solution'] = (new SiteSolution)->order('index_order')->select()->toArray() ?? [];

        //产品中心
        $data['products'] = (new SiteProducts)->field(['id','title','image'])->limit(6)->order('id')->select();

        //项目案例
        $data['project'] = (new SiteProject)->field(['id','title','image'])->limit(10)->order('id')->select();

        //合作伙伴
        $data['partner'] = (new SitePartner)->select()->toArray() ?? [];

        return json_encode($data);
    }
}
