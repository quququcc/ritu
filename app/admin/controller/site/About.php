<?php

namespace app\admin\controller\site;

use app\common\controller\AdminController;
use EasyAdmin\annotation\ControllerAnnotation;
use EasyAdmin\annotation\NodeAnotation;
use think\App;

/**
 * @ControllerAnnotation(title="site_about")
 */
class About extends AdminController
{
    
    public function __construct(App $app)
    {
        parent::__construct($app);

        $this->model = new \app\admin\model\SiteAbout();

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
                'image'=>$post['image'],
                'content'=>$post['content'],
            ];
            $this->model->where('id',1)->update($update);
        } catch (\Exception $e) {
            $this->error('保存失败');
        }
        $this->success('保存成功');
    }


}