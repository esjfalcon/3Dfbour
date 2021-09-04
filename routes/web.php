<?php
use App\Http\Controllers\DemandeController;
use App\Http\Controllers\FournisseurController;
use App\Http\Controllers\ReclamationController;
use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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
});

// //register blade
Route::get('/registerr', function () {
    return view('registerr');
});

// //about_us blade
Route::get('/about-us', function () {
    return view('about-us');
});


// //contact blade
Route::get('/contact', function () {
    return view('contact');
});

// //pricing blade
Route::get('/pricing', function () {
    return view('pricing');
});


Route::get('/client', function () {
    return view('adminLTE.masterpageclient');
});


// Route::middleware(''auth:sanctum', 'verified')->get('/dashboard', function () {
//     return view('demande.create');
// })->name('dashboard');

// Auth::routes();

// Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');

// Auth::routes();

// Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');

// Auth::routes();

// Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');

// Auth::routes();

// Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');

// Auth::routes();

// Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');

// Auth::routes();

// Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');


// route demande *****************************************indexTerminé en attend
Route::get('demandesTerminé','DemandeController@index');
Route::get('demandesencours','DemandeController@index2');
Route::get('demandesenattend','DemandeController@index3');

Route::get('afficherdemande{id}','DemandeController@afficher');

Route::get('demandescreate', 'DemandeController@create')->middleware('auth');
// view
Route::get('/contact', 'DemandeController@contact')->middleware('auth');

//Route::get('demandes/create','App\Http\Controllers\DemandeController@create');
Route::post('demandes','DemandeController@store');
Route::get('/editdemandes{id}','DemandeController@edite');
Route::get('/telechargerdemande{id}','DemandeController@telechargerdemande');
Route::put('updatedemandes{id}','DemandeController@update');
Route::delete('destroydemandes{id}','DemandeController@destroy');

Route::get('fournisseurliste','FournisseurController@index');
Route::get('fournisseurcreate', 'FournisseurController@create');
Route::post('fournisseur','FournisseurController@store');
Route::get('/editfournisseur{id}','FournisseurController@edite');
Route::delete('destroyfournisseur{id}','FournisseurController@destroy');


Route::get('clientliste','ClientController@index');
Route::get('clientcreate', 'ClientController@create');
Route::post('client','ClientController@store');
Route::get('/editclient{id}','ClientController@edite');


Route::get('Reclamationliste','ReclamationController@index');
Route::get('Reclamationcreate', 'ReclamationController@create');
Route::post('reclamation','ReclamationController@store');
Route::delete('destroyreclamation{id}','ReclamationController@destroy');
Route::get('/updatereclamation{id}','ReclamationController@update');
Route::get('/editreclamation{id}','ReclamationController@edite');


// pack gold
Route::get('Gold_en_attente', 'DemandeController@Gold_en_attente');
Route::get('Gold_en_cours', 'DemandeController@Gold_en_cours');
Route::get('Gold_termine', 'DemandeController@Gold_termine');

// pack fabour

Route::get('Fabour_en_attente', 'DemandeController@Fabour_en_attente');
Route::get('Fabour_en_cours', 'DemandeController@Fabour_en_cours');
Route::get('Fabour_termine', 'DemandeController@Fabour_termine');


// pack Premium
Route::get('Premium_en_attente', 'DemandeController@Premium_en_attente');
Route::get('Premium_en_cours', 'DemandeController@Premium_en_cours');
Route::get('Premium_termine', 'DemandeController@Premium_termine');


// pack Maquette
Route::get('Maquette_en_attente', 'DemandeController@Maquette_en_attente');
Route::get('Maquette_en_cours', 'DemandeController@Maquette_en_cours');
Route::get('Maquette_termine', 'DemandeController@Maquette_termine');


Route::get('/myDemandes', 'DemandeController@myDemandes');

Route::get('/downloadimages', 'DemandeController@downloadimages')->middleware('auth');
Route::get('/getDownload', 'DemandeController@download')->middleware('auth');

Route::get('/download_demande_images', 'DemandeController@download_demande_images')->middleware('auth');

Route::get('/getDownloaddemande', 'DemandeController@download_demande')->middleware('auth');


