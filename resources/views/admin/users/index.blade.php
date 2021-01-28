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
                        <strong class="card-title">{{$title}}</strong>
                        <a href="{{route('admins.create')}}" class="btn btn-info btn-sm fr">Novo</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($users))
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{$user->nome}}</td>
                                            <td>
                                                <form action="{{route('admins.destroy', $user->id)}}" method="POST">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="_method" value="DELETE"/>
                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                        <a href="{{route('admins.edit',$user->id)}}" class="btn btn-primary btn-sm">Editar</a>
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
                        {{$users->links('vendor.pagination.default')}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

