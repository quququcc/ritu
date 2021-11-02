<?php

namespace app\ajax\controller;

use app\ajax\model\SiteAbout;
use app\ajax\model\SiteAdvantage;
use app\ajax\model\SiteAdvantageBg;
use app\ajax\model\SiteService;
use app\ajax\model\SitePatent;
use app\ajax\model\SitePatentBg;
use app\ajax\model\SitePartner;

class AboutUs
{
    protected $model;

    /**
     * @note:关于我们页面数据
     */
    public function index()
    {
        $data = array();
        //公司简介
        $data['about'] = (new SiteAbout)->field(['title', 'title_en', 'image', 'content'])->where('id', 1)->find()->toArray() ?? [];

        //优势介绍
        $data['advantage'] = [
            'background' => (new SiteAdvantageBg)->where('id',1)->find()->toArray()['background'] ?? [],
            'data' => (new SiteAdvantage)->order('sort')->select()->toArray() ?? []
        ];

        //服务流程
        $data['service'] = (new SiteService)->limit(4)->order('sort')->select()->toArray() ?? [];

        //专利证书
        $data['patent'] = [
            'background' => (new SitePatentBg)->where('id',1)->find()->toArray()['background'] ?? '',
            'data' => (new SitePatent)->select()->toArray() ?? []
        ];

        //合作伙伴
        $data['partner'] = (new SitePartner)->select()->toArray() ?? [];

        return json_encode($data);
    }
}