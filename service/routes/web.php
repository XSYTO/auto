<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AutoserviceController as  A; 
use App\Http\Controllers\MechanicController as M; 
use App\Http\Controllers\ServiceController as S; 
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
//Restaurant
Route::get('/restaurants/create' , [A::class, 'create'])->name('autoservice_create')->middleware('role:admin');
Route::get('/restaurants', [A::class, 'index'])->name('autoservice_index')->middleware('role:user');
Route::post('/restaurants', [A::class, 'store'])->name('autoservice_store')->middleware('role:user');

Route::get('/restaurants/edit/{autoservice}', [A::class, 'edit'])->name('autoservice_edit')->middleware('role:admin');
Route::put('/restaurants/{autoservice}' , [A::class, 'update'])->name('autoservice_update')->middleware('role:admin');
Route::delete('/restaurants/{autoservice}' , [A::class, 'destroy'])->name('autoservice_delete')->middleware('role:admin');

// Route::get('/autoservice/userview' , [M::class, 'userview'])->middleware('role:user');
//Mechanic 
Route::get('/menu/create' , [M::class, 'create'])->name('mechanic_create')->middleware('role:admin');
Route::get('/menu/index', [M::class, 'index'])->name('mechanic_index')->middleware('role:user');
Route::post('/menu', [M::class, 'store'])->name('mechanic_store')->middleware('role:user');

Route::get('/menu/edit/{mechanic}', [M::class, 'edit'])->name('mechanic_edit')->middleware('role:admin');
Route::put('/menu/{mechanic}' , [M::class, 'update'])->name('mechanic_update')->middleware('role:admin');
Route::delete('/menu/{mechanic}' , [M::class, 'destroy'])->name('mechanic_delete')->middleware('role:admin');


Route::get('/dishes/create' , [S::class, 'create'])->name('service_create')->middleware('role:admin');
Route::get('/dishes/index', [S::class, 'index'])->name('service_index')->middleware('role:admin');
Route::post('/dishes', [S::class, 'store'])->name('service_store')->middleware('role:admin');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
