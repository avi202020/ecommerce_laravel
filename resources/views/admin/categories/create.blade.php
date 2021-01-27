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
                        <a href="{{route('categories.index')}}" class="btn btn-danger btn-sm" style="float:right">Voltar</a>
                    </div>
                    <div class="card-body card-block">
                        <form method="POST" action="{{route('categories.store')}}" enctype='multipart/form-data'>
                            @csrf
                            <div class="form-group row">
                                <div class="col-12">
                                    <label for="descricao" class="form-control-label">Descricao</label>
                                    <input type="text" name="descricao" class="form-control @if($errors->any() && empty(old('descricao'))) is-invalid @endif" value="{{old('descricao')}}">
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
