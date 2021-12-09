<?php

namespace app\admin\model;

use app\common\model\TimeModel;

class SiteResCourse extends TimeModel
{

    protected $name = "site_res_course";

    protected $deleteTime = false;

    
    public function siteResCourseCate()
    {
        return $this->belongsTo('\app\admin\model\SiteResCourseCate', 'cate', 'id');
    }

    public function siteResCourseLecturer()
    {
        return $this->belongsTo('\app\admin\model\SiteResCourseLecturer', 'lecturers', 'id');
    }

    
    public function getSiteResCourseCateList()
    {
        return \app\admin\model\SiteResCourseCate::column('cate_name', 'id');
    }
    public function getSiteResCourseLecturerList()
    {
        return \app\admin\model\SiteResCourseLecturer::column('name', 'id');
    }

}