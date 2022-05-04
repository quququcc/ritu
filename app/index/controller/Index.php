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
    /**
     * note：首页页面
     * @return string
     */
    public function index()
    {
        //查询数据

        //页面数据赋值
        View::assign('data','变量内容');

        //加载对应的html文件
        return View::fetch('..\view\index\index.html');
    }
}