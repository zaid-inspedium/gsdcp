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
Route::resource('Permission','PermissionController');
Route::resource('Modules','ModulesController');
Route::resource('StudCertificates','StudCertificateController');
Route::resource('Dog','DogsController');
Route::resource('LitterInspections','LitterInspectionController');
Route::resource('Litters','LitterRegistrationController');


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
Route::get('/dynamic_dependent/fetch_sire','StudCertificateController@fetch_sire')->name('dynamicdependent.fetch_sire');
Route::get('/dynamic_dependent/fetch_kennel','LitterRegistrationController@fetch_kennel')->name('dynamicdependent.fetch_kennel');
Route::get('/dynamic_dependent/fetch_studcertificate','LitterRegistrationController@fetch_studcertificate')->name('dynamicdependent.fetch_studcertificate');
Route::get('/dynamic_dependent/fetch_dam','StudCertificateController@fetch_dam')->name('dynamicdependent.fetch_dam');
Route::get('/print_pedigree_front/{id}','DogsController@print_front');
Route::get('/print_pedigree_back/{id}','DogsController@print_back');
Route::get('/view_pedigree/{id}','DogsController@pedigree');
Route::get('/view_progeny/{id}','DogsController@progeny');
Route::get('/destroy/{id}','KCPNumbersController@destroy');
Route::get('/DogStatusUpdate/{id}','DogsController@update_status');
Route::get('/DNAResults','DogsController@dna_results');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles','RoleController');
    Route::resource('users','UserController');
    Route::resource('products','ProductController');
    Route::resource('Kennels','KennelController');
});
