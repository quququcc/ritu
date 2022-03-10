<?php

namespace app\admin\controller\site;

use app\admin\model\SiteCaseCate;
use app\admin\model\SiteCaseProducts;
use app\common\controller\AdminController;
use EasyAdmin\annotation\ControllerAnnotation;
use EasyAdmin\annotation\NodeAnotation;
use think\App;

/**
 * @ControllerAnnotation(title="site_case_detail")
 */
class CaseDetail extends AdminController
{

    use \app\admin\traits\Curd;

    public function __construct(App $app)
    {
        parent::__construct($app);

        $this->model = new \app\admin\model\SiteCaseDetail();

        $products = (new SiteCaseProducts())->select()->toArray() ?? [];
        $cates = (new SiteCaseCate())->select()->toArray() ?? [];
        $this->assign('products',$products);
        $this->assign('cates',$cates);
    }

    
    /**
     * @NodeAnotation(title="列表")
     */
    public function index()
    {
        if ($this->request->isAjax()) {
            if (input('selectFields')) {
                return $this->selectList();
            }
            list($page, $limit, $where) = $this->buildTableParames();
            $count = $this->model
                ->withJoin('siteCaseCate', 'LEFT')
                ->where($where)
                ->count();
            $list = $this->model
                ->withJoin('siteCaseCate', 'LEFT')
                ->where($where)
                ->page($page, $limit)
                ->order($this->sort)
                ->select();
            $data = [
                'code'  => 0,
                'msg'   => '',
                'count' => $count,
                'data'  => $list,
            ];
            return json($data);
        }
        return $this->fetch();
    }
}