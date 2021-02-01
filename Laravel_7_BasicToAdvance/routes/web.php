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

// Route::get('/', function () {
//     return view('welcome');
// })->name('index');

// Route::get('about',function(){
//     return view('about');
// })->name('about');

// Route::get('contact',function(){
//     return view('contact');
// })->name('contact');

Auth::routes(['verify' => true]);

Route::get('/', 'HomeController@index')->name('home')->middleware('verified');

Route::get('Category/All','CategoryController@allCat')->name('all.category');

Route::post('Category/Add','CategoryController@addCat')->name('store.category');

Route::post('store/category/{id}','CategoryController@Update');

Route::get('Category/Edit/{id}','CategoryController@Edit');


Route::get('softdelete/category/{id}','CategoryController@softDelete');


Route::get('Category/restore/{id}','CategoryController@reStore');

Route::get('Category/pDelete/{id}','CategoryController@pDelete');




//brand

Route::get('Brand/All','BrandController@allBrand')->name('all.brand');
Route::post('Brand/Add','BrandController@addBrand')->name('store.brand');

Route::get('Brand/Edit/{id}','BrandController@Edit');

Route::post('Update/Brand/{id}','BrandController@Update');
Route::get('Delete/Brand/{id}','BrandController@Delete');


//multi image

Route::get('Multi/Image','MultiimgController@index')->name('multi.image');
Route::post('Multi/Image/store','MultiimgController@StoreImg')->name('store.image');
Route::get('multiImage/Delete/{id}','MultiimgController@delete');




//profile


Route::get('User/Profile','ProfileController@Profile')->name('profile.user');
Route::post('User/Update/Profile','ProfileController@Update')->name('update.user');
Route::get('User/Password','ProfileController@Password')->name('change.password');
Route::post('User/Update/Password','ProfileController@updatePassword')->name('update.password');