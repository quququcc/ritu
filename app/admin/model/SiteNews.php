<?php

namespace app\admin\model;

use app\common\model\TimeModel;

class SiteNews extends TimeModel
{

    protected $name = "site_news";

    protected $deleteTime = false;

    
    
    public function getStatusList()
    {
        return ['0'=>'禁用','1'=>'启用',];
    }

    public function getNewCateList()
    {
        return ['1'=>'新闻中心','2'=>'公司新闻',];
    }


}