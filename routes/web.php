<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PortfollioController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\CommentController;
use App\Models\Services;
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

Route::get('/',[HomeController::Class, 'index']);
Route::get('/blog',[BlogController::Class, 'index']);
Route::get('/blog-details/{id}',[BlogController::Class, 'blog_detail']);
Route::get('/portfollio-details',[PortfollioController::Class, 'portfollio_detail']);

Route::post('contact-form-submit', [ContactController::class, 'contactFormSubmit']);

Route::post('comment-submit', [CommentController::class, 'commnetSubmit']);
//  Route::middleware(['auth:sanctum', 'verified'])->
//     get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {  
    
    Route::get('/dashboard',function(){
        return view('dashboard');
    })->name('dashboard');
    

    Route::get('services',function(){
        $serviceData = Services::get();
        return view('components.services',['serviceData'=> $serviceData]);
    });
    Route::post('/store-service', [ServicesController::class, 'storeService']);

    Route::get('/add-blog',function(){
        return view('components.add-blog');
    })->name('add-blog');

    Route::post('/store-blog', [BlogController::class, 'storeBlog']);
    Route::get('/blog-list', [BlogController::class, 'blogList']);
   
    Route::get('/edit-blog/{id}', [BlogController::class, 'editBlog']);
    Route::post('/store-blog/{id}', [BlogController::class, 'updateBlog']);
    
    Route::get('/delete-blog/{id}', [BlogController::class, 'deleteBlog']);
    Route::get('/change-status/{id}/{status}', [BlogController::class, 'changeStatus']);
    
});
   