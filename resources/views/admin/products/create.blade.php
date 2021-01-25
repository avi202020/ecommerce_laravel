@extends('admin.layout.app')

@section('scripts')
    <script type="text/javascript">
        $('.valor').mask('#.##0,00', {reverse: true});
    </script>
@endsection

@section('content')
<div class="content">
    <div class="animated fadeIn">

        @include('includes.error_messages')

        @include('includes.alert_messages')

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong>{{$title}}</strong>
                        <a href="{{route('products.index')}}" class="btn btn-danger btn-sm" style="float:right">Voltar</a>
                    </div>
                    <div class="card-body card-block">
                        <form method="POST" action="{{route('products.store')}}" enctype='multipart/form-data'>
                            @csrf
                            <div class="form-group row">
                                <div class="col-12">
                                    <label for="nome" class="form-control-label">Nome</label>
                                    <input type="text" name="nome" class="form-control @if(empty(old('nome'))) is-invalid @endif" value="{{old('nome')}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <label for="company" class="form-control-label @if(empty(old('categoria_id'))) is-invalid @endif"">Categoria</label>
                                    <select class="form-control" name="categoria_id">
                                        <option>Selecione uma categoria</option>
                                        @if(!empty($categorias))
                                            @foreach($categorias as $cat)
                                                <option>{{$cat->descricao}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col col-md-4">
                                    <label for="valor" class="form-control-label">Valor</label>
                                    <input type="text" name="valor" class="form-control valor">
                                </div>
                                <div class="col col-md-5 offset-3">
                                    <label for="foto" class="form-control-label">Imagem</label>
                                    <input type="file" name="foto" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col col-md-3">
                                    <label for="textarea-input" class=" form-control-label">Descrição</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <textarea name="textarea-input" rows="10" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <button style="float:right;" type="submit" class="btn btn-md btn-primary">Salvar</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <strong>Validation states</strong> Form
                </div>
                <div class="card-body card-block">
                    <div class="has-success form-group">
                        <label for="inputIsValid" class=" form-control-label">Input is valid</label>
                        <input type="text" id="inputIsValid" class="is-valid form-control">
                    </div>
                    <div class="has-warning form-group">
                        <label for="inputIsInvalid" class=" form-control-label">Input is invalid</label>
                        <input type="text" id="inputIsInvalid" class="is-invalid form-control">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
