<?php
    use App\Http\Controllers\Admin_login_controller;
    use Illuminate\Support\Facades\Route;

<<<<<<< HEAD
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
    
    
=======
use App\Http\Controllers\Admin_login_controller;

use App\Http\Controllers\page\ExamController;
use App\Http\Controllers\page\HistoryExamController;
use App\Http\Controllers\page\ResultController;
use App\Http\Controllers\page\StudentController;
use App\Http\Controllers\page\StudentDashboardController;
use App\Http\Controllers\page\SubjectController;
use Illuminate\Support\Facades\Route;


/*Route::get('/admin',function(){
    return view('Admin.dasboard_screen');
});*/

/*Route::get('/student/dashboard',function(){
    return view('Student_Dashboard.student_dashboard');
});*/

Route::get('/admin/dashboard', function () {
    return view('Admin.dasboard_screen');
});

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
Route::get('/', [Admin_login_controller::class, 'ShowLoginPage'])->name('admin.login');
Route::get('/login', [Admin_login_controller::class, 'login'])->name('admin.login');
Route::group(['middleware' => 'teacher'], function () {
    Route::get('/admin', function () {
        return view('Admin.dasboard_screen');
    });
});

Route::group(['middleware' => 'student'], function () {
    Route::get('/student/dashboard', function () {
        return view('Student_Dashboard.student_dashboard');
    });
});

Route::get('/student/dashboard', [StudentDashboardController::class, 'index'])->name(name: 'Student.dashboard');
Route::get('/student/subject', [SubjectController::class, 'index'])->name(name: 'Student.subject');
Route::get('/student/exam', [ExamController::class, 'index'])->name(name: 'Student.exams');
Route::get('/student/history-exam', [HistoryExamController::class, 'index'])->name(name: 'Student.history_exam');
Route::get('/student/result', [ResultController::class, 'index'])->name(name: 'Student.result');
Route::get('/student/student', [StudentController::class, 'index'])->name(name: 'Student.student');
Route::get('/student/exam-page', [ExamController::class, 'exampage'])->name('Student.exam_page');


>>>>>>> 3f826563b65c05afc6f0415591823c2dc2dff003
?>