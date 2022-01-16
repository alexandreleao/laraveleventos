@extends('layouts.main')

@section('title', 'Criar Evento')

@section('content')

    <h1>Crie um evento</h1>

    <div class="mb-3">
        <label  class="form-label">Nome do Evento</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="">
      </div>
      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Descrição do Evento</label>
        <textarea class="form-control" id="" rows="3"></textarea>
      </div>

@endsection