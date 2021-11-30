<?php
/**
 * Created by PhpStorm.
 * User: FS
 * Date: 2021/10/28
 * Time: 10:52
 */

namespace app\index\controller;

use app\admin\model\SiteCases;
use app\admin\model\SiteDrill;
use app\admin\model\SiteNews;
use app\admin\model\SiteTeam;
use app\ajax\model\SiteBanner;
use app\BaseController;
use think\facade\View;

class Index extends BaseController
{
    public function index($url = 'index')
    {
        if($url=='index'){
            $data = array();
            $data['banner'] = (new SiteBanner())->where('is_show',1)->order('sort')->select()->toArray();

            $limit = 8;
            $data['drill'] = (new SiteDrill())->field(['id', 'title', 'descript', 'image','created'])->limit($limit)->order('created')->select()->toArray() ?? [];
            foreach ($data['drill'] as $k=>$v){
                $data['drill'][$k]['created'] = date('Y年m月d日',strtotime($v['created']));
            }

            //项目服务优势

            //课程落地风采 使用人才训练内容
            $data['style'] = (new SiteDrill())->field(['id', 'title', 'image'])->limit(4)->order('created')->select()->toArray() ?? [];
            //专家团队介绍
            $data['team'] = (new SiteTeam())->order('sort')->limit(4)->select()->toArray();
            //服务案例展示
            $data['case'] = (new SiteCases())->field(['name', 'image'])->limit(18)->order('sort','asc')->select()->toArray() ?? [];
            //新闻资讯
            $data['news'] = (new SiteNews())->field(['id', 'title', 'descript', 'image', 'created'])->limit(5)->order('created')->select()->toArray() ?? [];
            View::assign('data',$data);
        }

        //自动加载对应的html文件
        return View::fetch($url);
    }

    public function css($css)
    {
        $url = request()->url();
        $css = substr($url,strrpos($url,'/')+1);
        return redirect("/static/index/css/" . $css);
    }

    public function js($dir = '', $js = '')
    {
        $url = request()->url();
        $js = substr($url,strrpos($url,'/')+1);
        if (empty($dir)) {
            return redirect("/static/index/js/" . $js);
        } else {
            return redirect("/static/index/js/" . $dir . '/' . $js);
        }
    }

    public function imgs($imgs)
    {
        $url = request()->url();
        $imgs = substr($url,strrpos($url,'/')+1);
        return redirect("/static/index/imgs/" . $imgs);
    }
}