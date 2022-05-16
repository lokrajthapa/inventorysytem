<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemGroupController;
use App\Http\Controllers\ItemSubGroupController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\InventoryStockController;
use App\Http\Controllers\StockOutController;



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
// Route::get('/stockin', function () {
//     return view('instock.stockin');
// });

// Route::get('/group', function () {
//     return view('master.itemGroup');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
});
// Route::get('/item', function () {
//     return view('items.item');
// });

//group items
Route::get('/group',[ItemGroupController::class,'addGroupIteam']);
//Route::get('/item',[ItemGroupController::class,'addGroupIteam']);

Route::post('/Gitemstore',[ItemGroupController::class,'groupitemstore']);
Route::get('/edit-groupitem/{id}',[ItemGroupController::class,'groupitemedit']);
Route::post('/update-groupitem',[ItemGroupController::class,'UpdateGroup'])->name('groupitem.update');
Route::get('/delete-groupitem/{id}',[ItemGroupController::class,'DeleteGroup']);
Route::get('/SearchGroupReturnInView',[ItemGroupController::class,'SearchGroupReturnInView']);
Route::get('/searchgroup',[ItemGroupController::class,'searchgroup']);

//subgroup items
Route::get('/subgroup',[ItemSubGroupController::class,'addsubgroup'])->name('subgroup');
Route::get('/subgroup/{id}',[ItemSubGroupController::class,'subgroupitemedit']);


Route::post('/subgroup/subgroupstore',[ItemSubGroupController::class,'subgroupstore']);
//Route::get('/edit-subgroupitem/{id}',[ItemSubGroupController::class,'subgroupitemedit']);
Route::post('/update-subgroupitem',[ItemSubGroupController::class,'UpdateSubGroup'])->name('subgroupitem.update');
Route::get('/delete-subgroupitem/{id}',[ItemSubGroupController::class,'DeleteSubGroup']);
Route::get('/searchsubgroup',[ItemSubGroupController::class,'SearchSubGroup']);
Route::get('/selectgroupitem/{id}',[ItemSubGroupController::class,'selectgroupitem']);
// Route::get('/searchdata',[ItemSubGroupController::class,'SearchsubGroupitem']);
Route::post('/searchsubgroupitems',[ItemSubGroupController::class,'SearchsubGroupitem']);
//company 
Route::get('/Company',[CompanyController::class,'addcompany']);
//Route::get('/Company/{id}',[CompanyController::class,'addcompany']);

Route::post('/Companystore',[CompanyController::class,'companystore']);
Route::get('/edit-Company/{id}',[CompanyController::class,'companyedit']);
Route::post('/update-Company',[CompanyController::class,'UpdateCompany'])->name('company.update');
Route::get('/delete-Company/{id}',[CompanyController::class,'DeleteCompany']);
Route::get('/searchcompany',[CompanyController::class,'Searchcompany']);

//inventorydetails
// Route::get('/item', function () {
//        return view('items.item');
// });

// Route::get('/add-item', function () {
//     return view('items.item');
// });
//for invetory setting
Route::get('/item',[InventoryController::class,'item']);
Route::get('/additemdetails',[InventoryController::class,'additemdetails']);
Route::get('/additemunitdetails/{id?}',[InventoryController::class,'additemunitdetails']);
Route::post('/itemsDetailsStore',[InventoryController::class,'itemsdetailsStore']);
Route::get('/itemsDetailsEdit/{id}',[InventoryController::class,'itemsDetailsEdit']);

//for inventory setting unit details  
Route::post('/inventorysettingStore',[InventoryController::class,'inventorysettingStore']);
//Route::get('/searchunititemdetails',[InventoryController::class,'searchunititemdetails']);

Route::get('/searchitemsetting',[InventoryController::class,'searchitemsetting']);

Route::get('/delete-itemsDetails/{id}',[InventoryController::class,'deleteitemsDetails']);


//stock In case
Route::get('/stockin',[InventoryStockController::class,'index']);
Route::get('/stockin/{id}',[InventoryStockController::class,'itemsedit']);
Route::get('/stockindelete/{id}',[InventoryStockController::class,'stockindelete']);



Route::get('/searchforstockitem',[InventoryStockController::class,'searchforstockitem']);
Route::post('/stockitemstoredummy',[InventoryStockController::class,'stockitemstore']);


//stock Out case
Route::get('/stockOut',[StockOutController::class,'index']);
Route::get('/stockOut/{id}',[StockOutController::class,'itemsedit']);
Route::get('/stockoutdelete/{id}',[StockOutController::class,'stockoutdelete']);


//Route::get('/searchforstockitem',[StockOutController::class,'searchforstockitem']);




Route::post('/stockitemstoredummysecond',[StockOutController::class,'stockitemstore']);

































