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


Auth::routes();

Route::group(['middleware' => ['auth', 'preventBackHistory']], function (){

    Route::get('/', 'DashboardController@index');

    Route::resource('class', 'ClassController');
    Route::resource('teachers', 'TeacherController');
    Route::resource('parents', 'ParentController');
    Route::get('students/get-student/{class}', 'StudentController@getStudent')->name('get-student');
    Route::resource('students', 'StudentController');
    Route::resource('attendances', 'AttendanceController');

    Route::get('childrens/index', 'ChildrenController@index')->name('childrens.index');
    Route::get('childrens/{children}', 'ChildrenController@show')->name('childrens.show');
    Route::get('childrens/{children}/attendance', 'ChildrenController@attendance')->name('childrens.attendance');

    //Admin profile Routes.....................................
    Route::get('profile', 'UserController@showProfile')->name('profile');
    Route::post('profile', 'UserController@updateProfile')->name('profile');

    //Password Change.......................................
    Route::get('change-password', 'UserController@changePassword')->name('changePassword');
    Route::post('change-password', 'UserController@updatePassword')->name('changePassword');

    //Adminstration...........
    Route::resource('permissions','Adminstration\PermissionController');
    Route::resource('roles','Adminstration\RoleController');
    Route::get('assign-roles/{user}','Adminstration\AssignRoleController@edit')->name('assign-role.edit');
    Route::post('assign-roles/{user}','Adminstration\AssignRoleController@update')->name('assign-role.update');

});



