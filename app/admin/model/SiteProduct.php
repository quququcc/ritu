<?php

namespace app\admin\model;

use app\common\model\TimeModel;

class SiteProduct extends TimeModel
{

    protected $name = "site_product";

    protected $deleteTime = false;

    
    
    public function getStatusList()
    {
        return ['0'=>'禁用','1'=>'启用',];
    }


}