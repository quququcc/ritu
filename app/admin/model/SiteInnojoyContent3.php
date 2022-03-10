<?php

namespace app\admin\model;

use app\common\model\TimeModel;

class SiteInnojoyContent3 extends TimeModel
{

    protected $name = "site_innojoy_content3";

    protected $deleteTime = false;

    
    
    public function getTagList()
    {
        return ['1'=>'高质量数据','2'=>'多类型专利数据',];
    }


}