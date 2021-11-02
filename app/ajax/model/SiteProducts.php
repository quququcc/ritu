<?php

namespace app\ajax\model;

use app\common\model\TimeModel;

class SiteProducts extends TimeModel
{

    protected $name = "site_products";

    protected $deleteTime = false;

    
    public function siteProductsCate()
    {
        return $this->belongsTo('\app\admin\model\SiteProductsCate', 'cate_id', 'id');
    }

    
    public function getSiteProductsCateList()
    {
        return \app\admin\model\SiteProductsCate::column('name', 'id');
    }

}