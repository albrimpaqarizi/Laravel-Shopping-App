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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::resource('/contact','ContactController');
Route::resource('shop','HomeController');
Route::resource('orders','OrdersController');

Route::middleware(['auth', 'can:accessCostumer'])->group(function() {
    Route::resource('payment','PaymentController');
});


Route::middleware(['auth' , 'can:accessAdmin'])->group(function() {
    Route::get('/dashboard', function () {
        return view('layouts.dashboard');
    });
    Route::resource('articles', 'ArticleController');
    Route::resource('categories', 'ArticleCategoryController');
    Route::resource('roles', 'RoleController');
    Route::resource('users', 'UserController');
});
Route::resource('profiles', 'UserManageController');

