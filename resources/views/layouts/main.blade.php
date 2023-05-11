<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Fonte do Google -->
        <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">

        <!-- CSS Bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

        <!-- CSS da aplicação -->
        <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

        <!-- JS da aplicação -->
        <script src="{{ asset('js/scripts.js') }}"></script>        
    </head>
    <body class="antialiased">
        <header>
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="collapse navbar-collapse" id="navbar">
                    <a href="{{ URL::to('/') }}" class="navbar-brand">
                        <img src="{{ asset('img/hdcevents_logo.svg') }}" alt="HDC Events">
                    </a>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="{{ URL::to('/') }}" class="nav-link">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ URL::to('/events/create') }}" class="nav-link">Criar Evento</a>
                        </li>
                        @auth
                            <li class="nav-item">
                                <a href="{{ URL::to('/dashboard') }}" class="nav-link">Dashboard</a>
                            </li>
                            <li id="nav-item">
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault(); this.closest('form').submit();">Sair</a>
                                </form>
                            </li>
                        @endauth
                        @guest
                            <li class="nav-item">
                                <a href="{{ URL::to('/login') }}" class="nav-link">Entrar</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ URL::to('/register') }}" class="nav-link">Cadastrar</a>
                            </li>
                        @endguest
                    </ul>
                </div>
            </nav>
        </header>

        <main>
            <div class="cointaneir-fluid">
                <div class="row">
                    @if(session("msg"))
                        <p class="msg">{{ session("msg") }}</p>
                    @endif

                    @yield('content')
                </div>
            </div>
        </main>

        <footer>
            <p>HDC Events</p>
        </footer>

        <!-- JS Ion Icons -->
        <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
    </body>
</html>
