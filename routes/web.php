<?php

use App\Http\Controllers\{
    EventController
};
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

Route::get('/', [EventController::class, 'index'])->name('index');
Route::get('/events/create', [EventController::class, 'create'])->name('events.create');

Route::get('/contact', function (){
    return view('contact');
});

Route::get('/produtos', function (){
    
$search = request('search');

    return view('products', ['search' => $search]);
});

Route::get('/product_teste/{id?}', function ($id = null){

    return view('product', ['id' => $id]);
});
