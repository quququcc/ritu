<?php


namespace app\ajax\controller;

use \app\admin\model\SiteCategoriesManage;
use app\admin\model\SiteProductsManage;
use app\Request;

class ProductController
{
    protected $siteProductsManage;
    protected $siteCategoriesManage;
    public function __construct()
    {
        $this->siteProductsManage = new SiteProductsManage();
        $this->siteCategoriesManage = new SiteCategoriesManage();
    }

    public function list()
    {

        $firstCate = $this->siteCategoriesManage->where('pid', 0)->where('status', 1)->select()->toArray();
        if (empty($firstCate)) {
            return "没有分类数据";
        }

        foreach ($firstCate as &$v) {
            if ($v['id']) {
                $son_categories = $this->siteCategoriesManage->where('pid', $v['id'])->where('status', 1)->select()->toArray();
                if (!empty($son_categories)) {
                    $son_categories_ids = array_column($son_categories, 'id');
                    $product_info = $this->siteProductsManage->whereIn('categories_id', $son_categories_ids)->where('status', 1)->select()->toArray();
                    foreach ($son_categories as &$vv) {
                        $vv['product'] = [];
                        foreach ($product_info as $vvv) {
                            if ($vv['id'] != $vvv['categories_id']) continue;
                            $vv['product'][] = $vvv;
                        }
                    }
                }
                $v['son_categories'] = $son_categories;
            }
        }
        return json_encode($firstCate);
    }

    public function listPage(Request $request)
    {
        $page = $request->param('page', 1);
        $categories_id = $request->param('categories_id', 0);
        if (empty($categories_id)) {
            return '参数错误';
        }

        return $this->siteProductsManage
            ->where('categories_id', $categories_id)
            ->where('status', 1)
            ->limit(($page-1)*10, 10)
            ->select()->toArray();
    }

    public function productDetail(Request $request)
    {
        $product_id = $request->param('product_id', 0);
        if (empty($product_id)) {
            return '参数错误';
        }

        $productInfo = $this->siteProductsManage->where('id', $product_id)->where('status', 1)->select()->toArray();
        if (empty($productInfo)) {
            return '输入产品id有误';
        }

        return json_encode(['productInfo' => $productInfo, 'crumbInfo' => []]);
    }
}