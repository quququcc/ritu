<?php
/**
 * Created by PhpStorm.
 * User: weiming
 * Date: 2021/12/14
 * Time: 2:59
 */

namespace app\ajax\controller;


use app\admin\model\SiteBannerInside;
use app\admin\model\SiteBrandConfig;
use app\admin\model\SiteBrandConfigTitle;
use app\admin\model\SiteBrandContent2;
use app\admin\model\SiteBrandContent2Title;
use app\admin\model\SiteBrandContent6;
use app\admin\model\SiteBrandContent6Title;
use app\admin\model\SiteBrandContent8;
use app\admin\model\SiteBrandContent8Title;
use app\admin\model\SiteBrandDemand;
use app\admin\model\SiteBrandDemandTitle;
use app\admin\model\SiteBrandFlow;
use app\admin\model\SiteBrandFlowTitle;
use app\admin\model\SiteBrandPoint;
use app\admin\model\SiteBrandPointTitle;
use app\admin\model\SiteBrandScheme;
use app\admin\model\SiteBrandSchemeTitle;

class Brand
{
    public function index()
    {
        //banner数据
        $data['banner'] = (new SiteBannerInside())
            ->field('title,title_color,title_s1,title_s1_color,background')
            ->where('id', 3)->find();

        //模块1
        $data['model1'] = [
            'title' => (new SiteBrandPointTitle())->where('id', 1)->value('title'),
            'data' => (new SiteBrandPoint())->field('title,text,image')->order('sort')->select(),
        ];

        //模块2
        $data['model2'] = [
            'title' => (new SiteBrandContent2Title())->field('title,title_s,image')->where('id', 1)->find(),
            'data' => (new SiteBrandContent2())->field('title,text,image')->order('sort')->select(),
        ];

        //模块3
        $data['model3'] = [
            'title' => (new SiteBrandDemandTitle())->where('id', 1)->value('title'),
            'data' => (new SiteBrandDemand())->field('title,text,image')->order('sort')->select(),
        ];

        //模块4
        $data['model4'] = [
            'title' => (new SiteBrandFlowTitle())->where('id', 1)->value('title'),
            'data' => (new SiteBrandFlow())->field('title,text')->order('sort')->select(),
        ];

        //模块5
        $data['model5'] = [
            'title' => (new SiteBrandConfigTitle())->field('title,title_s')->where('id', 1)->select(),
            'data' => (new SiteBrandConfig())->field('image,text')->order('sort')->select(),
        ];

        //模块6
        $data['model6'] = [
            'title' => (new SiteBrandContent6Title())->where('id', 1)->value('title'),
            'data' => (new SiteBrandContent6())->field('image')->order('sort')->select(),
        ];

        //模块7
        $data['model7'] = [
            'title' => (new SiteBrandSchemeTitle())->where('id', 1)->value('title'),
            'data' => (new SiteBrandScheme())->field('title,text')->order('sort')->select(),
        ];

        //模块8
        $data['model8'] = [
            'title' => (new SiteBrandContent8Title())->where('id', 1)->value('title'),
            'data' => (new SiteBrandContent8())->field('title,text,icon,image')->order('sort')->select(),
        ];

        return json_encode($data);
    }
}