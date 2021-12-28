<?php

namespace app\admin\controller\site;

use app\common\controller\AdminController;
use EasyAdmin\annotation\ControllerAnnotation;
use EasyAdmin\annotation\NodeAnotation;
use think\App;

/**
 * @ControllerAnnotation(title="site_seo")
 */
class Seo extends AdminController
{

    use \app\admin\traits\Curd;

    public function __construct(App $app)
    {
        parent::__construct($app);

        $this->model = new \app\admin\model\SiteSeo();
        
    }

    /**
     * @NodeAnotation(title="列表")
     * @param int $id
     * @return mixed
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     */
    public function index()
    {
        $data = $this->model->select()->toArray();
        $dataFormat = [];
        foreach ($data as $v){
            $dataFormat[$v['sign']] = $v;
        }
        $this->assign('data', $dataFormat);
        return $this->fetch();
    }

    /**
     * @NodeAnotation(title="保存")
     */
    public function save()
    {
        $this->checkPostRequest();
        $post = $this->request->post();
        $sign = $post['sign'];
        try {
            $update = [
                'title' => $post['title'] ?? '',
                'keywords' => $post['keywords'] ?? '',
                'description' => $post['description'] ?? '',
            ];
            $this->model->where('sign', $sign)->update($update);
        } catch (\Exception $e) {
            $this->error('保存失败');
        }
        $this->success('保存成功');
    }
}