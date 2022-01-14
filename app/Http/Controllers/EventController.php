<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
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
    }

    public function create()
    {
        return view('events.create');
    }
}
