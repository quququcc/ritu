<?php

namespace app\ajax\controller;

use app\admin\model\SiteBannerInside;
use app\ajax\model\SiteBanner;
use think\response\Json;

class Banner
{
    protected $model;

    public function __construct()
    {
        $this->model = new SiteBanner();
    }

    /**
     * @note: 获取banner信息
     * @param string $sign
     * @return json
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     */
    public function getBanner($sign = 'index')
    {
        $sign = in_array($sign,['index','team','consult','train','drill','case','news','think','contact']) ? $sign : 'index';
        if($sign=='index') {
            $data = $this->model->where('is_show',1)->order('sort')->select()->toArray();
        }else{
            $data = (new SiteBannerInside())->where('sign', $sign)->find()->toArray();
        }
        return json_encode($data);
    }
}