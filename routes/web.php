<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Admin_login_controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\page\ExamController;
use App\Http\Controllers\page\HistoryExamController;
use App\Http\Controllers\page\ResultController;
use App\Http\Controllers\page\StudentController;
use App\Http\Controllers\page\StudentDashboardController;
use App\Http\Controllers\page\SubjectController;

// Admin Routes
Route::get('/', [Admin_login_controller::class, 'ShowLoginPage'])->name('admin.login');
Route::get('/password/email',function(){
    return view('Loginform.Password_Reset');
})->name('emailreset');

Route::get('/admin/dashboard', function () {
    return view('Admin.dasboard_screen');
})->middleware('auth', 'role:teacher');

Route::group(['middleware' => 'role:teacher'], function () {
    Route::get('/admin/department', function () {
        return view('Admin.department_screen');
    });
    Route::get('/admin/department/detail', function () {
        return view('Admin.batch_detail_screen');
    });
    Route::get('/admin/student', function () {
        return view('Admin.student_screen');
    });
    Route::get('/admin/student/detail', function () {
        return view('Admin.student_detail_screen');
    });
    Route::get('/admin/student/task/detail', function () {
        return view('Admin.student_task_detail_screen');
    });
    Route::get('/admin/alltask', function () {
        return view('Admin.all_task_screen');
    });
    Route::get('/admin/alltask/detail', function () {
        return view('Admin.task_detail_screen');
    });
    Route::get('/admin/myschedule', function () {
        return view('Admin.my_schedule_screen');
    });
});
// Student Routes

Route::get('/student/dashboard', [StudentDashboardController::class, 'index'])->name('Student.dashboard')->middleware('auth', 'role:student');
Route::get('/student/subject', [SubjectController::class, 'index'])->name('Student.subject');
Route::get('/student/exam', [ExamController::class, 'index'])->name('Student.exams');
Route::get('/student/history-exam', [HistoryExamController::class, 'index'])->name('Student.history_exam');
Route::get('/student/result', [ResultController::class, 'index'])->name('Student.result');
Route::get('/student/student', [StudentController::class, 'index'])->name('Student.student');
Route::get('/student/exam-page', [ExamController::class, 'exampage'])->name('Student.exam_page');

?>