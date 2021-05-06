<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PortfollioController;
use App\Http\Controllers\ContactController;


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
Route::get('/',[HomeController::Class, 'index']);
Route::get('/blog',[BlogController::Class, 'index']);
Route::get('/blog-details',[BlogController::Class, 'blog_detail']);
Route::get('/portfollio-details',[PortfollioController::Class, 'portfollio_detail']);

Route::post('contact-form-submit', [ContactController::class, 'contactFormSubmit']);
