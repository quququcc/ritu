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

//首页
Route::get('index', 'Index/index');
//innojoy
Route::get('innojoy', 'Innojoy/index');
//innojet
Route::get('innojet', 'Innojet/index');
//商标
Route::get('brand', 'Brand/index');
//咨询
Route::get('cons', 'Cons/index');
//关于我们
Route::get('about', 'About/index');
//招聘岗位分类
Route::get('jobCate', 'Job/cate');
Route::get('jobList/[:cate_id]/[:page]', 'Job/index');
//资源中心
Route::get('resource', 'Resource/index');
//白皮书
Route::get('book/[:page]', 'Book/index');
//榜单
Route::get('top/[:page]', 'Top/index');
//动态
Route::get('newsDetail/[:id]', 'News/detail');
Route::get('news/[:page]', 'News/index');
//学院
Route::get('courseHot', 'Course/hot');


