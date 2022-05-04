<?php


namespace app\ajax\controller;


use app\admin\controller\site\Culture;
use app\admin\model\SiteCertificate;
use app\admin\model\SiteCompanyProfile;
use app\admin\model\SiteCulture;
use app\admin\model\SiteJoinUs;
use app\admin\model\SiteMechanism;

class AboutUsController
{
    public function __construct()
    {
    }

    /**
     * @Notes: 资质证书
     * @Author: Dylan
     * @Date: 2022/5/3
     * @return false|string
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     */
    public function certificate()
    {
        return json_encode((new SiteCertificate())->select()->toArray());
    }

    /**
     * @Notes: 加入我们
     * @Author: Dylan
     * @Date: 2022/5/3
     * @return false|string
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     */
    public function joinUs()
    {
        return json_encode((new SiteJoinUs())->select()->toArray());
    }

    /**
     * @Notes: 公司简介
     * @Author: Dylan
     * @Date: 2022/5/3
     * @return false|string
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     */
    public function companyProfile()
    {
        return json_encode((new SiteCompanyProfile())->select()->toArray());
    }

    /**
     * @Notes: 公司文化
     * @Author: Dylan
     * @Date: 2022/5/3
     * @return false|string
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     */
    public function culture()
    {
        return json_encode((new SiteCulture())->select()->toArray());
    }

    /**
     * @Notes: 分支机构
     * @Author: Dylan
     * @Date: 2022/5/3
     * @return false|string
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     */
    public function mechanism()
    {
        return json_encode((new SiteMechanism())->select()->toArray());
    }
}