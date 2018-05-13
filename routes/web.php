<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
//用户
Route::resource('users', 'UsersController');
//账号
Route::resource('accounts', 'AccountsController');
Route::post('accounts/login', 'AccountsController@login');//登录
//教练
Route::resource('trainers', 'TrainersController');
//分馆
Route::resource('branches', 'BranchesController');
//班级
Route::resource('grades', 'GradesController');
//课程
Route::resource('courses', 'CoursesController');
//课件
Route::resource('teachings', 'TeachingsController');
//分类
Route::resource('categories', 'CategoriesController');
//资讯
Route::resource('news', 'NewsController');
//附件上传:{filetype}是以文件用途来区分保存目录
Route::post('/attachment/upload/{filetype}', 'AttachmentController@upload');
//短信
Route::post('/sms/send', 'SmsController@send');