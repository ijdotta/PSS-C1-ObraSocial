<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\AdultAffiliateController;
use App\Http\Controllers\BenefitController;
use App\Http\Controllers\MinorAffiliateController;
use App\Http\Controllers\PlanController;

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
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::resource('employees', EmployeeController::class);
Route::resource('adult_affiliates', AdultAffiliateController::class);
Route::resource('minor_affiliates', MinorAffiliateController::class);
Route::resource('plans', PlanController::class);

Route::resource('benefits', BenefitController::class);

Route::post('/plans/edit/{plan}',[App\Http\Controllers\PlanController::class,'updatePlan'])->name('updatePlan');                                      // No borrar, tuve problemas con los update predefinidos
Route::post('/adult_affiliates/edit/{adultAffiliate}',[App\Http\Controllers\AdultAffiliateController::class,'updateAffiliate'])->name('updateAffiliate'); //  por lo que los cree de cero y no me permite usar el resource.
Route::post('/adult_affiliates/register',[App\Http\Controllers\AdultAffiliateController::class,'storeRegistro'])->name('storeRegistro'); //No borrar

//Esto de aca abajo eventualmente tiene que ser borrado, se hace automatico con las lineas de arriba.
Route::get('/adult_affiliate/create',[App\Http\Controllers\AdultAffiliateController::class,'create'])->name('createAdultAffiliate');//Redirecciona a la pantalla para cargarlo
Route::post('/adult_affiliate/store',[App\Http\Controllers\AdultAffiliateController::class,'store'])->name('storeAdultAffiliate');//Lo carga en la DB

Route::get('/plan/all',[App\Http\Controllers\PlanController::class,'getAll'])->name('getAllPlans');
Route::get('/plan/create',[App\Http\Controllers\PlanController::class,'create'])->name('createPlan');
Route::post('/plan/store',[App\Http\Controllers\PlanController::class,'store'])->name('storePlan');

Route::get('/minor_affiliate/create',[App\Http\Controllers\MinorAffiliateController::class,'create'])->name('newMinorAffiliate');
Route::post('/minor_affiliate/store',[App\Http\Controllers\MinorAffiliateController::class,'store'])->name('addMinorAffiliate');

require __DIR__.'/auth.php';
