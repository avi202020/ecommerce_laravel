<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CodEcommerce</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    </head>
    <body>
        <nav class="navbar navbar-light navbar-expand-md bg-light pl-5 pr-5 mb-5">
            <a href="#" class="navbar-brand">CodEcommerce</a>
            <div class="collapse navbar-collapse">
                <div class="navbar-nav">
                    <a class="nav-link" href="{{route('home')}}">Home</a>
                    <a class="nav-link" href="{{route('categoria')}}">Categorias</a>
                    <a class="nav-link" href="{{route('cadastrar')}}">Cadastrar</a>
                </div>
            </div>
            <a href="#" class="btn btn-sm"><i class="fa fa-shopping-bag"></i></a>
        </nav>

        <div class="container">
            <div class="row">
                @if(!empty($produtos))
                    @foreach($produtos as $prod)
                        <div class="col-3 mb-3">
                            <div class="card">
                                <img class="card-img-top" src="{{asset('images/'.$prod->foto)}}" />
                                <div class="card-body">
                                    <h6 class="card-title">{{$prod->nome}} - R$ {{$prod->valor}}</h6>
                                    <a href="#" class="btn btn-sm btn-secondary">Adicionar Item  <i class="fa fa-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif

            </div>
        </div>
    </body>
</html>
