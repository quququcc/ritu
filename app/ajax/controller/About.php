<?php
/**
 * Created by PhpStorm.
 * User: weiming
 * Date: 2021/12/14
 * Time: 4:01
 */

namespace app\ajax\controller;


use app\admin\model\SiteAboutContact;
use app\admin\model\SiteAboutCourse;
use app\admin\model\SiteAboutCulture;
use app\admin\model\SiteAboutHonor;
use app\admin\model\SiteAboutTeam;
use app\admin\model\SiteAboutUs;
use app\admin\model\SiteBannerInside;

class About
{
    public function index()
    {
        //banner数据
        $data['banner'] = (new SiteBannerInside())
            ->field('title,title_color,title_s1,title_s1_color,title_s2,title_s2_color,background')
            ->where('id', 7)->find();

        //关于大为
        $data['aboutUs'] = (new SiteAboutUs())->withoutField('id')->where('id',1)->find();

        //团队
        $data['term'] = (new SiteAboutTeam())->withoutField('id')->where('id',1)->find();

        //企业文化
        $data['culture'] = (new SiteAboutCulture())->withoutField('id')->order('sort')->select();

        //发展历程
        $data['course'] = (new SiteAboutCourse())->withoutField('id')->order('year','desc')->select();

        //荣誉资质
        $honor = (new SiteAboutHonor())->withoutField('id')->where('id',1)->find();
        $honor['text1'] = explode("\n",$honor['text1']);
        $honor['text2'] = explode("\n",$honor['text2']);
        $honor['images'] = explode("|",$honor['images']);
        $data['honor'] = $honor;

        //联系我们
        $data['contact'] = (new SiteAboutContact())->withoutField('id,sort')->order('sort')->select();

        return json_encode($data);
    }
}