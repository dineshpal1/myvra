<?php
/*
|--------------------------------------------------------------------------
| All Routes of Admin
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\VendorController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Frontend\StateController;
use App\Http\Controllers\Admin\ItemClassController;
use App\Http\Controllers\Admin\VendorItemController;
use App\Http\Controllers\Frontend\CountryController;
use App\Http\Controllers\Admin\MeasureUnitController;
use App\Http\Controllers\Admin\UserController as AdminUser;

Route::get('admin', function () {
    return redirect('/admin/login');
});
Route::get('signout', [AdminUser::class, 'logOut'])->name('signout');
Route::any('forgot_password', [AdminUser::class, 'forgotPassword'])->name('forgot_password');

Route::any('/admin/login', [AdminUser::class, 'login'])->name('login');
Route::group(['prefix' => 'admin'], function () {
    Route::any('reset_password/{token?}', [AdminUser::class, 'resetPassword'])->name('reset_password');
    Route::get('dashboard', [AdminUser::class, 'index'])->name('dashboard');
    Route::any('change-password', [AdminUser::class, 'ChangePassword'])->name('change-password');

    Route::get('country-list/{page?}/{slot?}/{orderin?}/{orderby?}/{search?}', [CountryController::class, 'getCountryList'])->name('country-list');
    Route::get('/country', [CountryController::class, 'index'])->name('country');
    Route::any('country/add', [CountryController::class, 'store'])->name('country/add');
    Route::any('country/delete/{id}', [CountryController::class, 'destroy'])->name('country/delete');
    Route::any('country/edit/{id?}', [CountryController::class, 'edit'])->name('country/edit');
    Route::post('country-action', [CountryController::class, 'applyActions'])->name('country-action');

    Route::get('state-list/{page?}/{slot?}/{orderin?}/{orderby?}/{search?}', [StateController::class, 'getStateList'])->name('state-list');
    Route::get('/state', [StateController::class, 'index2'])->name('state');
    Route::any('state/add', [StateController::class, 'store'])->name('state/add');
    Route::any('state/delete/{id}', [StateController::class, 'destroy'])->name('state/delete');
    Route::any('state/edit/{id?}', [StateController::class, 'edit'])->name('state/edit');
    Route::post('state-action', [StateController::class, 'applyActions'])->name('state-action');

    Route::get('brand-list/{page?}/{slot?}/{orderin?}/{orderby?}/{search?}', [BrandController::class, 'getBrandList'])->name('brand-list');
    Route::get('/brand', [BrandController::class, 'index'])->name('brand');
    Route::any('brand/add', [BrandController::class, 'store'])->name('brand/add');
    Route::any('brand/delete/{id}', [BrandController::class, 'destroy'])->name('brand/delete');
    Route::any('brand/edit/{id?}', [BrandController::class, 'edit'])->name('brand/edit');
    Route::post('brand-action', [BrandController::class, 'applyActions'])->name('brand-action');

    Route::get('measure_unit-list/{page?}/{slot?}/{orderin?}/{orderby?}/{search?}', [MeasureUnitController::class, 'getList'])->name('measure_unit-list');
    Route::get('/measure_unit', [MeasureUnitController::class, 'index'])->name('measure_unit');
    Route::any('measure_unit/add', [MeasureUnitController::class, 'store'])->name('measure_unit/add');
    Route::any('measure_unit/delete/{id}', [MeasureUnitController::class, 'applyActions'])->name('measure_unit/delete');
    Route::any('measure_unit/edit/{id?}', [MeasureUnitController::class, 'edit'])->name('measure_unit/edit');
    Route::post('measure_unit-action', [MeasureUnitController::class, 'applyActions'])->name('measure_unit-action');

    Route::post('measure_unit-conversion', [MeasureUnitController::class, 'conversion'])->name('measure_unit-conversion');


    Route::get('item_class-list/{page?}/{slot?}/{orderin?}/{orderby?}/{search?}', [ItemClassController::class, 'getList'])->name('item_class-list');
    Route::get('/item_class', [ItemClassController::class, 'index'])->name('item_class');
    Route::any('item_class/add', [ItemClassController::class, 'store'])->name('item_class/add');
    Route::any('item_class/delete/{id}', [ItemClassController::class, 'destroy'])->name('item_class/delete');
    Route::any('item_class/edit/{id?}', [ItemClassController::class, 'edit'])->name('item_class/edit');
    Route::post('item_class-action', [ItemClassController::class, 'applyActions'])->name('item_class-action');

    Route::get('customer-list/{page?}/{slot?}/{orderin?}/{orderby?}/{search?}', [CustomerController::class, 'getList'])->name('customer-list');
    Route::get('/customer', [CustomerController::class, 'index'])->name('customer');
    Route::any('customer/add', [CustomerController::class, 'store'])->name('customer/add');
    Route::any('customer/delete/{id}', [CustomerController::class, 'destroy'])->name('customer/delete');
    Route::any('customer/edit/{id?}', [CustomerController::class, 'edit'])->name('customer/edit');
    Route::any('getSateByCountry/{id?}/{selected?}', [CustomerController::class, 'getSateByCountry'])->name('getSateByCountry');
    Route::post('customer-action', [CustomerController::class, 'applyActions'])->name('customer-action');
    Route::get('customer/view/{id}', [CustomerController::class, 'view'])->name('customer/view');

    Route::get('customer-export', [CustomerController::class, 'export'])->name('customer-export');

    Route::get('vendor-list/{page?}/{slot?}/{orderin?}/{orderby?}/{search?}', [VendorController::class, 'getList'])->name('vendor-list');
    Route::get('/vendor', [VendorController::class, 'index'])->name('vendor');
    Route::any('vendor/add', [VendorController::class, 'store'])->name('vendor/add');
    Route::any('vendor/delete/{id}', [VendorController::class, 'destroy'])->name('vendor/delete');
    Route::any('vendor/edit/{id?}', [VendorController::class, 'edit'])->name('vendor/edit');
    Route::post('vendor-action', [VendorController::class, 'applyActions'])->name('vendor-action');
    Route::get('vendor/view/{id}', [VendorController::class, 'view'])->name('vendor/view');
    Route::post('vendor/merge', [VendorController::class, 'vendorMerge'])->name('vendor/merge');






    Route::any('vendor-item-list/{vnId?}/{page?}/{slot?}/{orderin?}/{orderby?}/{search?}', [VendorItemController::class, 'getList'])->name('vendor-item-list');
    Route::get('/vendor-item/{vnId?}', [VendorItemController::class, 'index'])->name('vendor-item');
    Route::any('vendor-item/add/{vnId?}', [VendorItemController::class, 'store'])->name('vendor-item/add');
    Route::any('vendor-item/delete/{id}', [VendorItemController::class, 'destroy'])->name('vendor-item/delete');
    Route::any('vendor-item/edit/{id?}', [VendorItemController::class, 'edit'])->name('vendor-item/edit');
    Route::post('vendor-item-action', [VendorItemController::class, 'applyActions'])->name('vendor-item-action');
    Route::get('vendor-item/view/{vnId?}/{id}', [VendorItemController::class, 'view'])->name('vendor-item/view');
    Route::post('venodritem-import', [VendorItemController::class, 'import'])->name('venodritem-import');

});
