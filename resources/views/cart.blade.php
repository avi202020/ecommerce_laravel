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
                @php $total = 0; @endphp
                @foreach($carrinho as $key => $car)
                    <tr>
                        <td><a class="btn btn-danger btn-sm" href="{{route('cart.destroy',['index'=>$key])}}"><i class="fa fa-trash"></i></a></td>
                        <td>{{$car->nome}}</td>
                        <td><img src="{{url('/images/'.$car->foto)}}" height="50" /></td>
                        <td>{{$car->valor}}</td>
                        <td>{{$car->descricao}}</td>
                    </tr>
                    @php $total += $car->valor; @endphp
                @endforeach
            </tbody>
            <tfooter>
                <tr>
                    <td colspan="5">Total carrinho: R$ {{$total}}</td>
                </tr>
            </tfooter>
        </table>

        <form method="POST" action="{{route('payment')}}">
            @csrf
            <input type="submit" value="Finalizar compra" class="btn btn-lg btn-success"/>
        </form>
    @else
        <p>Nenhum item no carrinho</p>
    @endif

@endsection
