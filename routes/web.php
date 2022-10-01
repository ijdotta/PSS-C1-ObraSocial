<?php

use App\Http\Controllers\EmployeeController;
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


Route::resource('employees', EmployeeController::class);

Route::get('/adult_affiliate/create',[App\Http\Controllers\AdultAffiliateController::class,'create'])->name('createAdultAffiliate');//Redirecciona a la pantalla para cargarlo
Route::post('/adult_affiliate/store',[App\Http\Controllers\AdultAffiliateController::class,'store'])->name('storeAdultAffiliate');//Lo carga en la DB

Route::get('/plan/create',[App\Http\Controllers\PlanController::class,'create'])->name('createPlan');
Route::post('/plan/store',[App\Http\Controllers\PlanController::class,'store'])->name('storePlan');

Route::get('/minor_affiliate/create',[App\Http\Controllers\MinorAffiliateController::class,'create'])->name('newMinorAffiliate');
Route::post('/minor_affiliate/store',[App\Http\Controllers\MinorAffiliateController::class,'store'])->name('addMinorAffiliate');

require __DIR__.'/auth.php';
