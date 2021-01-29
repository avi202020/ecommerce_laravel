@extends('admin.layout.app')

@section('scripts')
<script>
    $(function(){
        $("#cpf").mask("000.000.000-00");
    });
</script>
@endsection

@section('content')
<div class="content">
    <div class="animated fadeIn">

        @include('includes.error_messages')

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong>{{$title}}</strong>
                        <a href="{{route('clients.index')}}" class="btn btn-danger btn-sm" style="float:right">Voltar</a>
                    </div>
                    <div class="card-body card-block">
                        <form method="POST" action="{{route('clients.store')}}" enctype='multipart/form-data'>
                            @csrf
                            <div class="form-group row">
                                <div class="col-9">
                                    <label for="nome" class="form-control-label">Nome</label>
                                    <input type="text" name="nome" class="form-control @if($errors->any() && empty(old('nome'))) is-invalid @endif" value="{{old('nome')}}">
                                </div>
                                <div class="col-3">
                                    <label for="status" class="form-control-label">Status</label>
                                    <select name="status" class="form-control">
                                        <option value="1" @if(old('status')==1) selected @endif>Ativo</option>
                                        <option value="0" @if(old('status')==0) selected @endif>Inativo</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <label for="email" class="form-control-label">Email</label>
                                    <input type="text" name="email" class="form-control @if($errors->any() && empty(old('email'))) is-invalid @endif" value="{{old('email')}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <label for="login">CPF</label>
                                    <input type="text" id="cpf" class="form-control @if($errors->any() && empty(old('login'))) is-invalid @endif" name="login" value="{{old('login')}}"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <label for="password" class="form-control-label">Senha</label>
                                    <input type="password" name="password" class="form-control @if($errors->any() && empty(old('password'))) is-invalid @endif">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col col-md-9">
                                    <label for="image" class="form-control-label">Imagem</label>
                                    <input type="file" onchange="loadFile(event)" name="image" class="form-control input-file @if($errors->any() && empty(old('image'))) is-invalid @endif">
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
