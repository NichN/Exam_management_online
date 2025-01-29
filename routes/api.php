<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Admin_login_controller;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\ResponseController;
use App\Http\Controllers\page\StudentController;
use App\Http\Controllers\ResultController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('profile', [Admin_login_controller::class, 'profile']);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/student/dashboard', [Admin_login_controller::class, 'Student'])->name('Student.student_dashboard');
    Route::get('/admin/dashboard', [Admin_login_controller::class, 'Teacher'])->name('Admin.dasboard_screen');
});

//កុំប៉ះកន្លែងនឹង
Route::post('login', [Admin_login_controller::class, 'login']);
Route::post('register', [Admin_login_controller::class, 'register']);
Route::post('logout', [Admin_login_controller::class, 'logout']);
Route::get('sentverifyemail/{email}', [Admin_login_controller::class, 'sentverifyemail']);
Route::get('verify-mail/{token}', [Admin_login_controller::class, 'verificationMail']);
Route::post('passwordreset', [Admin_login_controller::class, 'passwordreset']);
//profile
Route::middleware(['auth:sanctum', 'role:teacher'])->get('/teacher/dashboard', [Admin_login_controller::class, 'teacher']);
Route::middleware(['auth:sanctum', 'role:student'])->get('/student/dashboard', [Admin_login_controller::class, 'student']);
Route::middleware(['auth:sanctum'])->patch('profile-update',[Admin_login_controller::class,'profile_update']);
Route::post('password/email', [Admin_login_controller::class, 'sendResetLinkEmail']);

//student total
Route::middleware('auth:sanctum')->get('/students/total', [StudentController::class, 'getTotalStudents']);
?>
