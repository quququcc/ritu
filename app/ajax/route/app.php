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

//专家团队
Route::get('team', 'Team/index');

//企业培训
Route::get('trainCate', 'Train/cate');
Route::get('train/[:cate_id]/[:page]$', 'Train/list');
Route::get('trainDetail/:id', 'Train/detail');

//人才训练
Route::get('drill/[:page]$', 'Drill/list');
Route::get('drillDetail/:id', 'Drill/detail');

//服务案例
Route::get('case/[:page]$', 'Cases/list');

//新闻中心
Route::get('news/[:page]$', 'News/list');
Route::get('newsDetail/:id', 'News/detail');

//管理智库
Route::get('think/[:page]$', 'Think/list');
Route::get('thinkDetail/:id', 'Think/detail');

//联系我们
Route::get('contact', 'Contact/index');


