<?php
namespace App\Http\Controllers\Api;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin_login_controller;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
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