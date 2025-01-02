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

Route::apiResource('/exams', ExamController::class);
//Route::prefix('exam')->group(function () {
//    Route::get('/', [ExamController::class, 'index'])->name('exam.index');
//    Route::post('/', [ExamController::class, 'store'])->name('exam.store');
//});

Route::prefix('/category')->group(function (): void {
    Route::get('/', [CategoryController::class, 'index'])->name('category.index');
    Route::post('/', [CategoryController::class, 'store'])->name('category.index');

});

Route::post('login',[Admin_login_controller::class,'login']);
Route::post('register',[Admin_login_controller::class,'register']);
Route::group(['middleware'=>['auth:sanctum']],function(){
    Route::post('profile',[Admin_login_controller::class,'profile']);
});

Route::middleware(['auth'])->group(function(){
    Route::get('/student/dashboard',[Admin_login_controller::class,'Student'])->name('Student.student_dashboard');
    Route::get('/admin/dashboard',[Admin_login_controller::class,'Teacher'])->name('Admin.dasboard_screen');
})

?>