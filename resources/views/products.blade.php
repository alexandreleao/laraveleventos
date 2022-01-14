@extends('layouts.main')

@section('title', 'Produto')

@section('content')
  <h1>Tela de produtos</h1>

@if($search != '')

  <p>O usuario está buscando por: {{ $search }}</p>

@endif
@endsection