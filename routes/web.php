<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

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
// });
Route::get('/dashboard', function () {
    return view('layouts.dashboard');
});

// Route::get('/contact', function () {
//     return view('contact');
// });

Route::get('/contact','ContactController@index');
Route::get('/','LandingPageController@index');

Route::post('/contact', 'ContactController@send');

Auth::routes();

Route::middleware(['auth' , 'can:accessAdmin'])->group(function() {
    Route::resource('articles', 'ArticleController');
    Route::resource('categories', 'ArticleCategoryController');
    Route::resource('roles', 'RoleController');
});


Route::get('/home', 'HomeController@index')->name('home');
<<<<<<< Updated upstream

=======
Route::resource('articles', 'ArticleController');
Route::resource('categories', 'ArticleCategoryController');
Route::resource('roles', 'RoleController');


// 404 for undefined routes
Route::any('/{page?}',function(){
    return View::make('pages.error-pages.error-404');
})->where('page','.*');
>>>>>>> Stashed changes
