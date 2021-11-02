<?php

namespace app\admin\controller\site;

use app\common\controller\AdminController;
use EasyAdmin\annotation\ControllerAnnotation;
use EasyAdmin\annotation\NodeAnotation;
use think\App;

/**
 * @ControllerAnnotation(title="site_banner")
 */
class Banner extends AdminController
{

    use \app\admin\traits\Curd;

    public function __construct(App $app)
    {
        parent::__construct($app);

        $this->model = new \app\admin\model\SiteBanner();
        
        $this->assign('getIsShowList', $this->model->getIsShowList());

    }

    public function add(){}
    public function delete(){}
    public function export(){}
    public function modify(){}
}