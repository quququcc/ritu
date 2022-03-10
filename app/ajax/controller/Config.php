<?php
/**
 * Created by PhpStorm.
 * User: FS
 * Date: 2021/12/14
 * Time: 17:45
 */

namespace app\ajax\controller;


use app\admin\model\SiteConfigLink;
use app\admin\model\SiteConfigMix;
use app\admin\model\SiteConfigQrCode;

class Config
{
    public function link()
    {
        $data = (new SiteConfigLink())->field('name,link')->order('sort')->select();
        return json_encode($data);
    }

    public function config()
    {
        //二维码
        $data['qaCode'] = (new SiteConfigQrCode())->withoutField('id')->order('sort')->select();

        //页面配置
        $mix = (new SiteConfigMix())->withoutField('id')->where('id',1)->find();
        $data['logo1'] = $mix['logo1'];
        $data['logo2'] = $mix['logo2'];
        $data['phone'] = $mix['phone'];
        return json_encode($data);
    }
}