<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>
        <!--css boodstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        
       
        <!--Fonte de google -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">
        
        <!--css da aplicação -->
       <link rel="stylesheet" href="/css/style.css">
       <script src="/js/scripts.js"></script>
    </head>
    <body>
        <header>
        <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand" href="/">
                    <img src="/img/events.png" style="height:50px" alt="Events">
                </a>
            <div class="collapse navbar-collapse" id="navbar">
                
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="{{ route('index')}}" class="nav-link">Eventos</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="{{ route('events.create') }}" class="nav-link">Criar Eventos</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="#" class="nav-link">Entrar</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="#" class="nav-link">Cadastrar</a>
                    </li>
                </ul>
            </div>  
        </div>
       </nav>
    </header>

    <main>
       <div class="container-fluid">
            <div class="row">
            @if(session('msg'))
                <p class="msg">{{ session('msg') }}</p>
            @endif
            @yield('content') 
            </div>
       </div>
    </main>   

    <footer> 
      <p>Eventos &copy; 2022</p>
    </footer>
     <!-- ícones -->
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    </body>
</html>