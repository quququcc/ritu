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

//新闻综合
Route::get('news_synthesis', 'NewsController/newsSynthesis');

//新闻详情
Route::get('news_detail', 'NewsController/newsDetail');

//加入我们板块：
Route::get('certificate', 'AboutUsController/certificate');//资质证书
Route::get('join_us', 'AboutUsController/joinUs');//加入我们
Route::get('company_profile', 'AboutUsController/companyProfile');//公司简介
Route::get('culture', 'AboutUsController/culture');//公司文化
Route::get('mechanism', 'AboutUsController/mechanism');//分支机构

//产品板块
Route::get('product_list', 'ProductController/list'); //列表
Route::get('list_page', 'ProductController/listPage'); //列表分页接口
Route::get('product_detail', 'ProductController/productDetail'); //产品详情

//应用与方案
Route::get('app_list', 'AppController/list'); //一级分类列表
Route::get('second_list', 'AppController/secondList'); //二级分类列表
Route::get('second_list_page', 'AppController/secondListPage'); //二级分类列表分页
Route::get('app_product_detail', 'AppController/appProductDetail'); //产品详情


