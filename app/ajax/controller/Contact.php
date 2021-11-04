<?php
/**
 * Created by PhpStorm.
 * User: weiming
 * Date: 2021/10/23
 * Time: 23:14
 */

namespace app\ajax\controller;

use app\ajax\model\SiteContact;
class Contact
{
    protected $model;

    public function __construct()
    {
        $this->model = new SiteContact;
    }

    public function index(){
        $data = $this->model->field(['call','email','qq','contacts','phone','address'])
                ->where('id',1)->find()->toArray() ?? '';
        return json_encode($data);
    }
}