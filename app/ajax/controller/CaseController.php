<?php
/**
 * Created by PhpStorm.
 * User: FS
 * Date: 2021/12/13
 * Time: 16:26
 */

namespace app\ajax\controller;

use app\admin\model\SiteBannerInside;
use app\admin\model\SiteCaseCate;
use app\admin\model\SiteCaseDetail;
use app\admin\model\SiteCaseProducts;
use app\admin\model\SiteConfigBottom1;
use app\Request;

/**
 * 客户案例
 * Class CaseController
 * @package app\ajax\controller
 */
class CaseController
{
    private $caseModel;

    public function __construct()
    {
        $this->caseModel = new SiteCaseDetail();
    }

    public function list(Request $request)
    {
        $products = $request->param('products', '');//1,2,3...
        $cates = $request->param('cates', '');//1,2,3...
        $page = $request->param('page', 1);
        $limit = $request->param('limit', 40);

        $sql = "select id,company_name_s,company_image from ea_site_case_detail";

        if (!empty($products)) {
//            $sql .= " where (";
//            foreach (explode(',', $products) as $k => $v) {
//                if ($k == 0) {
//                    $sql .= "products like '%," . $v . ",%'";
//                } else {
//                    $sql .= " or products like '%," . $v . ",%'";
//                }
//            }
//            $sql .= ")";
            $sql .= " where (products like '%," . $products . ",%' or products like '%," . $products . "')";
        }

        if (!empty($cates)) {
//            if (!empty($products)) {
//                $sql .= " AND (";
//            } else {
//                $sql .= " where (";
//            }
//            foreach (explode(',', $cates) as $k => $v) {
//                if ($k == 0) {
//                    $sql .= "cates like '%" . $v . "%'";
//                } else {
//                    $sql .= " or cates like '%" . $v . "%'";
//                }
//            }
//            $sql .= ")";

            if (!empty($products)) {
                $sql .= " AND ";
            } else {
                $sql .= " where ";
            }
            $sql .= "(cates like '%," . $cates . ",%' or cates like '%," . $cates . "')";
        }
        $sql .= " order by sort asc,id desc limit " . ($page - 1) * $limit . "," . $limit;
        $data = $this->caseModel->query($sql);
        return json_encode($data);
    }

    public function index()
    {
        //banner数据
        $banner = (new SiteBannerInside())
            ->field('title,title_color,title_s1,title_s1_color,title_s1,title_s1_color,background')
            ->where('id', 5)->find();

        //案例分类
        $products = (new SiteCaseProducts())->withoutField('sort')->order('sort')->select();
        $cates = (new SiteCaseCate())->withoutField('sort')->order('sort')->select();

        //行业解决方案
        $hotCase = $this->caseModel
            ->field('id,company_name_s,company_image,industry,title,image,descript')
            ->order('publish_time')->limit(3)->select();

        $bottom = (new SiteConfigBottom1())->where('sign','case')->find();

        return json_encode([
            'banner' => $banner,
            'products' => $products,
            'cates' => $cates,
            'hotCase' => $hotCase,
            'bottom' => $bottom,
        ]);
    }

    public function detail(Request $request)
    {
        $case_id = $request->param('case_id',0);
        if($case_id==0){
            return "参数错误";
        }

        $caseDetail = $this->caseModel->withoutField('cates,image')->where('id', $case_id)->find();

        if (!empty($caseDetail)) {
            //banner数据
            $banner = (new SiteBannerInside())
                ->field('title,title_color,title_s1,title_s1_color,title_s1,title_s1_color,background')
                ->where('id', 5)->find();

            //获取使用的产品
            $products = (new SiteCaseProducts())
                ->whereIn('id', explode(',', $caseDetail['products']))
                ->order('sort')->column('products_name', 'id');

            //成功案例
            $successCase = $this->caseModel
                ->field('id,company_name_s,company_image,industry,title,image,descript')
//                ->where('id', '<>', $case_id)
                ->order('publish_time')->limit(3)->select();

            $caseDetail['products'] = $products;
            $caseDetail['publish_time'] = date('Y-m-d', strtotime($caseDetail['publish_time']));
            return json_encode([
                'banner' => $banner,
                'detail' => $caseDetail,
                'successCase' => $successCase,
            ]);

        } else {
            return json_encode([]);
        }
    }
}