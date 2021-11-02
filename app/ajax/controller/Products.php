<?php
/**
 * Created by PhpStorm.
 * User: weiming
 * Date: 2021/10/23
 * Time: 18:59
 */

namespace app\ajax\controller;

use app\ajax\model\SiteProducts;
use app\ajax\model\SiteProductsCate;

class Products
{
    protected $model;

    public function __construct()
    {
        $this->model = new SiteProducts();
    }

    public function cate()
    {
        //分类数据
        $cate = (new SiteProductsCate)->select()->toArray() ?? [];

        return json_encode($cate);
    }

    /**
     * @note: 产品中心数据列表
     * @param $cate_id 分类id
     * @param $page 分页
     * @return json
     */
    public function list($cate_id = 0, $page = 1)
    {
        $limit = 12;
//        $limit = 2;
        //获取最新的12条产品数据
        if ($cate_id != 0 && !empty($cate_id)) {
            $data = $this->model->field(['id', 'title', 'descript', 'image'])->where('cate_id', $cate_id)->limit(($page - 1) * $limit, $limit)->order('id')->select()->toArray() ?? [];
            //总数据量
            $num = $this->model->where('cate_id', $cate_id)->count();
        } else {
            $data = $this->model->field(['id', 'title', 'descript', 'image'])->limit(($page - 1) * $limit, $limit)->order('id')->select()->toArray() ?? [];
            //总数据量
            $num = $this->model->count();
        }

        $return = [
            'list' => $data,
            'page' => $page,
            'num' => $num,
            'page_num' => ceil($num / $limit)
        ];

        return json_encode($return);
    }

    /**
     * 产品详情页
     * @param $id
     * @return json
     */
    public function detail($id)
    {
        //产品详情
        $data = $this->model->where('id', $id)->find();
        if ($data) $data['image_s'] = explode('|', $data['image_s']);

        //相关产品(同类)
        $correlation = $this->model->field(['id', 'title', 'descript', 'image'])
                ->where('cate_id', $data['cate_id'])->limit(3)->select() ?? [];

        $return = [
            'detail' => $data,
            'correlation' => $correlation
        ];

        return json_encode($return);
    }
}