<?php

use Illuminate\Support\Facades\Route;


Route::get('/admin',function(){
    return view('Admin.dasboard_screen');
});

Route::get('/',function(){
    return view('Student_Dashboard.student_dashboard');
});

Route::get('/admin/dashboard',function(){
    return view('Admin.dasboard_screen');
});

Route::get('/admin/department',function(){
    return view('Admin.department_screen');
});