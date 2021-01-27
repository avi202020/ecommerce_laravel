<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{env('APP_NAME')}}</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />

        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
        @yield("scripts")
    </head>
    <body>
        <nav class="navbar navbar-light navbar-expand-md bg-light pl-5 pr-5 mb-5">
            <a href="{{route('home')}}" class="navbar-brand"><i class="fa fa-home"></i></a>
            <div class="collapse navbar-collapse">
                <div class="navbar-nav">
                    <a class="nav-link" href="{{route('categoria')}}">Categorias</a>
                    <a class="nav-link" href="{{route('cadastrar')}}">Cadastrar</a>
                    @if( ! Auth::user() )
                        <a class="nav-link" href="{{route('login')}}">Login</a>
                    @else
                        <a class="nav-link" href="{{route('pedidos')}}">Pedidos</a>
                        <a class="nav-link" href="{{route('logout')}}">Logout</a>
                    @endif
                </div>
            </div>
            <a href="{{route('cart.index')}}" class="btn btn-sm"><i class="fa fa-shopping-bag"></i></a>
        </nav>

        <div class="container">
            <div class="row">
                @if( Auth::user() )
                    <div class="col-12">
                        <p class="text-right">Seja bem vindo, {{ Auth::user()->nome }}</p>
                    </div>
                @endif

                @include('includes.error_messages')
                @include('includes.alert_messages')

                <!-- Section -->
                @yield("content")
            </div>
        </div>

    </body>
</html>
