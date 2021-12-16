<?php
/**
 * Created by PhpStorm.
 * User: weiming
 * Date: 2021/12/14
 * Time: 5:05
 */

namespace app\ajax\controller;


use app\admin\model\SiteBannerInside;
use app\admin\model\SiteResCourse;
use app\admin\model\SiteResCourseCate;
use app\admin\model\SiteResCourseLecturer;
use app\admin\model\SiteResNews;
use app\Request;

class Course
{
    public function index()
    {
        //banner数据
        $data['banner'] = (new SiteBannerInside())
            ->field('title,title_color,title_s1,title_s1_color,background')
            ->where('id', 9)->find();


        $data['hot'] = (new SiteResCourse())->field('id,title,image')->order('view_num')->limit(3)->select();
        return json_encode($data);
    }

    public function list(Request $request)
    {
        $cate_id = $request->param('cate_id', 0);
        $page = $request->param('page', 1);
        $limit = 6;
        if ($cate_id == 0) {
            $data = (new SiteResCourse())->field('id,title,descript,image,view_num')->order('publish_time')->page($page, $limit)->select();
            $count = (new SiteResCourse())->count();
        } else {
            $data = (new SiteResCourse())->field('id,title,descript,image,view_num')->where('cate', $cate_id)->order('publish_time')->page($page, $limit)->select();
            $count = (new SiteResCourse())->where('cate', $cate_id)->count();
        }

        $cateList = (new SiteResCourseCate())->field('id,cate_name')->order('sort')->select();
        foreach ($cateList as &$v) {
            if ($v['id'] == $cate_id) {
                $v['is_active'] = 1;
            } else {
                $v['is_active'] = 0;
            }
        }

        return json_encode([
            'cate' => $cateList,
            'list' => $data,
            'page' => (int)$page,
            'limit' => $limit,
            'page_num' => ceil($count / $limit),
        ]);
    }

    public function history(Request $request)
    {
        $keyword = $request->param('keyword', '');
        $page = $request->param('page', 1);
        $limit = 3;
        if ($keyword == '') {
            $data = (new SiteResCourse())->field('id,title,descript,image,view_num,publish_time')->order('publish_time')->page($page, $limit)->select();
            $count = (new SiteResCourse())->count();
        } else {
            $data = (new SiteResCourse())->field('id,title,descript,image,view_num,publish_time')
                ->where([
                    ['title', 'like', "%" . $keyword . "%"],
                    ['descript', 'like', "%" . $keyword . "%"],
                ])->order('publish_time')->page($page, $limit)->select();
            $count = (new SiteResCourse())
                ->where([
                    ['title', 'like', "%" . $keyword . "%"],
                    ['descript', 'like', "%" . $keyword . "%"],
                ])->count();
        }

        foreach ($data as &$v) {
            $v['publish_time'] = date('Y/m/d H:i:s', strtotime($v['publish_time']));
        }

        return json_encode([
            'list' => $data,
            'page' => (int)$page,
            'keyword' => $keyword,
            'limit' => $limit,
            'page_num' => ceil($count / $limit),
        ]);
    }

    public function detail(Request $request)
    {
        $id = $request->param('id', 0);
        if ($id == 0) {
            return "参数错误";
        }

        //课程信息
        $data = (new SiteResCourse())
            ->alias('res')
            ->field('cate.cate_name,res.*')
            ->leftJoin('ea_site_res_course_cate cate', 'res.cate=cate.id')
            ->where('res.id', $id)
            ->find();

        //讲师信息
        $lecturers = (new SiteResCourseLecturer())
            ->withoutField('id')
            ->whereIn('id', explode(',', $data['lecturers']))
            ->select();

        //猜你想看(公司动态)
        $recommend = (new SiteResNews())
            ->field('id,title')
            ->order('view_num')
            ->limit(6)->select();

        //近期回顾
        $history = (new SiteResCourse())
            ->field('id,image,title')
            ->where('cate',$data['cate'])
            ->where('id','<>',$id)
            ->order('id')
            ->limit(3)
            ->select();

        $data['lecturers'] = $lecturers;
        unset($data['id']);
        unset($data['cate']);
        unset($data['image']);
        return json_encode([
            'data' => $data,
            'recommend' => $recommend,
            'history' => $history,
        ]);
    }
}