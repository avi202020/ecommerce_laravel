<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CodEcommerce</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
        @yield("scripts")
    </head>
    <body>
        <nav class="navbar navbar-light navbar-expand-md bg-light pl-5 pr-5 mb-5">
            <a href="#" class="navbar-brand">CodEcommerce</a>
            <div class="collapse navbar-collapse">
                <div class="navbar-nav">
                    <a class="nav-link" href="{{route('home')}}">Home</a>
                    <a class="nav-link" href="{{route('categoria')}}">Categorias</a>
                    <a class="nav-link" href="{{route('cadastrar')}}">Cadastrar</a>
                    @if( ! Auth::user() )
                        <a class="nav-link" href="{{route('login')}}">Login</a>
                    @else
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

                @if($message = Session::get('err'))
                    <div class="col-12">
                        <div class="alert alert-danger">{{$message}}</div>
                    </div>
                @endif
                @if($message = Session::get('ok'))
                    <div class="col-12">
                        <div class="alert alert-success">{{$message}}</div>
                    </div>
                @endif
                <!-- Section -->
                @yield("content")
            </div>
        </div>

    </body>
</html>
