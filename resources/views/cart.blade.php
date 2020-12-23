@extends('layout')

@section('content')
    <h3>Carrinho</h3>
    @if(!empty($carrinho))
        <table class="table">
            <thead>
                <tr>
                    <th></th>
                    <th>Nome</th>
                    <th>Foto</th>
                    <th>Valor</th>
                    <th>Descrição</th>
                </tr>
            </thead>
            <tbody>
                @foreach($carrinho as $car)
                    <tr>
                        <td><a class="btn btn-danger btn-sm" href="#"><i class="fa fa-trash"></i></a></td>
                        <td>{{$car->nome}}</td>
                        <td><img src="{{url('/images/'.$car->foto)}}" height="50" /></td>
                        <td>{{$car->valor}}</td>
                        <td>{{$car->descricao}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Nenhum item no carrinho</p>
    @endif

@endsection
