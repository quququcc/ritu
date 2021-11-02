<?php

namespace app\ajax\controller;

use app\ajax\model\SiteBanner;

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
     */
    public function getBanner($sign = 'index')
    {
        $sign = in_array($sign,['index','about','products','solution','project','contact']) ? $sign : 'index';
        if($sign=='index') {
            $data = $this->model->where('sign',$sign)->where('is_show',1)->order('sort')->select()->toArray();
        }else{
            $data = $this->model->where('sign', $sign)->find()->toArray();
        }
        return json_encode($data);
    }
}