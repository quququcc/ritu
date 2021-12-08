<?php

namespace app\admin\model;

use app\common\model\TimeModel;

class SiteAboutJob extends TimeModel
{

    protected $name = "site_about_job";

    protected $deleteTime = false;

    
    public function siteAboutJobCate()
    {
        return $this->belongsTo('\app\admin\model\SiteAboutJobCate', 'cate_id', 'id');
    }

    
    public function getSiteAboutJobCateList()
    {
        return \app\admin\model\SiteAboutJobCate::column('name', 'id');
    }

}