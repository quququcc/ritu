<?php
/**
 * Created by PhpStorm.
 * User: weiming
 * Date: 2021/12/14
 * Time: 0:57
 */

namespace app\ajax\controller;


use app\admin\model\SiteBannerInside;
use app\admin\model\SiteConfigBottom1;
use app\admin\model\SiteInnojetContent4;
use app\admin\model\SiteInnojoyContent1;
use app\admin\model\SiteInnojoyContent1Title;
use app\admin\model\SiteInnojoyContent2;
use app\admin\model\SiteInnojoyContent3;
use app\admin\model\SiteInnojoyContent3Title;
use app\admin\model\SiteInnojoyContent4;
use app\admin\model\SiteInnojoyContent5;
use app\admin\model\SiteInnojoyContent5Title;
use app\admin\model\SiteSeo;

class Innojoy
{
    public function index()
    {
        //head数据
        $data['head'] = (new SiteSeo())->withoutField('id')->where('sign', 'innojoy')->find();

        //banner数据
        $data['banner'] = (new SiteBannerInside())->where('id', 1)->find();
        unset($data['banner']['id']);
        unset($data['banner']['sign']);
        unset($data['banner']['sign_name']);

        //模块1
        $data['model1'] = [
            'title' => (new SiteInnojoyContent1Title())->field('title,title_s')->where('id', 1)->find(),
            'data' => (new SiteInnojoyContent1())->field('title,image')->order('sort')->select(),
        ];

        //模块2
        $model2 = (new SiteInnojoyContent2())->order('id')->select()->toArray();
        foreach ($model2 as &$v){
            $v['text'] = explode("\n",$v['text']);
        }
        $data['model2'] = [
            'data1' => $model2[0],
            'data2' => $model2[1],
            'data3' => $model2[2],
            'data4' => $model2[3],
        ];

        //模块3
        $model3 = (new SiteInnojoyContent3())->field('title,image,tag,text')->order('sort')->select();
        $model3Content[0]['title'] = '高质量数据';
        $model3Content[0]['data'] = [];
        $model3Content[1]['title'] = '多类型专利数据';
        $model3Content[1]['data'] = [];
        foreach ($model3 as $k => $v) {
            if ($v['tag'] == 1) {
                $model3Content[0]['data'][] = $v;
            } else {
                $model3Content[1]['data'][] = $v;
            }
        }
        $data['model3'] = [
            'title' => (new SiteInnojoyContent3Title())->where('id', 1)->value('title'),
            'data' => $model3Content,
        ];

        //模块4 使用静态
        $data['model4'] = (new SiteInnojoyContent4())->where('id',1)->find();

        //模块5
        $data['model5'] = [
            'title' => (new SiteInnojoyContent5Title())->where('id', 1)->value('title'),
            'data' => (new SiteInnojoyContent5())->field('image')->order('sort')->select(),
        ];

        $data['bottom'] = (new SiteConfigBottom1())->where('sign','innojoy')->find();

        return json_encode($data);
    }
}