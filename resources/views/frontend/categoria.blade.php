@extends('frontend.layout.app')

@section('content')
    @if(!empty($produtos))

        <div class="col-2">
        @if( !empty($categorias) && count($categorias)>0)
            <div class="list-group">
                <a href="{{route('categoria')}}" class="list-group-item list-group-item-action @if(empty($idcategoria)) active @endif">Todas</a>
                @foreach($categorias as $cat)
                    <a href="{{route('categoria.byId',$cat->id)}}"
                        class="list-group-item list-group-item-action @if($cat->id == $idcategoria) active @endif">
                        {{$cat->descricao}}</a>
                @endforeach
            </div>
        @endif
        </div>

        <div class="col-10">
        @include('frontend._produtos',['produtos'=>$produtos])
        </div>
    @endif
@endsection
