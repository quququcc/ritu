<?php
/**
 * Created by PhpStorm.
 * User: FS
 * Date: 2021/10/28
 * Time: 10:52
 */

namespace app\index\controller;

use app\BaseController;
use think\facade\View;

class Index extends BaseController
{
    public function index($url = 'index')
    {
        $url = request()->url();
        $url = str_replace('.html','',substr($url,strrpos($url,'/')+1));

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