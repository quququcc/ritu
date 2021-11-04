<?php

namespace app\admin\model;

use app\common\model\TimeModel;

class SiteTrain extends TimeModel
{

    protected $name = "site_train";

    protected $deleteTime = false;

    
    public function siteTrainCate()
    {
        return $this->belongsTo('\app\admin\model\SiteTrainCate', 'cate_id', 'id');
    }

    
    public function getSiteTrainCateList()
    {
        return \app\admin\model\SiteTrainCate::column('name', 'id');
    }

}