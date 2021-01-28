@if(!empty($produtos))
    @foreach($produtos as $prod)
        <div class="col-3 mb-3">
            <div class="card">
                <img class="card-img-top" src="{{$prod->foto}}" />
                <div class="card-body">
                    <h6 class="card-title">{{$prod->nome}} - R$ {{$prod->valor}}</h6>
                    <a href="{{route('cart.store',['idproduto'=>$prod->id])}}" class="btn btn-sm btn-secondary">Adicionar Item  <i class="fa fa-plus"></i></a>
                </div>
            </div>
        </div>
    @endforeach
@endif
