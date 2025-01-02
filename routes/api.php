<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\UserController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
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

});
