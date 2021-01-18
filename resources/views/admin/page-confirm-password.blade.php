@extends('admin.layout.form_login')

@section('content')
    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="{{route('admin.login')}}">
                        <img class="align-content" src="{{asset('assets/admin/images/logo.png')}}" alt="">
                    </a>
                </div>
                <div class="login-form">
                    <form action="{{route('reset.password',$tokenData->token)}}" method="POST" >
                        @csrf
                        <div class="form-group">
                            <label>Nova Senha</label>
                            <input type="password" required name="password" class="form-control" placeholder="Senha">
                        </div>
                        <div class="form-group">
                            <label>Confirme Nova Senha</label>
                            <input type="password" required name="password_confirm" class="form-control" placeholder="Confirme Senha">
                        </div>
                        <div class="form-group row">
                            <div class="col-10">
                                <button type="submit" class="btn btn-primary btn-flat m-b-15">Enviar</button>
                            </div>
                            <div class="col-2">
                                <a href="{{route('admin.login')}}" class="btn btn-danger"><i class="fa fa-arrow-left"></i>
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
