<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TaskController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

// 1. MAIN PAGES
Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');


// DASHBOARD

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

/*
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
*/


// USER
Route::get('/register', function () {
    return view('user.register');
})->name('register');
Route::post('/resgister/submit', [UserController::class, 'store'])->name('register.submit');
Route::get('/login', function () {
    return view('user.login');
})->name('login');
Route::post('/login/submit', [UserController::class, 'login'])->name('login.submit');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');
Route::get('/user/{user_id}', [UserController::class, 'show'])->name('account');

// PROJECT
Route::get('/projects', [ProjectController::class, 'index'])->name('all_projects');
Route::get('/projects/new', function () {
    return view('project.new');
})->name('new_project');
Route::post('/projects/submit', [ProjectController::class, 'store'])->name('submit_project');
Route::get('/projects/{project_id}', [ProjectController::class, 'show'])->name('one_project');

// TASK
Route::get('/projects/{project_id}/tasks/new', [TaskController::class, 'create'])->name('new_task');
Route::post('/projects/{project_id}/tasks/submit', [TaskController::class, 'store'])->name('submit_task');
Route::get('/projects/{project_id}/tasks/{task_id}', [TaskController::class, 'show'])->name('one_task');







