<?php

namespace app\admin\controller\site;

use app\common\controller\AdminController;
use EasyAdmin\annotation\ControllerAnnotation;
use EasyAdmin\annotation\NodeAnotation;
use think\App;

/**
 * @ControllerAnnotation(title="site_innojoy_content1_title")
 */
class InnojoyContent1Title extends AdminController
{

    use \app\admin\traits\Curd;

    public function __construct(App $app)
    {
        parent::__construct($app);

        $this->model = new \app\admin\model\SiteInnojoyContent1Title();
        
    }

    /**
     * @NodeAnotation(title="列表")
     */
    public function index()
    {
        $data = $this->model->where('id',1)->find()->toArray();
        $this->assign('data',$data);
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
                'title'=>$post['title'],
                'title_s'=>$post['title_s'] ?? '',
            ];
            $this->model->where('id',1)->update($update);
        } catch (\Exception $e) {
            $this->error('保存失败');
        }
        $this->success('保存成功');
    }
}