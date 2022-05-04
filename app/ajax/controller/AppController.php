<?php


namespace app\ajax\controller;


use app\admin\model\AppCate;
use app\admin\model\SiteProduct;
use app\Request;

class AppController
{
    protected $app_cate;
    protected $product;
    public function __construct()
    {
        $this->app_cate = new AppCate();
        $this->product = new SiteProduct();
    }

    public function list(Request $request)
    {
        $page = $request->param('page', 1);
        $app_cate = $this->app_cate
            ->where('pid', 0)
            ->where('status', 1);
        $count = $app_cate->count('id');
        $pageCount = ceil($count/8);

        $app_cate = $app_cate->limit(($page-1)*8, 8)
            ->select()->toArray();

        if (empty($app_cate)) {
            return '请先添加应用与方案分类数据';
        }

        return json_encode(['appCate' => $app_cate, 'pageCount' => $pageCount]);
    }

    public function secondList(Request $request)
    {
        $page = $request->param('page', 1);
        $cate_id = $request->param('categories_id', 0); //一级分类id
        if (empty($cate_id)) {
            return '参数错误';
        }

        $cateInfo = $this->app_cate->where('pid', $cate_id)->where('status', 1)->select()->toArray();
        if (empty($cateInfo)) {
            return '请先添加[分类id:'.$cate_id.']下的分类数据';
        }

        foreach ($cateInfo as $k => &$v) {
            if ($k == 0) { //默认只查第一个分类数据
                $product = $this->product->where('categories_id', $v['id'])->where('status', 1);
                $pageCount = (int)ceil($product->count()/5);
                $product = $product->limit(($page-1)*5, 5)->select()->toArray();
                $v['product'] = $product;
                $v['pageCount'] = $pageCount;
            }
        }
        return json_encode($cateInfo);
    }

    public function secondListPage(Request $request)
    {
        $page = $request->param('page', 1);
        $cate_id = $request->param('categories_id', 0); //二级分类id
        if (empty($cate_id)) {
            return '参数错误';
        }

        $product = $this->product->where('categories_id', $cate_id)->where('status', 1);
        $pageCount = (int)ceil($product->count()/5);
        $product = $product->limit(($page-1)*5, 5)->select()->toArray();
        if (empty($product)) {
            return '该分类下没有产品数据';
        }

        return json_encode(['product' => $product, 'pageCount' => $pageCount]);
    }

    public function appProductDetail(Request $request)
    {
        $product_id = $request->param('product_id', 0);
        if (empty($product_id)) {
            return '参数错误';
        }

        $result = $this->product->where('id', $product_id)->where('status', 1)->select()->toArray();
        $crumbInfo = [
            [
                'title' => '首页',
                'url' => '',
            ],
            [
                'title' => '应用与方案',
                'url' => '',
            ],
        ];
        return json_encode(['result' => $result, 'crumbInfo' => $crumbInfo]);
    }
}