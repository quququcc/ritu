<?php

namespace app\admin\model;

use app\common\model\TimeModel;

class SiteCaseDetail extends TimeModel
{

    protected $name = "site_case_detail";

    protected $deleteTime = false;

    
    public function siteCaseProducts()
    {
        return $this->belongsTo('\app\admin\model\SiteCaseProducts', 'products', 'id');
    }

    public function siteCaseCate()
    {
        return $this->belongsTo('\app\admin\model\SiteCaseCate', 'cates', 'id');
    }

    

}