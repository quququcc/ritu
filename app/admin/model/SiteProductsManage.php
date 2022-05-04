<?php

namespace app\admin\model;

use app\common\model\TimeModel;

class SiteProductsManage extends TimeModel
{

    protected $name = "site_products_manage";

    protected $deleteTime = false;

    
    
    public function getStatusList()
    {
        return ['0'=>'关闭','1'=>'开启',];
    }


}