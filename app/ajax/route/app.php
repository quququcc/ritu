<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
use think\facade\Route;

//banner图
Route::group('banner', function () {
    Route::get('/:sign', 'Banner/getBanner');
});

//获取页面配置信息
Route::get('config', 'Config/index');

//首页数据
Route::get('index', 'Index/index');

//关于我们
Route::get('aboutUs', 'AboutUs/index');

//产品列表
Route::get('productsList/[:cate_id]/:page', 'Products/list');
Route::get('productsDetail/:id', 'Products/detail');

//产品分类信息
Route::get('productsCate', 'Products/cate');

//解决方案列表
Route::get('solutionList/:page', 'Solution/list');
Route::get('solutionDetail/:id', 'Solution/detail');

//项目案例数据列表
Route::get('projectList/:page', 'Project/list');
Route::get('projectDetail/:id', 'Project/detail');

//联系我们
Route::get('contact', 'Contact/index');


