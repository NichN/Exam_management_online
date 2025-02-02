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
Route::middleware(['auth:sanctum'])->patch('profile-update', [Admin_login_controller::class, 'profile_update']);
Route::post('password/email', [Admin_login_controller::class, 'sendResetLinkEmail']);

//student total
Route::middleware('auth:sanctum')->get('/students/total', [StudentController::class, 'getTotalStudents']);
Route::get('/exams', [ExamController::class, 'index']);
Route::post('/exams', [ExamController::class, 'store']);
//exam details
Route::get('/exams/{id}', [ExamController::class, 'show']);
Route::put('/exams/{id}', [ExamController::class, 'update']);
Route::delete('/exams/{id}', [ExamController::class, 'destroy']);

Route::get('/departments', [DepartmentController::class, 'index']);
Route::get('/show/departments/{id}', [DepartmentController::class, 'show']);
Route::post('/departments', [DepartmentController::class, 'store']);
Route::put('/departments/{id}', [DepartmentController::class, 'update']);
Route::delete('/departments/{id}', [DepartmentController::class, 'destroy']);

Route::get('/courses', [DepartmentController::class, 'index']);
Route::post('/courses', [DepartmentController::class, 'store']);
Route::put('/courses/{id}', [DepartmentController::class, 'update']);
Route::delete('/courses/{id}', [DepartmentController::class, 'destroy']);

Route::get('/subjects', [DepartmentController::class, 'index']);
Route::get('/show/subjects/{id}', [SubjectController::class, 'show']);
Route::post('/subjects', [DepartmentController::class, 'store']);
Route::put('/subjects/{id}', [DepartmentController::class, 'update']);
Route::delete('/subjects/{id}', [DepartmentController::class, 'destroy']);

Route::get('/questions', [DepartmentController::class, 'index']);
Route::post('/questions', [DepartmentController::class, 'store']);
Route::put('/questions/{id}', [DepartmentController::class, 'update']);
Route::delete('/questions/{id}', [DepartmentController::class, 'destroy']);

Route::get('/student-answers', [DepartmentController::class, 'index']);
Route::post('/student-answers', [DepartmentController::class, 'store']);
Route::put('/student-answers/{id}', [DepartmentController::class, 'update']);
Route::delete('/student-answers/{id}', [DepartmentController::class, 'destroy']);

Route::get('/exam-students', [DepartmentController::class, 'index']);
Route::post('/exam-students', [DepartmentController::class, 'store']);
Route::put('/exam-students/{id}', [DepartmentController::class, 'update']);
Route::delete('/exam-students/{id}', [DepartmentController::class, 'destroy']);

?>
