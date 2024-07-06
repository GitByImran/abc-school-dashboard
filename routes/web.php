<?php

use App\Http\Controllers\loginFormController;
use App\Http\Controllers\studentController;
use Illuminate\Support\Facades\Route;

Route::view('login', 'loginForm');

Route::post('adminLoginProcess', [loginFormController::class, 'matchData']);
Route::post('addOrUpdateStudentProcess', [studentController::class, 'saveOrUpdateData']);

Route::get('/', [studentController::class, 'getData']);
Route::get('editStudent/{id}', [studentController::class, 'editData']);
Route::get('deleteStudent/{id}', [studentController::class, 'deleteData']);
Route::post('logout', [loginFormController::class, 'logout'])->name('logout');