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
Route::resource('SecondLitterInspections','LitterInspectionSecondController');
Route::resource('Litters','LitterRegistrationController');
// Noman Routes
Route::resource('Event','EventController');
Route::resource('judges','JudgesController');
Route::resource('microchips','MicrochipsController');
Route::resource('ActivityLogs','ActivityLogController');


Route::get('/members', function(){
    return view('member_account/member_account');
});

Route::get('/new_user', function(){
    return view('users/users/add');
});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/dashboard', 'HomeController@index')->name('home');
Route::get('Member-Account/{id}','AccountsController@member_account');
Route::get('/dynamic_dependent/fetch_sire','StudCertificateController@fetch_sire')->name('dynamicdependent.fetch_sire');
Route::get('/dynamic_dependent/fetch_dam','StudCertificateController@fetch_dam')->name('dynamicdependent.fetch_dam');
Route::get('/dynamic_dependent/fetch_kennel','LitterRegistrationController@fetch_kennel')->name('dynamicdependent.fetch_kennel');
Route::get('/dynamic_dependent/fetch_sireinfo','LitterRegistrationController@fetch_sireinfo')->name('dynamicdependent.fetch_sireinfo');
Route::get('/dynamic_dependent/fetch_daminfo','LitterRegistrationController@fetch_daminfo')->name('dynamicdependent.fetch_daminfo');
Route::get('/dynamic_dependent/fetch_matingdate','LitterRegistrationController@fetch_matingdate')->name('dynamicdependent.fetch_matingdate');
Route::get('Assign-Microships/{id}','LitterRegistrationController@microchip');
Route::POST('Save-Microchips','LitterRegistrationController@save_microchips');
Route::get('/dynamic_dependent/breeder_info','LitterInspectionController@breeder_info')->name('dynamicdependent.breeder_info');
Route::get('/dynamic_dependent/breeder_dam','LitterInspectionController@breeder_dam')->name('dynamicdependent.breeder_dam');
Route::get('/dynamic_dependent/checkcertificate','LitterInspectionController@checkcertificate')->name('dynamicdependent.checkcertificate');
Route::get('/dynamic_dependent/fetch_inspection','LitterInspectionSecondController@fetch_inspection')->name('dynamicdependent.fetch_inspection');
Route::get('/print_pedigree_front/{id}','DogsController@print_front');
Route::get('/print_pedigree_back/{id}','DogsController@print_back');
Route::get('/view_pedigree/{id}','DogsController@pedigree');
Route::get('/view_progeny/{id}','DogsController@progeny');
Route::get('/destroy/{id}','KCPNumbersController@destroy');
Route::get('/DogStatusUpdate/{id}','DogsController@update_status');
Route::get('/DNAResults','DogsController@dna_results');

//Noman Routes
Route::get('show_card/{id}','EventController@show_card');
Route::get('/assign','MicrochipsController@assign');
Route::get('/assigning','MicrochipsController@assigning');
Route::get('/error_404','EventController@error_404')->name('error_404');
Route::get('/dynamic_dependent/fetch_dogs','EventController@fetch_dogs')->name('dynamicdependent.fetch_dogs');
Route::get('/dynamic_dependent/fetch_owner_details','EventController@fetch_owner_details')->name('dynamicdependent.fetch_owner_details');
Route::get('/dynamic_dependent/fetch_member_dogs','EventController@fetch_member_dogs')->name('dynamicdependent.fetch_member_dogs');
Route::get('/print_pedigree_front/{id}','DogsController@print_front');
Route::get('/print_pedigree_back/{id}','DogsController@print_back');
Route::get('/view_pedigree/{id}','DogsController@pedigree');
Route::get('/view_progeny/{id}','DogsController@progeny');
Route::get('/DNAResults','DogsController@dna_results');
Route::get('/DNAResults/{id}','DogsController@dna_results');
Route::get('/entry_show/{id}','EventController@entry_show');
Route::get('/judges_book/{id}','EventController@judges_book');
Route::get('/export_pdf/pdf/{id}','EventController@export_pdf');
Route::get('/microchipsStatusUpdate/{id}','MicrochipsController@update_status');
Route::get('/judgesStatusUpdate/{id}','JudgesController@update_status');
Route::get('/ModulesStatusUpdate/{id}','ModulesController@update_status');
Route::get('/roleStatusUpdate/{id}','RoleController@update_status');
Route::get('/userStatusUpdate/{id}','UserController@update_status');
Route::get('/StudCertificatesStatusUpdate/{id}','StudCertificateController@update_status');
Route::get('/PermissionStatusUpdate/{id}','PermissionController@update_status');
Route::get('/KCPNumberStatusUpdate/{id}','KCPNumbersController@update_status');
Route::get('/KennelStatusUpdate/{id}','KennelController@update_status');
Route::get('/ChangeStatus/{id}','EventController@change_status');
Route::get('/EventStatusUpdate/{id}','EventController@update_status');

// Shahmir Work
Route::get('Member-Files/{id}','UserController@member_files');
Route::get('Member-Files/delete/{id}','UserController@destroy_files');
Route::get('Member-Files/show/{id}','UserController@show_files');
Route::POST('fileupload','UserController@save_files');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles','RoleController');
    Route::resource('users','UserController');
    Route::resource('products','ProductController');
    Route::resource('Kennels','KennelController');
});
