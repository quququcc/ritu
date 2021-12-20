<?php

namespace app\admin\controller\site;

use app\common\controller\AdminController;
use EasyAdmin\annotation\ControllerAnnotation;
use EasyAdmin\annotation\NodeAnotation;
use think\App;

/**
 * @ControllerAnnotation(title="site_innojoy_content4")
 */
class InnojoyContent4 extends AdminController
{

    use \app\admin\traits\Curd;

    public function __construct(App $app)
    {
        parent::__construct($app);

        $this->model = new \app\admin\model\SiteInnojoyContent4();
        
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
                'text'=>$post['text'] ?? '',
                'button1'=>$post['button1'] ?? '',
                'button1_link'=>$post['button1_link'] ?? '',
                'button2'=>$post['button2'] ?? '',
                'button2_link'=>$post['button2_link'] ?? '',
            ];
            $this->model->where('id',1)->update($update);
        } catch (\Exception $e) {
            $this->error('保存失败');
        }
        $this->success('保存成功');
    }
}