<?php
    use App\Http\Controllers\Admin_login_controller;
    use Illuminate\Support\Facades\Route;

    Route::get('/', [Admin_login_controller::class, 'ShowLoginPage'])->name('login');
    
    Route::get('/student/dashboard', function() {
        return view('Student.student_dashboard');
    });
    
    Route::get('/admin/dashboard', function() {
        return view('Admin.dasboard_screen');
    });
    
    Route::get('/admin/department', function() {
        return view('Admin.department_screen');
    });
    
    Route::get('/admin/dashboard', function () {
        return view('Admin.dasboard_screen');
    })->middleware('auth', 'role:teacher');
    
    Route::get('/student/dashboard', function () {
        return view('Student.student_dashboard');
    })->middleware('auth', 'role:student');
    
    
?>