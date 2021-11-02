<?php
/**
 * Created by PhpStorm.
 * User: weiming
 * Date: 2021/10/23
 * Time: 19:07
 */

namespace app\ajax\controller;

use app\ajax\model\SiteProject;
class Project
{
    protected $model;

    public function __construct()
    {
        $this->model = new SiteProject();
    }

    /**
     * @note: 项目案例列表
     * @param $page
     * @return json
     */
    public function list($page=1){
        $limit = 5;
//        $limit = 2;
        //获取最新5条
        $data = $this->model->field(['id','title','descript','image'])->limit(($page - 1) * $limit, $limit)->select();
        //总数据量
        $num = $this->model->count();

        $return = [
            'list' => $data,
            'page' => $page,
            'num' => $num,
            'page_num'=>ceil($num/$limit)
        ];

        return json_encode($return);
    }

    /**
     * @note; 项目案例详情
     * @param $id
     * @return json
     */
    public function detail($id)
    {
        //详情
        $data = $this->model->where('id',$id)->find() ?? [];

        //获取上一篇下一篇
        $prev = $this->model->field(['id','title'])->where('id','<',$id)->limit(1)->find() ?? [];
        $next = $this->model->field(['id','title'])->where('id','>',$id)->limit(1)->find() ?? [];

        $return = [
            'detail'=>$data,
            'prev'=>$prev,
            'next'=>$next,
        ];

        return json_encode($return);
    }
}