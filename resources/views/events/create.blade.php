@extends('layouts.main')

@section('title', 'Criar Evento')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        
    <div id="event-create-container" class="col-md-6 offset-md-3">
    
          <h1>Crie o seu evento</h1>    
        <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
                <label for="image">Imagem do Evento:</label>
                <input type="file" id ="image" name="image" class="form-control-file @error('image') is-invalid @enderror">
            </div>
            <div class="form-group">
                <label for="title">Evento:</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Nome do Evento">
            </div>
            <div class="form-group">
              <label for="date">Data do Evento:</label>
              <input type="date" class="form-control @error('date') is-invalid @enderror" id="date" name="date" >
          </div>
            <div class="form-group">
                <label for="title">Cidade:</label>
                <input type="text" class="form-control @error('city') is-invalid @enderror" id="city" name="city" placeholder="Local do Evento">
            </div>
            <div class="form-group">
                <label for="title">O evento é privado?</label>
                <select name="private" id="private" class="form-control @error('private') is-invalid @enderror">
                   <option value="false">Não</option> 
                   <option value="true">Sim</option>
                </select>
            </div>
            <div class="form-group">
                <label for="title">Descrição do evento:</label>
                <textarea name="description" id="description"  class="form-control @error('description') is-invalid @enderror" placeholder="O que vai acontecer no evento?" ></textarea>
            </div>
            <div class="form-group" >
              <label for="title">Adicione itens de infraestrutura:</label>
             <div class="form-group">
               <input type="checkbox" name="items[]" value="Cadeiras" class="@error('items[]') is-invalid @enderror"> Cadeiras
             </div>
             <div class="form-group">
              <input type="checkbox" name="items[]" value="Palco" @error('items[]') is-invalid @enderror> Palco
            </div>
            <div class="form-group">
              <input type="checkbox" name="items[]" value="Cerveja grátis" @error('items[]') is-invalid @enderror>Cerveja grátis
            </div>
            <div class="form-group">
              <input type="checkbox" name="items[]" value="Open Food" @error('items[]') is-invalid @enderror> Open food
            </div>
            <div class="form-group">
              <input type="checkbox" name="items[]" value="Brindes" @error('items[]') is-invalid @enderror> Brindes
            </div>
          </div>
            <br>
            <input type="submit" class="btn btn-primary"value="Criar Evento">
        </form>
    </div>

@endsection