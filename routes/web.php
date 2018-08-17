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
//accounts:账号
Route::resource('accounts', 'AccountsController');
Route::post('accounts/{accountType}/login', 'AccountsController@login');//登录
//apply:加盟申请
Route::resource('apply', 'ApplyController');
//attachment:附件上传:{filetype}是以文件用途来区分保存目录
Route::post('/attachment/upload/{filetype}', 'AttachmentController@upload');
//Banner:头图
Route::get('banner/all', 'BannerController@all');
Route::resource('banner', 'BannerController');
//branches:分馆
Route::resource('branches', 'BranchesController');
//categories:分类
Route::get('categories/all', 'CategoriesController@all');
Route::resource('categories', 'CategoriesController');
//courses:课程
Route::get('courses/all', 'CoursesController@all');
Route::resource('courses', 'CoursesController');
//coursewares:课件
Route::get('coursewares/all', 'CoursewaresController@all');
Route::resource('coursewares', 'CoursewaresController');
//grades:班级
Route::resource('grades', 'GradesController');
//Member:团队成员
Route::get('members/all', 'MemberController@all');
Route::resource('members', 'MemberController');
//news:资讯
Route::get('news/{id}/next', 'NewsController@next');
Route::get('news/{id}/previous', 'NewsController@previous');
Route::get('news/years', 'NewsController@years');
Route::resource('news', 'NewsController');
//position:Banner显示位
Route::resource('position', 'PositionController');
//sms:短信
Route::post('/sms/send', 'SmsController@send');
//student:学员
Route::resource('students', 'StudentsController');
//teachings:课件
Route::get('teachings/all', 'TeachingsController@all');
Route::resource('teachings', 'TeachingsController');
//trainers:教练
Route::resource('trainers', 'TrainersController');
//users:用户
Route::resource('users', 'UsersController');