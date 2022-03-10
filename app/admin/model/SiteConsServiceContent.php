<?php

namespace app\admin\model;

use app\common\model\TimeModel;

class SiteConsServiceContent extends TimeModel
{

    protected $name = "site_cons_service_content";

    protected $deleteTime = false;

    
    public function siteConsServiceTitle()
    {
        return $this->belongsTo('\app\admin\model\SiteConsServiceTitle', 'cat_id', 'id');
    }

    
    public function getSiteConsServiceTitleList()
    {
        return \app\admin\model\SiteConsServiceTitle::column('title', 'id');
    }

}