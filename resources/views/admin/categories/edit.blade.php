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
                        <a href="{{route('categories.index')}}" class="btn btn-danger btn-sm fr">Voltar</a>
                    </div>
                    <div class="card-body card-block">
                        <form method="POST" action="{{route('categories.update',$category->id)}}" enctype='multipart/form-data'>
                            <input type="hidden" name="_method" value="PUT">
                            @csrf
                            <div class="form-group row">
                                <div class="col-12">
                                    <label for="descricao" class="form-control-label">Descrição</label>
                                    <input type="text" name="descricao" class="form-control @if($errors->any() && empty(old('descricao'))) is-invalid @endif" value="{{old('descricao',$category->descricao)}}">
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
