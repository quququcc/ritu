<?php

namespace app\admin\controller\site;

use app\common\controller\AdminController;
use EasyAdmin\annotation\ControllerAnnotation;
use EasyAdmin\annotation\NodeAnotation;
use think\App;

/**
 * @ControllerAnnotation(title="site_config_bottom1")
 */
class ConfigBottom1 extends AdminController
{

    use \app\admin\traits\Curd;

    public function __construct(App $app)
    {
        parent::__construct($app);

        $this->model = new \app\admin\model\SiteConfigBottom1();
        
    }

    /**
     * @NodeAnotation(title="列表")
     */
    public function index()
    {
        $data = $this->model->select();
        $return = [];
        foreach ($data as $v){
            $return[$v['sign']] = $v;
        }
        $this->assign('data',$return);
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
                'button_name'=>$post['button_name'] ?? '',
                'form_link'=>$post['form_link'] ?? '',
                'other1'=>$post['other1'] ?? '',
                'other2'=>$post['other2'] ?? '',
                'other3'=>$post['other3'] ?? '',
            ];
            $this->model->where('sign',$post['sign'])->update($update);
        } catch (\Exception $e) {
            $this->error('保存失败');
        }
        $this->success('保存成功');
    }
}