<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\Executivecontroller;
use App\Http\Controllers\ProfileController;
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

Route::get('/home',[AuthenticationController::class,'index'])->middleware('auth')->name('home');

//route for executive
Route::get('lead-form',[Executivecontroller::class,'LeadFormforExecutive'])->name('leadForm');
Route::post('store',[Executivecontroller::class,'StoreLead'])->name('save');
Route::get('viewLead',[Executivecontroller::class,'ExcutiveviewLeadTable'])->name('viewLeads');
Route::get('editBtn/{id}',[Executivecontroller::class,'ExecutiveEditBtn'])->name('exeEdit');
Route::post('updateExecutiveLead',[Executivecontroller::class,'ExecutiveLeadUpdate'])->name('updating');
Route::post('deleted/{id}',[Executivecontroller::class,'ExecutivedeleteLead'])->name('LeadDeleteEx');


//admin Route

Route::get('viewExecutive',[AdminController::class,'viewTable'])->name('Executive');
Route::get('updateStatus/{id}',[AdminController::class,'changeStatus'])->name('editBtn');
Route::post('updated',[AdminController::class,'update'])->name('update');
Route::get('deleted/{id}',[AdminController::class,'delete'])->name('AdminDelete');
Route::get('viewLeadAdmin',[AdminController::class,'viewLead'])->name('viewLeadByAdmin');
Route::get('editLead/{id}',[AdminController::class,'editLead'])->name('editLeads');
Route::post('updates',[AdminController::class,'updateAdminLead'])->name('adminleadUpdate');
Route::get('deletedAdminLead/{id}',[AdminController::class,'deletAdminLead'])->name('deletedAdminLead');






// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
