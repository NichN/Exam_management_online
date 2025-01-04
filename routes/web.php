<?php

use App\Http\Controllers\Admin_login_controller;
use App\Http\Controllers\page\AllTaskController;
use App\Http\Controllers\page\DepartmentController;
use App\Http\Controllers\page\MyScheduleController;
use App\Http\Controllers\page\StudentController;
use App\Http\Controllers\page\StudentDashboardController;
use Illuminate\Support\Facades\Route;


/*Route::get('/admin',function(){
    return view('Admin.dasboard_screen');
});*/

/*Route::get('/student/dashboard',function(){
    return view('Student_Dashboard.student_dashboard');
});*/

Route::get('/admin/dashboard', function () {
    return view('Admin.dasboard_screen');
});

Route::get('/admin/department', function () {
    return view('Admin.department_screen');
});
Route::get('/admin/student', function () {
    return view('Admin.student_screen');
});
Route::get('/admin/alltask', function () {
    return view('Admin.all_task_screen');
});
Route::get('/admin/myschedule', function () {
    return view('Admin.my_schedule_screen');
});
Route::get('/',[Admin_login_controller::class,'ShowLoginPage'])->name('admin.login');
Route::get('/login',[Admin_login_controller::class,'login'])->name('admin.login');
Route::group(['middleware'=>'teacher'],function(){
    Route::get('/admin',function(){
        return view('Admin.dasboard_screen');
    });
});

Route::group(['middleware' => 'student'], function () {
    Route::get('/student/dashboard', function () {
        return view('Student_Dashboard.student_dashboard');
    });
});

Route::get('/student/dashboard', [StudentDashboardController::class, 'index'])->name(name: 'Student.dashboard');
Route::get('/student/department', [DepartmentController::class, 'index'])->name(name: 'Student.department');
Route::get('/student/student', [StudentController::class, 'index'])->name(name: 'Student.student');
Route::get('/student/all-task', [AllTaskController::class, 'index'])->name(name: 'Student.all_task');
Route::get('/student/my-schedule', [MyScheduleController::class, 'index'])->name(name: 'Student.my_schedule');


?>