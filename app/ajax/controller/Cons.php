<?php
/**
 * Created by PhpStorm.
 * User: weiming
 * Date: 2021/12/14
 * Time: 3:18
 */

namespace app\ajax\controller;


use app\admin\model\SiteBannerInside;
use app\admin\model\SiteConsContent4;
use app\admin\model\SiteConsContent4Title;
use app\admin\model\SiteConsContent5;
use app\admin\model\SiteConsContent5Title;
use app\admin\model\SiteConsServiceContent;
use app\admin\model\SiteConsServiceContentTitle;
use app\admin\model\SiteKnowUsService;
use app\admin\model\SiteKnowUsServiceTitle;
use app\admin\model\SiteProfService;
use app\admin\model\SiteProfServiceTitle;

class Cons
{
    public function index()
    {
        //banner数据
        $data['banner'] = (new SiteBannerInside())
            ->field('title,title_color,title_s1,title_s1_color,background')
            ->where('id', 4)->find();

        //模块1
        $data['model1'] = [
            'title' => (new SiteKnowUsServiceTitle())->where('id', 1)->value('title'),
            'data' => (new SiteKnowUsService())->field('title,text')->order('sort')->select(),
        ];

        //模块2
        $model2 = (new SiteConsServiceContent())
            ->alias('data')
            ->field('data.title,data.text,data.cat_id,image,cate.title')
            ->leftJoin('ea_site_cons_service_title cate', 'data.cat_id = cate.id')
            ->order('cate.sort')->select();
        $model2Content = [];
        foreach ($model2 as $k => $v) {
            $model2Content[$v['cat_id']]['title'] = $v['title'];
            $model2Content[$v['cat_id']]['data'][] = $v;
        }
        $data['model2'] = [
            'title' => (new SiteConsServiceContentTitle())->where('id', 1)->value('title'),
            'data' => $model2Content,
        ];

        //模块3
        $model3_data = (new SiteProfService())->field('title,text')->order('sort')->select();
        foreach ($model3_data as &$v){
            $v['text'] = explode("\n",$v['text']);
        }
        $data['model3'] = [
            'title' => (new SiteProfServiceTitle())->where('id', 1)->value('title'),
            'data' => $model3_data,
        ];

        //模块4
        $data['model4'] = [
            'title' => (new SiteConsContent4Title())->field('title,title_s')->where('id', 1)->find(),
            'data' => (new SiteConsContent4())->field('title,text,icon,image')->order('sort')->select(),
        ];

        //模块5
        $data['model5'] = [
            'title' => (new SiteConsContent5Title())->where('id', 1)->value('title'),
            'data' => (new SiteConsContent5())->field('image')->order('sort')->select(),
        ];

        return json_encode($data);
    }
}