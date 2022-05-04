<?php

namespace app\admin\controller\site;

use app\common\controller\AdminController;
use EasyAdmin\annotation\ControllerAnnotation;
use EasyAdmin\annotation\NodeAnotation;
use think\App;

/**
 * @ControllerAnnotation(title="site_product")
 */
class Product extends AdminController
{

    use \app\admin\traits\Curd;
    protected $cate;

    public function __construct(App $app)
    {
        parent::__construct($app);

        $this->model = new \app\admin\model\SiteProduct();
        
        $this->assign('getStatusList', $this->model->getStatusList());
        $this->cate = new \app\admin\model\AppCate();
    }

    /**
     * @NodeAnotation(title="添加")
     */
    public function add()
    {
        $cate = $this->cate->where('status', 1)->where('pid', '<>', 0);
        if (empty($cate->count())) {
            $this->error('请先添加二级分类');
        }
        $cateInfo = $cate->select()->toArray();
        if ($this->request->isPost()) {
            $post = $this->request->post();
            $rule = [
                'title|标题'   => 'require',
                'content|内容' => 'require',
                'image|图片' => 'require',
                'categories_id|绑定分类' => 'require',
            ];
            $this->validate($post, $rule);
            try {
                $save = $this->model->save($post);
            } catch (\Exception $e) {
                $this->error('保存失败');
            }
            if ($save) {
                $this->success('保存成功');
            } else {
                $this->error('保存失败');
            }
        }
        $this->assign('cateInfo', $cateInfo);
        return $this->fetch();
    }

    /**
     * @NodeAnotation(title="编辑")
     */
    public function edit($id)
    {
        $row = $this->model->find($id);
        empty($row) && $this->error('数据不存在');

        $cate = $this->cate->where('status', 1)->where('pid', '<>', 0);
        if (empty($cate->count())) {
            $this->error('请先添加二级分类');
        }
        $cateInfo = $cate->select()->toArray();

        if ($this->request->isPost()) {
            $post = $this->request->post();
            $rule = [
                'title|标题'   => 'require',
                'content|内容' => 'require',
                'image|图片' => 'require',
                'categories_id|绑定分类' => 'require',
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
            'row'         => $row,
            'cateInfo'   => $cateInfo
        ]);
        return $this->fetch();
    }
}