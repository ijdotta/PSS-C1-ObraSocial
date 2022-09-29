<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/adult_affiliate/create',[App\Http\Controllers\AdultAffiliateController::class,'create'])->name('newAdultAffiliate');//Redirecciona a la pantalla para cargarlo
Route::post('/adult_affiliate/store',[App\Http\Controllers\AdultAffiliateController::class,'store'])->name('addAdultAffiliate');//Lo carga en la DB

require __DIR__.'/auth.php';
