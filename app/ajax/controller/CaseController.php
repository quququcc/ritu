<?php
/**
 * Created by PhpStorm.
 * User: FS
 * Date: 2021/12/13
 * Time: 16:26
 */

namespace app\ajax\controller;

use app\admin\model\SiteCaseDetail;
use app\admin\model\SiteCaseProducts;
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
        $products = $request->param('products','2,3');//1,2,3...
        $cates = $request->param('cates','5');//1,2,3...
        $page = $request->param('page',1);
        $limit = $request->param('limit',40);


        $sql = "select id,company_name_s,company_image from ea_site_case_detail";

        if(!empty($products)){
            $sql .= " where (";
            foreach (explode(',',$products) as $k=>$v){
                if($k==0){
                    $sql .= "products like '%".$v."%'";
                }else{
                    $sql .= " or products like '%".$v."%'";
                }
            }
            $sql .= ")";
        }

        if(!empty($cates)){
            if(!empty($products)){
                $sql .= " AND (";
            }else{
                $sql .= "where (";
            }
            foreach (explode(',',$cates) as $k=>$v){
                if($k==0){
                    $sql .= "cates like '%".$v."%'";
                }else{
                    $sql .= " or cates like '%".$v."%'";
                }
            }
            $sql .= ")";
        }
        $sql .= " limit ".($page-1)*$limit.",".$limit;
        $data = $this->caseModel->query($sql);
        return json_encode($data);
    }
}