<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Admin_login_controller;

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
Route::middleware(['auth:sanctum'])->put('profile-update', [Admin_login_controller::class, 'profile_update']);


// Departments API
Route::apiResource('departments', 'App\\Http\\Controllers\\DepartmentController');

// Users API
Route::apiResource('users', 'App\\Http\\Controllers\\UserController');

// Courses API
Route::apiResource('courses', 'App\\Http\\Controllers\\CourseController');

// Subjects API
Route::apiResource('subjects', 'App\\Http\\Controllers\\SubjectController');

// Exams API
Route::apiResource('exams', 'App\\Http\\Controllers\\ExamController');

// Questions API
Route::apiResource('questions', 'App\\Http\\Controllers\\QuestionController');

// Student Answers API
Route::apiResource('student-answers', 'App\\Http\\Controllers\\StudentAnswerController');

Route::get('/exam-students', [ExamStudentController::class, 'index']);
Route::get('/exam-students/{id}', [ExamStudentController::class, 'show']);
Route::post('/exam-students', [ExamStudentController::class, 'store']);
Route::put('/exam-students/{examId}/{studentId}/update-score', [ExamStudentController::class, 'updateScore']);
Route::delete('/exam-students/{id}', [ExamStudentController::class, 'destroy']);
// Tasks API
Route::apiResource('tasks', 'App\\Http\\Controllers\\TaskController');
Route::get('/exam/{examId}/questions/total-score', [ExamController::class, 'getTotalScoreForQuestions']);




?>