<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Http\Controllers\LoginController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/',[FormController::class, 'index']);

Route::post('/',[FormController::class, 'store'])->name('store');

Route::get('/login',[LoginController::class,'index']);
Route::post('/login',[LoginController::class,'authenticate'])->name('login');

Route::middleware(['auth'])->group (function(){
    Route::get('/dashboard',[DashboardController::class,'index'])->name('Dashboard');
    Route::post('/dashboard',[DashboardController::class,'logout'])->name('logout');
    Route::get('/edit/{id}',[FormController::class,'edit'])->name('form.edit');
    Route::post('/update{id?}',[FormController::class,'update'])->name('form.update');
});





