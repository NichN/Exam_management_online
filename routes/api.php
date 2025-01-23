<?php
namespace App\Http\Controllers;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Admin_login_controller;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\ResponseController;
use App\Http\Controllers\ResultController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();

});

Route::get('/exams', [ExamController::class, 'index']);
Route::post('/exams', [ExamController::class, 'store']);
//exam details
Route::get('/exams/{id}', [ExamController::class, 'show']);
Route::put('/exams/{id}', [ExamController::class, 'update']);
Route::delete('/exams/{id}', [ExamController::class, 'destroy']);
Route::get('/examsDetails/{id}', [ExamController::class, 'examDetailsById']);

Route::get('/category', [CategoryController::class, 'index']);
Route::post('/category', [CategoryController::class, 'store']);
Route::put('/category/{id}', [CategoryController::class, 'update']);
Route::delete('/category/{id}', [CategoryController::class, 'destroy']);


Route::get('/question', [QuestionController::class, 'index']);
Route::post('/question', [QuestionController::class, 'store']);
Route::get('/question/{id}', [QuestionController::class, 'show']);
Route::put('/question/{id}', [QuestionController::class, 'update']);
Route::post('/questionandAnswer', [QuestionController::class, 'questionandAnswer']);

Route::get('/answer', [AnswerController::class, 'index']);
Route::post('/answer', [AnswerController::class, 'store']);
Route::get('/answer/{id}', [AnswerController::class, 'show']);
Route::put('/answer/{id}', [AnswerController::class, 'update']);
Route::delete('/answer/{id}', [AnswerController::class, 'destroy']);

Route::get('/response', [ResponseController::class, 'index']);
Route::post('/response', [ResponseController::class, 'store']);
Route::get('/response/{id}', [ResponseController::class, 'show']);
Route::put('/response/{id}', [ResponseController::class, 'update']);
Route::delete('/response/{id}', [ResponseController::class, 'destroy']);

Route::get('/result', [ResultController::class, 'index']);
Route::post('/result', [ResultController::class, 'store']);
Route::get('/result/{id}', [ResultController::class, 'show']);
Route::put('/result/{id}', [ResultController::class, 'update']);
Route::delete('/result/{id}', [ResultController::class, 'destroy']);

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
Route::post('logout',[Admin_login_controller::class, 'logout']);
Route::get('sentverifyemail/{email}', [Admin_login_controller::class, 'sentverifyemail']);
Route::get('verify-mail/{token}',[Admin_login_controller::class,'verificationMail']);
Route::post('passwordreset',[Admin_login_controller::class, 'passwordreset']);
//profile
Route::middleware(['auth:sanctum', 'role:teacher'])->get('/teacher/dashboard', [Admin_login_controller::class, 'teacher']);
Route::middleware(['auth:sanctum', 'role:student'])->get('/student/dashboard', [Admin_login_controller::class, 'student']);
Route::middleware(['auth:sanctum'])->put('profile-update',[Admin_login_controller::class,'profile_update']);

?>
    ?>
