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
Route::get('/events/{id}', [EventController::class, 'show']);
Route::post('/events/store', [EventController::class, 'store'])->name('events.store');
Route::delete('/events/{id}',[EventController::class, 'destroy'])->name('events.destroy')->middleware('auth');
Route::get('/events/edit/{id}', [EventController::class, 'edit'])->name('events.edit')->middleware('auth');
Route::put('events/update/{id}', [EventController::class, 'update'])->name('events.update')->middleware('auth');

Route::get('/contact', function (){
    return view('contact');
});

Route::get('/dashboard',[EventController::class, 'dashboard'])->middleware('auth');

Route::post('/events/join/{id}',[EventController::class, 'joinEvent'])->middleware('auth');

Route::delete('/events/leave/{id}',[EventController::class, 'leaveEvent'])->middleware('auth');


