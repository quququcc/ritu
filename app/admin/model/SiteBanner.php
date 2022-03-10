<?php

namespace app\admin\model;

use app\common\model\TimeModel;

class SiteBanner extends TimeModel
{

    protected $name = "site_banner";

    protected $deleteTime = false;

    
    
    public function getIsShowList()
    {
        return ['1'=>'显示','0'=>'隐藏',];
    }


}