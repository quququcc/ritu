<?php

namespace app\admin\controller\site;

use app\admin\model\SiteCategoriesManage;
use app\common\controller\AdminController;
use EasyAdmin\annotation\ControllerAnnotation;
use EasyAdmin\annotation\NodeAnotation;
use think\App;

/**
 * @ControllerAnnotation(title="site_products_manage")
 */
class ProductsManage extends AdminController
{

    use \app\admin\traits\Curd;
    protected $cate;

    public function __construct(App $app)
    {
        parent::__construct($app);

        $this->model = new \app\admin\model\SiteProductsManage();

        $cateInfo = (new SiteCategoriesManage())->where('status', 1)->where('pid', '<>', 0)->select()->toArray();
        
        $this->assign('getStatusList', $this->model->getStatusList());
        $this->assign('cateInfo', $cateInfo);

    }

    /**
     * @NodeAnotation(title="编辑")
     */
    public function edit($id)
    {
        $row = $this->model->find($id);
        empty($row) && $this->error('数据不存在');
        if ($this->request->isPost()) {
            $post = $this->request->post();
            $rule = [
                'title|上级分类'   => 'require',
                'categories_id|分类名称' => 'require',
                'status|分类名称' => 'require',
            ];
            $this->validate($post, $rule);
            try {
                $save = $row->save($post);
            } catch (\Exception $e) {
                $this->error('保存失败');
            }
            if ($save) {
                $this->success('保存成功');
            } else {
                $this->error('保存失败');
            }
        }
        $this->assign([
            'id'          => $id,
            'cate_id'     => $row->categories_id,
            'row'         => $row,
        ]);
        return $this->fetch();
    }
}