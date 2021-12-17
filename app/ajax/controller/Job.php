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
    public function index(Request $request)
    {
        $cate_id = $request->param('cate_id', 0);
        $page = $request->param('page', 1);

        if ($cate_id != 0) {
            $count = (new SiteAboutJob())->where('cate_id', $cate_id)->count();
            $jobList = (new SiteAboutJob())->where('cate_id', $cate_id)->order('id')->page($page, 5)->select();
        } else {
            $count = (new SiteAboutJob())->count();
            $jobList = (new SiteAboutJob())->order('id')->page($page, 5)->select();
        }

        $cate = (new SiteAboutJobCate())->select();
        foreach ($cate as &$v) {
            if ($v['id'] == $cate_id) {
                $v['is_active'] = 1;
            } else {
                $v['is_active'] = 0;
            }
        }

        return json_encode([
            'cate' => $cate,
            'list' => $jobList,
            'page' => (int)$page,
            'limit' => 5,
            'page_num' => ceil($count / 5),
        ]);
    }
}