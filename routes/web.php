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

Route::get('/', [App\Http\Controllers\Frontend\Auth\LoginController::class, 'index'])->name('login');

Route::get('/login', [App\Http\Controllers\Frontend\Auth\LoginController::class, 'index'])->name('userlogin');
Route::post('/login', [App\Http\Controllers\Frontend\Auth\LoginController::class, 'login'])->name('userlogin');

Route::get('/logout', [App\Http\Controllers\Frontend\Auth\LoginController::class, 'logout'])->name('userLogout');

Route::get('/register', [App\Http\Controllers\Frontend\Auth\RegisterController::class, 'index'])->name('register');
Route::post('/register', [App\Http\Controllers\Frontend\Auth\RegisterController::class, 'register'])->name('register');

Route::post('/forgotPassword', [App\Http\Controllers\Frontend\Auth\ForgotPasswordController::class, 'forgotPassword'])->name('forgot.password');
Route::get('/resetPassword/{token}', [App\Http\Controllers\Frontend\Auth\ForgotPasswordController::class, 'resetPassword'])->name('reset.password');
Route::post('/updatePassword', [App\Http\Controllers\Frontend\Auth\ForgotPasswordController::class, 'updatePassword'])->name('update.password');

Route::get('/countries', [App\Http\Controllers\Frontend\CountryController::class, 'index'])->name('countries');
Route::get('/states/{id?}', [App\Http\Controllers\Frontend\StateController::class, 'index'])->name('states');

Route::get('/getCaptcha', [App\Http\Controllers\Frontend\Auth\RegisterController::class, 'getCaptcha'])->name('get.captcha');
Route::post('/submitCaptcha', [App\Http\Controllers\Frontend\Auth\RegisterController::class, 'submitCaptcha'])->name('submit.captcha');
Route::get('/refreshCaptcha', [App\Http\Controllers\Frontend\Auth\RegisterController::class, 'refreshCaptcha'])->name('refresh.captcha');

Route::get('/home', [App\Http\Controllers\Frontend\HomeController::class, 'index'])->name('home');

/////////////////////////CUSTOMER ROUTES/////////////////////////////////////////
Route::get('/dashboard', [App\Http\Controllers\Frontend\CustomerController::class, 'dashboard'])->name('customer_dashboard');
///////////ROUTE FOR MENU CATEGORY/////////////
Route::any('menuCategory/add', [App\Http\Controllers\Frontend\MenuCategory::class, 'store'])->name('menuCategory/add');

Route::any('menuCategory/edit/{id?}', [App\Http\Controllers\Frontend\MenuCategory::class, 'edit'])->name('menuCategory/edit');
Route::any('menuCategory/delete/{id}', [App\Http\Controllers\Frontend\MenuCategory::class, 'delete'])->name('menuCategory/delete');
 Route::get('menu-category-list/{page?}/{slot?}/{orderin?}/{orderby?}/{search?}', [App\Http\Controllers\Frontend\MenuCategory::class, 'getList'])->name('menu-category-list');

 Route::get('menu-category', [App\Http\Controllers\Frontend\MenuCategory::class, 'index'])->name('menu-category');

/////////////////////////////ROUTE FOR MENU///////////////////////
 Route::get('menu', [App\Http\Controllers\Frontend\MenuController::class, 'index'])->name('menu');
 Route::any('add-menu',[App\Http\Controllers\Frontend\MenuController::class,'store'])->name('add_menu');
 Route::any('menu/edit/{id?}', [App\Http\Controllers\Frontend\MenuController::class, 'edit'])->name('menu_edit');
 Route::any('menu/delete/{id}', [App\Http\Controllers\Frontend\MenuController::class, 'delete'])->name('menu_delete');
   /////////////MENU ITEM ROUTE//////////////////////////
 Route::get('menu-item', [App\Http\Controllers\Frontend\MenuItemController::class, 'index'])->name('menu_item');
 Route::any('add-menu_item',[App\Http\Controllers\Frontend\MenuItemController::class,'store'])->name('add_menu_item');
 Route::any('getVendorItemByVendor/{id?}/{selected?}', [App\Http\Controllers\Frontend\MenuItemController::class, 'getVendorItemByVendor'])->name('getVendorItemByVendor');
 Route::any('menuItem/edit/{id?}',[App\Http\Controllers\Frontend\MenuItemController::class, 'edit'])->name('menu_item_edit');
Route::any('menuItem/delete/{id}',[App\Http\Controllers\Frontend\MenuItemController::class, 'delete'])->name('menu_item_delete');

Route::get('menu-item-list/{page?}/{slot?}/{orderin?}/{orderby?}/{search?}',[App\Http\Controllers\Frontend\MenuItemController::class, 'getList'])->name('menu-item-list');
Route::any('menu_item_list1',[App\Http\Controllers\Frontend\MenuItemController::class, 'getMenuItemList'])->name('menu_item_list1');
/////////////////////////////////////RECIPE ROUTE/////////////////////////////////
Route::get('recipe', [App\Http\Controllers\Frontend\RecipeController::class, 'index'])->name('recipe');
Route::any('add-recipe',[App\Http\Controllers\Frontend\RecipeController::class,'store'])->name('add-recipe');
Route::any('recipe/edit/{id?}', [App\Http\Controllers\Frontend\RecipeController::class,'edit'])->name('recipe-edit');
Route::any('recipe/delete/{id}', [App\Http\Controllers\Frontend\RecipeController::class, 'delete'])->name('recipe_delete');
///////////////////////////////////RECIPE ITEM ROUTES///////////////////////////
Route::get('recipeItem', [App\Http\Controllers\Frontend\RecipeItemController::class, 'index'])->name('recipeItem');
Route::any('add-recipe-item',[App\Http\Controllers\Frontend\RecipeItemController::class,'store'])->name('add-recipe-item');
Route::any('recipeItem/edit/{id?}',[App\Http\Controllers\Frontend\RecipeItemController::class,'edit'])->name('recipe-item-edit');
Route::any('recipeItem/delete/{id}',[App\Http\Controllers\Frontend\RecipeItemController::class, 'delete'])->name('recipe_item_delete');
Route::any('recipe_item_list',[App\Http\Controllers\Frontend\RecipeItemController::class, 'getRecipeItem'])->name('recipe_item_list');

////////////////////////////MENU COSTING ROUTES/////////////////////////////////
Route::get('menucost', [App\Http\Controllers\Frontend\MenucostController::class, 'index'])->name('menu-cost');
Route::get('menu_cost_list', [App\Http\Controllers\Frontend\MenucostController::class, 'getList'])->name('menu-cost-list');
 Route::any('menucost_add-menu',[App\Http\Controllers\Frontend\MenucostController::class,'store'])->name('menucost_add_menu');
Route::post('menucost_save_category',[App\Http\Controllers\Frontend\MenucostController::class,'saveCategory'])->name('saveCategory');
Route::post('menucost_save_menu_item',[App\Http\Controllers\Frontend\MenucostController::class,'saveMenuItem'])->name('saveMenuItem');
Route::get('menucost_search_item_code',[App\Http\Controllers\Frontend\MenucostController::class,'getItemCode'])->name('getItemCode');
Route::get('menucost_add_recipe_items',[App\Http\Controllers\Frontend\MenucostController::class,'addRecipeItems'])->name('addRecipeItems');
Route::get('print/{id?}',[App\Http\Controllers\Frontend\MenucostController::class,'print'])->name('print');

require('admin.php');
