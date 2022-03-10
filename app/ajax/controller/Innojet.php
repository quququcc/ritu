<?php
/**
 * Created by PhpStorm.
 * User: weiming
 * Date: 2021/12/14
 * Time: 2:38
 */

namespace app\ajax\controller;


use app\admin\model\SiteBannerInside;
use app\admin\model\SiteConfigBottom1;
use app\admin\model\SiteInnojetContent1;
use app\admin\model\SiteInnojetContent1Title;
use app\admin\model\SiteInnojetContent2;
use app\admin\model\SiteInnojetContent2Title;
use app\admin\model\SiteInnojetContent3;
use app\admin\model\SiteInnojetContent3Title;
use app\admin\model\SiteInnojetContent4;
use app\admin\model\SiteInnojetContent4Title;
use app\admin\model\SiteInnojetContent5;
use app\admin\model\SiteInnojetContent5Title;
use app\admin\model\SiteInnojetContent6;
use app\admin\model\SiteInnojetContent6Title;
use app\admin\model\SiteInnojetContent7;
use app\admin\model\SiteInnojetContent7Title;
use app\admin\model\SiteInnojetContent8;
use app\admin\model\SiteInnojetContent8Title;
use app\admin\model\SiteSeo;

class Innojet
{
    public function index()
    {
        //head数据
        $data['head'] = (new SiteSeo())->withoutField('id')->where('sign', 'innojet_patent')->find();

        //banner数据
        $data['banner'] = (new SiteBannerInside())
            ->field('title,title_color,title_s1,title_s1_color,background,button1,button1_link,button2,button2_link')
            ->where('id', 2)->find();

        //模块1
        $data['model1'] = [
            'title' => (new SiteInnojetContent1Title())->where('id', 1)->value('title'),
            'data' => (new SiteInnojetContent1())->field('title,text,image')->order('sort')->select(),
        ];

        //模块2
        $model2_data = (new SiteInnojetContent2())->field('title,text,image')->order('sort')->select();
        foreach ($model2_data as &$v){
            $v['text'] = explode("\n",$v['text']);
        }
        $data['model2'] = [
            'title' => (new SiteInnojetContent2Title())->field('title,title_s,image')->where('id', 1)->find(),
            'data' => $model2_data,
        ];

        //模块3
        $model3_data = (new SiteInnojetContent3())->field('title,text,image_def,image_act')->order('sort')->select();
        foreach ($model3_data as &$v){
            $v['text'] = explode("\n",$v['text']);
        }
        $data['model3'] = [
            'title' => (new SiteInnojetContent3Title())->field('title,title_s')->where('id', 1)->find(),
            'data' => $model3_data,
        ];

        //模块4
        $data['model4'] = [
            'title' => (new SiteInnojetContent4Title())->field('title,title_s')->where('id', 1)->find(),
            'data' => (new SiteInnojetContent4())->field('image,text')->order('sort')->select(),
        ];

        //模块5
        $data['model5'] = [
            'title' => (new SiteInnojetContent5Title())->field('title,title_s')->where('id', 1)->find(),
            'data' => (new SiteInnojetContent5())->field('title,text,image')->order('sort')->select(),
        ];

        //模块6
        $data['model6'] = [
            'title' => (new SiteInnojetContent6Title())->where('id', 1)->value('title'),
            'data' => (new SiteInnojetContent6())->field('image')->order('sort')->select(),
        ];

        //模块7
        $data['model7'] = [
            'title' => (new SiteInnojetContent7Title())->where('id', 1)->value('title'),
            'data' => (new SiteInnojetContent7())->field('title,text')->order('sort')->select(),
        ];

        //模块8
        $data['model8'] = [
            'title' => (new SiteInnojetContent8Title())->where('id', 1)->value('title'),
            'data' => (new SiteInnojetContent8())->field('title,text,icon,image')->order('sort')->select(),
        ];

        $data['bottom'] = (new SiteConfigBottom1())->where('sign','innojet_patent')->find();

        return json_encode($data);
    }
}