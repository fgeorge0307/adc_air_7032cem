<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;

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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/',[PagesController::class,'index'])->name('login');

Route::post('signin',[PagesController::class,'signin'])->name('signin');

Route::get('logout',[PagesController::class,'logout'])->name('logout');





Route::middleware(['engineer'])->group(function () {
    Route::get('engineer/dashboard',[PagesController::class,'e_dashboard'])->name('e_dashboard');
    Route::get('engineer/airframes',[PagesController::class,'airframes'])->name('airframes');
    Route::get('engineer/record/airframe',[PagesController::class,'record_airframe'])
    ->name('record_airframe');
    Route::get('engineer/record/maintenance',[PagesController::class,'record_maintenance'])
    ->name('record_maintenance');
    Route::get('engineer/maintenance',[PagesController::class,'maintenance'])->name('maintenance');
    Route::get('engineer/record/flight',[PagesController::class,'record_flight'])
    ->name('record_flight');
    Route::get('engineer/flights',[PagesController::class,'flights'])->name('flights');

    Route::post('add_airframe',[PagesController::class,'add_airframe'])->name('add_airframe');
    Route::post('add_flightlog',[PagesController::class,'add_flightlog'])->name('add_flightlog');
    Route::post('add_maintenance',[PagesController::class,'add_maintenance'])->name('add_maintenance');
});

Route::middleware(['admin'])->group(function () {

    Route::get('admin/dashboard',[PagesController::class,'a_dashboard'])->name('a_dashboard');
    Route::get('admin/register',[PagesController::class,'register'])->name('register');
    Route::post('create_account',[PagesController::class,'create_account'])->name('create_account');

    Route::get('delete/{id}',[PagesController::class,'delete_account']);
    Route::get('lock/{id}',[PagesController::class,'lock_account']);
    Route::get('unlock/{id}',[PagesController::class,'unlock_account']);

    


});

