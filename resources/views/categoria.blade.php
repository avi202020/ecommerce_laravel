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
        <h2>Categoria</h2>

        @if( !empty($categorias) && count($categorias)>0)
            <ul>
                @foreach($categorias as $cat)
                    <li>{{$cat->descricao}}</li>
                @endforeach
            </ul>
        @endif

        @if( !empty($produtos) && count($produtos)>0)
            <ul>
                @foreach($produtos as $prod)
                    <li>{{$prod->nome}}</li>
                @endforeach
            </ul>
        @endif
    </body>
</html>
