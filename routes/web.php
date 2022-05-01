<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemGroupController;
use App\Http\Controllers\ItemSubGroupController;
use App\Http\Controllers\CompanyController;



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
    return view('master.dashboard');
});
Route::get('/stockin', function () {
    return view('master.stockin');
});

// Route::get('/group', function () {
//     return view('master.itemGroup');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
});

//group items
Route::get('/group',[ItemGroupController::class,'addGroupIteam']);
Route::post('/Gitemstore',[ItemGroupController::class,'groupitemstore']);
Route::get('/edit-groupitem/{id}',[ItemGroupController::class,'groupitemedit']);
Route::post('/update-groupitem',[ItemGroupController::class,'UpdateGroup'])->name('groupitem.update');
Route::get('/delete-groupitem/{id}',[ItemGroupController::class,'DeleteGroup']);
Route::post('/searchgroup',[ItemGroupController::class,'SearchGroup']);


//subgroup items
Route::get('/subgroup',[ItemSubGroupController::class,'addsubgroup']);
Route::get('/subgroup/{id}',[ItemSubGroupController::class,'subgroupitemedit']);

Route::post('/subgroupstore',[ItemSubGroupController::class,'subgroupstore']);
//Route::get('/edit-subgroupitem/{id}',[ItemSubGroupController::class,'subgroupitemedit']);
Route::post('/update-subgroupitem',[ItemSubGroupController::class,'UpdateSubGroup'])->name('subgroupitem.update');
Route::get('/delete-subgroupitem/{id}',[ItemSubGroupController::class,'DeleteSubGroup']);
Route::get('/searchsubgroup',[ItemSubGroupController::class,'SearchGroup']);
Route::get('/selectgroupitem/{id}',[ItemSubGroupController::class,'selectgroupitem']);

Route::post('/searchsubgroupitems',[ItemSubGroupController::class,'SearchsubGroupitem']);


//company 
Route::get('/Company',[CompanyController::class,'addcompany']);
Route::post('/Companystore',[CompanyController::class,'companystore']);
Route::get('/edit-Company/{id}',[CompanyController::class,'companyedit']);
Route::post('/update-Company',[CompanyController::class,'UpdateCompany'])->name('company.update');
Route::get('/delete-Company/{id}',[CompanyController::class,'DeleteCompany']);

Route::post('/searchcompany',[ItemSubGroupController::class,'Searchcompany']);
























///trial

Route::get('/add-branch',[BranchController::class,'Addbranch'])->name('branch');
Route::Post('/add-branch',[BranchController::class,'BranchStore'])->name('branch.store');
Route::get('/all-branch',[BranchController::class,'branches']);
Route::get('/edit-branch/{id}',[BranchController::class,'EditBranch']);
Route::post('/update-branch',[BranchController::class,'UpdateBranch'])->name('branch.update');
Route::get('/delete-branch/{id}',[BranchController::class,'Delelebranch']);
//trial end

