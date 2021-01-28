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
                        <a href="{{route('admins.index')}}" class="btn btn-danger btn-sm fr">Voltar</a>
                    </div>
                    <div class="card-body card-block">
                        <form method="POST" action="{{route('admins.update',$user->id)}}" enctype='multipart/form-data'>
                            <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" name="user_id" value="{{$user->id}}">
                            @csrf
                            <div class="form-group row">
                                <div class="col-12">
                                    <label for="nome" class="form-control-label">Nome</label>
                                    <input type="text" name="nome" class="form-control @if($errors->any() && empty(old('nome'))) is-invalid @endif" value="{{old('nome',$user->nome)}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <label for="email" class="form-control-label">Email</label>
                                    <input type="text" name="email" class="form-control @if($errors->any() && empty(old('email'))) is-invalid @endif" value="{{old('email',$user->email)}}">
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
                                    <input type="file" onchange="loadFile(event)" name="image" class="form-control input-file @if($errors->any() && !empty(old('image'))) is-invalid @endif">
                                </div>
                                <div class="col col-md-3 border-orange">
                                    <img class="input-img" src="{{$user->image}}"/>
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
