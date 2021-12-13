<?php

namespace app\admin\controller\site;

use app\common\controller\AdminController;
use EasyAdmin\annotation\ControllerAnnotation;
use EasyAdmin\annotation\NodeAnotation;
use think\App;

/**
 * @ControllerAnnotation(title="site_banner_inside")
 */
class BannerInside extends AdminController
{

    use \app\admin\traits\Curd;

    public function __construct(App $app)
    {
        parent::__construct($app);

        $this->model = new \app\admin\model\SiteBannerInside();

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
                'title' => $post['title'] ?? '',
                'title_color' => $post['title_color'] ?? '',
                'title_s1' => $post['title_s1'] ?? '',
                'title_s1_color' => $post['title_s1_color'] ?? '',
                'title_s2' => $post['title_s2'] ?? '',
                'title_s2_color' => $post['title_s2_color'] ?? '',
                'background' => $id == 1 ? ($post['background'] ?? '') : ($post['background' . $id] ?? ''),
                'videos1_title' => $post['videos1_title'] ?? '',
                'videos1' => $id == 1 ? ($post['videos1'] ?? '') : ($post['videos1' . $id] ?? ''),
                'videos2_title' => $post['videos2_title'] ?? '',
                'videos2' => $id == 1 ? ($post['videos2'] ?? '') : ($post['videos2' . $id] ?? ''),
            ];
            $this->model->where('id', $id)->update($update);
        } catch (\Exception $e) {
            $this->error('保存失败');
        }
        $this->success('保存成功');
    }
}