@extends('layouts.main')

@section('title', 'Eventos')

@section('content')
    <h1>Algum Título</h1>
      <img src="/img/banner.jpg" style="width:1600px; height:600px;">
        <p>{{ $nome }}</p>

        @if( $nome == "Pedro")
          <p>O nome é Pedro</p>
          
          @elseif($nome == "Alexandre")
            <p>O nome é {{ $nome }} e ele tem {{ $idade }} anos, e trabalha como {{ $programador }} .</p>
          @else
            <p>O nome não é Pedro</p>
        @endif
        
        @for($i = 0; $i < count($arr); $i++)
            <p>{{ $arr[$i] }} - {{ $i }}</p>
            @if($i == 2)
                <p> O i é 2</p>
            @endif
        @endfor   

        @php $name = "João"; 
            echo $name;
         @endphp 

         @foreach($nomes as $nome)
            <p>{{ $loop->index }}</p>
            <p>{{ $nome }}</p>

         @endforeach

@endsection