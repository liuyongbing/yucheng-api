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
//学员资料
Route::resource('students', 'StudentController');
//用户
Route::resource('users', 'UsersController');
//班级
Route::resource('grades', 'GradesController');
//课程
Route::resource('courses', 'CoursesController');
//课程
Route::resource('teachings', 'TeachingsController');
//附件上传:{filetype}是以文件用途来区分保存目录
Route::post('/attachment/upload/{filetype}', 'AttachmentController@upload')->name('attachment.upload');