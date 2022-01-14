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

Route::get('/', function () {
    $nome =  "Alexandre";
    $idade = 42;
    $programador = 'programador';

    $arr = [10,20,30,40,50];

    $nomes = ["Alexandre", "Camila", "João", "Henrique", "Noah"];

    return view('welcome',
    ['nome' => $nome, 
     'idade' => $idade, 
     'programador' => $programador,
     'arr' => $arr,
     'nomes'=>$nomes
    ]); 
});

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
