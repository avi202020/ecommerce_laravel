<table class="table table-bordered">
    <tr>
        <th>Produto</th>
        <th>Quantidade</th>
        <th>Valor</th>
    </tr>
    @foreach($listaItens as $item)
    <tr>
        <th>{{$item->nome}}</th>
        <th>{{$item->quantidade}}</th>
        <th>{{$item->valorItem}}</th>
    </tr>
    @endforeach
</table>
