<?php
<<<<<<< HEAD
namespace App\Http\Controllers\Api;
=======

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\UserController;
>>>>>>> a82677d9da39045087cca5673ed2e76e85335065
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
<<<<<<< HEAD
=======
});

Route::post('/admin/login', [UserController::class, 'store']);
Route::get('/admin', [UserController::class, 'index']);

Route::post('/users', [UserController::class, 'store']);
Route::post('/login', [UserController::class, 'login']);

Route::get('/exams', [ExamController::class,'index']);
Route::post('/exams', [ExamController::class,'store']);
Route::put('/exams/{id}', [ExamController::class,'update']);
Route::delete('/exams/{id}', [ExamController::class,'destroy']);


//Route::prefix('exam')->group(function () {
//    Route::get('/', [ExamController::class, 'index'])->name('exam.index');
//    Route::post('/', [ExamController::class, 'store'])->name('exam.store');
//});

Route::prefix('/category')->group(function (): void {
    Route::get('/', [CategoryController::class, 'index'])->name('category.index');
    Route::post('/', [CategoryController::class, 'store'])->name('category.index');
    Route::put('/', [CategoryController::class, 'store'])->name('category.index');

>>>>>>> a82677d9da39045087cca5673ed2e76e85335065
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