@extends('layouts.main')

@section('title' , 'Produtos')


@section('content')

@if($id != null)

 <p>Exibindo produto id: {{ $id }}</p>


@endif
@endsection