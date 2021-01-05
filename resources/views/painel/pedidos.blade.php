@extends("layout")

@section("scripts")
    <script>
        $(function(){
            $(".infoCompra").on('click', function(){
                let id = $(this).attr("data-value");
                $.post('{{route("pedidos.show")}}',{idpedido:id},(result)=>{
                    $("#contentPedido").html(result);
                });
            })
        });
    </script>
@endsection

@section("content")

    <div class="col-12">
        <h2>Minhas Compras</h2>
    </div>

    <div class="col-12">
        <table class="table table-bordered">
            <tr>
                <th>Data Compra</th>
                <th>Status</th>
                <th>#</th>
            </tr>
            @foreach($pedidos as $ped)
            <tr>
                <th>{{$ped->datapedido->format('d/m/Y H:i')}}</th>
                <th>{{$ped->statusDesc()}}</th>
                <th> <a href="" data-toggle="modal" data-target="#modalCompra" data-value="{{$ped->id}}" class="btn btn-sm btn-info infoCompra"> <i class="fa fa-shopping-basket"></i> {{$ped->id}} </a> </th>
            </tr>
            @endforeach
        </table>
    </div>

    <div class="modal fade" id="modalCompra">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detalhes do pedido</h5>
                </div>
                <div class="modal-body">
                    <div id="contentPedido">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

@endsection
