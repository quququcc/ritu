<?php

namespace app\admin\controller\site;

use app\common\controller\AdminController;
use EasyAdmin\annotation\ControllerAnnotation;
use EasyAdmin\annotation\NodeAnotation;
use think\App;

/**
 * @ControllerAnnotation(title="site_innojoy_content2")
 */
class InnojoyContent2 extends AdminController
{

    use \app\admin\traits\Curd;

    public function __construct(App $app)
    {
        parent::__construct($app);

        $this->model = new \app\admin\model\SiteInnojoyContent2();

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
        $id = $post['id'];
        try {
            $update = [
                'title' => $post['title'],
                'text' => $post['text'],
                'content' => $post['content'] ?? '',
                'image' => $id == 1 ? $post['image'] : $post['image' . $id],
            ];
            $this->model->where('id', $id)->update($update);
        } catch (\Exception $e) {
            $this->error('保存失败');
        }
        $this->success('保存成功');
    }
}