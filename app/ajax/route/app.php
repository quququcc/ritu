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
Route::get('jobList', 'Job/index');
//白皮书
Route::get('book', 'Book/index');
Route::get('bookList', 'Book/list');
//获取最新一条白皮书信息（站点顶部）
Route::get('bookTop', 'Book/top');

//榜单
Route::get('top', 'Top/index');
Route::get('topList', 'Top/list');
//动态
Route::get('newsDetail', 'News/detail');
Route::get('newsList', 'News/list');
Route::get('news', 'News/index');
//学院
Route::get('course', 'Course/index');
Route::get('courseList', 'Course/List');
Route::get('courseHistory', 'Course/history');
Route::get('courseDetail', 'Course/detail');
//客户案例
Route::get('caseList', 'CaseController/list');
Route::get('case', 'CaseController/index');
Route::get('caseDetail', 'CaseController/detail');

//友情链接
Route::get('config/link', 'Config/link');

