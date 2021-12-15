<?php
/**
 * Created by PhpStorm.
 * User: weiming
 * Date: 2021/12/14
 * Time: 1:40
 */

namespace app\ajax\controller;


use app\admin\model\SiteBanner;
use app\admin\model\SiteIndexContent1;
use app\admin\model\SiteIndexContent1Title;
use app\admin\model\SiteIndexContent2;
use app\admin\model\SiteIndexContent2Bottom;
use app\admin\model\SiteIndexContent2Title;
use app\admin\model\SiteIndexContent3;
use app\admin\model\SiteIndexContent3Title;
use app\admin\model\SiteResBook;
use app\admin\model\SiteResCourse;
use app\admin\model\SiteResNews;
use app\admin\model\SiteResTop;

class Index
{
    public function index()
    {
        //banner数据
        $data['banner'] = (new SiteBanner())->where('is_show', 1)->order('sort')->where('id', 1)->find();
        unset($data['banner']['id']);
        unset($data['banner']['is_show']);
        unset($data['banner']['sort']);

        //模块1
        $data['model1'] = [
            'title' => (new SiteIndexContent1Title())->where('id', 1)->value('title'),
            'data' => (new SiteIndexContent1())->field('title,text')->order('sort')->select(),
        ];

        //模块2
        $model2_data = (new SiteIndexContent2())->field('title,text,image')->order('sort')->select();
        foreach ($model2_data as &$v){
            $v['text'] = explode("\n",$v['text']);
        }
        $data['model2'] = [
            'title' => (new SiteIndexContent2Title())->where('id', 1)->value('title'),
            'data' => $model2_data,
            'bottom' => (new SiteIndexContent2Bottom())->field('title,image')->order('sort')->select(),
        ];

        //模块3
        $data['model3'] = [
            'title' => (new SiteIndexContent3Title())->where('id', 1)->value('title'),
            'data' => (new SiteIndexContent3())->field('image')->order('sort')->select(),
        ];

        //模块4 知识产权
        $data['model4'] = [
            'book' => (new SiteResBook())->field('id,title,image,descript,path')->order('id')->limit(3)->select(),
            'top' => (new SiteResTop())->withoutField('sort')->order('id')->limit(3)->select(),
            'course' => (new SiteResCourse())->field('id,title,image,descript')->order('id')->limit(3)->select(),
            'news' => (new SiteResNews())->field('id,title,descript')->order('id')->limit(3)->select(),
        ];

        return json_encode($data);
    }
}