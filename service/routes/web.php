<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AutoserviceController as  A; 
use App\Http\Controllers\MechanicController as M; 
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
//Autoservice
Route::get('/autoservice/create' , [A::class, 'create'])->name('autoservice_create')->middleware('role:admin');
Route::get('/autoservice', [A::class, 'index'])->name('autoservice_index')->middleware('role:user');
Route::post('/autoservice', [A::class, 'store'])->name('autoservice_store')->middleware('role:user');

Route::get('/autoservice/edit/{autoservice}', [A::class, 'edit'])->name('autoservice_edit')->middleware('role:admin');
Route::put('/autoservice/{autoservice}' , [A::class, 'update'])->name('autoservice_update')->middleware('role:admin');
Route::delete('/autoservice/{autoservice}' , [A::class, 'destroy'])->name('autoservice_delete')->middleware('role:admin');

// Route::get('/autoservice/userview' , [M::class, 'userview'])->middleware('role:user');
//Mechanic 
Route::get('/workers/create' , [M::class, 'create'])->name('mechanic_create')->middleware('role:admin');
Route::get('/workers/index', [M::class, 'index'])->name('mechanic_index')->middleware('role:user');
Route::post('/workers', [M::class, 'store'])->name('mechanic_store')->middleware('role:user');

Route::get('/workers/edit/{mechanic}', [M::class, 'edit'])->name('mechanic_edit')->middleware('role:admin');
Route::put('/workers/{mechanic}' , [M::class, 'update'])->name('mechanic_update')->middleware('role:admin');
Route::delete('/workers/{mechanic}' , [M::class, 'destroy'])->name('mechanic_delete')->middleware('role:admin');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
