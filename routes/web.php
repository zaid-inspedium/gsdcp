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
//     return view('dashboard/index');
// });

Route::resource('User-types','UserTypesController');
Route::resource('KCPNumber','KCPNumbersController');
Route::resource('Dogs','DogsController');
Route::resource('Permission','PermissionController');
Route::resource('Modules','ModulesController');
Route::resource('StudCertificates','StudCertificateController');

Route::get('/members', function(){
    return view('member_account/member_account');
});

Route::get('/new_user', function(){
    return view('users/users/add');
});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/dashboard', 'HomeController@index')->name('home');
Route::get('Member-Files/{id}','UserController@member_files');
Route::get('Member-Account/{id}','AccountsController@member_account');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles','RoleController');
    Route::resource('users','UserController');
    Route::resource('products','ProductController');
    Route::resource('Kennels','KennelController');
});
