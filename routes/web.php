<?php

use App\Http\Controllers\Admin_login_controller;
use Illuminate\Support\Facades\Route;


/*Route::get('/admin',function(){
    return view('Admin.dasboard_screen');
});*/

/*Route::get('/student/dashboard',function(){
    return view('Student_Dashboard.student_dashboard');
});*/

Route::get('/admin/dashboard',function(){
    return view('Admin.dasboard_screen');
});

Route::get('/admin/department',function(){
    return view('Admin.department_screen');
});

Route::get('/admin/student',function(){
    return view('Admin.student_screen');
});

Route::get('/admin/alltask',function(){
    return view('Admin.all_task_screen');
});

Route::get('/admin/myschedule',function(){
    return view('Admin.my_schedule_screen');
});
Route::get('/',[Admin_login_controller::class,'ShowLoginPage'])->name('admin.login');
Route::get('/login',[Admin_login_controller::class,'login'])->name('admin.login');
Route::group(['middleware'=>'teacher'],function(){
    Route::get('/admin',function(){
        return view('Admin.dasboard_screen');
    });
});

Route::group(['middleware'=>'student'],function(){
    Route::get('/student/dashboard',function(){
        return view('Student_Dashboard.student_dashboard');
    });
});

?>