@extends('admin.layout.app')

@section('content')
<div class="content">
    <div class="animated fadeIn">

        @include('includes.alert_messages')
        @include('includes.error_messages')

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Categorias</strong>
                        <a href="{{route('categories.create')}}" class="btn btn-info btn-sm fr">Novo</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Descrição</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($categories))
                                    @foreach($categories as $cat)
                                        <tr>
                                            <td>{{$cat->descricao}}</td>
                                            <td>
                                                <form action="{{route('categories.destroy', $cat->id)}}" method="POST">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="_method" value="DELETE"/>
                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                        <a href="{{route('categories.edit',$cat->id)}}" class="btn btn-primary btn-sm">Editar</a>
                                                        <button class="btn btn-danger btn-sm">Deletar</button>
                                                    </div>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        {{$categories->links('vendor.pagination.default')}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

