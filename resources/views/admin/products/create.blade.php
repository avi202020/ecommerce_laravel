@extends('admin.layout.app')

@section('content')
<div class="content">
    <div class="animated fadeIn">

        @include('includes.error_messages')

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong>{{$title}}</strong>
                        <a href="{{route('products.index')}}" class="btn btn-danger btn-sm" style="float:right">Voltar</a>
                    </div>
                    <div class="card-body card-block">
                        <form method="POST" action="{{route('products.update',$produto->id)}}" enctype='multipart/form-data'>
                            @csrf
                            <div class="form-group row">
                                <div class="col-12">
                                    <label for="nome" class="form-control-label">Nome</label>
                                    <input type="text" name="nome" class="form-control @if($errors->any() && empty(old('nome'))) is-invalid @endif" value="{{old('nome')}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <label for="company" class="form-control-label">Categoria</label>
                                    <select name="categoria_id" class="form-control @if($errors->any() && empty(old('categoria_id'))) select-is-invalid @endif" name="categoria_id">
                                        <option value="">Selecione uma categoria</option>
                                        @if(!empty($categorias))
                                            @foreach($categorias as $cat)
                                                <option value="{{$cat->id}}" @if(old('categoria_id')==$cat->id) selected @endif>{{$cat->descricao}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col col-md-3">
                                    <label for="descricao" class="form-control-label">Descrição</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <textarea name="descricao" rows="10" class="form-control @if($errors->any() && empty(old('descricao'))) is-invalid @endif">{{old('descricao')}}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col col-md-4">
                                    <label for="valor" class="form-control-label">Valor</label>
                                    <input type="text" name="valor" value="{{old('valor')}}" class="form-control valor @if($errors->any() && empty(old('valor'))) is-invalid @endif">
                                </div>
                                <div class="col col-md-5">
                                    <label for="foto" class="form-control-label">Imagem</label>
                                    <input type="file" onchange="loadFile(event)" name="foto" class="form-control input-file @if($errors->any() && empty(old('foto'))) is-invalid @endif">
                                </div>
                                <div class="col col-md-3 border-orange">
                                    <img class="input-img" src="https://via.placeholder.com/530x511"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-md btn-primary fr">Salvar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
