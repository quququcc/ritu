<?php
/**
 * Created by PhpStorm.
 * User: weiming
 * Date: 2021/10/23
 * Time: 23:22
 */

namespace app\ajax\controller;

class Config
{
    /**
     * @note 获取页面配置信息
     */
    public function index()
    {
        return json_encode([
           'logo_image'=>sysconfig('site','site_ico'),
           'site_name'=>sysconfig('site','site_name'),
           'site_copyright'=>sysconfig('site','site_copyright'),
           'site_beian'=>sysconfig('site','site_beian'),
        ]);
    }
}