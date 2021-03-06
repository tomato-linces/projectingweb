<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" ng-app ="tomate">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.3.js"></script>


    <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css'>
    <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css'>

    <title>{{ config('app.name', 'Tomate') }}</title>

    <script type="text/javascript" src="{{ asset('js/modulo.js') }}"></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <?php $post = TCG\Voyager\Models\Post::first(); ?>
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">

                <!-- Branding Image -->
                <a id="imgLogo" class="navbar-brand" href="{{ url('/') }}">
                    <img src="img/tomate.png" alt="tomate.com">
                </a> 

                <div class="navbar-header" >
                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                        Menú
                        <i class="fa fa-bars"></i>
                    </button>       
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right" id="ulMenu">
                        <!-- Authentication Links -->
                        <li>
                            <a class="navbar-brand text"  href="{{ url('/catalogo') }}">
                                Productos
                            </a>
                        </li>
                        <li>
                            <a class="navbar-brand text"  href="{{ url('/nosotros') }}">
                                Nosotros
                            </a>
                        </li>

                        @guest
                            <li><a class="navbar-brand text"  href="{{ route('login') }}">Iniciar Sesión</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="navbar-brand text dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a   href="{{ url('/perfil') }}">
                                            Mi Perfil
                                        </a>
                                    </li>
                                    @can('edit', $post)
                                    <li>
                                        <a   href="{{ url('/productos') }}">
                                            Nueva Requisición
                                        </a>
                                    </li>
                                    @endcan
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Cerrar Sesión
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                   
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        
        <!-- Para poder agregar esto a las demás páginas -->
        @yield('content')

        <footer>
            <div class="container" align="center">
                <span class="text-muted">Tomate Inc &copy.</span>
            </div>    
        </footer>

    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
