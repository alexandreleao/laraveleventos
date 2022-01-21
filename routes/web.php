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
Route::get('/events/create', [EventController::class, 'create'])->name('events.create')->middleware('auth');
Route::get('/events/{id}', [EventController::class, 'show'])->name('events.show');
Route::post('/events/store', [EventController::class, 'store'])->name('events.store');


Route::get('/contact', function (){
    return view('contact');
});

Route::get('/dashboard',[EventController::class, 'dashboard'])->middleware('auth');

