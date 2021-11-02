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
        //自动加载对应的html文件
        return View::fetch($url);
    }

    public function css($css)
    {
        return redirect("/chubang-tech/css/" . $css);
    }

    public function js($dir = '', $js = '')
    {
        if (empty($dir)) {
            return redirect("/chubang-tech/js/" . $js);
        } else {
            return redirect("/chubang-tech/js/" . $dir . '/' . $js);
        }
    }

    public function imgs($imgs)
    {
        return redirect("/chubang-tech/imgs/" . $imgs);
    }
}