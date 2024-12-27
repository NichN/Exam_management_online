<?php

use Illuminate\Support\Facades\Route;


Route::get('/admin',function(){
    return view('Admin.dasboard_screen');
});

Route::get('/',function(){
    return view('Student_Dashboard.student_dashboard');
});

