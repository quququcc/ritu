<?php
/**
 * Created by PhpStorm.
 * User: weiming
 * Date: 2021/12/14
 * Time: 5:05
 */

namespace app\ajax\controller;


use app\admin\model\SiteResCourse;

class Course
{
    public function hot()
    {
        $hot = (new SiteResCourse())->field('id,title,image')->order('view_num')->limit(3)->select();

        return json_encode($hot);
    }
}