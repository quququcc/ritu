<?php
/**
 * Created by PhpStorm.
 * User: weiming
 * Date: 2021/12/14
 * Time: 4:13
 */

namespace app\ajax\controller;


use app\admin\model\SiteAboutJob;
use app\admin\model\SiteAboutJobCate;
use app\Request;

class Job
{
    public function cate()
    {
        $cate = (new SiteAboutJobCate())->select();
        return json_encode($cate);
    }

    public function index($cate_id=0,$page=1)
    {
        if($cate_id!=0){
            $count = (new SiteAboutJob())->where('cate_id',$cate_id)->count();
            $jobList = (new SiteAboutJob())->where('cate_id',$cate_id)->order('id')->page($page,5)->select();
        }else{
            $count = (new SiteAboutJob())->count();
            $jobList = (new SiteAboutJob())->order('id')->page($page,5)->select();
        }

        return json_encode([
            'list'=>$jobList,
            'page'=>(int)$page,
            'limit'=>5,
            'page_num'=>ceil($count/5),
        ]);
    }
}