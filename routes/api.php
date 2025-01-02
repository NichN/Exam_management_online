<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Admin_login_controller;
use App\Http\Controllers\ExamController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();

});

Route::get('/exams', [ExamController::class, 'index']);
Route::post('/exams', [ExamController::class, 'store']);
Route::put('/exams/{id}', [ExamController::class, 'update']);
Route::delete('/exams/{id}', [ExamController::class, 'destroy']);

Route::get('/category', [CategoryController::class, 'index']);
Route::post('/category', [CategoryController::class, 'store']);
Route::put('/category/{id}', [CategoryController::class, 'update']);
Route::delete('/category/{id}', [CategoryController::class, 'destroy']);

Route::post('login', [Admin_login_controller::class, 'login']);
Route::post('register', [Admin_login_controller::class, 'register']);
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('profile', [Admin_login_controller::class, 'profile']);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/student/dashboard', [Admin_login_controller::class, 'Student'])->name('Student.student_dashboard');
    Route::get('/admin/dashboard', [Admin_login_controller::class, 'Teacher'])->name('Admin.dasboard_screen');
})

    ?>