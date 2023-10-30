<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\AuthCheckController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Users\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/auth-check', [AuthCheckController::class, 'authCheck'])->name('auth.check');
});

//User routes
Route::middleware(['auth','user.auth'])->group(function () {
Route::get('/user-dashboard', [UserController::class, 'userDashboard'])->name('user.dashboard');
Route::get('/add-new-task', [UserController::class, 'addNewTask'])->name('user.addtask');
Route::post('/add-new-task', [UserController::class, 'submitNewTask'])->name('user.submitTask');
Route::delete('/delete-task/{id}', [UserController::class, 'deleteTask'])->name('user.deleteTask');
Route::get('/edit-task/{id}', [UserController::class, 'editTask'])->name('user.editTask');
Route::put('/update-task/{id}', [UserController::class, 'updateTask'])->name('user.updateTask');
});

//Admin routes
Route::middleware(['auth','admin.auth'])->group(function () {
Route::get('/admin-dashboard', [AdminController::class, 'adminDashboard'])->name('admin.dashboard');
});

require __DIR__.'/auth.php';
