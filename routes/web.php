<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\AdultAffiliateController;
use App\Http\Controllers\BenefitController;
use App\Http\Controllers\BenefitEvaluationController;
use App\Http\Controllers\MinorAffiliateController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\ReimbursementController;
use App\Http\Controllers\PaymentCouponController;
use App\Http\Controllers\ReimbursementEvaluationController;

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

Route::middleware('auth', 'verified')->group(function () {
    Route::resource('employees', EmployeeController::class);
    Route::get('adult_affiliates/{adultAffiliate}/edit/minors', [App\Http\Controllers\MinorAffiliateController::class,'indexByAdult'])->name('edit_adult_minors');
    Route::delete('adult_affiliates/{adultAffiliate}/delete_minor/{minorAffiliate}', [App\Http\Controllers\MinorAffiliateController::class,'destroyByAdultAffiliate'])->name('delete_minor_by_adult');
    Route::resource('adult_affiliates', AdultAffiliateController::class);
    Route::resource('minor_affiliates', MinorAffiliateController::class);
    Route::resource('plans', PlanController::class);
    Route::resource('reimbursements', ReimbursementController::class);

    Route::get('/coupons/request',[App\Http\Controllers\PaymentCouponController::class,'request'])->name('request_payment_coupon');
    Route::get('/coupons/create',[App\Http\Controllers\PaymentCouponController::class,'create'])->name('create_payment_coupon');
    Route::get('/coupons/create/month',[App\Http\Controllers\PaymentCouponController::class,'createMonth'])->name('create_payment_coupon_month');
    Route::get('/coupons/create/semester/{semester}',[App\Http\Controllers\PaymentCouponController::class,'createSemester'])->name('create_payment_coupon_semester');
    Route::get('/coupons/create/annual',[App\Http\Controllers\PaymentCouponController::class,'createAnnual'])->name('create_payment_coupon_annual');
    Route::get('/coupons/download',[App\Http\Controllers\PaymentCouponController::class,'downloadPDF'])->name('download_payment_coupon');

    Route::resource('benefits', BenefitController::class);
    Route::post('/benefits/filtered', [BenefitController::class, 'filteredIndex'])->name('filteredBenefits');
    
    Route::get('/evaluate/benefits', [BenefitEvaluationController::class, 'index'])->name('benefitsToEvaluate');
    Route::get('/benefits/{id}/evaluate', [BenefitEvaluationController::class, 'evaluate'])->name('evaluateBenefit');
    Route::get('/benefits/{id}/medical-order/download', [BenefitEvaluationController::class, 'downloadMedicalOrder'])->name('downloadMedicalOrder');
    Route::get('/benefits/{id}/medical-history/download', [BenefitEvaluationController::class, 'downloadMedicalHistory'])->name('downloadMedicalHistory');
    Route::put('/benefits/{id}/evaluate/approve', [BenefitEvaluationController::class, 'approve'])->name('approveBenefit');
    Route::put('/benefits/{id}/evaluate/reject', [BenefitEvaluationController::class, 'reject'])->name('rejectBenefit');

    Route::get('/evaluate/reimbursements', [ReimbursementEvaluationController::class, 'index'])->name('reimbursementsToEvaluate');
    Route::get('/reimbursements/{id}/evaluate', [ReimbursementEvaluationController::class, 'evaluate'])->name('evaluateReimbursement');
    Route::get('/reimbursements/{id}/invoice/download', [ReimbursementEvaluationController::class, 'downloadInvoice'])->name('downloadReimbursementInvoice');
    Route::get('/reimbursements/{id}/medical-request/download', [ReimbursementEvaluationController::class, 'downloadMedicalRequest'])->name('downloadReimbursementMedicalRequest');
    Route::get('/reimbursements/{id}/medical-history/download', [ReimbursementEvaluationController::class, 'downloadMedicalHistory'])->name('downloadReimbursementMedicalHistory');
    Route::put('/reimbursements/{id}/evaluate/approve', [ReimbursementEvaluationController::class, 'approve'])->name('approveReimbursement');
    Route::put('/reimbursements/{id}/evaluate/reject', [ReimbursementEvaluationController::class, 'reject'])->name('rejectReimbursement');

    Route::post('/plans/edit/{plan}',[App\Http\Controllers\PlanController::class,'updatePlan'])->name('updatePlan');                                      // No borrar, tuve problemas con los update predefinidos
    Route::post('/adult_affiliates/edit/{adultAffiliate}',[App\Http\Controllers\AdultAffiliateController::class,'updateAffiliate'])->name('updateAffiliate');//  por lo que los cree de cero y no me permite usar el resource
    Route::post('/adult_affiliates/updateSelf/{adultAffiliate}',[App\Http\Controllers\AdultAffiliateController::class,'updateAffiliateSelf'])->name('updateAffiliateSelf'); 
    Route::post('/adult_affiliates/register',[App\Http\Controllers\AdultAffiliateController::class,'storeRegistro'])->name('storeRegistro'); //No borrar
    Route::get('/adult_affiliates/myUserAffiliate/{id}',[App\Http\Controllers\AdultAffiliateController::class,'myUserAffiliate'])->name('myUserAffiliate'); //No borrar
    Route::get('/adult_affiliates/myUserAffiliateEdit/{adultAffiliate}',[App\Http\Controllers\AdultAffiliateController::class,'myUserAffiliateEdit'])->name('myUserAffiliateEdit'); //No borrar

    Route::post('/employee/edit/{employee}',[App\Http\Controllers\EmployeeController::class,'updateEmployee'])->name('updateEmployee');
    Route::put('/employee/updateSelf/{employee}',[App\Http\Controllers\EmployeeController::class,'updateEmployeeSelf'])->name('updateEmployeeSelf'); 
    Route::get('/employees/myUserEmployee/{id}',[App\Http\Controllers\EmployeeController::class,'myUserEmployee'])->name('myUserEmployee'); 
    Route::get('/employees/myUserEmployeeEdit/{employee}',[App\Http\Controllers\EmployeeController::class,'myUserEmployeeEdit'])->name('myUserEmployeeEdit'); 


    //Esto de aca abajo eventualmente tiene que ser borrado, se hace automatico con las lineas de arriba.
    Route::get('/adult_affiliate/create',[App\Http\Controllers\AdultAffiliateController::class,'create'])->name('createAdultAffiliate');//Redirecciona a la pantalla para cargarlo
    Route::post('/adult_affiliate/store',[App\Http\Controllers\AdultAffiliateController::class,'store'])->name('storeAdultAffiliate');//Lo carga en la DB

    Route::get('/plan/all',[App\Http\Controllers\PlanController::class,'getAll'])->name('getAllPlans');
    Route::get('/plan/create',[App\Http\Controllers\PlanController::class,'create'])->name('createPlan');
    Route::post('/plan/store',[App\Http\Controllers\PlanController::class,'store'])->name('storePlan');

    Route::get('/minor_affiliate/create',[App\Http\Controllers\MinorAffiliateController::class,'create'])->name('newMinorAffiliate');
    Route::post('/minor_affiliate/store',[App\Http\Controllers\MinorAffiliateController::class,'store'])->name('addMinorAffiliate');    
});
require __DIR__.'/auth.php';
