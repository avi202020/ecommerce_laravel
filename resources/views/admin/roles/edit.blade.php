@extends('admin.layout.app')

@section('content')
<div class="content">
    <div class="animated fadeIn">

        @include('includes.alert_messages')
        @include('includes.error_messages')

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong>{{$title}}</strong>
                        <a href="{{route('permissions.index')}}" class="btn btn-danger btn-sm fr">Voltar</a>
                    </div>
                    <div class="card-body card-block">
                        <form method="POST" action="{{route('permissions.update',$role->id)}}" enctype='multipart/form-data'>
                            <input type="hidden" name="_method" value="PUT">
                            @csrf
                            <div class="form-group row">
                                <div class="col-12">
                                    <label for="name" class="form-control-label">Nome</label>
                                    <input type="text" name="name" class="form-control @if($errors->any() && empty(old('name'))) is-invalid @endif" value="{{old('name',$role->name)}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-12">
                                    <h3>Produtos</h3>
                                </div>
                                <div class="col-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input type="checkbox" name="permissions[]" value="products.index" @if(in_array('products.index',$permissions)) checked @endif>
                                            </div>
                                        </div>
                                        <input type="text" readonly value="Listar" class="form-control">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input type="checkbox" name="permissions[]" value="products.store" @if(in_array('products.store',$permissions)) checked @endif>
                                            </div>
                                        </div>
                                        <input type="text" readonly value="Criar" class="form-control">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input type="checkbox" name="permissions[]" value="products.edit" @if(in_array('products.edit',$permissions)) checked @endif>
                                            </div>
                                        </div>
                                        <input type="text" readonly value="Editar" class="form-control">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input type="checkbox" name="permissions[]" value="products.destroy" @if(in_array('products.destroy',$permissions)) checked @endif>
                                            </div>
                                        </div>
                                        <input type="text" readonly value="Excluir" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-12 fr">
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
