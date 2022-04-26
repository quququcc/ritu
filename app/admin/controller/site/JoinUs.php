<?php

namespace app\admin\controller\site;

use app\common\controller\AdminController;
use EasyAdmin\annotation\ControllerAnnotation;
use EasyAdmin\annotation\NodeAnotation;
use think\App;

/**
 * @ControllerAnnotation(title="site_join_us")
 */
class JoinUs extends AdminController
{

    use \app\admin\traits\Curd;

    public function __construct(App $app)
    {
        parent::__construct($app);

        $this->model = new \app\admin\model\SiteJoinUs();
        
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
        $data = $this->model->select()->first();
        $this->assign('data', $data);
        return $this->fetch();
    }

    /**
     * @NodeAnotation(title="保存")
     */
    public function save()
    {
        $this->checkPostRequest();
        $post = $this->request->post();
        try {
            $update = [
                'text' => $post['text'] ?? '',
                'editor' => $post['editor'] ?? '',
            ];
            $id = $this->model->where('id', 1)->value('id');
            if (empty($id)) {
                $this->model->insert($update);
            } else {
                $this->model->where('id', 1)->update($update);
            }
        } catch (\Exception $e) {
            $this->error('保存失败');
        }
        $this->success('保存成功');
    }
}